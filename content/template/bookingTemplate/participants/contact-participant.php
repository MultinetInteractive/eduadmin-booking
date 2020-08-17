<div id="contactPersonParticipant" class="participantItem contactPerson" style="display: none;">
	<h3>
		<?php echo esc_html_x( 'Participant', 'frontend', 'eduadmin-booking' ); ?>
	</h3>
	<label onclick="event.preventDefault()" class="edu-book-contactparticipant-contactName">
		<div class="inputLabel">
			<?php echo esc_html_x( 'Participant name', 'frontend', 'eduadmin-booking' ); ?>
		</div>
		<div class="inputHolder">
			<input type="text" autocomplete="off" readonly class="contactFirstName first-name" placeholder="<?php echo esc_attr_x( 'Participant first name', 'frontend', 'eduadmin-booking' ); ?>" /><input type="text" readonly class="contactLastName last-name" placeholder="<?php echo esc_attr_x( 'Participant surname', 'frontend', 'eduadmin-booking' ); ?>" />
		</div>
	</label>
	<label class="edu-book-contactparticipant-contactEmail">
		<div class="inputLabel">
			<?php echo esc_html_x( 'E-mail address', 'frontend', 'eduadmin-booking' ); ?>
		</div>
		<div class="inputHolder">
			<input type="email" autocomplete="off" readonly class="contactEmail" placeholder="<?php echo esc_attr_x( 'E-mail address', 'frontend', 'eduadmin-booking' ); ?>" />
		</div>
	</label>
	<label class="edu-book-contactparticipant-contactPhone">
		<div class="inputLabel">
			<?php echo esc_html_x( 'Phone number', 'frontend', 'eduadmin-booking' ); ?>
		</div>
		<div class="inputHolder">
			<input type="tel" autocomplete="off" readonly class="contactPhone" placeholder="<?php echo esc_attr_x( 'Phone number', 'frontend', 'eduadmin-booking' ); ?>" />
		</div>
	</label>
	<label class="edu-book-contactparticipant-contactMobile">
		<div class="inputLabel">
			<?php echo esc_html_x( 'Mobile number', 'frontend', 'eduadmin-booking' ); ?>
		</div>
		<div class="inputHolder">
			<input type="tel" autocomplete="off" readonly class="contactMobile" placeholder="<?php echo esc_attr_x( 'Mobile number', 'frontend', 'eduadmin-booking' ); ?>" />
		</div>
	</label>
	<?php if ( $selected_course['RequireCivicRegistrationNumber'] ) { ?>
		<label class="edu-book-contactparticipant-contactCivicRegNo">
			<div class="inputLabel">
				<?php echo esc_html_x( 'Civic Registration Number', 'frontend', 'eduadmin-booking' ); ?>
			</div>
			<div class="inputHolder">
				<input type="text" autocomplete="off" readonly data-required="true" class="contactCivReg" placeholder="<?php echo esc_attr_x( 'Civic Registration Number', 'frontend', 'eduadmin-booking' ); ?>" />
			</div>
		</label>
	<?php } ?>
	<?php if ( 'selectParticipant' === get_option( 'eduadmin-selectPricename', 'firstPublic' ) ) { ?>
		<label class="edu-book-contactparticipant-contactPriceName">
			<div class="inputLabel">
				<?php echo esc_html_x( 'Price name', 'frontend', 'eduadmin-booking' ); ?>
			</div>
			<div class="inputHolder">
				<select name="contactPriceName" autocomplete="off" class="edudropdown participantPriceName edu-pricename" data-required="true" onchange="eduBookingView.UpdatePrice();">
					<option data-price="0" value=""><?php echo esc_html_x( 'Choose price', 'frontend', 'eduadmin-booking' ); ?></option>
					<?php foreach ( $unique_prices as $price ) { ?>
						<option data-price="<?php echo esc_attr( $price['Price'] ); ?>" date-discountpercent="<?php echo esc_attr( $price['DiscountPercent'] ); ?>" data-maxparticipants="<?php echo esc_attr( $price['MaxParticipantNumber'] ); ?>" data-currentparticipants="<?php echo esc_attr( $price['NumberOfParticipants'] ); ?>"
							<?php if ( $price['MaxParticipantNumber'] > 0 && $price['NumberOfParticipants'] >= $price['MaxParticipantNumber'] ) { ?>
								disabled
							<?php } ?>
							value="<?php echo esc_attr( $price['PriceNameId'] ); ?>">
							<?php echo esc_html( $price['PriceNameDescription'] ); ?>
							(<?php echo esc_html( convert_to_money( $price['Price'], get_option( 'eduadmin-currency', 'SEK' ) ) . edu_get_vat_text() ); ?>)
						</option>
					<?php } ?>
				</select>
			</div>
		</label>
	<?php } ?>
	<?php
	if ( ! empty( $event['Sessions'] ) ) {
		echo '<h4>' . esc_html_x( 'Sub events', 'frontend', 'eduadmin-booking' ) . "</h4>\n";
		foreach ( $event['Sessions'] as $sub_event ) {
			if ( count( $sub_event['PriceNames'] ) > 0 ) {
				$s = current( $sub_event['PriceNames'] )['Price'];
			} else {
				$s = 0;
			}
			// PriceNameVat
			echo '<label class="edu-book-contactparticipant-subEvent">';
			echo '<input class="subEventCheckBox" data-price="' . esc_attr( $s ) . '" onchange=eduBookingView.UpdatePrice();" ';
			echo 'name="contactSubEvent_' . esc_attr( $sub_event['SessionId'] ) . '" ';
			echo 'type="checkbox"';
			echo( $sub_event['SelectedByDefault'] || $sub_event['MandatoryParticipation'] ? ' checked="checked"' : '' );
			echo( $sub_event['MandatoryParticipation'] ? ' disabled="disabled"' : '' );
			echo ' value="' . esc_attr( $sub_event['SessionId'] ) . '"> ';
			echo esc_html( wp_strip_all_tags( $sub_event['SessionName'] ) );
			echo esc_html( $hide_sub_event_date_info ? '' : ' (' . edu_get_timezoned_date( 'd/m H:i', $sub_event['StartDate'] ) . ' - ' . edu_get_timezoned_date( 'd/m H:i', $sub_event['EndDate'] ) . ') ' );
			echo( intval( $s ) > 0 ? '&nbsp;<i class="priceLabel">' . esc_html( convert_to_money( $s ) . edu_get_vat_text() ) . '</i>' : '' );
			echo "</label>\n";
		}
		echo '<br />';
	}

	foreach ( $participant_questions as $question ) {
		render_question( $question, true, 'contact' );
	}
	?>
</div>
