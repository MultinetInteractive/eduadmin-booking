<b><?php echo esc_html_x( 'Page shortcodes', 'backend', 'eduadmin-booking' ); ?></b>
<br />
<div class="eduadmin-shortcode" onclick="EduAdmin.ToggleAttributeList(this);">
	<span title="<?php echo esc_attr_x( 'Shortcode to display the course list.\n(Click to view attributes)', 'backend', 'eduadmin-booking' ); ?>">
		[eduadmin-listview]
	</span>
	<div class="eduadmin-attributelist">
		<div class="eduadmin-attribute">
			<span title="<?php echo esc_attr_x( 'Sets which template to use in the listview (template_A, template_B, template_GF)', 'backend', 'eduadmin-booking' ); ?>">template</span>
		</div>
		<div class="eduadmin-attribute">
			<span title="<?php echo esc_attr_x( 'Filters the course list by category (Insert category ID)', 'backend', 'eduadmin-booking' ); ?>">category</span>
		</div>
		<div class="eduadmin-attribute">
			<span title="<?php echo esc_attr_x( 'Filters the course list by subject (Text)', 'backend', 'eduadmin-booking' ); ?>">subject</span>
		</div>
		<div class="eduadmin-attribute">
			<span title="<?php echo esc_attr_x( 'Hides the search box from the list', 'backend', 'eduadmin-booking' ); ?>">hidesearch</span>
		</div>
		<div class="eduadmin-attribute">
			<span title="<?php echo esc_attr_x( 'Only shows courses that have events', 'backend', 'eduadmin-booking' ); ?>">onlyevents</span>
		</div>
		<div class="eduadmin-attribute">
			<span title="<?php echo esc_attr_x( 'Only shows courses that do not have events', 'backend', 'eduadmin-booking' ); ?>">onlyempty</span>
		</div>
		<div class="eduadmin-attribute">
			<span title="<?php echo esc_attr_x( 'Tells the list how many items to show at max', 'backend', 'eduadmin-booking' ); ?>">numberofevents</span>
		</div>
		<div class="eduadmin-attribute">
			<span title="<?php echo esc_attr_x( 'Sets which mode you want to use in the list view (event, course)', 'backend', 'eduadmin-booking' ); ?>">mode</span>
		</div>
		<div class="eduadmin-attribute">
			<span title="<?php echo esc_attr_x( 'Sets the field to sort by', 'backend', 'eduadmin-booking' ); ?>">orderby</span>
		</div>
		<div class="eduadmin-attribute">
			<span title="<?php echo esc_attr_x( 'Set which order to sort the data (ASC / DESC)', 'backend', 'eduadmin-booking' ); ?>">order</span>
		</div>
	</div>
</div>
<div class="eduadmin-shortcode" onclick="EduAdmin.ToggleAttributeList(this);">
	<span title="<?php echo esc_attr_x( 'Shortcode to display the course detail view.\n(Click to view attributes)', 'backend', 'eduadmin-booking' ); ?>">
		[eduadmin-detailview]
	</span>
	<div class="eduadmin-attributelist">
		<div class="eduadmin-attribute">
			<span title="<?php echo esc_attr_x( 'For custom pages, you must provide courseid in all detail-info attributes.', 'backend', 'eduadmin-booking' ); ?>">courseid</span>
		</div>
		<div class="eduadmin-attribute">
			<span title="<?php echo esc_attr_x( 'By using this attribute, you will tell the plugin not to load any templates.', 'backend', 'eduadmin-booking' ); ?>">customtemplate</span>
		</div>
	</div>
</div>
<div class="eduadmin-shortcode" onclick="EduAdmin.ToggleAttributeList(this);">
	<span title="<?php echo esc_attr_x( 'Shortcode to display the booking form view.', 'backend', 'eduadmin-booking' ); ?>">
		[eduadmin-bookingview]
	</span>
	<div class="eduadmin-attributelist">
		<div class="eduadmin-attribute">
			<span title="<?php echo esc_attr_x( 'To build custom booking view pages, you can provide a course id', 'backend', 'eduadmin-booking' ); ?>">courseid</span>
		</div>
		<div class="eduadmin-attribute">
			<span title="<?php echo esc_attr_x( 'Hides the invoice e-mail field from the form', 'backend', 'eduadmin-booking' ); ?>">hideinvoiceemailfield</span>
		</div>
		<div class="eduadmin-attribute">
			<span title="<?php echo esc_attr_x( 'Force show invoice information fields', 'backend', 'eduadmin-booking' ); ?>">showinvoiceinformation</span>
		</div>
	</div>
</div>
<div class="eduadmin-shortcode" onclick="EduAdmin.ToggleAttributeList(this);">
	<span title="<?php echo esc_attr_x( 'Shortcode to display the login view\n(My Pages, Profile, Bookings, etc.)', 'backend', 'eduadmin-booking' ); ?>">
		[eduadmin-loginview]
	</span>
</div>
<div class="eduadmin-shortcode" onclick="EduAdmin.ToggleAttributeList(this);">
	<span title="<?php echo esc_attr_x( 'Shortcode to display pricenames of specific course.\n(Click to view attributes)', 'backend', 'eduadmin-booking' ); ?>">
		[eduadmin-coursepublicpricename]
	</span>
	<div class="eduadmin-attributelist">
		<div class="eduadmin-attribute">
			<span title="<?php echo esc_attr_x( 'To get pricenames of a course, you provide a course id', 'backend', 'eduadmin-booking' ); ?>">courseid</span>
		</div>
		<div class="eduadmin-attribute">
			<span title="<?php echo esc_attr_x( 'Tells the list how many items to show at max', 'backend', 'eduadmin-booking' ); ?>">numberofprices</span>
		</div>
		<div class="eduadmin-attribute">
			<span title="<?php echo esc_attr_x( 'Sets the field to sort by', 'backend', 'eduadmin-booking' ); ?>">orderby</span>
		</div>
		<div class="eduadmin-attribute">
			<span title="<?php echo esc_attr_x( 'Set which order to sort the data (ASC / DESC)', 'backend', 'eduadmin-booking' ); ?>">order</span>
		</div>
	</div>
</div>
<hr noshade="noshade" /><b><?php echo esc_html_x( 'Widgets', 'backend', 'eduadmin-booking' ); ?></b>
<br />
<div class="eduadmin-shortcode" onclick="EduAdmin.ToggleAttributeList(this);">
	<span title="<?php echo esc_attr_x( 'Shortcode to inject the login widget.', 'backend', 'eduadmin-booking' ); ?>">
		[eduadmin-loginwidget]
	</span>
	<div class="eduadmin-attributelist">
		<div class="eduadmin-attribute">
			<span title="<?php echo esc_attr_x( 'Text to show instead of standard', 'backend', 'eduadmin-booking' ); ?>">logintext</span>
		</div>
		<div class="eduadmin-attribute">
			<span title="<?php echo esc_attr_x( 'Text to show instead of standard', 'backend', 'eduadmin-booking' ); ?>">logouttext</span>
		</div>
		<div class="eduadmin-attribute">
			<span title="<?php echo esc_attr_x( 'Text to show instead of standard', 'backend', 'eduadmin-booking' ); ?>">guesttext</span>
		</div>
	</div>
</div>
<hr noshade="noshade" /><b><?php echo esc_html_x( 'Detail shortcodes', 'backend', 'eduadmin-booking' ); ?></b>
<br />
<div class="eduadmin-shortcode" onclick="EduAdmin.ToggleAttributeList(this);">
	<span title="<?php echo esc_attr_x( 'Shortcode to display detailed information from provided attributes.\n(Click to view attributes)', 'backend', 'eduadmin-booking' ); ?>">
		[eduadmin-detailinfo]
	</span>
	<div class="eduadmin-attributelist">
		<div class="eduadmin-attribute">
			<span title="<?php echo esc_attr_x( 'This will include a Javascript-snippet that replaces the page title with the current course name', 'backend', 'eduadmin-booking' ); ?>">pagetitlejs</span>
		</div>
		<div class="eduadmin-attribute">
			<span title="<?php echo esc_attr_x( 'This attribute is only required if you do full custom pages for your courses.', 'backend', 'eduadmin-booking' ); ?>">courseid</span>
		</div>
		<div class="eduadmin-attribute">
			<span title="<?php echo esc_attr_x( 'Fetches the name of the course', 'backend', 'eduadmin-booking' ); ?>">coursename</span>
		</div>
		<div class="eduadmin-attribute">
			<span title="<?php echo esc_attr_x( 'Fetches the public name of the course', 'backend', 'eduadmin-booking' ); ?>">coursepublicname</span>
		</div>
		<div class="eduadmin-attribute">
			<span title="<?php echo esc_attr_x( 'Fetches what level this course is', 'backend', 'eduadmin-booking' ); ?>">courselevel</span>
		</div>
		<div class="eduadmin-attribute">
			<span title="<?php echo esc_attr_x( 'Fetches the URL of the course image', 'backend', 'eduadmin-booking' ); ?>">courseimage</span>
		</div>
		<div class="eduadmin-attribute">
			<span title="<?php echo esc_attr_x( 'Fetches the image text of the course image', 'backend', 'eduadmin-booking' ); ?>">courseimagetext</span>
		</div>
		<div class="eduadmin-attribute">
			<span title="<?php echo esc_attr_x( 'Fetches the number of days the course usually has', 'backend', 'eduadmin-booking' ); ?>">coursedays</span>
		</div>
		<div class="eduadmin-attribute">
			<span title="<?php echo esc_attr_x( 'Fetches the start time of the course', 'backend', 'eduadmin-booking' ); ?>">coursestarttime</span>
		</div>
		<div class="eduadmin-attribute">
			<span title="<?php echo esc_attr_x( 'Fetches the end time of the course', 'backend', 'eduadmin-booking' ); ?>">courseendtime</span>
		</div>
		<div class="eduadmin-attribute">
			<span title="<?php echo esc_attr_x( 'Fetches the price of the course', 'backend', 'eduadmin-booking' ); ?>">courseprice</span>
		</div>
		<div class="eduadmin-attribute">
			<span title="<?php echo esc_attr_x( 'Fetches the short description of the course', 'backend', 'eduadmin-booking' ); ?>">coursedescriptionshort</span>
		</div>
		<div class="eduadmin-attribute">
			<span title="<?php echo esc_attr_x( 'Fetches the description of the course', 'backend', 'eduadmin-booking' ); ?>">coursedescription</span>
		</div>
		<div class="eduadmin-attribute">
			<span title="<?php echo esc_attr_x( 'Fetches the goal of the course', 'backend', 'eduadmin-booking' ); ?>">coursegoal</span>
		</div>
		<div class="eduadmin-attribute">
			<span title="<?php echo esc_attr_x( 'Fetches the target group of the course', 'backend', 'eduadmin-booking' ); ?>">coursetarget</span>
		</div>
		<div class="eduadmin-attribute">
			<span title="<?php echo esc_attr_x( 'Fetches the prerequisites of the course', 'backend', 'eduadmin-booking' ); ?>">courseprerequisites</span>
		</div>
		<div class="eduadmin-attribute">
			<span title="<?php echo esc_attr_x( 'Fetches what to do after the course', 'backend', 'eduadmin-booking' ); ?>">courseafter</span>
		</div>
		<div class="eduadmin-attribute">
			<span title="<?php echo esc_attr_x( 'Fetches all the quotes from the course', 'backend', 'eduadmin-booking' ); ?>">coursequote</span>
		</div>
		<div class="eduadmin-attribute">
			<span title="<?php echo esc_attr_x( 'Fetches a list of events for the course', 'backend', 'eduadmin-booking' ); ?>">courseeventlist</span>
		</div>
		<div class="eduadmin-attribute">
			<span title="<?php echo esc_attr_x( 'Filters the courseeventlist to show the specified amount of courses (Number)', 'backend', 'eduadmin-booking' ); ?>">showmore</span>
		</div>
		<div class="eduadmin-attribute">
			<span title="<?php echo esc_attr_x( 'Filters the courseeventlist to show only the specified city (Text)', 'backend', 'eduadmin-booking' ); ?>">courseeventlistfiltercity</span>
		</div>
		<div class="eduadmin-attribute">
			<span title="<?php echo esc_attr_x( 'Fetches value from a course attribute (Insert attribute ID)', 'backend', 'eduadmin-booking' ); ?>">courseattributeid</span>
		</div>
		<div class="eduadmin-attribute">
			<span title="<?php echo esc_attr_x( 'Gets the URL that is used to send the inquiry form for a course', 'backend', 'eduadmin-booking' ); ?>">courseinquiryurl</span>
		</div>
	</div>
	<hr />
	<?php echo esc_html_x( 'For more information about our shortcodes and attributes, check our GitHub-page', 'backend', 'eduadmin-booking' ); ?>
	<br />
	<a href="https://github.com/MultinetInteractive/EduAdmin-WordPress/wiki" target="_blank">GitHub EduAdmin</a>
</div>
