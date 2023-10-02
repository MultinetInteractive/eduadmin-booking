<?php
$spot_left_option = EDU()->get_option( 'eduadmin-spotsLeft', 'exactNumbers' );
$always_few_spots = EDU()->get_option( 'eduadmin-alwaysFewSpots', '3' );
$spot_settings    = EDU()->get_option( 'eduadmin-spotsSettings', "1-5\n5-10\n10+" );

if ( empty( $programmes['Errors'] ) ) {
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
