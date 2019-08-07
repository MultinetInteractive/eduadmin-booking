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
					<option value="template_A"<?php selected( get_option( 'eduadmin-detailTemplate' ), 'template_A' ); ?>><?php _ex( 'One column layout', 'backend', 'eduadmin-booking' ); ?></option>
					<option value="template_B"<?php selected( get_option( 'eduadmin-detailTemplate' ), 'template_B' ); ?>><?php _ex( 'Two column layout', 'backend', 'eduadmin-booking' ); ?></option>
				</select>
				<br />
				<br />
				<label>
					<input type="checkbox" name="eduadmin-showDetailHeaders" value="true"<?php checked( get_option( 'eduadmin-showDetailHeaders', true ), "true" ); ?> />
					<?php echo esc_html_x( 'Show headers in detail view', 'backend', 'eduadmin-booking' ); ?>
				</label>
				<br />
				<i><?php echo esc_html_x( 'Uncheck to hide the headers in the course detail view', 'backend', 'eduadmin-booking' ); ?></i>
				<br />
				<br />
				<label>
					<input type="checkbox" name="eduadmin-groupEventsByCity" value="true"<?php checked( get_option( 'eduadmin-groupEventsByCity', false ), "true" ); ?> />
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
						<option value="CourseName"<?php selected( $selectedDescriptionField, 'CourseName' ); ?>>
							<?php echo esc_html_x( 'Public name', 'backend', 'eduadmin-booking' ); ?>
						</option>
						<option value="InternalCourseName"<?php selected( $selectedDescriptionField, 'InternalCourseName' ); ?>>
							<?php echo esc_html_x( 'Object name', 'backend', 'eduadmin-booking' ); ?>
						</option>
						<option value="CourseDescriptionShort"<?php selected( $selectedDescriptionField, 'CourseDescriptionShort' ); ?>>
							<?php echo esc_html_x( 'Short course description', 'backend', 'eduadmin-booking' ); ?>
						</option>
						<option value="CourseDescription"<?php selected( $selectedDescriptionField, 'CourseDescription' ); ?>>
							<?php echo esc_html_x( 'Course description', 'backend', 'eduadmin-booking' ); ?>
						</option>
						<option value="CourseGoal"<?php selected( $selectedDescriptionField, "CourseGoal" ); ?>>
							<?php echo esc_html_x( 'Course goal', 'backend', 'eduadmin-booking' ); ?>
						</option>
						<option value="CourseTarget"<?php selected( $selectedDescriptionField, "CourseTarget" ); ?>>
							<?php echo esc_html_x( 'Target group', 'backend', 'eduadmin-booking' ); ?>
						</option>
						<option value="CoursePrerequisites"<?php selected( $selectedDescriptionField, "CoursePrerequisites" ); ?>>
							<?php echo esc_html_x( 'Prerequisites', 'backend', 'eduadmin-booking' ); ?>
						</option>
						<option value="CourseAfter"<?php selected( $selectedDescriptionField, "CourseAfter" ); ?>>
							<?php echo esc_html_x( 'After the course', 'backend', 'eduadmin-booking' ); ?>
						</option>
						<option value="CourseQuote"<?php selected( $selectedDescriptionField, "CourseQuote" ); ?>>
							<?php echo esc_html_x( 'Quote', 'backend', 'eduadmin-booking' ); ?>
						</option>
					</optgroup>
					<?php if ( ! empty( $attributes["value"] ) ) { ?>
						<optgroup label="<?php _ex( 'Course attributes', 'backend', 'eduadmin-booking' ); ?>">
							<?php foreach ( $attributes['value'] as $attr ) { ?>
								<option value="attr_<?php echo esc_attr( $attr['CustomFieldId'] ); ?>"<?php selected( $selectedDescriptionField, 'attr_' . $attr['CustomFieldId'] ); ?>><?php echo esc_html( $attr['CustomFieldName'] ); ?></option>
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
