<?php

// phpcs:disable WordPress.NamingConventions
class EduAdmin_BookingHandler {
	public function __construct() {
		add_action( 'wp_loaded', array( $this, 'process_booking' ) );
		add_action( 'wp_loaded', array( $this, 'process_programme_booking' ) );
		add_action( 'wp_loaded', array( $this, 'check_price' ) );
		add_action( 'wp_loaded', array( $this, 'check_programme_price' ) );
	}

	public function check_price() {
		if ( ! empty( $_POST['edu-valid-form'] ) && wp_verify_nonce( $_POST['edu-valid-form'], 'edu-booking-confirm' ) && ! empty( $_POST['act'] ) && 'checkPrice' === sanitize_text_field( $_POST['act'] ) ) { // Var input okay.
			$single_person_booking = EDU()->is_checked( 'eduadmin-singlePersonBooking', false );

			$price_info = $single_person_booking ? $this->check_single_participant() : $this->check_multiple_participants();
			echo wp_json_encode( $price_info );
			exit( 0 );
		}
	}

	public function check_programme_price() {
		if ( ! empty( $_POST['edu-valid-form'] ) && wp_verify_nonce( $_POST['edu-valid-form'], 'edu-booking-confirm' ) && ! empty( $_POST['act'] ) && 'checkProgrammePrice' === sanitize_text_field( $_POST['act'] ) ) { // Var input okay.
			$price_info = $this->check_programme();
			echo wp_json_encode( $price_info );
			exit( 0 );
		}
	}

	public function verify_recaptcha() {
		$recaptcha_enabled   = EDU()->is_checked( 'eduadmin-recaptcha-enabled', false );
		$recaptcha_secretkey = EDU()->get_option( 'eduadmin-recaptcha-secretkey', '' );

		if ( $recaptcha_enabled && ! empty( $recaptcha_secretkey ) ) {
			if ( ! empty( $_POST['g-recaptcha-response'] ) ) {
				$c = curl_init( 'https://www.google.com/recaptcha/api/siteverify' );

				$verifydata = http_build_query( [
					                                "secret"   => $recaptcha_secretkey,
					                                "response" => sanitize_text_field( $_POST['g-recaptcha-response'] ),
				                                ] );

				curl_setopt( $c, CURLOPT_RETURNTRANSFER, true );
				curl_setopt( $c, CURLOPT_CUSTOMREQUEST, 'POST' );
				curl_setopt( $c, CURLOPT_SSLVERSION, 6 );
				curl_setopt( $c, CURLOPT_POSTFIELDS, $verifydata );

				$response = curl_exec( $c );
				$response = json_decode( $response, true );

				return $response['success'];
			}

			return false;
		}

		return true;
	}

	public function process_booking() {
		if ( ! empty( $_POST['edu-valid-form'] ) && wp_verify_nonce( $_POST['edu-valid-form'], 'edu-booking-confirm' ) && ! empty( $_POST['act'] ) && 'bookCourse' === sanitize_text_field( $_POST['act'] ) ) { // Var input okay.
			if ( ! empty( $_POST['username'] ) || ! empty( $_POST['email'] ) ) {
				wp_redirect( get_page_link( '/' ) );
				exit( 0 );
			}

			$single_person_booking = EDU()->is_checked( 'eduadmin-singlePersonBooking', false );

			if ( ! $this->verify_recaptcha() ) {
				add_filter( 'edu-booking-error', function( $errors ) {
					$errors[] = _x( 'Failed to validate reCAPTCHA, try again!', 'frontend', 'eduadmin-booking' );

					return $errors;
				}, 10, 1 );

				return;
			}

			$booking_info = $single_person_booking ? $this->book_single_participant() : $this->book_multiple_participants();

			if ( ! empty( $booking_info['Errors'] ) ) {
				add_filter( 'edu-booking-error', function( $errors ) use ( $booking_info ) {
					foreach ( $booking_info['Errors'] as $error ) {
						switch ( $error['ErrorCode'] ) {
							case -1: // Exception
								$errors[] = _x( 'An error has occured, please try again later!', 'frontend', 'eduadmin-booking' );
								break;
							case 40:
								$errors[] = _x( 'Not enough spots left.', 'frontend', 'eduadmin-booking' );
								break;
							case 45:
								$errors[] = _x( 'Person already booked on event.', 'frontend', 'eduadmin-booking' );
								break;
							case 100:
								$errors[] = _x( 'The voucher was not found.', 'frontend', 'eduadmin-booking' );
								break;
							case 101:
								$errors[] = _x( 'The voucher is not valid during the event period.', 'frontend', 'eduadmin-booking' );
								break;
							case 102:
								$errors[] = _x( 'The voucher is too small for the number of participants.', 'frontend', 'eduadmin-booking' );
								break;
							case 103:
								$errors[] = _x( 'The voucher belongs to a different customer.', 'frontend', 'eduadmin-booking' );
								break;
							case 104:
								$errors[] = _x( 'The voucher belongs to a different customer contact.', 'frontend', 'eduadmin-booking' );
								break;
							case 105:
								$errors[] = _x( 'The voucher is not valid for this event.', 'frontend', 'eduadmin-booking' );
								break;
							case 200:
								$errors[] = _x( 'Person added on session where dates are overlapping.', 'frontend', 'eduadmin-booking' );
								break;
							default:
								$errors[] = $error['ErrorText'];
								break;
						}
					}

					return $errors;
				}, 10, 1 );

				return;
			}

			$event_booking = EDUAPI()->OData->Bookings->GetItem(
				$booking_info['BookingId'],
				null,
				'OrderRows',
				false
			);
			$_customer     = EDUAPI()->OData->Customers->GetItem(
				$booking_info['CustomerId'],
				null,
				"BillingInfo",
				false
			);
			$_contact      = EDUAPI()->OData->Persons->GetItem(
				$booking_info['ContactPersonId'],
				null,
				null,
				false
			);

			$ebi = new EduAdmin_BookingInfo( $event_booking, $_customer, $_contact );

			$GLOBALS['edubookinginfo'] = $ebi;

			$always_use_payment_plugin = EDU()->is_checked( 'eduadmin-alwaysUsePaymentPlugin', false );

			if ( ( $event_booking['PaymentMethodId'] === 2 || $always_use_payment_plugin ) && intval( $event_booking['TotalPriceExVat'] ) > 0 ) {
				do_action( 'eduadmin-checkpaymentplugins', $ebi );
			}

			if ( ! $ebi->NoRedirect ) {
				wp_redirect( get_page_link( EDU()->get_option( 'eduadmin-thankYouPage', '/' ) ) . '?edu-thankyou=' . $booking_info['BookingId'] );
				exit( 0 );
			}
		}
	}

	public function process_programme_booking() {
		if ( ! empty( $_POST['edu-valid-form'] ) && wp_verify_nonce( $_POST['edu-valid-form'], 'edu-booking-confirm' ) && ! empty( $_POST['act'] ) && 'bookProgramme' === sanitize_text_field( $_POST['act'] ) ) { // Var input okay.
			if ( ! empty( $_POST['username'] ) || ! empty( $_POST['email'] ) ) {
				wp_redirect( get_page_link( '/' ) );
				exit( 0 );
			}

			if ( ! $this->verify_recaptcha() ) {
				add_filter( 'edu-booking-error', function( $errors ) {
					$errors[] = _x( 'Failed to validate reCAPTCHA, try again!', 'frontend', 'eduadmin-booking' );

					return $errors;
				}, 10, 1 );

				return;
			}

			$booking_info = $this->get_programme_booking();

			if ( ! empty( $booking_info['Errors'] ) ) {
				add_filter( 'edu-booking-error', function( $errors ) use ( $booking_info ) {
					foreach ( $booking_info['Errors'] as $error ) {
						switch ( $error['ErrorCode'] ) {
							case -1: // Exception
								$errors[] = _x( 'An error has occured, please try again later!', 'frontend', 'eduadmin-booking' );
								break;
							case 40:
								$errors[] = _x( 'Not enough spots left.', 'frontend', 'eduadmin-booking' );
								break;
							case 45:
								$errors[] = _x( 'Person already booked on event.', 'frontend', 'eduadmin-booking' );
								break;
							case 100:
								$errors[] = _x( 'The voucher was not found.', 'frontend', 'eduadmin-booking' );
								break;
							case 101:
								$errors[] = _x( 'The voucher is not valid during the event period.', 'frontend', 'eduadmin-booking' );
								break;
							case 102:
								$errors[] = _x( 'The voucher is too small for the number of participants.', 'frontend', 'eduadmin-booking' );
								break;
							case 103:
								$errors[] = _x( 'The voucher belongs to a different customer.', 'frontend', 'eduadmin-booking' );
								break;
							case 104:
								$errors[] = _x( 'The voucher belongs to a different customer contact.', 'frontend', 'eduadmin-booking' );
								break;
							case 105:
								$errors[] = _x( 'The voucher is not valid for this event.', 'frontend', 'eduadmin-booking' );
								break;
							case 200:
								$errors[] = _x( 'Person added on session where dates are overlapping.', 'frontend', 'eduadmin-booking' );
								break;
							default:
								$errors[] = $error['ErrorText'];
								break;
						}
					}

					return $errors;
				}, 10, 1 );

				return;
			}

			$event_booking = EDUAPI()->OData->ProgrammeBookings->GetItem(
				$booking_info['ProgrammeBookingId'],
				null,
				'OrderRows',
				false
			);
			$_customer     = EDUAPI()->OData->Customers->GetItem(
				$booking_info['CustomerId'],
				null,
				null,
				false
			);
			$_contact      = EDUAPI()->OData->Persons->GetItem(
				$booking_info['ContactPersonId'],
				null,
				null,
				false
			);

			$ebi = new EduAdmin_BookingInfo( $event_booking, $_customer, $_contact );

			$GLOBALS['edubookinginfo'] = $ebi;

			$always_use_payment_plugin = EDU()->is_checked( 'eduadmin-alwaysUsePaymentPlugin', false );

			if ( ( $event_booking['PaymentMethodId'] === 2 || $always_use_payment_plugin ) && intval( $event_booking['TotalPriceExVat'] ) > 0 ) {
				do_action( 'eduadmin-checkpaymentplugins', $ebi );
			}

			if ( ! $ebi->NoRedirect ) {
				wp_redirect( get_page_link( EDU()->get_option( 'eduadmin-thankYouPage', '/' ) ) . '?edu-thankyou=' . $booking_info['ProgrammeBookingId'] );
				exit( 0 );
			}
		}
	}

	private function get_programme_booking_data() {
		$programme_booking_data                   = new stdClass();
		$programme_booking_data->ProgrammeStartId = intval( $_POST['edu-programme-start'] ); // Var input okay.
		$programme_booking_data->Customer         = $this->get_customer();
		$programme_booking_data->ContactPerson    = $this->get_contact_person();
		$programme_booking_data->Participants     = $this->get_participant_data();

		if ( ! empty( $_POST['edu-paymentmethodid'] ) ) { // Var input okay.
			$programme_booking_data->PaymentMethodId = intval( $_POST['edu-paymentmethodid'] ); // Var input okay.
		}

		if ( ! empty( $_POST['edu-discountCode'] ) ) { // Var input okay.
			$programme_booking_data->CouponCode = sanitize_text_field( $_POST['edu-discountCode'] ); // Var input okay.
		}

		$selected_match = EDU()->get_option( 'eduadmin-customerMatching', 'name-zip-match' );

		if ( 'no-match' === $selected_match ) {
			$booking_options                               = new EduAdmin_Data_Options();
			$booking_options->SkipDuplicateMatchOnCustomer = true;
			$booking_options->SkipDuplicateMatchOnPersons  = true;
			$programme_booking_data->Options               = $booking_options;
		}

		if ( ! EDU()->is_checked( 'eduadmin-dontSendConfirmation', false ) ) {
			$send_info = new EduAdmin_Data_Mail();

			$confirmationSettingsParticipants    = EDU()->is_checked( 'eduadmin-confirmationSettings-participants', true );
			$confirmationSettingsCustomer        = EDU()->is_checked( 'eduadmin-confirmationSettings-customer', true );
			$confirmationSettingsCustomerContact = EDU()->is_checked( 'eduadmin-confirmationSettings-customercontact', true );

			$send_info->SendToParticipants    = $confirmationSettingsParticipants;
			$send_info->SendToCustomer        = $confirmationSettingsCustomer;
			$send_info->SendToCustomerContact = $confirmationSettingsCustomerContact;

			$programme_booking_data->SendConfirmationEmail = $send_info;
		}

		return $programme_booking_data;
	}

	private function get_programme_booking() {
		$programme_booking_data = $this->get_programme_booking_data();

		$programme_booking = EDUAPI()->REST->ProgrammeBooking->Book( $programme_booking_data );

		return $programme_booking;
	}

	private function get_basic_booking_data( &$booking_data, $event_id ) {
		if ( empty( $_POST['edu-valid-form'] ) || ! wp_verify_nonce( $_POST['edu-valid-form'], 'edu-booking-confirm' ) ) { // Var input okay.
			return null;
		}

		$selected_match = EDU()->get_option( 'eduadmin-customerMatching', 'name-zip-match' );

		if ( 'no-match' === $selected_match ) {
			$booking_options                               = new EduAdmin_Data_Options();
			$booking_options->SkipDuplicateMatchOnCustomer = true;
			$booking_options->SkipDuplicateMatchOnPersons  = true;
			$booking_data->Options                         = $booking_options;
		}

		if ( ! EDU()->is_checked( 'eduadmin-dontSendConfirmation', false ) ) {
			$send_info = new EduAdmin_Data_Mail();

			$confirmationSettingsParticipants    = EDU()->is_checked( 'eduadmin-confirmationSettings-participants', true );
			$confirmationSettingsCustomer        = EDU()->is_checked( 'eduadmin-confirmationSettings-customer', true );
			$confirmationSettingsCustomerContact = EDU()->is_checked( 'eduadmin-confirmationSettings-customercontact', true );

			$send_info->SendToParticipants    = $confirmationSettingsParticipants;
			$send_info->SendToCustomer        = $confirmationSettingsCustomer;
			$send_info->SendToCustomerContact = $confirmationSettingsCustomerContact;

			$booking_data->SendConfirmationEmail = $send_info;
		}

		$booking_data->EventId   = $event_id;
		$booking_data->Reference = sanitize_text_field( $_POST['invoiceReference'] ); // Var input okay.

		if ( ! empty( $_POST['edu-paymentmethodid'] ) ) { // Var input okay.
			$booking_data->PaymentMethodId = intval( $_POST['edu-paymentmethodid'] ); // Var input okay.
		}

		if ( 'selectWholeEvent' === EDU()->get_option( 'eduadmin-selectPricename', 'firstPublic' ) && ! empty( $_POST['edu-pricename'] ) && is_numeric( $_POST['edu-pricename'] ) ) { // Var input okay.
			$booking_data->PriceNameId = intval( $_POST['edu-pricename'] ); // Var input okay.
		}

		if ( ! empty( $_POST['edu-limitedDiscountID'] ) ) { // Var input okay.
			$booking_data->VoucherId = intval( $_POST['edu-limitedDiscountID'] ); // Var input okay.
		}

		if ( ! empty( $_POST['edu-discountCode'] ) ) { // Var input okay.
			$booking_data->CouponCode = sanitize_text_field( $_POST['edu-discountCode'] ); // Var input okay.
		}

		$booking_data->Answers = $this->get_booking_questions();
	}

	private function get_single_participant_booking() {
		if ( empty( $_POST['edu-valid-form'] ) || ! wp_verify_nonce( $_POST['edu-valid-form'], 'edu-booking-confirm' ) ) { // Var input okay.
			return null;
		}

		$event_id     = intval( $_REQUEST['eid'] ); // Var input okay.
		$booking_data = new EduAdmin_Data_BookingData();

		$this->get_basic_booking_data( $booking_data, $event_id );

		$_event = EDUAPI()->OData->Events->GetItem( $booking_data->EventId );

		if ( $_event != null && $_event['EventId'] == $booking_data->EventId && date( "Y-m-d H:i:s", strtotime( $_event['StartDate'] ) ) < date( "Y-m-d H:i:s" ) ) {
			return null;
		}

		$customer = new stdClass();
		$contact  = $this->get_contact_person();

		$contact->AddAsParticipant = true;

		$this->set_logged_in_user_info( $customer, $contact );

		$first = '';
		$last  = '';

		if ( ! empty( $_REQUEST['overwriteCustomerData'] ) ) {
			$customer->UpdateCustomerInformation = true;
		}

		if ( ! empty( $_POST['contactFirstName'] ) ) { // Var input okay.
			$first = sanitize_text_field( $_POST['contactFirstName'] ); // Var input okay.
		}
		if ( ! empty( $_POST['contactLastName'] ) ) { // Var input okay.
			$last = sanitize_text_field( $_POST['contactLastName'] ); // Var input okay.
		}

		$customer->CustomerName = $first . ' ' . $last;

		if ( empty( $customer->CustomerGroupId ) || ! is_numeric( $customer->CustomerGroupId ) || $customer->CustomerGroupId === 0 ) {
			$customer->CustomerGroupId = intval( EDU()->get_option( 'eduadmin-customerGroupId', null ) );
		}

		if ( ! empty( $_POST['contactCivRegNr'] ) ) { // Var input okay.
			$customer->OrganisationNumber = sanitize_text_field( $_POST['contactCivRegNr'] ); // Var input okay.
		}
		if ( ! empty( $_POST['customerAddress1'] ) ) { // Var input okay.
			$customer->Address = sanitize_text_field( $_POST['customerAddress1'] ); // Var input okay.
		}
		if ( ! empty( $_POST['customerAddress2'] ) ) { // Var input okay.
			$customer->Address2 = sanitize_text_field( $_POST['customerAddress2'] ); // Var input okay.
		}
		if ( ! empty( $_POST['customerPostalCode'] ) ) { // Var input okay.
			$customer->Zip = sanitize_text_field( $_POST['customerPostalCode'] ); // Var input okay.
		}
		if ( ! empty( $_POST['customerPostalCity'] ) ) { // Var input okay.
			$customer->City = sanitize_text_field( $_POST['customerPostalCity'] ); // Var input okay.
		}
		if ( ! empty( $_POST['customerCountryCode'] ) ) { // Var input okay.
			$customer->CountryCode = sanitize_text_field( $_POST['customerCountryCode'] ); // Var input okay.
		}
		if ( ! empty( $_POST['contactPhone'] ) ) { // Var input okay.
			$customer->Phone = sanitize_text_field( $_POST['contactPhone'] ); // Var input okay.
		}
		if ( ! empty( $_POST['contactMobile'] ) ) { // Var input okay.
			$customer->Mobile = sanitize_text_field( $_POST['contactMobile'] ); // Var input okay.
		}
		if ( ! empty( $_POST['contactEmail'] ) ) { // Var input okay.
			$customer->Email = sanitize_email( $_POST['contactEmail'] ); // Var input okay.
		}

		$customerInvoiceEmailAddress = null;
		if ( ! empty( $_POST['invoiceEmail'] ) ) { // Var input okay.
			$customerInvoiceEmailAddress = sanitize_email( $_POST['invoiceEmail'] ); // Var input okay.
		}

		$customerInvoiceGLN = null;
		if ( ! empty( $_POST['invoiceGLN'] ) ) { // Var input okay.
			$customerInvoiceGLN = sanitize_text_field( $_POST['invoiceGLN'] ); // Var input okay.
		}

		$billing_info = new stdClass();

		if ( empty( $_POST['alsoInvoiceCustomer'] ) ) { // Var input okay.
			$billing_info->CustomerName = $first . ' ' . $last;
			if ( ! empty( $_POST['customerAddress1'] ) ) { // Var input okay.
				$billing_info->Address = sanitize_text_field( $_POST['customerAddress1'] ); // Var input okay.
			}
			if ( ! empty( $_POST['customerAddress2'] ) ) { // Var input okay.
				$billing_info->Address2 = sanitize_text_field( $_POST['customerAddress2'] ); // Var input okay.
			}
			if ( ! empty( $_POST['customerPostalCode'] ) ) { // Var input okay.
				$billing_info->Zip = sanitize_text_field( $_POST['customerPostalCode'] ); // Var input okay.
			}
			if ( ! empty( $_POST['customerPostalCity'] ) ) { // Var input okay.
				$billing_info->City = sanitize_text_field( $_POST['customerPostalCity'] ); // Var input okay.
			}
			if ( ! empty( $_POST['customerCountryCode'] ) ) { // Var input okay.
				$billing_info->CountryCode = sanitize_text_field( $_POST['customerCountryCode'] ); // Var input okay.
			}
		} else {
			if ( ! empty( $_POST['invoiceName'] ) ) { // Var input okay.
				$billing_info->CustomerName = sanitize_text_field( $_POST['invoiceName'] ); // Var input okay.
			}
			if ( ! empty( $_POST['invoiceAddress1'] ) ) { // Var input okay.
				$billing_info->Address = sanitize_text_field( $_POST['invoiceAddress1'] ); // Var input okay.
			}
			if ( ! empty( $_POST['invoiceAddress2'] ) ) { // Var input okay.
				$billing_info->Address2 = sanitize_text_field( $_POST['invoiceAddress2'] ); // Var input okay.
			}
			if ( ! empty( $_POST['invoicePostalCode'] ) ) { // Var input okay.
				$billing_info->Zip = sanitize_text_field( $_POST['invoicePostalCode'] ); // Var input okay.
			}
			if ( ! empty( $_POST['invoicePostalCity'] ) ) { // Var input okay.
				$billing_info->City = sanitize_text_field( $_POST['invoicePostalCity'] ); // Var input okay.
			}
			if ( ! empty( $_POST['invoiceCountryCode'] ) ) { // Var input okay.
				$billing_info->CountryCode = sanitize_text_field( $_POST['invoiceCountryCode'] ); // Var input okay.
			}
			if ( ! empty( $_POST['invoiceOrgNo'] ) ) { // Var input okay.
				$billing_info->OrganisationNumber = sanitize_text_field( $_POST['invoiceOrgNo'] ); // Var input okay.
			}
		}

		if ( ! empty( $_POST['ediReference'] ) ) {
			$billing_info->EdiReference = sanitize_text_field( $_POST['ediReference'] ); // Var input okay.
		}

		if ( ! empty( $customerInvoiceEmailAddress ) ) {
			$billing_info->Email = $customerInvoiceEmailAddress;
		}

		if ( ! empty( $customerInvoiceGLN ) ) {
			$billing_info->GLN = $customerInvoiceGLN;
		}

		$customer->BillingInfo = $billing_info;

		$customer->CustomFields = $this->get_customer_custom_fields();

		$booking_data->Customer      = $customer;
		$booking_data->ContactPerson = $contact;

		return $booking_data;
	}

	private function get_contact_person() {
		if ( empty( $_POST['edu-valid-form'] ) || ! wp_verify_nonce( $_POST['edu-valid-form'], 'edu-booking-confirm' ) ) { // Var input okay.
			return null;
		}

		$contact = new stdClass();

		if ( ! empty( $_POST['edu-contactId'] ) ) { // Var input okay.
			$contact->PersonId = intval( $_POST['edu-contactId'] ); // Var input okay.
		}

		if ( ! empty( $_POST['contactFirstName'] ) ) { // Var input okay.
			$contact->FirstName = sanitize_text_field( $_POST['contactFirstName'] ); // Var input okay.
		}

		if ( ! empty( $_POST['contactLastName'] ) ) { // Var input okay.
			$contact->LastName = sanitize_text_field( $_POST['contactLastName'] ); // Var input okay.
		}

		if ( ! empty( $_POST['contactPhone'] ) ) { // Var input okay.
			$contact->Phone = sanitize_text_field( $_POST['contactPhone'] ); // Var input okay.
		}

		if ( ! empty( $_POST['contactMobile'] ) ) { // Var input okay.
			$contact->Mobile = sanitize_text_field( $_POST['contactMobile'] ); // Var input okay.
		}

		if ( ! empty( $_POST['contactEmail'] ) ) { // Var input okay.
			$contact->Email = sanitize_email( $_POST['contactEmail'] ); // Var input okay.
		}

		if ( ! empty( $_POST['contactCivReg'] ) ) { // Var input okay.
			$contact->CivicRegistrationNumber = sanitize_text_field( $_POST['contactCivReg'] ); // Var input okay.
		}
		if ( ! empty( $_POST['contactPass'] ) ) { // Var input okay.
			$contact->Password = sanitize_text_field( $_POST['contactPass'] ); // Var input okay.
		}

		if ( ! empty( $_POST['contactPriceName'] ) ) { // Var input okay.
			$contact->PriceNameId = intval( $_POST['contactPriceName'] ); // Var input okay.
		}

		$contact->CanLogin     = EDU()->is_checked( 'eduadmin-useLogin', false );
		$contact->Answers      = $this->get_contact_questions();
		$contact->CustomFields = $this->get_contact_custom_fields();
		$contact->Sessions     = $this->get_contact_sessions();

		if ( ! empty( $_POST['contactIsAlsoParticipant'] ) ) { // Var input okay.
			$contact->AddAsParticipant = true;
		}

		return $contact;
	}

	public function book_single_participant() {
		if ( empty( $_POST['edu-valid-form'] ) || ! wp_verify_nonce( $_POST['edu-valid-form'], 'edu-booking-confirm' ) ) { // Var input okay.
			return null;
		}

		$booking_data = $this->get_single_participant_booking();

		return $this->create_booking( $booking_data );
	}

	public function check_single_participant() {
		if ( empty( $_POST['edu-valid-form'] ) || ! wp_verify_nonce( $_POST['edu-valid-form'], 'edu-booking-confirm' ) ) { // Var input okay.
			return null;
		}

		$booking_data = $this->get_single_participant_booking();

		if ( empty( $booking_data->ContactPerson->FirstName ) ) {
			$booking_data->ContactPerson->FirstName = 'Tempo';
			$booking_data->ContactPerson->LastName  = 'Rary';
		}

		return EDUAPI()->REST->Booking->CheckPrice( $booking_data );
	}

	private function get_multiple_participant_booking() {
		if ( empty( $_POST['edu-valid-form'] ) || ! wp_verify_nonce( $_POST['edu-valid-form'], 'edu-booking-confirm' ) ) { // Var input okay.
			return null;
		}

		$event_id     = intval( $_REQUEST['eid'] ); // Var input okay.
		$booking_data = new EduAdmin_Data_BookingData();

		$this->get_basic_booking_data( $booking_data, $event_id );

		$_event = EDUAPI()->OData->Events->GetItem( $booking_data->EventId );

		if ( $_event != null && $_event['EventId'] == $booking_data->EventId && date( "Y-m-d H:i:s", strtotime( $_event['StartDate'] ) ) < date( "Y-m-d H:i:s" ) ) {
			return null;
		}

		$customer = $this->get_customer();
		$contact  = $this->get_contact_person();

		if ( ! empty( $_POST['purchaseOrderNumber'] ) ) { // Var input okay.
			$booking_data->PurchaseOrderNumber = sanitize_text_field( $_POST['purchaseOrderNumber'] ); // Var input okay.
		}

		if ( ! empty( $customer->BillingInfo->SellerReference ) ) {
			$booking_data->Reference = $customer->BillingInfo->SellerReference;
		}

		$this->set_logged_in_user_info( $customer, $contact );

		$booking_data->Customer      = $customer;
		$booking_data->ContactPerson = $contact;

		$participants = $this->get_participant_data();

		$booking_data->Participants = $participants;

		return $booking_data;
	}

	private function set_logged_in_user_info( &$customer, &$contact ) {
		if ( isset( EDU()->session['eduadmin-loginUser'] ) ) {
			$user                      = EDU()->session['eduadmin-loginUser'];
			$contact->PersonId         = $user->Contact->PersonId;
			$customer->CustomerId      = $user->Customer->CustomerId;
			$customer->CustomerGroupId = $user->Customer->CustomerGroupId;
		}

		if ( ! empty( $_POST['edu-customerId'] ) ) { // Var input okay.
			$customer->CustomerId = intval( $_POST['edu-customerId'] ); // Var input okay.
		}
	}

	private function get_customer() {
		if ( empty( $_POST['edu-valid-form'] ) || ! wp_verify_nonce( $_POST['edu-valid-form'], 'edu-booking-confirm' ) ) { // Var input okay.
			return null;
		}

		$customer = new stdClass();

		if ( ! empty( $_REQUEST['overwriteCustomerData'] ) ) {
			$customer->UpdateCustomerInformation = true;
		}

		if ( ! empty( $_POST['customerName'] ) ) { // Var input okay.
			$customer->CustomerName = sanitize_text_field( $_POST['customerName'] ); // Var input okay.
		}

		if ( empty( $customer->CustomerGroupId ) || ! is_numeric( $customer->CustomerGroupId ) || $customer->CustomerGroupId === 0 ) {
			$customer->CustomerGroupId = intval( EDU()->get_option( 'eduadmin-customerGroupId', null ) );
		}

		if ( ! empty( $_POST['customerVatNo'] ) ) { // Var input okay.
			$customer->OrganisationNumber = sanitize_text_field( $_POST['customerVatNo'] ); // Var input okay.
		}
		if ( ! empty( $_POST['customerAddress1'] ) ) { // Var input okay.
			$customer->Address = sanitize_text_field( $_POST['customerAddress1'] ); // Var input okay.
		}
		if ( ! empty( $_POST['customerAddress2'] ) ) { // Var input okay.
			$customer->Address2 = sanitize_text_field( $_POST['customerAddress2'] ); // Var input okay.
		}
		if ( ! empty( $_POST['customerPostalCode'] ) ) { // Var input okay.
			$customer->Zip = sanitize_text_field( $_POST['customerPostalCode'] ); // Var input okay.
		}
		if ( ! empty( $_POST['customerPostalCity'] ) ) { // Var input okay.
			$customer->City = sanitize_text_field( $_POST['customerPostalCity'] ); // Var input okay.
		}
		if ( ! empty( $_POST['customerCountryCode'] ) ) { // Var input okay.
			$customer->CountryCode = sanitize_text_field( $_POST['customerCountryCode'] ); // Var input okay.
		}
		if ( ! empty( $_POST['customerEmail'] ) ) { // Var input okay.
			$customer->Email = sanitize_email( $_POST['customerEmail'] ); // Var input okay.
		}

		$customerInvoiceEmailAddress = null;
		if ( ! empty( $_POST['invoiceEmail'] ) ) { // Var input okay.
			$customerInvoiceEmailAddress = sanitize_email( $_POST['invoiceEmail'] ); // Var input okay.
		}

		$customerInvoiceGLN = null;
		if ( ! empty( $_POST['invoiceGLN'] ) ) { // Var input okay.
			$customerInvoiceGLN = sanitize_text_field( $_POST['invoiceGLN'] ); // Var input okay.
		}

		$billing_info = new stdClass();

		if ( ! isset( $_POST['alsoInvoiceCustomer'] ) ) { // Var input okay.
			if ( ! empty( $_POST['customerName'] ) ) { // Var input okay.
				$billing_info->CustomerName = sanitize_text_field( $_POST['customerName'] ); // Var input okay.
			}
			if ( ! empty( $_POST['customerAddress1'] ) ) { // Var input okay.
				$billing_info->Address = sanitize_text_field( $_POST['customerAddress1'] ); // Var input okay.
			}
			if ( ! empty( $_POST['customerAddress2'] ) ) { // Var input okay.
				$billing_info->Address2 = sanitize_text_field( $_POST['customerAddress2'] ); // Var input okay.
			}
			if ( ! empty( $_POST['customerPostalCode'] ) ) { // Var input okay.
				$billing_info->Zip = sanitize_text_field( $_POST['customerPostalCode'] ); // Var input okay.
			}
			if ( ! empty( $_POST['customerPostalCity'] ) ) { // Var input okay.
				$billing_info->City = sanitize_text_field( $_POST['customerPostalCity'] ); // Var input okay.
			}
			if ( ! empty( $_POST['customerCountryCode'] ) ) { // Var input okay.
				$billing_info->CountryCode = sanitize_text_field( $_POST['customerCountryCode'] ); // Var input okay.
			}
		} else {
			if ( ! empty( $_POST['invoiceName'] ) ) { // Var input okay.
				$billing_info->CustomerName = sanitize_text_field( $_POST['invoiceName'] ); // Var input okay.
			}
			if ( ! empty( $_POST['invoiceAddress1'] ) ) { // Var input okay.
				$billing_info->Address = sanitize_text_field( $_POST['invoiceAddress1'] ); // Var input okay.
			}
			if ( ! empty( $_POST['invoiceAddress2'] ) ) { // Var input okay.
				$billing_info->Address2 = sanitize_text_field( $_POST['invoiceAddress2'] ); // Var input okay.
			}
			if ( ! empty( $_POST['invoicePostalCode'] ) ) { // Var input okay.
				$billing_info->Zip = sanitize_text_field( $_POST['invoicePostalCode'] ); // Var input okay.
			}
			if ( ! empty( $_POST['invoicePostalCity'] ) ) { // Var input okay.
				$billing_info->City = sanitize_text_field( $_POST['invoicePostalCity'] ); // Var input okay.
			}
			if ( ! empty( $_POST['invoiceCountryCode'] ) ) { // Var input okay.
				$billing_info->CountryCode = sanitize_text_field( $_POST['invoiceCountryCode'] ); // Var input okay.
			}
			if ( ! empty( $_POST['invoiceOrgNo'] ) ) { // Var input okay.
				$billing_info->OrganisationNumber = sanitize_text_field( $_POST['invoiceOrgNo'] ); // Var input okay.
			}
		}

		if ( ! empty( $_POST['invoiceReference'] ) ) { // Var input okay.
			$billing_info->BuyerReference = sanitize_text_field( $_POST['invoiceReference'] ); // Var input okay.
		}

		if ( ! empty( $_POST['ediReference'] ) ) {
			$billing_info->EdiReference = sanitize_text_field( $_POST['ediReference'] ); // Var input okay.
		}

		if ( ! empty( $customerInvoiceEmailAddress ) ) {
			$billing_info->Email = $customerInvoiceEmailAddress;
		}

		if ( ! empty( $customerInvoiceGLN ) ) {
			$billing_info->GLN = $customerInvoiceGLN;
		}

		$customer->BillingInfo  = $billing_info;
		$customer->CustomFields = $this->get_customer_custom_fields();

		return $customer;
	}

	public function book_multiple_participants() {
		if ( empty( $_POST['edu-valid-form'] ) || ! wp_verify_nonce( $_POST['edu-valid-form'], 'edu-booking-confirm' ) ) { // Var input okay.
			return null;
		}

		$booking_data = $this->get_multiple_participant_booking();

		return $this->create_booking( $booking_data );
	}

	private function create_booking( $booking_data ) {
		$booking = EDUAPI()->REST->Booking->Create( $booking_data );

		if ( isset( $booking['data'] ) && 'Oops! Something went wrong. Please contact eduadmin@multinet.freshdesk.com so we can try to fix it.' === $booking['data'] ) {
			$error_list = array();

			$std_error                 = array();
			$std_error['ErrorCode']    = -1;
			$std_error['ErrorDetails'] = _x( 'An error has occurred, please try again!', 'frontend', 'eduadmin-booking' );
			$std_error['ErrorText']    = _x( 'General error', 'frontend', 'eduadmin-booking' );

			$error_list['Errors'][] = $std_error;

			return $error_list;
		}

		if ( ! empty( $booking['ErrorMessages'] ) ) {
			$error_list = array();
			foreach ( $booking['ErrorMessages'] as $error ) {
				$std_error                 = array();
				$std_error['ErrorCode']    = -1;
				$std_error['ErrorDetails'] = $error;
				$std_error['ErrorText']    = $error;

				$error_list['Errors'][] = $std_error;
			}

			return $error_list;
		}

		if ( ! empty( $booking['Errors'] ) ) {
			$error_list           = array();
			$error_list['Errors'] = $booking['Errors'];

			return $error_list;
		}

		EDU()->session['eduadmin-printJS'] = true;

		$user = EDU()->login_handler->get_login_user( $booking['ContactPersonId'], $booking['CustomerId'] );

		EDU()->session['eduadmin-loginUser'] = $user;

		$booking_info = array(
			'BookingId'       => $booking['BookingId'],
			'EventId'         => $booking['EventId'],
			'CustomerId'      => $booking['CustomerId'],
			'ContactPersonId' => $booking['ContactPersonId'],
		);

		return $booking_info;
	}

	public function check_multiple_participants() {
		if ( empty( $_POST['edu-valid-form'] ) || ! wp_verify_nonce( $_POST['edu-valid-form'], 'edu-booking-confirm' ) ) { // Var input okay.
			return null;
		}

		$booking_data = $this->get_multiple_participant_booking();

		if ( count( $booking_data->Participants ) === 0 && $booking_data->ContactPerson->AddAsParticipant === false ) {
			$person            = new stdClass();
			$person->FirstName = "Price";
			$person->LastName  = "Check";

			$booking_data->Participants[] = $person;
		}

		return EDUAPI()->REST->Booking->CheckPrice( $booking_data );
	}

	public function check_programme() {
		if ( empty( $_POST['edu-valid-form'] ) || ! wp_verify_nonce( $_POST['edu-valid-form'], 'edu-booking-confirm' ) ) { // Var input okay.
			return null;
		}

		$booking_data = $this->get_programme_booking_data();

		if ( empty( $booking_data->Customer->CustomerName ) ) {
			$booking_data->Customer->CustomerName = 'Empty';
		}

		if ( empty( $booking_data->ContactPerson->FirstName ) ) {
			$booking_data->ContactPerson->FirstName        = 'Empty';
			$booking_data->ContactPerson->AddAsParticipant = false;
		}

		if ( 0 === count( $booking_data->Participants ) && $booking_data->ContactPerson->AddAsParticipant === false ) {
			$empty_participant            = new stdClass();
			$empty_participant->FirstName = 'Price';
			$empty_participant->LastName  = 'Check';
			$booking_data->Participants[] = $empty_participant;
		}

		return EDUAPI()->REST->ProgrammeBooking->CheckPrice( $booking_data );
	}

	private function get_customer_custom_fields() {
		if ( ! empty( $_POST['edu-valid-form'] ) && wp_verify_nonce( $_POST['edu-valid-form'], 'edu-booking-confirm' ) ) { // Var input okay.
			$customer_custom_field_answers = array_filter( array_keys( $_POST ), function( $key ) { // Var input okay.
				if ( is_string( $key ) ) {
					return edu_starts_with( $key, 'edu-attr_' ) && edu_ends_with( $key, '-customer' );
				}

				return false;
			} );

			$customer_answers = array();

			foreach ( $customer_custom_field_answers as $key ) {
				$custom_field = explode( '_', str_replace( array( 'edu-attr_', '-customer' ), '', $key ) );

				$custom_field_id   = $custom_field[0];
				$custom_field_type = $custom_field[1];

				$answer = $this->get_custom_field_data( $key, $custom_field_id, $custom_field_type );

				if ( null !== $answer->CustomFieldValue ) {
					$customer_answers[] = $answer;
				}
			}

			return $customer_answers;
		}

		return null;
	}

	private function get_contact_custom_fields() {
		if ( ! empty( $_POST['edu-valid-form'] ) && wp_verify_nonce( $_POST['edu-valid-form'], 'edu-booking-confirm' ) ) { // Var input okay.
			$customer_custom_field_answers = array_filter( array_keys( $_POST ), function( $key ) { // Var input okay.
				if ( is_string( $key ) ) {
					return edu_starts_with( $key, 'edu-attr_' ) && edu_ends_with( $key, '-contact' );
				}

				return false;
			} );

			$customer_answers = array();

			foreach ( $customer_custom_field_answers as $key ) {
				$custom_field = explode( '_', str_replace( array( 'edu-attr_', '-contact' ), '', $key ) );

				$custom_field_id   = $custom_field[0];
				$custom_field_type = $custom_field[1];

				$answer = $this->get_custom_field_data( $key, $custom_field_id, $custom_field_type );

				if ( null !== $answer->CustomFieldValue ) {
					$customer_answers[] = $answer;
				}
			}

			return $customer_answers;
		}

		return null;
	}

	private function get_custom_field_data( $key, $custom_field_id, $custom_field_type ) {
		if ( ! empty( $_POST['edu-valid-form'] ) && wp_verify_nonce( $_POST['edu-valid-form'], 'edu-booking-confirm' ) ) { // Var input okay.
			$answer = new stdClass();
			switch ( $custom_field_type ) {
				case 'dropdown':
				case 'check':
				case 'radio':
					$answer->CustomFieldId = intval( $custom_field_id );
					if ( 'check' === $custom_field_type || 'radio' === $custom_field_type ) {
						$answer->CustomFieldValue = true;
					} else {
						$answer->CustomFieldValue = intval( $_POST[ $key ] );
					}
					break;
				default:
					$answer->CustomFieldId = intval( $custom_field_id );
					if ( ( 'note' === $custom_field_type || 'text' === $custom_field_type ) && ! empty( $_POST[ $key ] ) ) { // Var input okay.
						$answer->CustomFieldValue = sanitize_text_field( $_POST[ $key ] ); // Var input okay.
					} elseif ( 'number' === $custom_field_type && ! empty( $_POST[ $key ] ) ) { // Var input okay.
						$answer->CustomFieldValue = intval( $_POST[ $key ] ); // Var input okay.
					} elseif ( 'date' === $custom_field_type && ! empty( $_POST[ $key ] ) ) { // Var input okay.
						$answer->CustomFieldValue = edu_get_timezoned_date( 'c', $_POST[ $key ] ); // Var input okay.
					} else {
						$answer->CustomFieldValue = null;
					}

					break;
			}

			return $answer;
		}

		return null;
	}

	private function get_contact_sessions() {
		if ( ! empty( $_POST['edu-valid-form'] ) && wp_verify_nonce( $_POST['edu-valid-form'], 'edu-booking-confirm' ) ) { // Var input okay.
			$session_keys = array_filter( array_keys( $_POST ), function( $key ) { // Var input okay.
				if ( is_string( $key ) ) {
					return edu_starts_with( $key, 'contactSubEvent_' );
				}

				return false;
			} );

			$sessions = array();

			foreach ( $session_keys as $key ) {
				$session_id = str_replace( array( 'contactSubEvent_' ), '', $key );
				if ( is_numeric( $session_id ) ) {
					$session            = new stdClass();
					$session->SessionId = intval( $session_id );
					$sessions[]         = $session;
				}
			}

			return $sessions;
		}

		return null;
	}

	private function get_contact_questions() {
		if ( ! empty( $_POST['edu-valid-form'] ) && wp_verify_nonce( $_POST['edu-valid-form'], 'edu-booking-confirm' ) ) { // Var input okay.
			$contact_question_answers = array_filter( array_keys( $_POST ), function( $key ) { // Var input okay.
				if ( is_string( $key ) ) {
					return edu_starts_with( $key, 'question_' ) && edu_ends_with( $key, '-contact' );
				}

				return false;
			} );

			$contact_qanswers = array();

			foreach ( $contact_question_answers as $key ) {
				$question_data = explode( '_', str_replace( array( 'question_', '-contact' ), '', $key ) );

				$question_answer_id = $question_data[0];
				$question_type      = $question_data[1];

				$answer = $this->get_answer_data( $key, $question_answer_id, $question_type );

				if ( null !== $answer->AnswerValue ) {
					$contact_qanswers[] = $answer;
				}
			}

			return $contact_qanswers;
		}

		return null;
	}

	private function get_answer_data( $key, $question_answer_id, $question_type ) {
		if ( ! empty( $_POST['edu-valid-form'] ) && wp_verify_nonce( $_POST['edu-valid-form'], 'edu-booking-confirm' ) ) { // Var input okay.
			$answer = new stdClass();
			switch ( $question_type ) {
				case 'dropdown':
				case 'check':
				case 'radio':
					$question_answer_id  = $_POST[ $key ]; // Var input okay.
					$answer->AnswerId    = intval( $question_answer_id );
					$answer->AnswerValue = true;
					break;
				default:
					$answer->AnswerId = intval( $question_answer_id );
					if ( ( 'note' === $question_type || 'text' === $question_type ) && ! empty( $_POST[ $key ] ) ) { // Var input okay.
						$answer->AnswerValue = sanitize_text_field( $_POST[ $key ] ); // Var input okay.
					} elseif ( 'number' === $question_type && ! empty( $_POST[ $key ] ) ) { // Var input okay.
						$answer->AnswerValue = intval( $_POST[ $key ] ); // Var input okay.
					} elseif ( 'date' === $question_type && ! empty( $_POST[ $key ] ) ) { // Var input okay.
						$answer->AnswerValue = edu_get_timezoned_date( 'c', $_POST[ $key ] ); // Var input okay.
					} else {
						$answer->AnswerValue = null;
					}

					break;
			}

			return $answer;
		}

		return null;
	}

	private function get_booking_questions() {
		if ( ! empty( $_POST['edu-valid-form'] ) && wp_verify_nonce( $_POST['edu-valid-form'], 'edu-booking-confirm' ) ) { // Var input okay.
			$booking_question_answers = array_filter( array_keys( $_POST ), function( $key ) { // Var input okay.
				if ( is_string( $key ) ) {
					return edu_starts_with( $key, 'question_' ) && edu_ends_with( $key, '-booking' );
				}

				return false;
			} );

			$booking_qanswers = array();
			foreach ( $booking_question_answers as $key ) {
				$question_data = explode( '_', str_replace( array( 'question_', '-booking' ), '', $key ) );

				$question_answer_id = $question_data[0];
				$question_type      = $question_data[1];

				$answer = $this->get_answer_data( $key, $question_answer_id, $question_type );
				if ( null !== $answer->AnswerValue ) {
					$booking_qanswers[] = $answer;
				}
			}

			return $booking_qanswers;
		}

		return null;
	}

	private function get_participant_data() {
		if ( empty( $_POST['edu-valid-form'] ) || ! wp_verify_nonce( $_POST['edu-valid-form'], 'edu-booking-confirm' ) ) { // Var input okay.
			return null;
		}

		$participants = array();

		foreach ( $_POST['participantFirstName'] as $key => $value ) { // Var input okay.
			if ( '0' === $key ) {
				continue;
			}

			if ( ! empty( $_POST['participantFirstName'][ $key ] ) ) { // Var input okay.
				$person            = new stdClass();
				$person->FirstName = sanitize_text_field( $_POST['participantFirstName'][ $key ] ); // Var input okay.
				if ( ! empty( $_POST['participantLastName'][ $key ] ) ) { // Var input okay.
					$person->LastName = sanitize_text_field( $_POST['participantLastName'][ $key ] ); // Var input okay.
				}
				if ( ! empty( $_POST['participantEmail'][ $key ] ) ) { // Var input okay.
					$person->Email = sanitize_email( $_POST['participantEmail'][ $key ] ); // Var input okay.
				}
				if ( ! empty( $_POST['participantPhone'][ $key ] ) ) { // Var input okay.
					$person->Phone = sanitize_text_field( $_POST['participantPhone'][ $key ] ); // Var input okay.
				}
				if ( ! empty( $_POST['participantMobile'][ $key ] ) ) { // Var input okay.
					$person->Mobile = sanitize_text_field( $_POST['participantMobile'][ $key ] ); // Var input okay.
				}

				if ( ! empty( $_POST['participantCivReg'][ $key ] ) ) { // Var input okay.
					$person->CivicRegistrationNumber = trim( sanitize_text_field( $_POST['participantCivReg'][ $key ] ) ); // Var input okay.
				}

				if ( ! empty( $_POST['participantPriceName'][ $key ] ) ) { // Var input okay.
					$person->PriceNameId = intval( $_POST['participantPriceName'][ $key ] ); // Var input okay.
				}

				$person->CustomFields = $this->get_participant_custom_fields( $key );

				$person->Answers = $this->get_participant_answers( $key );

				$person->Sessions = $this->get_participant_sessions( $key );

				$participants[] = $person;
			}
		}

		return $participants;
	}

	private function get_participant_custom_fields( $index ) {
		if ( empty( $_POST['edu-valid-form'] ) || ! wp_verify_nonce( $_POST['edu-valid-form'], 'edu-booking-confirm' ) ) { // Var input okay.
			return null;
		}

		$custom_field_keys = array_filter( array_keys( $_POST ), function( $key ) use ( $index ) { // Var input okay.
			if ( is_string( $key ) ) {
				return edu_starts_with( $key, 'edu-attr_' ) && edu_ends_with( $key, '-participant_' . $index );
			}

			return false;
		} );

		$custom_fields = array();

		foreach ( $custom_field_keys as $key ) {
			$cf_data = explode( '_', str_replace( array( 'edu-attr_', '-participant' ), '', $key ) );

			$field_id          = intval( $cf_data[0] );
			$custom_field_type = $cf_data[1];
			$participant_index = intval( $cf_data[2] );

			if ( $index === $participant_index && ! empty( $_POST[ $key ] ) && is_numeric( $field_id ) ) { // Var input okay.
				$answer = $this->get_custom_field_data( $key, $field_id, $custom_field_type );

				if ( null !== $answer->CustomFieldValue ) {
					$custom_fields[] = $answer;
				}
			}
		}

		return $custom_fields;
	}

	private function get_participant_answers( $index ) {
		if ( empty( $_POST['edu-valid-form'] ) || ! wp_verify_nonce( $_POST['edu-valid-form'], 'edu-booking-confirm' ) ) { // Var input okay.
			return null;
		}

		$answers = array();

		$question_answers = array_filter( array_keys( $_POST ), function( $key ) use ( $index ) { // Var input okay.
			if ( is_string( $key ) ) {
				return edu_starts_with( $key, 'question_' ) && edu_ends_with( $key, '-participant_' . $index );
			}

			return false;
		} );

		foreach ( $question_answers as $key ) {
			$question_data = explode( '_', str_replace( array( 'question_', '-participant' ), '', $key ) );

			$question_answer_id = intval( $question_data[0] );
			$question_type      = $question_data[1];

			$question_participant_index = intval( $question_data[2] );

			if ( $index === $question_participant_index && ! empty( $_POST[ $key ] ) && is_numeric( $question_answer_id ) ) { // Var input okay.
				$answer = $this->get_answer_data( $key, $question_answer_id, $question_type );

				if ( null !== $answer->AnswerValue ) {
					$answers[] = $answer;
				}
			}
		}

		return $answers;
	}

	private function get_participant_sessions( $index ) {
		if ( empty( $_POST['edu-valid-form'] ) || ! wp_verify_nonce( $_POST['edu-valid-form'], 'edu-booking-confirm' ) ) { // Var input okay.
			return null;
		}

		$session_keys = array_filter( array_keys( $_POST ), function( $key ) use ( $index ) { // Var input okay.
			if ( is_string( $key ) ) {
				return edu_starts_with( $key, 'participantSubEvent_' ) && edu_ends_with( $key, '_' . $index );
			}

			return false;
		} );

		$sessions = array();

		foreach ( $session_keys as $key ) {
			$session = explode( '_', str_replace( array( 'participantSubEvent_' ), '', $key ) );

			$session_id        = intval( $session[0] );
			$participant_index = intval( $session[1] );

			if ( $index === $participant_index ) {
				if ( ! empty( $_POST[ 'participantSubEvent_' . $session_id . '_' . $participant_index ] ) ) { // Var input okay.
					if ( is_numeric( $session_id ) ) {
						$session            = new stdClass();
						$session->SessionId = intval( $session_id );
						$sessions[]         = $session;
					}
				}
			}
		}

		return $sessions;
	}
}
