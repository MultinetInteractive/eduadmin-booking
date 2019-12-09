<?php
$always_use_payment_plugin = EDU()->is_checked( 'eduadmin-alwaysUsePaymentPlugin', false );
if ( $event != null && $event['PaymentMethods'] != null && count( $event['PaymentMethods'] ) > 1 ) {
	$valid_paymentmethod_ids = array(
		"1" => __( 'Invoice', 'frontend', 'eduadmin-booking' ),
		"2" => __( 'Card payment', 'frontend', 'eduadmin-booking' ),
	);

	if ( $always_use_payment_plugin ) {
		?>
		<input type="hidden" name="edu-paymentmethodid" value="2" />
		<?php
		return;
	}

	$payment_plugins = EDU()->integrations->get_integrations( function( $integrations ) {
		$filtered_plugins = array();
		foreach ( $integrations as $integration ) {
			if ( $integration->type === 'payment' && $integration->get_option( 'enabled', 'no' ) !== 'no' ) {
				$filtered_plugins[] = $integration;
			}
		}

		return $filtered_plugins;
	} );

	if ( count( $payment_plugins ) === 0 ) {
		$valid_paymentmethod_ids = array_slice( $valid_paymentmethod_ids, 0, 1, true );
	}

	$valid_paymentmethods = array();
	foreach ( $event['PaymentMethods'] as $pm ) {
		if ( key_exists( $pm['PaymentMethodId'], $valid_paymentmethod_ids ) ) {
			$valid_paymentmethods[] = $pm;
		}
	}
	if ( count( $valid_paymentmethods ) > 1 ) {
		?>
		<div class="paymentMethodsView">
			<h2><?php echo esc_html_x( 'Select payment method', 'frontend', 'eduadmin-booking' ); ?></h2>
			<ul class="payment-methods">
				<?php
				foreach ( $valid_paymentmethods as $pm ) {
					?>
					<li>
						<input type="radio" id="payment-method-<?php echo esc_attr( $pm['PaymentMethodId'] ); ?>" name="edu-paymentmethodid" onchange="eduBookingView.UpdatePrice();" value="<?php echo esc_attr( $pm['PaymentMethodId'] ); ?>"
							<?php echo $pm['PaymentMethodId'] == "1" ? ' checked="checked"' : ""; ?>
						/>
						<label for="payment-method-<?php echo esc_attr( $pm['PaymentMethodId'] ); ?>">
							<?php echo esc_html( $valid_paymentmethod_ids[ $pm['PaymentMethodId'] ] ); ?>
						</label>
					</li>
					<?php
				}
				?>
			</ul>
		</div>
		<?php
	} elseif ( count( $valid_paymentmethods ) == 1 ) {
		if ( $always_use_payment_plugin ) {
			?>
			<input type="hidden" name="edu-paymentmethodid" value="2" />
			<?php
			return;
		}
		?>
		<input type="hidden" name="edu-paymentmethodid" value="<?php echo esc_attr( $valid_paymentmethods[0]['PaymentMethodId'] ); ?>" />
		<?php
	} elseif ( count( $valid_paymentmethods ) == 0 ) {
		if ( $always_use_payment_plugin ) {
			?>
			<input type="hidden" name="edu-paymentmethodid" value="2" />
			<?php
			return;
		}
		?>
		<input type="hidden" name="edu-paymentmethodid" value="1" />
		<?php
	}
} else {
	if ( $always_use_payment_plugin ) {
		?>
		<input type="hidden" name="edu-paymentmethodid" value="2" />
		<?php
		return;
	}
	?>
	<input type="hidden" name="edu-paymentmethodid" value="<?php echo esc_attr( $event['PaymentMethods'][0]['PaymentMethodId'] ); ?>" />
	<?php
}
