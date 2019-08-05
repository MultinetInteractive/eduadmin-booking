<?php
defined( 'ABSPATH' ) || die( 'This plugin must be run within the scope of WordPress.' );

require_once 'plugin-settings.php';
require_once 'settings-page.php';
require_once 'general-settings.php';
require_once 'list-settings.php';

require_once 'detail-settings.php';
require_once 'booking-settings.php';
require_once 'profile-settings.php';
require_once 'style-settings.php';

add_action( 'admin_init', 'eduadmin_settings_init' );
add_action( 'admin_menu', 'eduadmin_backend_menu' );
add_action( 'admin_enqueue_scripts', 'eduadmin_backend_content' );
add_action( 'wp_enqueue_scripts', 'eduadmin_frontend_content', PHP_INT_MAX );
add_action( 'add_meta_boxes', 'eduadmin_shortcode_metabox' );
add_action( 'wp_footer', 'eduadmin_print_javascript' );

function eduadmin_page_title( $title, $sep = '|' ) {
	$t = EDU()->start_timer( __METHOD__ );
	global $wp;

	if ( empty( $sep ) ) {
		$sep = '|';
	}

	if ( isset( $wp ) && isset( $wp->query_vars ) && isset( $wp->query_vars['courseId'] ) ) {
		$course_id = $wp->query_vars['courseId'];

		$group_by_city = EDU()->is_checked( 'eduadmin-groupEventsByCity', false );
		$fetch_months  = get_option( 'eduadmin-monthsToFetch', 6 );
		if ( ! is_numeric( $fetch_months ) ) {
			$fetch_months = 6;
		}

		$edo = json_decode( EDUAPIHelper()->GetCourseDetailInfo( $course_id, $fetch_months, $group_by_city ), true );

		$selected_course = false;

		$id = $edo['CourseTemplateId'];
		if ( $id === intval( $course_id ) ) {
			$selected_course = $edo;
		}

		if ( false !== $selected_course ) {
			$title_field = get_option( 'eduadmin-pageTitleField', 'CourseName' );
			if ( stristr( $title_field, 'attr_' ) !== false ) {
				$attrid = substr( $title_field, 5 );
				foreach ( $selected_course['CustomFields'] as $cf ) {
					if ( $cf['CustomFieldId'] === $attrid ) {
						$value = $cf['CustomFieldValue'];
						break;
					}
				}

				if ( ! empty( $value ) && stristr( $title, $value ) === false ) {
					$title = $value . ' ' . $sep . ' ' . $title;
				} else {
					$title = $selected_course['CourseName'] . ' ' . $sep . ' ' . $title;
				}
			} else {
				if ( ! empty( $selected_course[ $title_field ] ) && stristr( $title, $selected_course[ $title_field ] ) === false ) {
					$title = $selected_course[ $title_field ] . ' ' . $sep . ' ' . $title;
				} else {
					$title = $selected_course['CourseName'] . ' ' . $sep . ' ' . $title;
				}
			}
		}
	}
	EDU()->stop_timer( $t );

	return $title;
}

add_filter( 'pre_get_document_title', 'eduadmin_page_title', PHP_INT_MAX, 2 );
add_filter( 'wp_title', 'eduadmin_page_title', PHP_INT_MAX, 2 );
add_filter( 'aioseop_title', 'eduadmin_page_title', PHP_INT_MAX, 2 );

function eduadmin_settings_init() {
	$t = EDU()->start_timer( __METHOD__ );
	/* Credential settings */
	register_setting( 'eduadmin-credentials', 'eduadmin-api-key' );
	register_setting( 'eduadmin-credentials', 'eduadmin-newapi-key' );
	register_setting( 'eduadmin-credentials', 'eduadmin-credentials_have_changed' );

	/* Rewrite settings */
	register_setting( 'eduadmin-rewrite', 'eduadmin-options_have_changed' );
	register_setting( 'eduadmin-rewrite', 'eduadmin-rewriteBaseUrl' );
	register_setting( 'eduadmin-rewrite', 'eduadmin-listViewPage' );
	register_setting( 'eduadmin-rewrite', 'eduadmin-loginViewPage' );
	register_setting( 'eduadmin-rewrite', 'eduadmin-detailViewPage' );
	register_setting( 'eduadmin-rewrite', 'eduadmin-bookingViewPage' );
	register_setting( 'eduadmin-rewrite', 'eduadmin-thankYouPage' );
	register_setting( 'eduadmin-rewrite', 'eduadmin-interestObjectPage' );
	register_setting( 'eduadmin-rewrite', 'eduadmin-interestEventPage' );
	register_setting( 'eduadmin-rewrite', 'eduadmin-programme-list' );
	register_setting( 'eduadmin-rewrite', 'eduadmin-programme-detail' );
	register_setting( 'eduadmin-rewrite', 'eduadmin-programme-book' );

	/* Booking settings */
	register_setting( 'eduadmin-booking', 'eduadmin-useLogin' );
	register_setting( 'eduadmin-booking', 'eduadmin-allowCustomerRegistration' );
	register_setting( 'eduadmin-booking', 'eduadmin-loginField' );
	register_setting( 'eduadmin-booking', 'eduadmin-allowCustomerUpdate' );

	register_setting( 'eduadmin-booking', 'eduadmin-singlePersonBooking' );
	register_setting( 'eduadmin-booking', 'eduadmin-customerGroupId' );
	register_setting( 'eduadmin-booking', 'eduadmin-currency' );
	register_setting( 'eduadmin-booking', 'eduadmin-bookingTermsLink' );
	register_setting( 'eduadmin-booking', 'eduadmin-useBookingTermsCheckbox' );
	register_setting( 'eduadmin-booking', 'eduadmin-javascript' );
	register_setting( 'eduadmin-booking', 'eduadmin-customerMatching' );
	register_setting( 'eduadmin-booking', 'eduadmin-selectPricename' );
	register_setting( 'eduadmin-booking', 'eduadmin-fieldOrder' );
	register_setting( 'eduadmin-booking', 'eduadmin-allowInterestRegObject' );
	register_setting( 'eduadmin-booking', 'eduadmin-allowInterestRegEvent' );
	register_setting( 'eduadmin-booking', 'eduadmin-hideSubEventDateTime' );
	register_setting( 'eduadmin-booking', 'eduadmin-allowDiscountCode' );
	register_setting( 'eduadmin-booking', 'eduadmin-noInvoiceFreeEvents' );
	register_setting( 'eduadmin-booking', 'eduadmin-hideInvoiceEmailField' );
	register_setting( 'eduadmin-booking', 'eduadmin-showInvoiceInformation' );
	register_setting( 'eduadmin-booking', 'eduadmin-validateCivicRegNo' );
	register_setting( 'eduadmin-booking', 'eduadmin-useLimitedDiscount' );
	register_setting( 'eduadmin-booking', 'eduadmin-blockEditIfLoggedIn' );

	/* Style settings */
	register_setting( 'eduadmin-style', 'eduadmin-style' );

	/* Detail settings */
	register_setting( 'eduadmin-details', 'eduadmin-showDetailHeaders' );
	register_setting( 'eduadmin-details', 'eduadmin-detailTemplate' );
	register_setting( 'eduadmin-details', 'eduadmin-groupEventsByCity' );
	register_setting( 'eduadmin-details', 'eduadmin-pageTitleField' );

	/* List settings */
	register_setting( 'eduadmin-list', 'eduadmin-showEventsInList' );
	register_setting( 'eduadmin-list', 'eduadmin-listTemplate' );

	register_setting( 'eduadmin-list', 'eduadmin-allowRegionSearch' );
	register_setting( 'eduadmin-list', 'eduadmin-allowLocationSearch' );
	register_setting( 'eduadmin-list', 'eduadmin-allowSubjectSearch' );
	register_setting( 'eduadmin-list', 'eduadmin-allowCategorySearch' );
	register_setting( 'eduadmin-list', 'eduadmin-allowLevelSearch' );

	register_setting( 'eduadmin-list', 'eduadmin-listSortOrder' );

	register_setting( 'eduadmin-list', 'eduadmin-layout-descriptionfield' );

	register_setting( 'eduadmin-list', 'eduadmin-showCourseImage' );
	register_setting( 'eduadmin-list', 'eduadmin-showCourseDescription' );
	register_setting( 'eduadmin-list', 'eduadmin-showNextEventDate' );
	register_setting( 'eduadmin-list', 'eduadmin-showCourseLocations' );
	register_setting( 'eduadmin-list', 'eduadmin-showEventPrice' );
	register_setting( 'eduadmin-list', 'eduadmin-showCourseDays' );
	register_setting( 'eduadmin-list', 'eduadmin-showCourseTimes' );
	register_setting( 'eduadmin-list', 'eduadmin-showEventVenueName' );
	register_setting( 'eduadmin-list', 'eduadmin-showWeekDays' );

	/* Plugin settings */
	register_setting( 'eduadmin-plugins', 'eduadmin-plugin-settings' );

	/* Profile page settings */
	register_setting( 'eduadmin-profile', 'eduadmin-profile-priceType' );
	register_setting( 'eduadmin-profile', 'eduadmin-profile-showCompanyCertificates' );

	/* Global settings */
	register_setting( 'eduadmin-rewrite', 'eduadmin-spotsLeft' );
	register_setting( 'eduadmin-rewrite', 'eduadmin-spotsSettings' );
	register_setting( 'eduadmin-rewrite', 'eduadmin-alwaysFewSpots' );
	register_setting( 'eduadmin-rewrite', 'eduadmin-monthsToFetch' );
	register_setting( 'eduadmin-rewrite', 'eduadmin-showVatTexts' );

	if ( is_admin() ) {
		wp_enqueue_script( 'jquery' );
		wp_enqueue_script( 'jquery-form' );
	}

	EDU()->stop_timer( $t );
}

function eduadmin_frontend_content() {
	$t = EDU()->start_timer( __METHOD__ );

	$style_version = filemtime( EDUADMIN_PLUGIN_PATH . '/content/style/compiled/frontend/global.css' );
	wp_register_style( 'eduadmin_frontend_style', plugins_url( 'content/style/compiled/frontend/global.css', dirname( __FILE__ ) ), false, date_version( $style_version ) );
	$customcss = get_option( 'eduadmin-style', '' );
	wp_enqueue_style( 'eduadmin_frontend_style' );
	wp_add_inline_style( 'eduadmin_frontend_style', $customcss );

	$script_version = filemtime( EDUADMIN_PLUGIN_PATH . '/content/scripts/eduapi/edu.apiclient.js' );
	wp_register_script( 'eduadmin_apiclient_script', plugins_url( 'content/scripts/eduapi/edu.apiclient.js', dirname( __FILE__ ) ), false, date_version( $script_version ) );
	wp_localize_script(
		'eduadmin_apiclient_script',
		'wp_edu',
		array(
			'BaseUrl'        => home_url(),
			'BaseUrlScripts' => plugins_url( 'content/script', dirname( __FILE__ ) ),
			'CourseFolder'   => get_option( 'eduadmin-rewriteBaseUrl' ),
			'AjaxUrl'        => rest_url( 'edu/v1' ),
		)
	);
	wp_enqueue_script( 'eduadmin_apiclient_script', false, array( 'jquery' ) );

	$script_version = filemtime( EDUADMIN_PLUGIN_PATH . '/content/scripts/frontend/js_strings.js' );
	wp_register_script( 'eduadmin_jsstrings_script', plugins_url( 'content/scripts/frontend/js_strings.js', dirname( __FILE__ ) ), array( 'wp-i18n' ), date_version( $script_version ) );
	wp_enqueue_script( 'eduadmin_jsstrings_script', false, array( 'wp-i18n' ) );

	wp_set_script_translations( 'eduadmin_jsstrings_script', 'eduadmin-booking' );

	$script_version = filemtime( EDUADMIN_PLUGIN_PATH . '/content/scripts/frontend/frontendjs.js' );
	wp_register_script( 'eduadmin_frontend_script', plugins_url( 'content/scripts/frontend/frontendjs.js', dirname( __FILE__ ) ), array( 'eduadmin_jsstrings_script' ), date_version( $script_version ) );
	wp_enqueue_script( 'eduadmin_frontend_script', false, array( 'jquery', 'eduadmin_jsstrings_script' ) );
	EDU()->stop_timer( $t );
}

function eduadmin_backend_content() {
	$t             = EDU()->start_timer( __METHOD__ );
	$style_version = filemtime( EDUADMIN_PLUGIN_PATH . '/content/style/compiled/admin/global.css' );
	wp_register_style( 'eduadmin_admin_style', plugins_url( 'content/style/compiled/admin/global.css', dirname( __FILE__ ) ), false, date_version( $style_version ) );
	wp_enqueue_style( 'eduadmin_admin_style' );

	$script_version = filemtime( EDUADMIN_PLUGIN_PATH . '/content/scripts/backend/adminjs.js' );
	wp_register_script( 'eduadmin_admin_script', plugins_url( 'content/scripts/backend/adminjs.js', dirname( __FILE__ ) ), false, date_version( $script_version ) );
	wp_enqueue_script( 'eduadmin_admin_script', false, array( 'jquery', 'jquery-form' ) );
	EDU()->stop_timer( $t );
}

function eduadmin_backend_menu() {
	$t     = EDU()->start_timer( __METHOD__ );
	$level = 'administrator';
	add_menu_page( 'EduAdmin', 'EduAdmin', $level, 'eduadmin-settings', 'edu_render_general_settings', 'dashicons-welcome-learn-more' );
	add_submenu_page( 'eduadmin-settings', _x( 'EduAdmin - General', 'backend', 'eduadmin-booking' ), _x( 'General settings', 'backend', 'eduadmin-booking' ), $level, 'eduadmin-settings', 'edu_render_general_settings' );
	add_submenu_page( 'eduadmin-settings', _x( 'EduAdmin - List view', 'backend', 'eduadmin-booking' ), _x( 'List settings', 'backend', 'eduadmin-booking' ), $level, 'eduadmin-settings-view', 'edu_render_list_settings_page' );
	add_submenu_page( 'eduadmin-settings', _x( 'EduAdmin - Detail view', 'backend', 'eduadmin-booking' ), _x( 'Detail settings', 'backend', 'eduadmin-booking' ), $level, 'eduadmin-settings-detail', 'edu_render_detail_settings_page' );
	add_submenu_page( 'eduadmin-settings', _x( 'EduAdmin - Booking view', 'backend', 'eduadmin-booking' ), _x( 'Booking settings', 'backend', 'eduadmin-booking' ), $level, 'eduadmin-settings-booking', 'edu_render_booking_settings_page' );
	add_submenu_page( 'eduadmin-settings', _x( 'EduAdmin - Profile view', 'backend', 'eduadmin-booking' ), _x( 'Profile settings', 'backend', 'eduadmin-booking' ), $level, 'eduadmin-settings-profile', 'edu_render_profile_settings_page' );
	add_submenu_page( 'eduadmin-settings', _x( 'EduAdmin - Style', 'backend', 'eduadmin-booking' ), _x( 'Style settings', 'backend', 'eduadmin-booking' ), $level, 'eduadmin-settings-style', 'edu_render_style_settings_page' );
	add_submenu_page( 'eduadmin-settings', _x( 'EduAdmin - Plugins', 'backend', 'eduadmin-booking' ), _x( 'Plugins', 'backend', 'eduadmin-booking' ), $level, 'eduadmin-settings-plugins', 'edu_render_plugin_page' );
	add_submenu_page( 'eduadmin-settings', _x( 'EduAdmin - Api Authentication', 'backend', 'eduadmin-booking' ), _x( 'Api Authentication', 'backend', 'eduadmin-booking' ), $level, 'eduadmin-settings-api', 'edu_render_settings_page' );
	EDU()->stop_timer( $t );
}

function eduadmin_shortcode_metabox() {
	$t = EDU()->start_timer( __METHOD__ );
	add_meta_box( 'eduadmin-metabox', _x( 'EduAdmin - Shortcodes', 'backend', 'eduadmin-booking' ), 'eduadmin_create_metabox', null, 'side', 'high' );
	EDU()->stop_timer( $t );
}

function eduadmin_create_metabox() {
	$t = EDU()->start_timer( __METHOD__ );
	include_once 'edu-meta-box.php';
	EDU()->stop_timer( $t );
}

function eduadmin_rewrite_javascript( $script ) {
	$t = EDU()->start_timer( __METHOD__ );

	if ( ! empty( $_GET['edu-thankyou'] ) && is_numeric( $_GET['edu-thankyou'] ) ) {
		if ( stripos( $script, '$' ) !== false ) {
			$booking_info = EDUAPI()->OData->Bookings->GetItem(
				intval( $_GET['edu-thankyou'] ),
				null,
				'Customer,ContactPerson,Participants'
			);

			$event_info = EDUAPI()->OData->Events->GetItem(
				$booking_info['EventId']
			);

			$script = str_replace(
				array(
					'$bookingno$',
					'$productname$',
					'$totalsum$',
					'$participants$',
					'$startdate$',
					'$enddate$',
					'$eventid$',
					'$eventdescription$',
					'$customerid$',
					'$customercontactid$',
					'$created$',
					'$paid$',
					'$objectid$',
					'$notes$',
				),
				array(
					esc_js( $booking_info['BookingId'] ), // $bookingno$
					esc_js( $event_info['CourseName'] ), // $productname$
					esc_js( $booking_info['TotalPriceIncVat'] ), // $totalsum$
					esc_js( $booking_info['NumberOfParticipants'] ), // $participants$
					esc_js( $event_info['StartDate'] ), // $startdate$
					esc_js( $event_info['EndDate'] ), // $enddate$
					esc_js( $booking_info['EventId'] ), // $eventid$
					esc_js( $event_info['EventName'] ), // $eventdescription$
					esc_js( $booking_info['Customer']['CustomerId'] ), // $customerid$
					esc_js( $booking_info['ContactPerson']['PersonId'] ), // $customercontactid$
					esc_js( $booking_info['Created'] ), // $created$
					esc_js( $booking_info['Paid'] ), // $paid$
					esc_js( $event_info['CourseTemplateId'] ), // $objectid$
					esc_js( $booking_info['Notes'] ), // $notes$
				),
				$script
			);
		}
		EDU()->stop_timer( $t );

		return $script;
	}
	EDU()->stop_timer( $t );

	return '';
}

function eduadmin_print_javascript() {
	$t = EDU()->start_timer( __METHOD__ );
	if ( ! empty( trim( get_option( 'eduadmin-javascript', '' ) ) ) && isset( EDU()->session['eduadmin-printJS'] ) ) {
		$str    = "<script type=\"text/javascript\">\n";
		$script = get_option( 'eduadmin-javascript' );

		$str .= eduadmin_rewrite_javascript( $script );
		$str .= "\n</script>";

		unset( EDU()->session['eduadmin-printJS'] );
		echo $str;
	}
	EDU()->stop_timer( $t );
}
