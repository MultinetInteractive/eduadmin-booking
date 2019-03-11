<?php
$r             = uniqid( 'eduadmin-timer-' );
${$r}          = EDU()->start_timer( 'Booking info' );
$course_id     = $wp_query->query_vars['courseId'];
$group_by_city = get_option( 'eduadmin-groupEventsByCity', false );

$fetch_months = get_option( 'eduadmin-monthsToFetch', 6 );
if ( ! is_numeric( $fetch_months ) ) {
	$fetch_months = 6;
}

$edo = EDUAPIHelper()->GetCourseDetailInfo( $course_id, $fetch_months, $group_by_city );

$selected_course = false;
$name            = '';

if ( $edo ) {
	$selected_course = json_decode( $edo, true );
	$edo             = $selected_course;
	$name            = ( ! empty( $edo['CourseName'] ) ? $edo['CourseName'] : $edo['InternalCourseName'] );
}

$noAvailableDates = false;
$GLOBALS['noAvailableDates'] = false;

if ( ! $selected_course || 0 === count( $selected_course['Events'] ) ) {
	$noAvailableDates = true;
	$GLOBALS['noAvailableDates'] = true;
}
$event  = null;
$events = $selected_course['Events'];

if ( ! $noAvailableDates ) {
	$event = $events[0];
	if ( isset( $_GET['eid'] ) && is_numeric( $_GET['eid'] ) ) {
		$eventid = intval( $_GET['eid'] );
		foreach ( $events as $ev ) {
			if ( $eventid === $ev['EventId'] ) {
				$event    = $ev;
				$events   = array();
				$events[] = $ev;
				break;
			}
		}
	}

	$event_id = $event['EventId'];

	$questions = EDU()->get_transient( 'eduadmin-event_questions', function() use ( $event_id ) {
		return EDUAPI()->REST->Event->BookingQuestions( $event_id, true );
	}, DAY_IN_SECONDS, $event_id );

	$booking_questions     = $questions['BookingQuestions'];
	$participant_questions = $questions['ParticipantQuestions'];
}

EDU()->stop_timer( ${$r} );
