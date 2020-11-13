<?php if ( count( $events ) > 1 ) : ?>
	<div class="dateSelectLabel">
		<?php echo esc_html_x( 'Select the event you want to book', 'frontend', 'eduadmin-booking' ); ?>
	</div>

	<select name="eid" required class="dateInfo" onchange="eduBookingView.SelectEvent(this);">
		<option value=""><?php echo esc_html_x( 'Select event', 'frontend', 'eduadmin-booking' ); ?></option>
		<?php foreach ( $events as $ev ) : ?>
			<option value="<?php echo esc_attr( $ev['EventId'] ); ?>">
				<?php
				echo esc_html( wp_strip_all_tags( get_old_start_end_display_date( $ev['StartDate'], $ev['EndDate'] ) ) ) . ', ';
				echo esc_html( edu_get_timezoned_date( 'H:i', $ev['StartDate'] ) );
				?>
				-
				<?php
				echo esc_html( edu_get_timezoned_date( 'H:i', $ev['EndDate'] ) );
				echo esc_html( edu_output_event_venue( array( $ev['AddressName'], $ev['City'] ), ', ' ) );
				?>
			</option>
		<?php endforeach; ?>
	</select>
<?php
elseif ( 1 === count( $events ) ) :
	echo '<div class="dateInfo">';
	echo wp_kses( get_old_start_end_display_date( $event['StartDate'], $event['EndDate'] ) . ', ', wp_kses_allowed_html( 'post' ) );

	echo '<span class="eventTime">';
	echo esc_html( edu_get_timezoned_date( 'H:i', $event['StartDate'] ) );
	?>
	-
	<?php
	echo esc_html( edu_get_timezoned_date( 'H:i', $event['EndDate'] ) ) . '</span>';
	echo esc_html( edu_output_event_venue( array( $event['AddressName'], $event['City'] ), ', ' ) );
	echo '</div>';
	if ( ! isset( $_GET['eid'] ) || ! is_numeric( $_GET['eid'] ) ) :
		?><input type="hidden" name="eid" value="<?php echo esc_attr( $event['EventId'] ); ?>" /><?php
	endif;
else :
	echo '<div class="dateInfo">' . esc_html_x( 'No events planned for this course yet.', 'frontend', 'eduadmin-booking' ) . '</div>';
endif;
