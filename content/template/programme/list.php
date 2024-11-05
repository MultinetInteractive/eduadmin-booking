<?php
ob_start();
$spot_left_option = EDU()->get_option( 'eduadmin-spotsLeft', 'exactNumbers' );
$always_few_spots = EDU()->get_option( 'eduadmin-alwaysFewSpots', '3' );
$spot_settings    = EDU()->get_option( 'eduadmin-spotsSettings', "1-5\n5-10\n10+" );

if ( ! EDU()->api_connection ) {
	?>
	<div class="eduadmin programme-list">
		<div class="programme-header">
			<div><b><?php echo esc_html_x( 'Programme', 'frontend', 'eduadmin-booking' ); ?></b></div>
			<div><b><?php echo esc_html_x( 'Length', 'frontend', 'eduadmin-booking' ); ?></b></div>
			<div></div>
			<div></div>
		</div>
		<div class="eduadmin-error">
			<?php echo esc_html_x( 'EduAdmin Booking could not connect to the API', 'frontend', 'eduadmin-booking' ); ?>
		</div>
	</div>
	<?php
} elseif ( empty( $programmes['Errors'] ) ) {
	?>
	<div class="eduadmin programme-list">
		<div class="programme-header">
			<div><b><?php echo esc_html_x( 'Programme', 'frontend', 'eduadmin-booking' ); ?></b></div>
			<div><b><?php echo esc_html_x( 'Length', 'frontend', 'eduadmin-booking' ); ?></b></div>
			<div></div>
			<div></div>
		</div>
		<?php
		foreach ( $programmes['value'] as $programme ) {
			include 'template/list-item.php';
		}

		do_action( 'eduadmin-list-programme-view', $programmes['value'] );
		?>
	</div>
	<?php
}
$out = ob_get_clean();

return $out;