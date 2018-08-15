<?php
if ( ! empty( $wp_query->query_vars['courseId'] ) ) {
	$course_id = $wp_query->query_vars['courseId'];
} elseif ( ! empty( $attributes['courseid'] ) ) {
	$course_id = $attributes['courseid'];
} else {
	$course_id = null;
}
$group_by_city       = get_option( 'eduadmin-groupEventsByCity', false );
$group_by_city_class = '';
$edo                 = get_transient( 'eduadmin-object_' . $course_id . '_json' . '__' . EDU()->version );
$fetch_months        = get_option( 'eduadmin-monthsToFetch', 6 );
if ( ! is_numeric( $fetch_months ) ) {
	$fetch_months = 6;
}
if ( ! $edo ) {
	$expands = array();

	$expands['Subjects']   = '';
	$expands['Categories'] = '';
	$expands['PriceNames'] = '$filter=PublicPriceName;';
	$expands['Events']     =
		'$filter=' .
		'HasPublicPriceName' .
		' and StatusId eq 1' .
		' and CustomerId eq null' .
		' and CompanySpecific eq false' .
		' and LastApplicationDate ge ' . date( 'c' ) .
		' and StartDate le ' . date( 'c', strtotime( 'now 23:59:59 +' . $fetch_months . ' months' ) ) .
		' and EndDate ge ' . date( 'c', strtotime( 'now' ) ) .
		';' .
		'$expand=PriceNames($filter=PublicPriceName),EventDates($orderby=StartDate)' .
		';' .
		'$orderby=StartDate asc' . ( $group_by_city ? ', City asc' : '' ) .
		';';

	$expands['CustomFields'] = '$filter=ShowOnWeb';

	$expand_arr = array();
	foreach ( $expands as $key => $value ) {
		if ( empty( $value ) ) {
			$expand_arr[] = $key;
		} else {
			$expand_arr[] = $key . '(' . $value . ')';
		}
	}

	$edo = wp_json_encode( EDUAPI()->OData->CourseTemplates->GetItem(
		$course_id,
		null,
		join( ',', $expand_arr )
	) );
	set_transient( 'eduadmin-object_' . $course_id . '_json' . '__' . EDU()->version, $edo, 10 );
}

$selected_course = false;
$name            = '';
if ( $edo ) {
	$selected_course = json_decode( $edo, true );
	$name            = ( ! empty( $selected_course['CourseName'] ) ? $selected_course['CourseName'] : $selected_course['InternalCourseName'] );
}

$surl     = get_home_url();
$cat      = get_option( 'eduadmin-rewriteBaseUrl' );
$base_url = $surl . '/' . $cat;

$events = $selected_course['Events'];

$tr      = EDU()->start_timer( 'GetRegions' );
$regions = get_transient( 'eduadmin-regions' . '__' . EDU()->version );
if ( ! $regions ) {
	$regions = EDUAPI()->OData->Regions->Search(
		null,
		null,
		'Locations($filter=PublicLocation;$expand=LocationAddresses;)',
		'RegionName asc'
	);
	set_transient( 'eduadmin-regions' . '__' . EDU()->version, $regions, DAY_IN_SECONDS );
}
EDU()->stop_timer( $tr );

if ( ! empty( $_REQUEST['edu-region'] ) ) {
	$matching_regions = array_filter( $regions['value'], function( $region ) {
		$name       = make_slugs( $region['RegionName'] );
		$name_match = stripos( $name, sanitize_text_field( $_REQUEST['edu-region'] ) ) !== false;

		return $name_match;
	} );

	$matching_locations = array();
	foreach ( $matching_regions as $reg ) {
		foreach ( $reg['Locations'] as $loc ) {
			$matching_locations[] = $loc['LocationId'];
		}
	}

	$events = array_filter( $events, function( $event ) use ( &$matching_locations ) {
		return in_array( $event['LocationId'], $matching_locations );
	} );
}

$prices = array();

if ( ! empty( $selected_course['PriceNames'] ) ) {
	foreach ( $selected_course['PriceNames'] as $pn ) {
		$prices[ $pn['PriceNameId'] ] = $pn;
	}
}

foreach ( $events as $e ) {
	foreach ( $e['PriceNames'] as $pn ) {
		$prices[ $pn['PriceNameId'] ] = $pn;
	}
}

$course_level = get_transient( 'eduadmin-courseLevel-' . $selected_course['CourseTemplateId'] . '__' . EDU()->version );
if ( ! $course_level && ! empty( $selected_course['CourseLevelId'] ) ) {
	$course_level = EDUAPI()->OData->CourseLevels->GetItem( $selected_course['CourseLevelId'] );
	set_transient( 'eduadmin-courseLevel-' . $selected_course['CourseTemplateId'] . '__' . EDU()->version, $course_level, HOUR_IN_SECONDS );
}

$org = get_transient( 'eduadmin-organization' . '__' . EDU()->version );
if ( ! $org ) {
	$org = EDUAPI()->REST->Organisation->GetOrganisation();
	set_transient( 'eduadmin-organization' . '__' . EDU()->version, $org, DAY_IN_SECONDS );
}
$inc_vat = $org['PriceIncVat'];
$show_headers = get_option( 'eduadmin-showDetailHeaders', true );

$hide_sections = array();
if ( isset( $attributes['hide'] ) ) {
	$hide_sections = explode( ',', $attributes['hide'] );
}
