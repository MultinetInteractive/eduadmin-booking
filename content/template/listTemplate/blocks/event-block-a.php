<?php $_t = EDU()->start_timer( 'render-event-block-a' ); ?>
	<div
		class="objectItem <?php echo edu_get_percent_from_values( $spots_left, intval( $event['MaxParticipantNumber'] ) ); ?>">
		<?php if ( $show_images && ! empty( $object["ImageUrl"] ) ) { ?>
			<div class="objectImage"
			     onclick="location.href = '<?php echo $base_url; ?>/<?php echo make_slugs( $name ); ?>__<?php echo $object['CourseTemplateId']; ?>/?eid=<?php echo $event['EventId']; ?><?php echo edu_get_query_string( "&" ); ?>';"
			     style="background-image: url('<?php echo esc_url( $object['ImageUrl'] ); ?>');"></div>
		<?php } ?>
		<div class="objectInfoHolder">
			<div class="objectName">
				<a href="<?php echo $base_url; ?>/<?php echo make_slugs( $name ); ?>__<?php echo $object['CourseTemplateId']; ?>/?eid=<?php echo $event['EventId']; ?><?php echo edu_get_query_string( "&" ); ?>"><?php
					echo htmlentities( get_utf8( $name ) );
					?></a>
			</div>
			<div class="objectDescription">
				<?php
				edu_event_listitem_date( $event );

				if ( ! empty( $event['City'] ) && $show_city ) {
					echo ' <span class="cityInfo">';
					echo $event['City'];
					if ( $show_event_venue && ! empty( $event['AddressName'] ) ) {
						echo '<span class="venueInfo">, ' . $event['AddressName'] . '</span>';
					}
					echo "</span>\n";
				}

				if ( $object['Days'] > 0 || count( $event['EventDates'] ) > 0 ) {
					$dayCount = $object['Days'];
					if ( count( $event['EventDates'] ) > 0 ) {
						$dayCount = count( $event['EventDates'] );
					}
					echo '<div class="dayInfo">';
					echo ( $show_course_days ? sprintf( _n( '%1$d day', '%1$d days', $dayCount, 'eduadmin-booking' ), $dayCount ) .
					                           ( $show_course_times && $event['StartDate'] != '' && $event['EndDate'] != '' && ! isset( $event_dates[ (string) $event['EventId'] ] ) ? ', ' : '' ) : '' ) .
					     ( $show_course_times && $event['StartDate'] != '' && $event['EndDate'] != '' && ! isset( $event_dates[ (string) $event['EventId'] ] ) ? edu_get_timezoned_date( "H:i", $event['StartDate'] ) .
					                                                                                                                                    ' - ' .
					                                                                                                                                    edu_get_timezoned_date( "H:i", $event['EndDate'] ) : '' );
					echo "</div>\n";
				}

				if ( $show_event_price && isset( $event['Price'] ) ) {
					if ( 0 === $event['Price'] ) {
						echo '<div class="priceInfo">' . _x( 'Free of charge', 'The course/event has no cost', 'eduadmin-booking' ) . "</div> \n";
					} else {
						echo '<div class="priceInfo">' . sprintf( _x( 'From %1$s', 'frontend', 'eduadmin-booking' ), edu_get_price( $event['Price'], $event['ParticipantVat'] ) ) . "</div> \n";
					}
				}

				if ( ! $event['OnDemand'] ) {
					echo "<span class=\"spotsLeftInfo\">" . get_spots_left( $spots_left, intval( $event['MaxParticipantNumber'] ), $spot_left_option, $spot_settings, $always_few_spots ) . "</span>\n";
				}

				?></div>
		</div>
		<div class="objectBook">
			<?php
			if ( $show_book_btn ) {
				if ( $spots_left > 0 || 0 === intval( $event['MaxParticipantNumber'] ) ) {
					if ( $use_eduadmin_form ) {
						?>
						<a class="bookButton cta-btn" href="javascript://"
						   onclick="edu_OpenEduBookingFormModal('<?php echo esc_js( $event['BookingFormUrl'] ); ?>');"><?php _ex( 'Book', 'frontend', 'eduadmin-booking' ); ?></a>
						<?php
					} else {
						?>
						<a class="bookButton cta-btn"
						   href="<?php echo $base_url; ?>/<?php echo make_slugs( $name ); ?>__<?php echo $object['CourseTemplateId']; ?>/book/?eid=<?php echo $event['EventId']; ?><?php echo edu_get_query_string( "&" ) . '&_=' . time(); ?>"><?php _ex( 'Book', 'frontend', 'eduadmin-booking' ); ?></a>
						<?php
					}
				} else {
					?>
					<i class="fullBooked"><?php _ex( 'Full', 'frontend', 'eduadmin-booking' ); ?></i>
					<?php
				}
			}
			?>
			<?php if ( $show_read_more_btn ) : ?>
				<a class="readMoreButton"
				   href="<?php echo $base_url; ?>/<?php echo make_slugs( $name ); ?>__<?php echo $object['CourseTemplateId']; ?>/?eid=<?php echo $event['EventId']; ?><?php echo edu_get_query_string( "&" ); ?>"><?php _ex( 'Read more', 'frontend', 'eduadmin-booking' ); ?></a>
				<br />
			<?php endif; ?>
		</div>
	</div>
<?php EDU()->stop_timer( $_t );
