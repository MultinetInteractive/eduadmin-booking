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

			delete_option( 'eduadmin-date-courseDays-event' );
			delete_option( 'eduadmin-date-courseDays-event-alwaysNumbers' );
			delete_option( 'eduadmin-date-courseDays-event-neverGroup' );

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

		$eduCourseDaySetting       = get_option( 'eduadmin-date-courseDays-event', 'default' );
		$course_day_always_numbers = get_option( 'eduadmin-date-courseDays-event-alwaysNumbers' );
		$course_day_never_group    = get_option( 'eduadmin-date-courseDays-event-neverGroup' );
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
										<?php checked( $event_detail_date_short, 'on' ); ?>
										   value="on" />
									<?php echo _x( 'Show short names for months and weekdays', 'backend', 'eduadmin-booking' ); ?>
								</label>
								<br />
								<label>
									<input type="checkbox" name="eduadmin-date-eventDates-detail-show-daynames"
										<?php checked( $event_detail_show_day_name, 'on' ); ?>
										   value="on" />
									<?php echo _x( 'Show name of days', 'backend', 'eduadmin-booking' ); ?>
								</label>
								<br />
								<label>
									<input type="checkbox" name="eduadmin-date-eventDates-detail-show-time"
										<?php checked( $event_detail_show_time, 'on' ); ?>
										   value="on" />
									<?php echo _x( 'Show event time', 'backend', 'eduadmin-booking' ); ?>
								</label>
							</div>
							<!--<label>
								<input type="radio"<?php checked( $edu_eventDate_detail_setting, 'customFormat' ); ?>
								       name="eduadmin-date-eventDates-detail" value="customFormat" />
								<?php echo _x( 'Custom date format <em>(will override all formatting options)</em>', 'backend', 'eduadmin-booking' ); ?>
							</label>
							<br />
							<input type="text" class="date-customformat"
							       name="eduadmin-date-eventDates-detail-custom-format"
							       id="eduadmin-date-eventDates-detail-custom-format" placeholder="Custom date format"
							       value="<?php echo esc_attr( $event_detail_custom_format ); ?>" />-->
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
										<?php checked( $event_list_date_short, 'on' ); ?>
										   value="on" />
									<?php echo _x( 'Show short names for months and weekdays', 'backend', 'eduadmin-booking' ); ?>
								</label>
								<br />
								<label>
									<input type="checkbox" name="eduadmin-date-eventDates-list-show-daynames"
										<?php checked( $event_list_show_day_name, 'on' ); ?>
										   value="on" />
									<?php echo _x( 'Show name of days', 'backend', 'eduadmin-booking' ); ?>
								</label>
								<br />
								<label>
									<input type="checkbox" name="eduadmin-date-eventDates-list-show-time"
										<?php checked( $event_list_show_time, 'on' ); ?>
										   value="on" />
									<?php echo _x( 'Show event time', 'backend', 'eduadmin-booking' ); ?>
								</label>
							</div>
							<!--<label>
								<input type="radio"
									<?php checked( $edu_eventDate_list_setting, 'customFormat' ); ?>
									   name="eduadmin-date-eventDates-list" value="customFormat" />
								<?php echo _x( 'Custom date format <em>(will override all formatting options)</em>', 'backend', 'eduadmin-booking' ); ?>
							</label>
							<br />
							<input type="text" class="date-customformat"
							       name="eduadmin-date-eventDates-list-custom-format"
							       id="eduadmin-date-eventDates-list-custom-format" placeholder="Custom date format"
							       value="<?php echo esc_attr( $event_list_custom_format ); ?>" />-->

							<br />
							<h3><?php echo _x( 'Date format (Schedule for events)', 'backend', 'eduadmin-booking' ); ?></h3>
							<em><?php echo _x( 'These settings will change the displayed format for the schedule popup', 'backend', 'eduadmin-booking' ); ?></em>
							<br />
							<br />
							<strong><?php echo _x( 'Events', 'backend', 'eduadmin-booking' ); ?></strong>
							<br />
							<label>
								<input type="radio"
									<?php checked( $eduCourseDaySetting, 'default' ); ?>
									   name="eduadmin-date-courseDays-event" value="default" />
								<?php echo _x( 'Default settings', 'backend', 'eduadmin-booking' ); ?>
							</label>
							<br />
							<label>
								<input type="radio"
									<?php checked( $eduCourseDaySetting, 'customSettings' ); ?>
									   name="eduadmin-date-courseDays-event" value="customSettings" />
								<?php echo _x( 'Custom settings', 'backend', 'eduadmin-booking' ); ?>
							</label>
							<div class="edu-date-customsettings">
								<label>
									<input type="checkbox" name="eduadmin-date-courseDays-event-alwaysNumbers"
										<?php checked( $course_day_always_numbers, 'on' ); ?> value="on" />
									<?php echo _x( 'Always show course days as number of days (use schedule)', 'backend', 'eduadmin-booking' ); ?>
								</label>
								<br />
								<label>
									<input type="checkbox" name="eduadmin-date-courseDays-event-neverGroup"
										<?php checked( $course_day_never_group, 'on' ); ?>
										   value="on" />
									<?php echo _x( 'Never group dates for event dates', 'backend', 'eduadmin-booking' ); ?>
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

				<!--<div class="right-container">
					<div class="block">
						<strong><?php echo _x( 'Date formatting variables', 'backend', 'eduadmin-booking' ); ?></strong>
						<br />
						<br />
						<em>(to be filled in)</em>

						Developer-variables, or for sneaky people who view the source :)

						{text("text to be written")}

					</div>
				</div>-->
			</div>
		</div>
		<?php
	}
	EDU()->stop_timer( $t );
}
