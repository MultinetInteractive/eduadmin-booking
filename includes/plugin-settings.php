<?php
function edu_render_plugin_page() {
	EDU()->timers[ __METHOD__ ] = microtime( true );
	?>
	<div class="eduadmin wrap">
		<h2><?php echo esc_html( sprintf( _x( 'EduAdmin settings - %s', 'backend', 'eduadmin-booking' ), _x( 'Plugins', 'backend', 'eduadmin-booking' ) ) ); ?></h2>

		<form method="post">
			<input type="hidden" name="plugin-settings-nonce"
			       value="<?php echo esc_attr( wp_create_nonce( 'eduadmin-plugin-settings' ) ); ?>" />
			<?php settings_fields( 'eduadmin-plugin-settings' ); ?>
			<?php do_settings_sections( 'eduadmin-plugin-settings' ); ?>
			<div class="block">
				<h3><?php echo esc_html_x( 'Installed plugins', 'backend', 'eduadmin-booking' ); ?></h3>
				<hr noshade="noshade" />
				<?php
				$integrations = EDU()->integrations->get_integrations();
				foreach ( $integrations as $integration ) {
					echo '<h3>' . esc_html( $integration->displayName ) . ' - ' . esc_html( $integration->get_plugin_type_label() ) . "</h3>\n";
					echo $integration->get_settings();
					echo "<hr />\n";
				}
				?>
			</div>
			<p class="submit">
				<input type="submit" name="submit" id="submit" class="button button-primary"
				       value="<?php echo esc_attr_x( 'Save changes', 'backend', 'eduadmin-booking' ); ?>" />
			</p>
		</form>
	</div>
	<?php
	EDU()->timers[ __METHOD__ ] = microtime( true ) - EDU()->timers[ __METHOD__ ];
}
