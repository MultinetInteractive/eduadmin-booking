<?php
$user     = EDU()->session['eduadmin-loginUser'];
$contact  = $user->Contact;
$customer = $user->Customer;

$currency = EDU()->get_option( 'eduadmin-currency', 'SEK' );
?>
<div class="eduadmin">
	<?php

	$tab = 'limitedDiscount';

	require_once 'login-tab-header.php';
	?>
	<h2><?php echo esc_html_x( 'Discount Cards', 'frontend', 'eduadmin-booking' ); ?></h2>
	<?php
	$cards = EDUAPI()->OData->Customers->GetItem( $customer->CustomerId, '', 'Vouchers' )['Vouchers'];
	?>
	<table class="myReservationsTable">
		<tr>
			<th align="left">
				<?php echo esc_html_x( 'Card name', 'frontend', 'eduadmin-booking' ); ?>
			</th>
			<th align="left">
				<?php echo esc_html_x( 'Valid', 'frontend', 'eduadmin-booking' ); ?>
			</th>
			<th align="right">
				<?php echo esc_html_x( 'Credits', 'frontend', 'eduadmin-booking' ); ?>
			</th>
			<th align="right">
				<?php echo esc_html_x( 'Discount', 'frontend', 'eduadmin-booking' ); ?>
			</th>
			<th align="right">
				<?php echo esc_html_x( 'Price', 'frontend', 'eduadmin-booking' ); ?>
			</th>
		</tr>
		<?php
		if ( empty( $cards ) ) {
			?>
			<tr>
				<td colspan="4" align="center">
					<i><?php echo esc_html_x( 'You don\'t have any discount cards registered.', 'frontend', 'eduadmin-booking' ); ?></i>
				</td>
			</tr>
			<?php
		} else {
			$expiredLimitedDiscounts = array();
			foreach ( $cards as $card ) {
				$expired = false;

				if ( ! empty( $card['ValidTo'] ) && date( "Y-m-d" ) > date( "Y-m-d", strtotime( $card['ValidTo'] ) ) ) {
					$expired = true;
				}

				$amountText = $card['CreditsLeft'] > $card['CreditsStartValue'] ? esc_html_x( 'Unlimited', 'frontend', 'eduadmin-booking' ) : esc_html( $card['CreditsLeft'] . ' / ' . $card['CreditsStartValue'] );

				if ( $card['CreditsLeft'] <= 0 ) {
					$expired = true;
				}

				if ( ! $expired ) {
					?>
					<tr>
						<td><?php echo esc_html( $card['Description'] ); ?></td>
						<td><?php echo wp_kses_post( get_old_start_end_display_date( $card['ValidFrom'], $card['ValidTo'], true ) ); ?></td>
						<td align="right"><?php echo $amountText; ?></td>
						<td align="right"><?php echo esc_html( $card['DiscountPercent'] ); ?> %</td>
						<td align="right"><?php echo esc_html( convert_to_money( $card['Price'], $currency ) ); ?></td>
					</tr>
					<?php
				} else {
					$expiredLimitedDiscounts[] = $card;
				}
			}

			foreach ( $expiredLimitedDiscounts as $card ) {
				$amountText = $card['CreditsLeft'] > $card['CreditsStartValue'] ? esc_html_x( 'Unlimited', 'frontend', 'eduadmin-booking' ) : esc_html( $card['CreditsLeft'] . ' / ' . $card['CreditsStartValue'] );
				?>
				<tr class="expired-discount-cards">
					<td>
						<del><?php echo esc_html( $card['Description'] ); ?></del>
					</td>
					<td><?php echo wp_kses_post( get_old_start_end_display_date( $card['ValidFrom'], $card['ValidTo'], true ) ); ?>
						<em>(<?php echo esc_html_x( 'Expired', 'frontend', 'eduadmin-booking' ); ?>)</em></td>
					<td align="right"><?php echo $amountText; ?></td>
					<td align="right"><?php echo esc_html( $card['DiscountPercent'] ); ?> %</td>
					<td align="right"><?php echo esc_html( convert_to_money( $card['Price'], $currency ) ); ?></td>
				</tr>
				<?php
			}
		}
		?>
	</table>
	<?php require_once 'login-tab-footer.php'; ?>
</div>
