<?php

function edu_render_date_settings_page() {
	$t = EDU()->start_timer( __METHOD__ );

	$apiKey = get_option( 'eduadmin-api-key' );

	if ( ! $apiKey || empty( $apiKey ) ) {
		add_action( 'admin_notices', array( 'EduAdmin', 'SetupWarning' ) );

		return;
	} else {
		if ( isset( $_REQUEST['act'] ) && $_REQUEST['act'] == "edu-reset-date-settings" ) {
			delete_option( 'eduadmin-date-eventDates-detail' );
			delete_option( 'eduadmin-date-eventDates-detail-short' );
			delete_option( 'eduadmin-date-eventDates-detail-show-daynames' );
			delete_option( 'eduadmin-date-eventDates-detail-show-time' );
			delete_option( 'eduadmin-date-eventDates-detail-custom-format' );

			delete_option( 'eduadmin-date-eventDates-list' );
			delete_option( 'eduadmin-date-eventDates-list-short' );
			delete_option( 'eduadmin-date-eventDates-list-show-daynames' );
			delete_option( 'eduadmin-date-eventDates-list-show-time' );
			delete_option( 'eduadmin-date-eventDates-list-custom-format' );

			delete_option( 'eduadmin-date-courseDate-list' );
			delete_option( 'eduadmin-date-courseDate-list-short' );
			delete_option( 'eduadmin-date-courseDate-list-show-daynames' );
			delete_option( 'eduadmin-date-courseDate-list-show-time' );
			delete_option( 'eduadmin-date-courseDate-list-custom-format' );

			delete_option( 'eduadmin-date-programmeDates' );
			delete_option( 'eduadmin-date-programmeDates-short' );
			delete_option( 'eduadmin-date-programmeDates-show-daynames' );
			delete_option( 'eduadmin-date-programmeDates-show-time' );

			delete_option( 'eduadmin-date-courseDays' );
			delete_option( 'eduadmin-date-courseDays-alwaysNumbers' );

			wp_cache_flush();
		}

		$edu_eventDate_detail_setting = get_option( 'eduadmin-date-eventDates-detail', 'default' );
		$event_detail_date_short      = get_option( 'eduadmin-date-eventDates-detail-short' );
		$event_detail_show_day_name   = get_option( 'eduadmin-date-eventDates-detail-show-daynames', 'show-dayname' );
		$event_detail_show_time       = get_option( 'eduadmin-date-eventDates-detail-show-time', 'show-time' );
		$event_detail_custom_format   = get_option( 'eduadmin-date-eventDates-detail-custom-format' );

		$edu_eventDate_list_setting = get_option( 'eduadmin-date-eventDates-list', 'default' );
		$event_list_date_short      = get_option( 'eduadmin-date-eventDates-list-short' );
		$event_list_show_day_name   = get_option( 'eduadmin-date-eventDates-list-show-daynames', 'show-dayname' );
		$event_list_show_time       = get_option( 'eduadmin-date-eventDates-list-show-time', 'show-time' );
		$event_list_custom_format   = get_option( 'eduadmin-date-eventDates-list-custom-format' );

		$edu_courseDate_list_setting = get_option( 'eduadmin-date-courseDate-list', 'default' );
		$course_list_date_short      = get_option( 'eduadmin-date-courseDate-list-short' );
		$course_list_show_day_name   = get_option( 'eduadmin-date-courseDate-list-show-daynames', 'show-dayname' );
		$course_list_show_time       = get_option( 'eduadmin-date-courseDate-list-show-time', 'show-time' );
		$course_list_custom_format   = get_option( 'eduadmin-date-courseDate-list-custom-format' );

		$eduProgrammeDateSetting = get_option( 'eduadmin-date-programmeDates', 'default' );
		$programme_date_short    = get_option( 'eduadmin-date-programmeDates-short' );
		$programme_show_day_name = get_option( 'eduadmin-date-programmeDates-show-daynames', 'show-dayname' );
		$programme_show_time     = get_option( 'eduadmin-date-programmeDates-show-time', 'show-time' );
		$programme_custom_format = get_option( 'eduadmin-date-programmeDates-custom' );

		$eduCourseDaySetting       = get_option( 'eduadmin-date-courseDays', 'default' );
		$course_day_always_numbers = get_option( 'eduadmin-date-courseDays-alwaysNumbers' );
		?>
		<div class="eduadmin wrap">
			<h2><?php echo sprintf( _x( 'EduAdmin settings - %s', 'backend', 'eduadmin-booking' ), _x( 'Date settings', 'backend', 'eduadmin-booking' ) ); ?></h2>
			<div class="block-container">
				<div class="left-container">
					<form method="post" action="options.php">
						<?php settings_fields( 'eduadmin-date' ); ?>
						<?php do_settings_sections( 'eduadmin-date' ); ?>
						<div class="block">
							<?php echo _x( 'In this section you can set up how to show/format the dates in the parts of the plugin.', 'backend', 'eduadmin-booking' ); ?>
							<br />
							<br />
							<?php echo _x( 'If no changes are made, the plugin will run as it done before, with default settings.', 'backend', 'eduadmin-booking' ); ?>
							<h3><?php echo _x( 'Date format (Event dates)', 'backend', 'eduadmin-booking' ); ?></h3>
							<em><?php echo _x( 'These settings will make changes to where dates for specific events are shown in lists, details or in event selections.', 'backend', 'eduadmin-booking' ); ?></em>
							<br />
							<br />
							<strong><?php echo _x( 'Detail settings', 'backend', 'eduadmin-booking' ); ?></strong>
							<br />
							<label>
								<input type="radio"<?php checked( $edu_eventDate_detail_setting, 'default' ); ?>
								       name="eduadmin-date-eventDates-detail" value="default" />
								<?php echo _x( 'Default settings', 'backend', 'eduadmin-booking' ); ?>
							</label>
							<br />
							<label>
								<input type="radio"<?php checked( $edu_eventDate_detail_setting, 'customSettings' ); ?>
								       name="eduadmin-date-eventDates-detail" value="customSettings" />
								<?php echo _x( 'Custom settings', 'backend', 'eduadmin-booking' ); ?>
							</label>
							<br />
							<div class="edu-date-customsettings">
								<label>
									<input type="checkbox" name="eduadmin-date-eventDates-detail-short"
										<?php checked( $event_detail_date_short, 'short' ); ?>
										   value="short" />
									<?php echo _x( 'Show short names for months and weekdays', 'backend', 'eduadmin-booking' ); ?>
								</label>
								<br />
								<label>
									<input type="checkbox" name="eduadmin-date-eventDates-detail-show-daynames"
										<?php checked( $event_detail_show_day_name, 'show-dayname' ); ?>
										   value="show-dayname" />
									<?php echo _x( 'Show name of days', 'backend', 'eduadmin-booking' ); ?>
								</label>
								<br />
								<label>
									<input type="checkbox" name="eduadmin-date-eventDates-detail-show-time"
										<?php checked( $event_detail_show_time, 'show-time' ); ?>
										   value="show-time" />
									<?php echo _x( 'Show event time', 'backend', 'eduadmin-booking' ); ?>
								</label>
							</div>
							<label>
								<input type="radio"<?php checked( $edu_eventDate_detail_setting, 'customFormat' ); ?>
								       name="eduadmin-date-eventDates-detail" value="customFormat" />
								<?php echo _x( 'Custom date format <em>(will override all formatting options)</em>', 'backend', 'eduadmin-booking' ); ?>
							</label>
							<br />
							<input type="text" class="date-customformat"
							       name="eduadmin-date-eventDates-detail-custom-format"
							       id="eduadmin-date-eventDates-detail-custom-format" placeholder="Custom date format"
							       value="<?php esc_attr( $event_detail_custom_format ); ?>" />
							<br />
							<br />
							<strong><?php echo _x( 'List settings', 'backend', 'eduadmin-booking' ); ?></strong>
							<br />
							<label>
								<input type="radio"<?php checked( $edu_eventDate_list_setting, 'default' ); ?>
								       name="eduadmin-date-eventDates-list" value="default" />
								<?php echo _x( 'Default settings', 'backend', 'eduadmin-booking' ); ?>
							</label>
							<br />
							<label>
								<input type="radio"<?php checked( $edu_eventDate_list_setting, 'customSettings' ); ?>
								       name="eduadmin-date-eventDates-list" value="customSettings" />
								<?php echo _x( 'Custom settings', 'backend', 'eduadmin-booking' ); ?>
							</label>
							<br />
							<div class="edu-date-customsettings">
								<label>
									<input type="checkbox" name="eduadmin-date-eventDates-list-short"
										<?php checked( $event_list_date_short, 'short' ); ?>
										   value="short" />
									<?php echo _x( 'Show short names for months and weekdays', 'backend', 'eduadmin-booking' ); ?>
								</label>
								<br />
								<label>
									<input type="checkbox" name="eduadmin-date-eventDates-list-show-daynames"
										<?php checked( $event_list_show_day_name, 'show-dayname' ); ?>
										   value="show-dayname" />
									<?php echo _x( 'Show name of days', 'backend', 'eduadmin-booking' ); ?>
								</label>
								<br />
								<label>
									<input type="checkbox" name="eduadmin-date-eventDates-list-show-time"
										<?php checked( $event_list_show_time, 'show-time' ); ?>
										   value="show-time" />
									<?php echo _x( 'Show event time', 'backend', 'eduadmin-booking' ); ?>
								</label>
							</div>
							<label>
								<input type="radio"
									<?php checked( $edu_eventDate_list_setting, 'customFormat' ); ?>
									   name="eduadmin-date-eventDates-list" value="customFormat" />
								<?php echo _x( 'Custom date format <em>(will override all formatting options)</em>', 'backend', 'eduadmin-booking' ); ?>
							</label>
							<br />
							<input type="text" class="date-customformat"
							       name="eduadmin-date-eventDates-list-custom-format"
							       id="eduadmin-date-eventDates-list-custom-format" placeholder="Custom date format"
							       value="<?php esc_attr( $event_list_custom_format ); ?>" />
							<br />
							<br />
							<h3><?php echo _x( 'Date format (Course dates)', 'backend', 'eduadmin-booking' ); ?></h3>
							<em><?php echo _x( 'These settings will make changes to where dates for courses are shown in lists (not events).', 'backend', 'eduadmin-booking' ); ?></em>
							<br />
							<br />
							<label>
								<input type="radio"<?php checked( $edu_courseDate_list_setting, 'default' ); ?>
								       name="eduadmin-date-courseDates-list" value="default" />
								<?php echo _x( 'Default settings', 'backend', 'eduadmin-booking' ); ?>
							</label>
							<br />
							<label>
								<input type="radio"<?php checked( $edu_courseDate_list_setting, 'customSettings' ); ?>
								       name="eduadmin-date-courseDates-list" value="customSettings" />
								<?php echo _x( 'Custom settings', 'backend', 'eduadmin-booking' ); ?>
							</label>
							<br />
							<div class="edu-date-customsettings">
								<label>
									<input type="checkbox" name="eduadmin-date-courseDates-list-short"
										<?php checked( $course_list_date_short, 'short' ); ?>
										   value="short" />
									<?php echo _x( 'Show short names for months and weekdays', 'backend', 'eduadmin-booking' ); ?>
								</label>
								<br />
								<label>
									<input type="checkbox" name="eduadmin-date-courseDates-list-show-daynames"
										<?php checked( $course_list_show_day_name, 'show-dayname' ); ?>
										   value="show-dayname" />
									<?php echo _x( 'Show name of days', 'backend', 'eduadmin-booking' ); ?>
								</label>
								<br />
								<label>
									<input type="checkbox" name="eduadmin-date-courseDates-list-show-time"
										<?php checked( $course_list_show_time, 'show-time' ); ?>
										   value="show-time" />
									<?php echo _x( 'Show event time', 'backend', 'eduadmin-booking' ); ?>
								</label>
							</div>
							<label>
								<input type="radio"
									<?php checked( $edu_courseDate_list_setting, 'customFormat' ); ?>
									   name="eduadmin-date-courseDates-list" value="customFormat" />
								<?php echo _x( 'Custom date format <em>(will override all formatting options)</em>', 'backend', 'eduadmin-booking' ); ?>
							</label>
							<br />
							<input type="text" class="date-customformat"
							       name="eduadmin-date-courseDates-list-custom-format"
							       id="eduadmin-date-courseDates-list-custom-format" placeholder="Custom date format"
							       value="<?php esc_attr( $course_list_custom_format ); ?>" />
							<br />
							<br />
							<h3><?php echo _x( 'Date format (Programme dates)', 'backend', 'eduadmin-booking' ); ?></h3>
							<em><?php echo _x( 'These settings will change how we show dates for programmes', 'backend', 'eduadmin-booking' ); ?></em>
							<br />
							<br />
							<label>
								<input type="radio"
									<?php checked( $eduProgrammeDateSetting, 'default' ); ?>
									   name="eduadmin-date-programmeDates" value="default" />
								<?php echo _x( 'Default settings', 'backend', 'eduadmin-booking' ); ?>
							</label>
							<br />
							<label>
								<input type="radio"
									<?php checked( $eduProgrammeDateSetting, 'customSettings' ); ?>
									   name="eduadmin-date-programmeDates" value="customSettings" />
								<?php echo _x( 'Custom settings', 'backend', 'eduadmin-booking' ); ?>
							</label>
							<br />
							<div class="edu-date-customsettings">
								<label>
									<input type="checkbox" name="eduadmin-date-programmeDates-short"
										<?php checked( $programme_date_short, 'short' ); ?>
										   value="short" />
									<?php echo _x( 'Show short names for months and weekdays', 'backend', 'eduadmin-booking' ); ?>
								</label>
								<br />
								<label>
									<input type="checkbox" name="eduadmin-date-programmeDates-show-daynames"
										<?php checked( $programme_show_day_name, 'show-dayname' ); ?>
										   value="show-dayname" />
									<?php echo _x( 'Show name of days', 'backend', 'eduadmin-booking' ); ?>
								</label>
								<br />
								<label>
									<input type="checkbox" name="eduadmin-date-programmeDates-show-time"
										<?php checked( $programme_show_time, 'show-time' ); ?>
										   value="show-time" />
									<?php echo _x( 'Show event time', 'backend', 'eduadmin-booking' ); ?>
								</label>
							</div>
							<label>
								<input type="radio"
									<?php checked( $eduProgrammeDateSetting, 'customFormat' ); ?>
									   name="eduadmin-date-programmeDates" value="customFormat" />
								<?php echo _x( 'Custom date format <em>(will override all formatting options)</em>', 'backend', 'eduadmin-booking' ); ?>
							</label>
							<br />
							<input type="text" class="date-customformat" name="eduadmin-date-eventDates-customFormat"
							       id="eduadmin-date-eventDates-customFormat" placeholder="Custom date format" />
							<br />
							<br />
							<h3><?php echo _x( 'Date format (Course days (schedule for both programmes and events))', 'backend', 'eduadmin-booking' ); ?></h3>
							<label>
								<input type="radio"
									<?php checked( $eduCourseDaySetting, 'default' ); ?>
									   name="eduadmin-date-courseDays" value="default" />
								<?php echo _x( 'Default settings', 'backend', 'eduadmin-booking' ); ?>
							</label>
							<br />
							<label>
								<input type="radio"
									<?php checked( $eduCourseDaySetting, 'customSettings' ); ?>
									   name="eduadmin-date-courseDays" value="customSettings" />
								<?php echo _x( 'Custom settings', 'backend', 'eduadmin-booking' ); ?>
							</label>
							<div class="edu-date-customsettings">
								<label>
									<input type="checkbox" name="eduadmin-date-courseDays-alwaysNumbers" />
									<?php echo _x( 'Always show course days as number of days', 'backend', 'eduadmin-booking' ); ?>
								</label>
							</div>
						</div>
						<p class="submit">
							<input type="submit" name="submit" id="submit" class="button button-primary"
							       value="<?php echo esc_attr_x( 'Save changes', 'backend', 'eduadmin-booking' ); ?>" />
						</p>
					</form>

					<form action="" method="POST">
						<input type="hidden" name="act" value="edu-reset-date-settings" />
						<input type="submit" class="button"
						       value="<?php echo esc_attr_x( 'Restore default settings', 'backend', 'eduadmin-booking' ); ?>" />
					</form>
				</div>

				<div class="right-container">
					<div class="block">
						<strong><?php echo _x( 'Date formatting variables', 'backend', 'eduadmin-booking' ); ?></strong>
						<br />
						<br />
						<em>(to be filled in)</em>
					</div>
				</div>
			</div>
		</div>
		<?php
	}
	EDU()->stop_timer( $t );
}
