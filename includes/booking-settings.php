<?php
// phpcs:disable WordPress.NamingConventions,Squiz,WordPress.WhiteSpace,Generic.WhiteSpace
function edu_render_booking_settings_page() {
	$t = EDU()->start_timer( __METHOD__ );
	?>
	<div class="eduadmin wrap">
		<h2><?php echo esc_html( sprintf( _x( 'EduAdmin settings - %s', 'backend', 'eduadmin-booking' ), _x( 'Booking settings', 'backend', 'eduadmin-booking' ) ) ); ?></h2>
		<form method="post" action="options.php">
			<?php settings_fields( 'eduadmin-booking' ); ?>
			<?php do_settings_sections( 'eduadmin-booking' ); ?>
			<div class="block">
				<?php
				if ( empty( EDUAPI()->api_token ) ) {
					add_action( 'admin_notices', array( 'EduAdmin', 'SetupWarning' ) );
				} else {
					echo '<h3>' . esc_html_x( 'Use booking form from EduAdmin', 'backend', 'eduadmin-booking' ) . '</h3>';
					?>
					<label>
						<input type="checkbox" name="eduadmin-useBookingFormFromApi" value="true"
							<?php echo( get_option( 'eduadmin-useBookingFormFromApi', false ) ? ' checked="checked"' : '' ); ?>
							   onchange="EduAdmin.ToggleVisibility(!this.checked, '.non-eduform-options');" />
						<?php echo esc_html_x( 'Use booking form from EduAdmin (will turn off all settings below)', 'backend', 'eduadmin-booking' ); ?>
					</label>
					<br />
					<em><?php echo esc_html_x( 'By enabling this option, all options below will be ineffective, as we use an external booking form from EduAdmin instead.', 'backend', 'eduadmin-booking' ); ?></em>
					<br />
					<div
						class="non-eduform-options"<?php echo( ! EDU()->is_checked( 'eduadmin-useBookingFormFromApi', false ) ? ' style="display: block;"' : ' style="display: none;"' ); ?>>
						<?php

						echo '<h3>' . esc_html_x( 'Default customer group', 'backend', 'eduadmin-booking' ) . '</h3>';
						$cg = EDUAPI()->OData->CustomerGroups->Search(
							'CustomerGroupId,ParentCustomerGroupId,CustomerGroupName',
							'PublicGroup',
							null,
							'ParentCustomerGroupId'
						);

						$parent = array();
						foreach ( $cg['value'] as $i => $v ) {
							$parent[ $i ] = $v['ParentCustomerGroupId'];
						}

						array_multisort( $parent, SORT_ASC, $cg['value'] );

						$level_stack = array();
						foreach ( $cg['value'] as $g ) {
							$level_stack[ $g['ParentCustomerGroupId'] ][] = $g;
						}

						$depth = 0;

						function edu_write_options( $g, $array, $depth, $selected_option ) {
							echo '<option value="' . esc_attr( $g['CustomerGroupId'] ) . '"' . ( intval( $selected_option ) === intval( $g['CustomerGroupId'] ) ? ' selected="selected"' : '' ) . '>' .
							     str_repeat( '&nbsp;', $depth * 4 ) .
							     esc_html( wp_strip_all_tags( $g['CustomerGroupName'] ) ) .
							     "</option>\n";
							if ( array_key_exists( $g['CustomerGroupId'], $array ) ) {
								$depth++;
								foreach ( $array[ $g['CustomerGroupId'] ] as $ng ) {
									edu_write_options( $ng, $array, $depth, $selected_option );
								}
								$depth--;
							}
						}

						?>
						<select required name="eduadmin-customerGroupId"
						        title="<?php echo esc_attr_x( 'Select customer group', 'backend', 'eduadmin-booking' ); ?>">
							<option
								value=""><?php echo esc_html_x( 'Select customer group', 'backend', 'eduadmin-booking' ); ?></option>
							<?php
							$root            = $level_stack['0'];
							$selected_option = get_option( 'eduadmin-customerGroupId', null );
							foreach ( $root as $g ) {
								edu_write_options( $g, $level_stack, $depth, $selected_option );
							}
							?>
						</select>
						<br />
						<br />
						<label>
							<input type="checkbox" name="eduadmin-useLogin" value="true"
								<?php echo( get_option( 'eduadmin-useLogin', false ) ? ' checked="checked"' : '' ); ?>
								   onchange="EduAdmin.ToggleVisibility(this.checked, '.eduadmin-forceLogin');" />
							<?php echo esc_html_x( 'Use login', 'backend', 'eduadmin-booking' ); ?>
						</label>
						<br />
						<div
							class="eduadmin-forceLogin"<?php echo( EDU()->is_checked( 'eduadmin-useLogin', false ) ? ' style="display: block;"' : ' style="display: none;"' ); ?>>
							<label>
								<input type="checkbox" name="eduadmin-allowCustomerRegistration" value="true"
									<?php echo get_option( 'eduadmin-allowCustomerRegistration', true ) ? ' checked="checked"' : ''; ?>
								/>
								<?php echo esc_html_x( 'Allow customer registration', 'backend', 'eduadmin-booking' ); ?>
							</label>
						</div>
						<br />
						<label>
							<?php echo esc_html_x( 'Login field', 'backend', 'eduadmin-booking' ); ?>
							<?php $selected_login_field = get_option( 'eduadmin-loginField', 'Email' ); ?>
							<select name="eduadmin-loginField">
								<option<?php echo( 'Email' === $selected_login_field ? ' selected="selected"' : '' ); ?>
									value="Email"><?php echo esc_html_x( 'E-mail address', 'backend', 'eduadmin-booking' ); ?></option>
								<option<?php echo( 'CivicRegistrationNumber' === $selected_login_field ? ' selected="selected"' : '' ); ?>
									value="CivicRegistrationNumber"><?php echo esc_html_x( 'Civic Registration Number', 'backend', 'eduadmin-booking' ); ?></option>
								<!--<option value="CustomerNumber"><?php echo esc_html_x( 'Customer number', 'backend', 'eduadmin-booking' ); ?></option>-->
								<!-- To be enabled when it works in the API -->
							</select>
						</label>
						<h3><?php echo esc_html_x( 'Booking form settings', 'backend', 'eduadmin-booking' ); ?></h3> <?php
						$singlePersonBooking = get_option( 'eduadmin-singlePersonBooking', false );
						?>
						<label>
							<input type="checkbox"
							       name="eduadmin-singlePersonBooking"<?php echo( 'true' === $singlePersonBooking ? " checked=\"checked\"" : "" ); ?>
							       value="true" />
							<?php echo esc_html_x( 'Participant is also customer and contact (Only allow a single participant)', 'backend', 'eduadmin-booking' ); ?>
						</label>
						<br /> <?php
						$blockEditIfLoggedIn = get_option( 'eduadmin-blockEditIfLoggedIn', true );
						?>
						<label>
							<input type="checkbox"
							       name="eduadmin-blockEditIfLoggedIn"<?php echo( $blockEditIfLoggedIn ? " checked=\"checked\"" : "" ); ?>
							       value="true" />
							<?php echo esc_html_x( 'Block ability to edit login information if logged in', 'backend', 'eduadmin-booking' ); ?>
						</label>
						<br /> <?php
						$allowCustomerToUpdate = get_option( 'eduadmin-allowCustomerUpdate', false );
						?>
						<label>
							<input type="checkbox"
							       name="eduadmin-allowCustomerUpdate"<?php echo( $allowCustomerToUpdate ? " checked=\"checked\"" : "" ); ?>
							       value="true" />
							<?php echo esc_html_x( 'Allow end customer to overwrite customer info (requires logged in users)', 'backend', 'eduadmin-booking' ); ?>
						</label>
						<br /><?php
						$allowDiscountCode = get_option( 'eduadmin-allowDiscountCode', false );
						?>
						<label>
							<input type="checkbox"
							       name="eduadmin-allowDiscountCode"<?php checked( $allowDiscountCode, "true" ); ?>
							       value="true" />
							<?php echo esc_html_x( 'Allow end customers to use discount codes', 'backend', 'eduadmin-booking' ); ?>
						</label>
						<br /> <?php
						$useLimitedDiscount = get_option( 'eduadmin-useLimitedDiscount', false );
						?>
						<label>
							<input type="checkbox"
							       name="eduadmin-useLimitedDiscount"<?php checked( $useLimitedDiscount, "true" ); ?>
							       value="true" />
							<?php echo esc_html_x( 'Allow end customers to use discount cards', 'backend', 'eduadmin-booking' ); ?>
						</label>
						<br /> <?php
						$validateCivicRegNo = get_option( 'eduadmin-validateCivicRegNo', false );
						?>
						<label>
							<input type="checkbox"
							       name="eduadmin-validateCivicRegNo"<?php checked( $validateCivicRegNo, "true" ); ?>
							       value="true" />
							<?php echo esc_html_x( 'Validate civic registration numbers (Swedish)', 'backend', 'eduadmin-booking' ); ?>
						</label>
						<br /><?php
						$alwaysUsePaymentPlugin = get_option( 'eduadmin-alwaysUsePaymentPlugin', false );
						?>
						<label>
							<input type="checkbox"
							       name="eduadmin-alwaysUsePaymentPlugin"<?php checked( $alwaysUsePaymentPlugin, "true" ); ?>
							       value="true" />
							<?php echo esc_html_x( 'Always use payment plugin (if applicable) for bookings', 'backend', 'eduadmin-booking' ); ?>
						</label>
						<br /><?php
						$dontSendConfirmation = get_option( 'eduadmin-dontSendConfirmation', false );
						?>
						<label>
							<input type="checkbox"
							       name="eduadmin-dontSendConfirmation"<?php checked( $dontSendConfirmation, "true" ); ?>
							       value="true" />
							<?php echo esc_html_x( 'Do not send confirmation emails (if you use automatic emails in EduAdmin)', 'backend', 'eduadmin-booking' ); ?>
						</label>
						<br />

						<h4><?php echo esc_html_x( 'Confirmation settings', 'backend', 'eduadmin-booking' ); ?></h4>
						<?php
						$confirmationSettingsParticipants    = EDU()->get_option( 'eduadmin-confirmationSettings-participants', "true" );
						$confirmationSettingsCustomer        = EDU()->get_option( 'eduadmin-confirmationSettings-customer', "true" );
						$confirmationSettingsCustomerContact = EDU()->get_option( 'eduadmin-confirmationSettings-customercontact', "true" );
						?>
						<p><?php echo esc_html_x( 'Decide who gets the confirmation after a booking is completed.', 'backend', 'eduadmin-booking' ); ?></p>
						<label>
							<input type="checkbox"
							       name="eduadmin-confirmationSettings-participants"<?php checked( $confirmationSettingsParticipants, 'true' ); ?>
							       value="true" />
							<?php echo esc_html_x( 'Send confirmation to all participants', 'backend', 'eduadmin-booking' ); ?>
						</label>
						<br />
						<label>
							<input type="checkbox"
							       name="eduadmin-confirmationSettings-customer"<?php checked( $confirmationSettingsCustomer, 'true' ); ?>
							       value="true" />
							<?php echo esc_html_x( 'Send confirmation to the customer email', 'backend', 'eduadmin-booking' ); ?>
						</label>
						<br />
						<label>
							<input type="checkbox"
							       name="eduadmin-confirmationSettings-customercontact"<?php checked( $confirmationSettingsCustomerContact, 'true' ); ?>
							       value="true" />
							<?php echo esc_html_x( 'Send confirmation to the customer contact', 'backend', 'eduadmin-booking' ); ?>
						</label>
						<br />

						<h4><?php echo esc_html_x( 'Field order', 'backend', 'eduadmin-booking' ); ?></h4> <?php
						$fieldOrder = get_option( 'eduadmin-fieldOrder', 'contact_customer' );
						?>
						<label>
							<input type="radio"
							       name="eduadmin-fieldOrder"<?php checked( $fieldOrder, "contact_customer" ); ?>
							       value="contact_customer" />
							<?php echo esc_html_x( 'Contact, customer', 'backend', 'eduadmin-booking' ); ?>
						</label>
						<br />
						<label>
							<input type="radio"
							       name="eduadmin-fieldOrder"<?php checked( $fieldOrder, "customer_contact" ); ?>
							       value="customer_contact" />
							<?php echo esc_html_x( 'Customer, contact', 'backend', 'eduadmin-booking' ); ?>
						</label>
						<br />
						<h4><?php echo esc_html_x( 'Sub Events', 'backend', 'eduadmin-booking' ); ?></h4> <?php
						$hideSubEventDateTime = get_option( 'eduadmin-hideSubEventDateTime', false );
						?>
						<label>
							<input type="checkbox"
							       name="eduadmin-hideSubEventDateTime"<?php checked( $hideSubEventDateTime, "true" ); ?>
							       value="true" />
							<?php echo esc_html_x( 'Hide date and time information from sub events', 'backend', 'eduadmin-booking' ); ?>
						</label>
						<br />
						<h4><?php echo esc_html_x( 'Interest registration', 'backend', 'eduadmin-booking' ); ?></h4> <?php
						$allowInterestRegObject = get_option( 'eduadmin-allowInterestRegObject', false );
						$allowInterestRegEvent  = get_option( 'eduadmin-allowInterestRegEvent', false );
						?>
						<label>
							<input type="checkbox"
							       name="eduadmin-allowInterestRegObject"<?php checked( $allowInterestRegObject, "true" ); ?>
							       value="true" />
							<?php echo esc_html_x( 'Allow interest registration for course', 'backend', 'eduadmin-booking' ); ?>
						</label>
						<br />
						<label>
							<input type="checkbox"
							       name="eduadmin-allowInterestRegEvent"<?php checked( $allowInterestRegEvent, "true" ); ?>
							       value="true" />
							<?php echo esc_html_x( 'Allow interest registration for event', 'backend', 'eduadmin-booking' ); ?>
						</label>
						<br />
						<h4><?php echo esc_html_x( 'Form settings', 'backend', 'eduadmin-booking' ); ?></h4>
						<button class="button" disabled
						        onclick="showFormWindow(); return false;"><?php _ex( 'Show settings', 'backend', 'eduadmin-booking' ); ?></button>
						<br />
						<br /> <?php $noInvoiceFreeEvents = get_option( 'eduadmin-noInvoiceFreeEvents', false ); ?>
						<label>
							<input type="checkbox"
							       name="eduadmin-noInvoiceFreeEvents"<?php checked( $noInvoiceFreeEvents, "true" ); ?>
							       value="true" />
							<?php echo esc_html_x( 'Hide invoice information if the event is free', 'backend', 'eduadmin-booking' ); ?>
						</label>
						<br /> <?php $hideInvoiceEmailField = get_option( 'eduadmin-hideInvoiceEmailField', false ); ?>
						<label>
							<input type="checkbox"
							       name="eduadmin-hideInvoiceEmailField"<?php checked( $hideInvoiceEmailField, "true" ); ?>
							       value="true" />
							<?php echo esc_html_x( 'Hide the invoice e-mail field', 'backend', 'eduadmin-booking' ); ?>
						</label>
						<br /> <?php $forceShowInvoiceInformation = get_option( 'eduadmin-showInvoiceInformation', false ); ?>
						<label>
							<input type="checkbox"
							       name="eduadmin-showInvoiceInformation"<?php checked( $forceShowInvoiceInformation, "true" ); ?>
							       value="true" />
							<?php echo esc_html_x( 'Force show invoice information fields', 'backend', 'eduadmin-booking' ); ?>
						</label>
						<h3><?php echo esc_html_x( 'Price name settings', 'backend', 'eduadmin-booking' ); ?></h3> <?php
						$priceNameSetting = get_option( 'eduadmin-selectPricename', 'firstPublic' );
						?>
						<label>
							<input type="radio"
							       name="eduadmin-selectPricename"<?php checked( $priceNameSetting, "firstPublic" ); ?>
							       value="firstPublic" />
							<?php echo esc_html_x( 'EduAdmin chooses the appropriate price name for the event and participants', 'backend', 'eduadmin-booking' ); ?>
						</label>
						<br />
						<label>
							<input type="radio"
							       name="eduadmin-selectPricename"<?php checked( $priceNameSetting, "selectWholeEvent" ); ?>
							       value="selectWholeEvent" />
							<?php echo esc_html_x( 'Can choose between public price names', 'backend', 'eduadmin-booking' ); ?>
						</label>
						<br />
						<label>
							<input type="radio"
							       name="eduadmin-selectPricename"<?php checked( $priceNameSetting, "selectParticipant" ); ?>
							       value="selectParticipant" />
							<?php echo esc_html_x( 'Can choose per participant', 'backend', 'eduadmin-booking' ); ?>
						</label> <?php
						$selected_match = get_option( 'eduadmin-customerMatching', 'use-match' );
						?>
						<h3><?php echo esc_html_x( 'Customer matching', 'backend', 'eduadmin-booking' ); ?></h3>
						<select name="eduadmin-customerMatching">
							<option<?php selected( $selected_match, 'use-match' ); ?> value="use-match">
								<?php echo esc_html_x( 'Let EduAdmin match customers (Creates new if no match is found)', 'backend', 'eduadmin-booking' ); ?>
							</option>
							<option<?php selected( $selected_match, 'no-match' ); ?> value="no-match">
								<?php echo esc_html_x( 'No matching (Creates new customers every time)', 'backend', 'eduadmin-booking' ); ?>
							</option>
						</select>
						<br />
						<br /> <?php
						$selectedCurrency = get_option( 'eduadmin-currency', 'SEK' );
						?> <h3><?php echo esc_html_x( 'Currency', 'backend', 'eduadmin-booking' ); ?></h3>
						<select name="eduadmin-currency">
							<option value="AED"<?php selected( $selectedCurrency, "AED" ); ?>>
								AED
								- United Arab Emirates, Dirhams
							</option>
							<option value="AFN"<?php selected( $selectedCurrency, "AFN" ); ?>>
								AFN
								- Afghanistan, Afghanis
							</option>
							<option value="ALL"<?php selected( $selectedCurrency, "ALL" ); ?>>
								ALL
								- Albania, Leke
							</option>
							<option value="AMD"<?php selected( $selectedCurrency, "AMD" ); ?>>
								AMD
								- Armenia, Drams
							</option>
							<option value="ANG"<?php selected( $selectedCurrency, "ANG" ); ?>>
								ANG
								- Netherlands Antilles, Guilders (also called Florins)
							</option>
							<option value="AOA"<?php selected( $selectedCurrency, "AOA" ); ?>>
								AOA
								- Angola, Kwanza
							</option>
							<option value="ARS"<?php selected( $selectedCurrency, "ARS" ); ?>>
								ARS
								- Argentina, Pesos
							</option>
							<option value="AUD"<?php selected( $selectedCurrency, "AUD" ); ?>>
								AUD
								- Australia, Dollars
							</option>
							<option value="AWG"<?php selected( $selectedCurrency, "AWG" ); ?>>
								AWG
								- Aruba, Guilders (also called Florins)
							</option>
							<option value="AZN"<?php selected( $selectedCurrency, "AZN" ); ?>>
								AZN
								- Azerbaijan, New Manats
							</option>
							<option value="BAM"<?php selected( $selectedCurrency, "BAM" ); ?>>
								BAM
								- Bosnia and Herzegovina, Convertible Marka
							</option>
							<option value="BBD"<?php selected( $selectedCurrency, "BBD" ); ?>>
								BBD
								- Barbados, Dollars
							</option>
							<option value="BDT"<?php selected( $selectedCurrency, "BDT" ); ?>>
								BDT
								- Bangladesh, Taka
							</option>
							<option value="BGN"<?php selected( $selectedCurrency, "BGN" ); ?>>
								BGN
								- Bulgaria, Leva
							</option>
							<option value="BHD"<?php selected( $selectedCurrency, "BHD" ); ?>>
								BHD
								- Bahrain, Dinars
							</option>
							<option value="BIF"<?php selected( $selectedCurrency, "BIF" ); ?>>
								BIF
								- Burundi, Francs
							</option>
							<option value="BMD"<?php selected( $selectedCurrency, "BMD" ); ?>>
								BMD
								- Bermuda, Dollars
							</option>
							<option value="BND"<?php selected( $selectedCurrency, "BND" ); ?>>
								BND
								- Brunei Darussalam, Dollars
							</option>
							<option value="BOB"<?php selected( $selectedCurrency, "BOB" ); ?>>
								BOB
								- Bolivia, Bolivianos
							</option>
							<option value="BRL"<?php selected( $selectedCurrency, "BRL" ); ?>>
								BRL
								- Brazil, Brazil Real
							</option>
							<option value="BSD"<?php selected( $selectedCurrency, "BSD" ); ?>>
								BSD
								- Bahamas, Dollars
							</option>
							<option value="BTN"<?php selected( $selectedCurrency, "BTN" ); ?>>
								BTN
								- Bhutan, Ngultrum
							</option>
							<option value="BWP"<?php selected( $selectedCurrency, "BWP" ); ?>>
								BWP
								- Botswana, Pulas
							</option>
							<option value="BYR"<?php selected( $selectedCurrency, "BYR" ); ?>>
								BYR
								- Belarus, Rubles
							</option>
							<option value="BZD"<?php selected( $selectedCurrency, "BZD" ); ?>>
								BZD
								- Belize, Dollars
							</option>
							<option value="CAD"<?php selected( $selectedCurrency, "CAD" ); ?>>
								CAD
								- Canada, Dollars
							</option>
							<option value="CDF"<?php selected( $selectedCurrency, "CDF" ); ?>>
								CDF
								- Congo/Kinshasa, Congolese Francs
							</option>
							<option value="CHF"<?php selected( $selectedCurrency, "CHF" ); ?>>
								CHF
								- Switzerland, Francs
							</option>
							<option value="CLP"<?php selected( $selectedCurrency, "CLP" ); ?>>
								CLP
								- Chile, Pesos
							</option>
							<option value="CNY"<?php selected( $selectedCurrency, "CNY" ); ?>>
								CNY
								- China, Yuan Renminbi
							</option>
							<option value="COP"<?php selected( $selectedCurrency, "COP" ); ?>>
								COP
								- Colombia, Pesos
							</option>
							<option value="CRC"<?php selected( $selectedCurrency, "CRC" ); ?>>
								CRC
								- Costa Rica, Colones
							</option>
							<option value="CUP"<?php selected( $selectedCurrency, "CUP" ); ?>>
								CUP
								- Cuba, Pesos
							</option>
							<option value="CVE"<?php selected( $selectedCurrency, "CVE" ); ?>>
								CVE
								- Cape Verde, Escudos
							</option>
							<option value="CZK"<?php selected( $selectedCurrency, "CZK" ); ?>>
								CZK
								- Czech Republic, Koruny
							</option>
							<option value="DJF"<?php selected( $selectedCurrency, "DJF" ); ?>>
								DJF
								- Djibouti, Francs
							</option>
							<option value="DKK"<?php selected( $selectedCurrency, "DKK" ); ?>>
								DKK
								- Denmark, Kroner
							</option>
							<option value="DOP"<?php selected( $selectedCurrency, "DOP" ); ?>>
								DOP
								- Dominican Republic, Pesos
							</option>
							<option value="DZD"<?php selected( $selectedCurrency, "DZD" ); ?>>
								DZD
								- Algeria, Algeria Dinars
							</option>
							<option value="EGP"<?php selected( $selectedCurrency, "EGP" ); ?>>
								EGP
								- Egypt, Pounds
							</option>
							<option value="ERN"<?php selected( $selectedCurrency, "ERN" ); ?>>
								ERN
								- Eritrea, Nakfa
							</option>
							<option value="ETB"<?php selected( $selectedCurrency, "ETB" ); ?>>
								ETB
								- Ethiopia, Birr
							</option>
							<option value="EUR"<?php selected( $selectedCurrency, "EUR" ); ?>>
								EUR
								- Euro Member Countries, Euro
							</option>
							<option value="FJD"<?php selected( $selectedCurrency, "FJD" ); ?>>
								FJD
								- Fiji, Dollars
							</option>
							<option value="FKP"<?php selected( $selectedCurrency, "FKP" ); ?>>
								FKP
								- Falkland Islands (Malvinas), Pounds
							</option>
							<option value="GBP"<?php selected( $selectedCurrency, "GBP" ); ?>>
								GBP
								- United Kingdom, Pounds
							</option>
							<option value="GEL"<?php selected( $selectedCurrency, "GEL" ); ?>>
								GEL
								- Georgia, Lari
							</option>
							<option value="GHS"<?php selected( $selectedCurrency, "GHS" ); ?>>
								GHS
								- Ghana, Cedis
							</option>
							<option value="GIP"<?php selected( $selectedCurrency, "GIP" ); ?>>
								GIP
								- Gibraltar, Pounds
							</option>
							<option value="GMD"<?php selected( $selectedCurrency, "GMD" ); ?>>
								GMD
								- Gambia, Dalasi
							</option>
							<option value="GNF"<?php selected( $selectedCurrency, "GNF" ); ?>>
								GNF
								- Guinea, Francs
							</option>
							<option value="GTQ"<?php selected( $selectedCurrency, "GTQ" ); ?>>
								GTQ
								- Guatemala, Quetzales
							</option>
							<option value="GYD"<?php selected( $selectedCurrency, "GYD" ); ?>>
								GYD
								- Guyana, Dollars
							</option>
							<option value="HKD"<?php selected( $selectedCurrency, "HKD" ); ?>>
								HKD
								- Hong Kong, Dollars
							</option>
							<option value="HNL"<?php selected( $selectedCurrency, "HNL" ); ?>>
								HNL
								- Honduras, Lempiras
							</option>
							<option value="HRK"<?php selected( $selectedCurrency, "HRK" ); ?>>
								HRK
								- Croatia, Kuna
							</option>
							<option value="HTG"<?php selected( $selectedCurrency, "HTG" ); ?>>
								HTG
								- Haiti, Gourdes
							</option>
							<option value="HUF"<?php selected( $selectedCurrency, "HUF" ); ?>>
								HUF
								- Hungary, Forint
							</option>
							<option value="IDR"<?php selected( $selectedCurrency, "IDR" ); ?>>
								IDR
								- Indonesia, Rupiahs
							</option>
							<option value="ILS"<?php selected( $selectedCurrency, "ILS" ); ?>>
								ILS
								- Israel, New Shekels
							</option>
							<option value="INR"<?php selected( $selectedCurrency, "INR" ); ?>>
								INR
								- India, Rupees
							</option>
							<option value="IQD"<?php selected( $selectedCurrency, "IQD" ); ?>>
								IQD
								- Iraq, Dinars
							</option>
							<option value="IRR"<?php selected( $selectedCurrency, "IRR" ); ?>>
								IRR
								- Iran, Rials
							</option>
							<option value="ISK"<?php selected( $selectedCurrency, "ISK" ); ?>>
								ISK
								- Iceland, Kronur
							</option>
							<option value="JMD"<?php selected( $selectedCurrency, "JMD" ); ?>>
								JMD
								- Jamaica, Dollars
							</option>
							<option value="JOD"<?php selected( $selectedCurrency, "JOD" ); ?>>
								JOD
								- Jordan, Dinars
							</option>
							<option value="JPY"<?php selected( $selectedCurrency, "JPY" ); ?>>
								JPY
								- Japan, Yen
							</option>
							<option value="KES"<?php selected( $selectedCurrency, "KES" ); ?>>
								KES
								- Kenya, Shillings
							</option>
							<option value="KGS"<?php selected( $selectedCurrency, "KGS" ); ?>>
								KGS
								- Kyrgyzstan, Soms
							</option>
							<option value="KHR"<?php selected( $selectedCurrency, "KHR" ); ?>>
								KHR
								- Cambodia, Riels
							</option>
							<option value="KMF"<?php selected( $selectedCurrency, "KMF" ); ?>>
								KMF
								- Comoros, Francs
							</option>
							<option value="KPW"<?php selected( $selectedCurrency, "KPW" ); ?>>
								KPW
								- Korea (North), Won
							</option>
							<option value="KRW"<?php selected( $selectedCurrency, "KRW" ); ?>>
								KRW
								- Korea (South), Won
							</option>
							<option value="KWD"<?php selected( $selectedCurrency, "KWD" ); ?>>
								KWD
								- Kuwait, Dinars
							</option>
							<option value="KYD"<?php selected( $selectedCurrency, "KYD" ); ?>>
								KYD
								- Cayman Islands, Dollars
							</option>
							<option value="KZT"<?php selected( $selectedCurrency, "KZT" ); ?>>
								KZT
								- Kazakhstan, Tenge
							</option>
							<option value="LAK"<?php selected( $selectedCurrency, "LAK" ); ?>>
								LAK
								- Laos, Kips
							</option>
							<option value="LBP"<?php selected( $selectedCurrency, "LBP" ); ?>>
								LBP
								- Lebanon, Pounds
							</option>
							<option value="LKR"<?php selected( $selectedCurrency, "LKR" ); ?>>
								LKR
								- Sri Lanka, Rupees
							</option>
							<option value="LRD"<?php selected( $selectedCurrency, "LRD" ); ?>>
								LRD
								- Liberia, Dollars
							</option>
							<option value="LSL"<?php selected( $selectedCurrency, "LSL" ); ?>>
								LSL
								- Lesotho, Maloti
							</option>
							<option value="LYD"<?php selected( $selectedCurrency, "LYD" ); ?>>
								LYD
								- Libya, Dinars
							</option>
							<option value="MAD"<?php selected( $selectedCurrency, "MAD" ); ?>>
								MAD
								- Morocco, Dirhams
							</option>
							<option value="MDL"<?php selected( $selectedCurrency, "MDL" ); ?>>
								MDL
								- Moldova, Lei
							</option>
							<option value="MGA"<?php selected( $selectedCurrency, "MGA" ); ?>>
								MGA
								- Madagascar, Ariary
							</option>
							<option value="MKD"<?php selected( $selectedCurrency, "MKD" ); ?>>
								MKD
								- Macedonia, Denars
							</option>
							<option value="MMK"<?php selected( $selectedCurrency, "MMK" ); ?>>
								MMK
								- Myanmar (Burma), Kyats
							</option>
							<option value="MNT"<?php selected( $selectedCurrency, "MNT" ); ?>>
								MNT
								- Mongolia, Tugriks
							</option>
							<option value="MOP"<?php selected( $selectedCurrency, "MOP" ); ?>>
								MOP
								- Macau, Patacas
							</option>
							<option value="MRO"<?php selected( $selectedCurrency, "MRO" ); ?>>
								MRO
								- Mauritania, Ouguiyas
							</option>
							<option value="MUR"<?php selected( $selectedCurrency, "MUR" ); ?>>
								MUR
								- Mauritius, Rupees
							</option>
							<option value="MWK"<?php selected( $selectedCurrency, "MWK" ); ?>>
								MWK
								- Malawi, Kwachas
							</option>
							<option value="MVR"<?php selected( $selectedCurrency, "MVR" ); ?>>
								MVR
								- Maldives (Maldive Islands), Rufiyaa
							</option>
							<option value="MXN"<?php selected( $selectedCurrency, "MXN" ); ?>>
								MXN
								- Mexico, Pesos
							</option>
							<option value="MYR"<?php selected( $selectedCurrency, "MYR" ); ?>>
								MYR
								- Malaysia, Ringgits
							</option>
							<option value="MZN"<?php selected( $selectedCurrency, "MZN" ); ?>>
								MZN
								- Mozambique, Meticais
							</option>
							<option value="NAD"<?php selected( $selectedCurrency, "NAD" ); ?>>
								NAD
								- Namibia, Dollars
							</option>
							<option value="NGN"<?php selected( $selectedCurrency, "NGN" ); ?>>
								NGN
								- Nigeria, Nairas
							</option>
							<option value="NIO"<?php selected( $selectedCurrency, "NIO" ); ?>>
								NIO
								- Nicaragua, Cordobas
							</option>
							<option value="NOK"<?php selected( $selectedCurrency, "NOK" ); ?>>
								NOK
								- Norway, Krone
							</option>
							<option value="NPR"<?php selected( $selectedCurrency, "NPR" ); ?>>
								NPR
								- Nepal, Nepal Rupees
							</option>
							<option value="NZD"<?php selected( $selectedCurrency, "NZD" ); ?>>
								NZD
								- New Zealand, Dollars
							</option>
							<option value="OMR"<?php selected( $selectedCurrency, "OMR" ); ?>>
								OMR
								- Oman, Rials
							</option>
							<option value="PAB"<?php selected( $selectedCurrency, "PAB" ); ?>>
								PAB
								- Panama, Balboa
							</option>
							<option value="PEN"<?php selected( $selectedCurrency, "PEN" ); ?>>
								PEN
								- Peru, Nuevos Soles
							</option>
							<option value="PGK"<?php selected( $selectedCurrency, "PGK" ); ?>>
								PGK
								- Papua New Guinea, Kina
							</option>
							<option value="PHP"<?php selected( $selectedCurrency, "PHP" ); ?>>
								PHP
								- Philippines, Pesos
							</option>
							<option value="PKR"<?php selected( $selectedCurrency, "PKR" ); ?>>
								PKR
								- Pakistan, Rupees
							</option>
							<option value="PLN"<?php selected( $selectedCurrency, "PLN" ); ?>>
								PLN
								- Poland, Zlotych
							</option>
							<option value="PYG"<?php selected( $selectedCurrency, "PYG" ); ?>>
								PYG
								- Paraguay, Guarani
							</option>
							<option value="QAR"<?php selected( $selectedCurrency, "QAR" ); ?>>
								QAR
								- Qatar, Rials
							</option>
							<option value="RON"<?php selected( $selectedCurrency, "RON" ); ?>>
								RON
								- Romania, New Lei
							</option>
							<option value="RSD"<?php selected( $selectedCurrency, "RSD" ); ?>>
								RSD
								- Serbia, Dinars
							</option>
							<option value="RUB"<?php selected( $selectedCurrency, "RUB" ); ?>>
								RUB
								- Russia, Rubles
							</option>
							<option value="RWF"<?php selected( $selectedCurrency, "RWF" ); ?>>
								RWF
								- Rwanda, Rwanda Francs
							</option>
							<option value="SAR"<?php selected( $selectedCurrency, "SAR" ); ?>>
								SAR
								- Saudi Arabia, Riyals
							</option>
							<option value="SBD"<?php selected( $selectedCurrency, "SBD" ); ?>>
								SBD
								- Solomon Islands, Dollars
							</option>
							<option value="SCR"<?php selected( $selectedCurrency, "SCR" ); ?>>
								SCR
								- Seychelles, Rupees
							</option>
							<option value="SDG"<?php selected( $selectedCurrency, "SDG" ); ?>>
								SDG
								- Sudan, Pounds
							</option>
							<option value="SEK"<?php selected( $selectedCurrency, "SEK" ); ?>>
								SEK
								- Sweden, Kronor
							</option>
							<option value="SGD"<?php selected( $selectedCurrency, "SGD" ); ?>>
								SGD
								- Singapore, Dollars
							</option>
							<option value="SHP"<?php selected( $selectedCurrency, "SHP" ); ?>>
								SHP
								- Saint Helena, Pounds
							</option>
							<option value="SLL"<?php selected( $selectedCurrency, "SLL" ); ?>>
								SLL
								- Sierra Leone, Leones
							</option>
							<option value="SOS"<?php selected( $selectedCurrency, "SOS" ); ?>>
								SOS
								- Somalia, Shillings
							</option>
							<option value="SRD"<?php selected( $selectedCurrency, "SRD" ); ?>>
								SRD
								- Suriname, Dollars
							</option>
							<option value="STD"<?php selected( $selectedCurrency, "STD" ); ?>>
								STD
								- São Tome and Principe, Dobras
							</option>
							<option value="SYP"<?php selected( $selectedCurrency, "SYP" ); ?>>
								SYP
								- Syria, Pounds
							</option>
							<option value="SZL"<?php selected( $selectedCurrency, "SZL" ); ?>>
								SZL
								- Swaziland, Emalangeni
							</option>
							<option value="THB"<?php selected( $selectedCurrency, "THB" ); ?>>
								THB
								- Thailand, Baht
							</option>
							<option value="TJS"<?php selected( $selectedCurrency, "TJS" ); ?>>
								TJS
								- Tajikistan, Somoni
							</option>
							<option value="TMT"<?php selected( $selectedCurrency, "TMT" ); ?>>
								TMT
								- Turkmenistan, New Manats
							</option>
							<option value="TND"<?php selected( $selectedCurrency, "TND" ); ?>>
								TND
								- Tunisia, Dinars
							</option>
							<option value="TOP"<?php selected( $selectedCurrency, "TOP" ); ?>>
								TOP
								- Tonga, Pa'anga
							</option>
							<option value="TRY"<?php selected( $selectedCurrency, "TRY" ); ?>>
								TRY
								- Turkey, New Lira
							</option>
							<option value="TTD"<?php selected( $selectedCurrency, "TTD" ); ?>>
								TTD
								- Trinidad and Tobago, Dollars
							</option>
							<option value="TWD"<?php selected( $selectedCurrency, "TWD" ); ?>>
								TWD
								- Taiwan, New Dollars
							</option>
							<option value="TZS"<?php selected( $selectedCurrency, "TZS" ); ?>>
								TZS
								- Tanzania, Shillings
							</option>
							<option value="UAH"<?php selected( $selectedCurrency, "UAH" ); ?>>
								UAH
								- Ukraine, Hryvnia
							</option>
							<option value="UGX"<?php selected( $selectedCurrency, "UGX" ); ?>>
								UGX
								- Uganda, Shillings
							</option>
							<option value="USD"<?php selected( $selectedCurrency, "USD" ); ?>>
								USD
								- United States of America, Dollars
							</option>
							<option value="UYU"<?php selected( $selectedCurrency, "UYU" ); ?>>
								UYU
								- Uruguay, Pesos
							</option>
							<option value="UZS"<?php selected( $selectedCurrency, "UZS" ); ?>>
								UZS
								- Uzbekistan, Sums
							</option>
							<option value="VEF"<?php selected( $selectedCurrency, "VEF" ); ?>>
								VEF
								- Venezuela, Bolivares Fuertes
							</option>
							<option value="VND"<?php selected( $selectedCurrency, "VND" ); ?>>
								VND
								- Viet Nam, Dong
							</option>
							<option value="WST"<?php selected( $selectedCurrency, "WST" ); ?>>
								WST
								- Samoa, Tala
							</option>
							<option value="VUV"<?php selected( $selectedCurrency, "VUV" ); ?>>
								VUV
								- Vanuatu, Vatu
							</option>
							<option value="XAF"<?php selected( $selectedCurrency, "XAF" ); ?>>
								XAF
								- Communauté Financière Africaine BEAC, Francs
							</option>
							<option value="XAG"<?php selected( $selectedCurrency, "XAG" ); ?>>
								XAG
								- Silver, Ounces
							</option>
							<option value="XAU"<?php selected( $selectedCurrency, "XAU" ); ?>>
								XAU
								- Gold, Ounces
							</option>
							<option value="XCD"<?php selected( $selectedCurrency, "XCD" ); ?>>
								XCD
								- East Caribbean Dollars
							</option>
							<option value="XDR"<?php selected( $selectedCurrency, "XDR" ); ?>>
								XDR
								- International Monetary Fund (IMF) Special Drawing Rights
							</option>
							<option value="XOF"<?php selected( $selectedCurrency, "XOF" ); ?>>
								XOF
								- Communauté Financière Africaine BCEAO, Francs
							</option>
							<option value="XPD"<?php selected( $selectedCurrency, "XPD" ); ?>>
								XPD
								- Palladium Ounces
							</option>
							<option value="XPF"<?php selected( $selectedCurrency, "XPF" ); ?>>
								XPF
								- Comptoirs Français du Pacifique Francs
							</option>
							<option value="XPT"<?php selected( $selectedCurrency, "XPT" ); ?>>
								XPT
								- Platinum, Ounces
							</option>
							<option value="YER"<?php selected( $selectedCurrency, "YER" ); ?>>
								YER
								- Yemen, Rials
							</option>
							<option value="ZAR"<?php selected( $selectedCurrency, "ZAR" ); ?>>
								ZAR
								- South Africa, Rand
							</option>
							<option value="ZMW"<?php selected( $selectedCurrency, "ZMW" ); ?>>
								ZMW
								- Zambia, Kwacha
							</option>
						</select>
						<h3><?php echo esc_html_x( 'Booking terms', 'backend', 'eduadmin-booking' ); ?></h3>
						<h4><?php echo esc_html_x( 'Booking terms link', 'backend', 'eduadmin-booking' ); ?></h4>
						<input type="url" class="form-control" style="width: 100%;" name="eduadmin-bookingTermsLink"
						       placeholder="<?php _ex( 'Booking terms link', 'backend', 'eduadmin-booking' ); ?>"
						       value="<?php echo get_option( 'eduadmin-bookingTermsLink' ); ?>" />
						<br />
						<label>
							<input type="checkbox" name="eduadmin-useBookingTermsCheckbox"
							       value="true"<?php checked( get_option( 'eduadmin-useBookingTermsCheckbox', false ), "true" ); ?> />
							<?php echo esc_html_x( 'Use booking terms', 'backend', 'eduadmin-booking' ); ?>
						</label>
						<h3><?php echo esc_html_x( 'Javascript to run when a booking is completed', 'backend', 'eduadmin-booking' ); ?></h3>
						<i><?php echo esc_html_x( 'You do not need to include &lt;script&gt;-tags', 'backend', 'eduadmin-booking' ); ?></i>
						<br />
						<table>
							<tr>
								<td style="vertical-align: top;">
								<textarea class="form-control" rows="10" cols="60"
								          name="eduadmin-javascript"><?php echo get_option( 'eduadmin-javascript' ); ?></textarea>
								</td>
								<td style="vertical-align: top;">
									<b><?php echo esc_html_x( 'Keywords for JavaScript', 'backend', 'eduadmin-booking' ); ?></b>
									<br />
									<hr noshade="noshade" />
									<table>
										<tr>
											<td><b>$bookingno$</b></td>
											<td><?php echo esc_html_x( 'The booking number', 'backend', 'eduadmin-booking' ); ?></td>
										</tr>
										<tr>
											<td><b>$productname$</b></td>
											<td><?php echo esc_html_x( 'Inserts the product name', 'backend', 'eduadmin-booking' ); ?></td>
										</tr>
										<tr>
											<td><b>$totalsum$</b></td>
											<td><?php echo esc_html_x( 'Inserts the total sum', 'backend', 'eduadmin-booking' ); ?></td>
										</tr>
										<tr>
											<td><b>$participants$</b></td>
											<td><?php echo esc_html_x( 'Inserts the number participants', 'backend', 'eduadmin-booking' ); ?></td>
										</tr>
										<tr>
											<td><b>$startdate$</b></td>
											<td><?php echo esc_html_x( 'Inserts the start date of the event', 'backend', 'eduadmin-booking' ); ?></td>
										</tr>
										<tr>
											<td><b>$enddate$</b></td>
											<td><?php echo esc_html_x( 'Inserts the end date of the event', 'backend', 'eduadmin-booking' ); ?></td>
										</tr>
										<tr>
											<td><b>$eventid$</b></td>
											<td><?php echo esc_html_x( 'Inserts the event unique identifier', 'backend', 'eduadmin-booking' ); ?></td>
										</tr>
										<tr>
											<td><b>$eventdescription$</b></td>
											<td><?php echo esc_html_x( 'Inserts the event description', 'backend', 'eduadmin-booking' ); ?></td>
										</tr>
										<tr>
											<td><b>$customerid$</b></td>
											<td><?php echo esc_html_x( 'Inserts the generated customer id', 'backend', 'eduadmin-booking' ); ?></td>
										</tr>
										<tr>
											<td><b>$customercontactid$</b></td>
											<td><?php echo esc_html_x( 'Inserts the generated contact id', 'backend', 'eduadmin-booking' ); ?></td>
										</tr>
										<tr>
											<td><b>$created$</b></td>
											<td><?php echo esc_html_x( 'Inserts the date the booking was created', 'backend', 'eduadmin-booking' ); ?></td>
										</tr>
										<tr>
											<td><b>$paid$</b></td>
											<td><?php echo esc_html_x( 'Inserts the payment status', 'backend', 'eduadmin-booking' ); ?></td>
										</tr>
										<tr>
											<td><b>$objectid$</b></td>
											<td><?php echo esc_html_x( 'Inserts the unique identifier for the course', 'backend', 'eduadmin-booking' ); ?></td>
										</tr>
										<tr>
											<td><b>$notes$</b></td>
											<td><?php echo esc_html_x( 'Inserts the booking notes', 'backend', 'eduadmin-booking' ); ?></td>
										</tr>
									</table>
								</td>
							</tr>
						</table>
					</div>
					<br /><p class="submit">
						<input type="submit" name="submit" id="submit" class="button button-primary"
						       value="<?php echo _x( 'Save settings', 'backend', 'eduadmin-booking' ); ?>" />
					</p>
				<?php } ?>
			</div>
		</form>
	</div>
	<?php
	EDU()->stop_timer( $t );
}
