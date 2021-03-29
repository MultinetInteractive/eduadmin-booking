<?php
$r             = uniqid( 'eduadmin-timer-' );
${$r}          = EDU()->start_timer( 'Booking info' );
$course_id     = $wp_query->query_vars['courseId'];
$group_by_city = EDU()->is_checked( 'eduadmin-groupEventsByCity', false );

$fetch_months = EDU()->get_option( 'eduadmin-monthsToFetch', 6 );
if ( ! is_numeric( $fetch_months ) ) {
	$fetch_months = 6;
}

if ( EDU()->is_checked( 'eduadmin-useBookingFormFromApi', false ) ) {
	echo '<script type="text/javascript">location.href = "' . get_home_url() . '";</script>';

	return;
}

$edo = EDUAPIHelper()->GetCourseDetailInfo( $course_id, $fetch_months, $group_by_city );

$selected_course = false;
$name            = '';

if ( $edo ) {
	$selected_course = json_decode( $edo, true );
	$edo             = $selected_course;
	$name            = ( ! empty( $edo['CourseName'] ) ? $edo['CourseName'] : $edo['InternalCourseName'] );
}

$noAvailableDates            = false;
$GLOBALS['noAvailableDates'] = false;

if ( ! $selected_course || ! isset( $selected_course['Events'] ) || empty( $selected_course['Events'] ) ) {
	$noAvailableDates            = true;
	$GLOBALS['noAvailableDates'] = true;
}
$event  = null;
$events = $selected_course['Events'];

if ( ! $noAvailableDates ) {
	$event = $events[0];
	if ( isset( $_GET['eid'] ) && is_numeric( $_GET['eid'] ) ) {
		$eventid = intval( $_GET['eid'] );
		foreach ( $events as $ev ) {
			if ( $eventid === $ev['EventId'] && $ev['StartDate'] > date( "Y-m-d H:i:s" ) ) {
				$event    = $ev;
				$events   = array();
				$events[] = $ev;
				break;
			}
		}
	}

	if ( count( $events ) != 0 ) {
		$event_id = $event['EventId'];
		$eventid  = $event_id;

		$questions = EDU()->get_transient( 'eduadmin-event_questions', function() use ( $event_id ) {
			return EDUAPI()->REST->Event->BookingQuestions( $event_id, true );
		}, DAY_IN_SECONDS, $event_id );

		$booking_questions     = $questions['BookingQuestions'];
		$participant_questions = $questions['ParticipantQuestions'];
	} else {
		$noAvailableDates            = true;
		$GLOBALS['noAvailableDates'] = true;
	}
}

EDU()->stop_timer( ${$r} );
