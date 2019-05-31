<?php
ob_start();
include 'list-courses.php';
$number_of_events = $attributes['numberofevents'];
$current_events   = 0;
?>
	<div class="course-holder tmpl_A">
		<?php
		if ( ! empty( $courses ) ) {
			foreach ( $courses as $object ) {
				if ( null !== $number_of_events && $number_of_events > 0 && $current_events >= $number_of_events ) {
					break;
				}
				include 'blocks/course-block.php';
				if ( $show_events_with_events_only && empty( $object['Events'] ) ) {
					continue;
				}

				if ( $show_events_without_events_only && ! empty( $object['Events'] ) ) {
					continue;
				}
				include 'blocks/course-block-a.php';
				$current_events++;
			}
		} else {
			?>
			<div class="noResults"><?php echo esc_html_x( 'Your search returned zero results', 'frontend', 'eduadmin-booking' ); ?></div>
			<?php
		}
		?>
	</div>
<?php
$out = ob_get_clean();

return $out;
