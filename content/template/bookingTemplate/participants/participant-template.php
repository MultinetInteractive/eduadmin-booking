<div class="participantItem template" style="display: none;">
	<h3>
		<?php echo esc_html_x( 'Participant', 'frontend', 'eduadmin-booking' ); ?>
		<div class="removeParticipant" onclick="eduBookingView.RemoveParticipant(this);"><?php echo esc_html_x( 'Remove', 'frontend', 'eduadmin-booking' ); ?></div>
	</h3>
	<label onclick="event.preventDefault()" class="edu-book-participant-participantName">
		<div class="inputLabel">
			<?php echo esc_html_x( 'Participant name', 'frontend', 'eduadmin-booking' ); ?>
		</div>
		<div class="inputHolder">
			<input type="text" autocomplete="off" class="participantFirstName first-name" onchange="eduBookingView.CheckPrice(false);" name="participantFirstName[]" placeholder="<?php echo esc_attr_x( 'Participant first name', 'frontend', 'eduadmin-booking' ); ?>"/><input type="text" class="participantLastName last-name" onchange="eduBookingView.CheckPrice(false);" name="participantLastName[]" placeholder="<?php echo esc_attr_x( 'Participant surname', 'frontend', 'eduadmin-booking' ); ?>"/>
		</div>
	</label>
	<label class="edu-book-participant-participantEmail">
		<div class="inputLabel">
			<?php echo esc_html_x( 'E-mail address', 'frontend', 'eduadmin-booking' ); ?>
		</div>
		<div class="inputHolder">
			<input type="email" autocomplete="off" name="participantEmail[]" onchange="eduBookingView.CheckPrice(false);" placeholder="<?php echo esc_attr_x( 'E-mail address', 'frontend', 'eduadmin-booking' ); ?>"/>
		</div>
	</label>
	<label class="edu-book-participant-participantPhone">
		<div class="inputLabel">
			<?php echo esc_html_x( 'Phone number', 'frontend', 'eduadmin-booking' ); ?>
		</div>
		<div class="inputHolder">
			<input type="tel" autocomplete="off" name="participantPhone[]" placeholder="<?php echo esc_attr_x( 'Phone number', 'frontend', 'eduadmin-booking' ); ?>"/>
		</div>
	</label>
	<label class="edu-book-participant-participantMobile">
		<div class="inputLabel">
			<?php echo esc_html_x( 'Mobile number', 'frontend', 'eduadmin-booking' ); ?>
		</div>
		<div class="inputHolder">
			<input type="tel" autocomplete="off" name="participantMobile[]" placeholder="<?php echo esc_attr_x( 'Mobile number', 'frontend', 'eduadmin-booking' ); ?>"/>
		</div>
	</label>
	<?php if ( $selected_course['RequireCivicRegistrationNumber'] ) { ?>
		<label class="edu-book-participant-participantCivicRegNo">
			<div class="inputLabel">
				<?php echo esc_html_x( 'Civic Registration Number', 'frontend', 'eduadmin-booking' ); ?>
			</div>
			<div class="inputHolder">
				<input type="text" autocomplete="off" data-required="true" name="participantCivReg[]" pattern="(\d{2,4})-?(\d{2,2})-?(\d{2,2})-?(\d{4,4})" class="eduadmin-civicRegNo" placeholder="<?php echo esc_attr_x( 'Civic Registration Number', 'frontend', 'eduadmin-booking' ); ?>"/>
			</div>
		</label>
	<?php } ?>
	<?php
	if ( ! empty( $contact_custom_fields ) ) {
		foreach ( $contact_custom_fields as $attr ) {
			render_attribute( $attr, true, 'participant' );
		}
	}

	?>
	<?php if ( 'selectParticipant' === get_option( 'eduadmin-selectPricename', 'firstPublic' ) ) { ?>
		<label class="edu-book-participant-participantPriceName">
			<div class="inputLabel">
				<?php echo esc_html_x( 'Price name', 'frontend', 'eduadmin-booking' ); ?>
			</div>
			<div class="inputHolder">
				<select name="participantPriceName[]" autocomplete="off" data-required="true" class="edudropdown participantPriceName edu-pricename" onchange="eduBookingView.UpdatePrice();">
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

			echo '<label class="edu-book-participant-participantSubEvent>';
			echo '<input class="subEventCheckBox" data-price="' . esc_attr( $s ) . '" onchange=eduBookingView.UpdatePrice();" data-replace="name|index" ';
			echo 'data-name-template="participantSubEvent_' . esc_attr( $sub_event['SessionId'] ) . '_{{index}}" ';
			echo 'name="participantSubEvent_' . esc_attr( $sub_event['SessionId'] ) . '_-1" ';
			echo 'type="checkbox"';
			echo( $sub_event['SelectedByDefault'] || $sub_event['MandatoryParticipation'] ? ' checked="checked"' : '' );
			echo( $sub_event['MandatoryParticipation'] ? ' disabled="disabled"' : '' );
			echo ' value="' . esc_attr( $sub_event['SessionId'] ) . '"> ';
			echo esc_html( wp_strip_all_tags( $sub_event['SessionName'] ) );
			echo esc_html( $hide_sub_event_date_info ? '' : ' (' . edu_get_timezoned_date( 'd/m H:i', $sub_event['StartDate'] ) . ' - ' . edu_get_timezoned_date( 'd/m H:i', $sub_event['EndDate'] ) . ') ' );
			echo( intval( $s ) > 0 ? '&nbsp;<i class="priceLabel">' . esc_html( convert_to_money( $s ) ) . '</i>' : '' );
			echo "</label>\n";
		}
		echo '<br />';
	}
	if ( ! empty( $participant_questions ) ) {
		foreach ( $participant_questions as $question ) {
			render_question( $question, true, 'participant' );
		}
	}
	?>
</div>
