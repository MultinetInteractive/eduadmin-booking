<?php

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
		?>
	</div>
	<?php
}
