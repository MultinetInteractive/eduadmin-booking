<?php
// phpcs:disable WordPress.NamingConventions,Squiz
$block_edit_if_logged_in = EDU()->is_checked( 'eduadmin-blockEditIfLoggedIn', true );
$__block                 = ( $block_edit_if_logged_in && ! empty( $contact->PersonId ) );

$currency = get_option( 'eduadmin-currency', 'SEK' );

if ( ! empty( $customer->BillingInfo ) ) {
	$billing_customer = $customer->BillingInfo;
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
	<h2><?php echo esc_html_x( 'Contact information', 'frontend', 'eduadmin-booking' ); ?></h2>
	<label onclick="event.preventDefault()" class="edu-book-singleParticipant-contactName">
		<div class="inputLabel">
			<?php echo esc_html_x( 'Contact name', 'frontend', 'eduadmin-booking' ); ?>
		</div>
		<div class="inputHolder"><input type="text"
				<?php echo( $__block ? ' readonly' : '' ); ?>
				                        required onchange="eduBookingView.ContactAsParticipant();" autocomplete="off"
				                        id="edu-contactFirstName" name="contactFirstName" class="first-name"
				                        placeholder="<?php echo esc_attr_x( 'Contact first name', 'frontend', 'eduadmin-booking' ); ?>"
				                        value="<?php echo esc_attr( $contact->FirstName ); ?>" /><input
				type="text" <?php echo( $__block ? ' readonly' : '' ); ?>
				required onchange="eduBookingView.ContactAsParticipant();" autocomplete="off" id="edu-contactLastName"
				class="last-name" name="contactLastName"
				placeholder="<?php echo esc_attr_x( 'Contact surname', 'frontend', 'eduadmin-booking' ); ?>"
				value="<?php echo esc_attr( $contact->LastName ); ?>" />
		</div>
	</label>
	<label class="edu-book-singleParticipant-contactEmail">
		<div class="inputLabel">
			<?php echo esc_html_x( 'E-mail address', 'frontend', 'eduadmin-booking' ); ?>
		</div>
		<div class="inputHolder">
			<input type="email" id="edu-contactEmail" autocomplete="off" required
			       name="contactEmail"<?php echo( $__block ? ' readonly' : '' ); ?>
			       onchange="eduBookingView.ContactAsParticipant();"
			       placeholder="<?php echo esc_attr_x( 'E-mail address', 'frontend', 'eduadmin-booking' ); ?>"
			       value="<?php echo esc_attr( $contact->Email ); ?>" />
		</div>
	</label>
	<label class="edu-book-singleParticipant-contactPhone">
		<div class="inputLabel">
			<?php echo esc_html_x( 'Phone number', 'frontend', 'eduadmin-booking' ); ?>
		</div>
		<div class="inputHolder">
			<input type="tel" id="edu-contactPhone" name="contactPhone" autocomplete="off"
			       onchange="eduBookingView.ContactAsParticipant();"
			       placeholder="<?php echo esc_attr_x( 'Phone number', 'frontend', 'eduadmin-booking' ); ?>"
			       value="<?php echo esc_attr( $contact->Phone ); ?>" />
		</div>
	</label>
	<label class="edu-book-singleParticipant-contactMobile">
		<div class="inputLabel">
			<?php echo esc_html_x( 'Mobile number', 'frontend', 'eduadmin-booking' ); ?>
		</div>
		<div class="inputHolder">
			<input type="tel" id="edu-contactMobile" name="contactMobile" autocomplete="off"
			       onchange="eduBookingView.ContactAsParticipant();"
			       placeholder="<?php echo esc_attr_x( 'Mobile number', 'frontend', 'eduadmin-booking' ); ?>"
			       value="<?php echo esc_attr( $contact->Mobile ); ?>" />
		</div>
	</label>
	<?php $selected_login_field = get_option( 'eduadmin-loginField', 'Email' ); ?>
	<?php if ( $selected_course['RequireCivicRegistrationNumber'] || 'CivicRegistrationNumber' === $selected_login_field ) { ?>
		<label class="edu-book-singleParticipant-contactCivicRegNo">
			<div class="inputLabel">
				<?php echo esc_html_x( 'Civic Registration Number', 'frontend', 'eduadmin-booking' ); ?>
			</div>
			<div class="inputHolder">
				<input type="text" id="edu-contactCivReg" required name="contactCivReg" autocomplete="off"
				       pattern="(\d{2,4})-?(\d{2,2})-?(\d{2,2})-?(\d{4,4})" class="eduadmin-civicRegNo"
				       onchange="eduBookingView.ContactAsParticipant();"
				       placeholder="<?php echo esc_attr_x( 'Civic Registration Number', 'frontend', 'eduadmin-booking' ); ?>"
				       value="<?php echo esc_attr( $contact->CivicRegistrationNumber ); ?>" />
			</div>
		</label>
	<?php } ?>
	<?php if ( EDU()->is_checked( 'eduadmin-useLogin', false ) && ! $contact->CanLogin ) { ?>
		<label class="edu-book-singleParticipant-contactPassword">
			<div class="inputLabel">
				<?php echo esc_html_x( 'Please enter a password', 'frontend', 'eduadmin-booking' ); ?>
			</div>
			<div class="inputHolder">
				<input type="password" required name="contactPass" autocomplete="off"
				       placeholder="<?php echo esc_attr_x( 'Please enter a password', 'frontend', 'eduadmin-booking' ); ?>" />
			</div>
		</label>
	<?php } ?>
	<div class="edu-modal warning" id="edu-warning-participants-contact">
		<?php echo esc_html_x( 'You cannot add any more participants.', 'frontend', 'eduadmin-booking' ); ?>
	</div>
</div>
<?php
if ( ! $no_invoice_free_events || ( $no_invoice_free_events && $first_price['Price'] > 0 ) ) {
	?>
	<div class="customerView">
		<label class="edu-book-singleParticipant-customerAddress1">
			<div class="inputLabel">
				<?php echo esc_html_x( 'Address 1', 'frontend', 'eduadmin-booking' ); ?>
			</div>
			<div class="inputHolder">
				<input type="text" name="customerAddress1" autocomplete="off"
				       placeholder="<?php echo esc_attr_x( 'Address 1', 'frontend', 'eduadmin-booking' ); ?>"
				       value="<?php echo esc_attr( $customer->Address ); ?>" />
			</div>
		</label>
		<label class="edu-book-singleParticipant-customerAddress2">
			<div class="inputLabel">
				<?php echo esc_html_x( 'Address 2', 'frontend', 'eduadmin-booking' ); ?>
			</div>
			<div class="inputHolder">
				<input type="text" name="customerAddress2" autocomplete="off"
				       placeholder="<?php echo esc_attr_x( 'Address 2', 'frontend', 'eduadmin-booking' ); ?>"
				       value="<?php echo esc_attr( $customer->Address2 ); ?>" />
			</div>
		</label>
		<label class="edu-book-singleParticipant-customerPostalCode">
			<div class="inputLabel">
				<?php echo esc_html_x( 'Postal code', 'frontend', 'eduadmin-booking' ); ?>
			</div>
			<div class="inputHolder">
				<input type="text" name="customerPostalCode" autocomplete="off"
				       placeholder="<?php echo esc_attr_x( 'Postal code', 'frontend', 'eduadmin-booking' ); ?>"
				       value="<?php echo esc_attr( $customer->Zip ); ?>" />
			</div>
		</label>
		<label class="edu-book-singleParticipant-customerPostalCity">
			<div class="inputLabel">
				<?php echo esc_html_x( 'Postal city', 'frontend', 'eduadmin-booking' ); ?>
			</div>
			<div class="inputHolder">
				<input type="text" name="customerPostalCity" autocomplete="off"
				       placeholder="<?php echo esc_attr_x( 'Postal city', 'frontend', 'eduadmin-booking' ); ?>"
				       value="<?php echo esc_attr( $customer->City ); ?>" />
			</div>
		</label>
		<label class="edu-book-singleParticipant-customerCountry">
			<div class="inputLabel">
				<?php echo esc_html_x( 'Country', 'frontend', 'eduadmin-booking' ); ?>
			</div>
			<div class="inputHolder">
				<?php edu_get_country_list( 'customerCountryCode', $customer->CountryCode ); ?>
			</div>
		</label>
	</div>

	<div class="invoiceView__wrapper">
		<label class="edu-book-invoice-customerInvoiceGLN">
			<div class="inputLabel">
				<span title="<?php echo esc_attr_x( 'Global Location Number', 'frontend', 'eduadmin-booking' ); ?>"
				      class="tooltip-element">
					<?php echo esc_html_x( 'GLN', 'frontend', 'eduadmin-booking' ); ?>
				</span>
			</div>
			<div class="inputHolder">
				<input type="text" name="invoiceGLN" autocomplete="off"
				       placeholder="<?php echo esc_attr_x( 'GLN', 'frontend', 'eduadmin-booking' ); ?>"
				       value="<?php echo @esc_attr( $billing_customer->GLN ); ?>" />
			</div>
		</label>
		<?php if ( $show_invoice_email ) { ?>
			<label class="edu-book-singleParticipant-customerInvoiceEmail">
				<div class="inputLabel">
					<?php echo esc_html_x( 'Invoice e-mail address', 'frontend', 'eduadmin-booking' ); ?>
				</div>
				<div class="inputHolder">
					<input type="text" name="invoiceEmail" autocomplete="off"
					       placeholder="<?php echo esc_attr_x( 'Invoice e-mail address', 'frontend', 'eduadmin-booking' ); ?>"
					       value="<?php echo esc_attr( $billing_customer->Email ); ?>" />
				</div>
			</label>
		<?php } ?>
		<label class="edu-book-singleParticipant-customerInvoiceReference">
			<div class="inputLabel">
				<?php echo esc_html_x( 'Invoice reference', 'frontend', 'eduadmin-booking' ); ?>
			</div>
			<div class="inputHolder">
				<input type="text" name="invoiceReference" autocomplete="off"
				       placeholder="<?php echo esc_attr_x( 'Invoice reference', 'frontend', 'eduadmin-booking' ); ?>"
				       value="<?php echo ! empty( $billing_customer->SellerReference ) ? esc_attr( $billing_customer->SellerReference ) : ''; ?>" />
			</div>
		</label>
		<label style="<?php echo $force_show_invoice_information ? 'display: none;' : '' ?>"
		       class="edu-book-singleParticipant-customerInvoiceOtherInfo">
			<div class="inputHolder alsoInvoiceCustomer">
				<input type="checkbox" id="alsoInvoiceCustomer" name="alsoInvoiceCustomer" value="true"
				       onchange="eduBookingView.UpdateInvoiceCustomer(this);"
					<?php echo $force_show_invoice_information ? 'checked' : '' ?>/>
				<label class="inline-checkbox" for="alsoInvoiceCustomer"></label>
				<?php echo esc_html_x( 'Use other information for invoicing', 'frontend', 'eduadmin-booking' ); ?>
			</div>
		</label>

		<div id="invoiceView" class="invoiceView"
		     style="<?php echo( $force_show_invoice_information ? 'display: block;' : 'display: none;' ); ?>">
			<h2><?php echo esc_html_x( 'Invoice information', 'frontend', 'eduadmin-booking' ); ?></h2>
			<label class="edu-book-singleParticipant-customerInvoiceName">
				<div class="inputLabel">
					<?php echo esc_html_x( 'Customer name', 'frontend', 'eduadmin-booking' ); ?>
				</div>
				<div class="inputHolder">
					<input type="text" name="invoiceName" autocomplete="off"
					       placeholder="<?php echo esc_attr_x( 'Customer name', 'frontend', 'eduadmin-booking' ); ?>"
					       value="<?php echo esc_attr( $billing_customer->CustomerName ); ?>" />
				</div>
			</label>
			<label class="edu-book-singleParticipant-customerInvoiceOrgNo">
				<div class="inputLabel">
					<?php echo esc_html_x( 'Org.No.', 'frontend', 'eduadmin-booking' ); ?>
				</div>
				<div class="inputHolder">
					<input type="text" name="invoiceOrgNo" autocomplete="off"
					       placeholder="<?php echo esc_attr_x( 'Org.No.', 'frontend', 'eduadmin-booking' ); ?>"
					       value="<?php echo @esc_attr( $billing_customer->OrganisationNumber ); ?>" />
				</div>
			</label>
			<label class="edu-book-singleParticipant-customerInvoiceAddress1">
				<div class="inputLabel">
					<?php echo esc_html_x( 'Address 1', 'frontend', 'eduadmin-booking' ); ?>
				</div>
				<div class="inputHolder">
					<input type="text" name="invoiceAddress1" autocomplete="off"
					       placeholder="<?php echo esc_attr_x( 'Address 1', 'frontend', 'eduadmin-booking' ); ?>"
					       value="<?php echo esc_attr( $billing_customer->Address ); ?>" />
				</div>
			</label>
			<label class="edu-book-singleParticipant-customerInvoiceAddress2">
				<div class="inputLabel">
					<?php echo esc_html_x( 'Address 2', 'frontend', 'eduadmin-booking' ); ?>
				</div>
				<div class="inputHolder">
					<input type="text" name="invoiceAddress2" autocomplete="off"
					       placeholder="<?php echo esc_attr_x( 'Address 2', 'frontend', 'eduadmin-booking' ); ?>"
					       value="<?php echo esc_attr( $billing_customer->Address2 ); ?>" />
				</div>
			</label>
			<label class="edu-book-singleParticipant-customerInvoicePostalCode">
				<div class="inputLabel">
					<?php echo esc_html_x( 'Postal code', 'frontend', 'eduadmin-booking' ); ?>
				</div>
				<div class="inputHolder">
					<input type="text" name="invoicePostalCode" autocomplete="off"
					       placeholder="<?php echo esc_attr_x( 'Postal code', 'frontend', 'eduadmin-booking' ); ?>"
					       value="<?php echo esc_attr( $billing_customer->Zip ); ?>" />
				</div>
			</label>
			<label class="edu-book-singleParticipant-customerInvoicePostalCity">
				<div class="inputLabel">
					<?php echo esc_html_x( 'Postal city', 'frontend', 'eduadmin-booking' ); ?>
				</div>
				<div class="inputHolder">
					<input type="text" name="invoicePostalCity" autocomplete="off"
					       placeholder="<?php echo esc_attr_x( 'Postal city', 'frontend', 'eduadmin-booking' ); ?>"
					       value="<?php echo esc_attr( $billing_customer->City ); ?>" />
				</div>
			</label>
			<label class="edu-book-singleParticipant-invoice-customerCountry">
				<div class="inputLabel">
					<?php echo esc_html_x( 'Country', 'frontend', 'eduadmin-booking' ); ?>
				</div>
				<div class="inputHolder">
					<?php edu_get_country_list( 'invoiceCountryCode', $billing_customer->CountryCode, false ); ?>
				</div>
			</label>
		</div>
		<label class="edu-book-singleParticipant-customerEdiReference">
			<div class="inputLabel">
				<?php echo esc_html_x( 'EDI Reference', 'frontend', 'eduadmin-booking' ); ?>
			</div>
			<div class="inputHolder">
				<input type="text" name="ediReference" autocomplete="off"
				       placeholder="<?php echo esc_attr_x( 'EDI Reference', 'frontend', 'eduadmin-booking' ); ?>"
				       value="<?php echo @esc_attr( ! empty( $billing_customer->EdiReference ) ? $billing_customer->EdiReference : '' ); ?>" />
			</div>
		</label>
	</div>
	<?php if ( EDU()->is_checked( 'eduadmin-useLogin', false ) && EDU()->is_checked( 'eduadmin-allowCustomerUpdate', false ) && isset( $customer->CustomerId ) && 0 !== $customer->CustomerId ) { ?>
		<div class="edu-book-singleParticipant-customerOverwriteData">
			<div class="inputHolder">
				<label class="inline-checkbox" for="overwriteCustomerData">
					<input type="checkbox" id="overwriteCustomerData" name="overwriteCustomerData" value="true" />
					<?php echo esc_html_x( 'Also update my customer information for future use', 'frontend', 'eduadmin-booking' ); ?>
				</label>
			</div>
		</div>
	<?php } ?><?php } ?>
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
				<?php echo esc_html_x( 'Price name', 'frontend', 'eduadmin-booking' ); ?>
			</div>
			<div class="inputHolder">
				<select name="participantPriceName" autocomplete="off" required
				        class="edudropdown participantPriceName edu-pricename" onchange="eduBookingView.UpdatePrice();">
					<option data-price="0"
					        value=""><?php echo esc_html_x( 'Choose price', 'frontend', 'eduadmin-booking' ); ?></option>
					<?php foreach ( $unique_prices as $price ) { ?>
						<option data-price="<?php echo esc_attr( $price['Price'] ); ?>"
						        date-discountpercent="<?php echo esc_attr( $price['DiscountPercent'] ); ?>"
						        data-maxparticipants="<?php echo esc_attr( $price['MaxParticipantNumber'] ); ?>"
						        data-currentparticipants="<?php echo esc_attr( $price['NumberOfParticipants'] ); ?>"
							<?php if ( $price['MaxParticipantNumber'] > 0 && $price['NumberOfParticipants'] >= $price['MaxParticipantNumber'] ) { ?>
								disabled
							<?php } ?>
							    value="<?php echo esc_attr( $price['PriceNameId'] ); ?>">
							<?php echo esc_html( $price['PriceNameDescription'] ); ?>
							(<?php echo esc_html( edu_get_price( $price['Price'], $selected_course['ParticipantVat'] ) ); ?>)
						</option>
					<?php } ?>
				</select>
			</div>
		</label>
	<?php } ?>
	<div class="participantItem contactPerson">
		<?php
		if ( ! empty( $event['Sessions'] ) ) {
			echo '<h4>' . esc_html_x( 'Sub events', 'frontend', 'eduadmin-booking' ) . "</h4>\n";
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
				echo esc_html( $hide_sub_event_date_info ? '' : ' (' . edu_get_timezoned_date( 'd/m H:i', $sub_event['StartDate'] ) . ' - ' . edu_get_timezoned_date( 'd/m H:i', $sub_event['EndDate'] ) . ') ' );
				echo( intval( $s ) > 0 ? '&nbsp;<i class="priceLabel">' . esc_html( edu_get_price( $s, $selected_course['ParticipantVat'] ) ) . '</i>' : '' );
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
