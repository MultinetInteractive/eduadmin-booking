<?php
// phpcs:disable WordPress.NamingConventions,Squiz
$user     = EDU()->session['eduadmin-loginUser'];
$contact  = $user->Contact;
$customer = $user->Customer;

$invoice_customer = $user->Customer->BillingInfo;

if ( ! empty( $_POST['eduaction'] ) && wp_verify_nonce( $_POST['edu-profile-nonce'], 'edu-save-profile' ) && 'saveInfo' === sanitize_text_field( $_POST['eduaction'] ) ) {
	$patch_customer               = new stdClass();
	$patch_customer->CustomerName = wp_unslash( sanitize_text_field( $_POST['customerName'] ) );
	$patch_customer->Address      = wp_unslash( sanitize_text_field( $_POST['customerAddress'] ) );
	$patch_customer->Address2     = wp_unslash( sanitize_text_field( $_POST['customerAddress2'] ) );
	$patch_customer->Zip          = wp_unslash( sanitize_text_field( $_POST['customerZip'] ) );
	$patch_customer->City         = wp_unslash( sanitize_text_field( $_POST['customerCity'] ) );
	$patch_customer->Phone        = wp_unslash( sanitize_text_field( $_POST['customerPhone'] ) );
	$patch_customer->Email        = wp_unslash( sanitize_email( $_POST['customerEmail'] ) );

	$patch_customer->BillingInfo                     = new stdClass();
	$patch_customer->BillingInfo->CustomerName       = wp_unslash( sanitize_text_field( $_POST['customerInvoiceName'] ) );
	$patch_customer->BillingInfo->Address            = wp_unslash( sanitize_text_field( $_POST['customerInvoiceAddress'] ) );
	$patch_customer->BillingInfo->Zip                = wp_unslash( sanitize_text_field( $_POST['customerInvoiceZip'] ) );
	$patch_customer->BillingInfo->City               = wp_unslash( sanitize_text_field( $_POST['customerInvoiceCity'] ) );
	$patch_customer->BillingInfo->OrganisationNumber = wp_unslash( sanitize_text_field( $_POST['customerInvoiceOrgNr'] ) );
	$patch_customer->BillingInfo->BuyerReference     = wp_unslash( sanitize_text_field( $_POST['customerReference'] ) );
	$patch_customer->BillingInfo->Email              = wp_unslash( sanitize_email( $_POST['customerInvoiceEmail'] ) );

	$patch_contact         = new stdClass();
	$patch_contact->Phone  = wp_unslash( sanitize_text_field( $_POST['contactPhone'] ) );
	$patch_contact->Mobile = wp_unslash( sanitize_text_field( $_POST['contactMobile'] ) );
	$patch_contact->Email  = wp_unslash( sanitize_email( $_POST['contactEmail'] ) );

	EDUAPI()->REST->Customer->Update( $customer->CustomerId, $patch_customer );
	EDUAPI()->REST->Person->Update( $contact->PersonId, $patch_contact );
}

?>

<div class="eduadmin">
	<?php
	$tab = 'profile';
	require_once 'login-tab-header.php';
	?>
	<h2><?php echo esc_html_x( 'My profile', 'frontend', 'eduadmin-booking' ); ?></h2>
	<form action="" method="POST">
		<input type="hidden" name="eduaction" value="saveInfo" />
		<input type="hidden" name="edu-profile-nonce"
		       value="<?php echo esc_attr( wp_create_nonce( 'edu-save-profile' ) ); ?>" />
		<div class="eduadminCompanyInformation">
			<h3><?php echo esc_html_x( 'Company information', 'frontend', 'eduadmin-booking' ); ?></h3>
			<label class="profile-customer-name">
				<div
					class="inputLabel"><?php echo esc_html_x( 'Customer name', 'frontend', 'eduadmin-booking' ); ?></div>
				<div class="inputHolder">
					<input type="text" name="customerName" required
					       placeholder="<?php echo esc_attr_x( 'Customer name', 'frontend', 'eduadmin-booking' ); ?>"
					       value="<?php echo esc_attr( $customer->CustomerName ); ?>" />
				</div>
			</label>
			<label class="profile-customer-address1">
				<div class="inputLabel"><?php echo esc_html_x( 'Address', 'frontend', 'eduadmin-booking' ); ?></div>
				<div class="inputHolder">
					<input type="text" name="customerAddress"
					       placeholder="<?php echo esc_attr_x( 'Address', 'backend', 'eduadmin-booking' ); ?>"
					       value="<?php echo esc_attr( $customer->Address ); ?>" />
				</div>
			</label>
			<label class="profile-customer-address2">
				<div class="inputLabel"><?php echo esc_html_x( 'Address 2', 'frontend', 'eduadmin-booking' ); ?></div>
				<div class="inputHolder">
					<input type="text" name="customerAddress2"
					       placeholder="<?php echo esc_attr_x( 'Address 2', 'frontend', 'eduadmin-booking' ); ?>"
					       value="<?php echo esc_attr( $customer->Address2 ); ?>" />
				</div>
			</label>
			<label class="profile-customer-postalcode">
				<div class="inputLabel"><?php echo esc_html_x( 'Postal code', 'frontend', 'eduadmin-booking' ); ?></div>
				<div class="inputHolder">
					<input type="text" name="customerZip"
					       placeholder="<?php echo esc_attr_x( 'Postal code', 'backend', 'eduadmin-booking' ); ?>"
					       value="<?php echo esc_attr( $customer->Zip ); ?>" />
				</div>
			</label>
			<label class="profile-customer-postalcity">
				<div class="inputLabel"><?php echo esc_html_x( 'Postal city', 'frontend', 'eduadmin-booking' ); ?></div>
				<div class="inputHolder">
					<input type="text" name="customerCity"
					       placeholder="<?php echo esc_attr_x( 'Postal city', 'frontend', 'eduadmin-booking' ); ?>"
					       value="<?php echo esc_attr( $customer->City ); ?>" />
				</div>
			</label>
			<label class="profile-customer-emailaddress">
				<div
					class="inputLabel"><?php echo esc_html_x( 'E-mail address', 'frontend', 'eduadmin-booking' ); ?></div>
				<div class="inputHolder">
					<input type="text" name="customerEmail"
					       placeholder="<?php echo esc_attr_x( 'E-mail address', 'frontend', 'eduadmin-booking' ); ?>"
					       value="<?php echo esc_attr( $customer->Email ); ?>" />
				</div>
			</label>
			<label class="profile-customer-phone">
				<div class="inputLabel"><?php echo esc_html_x( 'Phone', 'frontend', 'eduadmin-booking' ); ?></div>
				<div class="inputHolder">
					<input type="text" name="customerPhone"
					       placeholder="<?php echo esc_attr_x( 'Phone', 'frontend', 'eduadmin-booking' ); ?>"
					       value="<?php echo esc_attr( $customer->Phone ); ?>" />
				</div>
			</label>
		</div>
		<div class="eduadminInvoiceInformation">
			<h3><?php echo esc_html_x( 'Invoice information', 'frontend', 'eduadmin-booking' ); ?></h3>
			<label class="profile-invoice-customer-name">
				<div
					class="inputLabel"><?php echo esc_html_x( 'Customer name', 'frontend', 'eduadmin-booking' ); ?></div>
				<div class="inputHolder">
					<input type="text" name="customerInvoiceName"
					       placeholder="<?php echo esc_attr_x( 'Customer name', 'frontend', 'eduadmin-booking' ); ?>"
					       value="<?php echo esc_attr( $invoice_customer->CustomerName ); ?>" />
				</div>
			</label>
			<label class="profile-invoice-customer-address">
				<div class="inputLabel"><?php echo esc_html_x( 'Address', 'frontend', 'eduadmin-booking' ); ?></div>
				<div class="inputHolder">
					<input type="text" name="customerInvoiceAddress"
					       placeholder="<?php echo esc_attr_x( 'Address', 'frontend', 'eduadmin-booking' ); ?>"
					       value="<?php echo esc_attr( $invoice_customer->Address ); ?>" />
				</div>
			</label>

			<label class="profile-invoice-customer-postalcode">
				<div class="inputLabel"><?php echo esc_html_x( 'Postal code', 'frontend', 'eduadmin-booking' ); ?></div>
				<div class="inputHolder">
					<input type="text" name="customerInvoiceZip"
					       placeholder="<?php echo esc_attr_x( 'Postal code', 'frontend', 'eduadmin-booking' ); ?>"
					       value="<?php echo esc_attr( $invoice_customer->Zip ); ?>" />
				</div>
			</label>
			<label class="profile-invoice-customer-postalcity">
				<div class="inputLabel"><?php echo esc_html_x( 'Postal city', 'frontend', 'eduadmin-booking' ); ?></div>
				<div class="inputHolder">
					<input type="text" name="customerInvoiceCity"
					       placeholder="<?php echo esc_attr_x( 'Postal city', 'frontend', 'eduadmin-booking' ); ?>"
					       value="<?php echo esc_attr( $invoice_customer->City ); ?>" />
				</div>
			</label>
			<label class="profile-invoice-customer-orgno">
				<div class="inputLabel"><?php echo esc_html_x( 'Org.No.', 'frontend', 'eduadmin-booking' ); ?></div>
				<div class="inputHolder">
					<input type="text" name="customerInvoiceOrgNr"
					       placeholder="<?php echo esc_attr_x( 'Org.No.', 'frontend', 'eduadmin-booking' ); ?>"
					       value="<?php echo esc_attr( $invoice_customer->OrganisationNumber ); ?>" />
				</div>
			</label>
			<label class="profile-invoice-customer-emailaddress">
				<div
					class="inputLabel"><?php echo esc_html_x( 'Invoice e-mail address', 'frontend', 'eduadmin-booking' ); ?></div>
				<div class="inputHolder">
					<input type="text" name="customerInvoiceEmail"
					       placeholder="<?php echo esc_attr_x( 'Invoice e-mail address', 'frontend', 'eduadmin-booking' ); ?>"
					       value="<?php echo esc_attr( $invoice_customer->Email ); ?>" />
				</div>
			</label>
			<label class="profile-invoice-customer-reference">
				<div
					class="inputLabel"><?php echo esc_html_x( 'Invoice reference', 'frontend', 'eduadmin-booking' ); ?></div>
				<div class="inputHolder">
					<input type="text" name="customerReference"
					       placeholder="<?php echo esc_attr_x( 'Invoice reference', 'frontend', 'eduadmin-booking' ); ?>"
					       value="<?php echo esc_attr( $invoice_customer->BuyerReference ); ?>" />
				</div>
			</label>
		</div>
		<div class="eduadminContactInformation">
			<h3><?php echo esc_html_x( 'Contact information', 'frontend', 'eduadmin-booking' ); ?></h3>
			<label class="profile-contact-name">
				<div
					class="inputLabel"><?php echo esc_html_x( 'Contact name', 'frontend', 'eduadmin-booking' ); ?></div>
				<div class="inputHolder">
					<input type="text" name="contactName" readonly required
					       placeholder="<?php echo esc_attr_x( 'Contact name', 'frontend', 'eduadmin-booking' ); ?>"
					       value="<?php echo esc_attr( $contact->FirstName . " " . $contact->LastName ); ?>" />
				</div>
			</label>
			<label class="profile-contact-phone">
				<div class="inputLabel"><?php echo esc_html_x( 'Phone', 'frontend', 'eduadmin-booking' ); ?></div>
				<div class="inputHolder">
					<input type="text" name="contactPhone"
					       placeholder="<?php echo esc_attr_x( 'Phone', 'frontend', 'eduadmin-booking' ); ?>"
					       value="<?php echo esc_attr( $contact->Phone ); ?>" />
				</div>
			</label>

			<label class="profile-contact-mobile">
				<div class="inputLabel"><?php echo esc_html_x( 'Mobile', 'frontend', 'eduadmin-booking' ); ?></div>
				<div class="inputHolder">
					<input type="text" name="contactMobile"
					       placeholder="<?php echo esc_attr_x( 'Mobile', 'frontend', 'eduadmin-booking' ); ?>"
					       value="<?php echo esc_attr( $contact->Mobile ); ?>" />
				</div>
			</label>
			<label class="profile-contact-emailaddress">
				<div
					class="inputLabel"><?php echo esc_html_x( 'E-mail address', 'frontend', 'eduadmin-booking' ); ?></div>
				<div class="inputHolder">
					<input type="text" name="contactEmail" readonly required
					       placeholder="<?php echo esc_attr_x( 'E-mail address', 'frontend', 'eduadmin-booking' ); ?>"
					       value="<?php echo esc_attr( $contact->Email ); ?>" />
				</div>
			</label>
			<a href="<?php echo esc_url( $base_url . '/profile/changepassword' ); ?>"><?php echo esc_html_x( 'Change password', 'frontend', 'eduadmin-booking' ); ?></a>
		</div>
		<button
			class="profileSaveButton cta-btn"><?php echo esc_html_x( 'Save', 'frontend', 'eduadmin-booking' ); ?></button>
	</form>
	<?php require_once 'login-tab-footer.php'; ?>
</div>
