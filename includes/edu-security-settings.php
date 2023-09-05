<?php
function edu_render_security_settings_page() {
	$t = EDU()->start_timer( __METHOD__ );

	$apiKey = EDU()->get_option( 'eduadmin-api-key' );

	if ( ! $apiKey || empty( $apiKey ) ) {
		add_action( 'admin_notices', array( 'EduAdmin', 'SetupWarning' ) );

		return;
	} else {
		?>
		<div class="eduadmin wrap">
			<h2><?php echo sprintf( _x( 'EduAdmin settings - %s', 'backend', 'eduadmin-booking' ), _x( 'Security settings', 'backend', 'eduadmin-booking' ) ); ?></h2>
			<form method="post" action="options.php">
				<?php settings_fields( 'eduadmin-security' ); ?>
				<?php do_settings_sections( 'eduadmin-security' ); ?>
				<div class="block">
					<h3><?php echo esc_html_x('Google reCAPTCHA v2 - Checkbox', 'backend', 'eduadmin-booking'); ?></h3>
					<p>
						<?php echo _x('Enabling this option will protect your booking form with Google reCAPTCHA v2 Checkbox.<br />You are responsible for creating the keys and configuring what is needed for this integration to work.', 'backend', 'eduadmin-booking'); ?>
					</p>
					<p>
						<em><?php echo _x('Note: This does not ensure that no spam bookings can be created, but might mitigate some of them.', 'backend', 'eduadmin-booking'); ?></em>
					</p>
					<label>
						<input type="checkbox"
						       name="eduadmin-recaptcha-enabled"<?php checked( EDU()->get_option( 'eduadmin-recaptcha-enabled', "off" ), "on" ); ?> />
						<?php echo esc_html_x( 'Enable reCAPTCHA v2 for booking form', 'backend', 'eduadmin-booking' ); ?>
					</label>
					<br />
					<br />
					<?php echo esc_html_x( 'Site Key', 'backend', 'eduadmin-booking' ); ?>
					<br />
					<input type="text" class="form-control full-width" autocomplete="off" name="eduadmin-recaptcha-sitekey"
					       value="<?php echo esc_attr( EDU()->get_option( 'eduadmin-recaptcha-sitekey', '' ) ); ?>" />
					<br />
					<?php echo esc_html_x( 'Secret Key', 'backend', 'eduadmin-booking' ); ?>
					<br />
					<input type="text" class="form-control full-width" autocomplete="off" name="eduadmin-recaptcha-secretkey"
					       value="<?php echo esc_attr( EDU()->get_option( 'eduadmin-recaptcha-secretkey', '' ) ); ?>" />
				</div>
				<p class="submit">
					<input type="submit" name="submit" id="submit" class="button button-primary"
					       value="<?php echo esc_attr_x( 'Save changes', 'backend', 'eduadmin-booking' ); ?>" />
				</p>
			</form>
		</div>
		<?php
	}
	EDU()->stop_timer( $t );
}
