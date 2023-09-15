<?php
$surl     = get_home_url();
$cat      = EDU()->get_option( 'eduadmin-rewriteBaseUrl', '' );
$base_url = $surl . '/' . $cat;

$fetch_months = EDU()->get_option( 'eduadmin-monthsToFetch', 6 );
if ( ! is_numeric( $fetch_months ) ) {
	$fetch_months = 6;
}

$showEventsWithEventsOnly    = $attributes['onlyevents'];
$showEventsWithoutEventsOnly = $attributes['onlyempty'];

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

$order_by     = array();
$order        = array( 1 );
$order_option = EDU()->get_option( 'eduadmin-listSortOrder', 'SortIndex' );

if ( null !== $custom_order_by ) {
	$order_by = explode( ' ', $custom_order_by );
	if ( null !== $custom_order_by_order ) {
		$order        = array();
		$custom_order = explode( ' ', $custom_order_by_order );
		foreach ( $custom_order as $coVal ) {
			! isset( $coVal ) || $coVal === "asc" ? array_push( $order, 1 ) : array_push( $order, - 1 );
		}
	}
} else {
	if ( $order_option === "SortIndex" ) {
		$order_option = "StartDate";
	}

	array_push( $order_by, $order_option );
	array_push( $order, 1 );
}

if ( $all_courses ) {
	$_courses         = EDUAPIHelper()->GetEventList( $attributes, $category_id, $city, $subject_id, $course_level, $custom_order_by, $custom_order_by_order );
	$_ondemandcourses = EDUAPIHelper()->GetOnDemandEventList( $attributes, $category_id, $city, $subject_id, $course_level, $custom_order_by, $custom_order_by_order );

	$edo = [
		'value' => array_merge( $_ondemandcourses['value'], $_courses['value'] ),
	];
} else {
	if ( ! $show_ondemand ) {
		$edo = EDUAPIHelper()->GetEventList( $attributes, $category_id, $city, $subject_id, $course_level, $custom_order_by, $custom_order_by_order );
	} else {
		$edo = EDUAPIHelper()->GetOnDemandEventList( $attributes, $category_id, $city, $subject_id, $course_level, $custom_order_by, $custom_order_by_order );
	}
}

$courses = $edo['value'];

if ( ! empty( $_REQUEST['searchCourses'] ) ) {
	$courses = array_filter( $courses, function( $object ) {
		$name        = ( ! empty( $object['CourseName'] ) ? $object['CourseName'] : $object['InternalCourseName'] );
		$descr_field = EDU()->get_option( 'eduadmin-layout-descriptionfield', 'CourseDescriptionShort' );
		$descr       = '';
		if ( stripos( $descr_field, 'attr_' ) !== false ) {
			$attrId = intval( substr( $descr_field, 5 ) );
			foreach ( $object['CustomFields'] as $custom_field ) {
				if ( $attrId === $custom_field['CustomFieldId'] ) {
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

$events = array();
foreach ( $courses as $object ) {
	foreach ( $object['Events'] as $event ) {
		$event['CourseTemplate'] = $object;
		unset( $event['CourseTemplate']['Events'] );

		$pricenames = array();
		foreach ( $object['PriceNames'] as $pn ) {
			$pricenames[] = $pn['Price'];
		}
		foreach ( $event['PriceNames'] as $pn ) {
			$pricenames[] = $pn['Price'];
		}

		$min_price      = min( $pricenames );
		$event['Price'] = $min_price;

		$event = array_merge( $event['CourseTemplate'], $event );

		$events[] = $event;
	}
}

if ( ! empty( $filter_city ) ) {
	$events = array_filter( $events, function( $object ) use ( &$filter_city ) {
		return mb_stripos( $object['City'], $filter_city ) !== false;
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

	$events = array_filter( $events, function( $event ) use ( &$matching_locations ) {
		return in_array( $event['LocationId'], $matching_locations );
	} );
}

$events = sortEvents( $events, $order_by, $order );

$show_course_days  = EDU()->is_checked( 'eduadmin-showCourseDays', true );
$show_course_times = EDU()->is_checked( 'eduadmin-showCourseTimes', true );
$show_week_days    = EDU()->is_checked( 'eduadmin-showWeekDays', false );

$org = EDUAPIHelper()->GetOrganization();

$show_event_price = EDU()->is_checked( 'eduadmin-showEventPrice', false );
$currency         = EDU()->is_checked( 'eduadmin-currency', 'SEK' );
$show_event_venue = EDU()->is_checked( 'eduadmin-showEventVenueName', false );

$spot_left_option = EDU()->get_option( 'eduadmin-spotsLeft', 'exactNumbers' );
$always_few_spots = EDU()->get_option( 'eduadmin-alwaysFewSpots', '3' );
$spot_settings    = EDU()->get_option( 'eduadmin-spotsSettings', "1-5\n5-10\n10+" );

$use_eduadmin_form = EDU()->is_checked( 'eduadmin-useBookingFormFromApi' );

do_action( 'eduadmin-list-event-view', $events );

if ( $use_eduadmin_form ) {
	if ( ! key_exists( 'eduadmin-booking-form-javascript-set', $GLOBALS ) && ! empty( trim( EDU()->get_option( 'eduadmin-booking-form-javascript', '' ) ) ) ) {
		?>
		<script type="text/javascript">
			<?php echo EDU()->get_option( 'eduadmin-booking-form-javascript', '' ); ?>
		</script>
		<?php
		$GLOBALS['eduadmin-booking-form-javascript-set'] = true;
	}
}

?>
<div class="eventListTable" data-eduwidget="listview-eventlist"
     data-template="<?php echo esc_attr( str_replace( 'template_', '', $attributes['template'] ) ); ?>"
     data-subject="<?php echo esc_attr( $attributes['subject'] ); ?>"
     data-subjectid="<?php echo esc_attr( $attributes['subjectid'] ); ?>"
     data-category="<?php echo esc_attr( $attributes['category'] ); ?>"
     data-categorydeep="<?php echo esc_attr( $attributes['categorydeep'] ); ?>"
     data-courselevel="<?php echo esc_attr( $attributes['courselevel'] ); ?>"
     data-city="<?php echo esc_attr( $attributes['city'] ); ?>"
     data-search="<?php echo esc_attr( ( ! empty( $_REQUEST['searchCourses'] ) ? sanitize_text_field( $_REQUEST['searchCourses'] ) : '' ) ); ?>"
     data-region="<?php echo esc_attr( ( ! empty( $_REQUEST['edu-region'] ) ? sanitize_text_field( $_REQUEST['edu-region'] ) : '' ) ); ?>"
     data-numberofevents="<?php echo esc_attr( $attributes['numberofevents'] ); ?>"
     data-orderby="<?php echo esc_attr( $attributes['orderby'] ); ?>"
     data-order="<?php echo esc_attr( $attributes['order'] ); ?>"
     data-showmore="<?php echo esc_attr( $attributes['showmore'] ); ?>"
     data-showcity="<?php echo esc_attr( $attributes['showcity'] ); ?>"
     data-showbookbtn="<?php echo esc_attr( $attributes['showbookbtn'] ); ?>"
     data-showreadmorebtn="<?php echo esc_attr( $attributes['showreadmorebtn'] ); ?>"
     data-showimages="<?php echo esc_attr( $attributes['showimages'] ); ?>"
     data-hideimages="<?php echo esc_attr( $attributes['hideimages'] ); ?>"
     data-filtercity="<?php echo esc_attr( $attributes['filtercity'] ); ?>"
     data-useeduform="<?php echo esc_attr( $use_eduadmin_form ); ?>"
     data-ondemand="<?php echo esc_attr( $attributes['ondemand'] ); ?>"
     data-allcourses="<?php echo esc_attr( $attributes['allcourses'] ); ?>">
