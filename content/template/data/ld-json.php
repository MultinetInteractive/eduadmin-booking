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

$show_extra_metadata = EDU()->is_checked( 'eduadmin-showExtraMetadata', "on" );

if ( ! $show_extra_metadata ) {
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

		$prices = array();

		if ( ! empty( $selected_course['PriceNames'] ) ) {
			foreach ( $selected_course['PriceNames'] as $pn ) {
				$prices[ (string) $pn['PriceNameId'] ] = $pn;
			}
		}

		$org_name = trim( ! empty( $organization['LegalName'] ) ? $organization['LegalName'] : $organization['OrganisationName'] );

		$events = [];

		$offers = [];

		foreach ( $prices as $priceNameId => $priceName ) {
			$offers[] = [
				'@type'         => 'Offer',
				'price'         => $priceName['Price'],
				'category'      => $priceName['Price'] == 0 ? 'Free' : 'Paid',
				'priceCurrency' => EDU()->get_option( 'eduadmin-currency', 'SEK' ),
				'name'          => $priceName['PriceNameDescription'],
			];
		}

		foreach ( $selected_course['Events'] as $event ) {
			$_event = [
				'@type'      => 'CourseInstance',
				'identifier' => (string) $event['EventId'],
			];

			if ( $is_ondemand ) {
				$_event['courseMode']  = "Online";
				$_event['description'] = 'On-demand';

				if ( $event['OnDemandAccessDays'] == null && $selected_course['OnDemandAccessDays'] != null ) {
					$event['OnDemandAccessDays'] = $selected_course['OnDemandAccessDays'];
				}

				if ( $event['OnDemandAccessDays'] > 0 ) {
					$_event['courseSchedule'] = [
						'@type'           => 'Schedule',
						'repeatFrequency' => 'Daily',
						'repeatCount'     => $event['OnDemandAccessDays'],
					];
				} else {
					$_event['courseSchedule'] = [
						'@type'           => 'Schedule',
						'duration'        => 'P1D',
						'repeatFrequency' => 'Yearly',
						'repeatCount'     => 99,
					];
				}
			} else {
				$_event['courseMode'] = "Onsite";
				$_event['location']   = $event['City'];
				$_event['startDate']  = $event['StartDate'];
				$_event['endDate']    = $event['EndDate'];

				$_event['courseSchedule'] = [
					'@type'           => 'Schedule',
					'startDate'       => $event['StartDate'],
					'endDate'         => $event['EndDate'],
					'repeatFrequency' => 'Daily',
					'repeatCount'     => count( $event['EventDates'] ),
				];
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
			'offers'              => $offers,
		];

		echo '<script type="application/ld+json">
' . json_encode( $ld_object, JSON_PRETTY_PRINT ) . '
</script>';
	}
}
