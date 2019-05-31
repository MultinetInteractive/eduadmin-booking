<?php
// phpcs:disable WordPress.NamingConventions,Squiz,WordPress.WhiteSpace,Generic.WhiteSpace
function edu_render_profile_settings_page() {
	$t = EDU()->start_timer( __METHOD__ );
	if ( empty( EDUAPI()->api_token ) ) {
		add_action( 'admin_notices', array( 'EduAdmin', 'SetupWarning' ) );
	}
	?>
	<div class="eduadmin wrap">
		<h2><?php echo esc_html( sprintf( _x( 'EduAdmin settings - %s', 'backend', 'eduadmin-booking' ), _x( 'Profile settings', 'backend', 'eduadmin-booking' ) ) ); ?></h2>
		<form method="post" action="options.php">
			<?php settings_fields( 'eduadmin-profile' ); ?>
			<?php do_settings_sections( 'eduadmin-profile' ); ?>
			<div class="block">
				<h3><?php _ex( 'Price settings', 'backend', 'eduadmin-booking' ); ?></h3>
				<?php $selected_price_setting = get_option( 'eduadmin-profile-priceType', 'IncVat' ); ?>
				<select name="eduadmin-profile-priceType">
					<option<?php echo( 'IncVat' === $selected_price_setting ? ' selected="selected"' : '' ); ?>
						value="IncVat"><?php echo esc_html_x( 'VAT Inclusive', 'backend', 'eduadmin-booking' ); ?></option>
					<option<?php echo( 'ExVat' === $selected_price_setting ? ' selected="selected"' : '' ); ?>
						value="ExVat"><?php echo esc_html_x( 'VAT Excluded', 'backend', 'eduadmin-booking' ); ?></option>
				</select>
				<i>Select how you want the logged in users to view the prices in their list of orders/bookings.</i>
				<br />
				<p class="submit">
					<input type="submit" name="submit" id="submit" class="button button-primary" value="<?php echo _x( 'Save settings', 'backend', 'eduadmin-booking' ); ?>" />
				</p>
			</div>
		</form>
	</div>
	<?php
	EDU()->stop_timer( $t );
}
