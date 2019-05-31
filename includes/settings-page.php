<?php
function edu_render_settings_page() {
	EDU()->timers[ __METHOD__ ] = microtime( true );
	if ( get_option( 'eduadmin-credentials_have_changed' ) ) {
		EDU()->clear_transients();

		update_option( 'eduadmin-credentials_have_changed', false );
	}
	?>
	<div class="eduadmin wrap">
		<h2><?php echo esc_html( sprintf( _x( 'EduAdmin settings - %s', 'backend', 'eduadmin-booking' ), _x( 'Api authentication', 'backend', 'eduadmin-booking' ) ) ); ?></h2>

		<form method="post" action="options.php">
			<?php settings_fields( 'eduadmin-credentials' ); ?>
			<?php do_settings_sections( 'eduadmin-credentials' ); ?>
			<input type="hidden" name="eduadmin-credentials_have_changed" value="true" />
			<div class="block">
				<p>
					<?php echo esc_html_x( 'Enter the provided Api Key to connect to EduAdmin', 'backend', 'eduadmin-booking' ); ?>
				</p>
				<p>
					<?php echo wp_kses( sprintf( _x( 'You can get these details by contacting %s', 'backend', 'eduadmin-booking' ), sprintf( '<a href="http://support.multinet.se" target="_blank">%s</a>', _x( 'our support', 'backend', 'eduadmin-booking' ) ) ), wp_kses_allowed_html( 'post' ) ); ?>
				</p>
				<input type="text" readonly class="form-control api_hash" name="eduadmin-api-key" id="eduadmin-api-key" value="<?php echo esc_attr( get_option( 'eduadmin-api-key' ) ); ?>" placeholder="<?php echo esc_attr_x( 'Api key for WordPress plugin', 'backend', 'eduadmin-booking' ); ?>" />
				<span id="edu-unlockButton" title="<?php echo esc_attr_x( 'Click here to unlock the Api Authentication-fields', 'backend', 'eduadmin-booking' ); ?>" class="dashicons dashicons-lock" onclick="EduAdmin.UnlockApiAuthentication();"></span>
				<p class="submit">
					<input type="submit" name="submit" id="submit" class="button button-primary" value="<?php echo esc_attr_x( 'Save settings', 'backend', 'eduadmin-booking' ); ?>" />
				</p>
			</div>
		</form>
	</div>
	<?php
	EDU()->timers[ __METHOD__ ] = microtime( true ) - EDU()->timers[ __METHOD__ ];
}
