<?php
ob_start();
// phpcs:disable WordPress.NamingConventions,Squiz
if ( ! EDU()->api_connection ) {
	echo esc_html_x( 'EduAdmin Booking could not connect to the API', 'frontend', 'eduadmin-booking' );
} else {
	if ( ! empty( $_POST['edu-valid-form'] ) && wp_verify_nonce( $_POST['edu-valid-form'], 'edu-booking-confirm' ) && isset( $_POST['act'] ) && 'bookProgramme' === sanitize_text_field( $_POST['act'] ) ) {
		$error_list = apply_filters( 'edu-booking-error', array() );
		if ( ! empty( $error_list ) ) {
			echo '<div class="eduadmin">';
			foreach ( $error_list as $error ) {
				?>
				<div class="edu-modal warning">
					<?php echo esc_html( $error ); ?>
				</div>
				<?php
			}
			do_action( 'eduadmin-bookingerror', $error_list );
			echo '</div>';
		} else {
			$ebi = $GLOBALS['edubookinginfo'];
			do_action( 'eduadmin-processbooking', $ebi );
			do_action( 'eduadmin-bookingcompleted' );
		}
	} else {
		if ( EDU()->is_checked( 'eduadmin-useBookingFormFromApi', false ) ) {
			if ( ! empty( $programme['BookingFormUrl'] ) ) {
				?>
				<iframe id="eduadmin-booking-frame" class="edu-bookingform-page-frame"
				        src="<?php echo esc_attr( $programme['BookingFormUrl'] ); ?>"></iframe>
				<?php
				if ( ! empty( trim( EDU()->get_option( 'eduadmin-booking-form-javascript', '' ) ) ) ) {
					?>
					<script type="text/javascript">
						<?php echo EDU()->get_option( 'eduadmin-booking-form-javascript', '' ); ?>
					</script>
					<?php
					$GLOBALS['eduadmin-booking-form-javascript-set'] = true;
				}
			} else {
				echo _x( 'The booking form needs configuration in EduAdmin before this works.', 'frontend', 'eduadmin-booking' );
			}

			return;
		}

		$contact  = new EduAdmin_Data_ContactPerson();
		$customer = new EduAdmin_Data_Customer();

		$discount_percent             = 0.0;
		$participant_discount_percent = 0.0;
		$customer_invoice_email       = '';

		if ( isset( EDU()->session['eduadmin-loginUser'] ) ) {
			$user     = EDU()->session['eduadmin-loginUser'];
			$contact  = $user->Contact;
			$customer = $user->Customer;
		}

		$no_invoice_free_events = EDU()->is_checked( 'eduadmin-noInvoiceFreeEvents', false );

		$first_price = current( $programme['PriceNames'] );

		$show_invoice_email             = isset( $attributes['hideinvoiceemailfield'] ) ? false === $attributes['hideinvoiceemailfield'] : ! EDU()->is_checked( 'eduadmin-hideInvoiceEmailField', false );
		$force_show_invoice_information = isset( $attributes['showinvoiceinformation'] ) ? false === $attributes['showinvoiceinformation'] : EDU()->is_checked( 'eduadmin-showInvoiceInformation', false );

		$block_edit_if_logged_in = EDU()->is_checked( 'eduadmin-blockEditIfLoggedIn', true );
		$__block                 = ( $block_edit_if_logged_in && isset( $contact->PersonId ) && 0 !== $contact->PersonId );

		$questions = EDUAPI()->REST->ProgrammeStart->BookingQuestions( $programme['ProgrammeStartId'], true );

		$booking_questions     = $questions['BookingQuestions'];
		$participant_questions = $questions['ParticipantQuestions'];

		?>
		<div class="eduadmin booking-page" data-courseid="<?php echo esc_attr( $programme['ProgrammeId'] ); ?>"
		     data-eventid="<?php echo( isset( $_REQUEST['id'] ) ? esc_attr( sanitize_text_field( $_REQUEST['id'] ) ) : '' ); ?>">
			<form action="" method="post" id="edu-booking-form">
				<input type="hidden" name="act" value="bookProgramme" />
				<input type="hidden" name="edu-programme-start" value="<?php echo intval( $_REQUEST['id'] ); ?>" />
				<input type="hidden" name="edu-valid-form"
				       value="<?php echo esc_attr( wp_create_nonce( 'edu-booking-confirm' ) ); ?>" />
				<div class="not-a-good-idea">
					<input type="text" name="username" />
					<input type="text" name="email" />
				</div>
				<a href="javascript://" onclick="eduGlobalMethods.GoBack('../', event);"
				   class="backLink"><?php echo esc_html_x( '« Go back', 'frontend', 'eduadmin-booking' ); ?></a>

				<div class="title">
					<h1 class="courseTitle">
						<?php echo esc_html( $programme['ProgrammeStartName'] ) . ' (' . wp_kses_post( get_display_date( $programme['StartDate'] ) ) . ' - ' . wp_kses_post( get_display_date( $programme['EndDate'] ) ) . ')'; ?>
					</h1>
				</div>
				<?php

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
				<br />
				<div class="contactView">
					<h2><?php echo esc_html_x( 'Contact information', 'frontend', 'eduadmin-booking' ); ?></h2>
					<label onclick="event.preventDefault()" class="edu-book-contact-contactName">
						<div class="inputLabel">
							<?php echo esc_html_x( 'Contact name', 'frontend', 'eduadmin-booking' ); ?>
						</div>
						<div class="inputHolder"><input type="text" autocomplete="off"
								<?php echo( $__block ? ' readonly' : '' ); ?>
								                        required onchange="eduBookingView.ContactAsParticipant();"
								                        id="edu-contactFirstName" name="contactFirstName"
								                        class="first-name" maxlength="100"
								                        placeholder="<?php echo esc_attr_x( 'Contact first name', 'frontend', 'eduadmin-booking' ); ?>"
								                        value="<?php echo esc_attr( $contact->FirstName ); ?>" /><input
								type="text" <?php echo( $__block ? ' readonly' : '' ); ?>
								required onchange="eduBookingView.ContactAsParticipant();" id="edu-contactLastName"
								class="last-name" name="contactLastName" maxlength="100"
								placeholder="<?php echo esc_attr_x( 'Contact surname', 'frontend', 'eduadmin-booking' ); ?>"
								value="<?php echo esc_attr( $contact->LastName ); ?>" />
						</div>
					</label>
					<label class="edu-book-contact-contactEmail">
						<div class="inputLabel">
							<?php echo esc_html_x( 'E-mail address', 'frontend', 'eduadmin-booking' ); ?>
						</div>
						<div class="inputHolder">
							<input type="email" autocomplete="off" id="edu-contactEmail" required
							       name="contactEmail"<?php echo( $__block ? ' readonly' : '' ); ?>
							       onchange="eduBookingView.ContactAsParticipant();" maxlength="200"
							       placeholder="<?php echo esc_attr_x( 'E-mail address', 'frontend', 'eduadmin-booking' ); ?>"
							       value="<?php echo esc_attr( $contact->Email ); ?>" />
						</div>
					</label>
					<label class="edu-book-contact-contactPhone">
						<div class="inputLabel">
							<?php echo esc_html_x( 'Phone number', 'frontend', 'eduadmin-booking' ); ?>
						</div>
						<div class="inputHolder">
							<input type="tel" autocomplete="off" id="edu-contactPhone" name="contactPhone"
							       onchange="eduBookingView.ContactAsParticipant();" maxlength="100"
							       placeholder="<?php echo esc_attr_x( 'Phone number', 'frontend', 'eduadmin-booking' ); ?>"
							       value="<?php echo esc_attr( $contact->Phone ); ?>" />
						</div>
					</label>
					<label class="edu-book-contact-contactMobile">
						<div class="inputLabel">
							<?php echo esc_html_x( 'Mobile number', 'frontend', 'eduadmin-booking' ); ?>
						</div>
						<div class="inputHolder">
							<input type="tel" autocomplete="off" id="edu-contactMobile" name="contactMobile"
							       onchange="eduBookingView.ContactAsParticipant();" maxlength="100"
							       placeholder="<?php echo esc_attr_x( 'Mobile number', 'frontend', 'eduadmin-booking' ); ?>"
							       value="<?php echo esc_attr( $contact->Mobile ); ?>" />
						</div>
					</label>
					<?php $selected_login_field = EDU()->get_option( 'eduadmin-loginField', 'Email' ); ?>
					<?php if ( 'CivicRegistrationNumber' === $selected_login_field ) { ?>
						<label class="edu-book-contact-contactCivicRegNo">
							<div class="inputLabel">
								<?php echo esc_html_x( 'Civic Registration Number', 'frontend', 'eduadmin-booking' ); ?>
							</div>
							<div class="inputHolder">
								<input type="text" autocomplete="off" id="edu-contactCivReg" required
								       name="contactCivReg" pattern="(\d{2,4})-?(\d{2,2})-?(\d{2,2})-?(\d{4,4})"
								       class="eduadmin-civicRegNo" onchange="eduBookingView.ContactAsParticipant();"
								       maxlength="50"
								       placeholder="<?php echo esc_attr_x( 'Civic Registration Number', 'frontend', 'eduadmin-booking' ); ?>"
								       value="<?php echo esc_attr( $contact->CivicRegistrationNumber ); ?>" />
							</div>
						</label>
					<?php } ?>
					<?php if ( EDU()->is_checked( 'eduadmin-useLogin', false ) && ! $contact->CanLogin ) { ?>
						<label class="edu-book-contact-contactPassword">
							<div class="inputLabel">
								<?php echo esc_html_x( 'Please enter a password', 'frontend', 'eduadmin-booking' ); ?>
							</div>
							<div class="inputHolder">
								<input type="password" autocomplete="off" required name="contactPass" maxlength="50"
								       placeholder="<?php echo esc_attr_x( 'Please enter a password', 'frontend', 'eduadmin-booking' ); ?>" />
							</div>
						</label>
					<?php } ?>
					<div class="edu-modal warning" id="edu-warning-participants-contact">
						<?php echo esc_html_x( 'You cannot add any more participants.', 'frontend', 'eduadmin-booking' ); ?>
					</div>
				</div>
				<div class="attributeView">
					<?php
					$contact_custom_fields = EDUAPI()->OData->CustomFields->Search(
						null,
						'ShowOnWeb and CustomFieldOwner eq \'Person\'',
						'CustomFieldAlternatives',
						'SortIndex'
					)['value'];

					foreach ( $contact_custom_fields as $custom_field ) {
						$data = null;
						if ( null !== $contact && null !== $contact->CustomFields ) {
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

					?>
				</div>
				<div class="customerView">
					<h2><?php echo esc_html_x( 'Customer information', 'frontend', 'eduadmin-booking' ); ?></h2>
					<label class="edu-book-customerName">
						<div class="inputLabel">
							<?php echo esc_html_x( 'Customer name', 'frontend', 'eduadmin-booking' ); ?>
						</div>
						<div class="inputHolder">
							<input type="text" autocomplete="off" required name="customerName"
							       autocomplete="organization" maxlength="200"
							       placeholder="<?php echo esc_attr_x( 'Customer name', 'frontend', 'eduadmin-booking' ); ?>"
							       value="<?php echo esc_attr( $customer->CustomerName ); ?>" />
						</div>
					</label>
					<?php
					if ( empty( $no_invoice_free_events ) || ( $no_invoice_free_events && $first_price['Price'] > 0 ) ) {
						?>
						<label class="edu-book-customerVatNo">
							<div class="inputLabel">
								<?php echo esc_html_x( 'Org.No.', 'frontend', 'eduadmin-booking' ); ?>
							</div>
							<div class="inputHolder">
								<input type="text" autocomplete="off" name="customerVatNo" maxlength="50"
								       placeholder="<?php echo esc_attr_x( 'Org.No.', 'frontend', 'eduadmin-booking' ); ?>"
								       value="<?php echo esc_attr( $customer->OrganisationNumber ); ?>" />
							</div>
						</label>
						<label class="edu-book-customerAddress1">
							<div class="inputLabel">
								<?php echo esc_html_x( 'Address 1', 'frontend', 'eduadmin-booking' ); ?>
							</div>
							<div class="inputHolder">
								<input type="text" autocomplete="off" name="customerAddress1" maxlength="200"
								       placeholder="<?php echo esc_attr_x( 'Address 1', 'frontend', 'eduadmin-booking' ); ?>"
								       value="<?php echo esc_attr( $customer->Address ); ?>" />
							</div>
						</label>
						<label class="edu-book-customerAddress2">
							<div class="inputLabel">
								<?php echo esc_html_x( 'Address 2', 'frontend', 'eduadmin-booking' ); ?>
							</div>
							<div class="inputHolder">
								<input type="text" autocomplete="off" name="customerAddress2" maxlength="200"
								       placeholder="<?php echo esc_attr_x( 'Address 2', 'frontend', 'eduadmin-booking' ); ?>"
								       value="<?php echo esc_attr( $customer->Address2 ); ?>" />
							</div>
						</label>
						<label class="edu-book-customerPostalCode">
							<div class="inputLabel">
								<?php echo esc_html_x( 'Postal code', 'frontend', 'eduadmin-booking' ); ?>
							</div>
							<div class="inputHolder">
								<input type="text" autocomplete="off" name="customerPostalCode" maxlength="50"
								       placeholder="<?php echo esc_attr_x( 'Postal code', 'frontend', 'eduadmin-booking' ); ?>"
								       value="<?php echo esc_attr( $customer->Zip ); ?>" />
							</div>
						</label>
						<label class="edu-book-customerPostalCity">
							<div class="inputLabel">
								<?php echo esc_html_x( 'Postal city', 'frontend', 'eduadmin-booking' ); ?>
							</div>
							<div class="inputHolder">
								<input type="text" autocomplete="off" name="customerPostalCity" maxlength="200"
								       placeholder="<?php echo esc_attr_x( 'Postal city', 'frontend', 'eduadmin-booking' ); ?>"
								       value="<?php echo esc_attr( $customer->City ); ?>" />
							</div>
						</label>
						<label class="edu-book-customerCountry">
							<div class="inputLabel">
								<?php echo esc_html_x( 'Country', 'frontend', 'eduadmin-booking' ); ?>
							</div>
							<div class="inputHolder">
								<?php edu_get_country_list( 'customerCountryCode', $customer->CountryCode ); ?>
							</div>
						</label>
						<label class="edu-book-customerEmailAddress">
							<div class="inputLabel">
								<?php echo esc_html_x( 'E-mail address', 'frontend', 'eduadmin-booking' ); ?>
							</div>
							<div class="inputHolder">
								<input type="text" autocomplete="off" name="customerEmail" maxlength="200"
								       placeholder="<?php echo esc_attr_x( 'E-mail address', 'frontend', 'eduadmin-booking' ); ?>"
								       value="<?php echo esc_attr( $customer->Email ); ?>" />
							</div>
						</label>
						<div id="invoiceView" class="invoiceView"
						     style="<?php echo( $force_show_invoice_information ? 'display: block;' : 'display: none;' ); ?>">
							<h2><?php echo esc_html_x( 'Invoice information', 'frontend', 'eduadmin-booking' ); ?></h2>
							<label class="edu-book-invoice-customerName">
								<div class="inputLabel">
									<?php echo esc_html_x( 'Customer name', 'frontend', 'eduadmin-booking' ); ?>
								</div>
								<div class="inputHolder">
									<input type="text" autocomplete="off" name="invoiceName" maxlength="200"
									       placeholder="<?php echo esc_attr_x( 'Customer name', 'frontend', 'eduadmin-booking' ); ?>"
									       value="<?php echo esc_attr( $billing_customer->CustomerName ); ?>" />
								</div>
							</label>
							<label class="edu-book-invoice-customerAddress1">
								<div class="inputLabel">
									<?php echo esc_html_x( 'Address 1', 'frontend', 'eduadmin-booking' ); ?>
								</div>
								<div class="inputHolder">
									<input type="text" autocomplete="off" name="invoiceAddress1" maxlength="200"
									       placeholder="<?php echo esc_attr_x( 'Address 1', 'frontend', 'eduadmin-booking' ); ?>"
									       value="<?php echo esc_attr( $billing_customer->Address ); ?>" />
								</div>
							</label>
							<label class="edu-book-invoice-customerAddress2">
								<div class="inputLabel">
									<?php echo esc_html_x( 'Address 2', 'frontend', 'eduadmin-booking' ); ?>
								</div>
								<div class="inputHolder">
									<input type="text" autocomplete="off" name="invoiceAddress2" maxlength="200"
									       placeholder="<?php echo esc_attr_x( 'Address 2', 'frontend', 'eduadmin-booking' ); ?>"
									       value="<?php echo esc_attr( $billing_customer->Address2 ); ?>" />
								</div>
							</label>
							<label class="edu-book-invoice-customerPostalCode">
								<div class="inputLabel">
									<?php echo esc_html_x( 'Postal code', 'frontend', 'eduadmin-booking' ); ?>
								</div>
								<div class="inputHolder">
									<input type="text" autocomplete="off" name="invoicePostalCode" maxlength="50"
									       placeholder="<?php echo esc_attr_x( 'Postal code', 'frontend', 'eduadmin-booking' ); ?>"
									       value="<?php echo esc_attr( $billing_customer->Zip ); ?>" />
								</div>
							</label>
							<label class="edu-book-invoice-customerPostalCity">
								<div class="inputLabel">
									<?php echo esc_html_x( 'Postal city', 'frontend', 'eduadmin-booking' ); ?>
								</div>
								<div class="inputHolder">
									<input type="text" autocomplete="off" name="invoicePostalCity" maxlength="200"
									       placeholder="<?php echo esc_attr_x( 'Postal city', 'frontend', 'eduadmin-booking' ); ?>"
									       value="<?php echo esc_attr( $billing_customer->City ); ?>" />
								</div>
							</label>
							<label class="edu-book-invoice-customerCountry">
								<div class="inputLabel">
									<?php echo esc_html_x( 'Country', 'frontend', 'eduadmin-booking' ); ?>
								</div>
								<div class="inputHolder">
									<?php edu_get_country_list( 'invoiceCountryCode', $billing_customer->CountryCode, false ); ?>
								</div>
							</label>
						</div>
						<?php if ( $show_invoice_email ) { ?>
							<label class="edu-book-invoice-customerInvoiceEmail">
								<div class="inputLabel">
									<?php echo esc_html_x( 'Invoice e-mail address', 'frontend', 'eduadmin-booking' ); ?>
								</div>
								<div class="inputHolder">
									<input type="text" autocomplete="off" name="invoiceEmail" maxlength="20"
									       placeholder="<?php echo esc_attr_x( 'Invoice e-mail address', 'frontend', 'eduadmin-booking' ); ?>"
									       value="<?php echo esc_attr( $billing_customer->Email ); ?>" />
								</div>
							</label>
						<?php } ?>
						<label class="edu-book-invoice-customerInvoiceReference">
							<div class="inputLabel">
								<?php echo esc_html_x( 'Invoice reference', 'frontend', 'eduadmin-booking' ); ?>
							</div>
							<div class="inputHolder">
								<input type="text" autocomplete="off" name="invoiceReference" maxlength="100"
								       placeholder="<?php echo esc_attr_x( 'Invoice reference', 'frontend', 'eduadmin-booking' ); ?>"
								       value="<?php echo esc_attr( ! empty( $billing_customer->SellerReference ) ? $billing_customer->SellerReference : '' ); ?>" />
							</div>
						</label>
						<label class="edu-book-invoice-customerPurchaseOrderNumber">
							<div class="inputLabel">
								<?php echo esc_html_x( 'Purchase order number', 'frontend', 'eduadmin-booking' ); ?>
							</div>
							<div class="inputHolder">
								<input type="text" autocomplete="off" name="purchaseOrderNumber" maxlength="200"
								       placeholder="<?php echo esc_attr_x( 'Purchase order number', 'frontend', 'eduadmin-booking' ); ?>"
								       value="<?php echo esc_attr( ! empty( $_POST['purchaseOrderNumber'] ) ? $_POST['purchaseOrderNumber'] : '' ); ?>" />
							</div>
						</label>
						<label class="edu-book-invoice-customerEdiReference">
							<div class="inputLabel">
								<?php echo esc_html_x( 'EDI Reference', 'frontend', 'eduadmin-booking' ); ?>
							</div>
							<div class="inputHolder">
								<input type="text" autocomplete="off" name="ediReference" maxlength="100"
								       placeholder="<?php echo esc_attr_x( 'EDI Reference', 'frontend', 'eduadmin-booking' ); ?>"
								       value="<?php echo esc_attr( ! empty( $billing_customer->EdiReference ) ? $billing_customer->EdiReference : '' ); ?>" />
							</div>
						</label>
						<?php
					}

					$customer_custom_fields = EDUAPI()->OData->CustomFields->Search(
						null,
						'ShowOnWeb and CustomFieldOwner eq \'Customer\'',
						'CustomFieldAlternatives',
						'SortIndex'
					)['value'];

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
					if ( ! $no_invoice_free_events || $first_price['Price'] > 0 ) {
						?>
						<label<?php echo $force_show_invoice_information ? ' style="display: none;"' : ''; ?>>
							<div class="inputHolder alsoInvoiceCustomer">
								<label class="inline-checkbox" for="alsoInvoiceCustomer">
									<input type="checkbox" id="alsoInvoiceCustomer" name="alsoInvoiceCustomer"
									       value="true" onchange="eduBookingView.UpdateInvoiceCustomer(this);"
										<?php echo $force_show_invoice_information ? 'checked' : ''; ?>/>
									<?php echo esc_html_x( 'Use other information for invoicing', 'frontend', 'eduadmin-booking' ); ?>
								</label>
							</div>
						</label>
					<?php } ?>
					<?php if ( EDU()->is_checked( 'eduadmin-useLogin', false ) && EDU()->is_checked( 'eduadmin-allowCustomerUpdate', false ) && isset( $customer->CustomerId ) && 0 !== $customer->CustomerId ) { ?>
						<label>
							<div class="inputHolder">
								<label class="inline-checkbox" for="overwriteCustomerData">
									<input type="checkbox" id="overwriteCustomerData" name="overwriteCustomerData"
									       value="true" />
									<?php echo esc_html_x( 'Also update my customer information for future use', 'frontend', 'eduadmin-booking' ); ?>
								</label>
							</div>
						</label>
					<?php } ?>
				</div>
				<div class="questionPanel">
					<?php
					if ( ! empty( $_REQUEST['eid'] ) ) {
						foreach ( $booking_questions as $question ) {
							render_question( $question, false, 'booking' );
						}
					}
					?>
				</div>
				<div class="participantView">
					<h2><?php echo esc_html_x( 'Participant information', 'frontend', 'eduadmin-booking' ); ?></h2>
					<div class="participantHolder" id="edu-participantHolder">
						<div class="participantItem template" style="display: none;">
							<h3>
								<?php echo esc_html_x( 'Participant', 'frontend', 'eduadmin-booking' ); ?>
								<?php if ( ! EDU()->is_checked( 'eduadmin-singlePersonBooking', false ) ) { ?>
									<div class="removeParticipant"
									     onclick="eduBookingView.RemoveParticipant(this);"><?php echo esc_html_x( 'Remove', 'frontend', 'eduadmin-booking' ); ?></div>
								<?php } ?>
							</h3>
							<label onclick="event.preventDefault()">
								<div class="inputLabel">
									<?php echo esc_html_x( 'Participant name', 'frontend', 'eduadmin-booking' ); ?>
								</div>
								<div class="inputHolder">
									<input type="text" autocomplete="off" class="participantFirstName first-name"
									       onchange="eduBookingView.CheckPrice(false);" name="participantFirstName[]"
									       maxlength="100"
									       placeholder="<?php echo esc_attr_x( 'Participant first name', 'frontend', 'eduadmin-booking' ); ?>" /><input
										type="text" class="participantLastName last-name"
										onchange="eduBookingView.CheckPrice(false);" name="participantLastName[]"
										maxlength="100"
										placeholder="<?php echo esc_attr_x( 'Participant surname', 'frontend', 'eduadmin-booking' ); ?>" />
								</div>
							</label>
							<label>
								<div class="inputLabel">
									<?php echo esc_html_x( 'E-mail address', 'frontend', 'eduadmin-booking' ); ?>
								</div>
								<div class="inputHolder">
									<input type="email" autocomplete="off" name="participantEmail[]"
									       onchange="eduBookingView.CheckPrice(false);" maxlength="200"
									       placeholder="<?php echo esc_attr_x( 'E-mail address', 'frontend', 'eduadmin-booking' ); ?>" />
								</div>
							</label>
							<label>
								<div class="inputLabel">
									<?php echo esc_html_x( 'Phone number', 'frontend', 'eduadmin-booking' ); ?>
								</div>
								<div class="inputHolder">
									<input type="tel" autocomplete="off" name="participantPhone[]" maxlength="100"
									       placeholder="<?php echo esc_attr_x( 'Phone number', 'frontend', 'eduadmin-booking' ); ?>" />
								</div>
							</label>
							<label>
								<div class="inputLabel">
									<?php echo esc_html_x( 'Mobile number', 'frontend', 'eduadmin-booking' ); ?>
								</div>
								<div class="inputHolder">
									<input type="tel" autocomplete="off" name="participantMobile[]" maxlength="100"
									       placeholder="<?php echo esc_attr_x( 'Mobile number', 'frontend', 'eduadmin-booking' ); ?>" />
								</div>
							</label>
							<?php
							if ( ! empty( $contact_custom_fields ) ) {
								foreach ( $contact_custom_fields as $attr ) {
									render_attribute( $attr, true, 'participant' );
								}
							}

							if ( ! empty( $participant_questions ) ) {
								foreach ( $participant_questions as $question ) {
									render_question( $question, true, 'participant' );
								}
							}
							?>
						</div>
					</div>
					<?php if ( ! EDU()->is_checked( 'eduadmin-singlePersonBooking', false ) ) { ?>
						<div>
							<a href="javascript://" class="addParticipantLink neutral-btn"
							   onclick="eduBookingView.AddParticipant(); return false;"><?php echo esc_html_x( '+ Add participant', 'frontend', 'eduadmin-booking' ); ?></a>
						</div>
					<?php } ?>
					<div class="edu-modal warning" id="edu-warning-participants">
						<?php echo esc_html_x( 'You cannot add any more participants.', 'frontend', 'eduadmin-booking' ); ?>
					</div>
				</div>
				<?php
				include_once 'coupon-code.php';
				include_once __DIR__ . '/../payment-methods.php';
				include_once __DIR__ . '/../recaptcha-form.php';
				eduadmin_render_payment_methods( $programme );
				eduadmin_render_recaptcha_form();
				?>
				<div class="submitView">
					<?php if ( EDU()->is_checked( 'eduadmin-useBookingTermsCheckbox', false ) && $link = EDU()->get_option( 'eduadmin-bookingTermsLink', '' ) ): ?>
						<div class="confirmTermsHolder">
							<label>
								<input type="checkbox" id="confirmTerms" name="confirmTerms" value="agree" />
								<?php
								/* translators: 1: Start of link 2: End of link */
								echo wp_kses( sprintf( _x( 'I agree to the %1$sTerms and Conditions%2$s', 'frontend', 'eduadmin-booking' ), '<a href="' . $link . '" target="_blank">', '</a>' ), wp_kses_allowed_html( 'post' ) );
								?>
							</label>
						</div>
					<?php endif; ?>
					<div class="sumTotal">
						<?php echo esc_html_x( 'Total sum:', 'frontend', 'eduadmin-booking' ); ?>
						<span id="sumValue" class="sumValue"></span>
					</div>
					<?php if ( 0 !== $programme['ParticipantNumberLeft'] ) : ?>
						<input type="submit" class="bookButton cta-btn" id="edu-book-btn"
						       onclick="eduBookingView.UpdatePrice(); var validated = eduBookingView.CheckValidation(false, false); return validated;"
						       value="<?php echo esc_attr_x( 'Book now', 'frontend', 'eduadmin-booking' ); ?>" />
					<?php else : ?>
						<div class="bookButton neutral-btn cta-disabled">
							<?php echo esc_html_x( 'No free spots left on this event', 'frontend', 'eduadmin-booking' ); ?>
						</div>
					<?php endif; ?>
					<div class="edu-modal warning" id="edu-warning-pricecheck"></div>
					<div class="edu-modal warning" id="edu-warning-recaptcha">
						<?php echo esc_html_x( 'You must confirm that you are not a bot before continuing.', 'frontend', 'eduadmin-booking' ); ?>
					</div>
					<div class="edu-modal warning" id="edu-warning-terms">
						<?php echo esc_html_x( 'You must accept Terms and Conditions to continue.', 'frontend', 'eduadmin-booking' ); ?>
					</div>
					<div class="edu-modal warning" id="edu-warning-no-participants">
						<?php echo esc_html_x( 'You must add some participants.', 'frontend', 'eduadmin-booking' ); ?>
					</div>
					<div class="edu-modal warning" id="edu-warning-missing-participants">
						<?php echo esc_html_x( 'One or more participants is missing a name.', 'frontend', 'eduadmin-booking' ); ?>
					</div>
					<div class="edu-modal warning" id="edu-warning-missing-civicregno">
						<?php echo esc_html_x( 'One or more participants is missing their civic registration number.', 'frontend', 'eduadmin-booking' ); ?>
					</div>
					<?php
					$error_list = apply_filters( 'edu-booking-error', array() );
					foreach ( $error_list as $error ) {
						?>
						<div class="edu-modal warning">
							<?php esc_html( $error ); ?>
						</div>
						<?php
					}
					?>
				</div>
				<?php
				$original_title = get_the_title();
				$new_title      = $programme['ProgrammeStartName'] . ' | ' . $original_title;

				$discount_value = 0.0;
				if ( 0 !== $participant_discount_percent ) {
					$discount_value = ( $participant_discount_percent / 100 ) * $first_price['Price'];
				}
				?>
				<script type="text/javascript">
					var pricePerParticipant = <?php echo esc_js( round( $first_price['Price'] - $discount_value, 2 ) ); ?>;
					var discountPerParticipant = <?php echo esc_js( round( $participant_discount_percent / 100, 2 ) ); ?>;
					var totalPriceDiscountPercent = <?php echo esc_js( $discount_percent ); ?>;

					(function () {
						var title = document.title;
						title = title.replace('<?php echo esc_js( $original_title ); ?>', '<?php echo esc_js( $new_title ); ?>');
						document.title = title;
						eduBookingView.ProgrammeBooking = true;
						eduBookingView.MaxParticipants = <?php echo esc_js( intval( $programme['ParticipantNumberLeft'] ) ); ?>;
						eduBookingView.AddParticipant();
						eduBookingView.CheckPrice(false);
					})();
				</script>
			</form>
		</div>
		<?php
		do_action( 'eduadmin-programme-bookingform-view', $programme );
	}
}

$out = ob_get_clean();

return $out;