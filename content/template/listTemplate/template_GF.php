<?php
ob_start();
global $wp_query;
$api_key = EDU()->get_option( 'eduadmin-api-key' );

if ( ! EDU()->api_connection ) {
	echo esc_html_x( 'EduAdmin Booking could not connect to the API', 'frontend', 'eduadmin-booking' );
} else {
	if ( ! $api_key || empty( $api_key ) ) {
		echo 'Please complete the configuration: <a href="' . esc_url( admin_url() . 'admin.php?page=eduadmin-settings' ) . '">EduAdmin - Api Authentication</a>';
	} else {
		include 'list-options.php';
		?>
		<div class="eduadmin">
			<div class="courseContainer">
				<?php include 'template-loader.php'; ?>
			</div>
		</div>
		<?php
	}
}
$out = ob_get_clean();

return $out;
