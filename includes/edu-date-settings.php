<?php

function edu_render_date_settings_page() {
	$t = EDU()->start_timer( __METHOD__ );

	$apiKey = get_option( 'eduadmin-api-key' );

	if ( ! $apiKey || empty( $apiKey ) ) {
		add_action( 'admin_notices', array( 'EduAdmin', 'SetupWarning' ) );

		return;
	} else {
		?>
		<div class="eduadmin wrap">
			<h2><?php echo sprintf( _x( 'EduAdmin settings - %s', 'backend', 'eduadmin-booking' ), _x( 'Date settings', 'backend', 'eduadmin-booking' ) ); ?></h2>
			<form method="post" action="options.php">
				<?php settings_fields( 'eduadmin-date' ); ?>
				<?php do_settings_sections( 'eduadmin-date' ); ?>
				<div class="block">
					<!-- Empty for now -->
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
