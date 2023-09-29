<?php
$grouped_programmes = array();

$currency = EDU()->get_option( 'eduadmin-currency', 'SEK' );

foreach ( $programme['ProgrammeStarts'] as $programme_start ) {
	$key = edu_get_timezoned_date( 'Y-m', $programme_start['StartDate'] );

	$grouped_programmes[ $key ][] = $programme_start;
}

$surl     = get_home_url();
$base_url = $surl . '/programmes';

$spot_left_option = EDU()->get_option( 'eduadmin-spotsLeft', 'exactNumbers' );
$always_few_spots = EDU()->get_option( 'eduadmin-alwaysFewSpots', '3' );
$spot_settings    = EDU()->get_option( 'eduadmin-spotsSettings', "1-5\n5-10\n10+" );

$use_eduadmin_form = EDU()->is_checked( 'eduadmin-useBookingFormFromApi' );

foreach ( $grouped_programmes as $group => $grouped_programme ) {
	echo '<h2>' . esc_html( $group ) . '</h2>';
	echo '<div class="scrollable">';
	echo '<table class="programme-list">';
	echo '<tr>';
	echo '<th>' . esc_html_x( 'Start', 'frontend', 'eduadmin-booking' ) . '</th>';
	echo '<th>' . esc_html_x( 'Location', 'frontend', 'eduadmin-booking' ) . '</th>';
	echo '<th>' . esc_html_x( 'Schedule', 'frontend', 'eduadmin-booking' ) . '</th>';
	echo '<th>' . esc_html_x( 'Spots left', 'frontend', 'eduadmin-booking' ) . '</th>';
	echo '<th>' . esc_html_x( 'Prices from', 'frontend', 'eduadmin-booking' ) . '</th>';
	echo '<th></th>';
	echo '</tr>';
	foreach ( $grouped_programme as $programme_start ) {
		$sorted_events = sortEvents( $programme_start['Events'], [ 'ProgrammeCourseSortIndex' ], [ 0 ] );

		echo '<tr>';
		echo '<td>' . wp_kses_post( get_display_date( $programme_start['StartDate'] ) ) . '</td>';
		echo '<td>' . ( ! empty( $programme_start['City'] ) ? esc_html( $programme_start['City'] ) : '' ) . '</td>';
		echo '<td>';

		if ( 0 === count( $programme_start['Events'] ) ) {
			echo '<i>' . esc_html_x( 'No planned events', 'frontend', 'eduadmin-booking' ) . '</i>';
		} else {
			echo '<span class="edu-manyDays" onclick="edu_openDatePopup(this);">' . esc_html_x( 'Show', 'frontend', 'eduadmin-booking' ) . '</span>';
			echo '<div class="edu-DayPopup">';
			echo esc_html( $programme['ProgrammeName'] );
			echo ' - ';
			echo wp_kses_post( get_display_date( $programme_start['StartDate'] ) );
			echo '<a style="float: right;" href="javascript://" onclick="edu_closeDatePopup(event, this);">' . esc_html_x( 'Close', 'frontend', 'eduadmin-booking' ) . '</a>';
			echo '<div class="scrollable-full-height">';
			$events_per_day = array();
			foreach ( $sorted_events as $event ) {
				$events_per_day[ get_old_start_end_display_date( $event['StartDate'], $event['EndDate'] ) ][] = $event;
			}

			foreach ( $events_per_day as $day => $_events ) {
				echo '<b>' . wp_kses_post( $day ) . '</b><br />';
				foreach ( $_events as $ev ) {
					if ( count( $ev['EventDates'] ) > 0 ) {
						foreach ( $ev['EventDates'] as $evdate ) {
							echo wp_kses_post(
								     get_start_end_display_date( $evdate, $evdate, false, $ev, true ) . ' ' .
								     $ev['EventName']
							     ) . '<br />';
						}
					} else {
						echo wp_kses_post(
							     get_start_end_display_date( $ev, $ev, false, $ev, true ) . ' ' .
							     $ev['EventName']
						     ) . '<br />';
					}
				}
			}
			echo '</div>';
			echo '</div>';
		}

		$spots_left = intval( $programme_start['ParticipantNumberLeft'] );

		echo '</td>';
		echo '<td>' . "<span class=\"spotsLeftInfo\">" . get_spots_left( $spots_left, intval( $programme_start['MaxParticipantNumber'] ), $spot_left_option, $spot_settings, $always_few_spots ) . "</span>\n" . '</td>';
		echo '<td>';

		$priceNames = array();

		foreach ( $programme_start['PriceNames'] as $pn ) {
			$priceNames[ (string) $pn['Price'] ] = $pn;
		}

		$min_price = min( array_keys( $priceNames ) );

		echo edu_get_price( $priceNames[ $min_price ]["Price"], $programme_start['ParticipantVat'] );

		echo '</td>';

		if ( $use_eduadmin_form ) {
			?>
			<td>
				<a class="cta-btn submit-programme" href="javascript://"
				   onclick="edu_OpenEduBookingFormModal('<?php echo esc_js( $programme_start['BookingFormUrl'] ); ?>');"><?php _ex( 'Book', 'frontend', 'eduadmin-booking' ); ?></a>
			</td>
			<?php
		} else {
			?>
			<td>
				<a class="cta-btn submit-programme"
				   href="<?php echo esc_url( $base_url . '/' . make_slugs( $programme['ProgrammeName'] ) . '__' . $programme['ProgrammeId'] . '/book/?id=' . $programme_start['ProgrammeStartId'] . '&_=' . time() ); ?>"><?php echo esc_html_x( 'Book', 'frontend', 'eduadmin-booking' ); ?></a>
			</td>
			<?php
		}

		echo '</tr>';
	}
	echo '</table>';
	echo '</div>';
}
