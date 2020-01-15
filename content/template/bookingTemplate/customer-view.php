<?php
// phpcs:disable WordPress.NamingConventions
if ( ! empty( $customer->BillingInfo ) ) {
	$billing_customer = $customer->BillingInfo;
} else {
	$billing_customer = new EduAdmin_Data_BillingInfo();
}

if ( isset( $customer->CustomerId ) && 0 !== $customer->CustomerId ) {
	echo '<input type="hidden" name="edu-customerId" value="' . esc_attr( $customer->CustomerId ) . '" />';
}
?>
<div class="customerView">
	<h2><?php echo esc_html_x( 'Customer information', 'frontend', 'eduadmin-booking' ); ?></h2>
	<label class="edu-book-customerName">
		<div class="inputLabel">
			<?php echo esc_html_x( 'Customer name', 'frontend', 'eduadmin-booking' ); ?>
		</div>
		<div class="inputHolder">
			<input type="text" required name="customerName" autocomplete="organization" placeholder="<?php echo esc_attr_x( 'Customer name', 'frontend', 'eduadmin-booking' ); ?>" value="<?php echo @esc_attr( $customer->CustomerName ); ?>" />
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
				<input type="text" name="customerVatNo" placeholder="<?php echo esc_attr_x( 'Org.No.', 'frontend', 'eduadmin-booking' ); ?>" value="<?php echo @esc_attr( $customer->OrganisationNumber ); ?>" />
			</div>
		</label>
		<label class="edu-book-customerAddress1">
			<div class="inputLabel">
				<?php echo esc_html_x( 'Address 1', 'frontend', 'eduadmin-booking' ); ?>
			</div>
			<div class="inputHolder">
				<input type="text" name="customerAddress1" placeholder="<?php echo esc_attr_x( 'Address 1', 'frontend', 'eduadmin-booking' ); ?>" value="<?php echo @esc_attr( $customer->Address ); ?>" />
			</div>
		</label>
		<label class="edu-book-customerAddress2">
			<div class="inputLabel">
				<?php echo esc_html_x( 'Address 2', 'frontend', 'eduadmin-booking' ); ?>
			</div>
			<div class="inputHolder">
				<input type="text" name="customerAddress2" placeholder="<?php echo esc_attr_x( 'Address 2', 'frontend', 'eduadmin-booking' ); ?>" value="<?php echo @esc_attr( $customer->Address2 ); ?>" />
			</div>
		</label>
		<label class="edu-book-customerPostalCode">
			<div class="inputLabel">
				<?php echo esc_html_x( 'Postal code', 'frontend', 'eduadmin-booking' ); ?>
			</div>
			<div class="inputHolder">
				<input type="text" name="customerPostalCode" placeholder="<?php echo esc_attr_x( 'Postal code', 'frontend', 'eduadmin-booking' ); ?>" value="<?php echo @esc_attr( $customer->Zip ); ?>" />
			</div>
		</label>
		<label class="edu-book-customerPostalCity">
			<div class="inputLabel">
				<?php echo esc_html_x( 'Postal city', 'frontend', 'eduadmin-booking' ); ?>
			</div>
			<div class="inputHolder">
				<input type="text" name="customerPostalCity" placeholder="<?php echo esc_attr_x( 'Postal city', 'frontend', 'eduadmin-booking' ); ?>" value="<?php echo @esc_attr( $customer->City ); ?>" />
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
				<input type="text" name="customerEmail" placeholder="<?php echo esc_attr_x( 'E-mail address', 'frontend', 'eduadmin-booking' ); ?>" value="<?php echo @esc_attr( $customer->Email ); ?>" />
			</div>
		</label>
		<div id="invoiceView" class="invoiceView" style="<?php echo( $force_show_invoice_information ? 'display: block;' : 'display: none;' ); ?>">
			<h2><?php echo esc_html_x( 'Invoice information', 'frontend', 'eduadmin-booking' ); ?></h2>
			<label class="edu-book-invoice-customerName">
				<div class="inputLabel">
					<?php echo esc_html_x( 'Customer name', 'frontend', 'eduadmin-booking' ); ?>
				</div>
				<div class="inputHolder">
					<input type="text" name="invoiceName" placeholder="<?php echo esc_attr_x( 'Customer name', 'frontend', 'eduadmin-booking' ); ?>" value="<?php echo @esc_attr( $billing_customer->CustomerName ); ?>" />
				</div>
			</label>
			<label class="edu-book-invoice-customerInvoiceOrgNo">
				<div class="inputLabel">
					<?php echo esc_html_x( 'Org.No.', 'frontend', 'eduadmin-booking' ); ?>
				</div>
				<div class="inputHolder">
					<input type="text" name="invoiceOrgNo" placeholder="<?php echo esc_attr_x( 'Org.No.', 'frontend', 'eduadmin-booking' ); ?>" value="<?php echo @esc_attr( $billing_customer->OrganisationNumber ); ?>" />
				</div>
			</label>
			<label class="edu-book-invoice-customerAddress1">
				<div class="inputLabel">
					<?php echo esc_html_x( 'Address 1', 'frontend', 'eduadmin-booking' ); ?>
				</div>
				<div class="inputHolder">
					<input type="text" name="invoiceAddress1" placeholder="<?php echo esc_attr_x( 'Address 1', 'frontend', 'eduadmin-booking' ); ?>" value="<?php echo @esc_attr( $billing_customer->Address ); ?>" />
				</div>
			</label>
			<label class="edu-book-invoice-customerAddress2">
				<div class="inputLabel">
					<?php echo esc_html_x( 'Address 2', 'frontend', 'eduadmin-booking' ); ?>
				</div>
				<div class="inputHolder">
					<input type="text" name="invoiceAddress2" placeholder="<?php echo esc_attr_x( 'Address 2', 'frontend', 'eduadmin-booking' ); ?>" value="<?php echo @esc_attr( $billing_customer->Address2 ); ?>" />
				</div>
			</label>
			<label class="edu-book-invoice-customerPostalCode">
				<div class="inputLabel">
					<?php echo esc_html_x( 'Postal code', 'frontend', 'eduadmin-booking' ); ?>
				</div>
				<div class="inputHolder">
					<input type="text" name="invoicePostalCode" placeholder="<?php echo esc_attr_x( 'Postal code', 'frontend', 'eduadmin-booking' ); ?>" value="<?php echo @esc_attr( $billing_customer->Zip ); ?>" />
				</div>
			</label>
			<label class="edu-book-invoice-customerPostalCity">
				<div class="inputLabel">
					<?php echo esc_html_x( 'Postal city', 'frontend', 'eduadmin-booking' ); ?>
				</div>
				<div class="inputHolder">
					<input type="text" name="invoicePostalCity" placeholder="<?php echo esc_attr_x( 'Postal city', 'frontend', 'eduadmin-booking' ); ?>" value="<?php echo @esc_attr( $billing_customer->City ); ?>" />
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
		<label class="edu-book-invoice-customerInvoiceGLN">
			<div class="inputLabel">
				<span title="<?php echo esc_attr_x( 'Global Location Number', 'frontend', 'eduadmin-booking' ); ?>" class="tooltip-element">
					<?php echo esc_html_x( 'GLN', 'frontend', 'eduadmin-booking' ); ?>
				</span>
			</div>
			<div class="inputHolder">
				<input type="text" name="invoiceGLN" placeholder="<?php echo esc_attr_x( 'GLN', 'frontend', 'eduadmin-booking' ); ?>" value="<?php echo @esc_attr( $billing_customer->GLN ); ?>" />
			</div>
		</label>
		<?php if ( $show_invoice_email ) { ?>
			<label class="edu-book-invoice-customerInvoiceEmail">
				<div class="inputLabel">
					<?php echo esc_html_x( 'Invoice e-mail address', 'frontend', 'eduadmin-booking' ); ?>
				</div>
				<div class="inputHolder">
					<input type="text" name="invoiceEmail" placeholder="<?php echo esc_attr_x( 'Invoice e-mail address', 'frontend', 'eduadmin-booking' ); ?>" value="<?php echo @esc_attr( $billing_customer->Email ); ?>" />
				</div>
			</label>
		<?php } ?>
		<label class="edu-book-invoice-customerInvoiceReference">
			<div class="inputLabel">
				<?php echo esc_html_x( 'Invoice reference', 'frontend', 'eduadmin-booking' ); ?>
			</div>
			<div class="inputHolder">
				<input type="text" name="invoiceReference" placeholder="<?php echo esc_attr_x( 'Invoice reference', 'frontend', 'eduadmin-booking' ); ?>" value="<?php echo @esc_attr( ! empty( $billing_customer->SellerReference ) ? $billing_customer->SellerReference : '' ); ?>" />
			</div>
		</label>
		<label class="edu-book-invoice-customerPurchaseOrderNumber">
			<div class="inputLabel">
				<?php echo esc_html_x( 'Purchase order number', 'frontend', 'eduadmin-booking' ); ?>
			</div>
			<div class="inputHolder">
				<input type="text" name="purchaseOrderNumber" placeholder="<?php echo esc_attr_x( 'Purchase order number', 'frontend', 'eduadmin-booking' ); ?>" value="<?php echo @esc_attr( ! empty( $_POST['purchaseOrderNumber'] ) ? $_POST['purchaseOrderNumber'] : '' ); ?>" />
			</div>
		</label>
		<label class="edu-book-invoice-customerEdiReference">
			<div class="inputLabel">
				<?php echo esc_html_x( 'EDI Reference', 'frontend', 'eduadmin-booking' ); ?>
			</div>
			<div class="inputHolder">
				<input type="text" name="ediReference" placeholder="<?php echo esc_attr_x( 'EDI Reference', 'frontend', 'eduadmin-booking' ); ?>" value="<?php echo @esc_attr( ! empty( $billing_customer->EdiReference ) ? $billing_customer->EdiReference : '' ); ?>" />
			</div>
		</label>
		<?php
	}

	$customer_custom_fields = EDUAPI()->OData->CustomFields->Search(
		null,
		'ShowOnWeb and CustomFieldOwner eq \'Customer\'',
		'CustomFieldAlternatives'
	)['value'];
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
	if ( empty( $no_invoice_free_events ) || ( $no_invoice_free_events && is_object( $first_price ) && $first_price->Price > 0 ) ) {
		?>
		<label<?php echo $force_show_invoice_information ? ' style="display: none;"' : ''; ?>>
			<div class="inputHolder alsoInvoiceCustomer">
				<label class="inline-checkbox" for="alsoInvoiceCustomer">
					<input type="checkbox" id="alsoInvoiceCustomer" name="alsoInvoiceCustomer" value="true" onchange="eduBookingView.UpdateInvoiceCustomer(this);"
						<?php echo $force_show_invoice_information ? 'checked' : ''; ?>/>
					<?php echo esc_html_x( 'Use other information for invoicing', 'frontend', 'eduadmin-booking' ); ?>
				</label>
			</div>
		</label>
	<?php } ?>
	<?php if ( EDU()->is_checked( 'eduadmin-useLogin', false ) && EDU()->is_checked( 'eduadmin-allowCustomerUpdate', false ) && isset( $customer->CustomerId ) && 0 !== $customer->CustomerId ) { ?>
		<label class="edu-book-overwriteCustomerData">
			<div class="inputHolder">
				<label class="inline-checkbox" for="overwriteCustomerData">
					<input type="checkbox" id="overwriteCustomerData" name="overwriteCustomerData" value="true" />
					<?php echo esc_html_x( 'Also update my customer information for future use', 'frontend', 'eduadmin-booking' ); ?>
				</label>
			</div>
		</label>
	<?php } ?>
</div>
