<?php
function edu_render_list_settings_page() {
	EDU()->timers[ __METHOD__ ] = microtime( true );
	$apiKey                     = get_option( 'eduadmin-api-key' );

	if ( ! $apiKey || empty( $apiKey ) ) {
		add_action( 'admin_notices', array( 'EduAdmin', 'SetupWarning' ) );

		return;
	} else {
		?>
		<div class="eduadmin wrap">
			<h2><?php echo sprintf( _x( 'EduAdmin settings - %s', 'backend', 'eduadmin-booking' ), _x( 'List settings', 'backend', 'eduadmin-booking' ) ); ?></h2>

			<form method="post" action="options.php">
				<?php settings_fields( 'eduadmin-list' ); ?>
				<?php do_settings_sections( 'eduadmin-list' ); ?>
				<div class="block">
					<table>
						<tr>
							<td valign="top">
								<h3><?php _ex( 'Template', 'backend', 'eduadmin-booking' ); ?></h3>
								<select name="eduadmin-listTemplate">
									<option value="template_A"<?php echo( get_option( 'eduadmin-listTemplate' ) === "template_A" ? " selected=\"selected\"" : "" ); ?>>
										Layout A
									</option>
									<option value="template_B"<?php echo( get_option( 'eduadmin-listTemplate' ) === "template_B" ? " selected=\"selected\"" : "" ); ?>>
										Layout B
									</option>
									<option value="template_GF"<?php echo( get_option( 'eduadmin-listTemplate' ) === "template_GF" ? " selected=\"selected\"" : "" ); ?>>
										Layout GF
									</option>
								</select>
								<h3><?php _ex( 'List settings', 'backend', 'eduadmin-booking' ); ?></h3>
								<label>
									<input type="checkbox" id="eduadmin-showEventsInList" name="eduadmin-showEventsInList"<?php if ( get_option( 'eduadmin-showEventsInList', false ) ) {
										echo " checked=\"checked\"";
									} ?> />
									<?php _ex( 'Show events instead of courses', 'backend', 'eduadmin-booking' ); ?>
								</label>
								<br />
								<label>
									<input type="checkbox" id="eduadmin-showCourseImage" name="eduadmin-showCourseImage"<?php if ( get_option( 'eduadmin-showCourseImage', true ) ) {
										echo " checked=\"checked\"";
									} ?> />
									<?php _ex( 'Show course images', 'backend', 'eduadmin-booking' ); ?>
								</label>
								<br />
								<label>
									<input type="checkbox" name="eduadmin-showNextEventDate"<?php if ( get_option( 'eduadmin-showNextEventDate', false ) ) {
										echo " checked=\"checked\"";
									} ?> />
									<?php _ex( 'Show coming dates (Only course list, not events)', 'backend', 'eduadmin-booking' ); ?>
								</label>
								<br />
								<label>
									<input type="checkbox" name="eduadmin-showCourseLocations"<?php if ( get_option( 'eduadmin-showCourseLocations', false ) ) {
										echo " checked=\"checked\"";
									} ?> />
									<?php _ex( 'Show locations (Only course list, not events)', 'backend', 'eduadmin-booking' ); ?>
								</label>
								<br />
								<label>
									<input type="checkbox" name="eduadmin-showEventVenueName"<?php if ( get_option( 'eduadmin-showEventVenueName', false ) ) {
										echo " checked=\"checked\"";
									} ?> />
									<?php _ex( 'Show venue name', 'backend', 'eduadmin-booking' ); ?>
								</label>
								<br />
								<label>
									<input type="checkbox" name="eduadmin-showEventPrice"<?php if ( get_option( 'eduadmin-showEventPrice', false ) ) {
										echo " checked=\"checked\"";
									} ?> />
									<?php _ex( 'Show price', 'backend', 'eduadmin-booking' ); ?>
								</label>
								<br />
								<label>
									<input type="checkbox" name="eduadmin-showCourseDays"<?php if ( get_option( 'eduadmin-showCourseDays', true ) ) {
										echo " checked=\"checked\"";
									} ?> />
									<?php _ex( 'Show days', 'backend', 'eduadmin-booking' ); ?>
								</label>
								<br />
								<label>
									<input type="checkbox" name="eduadmin-showCourseTimes"<?php if ( get_option( 'eduadmin-showCourseTimes', true ) ) {
										echo " checked=\"checked\"";
									} ?> />
									<?php _ex( 'Show time', 'backend', 'eduadmin-booking' ); ?>
								</label>
								<br />
								<label>
									<input type="checkbox" name="eduadmin-showWeekDays"<?php if ( get_option( 'eduadmin-showWeekDays', false ) ) {
										echo " checked=\"checked\"";
									} ?> />
									<?php _ex( 'Show weekday names (Only event list)', 'backend', 'eduadmin-booking' ); ?>
								</label>
								<br />
								<table cellpadding="0" cellspacing="0">
									<tr>
										<td>
											<label>
												<input type="checkbox" id="eduadmin-showCourseDescription" name="eduadmin-showCourseDescription"<?php if ( get_option( 'eduadmin-showCourseDescription', true ) ) {
													echo " checked=\"checked\"";
												} ?> />
												<?php _ex( 'Show course description', 'backend', 'eduadmin-booking' ); ?>
											</label>
										</td>
										<td style="padding-left: 5px;">
											<?php
											$selectedDescriptionField = get_option( 'eduadmin-layout-descriptionfield', 'CourseDescriptionShort' );
											$attributes               = EDUAPI()->OData->CustomFields->Search(
												null,
												"ShowOnWeb and CustomFieldOwner eq 'Product' and CustomFieldSubOwner eq 'CourseTemplate'" .
												" and (CustomFieldType eq 'Text' or CustomFieldType eq 'Html' or CustomFieldType eq 'Textarea')"
											);
											?>
											<select name="eduadmin-layout-descriptionfield">
												<optgroup label="<?php _ex( 'Course fields', 'backend', 'eduadmin-booking' ); ?>">
													<option value="CourseDescriptionShort"<?php echo( $selectedDescriptionField === "CourseDescriptionShort" ? " selected=\"selected\"" : "" ); ?>><?php _ex( 'Short course description', 'backend', 'eduadmin-booking' ); ?></option>
													<option value="CourseDescription"<?php if ( $selectedDescriptionField === "CourseDescription" ) {
														echo " selected=\"selected\"";
													} ?>><?php _ex( 'Course description', 'backend', 'eduadmin-booking' ); ?></option>
													<option value="CourseGoal"<?php if ( $selectedDescriptionField === "CourseGoal" ) {
														echo " selected=\"selected\"";
													} ?>><?php _ex( 'Course goal', 'backend', 'eduadmin-booking' ); ?></option>
													<option value="TargetGroup"<?php if ( $selectedDescriptionField === "TargetGroup" ) {
														echo " selected=\"selected\"";
													} ?>><?php _ex( 'Target group', 'backend', 'eduadmin-booking' ); ?></option>
													<option value="Prerequisites"<?php if ( $selectedDescriptionField === "Prerequisites" ) {
														echo " selected=\"selected\"";
													} ?>><?php _ex( 'Prerequisites', 'backend', 'eduadmin-booking' ); ?></option>
													<option value="CourseAfter"<?php if ( $selectedDescriptionField === "CourseAfter" ) {
														echo " selected=\"selected\"";
													} ?>><?php _ex( 'After the course', 'backend', 'eduadmin-booking' ); ?></option>
													<option value="Quote"<?php if ( $selectedDescriptionField === "Quote" ) {
														echo " selected=\"selected\"";
													} ?>><?php _ex( 'Quote', 'backend', 'eduadmin-booking' ); ?></option>
												</optgroup>
												<?php if ( ! empty( $attributes["value"] ) ) { ?>
													<optgroup label="<?php _ex( 'Course attributes', 'backend', 'eduadmin-booking' ); ?>">
														<?php foreach ( $attributes["value"] as $attr ) { ?>
															<option value="attr_<?php echo $attr["CustomFieldId"]; ?>"<?php echo( $selectedDescriptionField === "attr_" . $attr["CustomFieldId"] ? " selected=\"selected\"" : "" ); ?>><?php echo $attr["CustomFieldName"]; ?></option>
														<?php } ?>
													</optgroup>
												<?php } ?>
											</select>
										</td>
									</tr>
								</table>
								<br />
								<?php
								$sortOrder = get_option( 'eduadmin-listSortOrder', 'SortIndex' );
								?>
								<table>
									<tr>
										<td><?php _ex( 'Sort order', 'backend', 'eduadmin-booking' ); ?></td>
										<td>
											<select name="eduadmin-listSortOrder">
												<option value="SortIndex"<?php echo( $sortOrder === "SortIndex" ? " selected=\"selected\"" : "" ); ?>><?php _ex( 'Sort index', 'backend', 'eduadmin-booking' ); ?></option>
												<option value="CourseName"<?php echo( $sortOrder === "CourseName" ? " selected=\"selected\"" : "" ); ?>><?php _ex( 'Course name', 'backend', 'eduadmin-booking' ); ?></option>
												<option value="CategoryName"<?php echo( $sortOrder === "CategoryName" ? " selected=\"selected\"" : "" ); ?>><?php _ex( 'Category name', 'backend', 'eduadmin-booking' ); ?></option>
												<option value="EducationNumber"<?php echo( $sortOrder === "EducationNumber" ? " selected=\"selected\"" : "" ); ?>><?php _ex( 'Item number', 'backend', 'eduadmin-booking' ); ?></option>
											</select>
										</td>
									</tr>
								</table>
								<br />
								<h3><?php _ex( 'Filter options', 'backend', 'eduadmin-booking' ); ?></h3>
								<label>
									<input type="checkbox" name="eduadmin-allowRegionSearch"<?php if ( get_option( 'eduadmin-allowRegionSearch', false ) ) {
										echo " checked=\"checked\"";
									} ?> />
									<?php _ex( 'Allow filter by region', 'backend', 'eduadmin-booking' ); ?>
								</label>
								<br />
								<label>
									<input type="checkbox" name="eduadmin-allowLocationSearch"<?php if ( get_option( 'eduadmin-allowLocationSearch', true ) ) {
										echo " checked=\"checked\"";
									} ?> />
									<?php _ex( 'Allow filter by city', 'backend', 'eduadmin-booking' ); ?>
								</label>
								<br />
								<label>
									<input type="checkbox" name="eduadmin-allowSubjectSearch"<?php if ( get_option( 'eduadmin-allowSubjectSearch', false ) ) {
										echo " checked=\"checked\"";
									} ?> />
									<?php _ex( 'Allow filter by subject', 'backend', 'eduadmin-booking' ); ?>
								</label>
								<br />
								<label>
									<input type="checkbox" name="eduadmin-allowCategorySearch"<?php if ( get_option( 'eduadmin-allowCategorySearch', false ) ) {
										echo " checked=\"checked\"";
									} ?> />
									<?php _ex( 'Allow filter by category', 'backend', 'eduadmin-booking' ); ?>
								</label>
								<br />
								<label>
									<input type="checkbox" name="eduadmin-allowLevelSearch"<?php if ( get_option( 'eduadmin-allowLevelSearch', false ) ) {
										echo " checked=\"checked\"";
									} ?> />
									<?php _ex( 'Allow filter by course level', 'backend', 'eduadmin-booking' ); ?>
								</label>
							</td>
							<td valign="top">
								<table>
									<tr>
										<td align="center">
											<img src="<?php echo plugins_url( '../images', __FILE__ ); ?>/layoutA_list.png" />
											<br />
											Layout A
										</td>
										<td align="center">
											<img src="<?php echo plugins_url( '../images', __FILE__ ); ?>/layoutB_list.png" />
											<br />
											Layout B
										</td>
									</tr>
								</table>
							</td>
						</tr>
					</table>
				</div>
				<p class="submit">
					<input type="submit" name="submit" id="submit" class="button button-primary" value="<?php echo esc_attr_x( 'Save changes', 'backend', 'eduadmin-booking' ); ?>" />
				</p>
			</form>
		</div>
	<?php }
	EDU()->timers[ __METHOD__ ] = microtime( true ) - EDU()->timers[ __METHOD__ ];
}
