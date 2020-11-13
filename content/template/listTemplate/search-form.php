<?php if ( $search_visible ) { ?>
	<form method="POST" class="search-form">
		<div class="search-row">
			<div class="search-dropdowns">
				<?php if ( $allow_location_search && ! empty( $addresses['value'] ) && $show_events ) { ?>
					<div class="search-item search-dropdown">
						<select name="eduadmin-city">
							<option
								value=""><?php echo esc_html_x( 'Choose city', 'frontend', 'eduadmin-booking' ); ?></option>
							<?php
							$added_cities = array();
							foreach ( $addresses['value'] as $address ) {
								$city = trim( $address['City'] );
								if ( ! in_array( $address['LocationId'], $added_cities, true ) && ! empty( $city ) ) {
									echo '<option value="' . intval( $address['LocationId'] ) . '"' . ( ! empty( $_REQUEST['eduadmin-city'] ) && intval( $_REQUEST['eduadmin-city'] ) === $address['LocationId'] ? ' selected="selected"' : '' ) . '>' . esc_html( $address['City'] ) . '</option>';  // Input var okay.
									$added_cities[] = $address['LocationId'];
								}
							}
							?>
						</select>
					</div>
				<?php } ?>
				<?php if ( $allow_subject_search && ! empty( $distinct_subjects ) ) { ?>
					<div class="search-item search-dropdown">
						<select name="eduadmin-subject">
							<option
								value=""><?php echo esc_html_x( 'Choose subject', 'frontend', 'eduadmin-booking' ); ?></option>
							<?php
							foreach ( $distinct_subjects as $subj => $val ) {
								echo '<option value="' . intval( $subj ) . '"' . ( ! empty( $_REQUEST['eduadmin-subject'] ) && intval( $_REQUEST['eduadmin-subject'] ) === $subj ? ' selected="selected"' : '' ) . '>' . esc_html( $val ) . '</option>'; // Input var okay.
							}
							?>
						</select>
					</div>
				<?php } ?>
				<?php if ( $allow_category_search && ! empty( $categories['value'] ) ) { ?>
					<div class="search-item search-dropdown">
						<select name="eduadmin-category">
							<option
								value=""><?php echo esc_html_x( 'Choose category', 'frontend', 'eduadmin-booking' ); ?></option>
							<?php
							foreach ( $categories['value'] as $subj ) {
								echo '<option value="' . intval( $subj['CategoryId'] ) . '"' . ( ! empty( $_REQUEST['eduadmin-category'] ) && intval( $_REQUEST['eduadmin-category'] ) === $subj['CategoryId'] ? ' selected="selected"' : '' ) . '>' . esc_html( $subj['CategoryName'] ) . '</option>'; // Input var okay.
							}
							?>
						</select>
					</div>
				<?php } ?>
				<?php if ( $allow_level_search && ! empty( $levels['value'] ) ) { ?>
					<div class="search-item search-dropdown">
						<select name="eduadmin-level">
							<option
								value=""><?php echo esc_html_x( 'Choose course level', 'frontend', 'eduadmin-booking' ); ?></option>
							<?php
							foreach ( $levels['value'] as $level ) {
								echo '<option value="' . intval( $level['CourseLevelId'] ) . '"' . ( ! empty( $_REQUEST['eduadmin-level'] ) && intval( $_REQUEST['eduadmin-level'] ) === $level['CourseLevelId'] ? ' selected="selected"' : '' ) . '>' . esc_html( $level['Name'] ) . '</option>'; // Input var okay.
							}
							?>
						</select>
					</div>
				<?php } ?>
			</div>
			<?php if ( $allow_region_search ) : ?>
				<div class="search-regionitems">
					<?php
					include( 'search/region.php' );
					?>
				</div>
			<?php endif; ?>
			<div class="search-box">
				<div class="search-item search-text">
					<input class="edu-searchTextBox" type="search" name="searchCourses" results="10"
					       placeholder="<?php echo esc_attr_x( 'Search courses', 'frontend', 'eduadmin-booking' ); ?>"<?php if ( isset( $_REQUEST['searchCourses'] ) ) { // Input var okay.
						echo ' value="' . esc_attr( sanitize_text_field( wp_unslash( $_REQUEST['searchCourses'] ) ) ) . '"'; // Input var okay.
					} ?> />
				</div>
				<div class="search-item search-button">
					<input type="submit" class="searchButton"
					       value="<?php echo esc_attr_x( 'Search', 'frontend', 'eduadmin-booking' ); ?>" />
				</div>
			</div>
		</div>
		<?php
		if ( ! empty( $_POST['searchCourses'] ) ) { // Input var okay.
			?>
			<script type="text/javascript">
				(function () {
					var searchBox = jQuery('.edu-searchTextBox');
					searchBox[0].scrollIntoView(true);
					searchBox.focus();
				})();
			</script>
			<?php
		}
		?>
	</form>
	<?php
}
