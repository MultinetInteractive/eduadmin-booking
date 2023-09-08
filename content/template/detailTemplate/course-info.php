<?php
if ( ! empty( $wp_query->query_vars['courseId'] ) ) {
	$course_id = $wp_query->query_vars['courseId'];
} elseif ( ! empty( $attributes['courseid'] ) ) {
	$course_id = $attributes['courseid'];
} else {
	$course_id = null;
}
$group_by_city       = EDU()->is_checked( 'eduadmin-groupEventsByCity' );
$group_by_city_class = '';

$fetch_months = EDU()->get_option( 'eduadmin-monthsToFetch', 6 );
if ( ! is_numeric( $fetch_months ) ) {
	$fetch_months = 6;
}

$edo = EDUAPIHelper()->GetCourseDetailInfo( $course_id, $fetch_months, $group_by_city );

$selected_course = false;
$name            = '';
if ( $edo ) {
	$selected_course = json_decode( $edo, true );
	$name            = ( ! empty( $selected_course['CourseName'] ) ? $selected_course['CourseName'] : $selected_course['InternalCourseName'] );
}

$is_ondemand = $selected_course['OnDemand'];

if ( $is_ondemand ) {
	$selected_course = json_decode( EDUAPIHelper()->GetOnDemandCourseDetailInfo( $course_id, $group_by_city ), true );
}

$surl     = get_home_url();
$cat      = EDU()->get_option( 'eduadmin-rewriteBaseUrl' );
$base_url = $surl . '/' . $cat;

$events = array();

foreach ( $selected_course['Events'] as $event ) {
	$event['CourseTemplate'] = $selected_course;
	unset( $event['CourseTemplate']['Events'] );

	$pricenames = array();
	foreach ( $selected_course['PriceNames'] as $pn ) {
		$pricenames[] = $pn;
	}
	foreach ( $event['PriceNames'] as $pn ) {
		$pricenames[] = $pn;
	}

	$event = array_merge( $event['CourseTemplate'], $event );

	$min_price           = min( $pricenames );
	$event['Price']      = $min_price;
	$event['PriceNames'] = $pricenames;

	$events[] = $event;
}

$regions = EDUAPIHelper()->GetRegions();

if ( ! empty( $_REQUEST['edu-region'] ) ) {
	$matching_regions = array_filter( $regions['value'], function( $region ) {
		$name       = make_slugs( $region['RegionName'] );
		$name_match = mb_stripos( $name, sanitize_text_field( $_REQUEST['edu-region'] ) ) !== false;

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

$order_by     = array();
$order        = array( 1 );
$order_option = ( ! ! $group_by_city ? 'City' : 'StartDate' );

$order_by[] = $order_option;
$order[]    = 1;
if ( $order_option == 'City' ) {
	$order_by[] = 'StartDate';
	$order[]    = 1;
}

$events = sortEvents( $events, $order_by, $order );

$prices = array();

if ( ! empty( $selected_course['PriceNames'] ) ) {
	foreach ( $selected_course['PriceNames'] as $pn ) {
		$prices[ (string) $pn['PriceNameId'] ] = $pn;
	}
}

foreach ( $events as $e ) {
	foreach ( $e['PriceNames'] as $pn ) {
		$prices[ (string) $pn['PriceNameId'] ] = $pn;
	}
}

$course_level = get_transient( 'eduadmin-courseLevel-' . $selected_course['CourseTemplateId'] . '__' . EDU()->version );
if ( ! $course_level && ! empty( $selected_course['CourseLevelId'] ) ) {
	$course_level = EDUAPI()->OData->CourseLevels->GetItem( $selected_course['CourseLevelId'] );
	set_transient( 'eduadmin-courseLevel-' . $selected_course['CourseTemplateId'] . '__' . EDU()->version, $course_level, HOUR_IN_SECONDS );
}

$show_headers = EDU()->is_checked( 'eduadmin-showDetailHeaders', true );

$hide_sections = array();
if ( isset( $attributes['hide'] ) ) {
	$hide_sections = explode( ',', $attributes['hide'] );
}

if ( ! ! $selected_course ) {
	if ( ! key_exists( "edu-detail-view-" . $selected_course['CourseTemplateId'], $GLOBALS ) ) {
		do_action( 'eduadmin-detail-view', $selected_course );
		$GLOBALS[ "edu-detail-view-" . $selected_course['CourseTemplateId'] ] = true;
	}
}
