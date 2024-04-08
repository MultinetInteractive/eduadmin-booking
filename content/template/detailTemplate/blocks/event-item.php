<?php
if ( $group_by_city && $last_city !== $ev['City'] ) {
	$i = 0;
	if ( $has_hidden_dates ) {
		echo '<div class="eventShowMore"><a class="neutral-btn" href="javascript://" onclick="eduDetailView.ShowAllEvents(\'eduev-' . esc_attr( $last_city ) . '\', this);">' . esc_html_x( 'Show all events', 'frontend', 'eduadmin-booking' ) . '</a></div>';
	}
	$has_hidden_dates = false;
	echo '<div class="eventSeparator">' . esc_html( $ev['City'] ) . '</div>';
}

if ( $show_more > 0 && $i >= $show_more ) {
	$has_hidden_dates = true;
}

$event_dates = array();
if ( ! empty( $ev['EventDates'] ) ) {
	$event_dates[ (string) $ev['EventId'] ] = $ev['EventDates'];
}

?>
<div data-groupid="eduev<?php echo( $group_by_city ? '-' . esc_attr( $ev['City'] ) : '' ); ?>"
     class="eventItem<?php echo( $show_more > 0 && $i >= $show_more ? ' showMoreHidden' : '' ); ?>">
	<div class="eventDate<?php echo esc_attr( $group_by_city_class ); ?>">
		<?php edu_event_item_date( $ev, $event_dates ); ?>
	</div>
	<?php if ( ! $group_by_city ) { ?>
		<div class="eventCity">
			<?php
			echo esc_html( $ev['City'] );
			if ( $show_event_venue && ! empty( $ev['AddressName'] ) ) {
				echo '<span class="venueInfo">' . esc_html( edu_output_event_venue( array( $ev['AddressName'] ), ', ' ) ) . '</span>';
			}
			?>
		</div>
	<?php } ?>
	<div class="eventStatus<?php echo esc_attr( $group_by_city_class ); ?>"
	     data-spots-left="<?php echo esc_attr( intval( $ev['ParticipantNumberLeft'] ) ); ?>"
	     data-max-spots="<?php echo esc_attr( intval( $ev['MaxParticipantNumber'] ) ); ?>"
	     data-spots-left-option="<?php echo esc_attr( $spot_left_option ); ?>"
	     data-spots-settings="<?php echo esc_attr( $spot_settings ); ?>"
	     data-always-few-spots="<?php echo esc_attr( $always_few_spots ); ?>">
		<?php
		$spots_left = intval( $ev['ParticipantNumberLeft'] );
		if ( ! $ev['OnDemand'] ) {
			echo '<span class="spotsLeftInfo">' . esc_html( get_spots_left( $spots_left, intval( $ev['MaxParticipantNumber'] ), $spot_left_option, $spot_settings, $always_few_spots ) ) . '</span>';
		}
		?>
	</div>
	<div class="eventBook<?php echo esc_attr( $group_by_city_class ); ?>">
		<?php
		$show_button_link = true;
		if ( null != $ev['ApplicationOpenDate'] ) {
			$current_time   = current_time( 'Y-m-d H:i' );
			$event_opendate = edu_get_timezoned_date( 'Y-m-d H:i', $ev['ApplicationOpenDate'] );

			if ( $current_time <= $event_opendate ) {
				$show_button_link = false;
			}
		}

		if ( $show_button_link ) {
			if ( 0 === intval( $ev['MaxParticipantNumber'] ) || $spots_left > 0 ) {
				if ( $use_eduadmin_form ) {
					?>
					<a class="bookButton cta-btn" href="javascript://"
					   onclick="edu_OpenEduBookingFormModal('<?php echo esc_js( $ev['BookingFormUrl'] ); ?>');"><?php _ex( 'Book', 'frontend', 'eduadmin-booking' ); ?></a>
					<?php
				} else {
					?>
					<a class="bookButton book-link cta-btn"
					   href="<?php echo esc_url( $base_url . '/' . make_slugs( $name ) . '__' . $selected_course['CourseTemplateId'] . '/book/?eid=' . $ev['EventId'] . edu_get_query_string( '&', array( 'eid' ) ) . '&_=' . time() ); ?>"><?php echo esc_html_x( 'Book', 'frontend', 'eduadmin-booking' ); ?></a>
					<?php
				}
			} else {
				if ( $use_eduadmin_form ) {
					if ( $ev['UseWaitingList'] ) {
						?>
						<a class="bookButton book-link cta-btn" href="javascript://"
						   onclick="edu_OpenEduBookingFormModal('<?php echo esc_js( $ev['BookingFormUrl'] ); ?>');"><?php echo esc_html_x( 'Reserve list', 'frontend', 'eduadmin-booking' ); ?></a>
						<?php
					} else {
						?>
						<i class="fullBooked"><?php echo esc_html_x( 'Full', 'frontend', 'eduadmin-booking' ); ?></i>
						<?php
					}
				} else {
					if ( $allow_interest_reg_event && false !== $event_interest_page ) {
						?>
						<a class="inquiry-link"
						   href="<?php echo esc_url( $base_url . '/' . make_slugs( $name ) . '__' . $selected_course['CourseTemplateId'] . '/book/interest/?eid=' . $ev['EventId'] . edu_get_query_string( '&', array( 'eid' ) ) . '&_=' . time() ); ?>"><?php echo esc_html_x( 'Inquiry', 'frontend', 'eduadmin-booking' ); ?></a>
						<?php
					}
					?>
					<i class="fullBooked"><?php echo esc_html_x( 'Full', 'frontend', 'eduadmin-booking' ); ?></i>
					<?php
				}
			}
		} else {
			?>
		<i class="applicationNotOpenYet"
		   title="<?php echo esc_attr( edu_get_timezoned_date( 'Y-m-d H:i', $ev['ApplicationOpenDate'] ) ); ?>">
			<?php
			echo sprintf(
				_x( 'Application opens<br />%1$s', 'frontend', 'eduadmin-booking' ),
				edu_event_item_applicationopendate( $ev['ApplicationOpenDate'] )
			);
			?>
			</i><?php
		}
		?>
	</div>
</div>
