<?php
// phpcs:disable WordPress.NamingConventions,Squiz
$block_edit_if_logged_in = get_option( 'eduadmin-blockEditIfLoggedIn', true );
$__block                 = ( $block_edit_if_logged_in && ! empty( $contact->PersonId ) );

if ( ! empty( $customer->BillingInfo ) ) {
	$billing_customer = $customer->BillingInfo[0];
} else {
	$billing_customer = new EduAdmin_Data_BillingInfo();
}
if ( isset( $contact->PersonId ) && 0 !== $contact->PersonId ) {
	echo '<input type="hidden" name="edu-contactId" value="' . esc_attr( $contact->PersonId ) . '" />';
}
if ( isset( $customer->CustomerId ) && 0 !== $customer->CustomerId ) {
	echo '<input type="hidden" name="edu-customerId" value="' . esc_attr( $customer->CustomerId ) . '" />';
}
?>
<div class="contactView">
	<h2><?php esc_html_e( 'Contact information', 'eduadmin-booking' ); ?></h2>
	<label onclick="event.preventDefault()" class="edu-book-singleParticipant-contactName">
		<div class="inputLabel">
			<?php esc_html_e( 'Contact name', 'eduadmin-booking' ); ?>
		</div>
		<div class="inputHolder"><input type="text"
				<?php echo( $__block ? ' readonly' : '' ); ?>
				required onchange="eduBookingView.ContactAsParticipant();" id="edu-contactFirstName" name="contactFirstName" class="first-name" placeholder="<?php esc_attr_e( 'Contact first name', 'eduadmin-booking' ); ?>" value="<?php echo esc_attr( $contact->FirstName ); ?>" /><input type="text" <?php echo( $__block ? ' readonly' : '' ); ?>
				required onchange="eduBookingView.ContactAsParticipant();" id="edu-contactLastName" class="last-name" name="contactLastName" placeholder="<?php esc_attr_e( 'Contact surname', 'eduadmin-booking' ); ?>" value="<?php echo esc_attr( $contact->LastName ); ?>" />
		</div>
	</label>
	<label class="edu-book-singleParticipant-contactEmail">
		<div class="inputLabel">
			<?php esc_html_e( 'E-mail address', 'eduadmin-booking' ); ?>
		</div>
		<div class="inputHolder">
			<input type="email" id="edu-contactEmail" required name="contactEmail"<?php echo( $__block ? ' readonly' : '' ); ?>
				onchange="eduBookingView.ContactAsParticipant();" placeholder="<?php esc_attr_e( 'E-mail address', 'eduadmin-booking' ); ?>" value="<?php echo esc_attr( $contact->Email ); ?>" />
		</div>
	</label>
	<label class="edu-book-singleParticipant-contactPhone">
		<div class="inputLabel">
			<?php esc_html_e( 'Phone number', 'eduadmin-booking' ); ?>
		</div>
		<div class="inputHolder">
			<input type="tel" id="edu-contactPhone" name="contactPhone" onchange="eduBookingView.ContactAsParticipant();" placeholder="<?php esc_attr_e( 'Phone number', 'eduadmin-booking' ); ?>" value="<?php echo esc_attr( $contact->Phone ); ?>" />
		</div>
	</label>
	<label class="edu-book-singleParticipant-contactMobile">
		<div class="inputLabel">
			<?php esc_html_e( 'Mobile number', 'eduadmin-booking' ); ?>
		</div>
		<div class="inputHolder">
			<input type="tel" id="edu-contactMobile" name="contactMobile" onchange="eduBookingView.ContactAsParticipant();" placeholder="<?php esc_attr_e( 'Mobile number', 'eduadmin-booking' ); ?>" value="<?php echo esc_attr( $contact->Mobile ); ?>" />
		</div>
	</label>
	<?php $selected_login_field = get_option( 'eduadmin-loginField', 'Email' ); ?>
	<?php if ( $selected_course['RequireCivicRegistrationNumber'] || 'CivicRegistrationNumber' === $selected_login_field ) { ?>
		<label class="edu-book-singleParticipant-contactCivicRegNo">
			<div class="inputLabel">
				<?php esc_html_e( 'Civic Registration Number', 'eduadmin-booking' ); ?>
			</div>
			<div class="inputHolder">
				<input type="text" id="edu-contactCivReg" required name="contactCivReg" pattern="(\d{2,4})-?(\d{2,2})-?(\d{2,2})-?(\d{4,4})" class="eduadmin-civicRegNo" onchange="eduBookingView.ContactAsParticipant();" placeholder="<?php esc_attr_e( 'Civic Registration Number', 'eduadmin-booking' ); ?>" value="<?php echo esc_attr( $contact->CivicRegistrationNumber ); ?>" />
			</div>
		</label>
	<?php } ?>
	<?php if ( get_option( 'eduadmin-useLogin', false ) && ! $contact->CanLogin ) { ?>
		<label class="edu-book-singleParticipant-contactPassword">
			<div class="inputLabel">
				<?php esc_html_e( 'Please enter a password', 'eduadmin-booking' ); ?>
			</div>
			<div class="inputHolder">
				<input type="password" required name="contactPass" placeholder="<?php esc_attr_e( 'Please enter a password', 'eduadmin-booking' ); ?>" />
			</div>
		</label>
	<?php } ?>
	<div class="edu-modal warning" id="edu-warning-participants-contact">
		<?php esc_html_e( 'You cannot add any more participants.', 'eduadmin-booking' ); ?>
	</div>
</div>
<?php
if ( ! $no_invoice_free_events || ( $no_invoice_free_events && $first_price['Price'] > 0 ) ) {
	?>
	<div class="customerView">
		<label class="edu-book-singleParticipant-customerAddress1">
			<div class="inputLabel">
				<?php esc_html_e( 'Address 1', 'eduadmin-booking' ); ?>
			</div>
			<div class="inputHolder">
				<input type="text" name="customerAddress1" placeholder="<?php esc_attr_e( 'Address 1', 'eduadmin-booking' ); ?>" value="<?php echo esc_attr( $customer->Address ); ?>" />
			</div>
		</label>
		<label class="edu-book-singleParticipant-customerAddress2">
			<div class="inputLabel">
				<?php esc_html_e( 'Address 2', 'eduadmin-booking' ); ?>
			</div>
			<div class="inputHolder">
				<input type="text" name="customerAddress2" placeholder="<?php esc_attr_e( 'Address 2', 'eduadmin-booking' ); ?>" value="<?php echo esc_attr( $customer->Address2 ); ?>" />
			</div>
		</label>
		<label class="edu-book-singleParticipant-customerPostalCode">
			<div class="inputLabel">
				<?php esc_html_e( 'Postal code', 'eduadmin-booking' ); ?>
			</div>
			<div class="inputHolder">
				<input type="text" name="customerPostalCode" placeholder="<?php esc_attr_e( 'Postal code', 'eduadmin-booking' ); ?>" value="<?php echo esc_attr( $customer->Zip ); ?>" />
			</div>
		</label>
		<label class="edu-book-singleParticipant-customerPostalCity">
			<div class="inputLabel">
				<?php esc_html_e( 'Postal city', 'eduadmin-booking' ); ?>
			</div>
			<div class="inputHolder">
				<input type="text" name="customerPostalCity" placeholder="<?php esc_attr_e( 'Postal city', 'eduadmin-booking' ); ?>" value="<?php echo esc_attr( $customer->City ); ?>" />
			</div>
		</label>
	</div>

	<div class="invoiceView__wrapper">
		<?php if ( $show_invoice_email ) { ?>
			<label class="edu-book-singleParticipant-customerInvoiceEmail">
				<div class="inputLabel">
					<?php esc_html_e( 'Invoice e-mail address', 'eduadmin-booking' ); ?>
				</div>
				<div class="inputHolder">
					<input type="text" name="invoiceEmail" placeholder="<?php esc_attr_e( 'Invoice e-mail address', 'eduadmin-booking' ); ?>" value="<?php echo esc_attr( $billing_customer->Email ); ?>" />
				</div>
			</label>
		<?php } ?>
		<label class="edu-book-singleParticipant-customerInvoiceReference">
			<div class="inputLabel">
				<?php esc_html_e( 'Invoice reference', 'eduadmin-booking' ); ?>
			</div>
			<div class="inputHolder">
				<input type="text" name="invoiceReference" placeholder="<?php esc_attr_e( 'Invoice reference', 'eduadmin-booking' ); ?>" value="<?php echo ! empty( $billing_customer->SellerReference ) ? esc_attr( $billing_customer->SellerReference ) : ''; ?>" />
			</div>
		</label>
		<label style="<?php echo $force_show_invoice_information ? 'display: none;' : '' ?>" class="edu-book-singleParticipant-customerInvoiceOtherInfo">
			<div class="inputHolder alsoInvoiceCustomer">
				<input type="checkbox" id="alsoInvoiceCustomer" name="alsoInvoiceCustomer" value="true" onchange="eduBookingView.UpdateInvoiceCustomer(this);"
					<?php echo $force_show_invoice_information ? 'checked' : '' ?>/>
				<label class="inline-checkbox" for="alsoInvoiceCustomer"></label>
				<?php esc_html_e( 'Use other information for invoicing', 'eduadmin-booking' ); ?>
			</div>
		</label>

		<div id="invoiceView" class="invoiceView" style="<?php echo( $force_show_invoice_information ? 'display: block;' : 'display: none;' ); ?>">
			<h2><?php esc_html_e( 'Invoice information', 'eduadmin-booking' ); ?></h2>
			<label class="edu-book-singleParticipant-customerInvoiceName">
				<div class="inputLabel">
					<?php esc_html_e( 'Customer name', 'eduadmin-booking' ); ?>
				</div>
				<div class="inputHolder">
					<input type="text" name="invoiceName" placeholder="<?php esc_attr_e( 'Customer name', 'eduadmin-booking' ); ?>" value="<?php echo esc_attr( $billing_customer->CustomerName ); ?>" />
				</div>
			</label>
			<label class="edu-book-singleParticipant-customerInvoiceOrgNo">
				<div class="inputLabel">
					<?php esc_html_e( 'Org.No.', 'eduadmin-booking' ); ?>
				</div>
				<div class="inputHolder">
					<input type="text" name="invoiceOrgNo" placeholder="<?php esc_attr_e( 'Org.No.', 'eduadmin-booking' ); ?>" value="<?php echo @esc_attr( $billing_customer->OrganisationNumber ); ?>" />
				</div>
			</label>
			<label class="edu-book-singleParticipant-customerInvoiceAddress1">
				<div class="inputLabel">
					<?php esc_html_e( 'Address 1', 'eduadmin-booking' ); ?>
				</div>
				<div class="inputHolder">
					<input type="text" name="invoiceAddress1" placeholder="<?php esc_attr_e( 'Address 1', 'eduadmin-booking' ); ?>" value="<?php echo esc_attr( $billing_customer->Address ); ?>" />
				</div>
			</label>
			<label class="edu-book-singleParticipant-customerInvoiceAddress2">
				<div class="inputLabel">
					<?php esc_html_e( 'Address 2', 'eduadmin-booking' ); ?>
				</div>
				<div class="inputHolder">
					<input type="text" name="invoiceAddress2" placeholder="<?php esc_attr_e( 'Address 2', 'eduadmin-booking' ); ?>" value="<?php echo esc_attr( $billing_customer->Address2 ); ?>" />
				</div>
			</label>
			<label class="edu-book-singleParticipant-customerInvoicePostalCode">
				<div class="inputLabel">
					<?php esc_html_e( 'Postal code', 'eduadmin-booking' ); ?>
				</div>
				<div class="inputHolder">
					<input type="text" name="invoicePostalCode" placeholder="<?php esc_attr_e( 'Postal code', 'eduadmin-booking' ); ?>" value="<?php echo esc_attr( $billing_customer->Zip ); ?>" />
				</div>
			</label>
			<label class="edu-book-singleParticipant-customerInvoicePostalCity">
				<div class="inputLabel">
					<?php esc_html_e( 'Postal city', 'eduadmin-booking' ); ?>
				</div>
				<div class="inputHolder">
					<input type="text" name="invoicePostalCity" placeholder="<?php esc_attr_e( 'Postal city', 'eduadmin-booking' ); ?>" value="<?php echo esc_attr( $billing_customer->City ); ?>" />
				</div>
			</label>
		</div>
		<label class="edu-book-singleParticipant-customerEdiReference">
			<div class="inputLabel">
				<?php esc_html_e( 'EDI Reference', 'eduadmin-booking' ); ?>
			</div>
			<div class="inputHolder">
				<input type="text" name="ediReference" placeholder="<?php esc_attr_e( 'EDI Reference', 'eduadmin-booking' ); ?>" value="<?php echo @esc_attr( ! empty( $billing_customer->EdiReference ) ? $billing_customer->EdiReference : '' ); ?>" />
			</div>
		</label>
	</div>
	<?php if ( get_option( 'eduadmin-useLogin', false ) && get_option( 'eduadmin-allowCustomerUpdate', false ) && isset( $customer->CustomerId ) && 0 !== $customer->CustomerId ) { ?>
		<div class="edu-book-singleParticipant-customerOverwriteData">
			<div class="inputHolder">
				<label class="inline-checkbox" for="overwriteCustomerData">
					<input type="checkbox" id="overwriteCustomerData" name="overwriteCustomerData" value="true" />
					<?php esc_html_e( 'Also update my customer information for future use', 'eduadmin-booking' ); ?>
				</label>
			</div>
		</div>
	<?php } ?>
<?php } ?>
<div class="attributeView">
	<?php
	$contact_custom_fields = get_transient( 'eduadmin-customfields_person' . '__' . EDU()->version );
	if ( ! $contact_custom_fields ) {
		$contact_custom_fields = EDUAPI()->OData->CustomFields->Search(
			null,
			'ShowOnWeb and CustomFieldOwner eq \'Person\'',
			'CustomFieldAlternatives'
		)['value'];
		set_transient( 'eduadmin-customfields_person' . '__' . EDU()->version, $contact_custom_fields, DAY_IN_SECONDS );
	}

	if ( ! empty( $contact_custom_fields ) ) {
		foreach ( $contact_custom_fields as $custom_field ) {
			$data = null;
			if ( ! empty( $contact->CustomFields ) ) {
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

	$customer_custom_fields = get_transient( 'eduadmin-customfields_customer' . '__' . EDU()->version );
	if ( ! $customer_custom_fields ) {
		$customer_custom_fields = EDUAPI()->OData->CustomFields->Search(
			null,
			'ShowOnWeb and CustomFieldOwner eq \'Customer\'',
			'CustomFieldAlternatives'
		)['value'];
		set_transient( 'eduadmin-customfields_customer' . '__' . EDU()->version, $customer_custom_fields, DAY_IN_SECONDS );
	}

	if ( ! empty( $customer_custom_fields ) ) {
		foreach ( $customer_custom_fields as $custom_field ) {
			$data = null;
			if ( ! empty( $customer->CustomFields ) ) {
				foreach ( $customer->CustomFields as $cf ) {
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
			render_attribute( $custom_field, false, 'customer', $data );
		}
	}
	?>
	<?php if ( 'selectParticipant' === get_option( 'eduadmin-selectPricename', 'firstPublic' ) ) { ?>
		<label class="edu-book-singleParticipant-priceName">
			<div class="inputLabel">
				<?php esc_html_e( 'Price name', 'eduadmin-booking' ); ?>
			</div>
			<div class="inputHolder">
				<select name="participantPriceName" required class="edudropdown participantPriceName edu-pricename" onchange="eduBookingView.UpdatePrice();">
					<option data-price="0" value=""><?php esc_html_e( 'Choose price', 'eduadmin-booking' ); ?></option>
					<?php foreach ( $unique_prices as $price ) { ?>
						<option data-price="<?php echo esc_attr( $price['Price'] ); ?>" date-discountpercent="<?php echo esc_attr( $price['DiscountPercent'] ); ?>" data-maxparticipants="<?php echo esc_attr( $price['MaxParticipantNumber'] ); ?>" data-currentparticipants="<?php echo esc_attr( $price['NumberOfParticipants'] ); ?>"
							<?php if ( $price['MaxParticipantNumber'] > 0 && $price['NumberOfParticipants'] >= $price['MaxParticipantNumber'] ) { ?>
								disabled
							<?php } ?>
							value="<?php echo esc_attr( $price['PriceNameId'] ); ?>">
							<?php echo esc_html( $price['PriceNameDescription'] ); ?>
							(<?php echo esc_html( convert_to_money( $price['Price'], get_option( 'eduadmin-currency', 'SEK' ) ) . ' ' . ( $inc_vat ? __( 'inc vat', 'eduadmin-booking' ) : __( 'ex vat', 'eduadmin-booking' ) ) ); ?>)
						</option>
					<?php } ?>
				</select>
			</div>
		</label>
	<?php } ?>
	<div class="participantItem contactPerson">
		<?php
		if ( ! empty( $event['Sessions'] ) ) {
			echo '<h4>' . esc_html__( 'Sub events', 'eduadmin-booking' ) . "</h4>\n";
			foreach ( $event['Sessions'] as $sub_event ) {
				if ( count( $sub_event['PriceNames'] ) > 0 ) {
					$s = current( $sub_event['PriceNames'] )['Price'];
				} else {
					$s = 0;
				}

				echo '<label class="edu-book-singleParticipant-subEvent">';
				echo '<input class="subEventCheckBox" data-price="' . esc_attr( $s ) . '" onchange=eduBookingView.UpdatePrice();" ';
				echo 'name="contactSubEvent_' . esc_attr( $sub_event['SessionId'] ) . '" ';
				echo 'type="checkbox"';
				echo( $sub_event['SelectedByDefault'] || $sub_event['MandatoryParticipation'] ? ' checked="checked"' : '' );
				echo( $sub_event['MandatoryParticipation'] ? ' disabled="disabled"' : '' );
				echo ' value="' . esc_attr( $sub_event['SessionId'] ) . '"> ';
				echo esc_html( wp_strip_all_tags( $sub_event['SessionName'] ) );
				echo esc_html( $hide_sub_event_date_info ? '' : ' (' . date( 'd/m H:i', strtotime( $sub_event['StartDate'] ) ) . ' - ' . date( 'd/m H:i', strtotime( $sub_event['EndDate'] ) ) . ') ' );
				echo( intval( $s ) > 0 ? '&nbsp;<i class="priceLabel">' . esc_html( convert_to_money( $s ) ) . '</i>' : '' );
				echo "</label>\n";
			}
			echo '<br />';
		}

		if ( ! empty( $participant_questions ) ) {
			foreach ( $participant_questions as $question ) {
				render_question( $question, false, 'contact' );
			}
		}
		?>
	</div>
</div>
