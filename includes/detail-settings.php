<?php
function edu_render_detail_settings_page() {
	$t = EDU()->start_timer( __METHOD__ );
	?>
	<div class="eduadmin wrap">
		<h2><?php echo esc_html( sprintf( _x( 'EduAdmin settings - %s', 'backend', 'eduadmin-booking' ), _x( 'Detail settings', 'backend', 'eduadmin-booking' ) ) ); ?></h2>

		<form method="post" action="options.php">
			<?php settings_fields( 'eduadmin-details' ); ?>
			<?php do_settings_sections( 'eduadmin-details' ); ?>
			<div class="block">
				<h3><?php echo esc_html_x( 'Template', 'backend', 'eduadmin-booking' ); ?></h3>
				<select name="eduadmin-detailTemplate">
					<option value="template_A"<?php echo( get_option( 'eduadmin-detailTemplate' ) === 'template_A' ? ' selected="selected"' : '' ); ?>><?php _ex( 'One column layout', 'backend', 'eduadmin-booking' ); ?></option>
					<option value="template_B"<?php echo( get_option( 'eduadmin-detailTemplate' ) === 'template_B' ? ' selected="selected"' : '' ); ?>><?php _ex( 'Two column layout', 'backend', 'eduadmin-booking' ); ?></option>
				</select>
				<br />
				<br />
				<label>
					<input type="checkbox" name="eduadmin-showDetailHeaders" value="true"<?php if ( get_option( 'eduadmin-showDetailHeaders', true ) ) {
						echo ' checked="checked"';
					} ?> />
					<?php echo esc_html_x( 'Show headers in detail view', 'backend', 'eduadmin-booking' ); ?>
				</label>
				<br />
				<i><?php echo esc_html_x( 'Uncheck to hide the headers in the course detail view', 'backend', 'eduadmin-booking' ); ?></i>
				<br />
				<br />
				<label>
					<input type="checkbox" name="eduadmin-groupEventsByCity" value="true"<?php if ( get_option( 'eduadmin-groupEventsByCity', false ) ) {
						echo " checked=\"checked\"";
					} ?> />
					<?php echo esc_html_x( 'Group events by city', 'backend', 'eduadmin-booking' ); ?>
				</label>
				<br />
				<i><?php echo esc_html_x( 'Check to group the event list by city', 'backend', 'eduadmin-booking' ); ?></i>
				<br />
				<br />
				<h3><?php echo esc_html_x( 'Page title', 'backend', 'eduadmin-booking' ); ?></h3>
				<?php
				$selectedDescriptionField = get_option( 'eduadmin-pageTitleField', 'CourseName' );
				$attributes               = EDUAPI()->OData->CustomFields->Search(
					null,
					"ShowOnWeb and CustomFieldOwner eq 'Product' and CustomFieldSubOwner eq 'CourseTemplate'" .
					" and (CustomFieldType eq 'Text' or CustomFieldType eq 'Html' or CustomFieldType eq 'Textarea')"
				);
				?>
				<i><?php echo esc_html_x( 'Select which field in EduAdmin that should be shown in the page title', 'backend', 'eduadmin-booking' ); ?></i>
				<br />
				<select name="eduadmin-pageTitleField">
					<optgroup label="<?php _ex( 'Course fields', 'backend', 'eduadmin-booking' ); ?>">
						<option value="CourseName"<?php echo( $selectedDescriptionField === 'CourseName' ? ' selected="selected"' : '' ); ?>><?php echo esc_html_x( 'Public name', 'backend', 'eduadmin-booking' ); ?></option>
						<option value="InternalCourseName"<?php echo( $selectedDescriptionField === 'InternalCourseName' ? ' selected="selected"' : "" ); ?>><?php echo esc_html_x( 'Object name', 'backend', 'eduadmin-booking' ); ?></option>
						<option value="CourseDescriptionShort"<?php echo( $selectedDescriptionField === 'CourseDescriptionShort' ? ' selected="selected"' : "" ); ?>><?php echo esc_html_x( 'Short course description', 'backend', 'eduadmin-booking' ); ?></option>
						<option value="CourseDescription"<?php if ( $selectedDescriptionField === 'CourseDescription' ) {
							echo ' selected="selected"';
						} ?>><?php echo esc_html_x( 'Course description', 'backend', 'eduadmin-booking' ); ?></option>
						<option value="CourseGoal"<?php if ( $selectedDescriptionField === "CourseGoal" ) {
							echo ' selected="selected"';
						} ?>><?php echo esc_html_x( 'Course goal', 'backend', 'eduadmin-booking' ); ?></option>
						<option value="CourseTarget"<?php if ( $selectedDescriptionField === "CourseTarget" ) {
							echo ' selected="selected"';
						} ?>><?php echo esc_html_x( 'Target group', 'backend', 'eduadmin-booking' ); ?></option>
						<option value="CoursePrerequisites"<?php if ( $selectedDescriptionField === "CoursePrerequisites" ) {
							echo ' selected="selected"';
						} ?>><?php echo esc_html_x( 'Prerequisites', 'backend', 'eduadmin-booking' ); ?></option>
						<option value="CourseAfter"<?php if ( $selectedDescriptionField === "CourseAfter" ) {
							echo ' selected="selected"';
						} ?>><?php echo esc_html_x( 'After the course', 'backend', 'eduadmin-booking' ); ?></option>
						<option value="CourseQuote"<?php if ( $selectedDescriptionField === "CourseQuote" ) {
							echo ' selected="selected"';
						} ?>><?php echo esc_html_x( 'Quote', 'backend', 'eduadmin-booking' ); ?></option>
					</optgroup>
					<?php if ( ! empty( $attributes["value"] ) ) { ?>
						<optgroup label="<?php _ex( 'Course attributes', 'backend', 'eduadmin-booking' ); ?>">
							<?php foreach ( $attributes['value'] as $attr ) { ?>
								<option value="attr_<?php echo esc_attr( $attr['CustomFieldId'] ); ?>"<?php echo( $selectedDescriptionField === 'attr_' . $attr['CustomFieldId'] ? ' selected="selected"' : '' ); ?>><?php echo esc_html( $attr['CustomFieldName'] ); ?></option>
							<?php } ?>
						</optgroup>
					<?php } ?>
				</select>

				<p class="submit">
					<input type="submit" name="submit" id="submit" class="button button-primary" value="<?php echo esc_attr_x( 'Save settings', 'backend', 'eduadmin-booking' ); ?>" />
				</p>
			</div>
		</form>
	</div>
	<?php
	EDU()->stop_timer( $t );
}
