<?php
$surl     = get_home_url();
$cat      = get_option( 'eduadmin-rewriteBaseUrl', '' );
$base_url = $surl . '/' . $cat;

$fetch_months = get_option( 'eduadmin-monthsToFetch', 6 );
if ( ! is_numeric( $fetch_months ) ) {
	$fetch_months = 6;
}

$show_events_with_events_only    = $attributes['onlyevents'];
$show_events_without_events_only = $attributes['onlyempty'];

if ( ! empty( $_REQUEST['eduadmin-category'] ) ) {
	$category_id = intval( $_REQUEST['eduadmin-category'] );
}

if ( $category_id > 0 ) {
	$attributes['category'] = $category_id;
}

$city = null;

if ( ! empty( $_REQUEST['eduadmin-city'] ) ) {
	$city               = intval( $_REQUEST['eduadmin-city'] );
	$attributes['city'] = $city;
}

$subject_id = null;

if ( ! empty( $_REQUEST['eduadmin-subject'] ) ) {
	$subject_id              = intval( $_REQUEST['eduadmin-subject'] );
	$attributes['subjectid'] = $subject_id;
}

$course_level = null;

if ( ! empty( $_REQUEST['eduadmin-level'] ) ) {
	$course_level = intval( sanitize_text_field( $_REQUEST['eduadmin-level'] ) );
}

$edo = EDUAPIHelper()->GetCourseList( $attributes, $category_id, $city, $subject_id, $course_level, $custom_order_by, $custom_order_by_order );

$courses = $edo['value'];

if ( ! empty( $_REQUEST['searchCourses'] ) ) {
	$courses = array_filter( $courses, function( $object ) {
		$name        = ( ! empty( $object['CourseName'] ) ? $object['CourseName'] : $object['InternalCourseName'] );
		$descr_field = get_option( 'eduadmin-layout-descriptionfield', 'CourseDescriptionShort' );
		$descr       = '';
		if ( stripos( $descr_field, 'attr_' ) !== false ) {
			$attr_id = intval( substr( $descr_field, 5 ) );
			foreach ( $object['CustomFields'] as $custom_field ) {
				if ( $attr_id === $custom_field['CustomFieldId'] ) {
					$descr = strip_tags( $custom_field['CustomFieldValue'] );
					break;
				}
			}
		} else {
			$descr = strip_tags( $object[ $descr_field ] );
		}

		$name_match  = mb_stripos( $name, sanitize_text_field( $_REQUEST['searchCourses'] ) ) !== false;
		$descr_match = mb_stripos( $descr, sanitize_text_field( $_REQUEST['searchCourses'] ) ) !== false;

		return ( $name_match || $descr_match );
	} );
}

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

	$courses = array_filter( $courses, function( $course ) use ( &$matching_locations ) {
		foreach ( $course['Events'] as $event ) {
			if ( in_array( $event['LocationId'], $matching_locations ) ) {
				return true;
			}
		}

		return false;
	} );
}

$show_next_event_date  = EDU()->is_checked( 'eduadmin-showNextEventDate', false );
$show_course_locations = EDU()->is_checked( 'eduadmin-showCourseLocations', false );
$show_event_price      = EDU()->is_checked( 'eduadmin-showEventPrice', false );

$org = EDUAPIHelper()->GetOrganization();

$inc_vat = $org['PriceIncVat'];

$show_course_days  = EDU()->is_checked( 'eduadmin-showCourseDays', true );
$show_course_times = EDU()->is_checked( 'eduadmin-showCourseTimes', true );
$show_week_days    = EDU()->is_checked( 'eduadmin-showWeekDays', false );

$show_descr       = EDU()->is_checked( 'eduadmin-showCourseDescription', true );
$show_event_venue = EDU()->is_checked( 'eduadmin-showEventVenueName', false );
$currency         = get_option( 'eduadmin-currency', 'SEK' );
?>
<div class="eduadmin-courselistoptions" data-subject="<?php echo esc_attr( $attributes['subject'] ); ?>" data-subjectid="<?php echo esc_attr( $attributes['subjectid'] ); ?>" data-category="<?php echo esc_attr( $attributes['category'] ); ?>" data-city="<?php echo esc_attr( $attributes['city'] ); ?>" data-courselevel="<?php echo esc_attr( $attributes['courselevel'] ); ?>" data-search="<?php echo esc_attr( ( ! empty( $_REQUEST['searchCourses'] ) ? sanitize_text_field( $_REQUEST['searchCourses'] ) : '' ) ); ?>" data-numberofevents="<?php echo esc_attr( $attributes['numberofevents'] ); ?>" data-showimages="<?php echo esc_attr( $attributes['showimages'] ); ?>" data-hideimages="<?php echo esc_attr( $attributes['hideimages'] ); ?>"></div>
