<?php
global $wp_query;

if ( ! empty( $wp_query->query_vars['courseId'] ) ) {
	$course_id = $wp_query->query_vars['courseId'];
} elseif ( ! empty( $attributes['courseid'] ) ) {
	$course_id = $attributes['courseid'];
} else {
	$course_id = null;
}

if ( $course_id == null ) {
	return;
}

$group_by_city       = EDU()->is_checked( 'eduadmin-groupEventsByCity' );
$group_by_city_class = '';

$fetch_months = EDU()->get_option( 'eduadmin-monthsToFetch', 6 );
if ( ! is_numeric( $fetch_months ) ) {
	$fetch_months = 6;
}

$edo = EDUAPIHelper()->GetCourseDetailInfo( $course_id, $fetch_months, $group_by_city );

$organization = EDUAPIHelper()->GetOrganization();

$selected_course = false;
$name            = '';
if ( $edo ) {
	$selected_course = json_decode( $edo, true );

	if ( $selected_course ) {
		$name = ( ! empty( $selected_course['CourseName'] ) ? $selected_course['CourseName'] : $selected_course['InternalCourseName'] );

		$is_ondemand = $selected_course['OnDemand'];

		if ( $is_ondemand ) {
			$selected_course = json_decode( EDUAPIHelper()->GetOnDemandCourseDetailInfo( $course_id, $group_by_city ), true );
		}

		$description = wp_strip_all_tags( ! empty( $selected_course['CourseDescriptionShort'] ) ? $selected_course['CourseDescriptionShort'] : $selected_course['CourseDescription'] );

		if ( strlen( $description ) > 60 ) {
			$description = substr( $description, 0, 57 ) . "...";
		}

		if ( strlen( $description ) == 0 ) {
			return;
		}

		$org_name = trim( ! empty( $organization['LegalName'] ) ? $organization['LegalName'] : $organization['OrganisationName'] );

		$events = null;

		foreach ( $selected_course['Events'] as $event ) {
			$_event = [
				'@type'      => 'CourseInstance',
				'identifier' => (string) $event['EventId'],
			];

			if ( $is_ondemand ) {
				$_event['courseMode']  = "online";
				$_event['location']    = "Online";
				$_event['description'] = 'On-demand';
			} else {
				$_event['location']  = $event['City'];
				$_event['startDate'] = $event['StartDate'];
				$_event['endDate']   = $event['EndDate'];
			}

			if ( ! empty( $event['MaxParticipantNumber'] ) && $event['MaxParticipantNumber'] > 0 ) {
				$_event['maximumAttendeeCapacity']   = $event['MaxParticipantNumber'];
				$_event['remainingAttendeeCapacity'] = $event['ParticipantNumberLeft'];
			}

			$events[] = $_event;
		}

		$ld_object = [
			'@context'            => 'https://schema.org',
			'@type'               => 'Course',
			'description'         => $description,
			'name'                => $name,
			'image'               => $selected_course['ImageUrl'],
			'coursePrerequisites' => $selected_course['Prerequisites'],
			'provider'            => [
				'@type'     => 'Organization',
				'name'      => $org_name,
				'legalName' => trim( $organization['LegalName'] ),
				'telephone' => $organization['Phone'],
				'sameAs'    => $organization['Web'],
				'image'     => $organization['LogoUrl'],
			],
			'hasCourseInstance'   => $events,
		];

		echo '<script type="application/ld+json">
' . json_encode( $ld_object, JSON_PRETTY_PRINT ) . '
</script>';
	}
}
