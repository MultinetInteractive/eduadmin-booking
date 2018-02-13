<?php
	$user     = EDU()->session['eduadmin-loginUser'];
	$contact  = $user->Contact;
	$customer = $user->Customer;
?>
<div class="eduadmin">
	<?php
		$tab = "limitedDiscount";
		include_once( "login_tab_header.php" );
	?>
    <h2><?php _e( "Discount Cards", 'eduadmin-booking' ); ?></h2>
	<?php
		$cards = EDUAPI()->OData->Customers->GetItem( $customer->CustomerId, "", "Vouchers" )["Vouchers"];
	?>
    <table class="myReservationsTable">
        <tr>
            <th align="left"><?php _e( "Card name", 'eduadmin-booking' ); ?></th>
            <th align="left"><?php _e( "Valid", 'eduadmin-booking' ); ?></th>
            <th align="right"><?php _e( "Credits", 'eduadmin-booking' ); ?></th>
            <th align="right"><?php _e( "Discount", 'eduadmin-booking' ); ?></th>
            <th align="right"><?php _e( "Price", 'eduadmin-booking' ); ?></th>
        </tr>
		<?php
			if ( empty( $cards ) ) {
				?>
                <tr>
                    <td colspan="4" align="center">
                        <i><?php _e( "You don't have any discount cards registered.", 'eduadmin-booking' ); ?></i>
                    </td>
                </tr>
				<?php
			} else {
				foreach ( $cards as $card ) {
					?>
                    <tr>
                        <td><?php echo $card["Description"]; ?></td>
                        <td><?php echo GetOldStartEndDisplayDate( $card["ValidFrom"], $card["ValidTo"], false ); ?></td>
                        <td align="right"><?php echo $card["CreditsLeft"] . ' / ' . $card["CreditsStartValue"]; ?></td>
                        <td align="right"><?php echo $card["DiscountPercent"]; ?> %</td>
                        <td align="right"><?php echo convertToMoney( $card["Price"], $currency ); ?></td>
                    </tr>
				<?php }
			} ?>
    </table>
	<?php include_once( "login_tab_footer.php" ); ?>
</div>