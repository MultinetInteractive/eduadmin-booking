<?php
$block_edit_if_logged_in = EDU()->is_checked( 'eduadmin-blockEditIfLoggedIn', true );
$__block                 = ( $block_edit_if_logged_in && ! empty( $contact->PersonId ) );
if ( isset( $contact->PersonId ) && 0 !== $contact->PersonId ) {
	echo '<input type="hidden" name="edu-contactId" value="' . esc_attr( $contact->PersonId ) . '" />';
}
?>
<div class="contactView">
	<h2><?php echo esc_html_x( 'Contact information', 'frontend', 'eduadmin-booking' ); ?></h2>
	<label onclick="event.preventDefault()" class="edu-book-contact-contactName">
		<div class="inputLabel">
			<?php echo esc_html_x( 'Contact name', 'frontend', 'eduadmin-booking' ); ?>
		</div>
		<div class="inputHolder"><input type="text"
				<?php echo( $__block ? ' readonly' : '' ); ?>
				                        required onchange="eduBookingView.ContactAsParticipant();" autocomplete="off"
				                        class="first-name" id="edu-contactFirstName" name="contactFirstName"
				                        placeholder="<?php echo esc_attr_x( 'Contact first name', 'frontend', 'eduadmin-booking' ); ?>"
				                        value="<?php echo @esc_attr( $contact->FirstName ); ?>" /><input
				type="text" <?php echo( $__block ? ' readonly' : '' ); ?>
				required onchange="eduBookingView.ContactAsParticipant();" id="edu-contactLastName" class="last-name"
				autocomplete="off" name="contactLastName"
				placeholder="<?php echo esc_attr_x( 'Contact surname', 'frontend', 'eduadmin-booking' ); ?>"
				value="<?php echo @esc_attr( $contact->LastName ); ?>" />
		</div>
	</label>
	<label class="edu-book-contact-contactEmail">
		<div class="inputLabel">
			<?php echo esc_html_x( 'E-mail address', 'frontend', 'eduadmin-booking' ); ?>
		</div>
		<div class="inputHolder">
			<input type="email" id="edu-contactEmail" required
			       name="contactEmail"<?php echo( $__block ? ' readonly' : '' ); ?> autocomplete="off"
			       onchange="eduBookingView.ContactAsParticipant();"
			       placeholder="<?php echo esc_attr_x( 'E-mail address', 'frontend', 'eduadmin-booking' ); ?>"
			       value="<?php echo @esc_attr( $contact->Email ); ?>" />
		</div>
	</label>
	<label class="edu-book-contact-contactPhone">
		<div class="inputLabel">
			<?php echo esc_html_x( 'Phone number', 'frontend', 'eduadmin-booking' ); ?>
		</div>
		<div class="inputHolder">
			<input type="tel" id="edu-contactPhone" name="contactPhone" autocomplete="off"
			       onchange="eduBookingView.ContactAsParticipant();"
			       placeholder="<?php echo esc_attr_x( 'Phone number', 'frontend', 'eduadmin-booking' ); ?>"
			       value="<?php echo @esc_attr( $contact->Phone ); ?>" />
		</div>
	</label>
	<label class="edu-book-contact-contactMobile">
		<div class="inputLabel">
			<?php echo esc_html_x( 'Mobile number', 'frontend', 'eduadmin-booking' ); ?>
		</div>
		<div class="inputHolder">
			<input type="tel" id="edu-contactMobile" name="contactMobile" autocomplete="off"
			       onchange="eduBookingView.ContactAsParticipant();"
			       placeholder="<?php echo esc_attr_x( 'Mobile number', 'frontend', 'eduadmin-booking' ); ?>"
			       value="<?php echo @esc_attr( $contact->Mobile ); ?>" />
		</div>
	</label>
	<?php $selected_login_field = get_option( 'eduadmin-loginField', 'Email' ); ?>
	<?php if ( $selected_course['RequireCivicRegistrationNumber'] || 'CivicRegistrationNumber' === $selected_login_field ) { ?>
		<label class="edu-book-contact-contactCivicRegNo">
			<div class="inputLabel">
				<?php echo esc_html_x( 'Civic Registration Number', 'frontend', 'eduadmin-booking' ); ?>
			</div>
			<div class="inputHolder">
				<input type="text" id="edu-contactCivReg" autocomplete="off"
				       class="eduadmin-civicRegNo" <?php echo( 'CivicRegistrationNumber' === $selected_login_field ? 'required' : '' ); ?>
				       name="contactCivReg" onchange="eduBookingView.ContactAsParticipant();"
				       placeholder="<?php echo esc_attr_x( 'Civic Registration Number', 'frontend', 'eduadmin-booking' ); ?>"
				       value="<?php echo @esc_attr( $contact->CivicRegistrationNumber ); ?>" />
			</div>
		</label>
	<?php } ?>
	<?php
	if ( EDU()->is_checked( 'eduadmin-useLogin', false ) && ! $contact->CanLogin ) {
		?>
		<label class="edu-book-contact-contactPassword">
			<div class="inputLabel">
				<?php echo esc_html_x( 'Please enter a password', 'frontend', 'eduadmin-booking' ); ?>
			</div>
			<div class="inputHolder">
				<input type="password" required name="contactPass" autocomplete="off"
				       placeholder="<?php echo esc_attr_x( 'Please enter a password', 'frontend', 'eduadmin-booking' ); ?>" />
			</div>
		</label>
		<?php
	}

	$contact_custom_fields = EDUAPI()->OData->CustomFields->Search(
		null,
		'ShowOnWeb and CustomFieldOwner eq \'Person\'',
		'CustomFieldAlternatives'
	)['value'];
	if ( ! empty( $contact_custom_fields ) ) {
		foreach ( $contact_custom_fields as $custom_field ) {
			$data = null;
			if ( isset( $contact->CustomFields ) ) {
				foreach ( $contact->CustomFields as $cf ) {
					if ( $cf->CustomFieldId === $custom_field['CustomFieldId'] ) {
						switch ( $cf->CustomFieldType ) {
							case 'Checkbox':
								$data = $cf->CustomFieldChecked;
								break;
							case 'Dropdown':
								$data = $cf->CustomFieldAlternativeId;
								break;
							default:
								$data = $cf->CustomFieldValue;
								break;
						}
						break;
					}
				}
			}
			render_attribute( $custom_field, false, 'contact', $data );
		}
	}
	?>

	<label class="edu-book-contact-contactAlsoParticipant">
		<div class="inputHolder contactIsAlsoParticipant">
			<label class="inline-checkbox" for="contactIsAlsoParticipant">
				<input type="checkbox" id="contactIsAlsoParticipant" name="contactIsAlsoParticipant" value="true"
				       onchange="if(eduBookingView.CheckParticipantCount()) { eduBookingView.ContactAsParticipant(); } else { this.checked = false; return false; }" />
				<?php echo esc_html_x( 'I am also participating', 'frontend', 'eduadmin-booking' ); ?>
			</label>
		</div>
	</label>
	<div class="edu-modal warning" id="edu-warning-participants-contact">
		<?php echo esc_html_x( 'You cannot add any more participants.', 'frontend', 'eduadmin-booking' ); ?>
	</div>
</div>
