<?php
// phpcs:disable WordPress.NamingConventions
defined( 'ABSPATH' ) || die( 'This plugin must be run within the scope of WordPress.' );
define( 'EDUADMIN_PLUGIN_PATH', dirname( __FILE__ ) );
defined( 'WP_SESSION_COOKIE' ) || define( 'WP_SESSION_COOKIE', 'eduadmin-cookie' );

/*
 * Plugin Name:	EduAdmin Booking
 * Plugin URI:	https://www.eduadmin.se
 * Description:	EduAdmin plugin to allow visitors to book courses at your website
 * Tags:	booking, participants, courses, events, eduadmin, lega online
 * Version:	2.10.0
 * GitHub Plugin URI: multinetinteractive/eduadmin-wordpress
 * GitHub Plugin URI: https://github.com/multinetinteractive/eduadmin-wordpress
 * Requires at least: 4.9
 * Tested up to: 5.2
 * Author:	Chris Gårdenberg, MultiNet Interactive AB
 * Author URI:	https://www.multinet.com
 * License:	GPL3
 * Text Domain:	eduadmin-booking
 * Domain Path: /languages
 */
/*
	EduAdmin Booking plugin
	Copyright (C) 2015-2018 Chris Gårdenberg, MultiNet Interactive AB

	This program is free software: you can redistribute it and/or modify
	it under the terms of the GNU General Public License as published by
	the Free Software Foundation, either version 3 of the License, or
	(at your option) any later version.

	This program is distributed in the hope that it will be useful,
	but WITHOUT ANY WARRANTY; without even the implied warranty of
	MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
	GNU General Public License for more details.

	You should have received a copy of the GNU General Public License
	along with this program. If not, see <http://www.gnu.org/licenses/>.
 */

if ( ! class_exists( 'EduAdmin' ) ) :

	final class EduAdmin {
		/**
		 * @var EduAdmin
		 */
		protected static $_instance = null;
		/**
		 * @var EDU_IntegrationLoader
		 */
		public $integrations = null;
		/**
		 * @var string
		 */
		private $token = null;
		/**
		 * @var EduAdmin_BookingHandler
		 */
		public $booking_handler = null;
		/**
		 * @var \EduAdmin_LoginHandler
		 */
		public $login_handler = null;
		/**
		 * @var \EduAdmin_APIController
		 */
		public $rest_controller = null;
		/**
		 * @var \EduAdminRouter
		 */
		public $router = null;
		/**
		 * @var WP_Session|bool
		 */
		public $session = null;
		/** @var array */
		public $timers;
		/** @var array */
		public $phrases;
		/** @var string */
		public $version;
		/** @var array */
		public $week_days;
		/** @var array */
		public $short_week_days;
		/** @var array */
		public $months;
		/** @var array */
		public $short_months;
		/** @var array */
		public $request_items;

		/**
		 * @return EduAdmin
		 */
		public static function instance() {
			if ( is_null( self::$_instance ) ) {
				self::$_instance = new self();
			}

			return self::$_instance;
		}

		public function __construct() {
			$this->timers        = array();
			$t                   = $this->start_timer( __METHOD__ );
			$this->request_items = array();
			$this->version       = $this->get_version();
			$this->includes();
			$this->init_hooks();
			do_action( 'eduadmin_loaded' );
			$this->stop_timer( $t );
		}

		/**
		 * @param string $name Name of the timer
		 *
		 * @return string Returns the unique name for the created timer
		 */
		public function start_timer( $name ) {
			$timer_id                                = count( $this->timers ) + 1;
			$this->timers[ $name . '_' . $timer_id ] = microtime( true );

			return $name . '_' . $timer_id;
		}

		/**
		 * @param string $name The unique name of the timer (Returned from StartTimer)
		 */
		public function stop_timer( $name ) {
			$this->timers[ $name ] = microtime( true ) - $this->timers[ $name ];
		}

		/**
		 * @param stdClass|array|object|null $object
		 * @param bool                       $as_json
		 */
		public function write_debug( $object, $as_json = false ) {
			if ( is_null( $object ) ) {
				return;
			}

			if ( $as_json ) {
				echo '<span style="white-space: pre; font-family: Courier New;">' . json_encode( $object, JSON_PRETTY_PRINT ) . '</span>';

				return;
			}

			ob_start();
			var_dump( $object );

			echo '<span style="white-space: pre; font-family: Courier New;">' . ob_get_clean() . '</span>';
		}

		/*
		 * Checks if the current option is checked inside
		 * @param string|bool|number|null $optionValue
		 * @param bool|null $default
		 * @return bool
		 */
		public function is_checked( $optionName, $default = false ) {
			$t           = $this->start_timer( __METHOD__ . '::' . $optionName );
			$optionValue = get_option( $optionName, $default );

			if ( empty( $optionValue ) ) {
				$this->stop_timer( $t );

				return false;
			}
			if ( 'on' === $optionValue ) {
				$this->stop_timer( $t );

				return true;
			}
			if ( true === $optionValue ) {
				$this->stop_timer( $t );

				return true;
			}
			if ( 'true' === $optionValue ) {
				$this->stop_timer( $t );

				return true;
			}
			if ( 1 === $optionValue ) {
				$this->stop_timer( $t );

				return true;
			}
			if ( '1' === $optionValue ) {
				$this->stop_timer( $t );

				return true;
			}

			$this->stop_timer( $t );

			return $default;
		}

		public function is_selected( $optionValue, $currentValue ) {
			return ! empty( $optionValue ) && $optionValue === $currentValue;
		}

		/**
		 * Method that returns a unique transient-name based on input
		 * @return string
		 */
		private function generate_transient_hash() {
			$arguments = func_get_args();
			$jsonArgs  = array();
			foreach ( $arguments as $arg ) {
				$jsonArgs[] = json_encode( $arg );
			}

			return sha1( join( '', $jsonArgs ) ) . '__' . $this->get_version();
		}

		/**
		 * @param $name       - The name of the transient
		 * @param $action     callable
		 * @param $expiration int
		 *
		 * @return mixed
		 */
		public function get_transient( $name, $action, $expiration ) {
			$t = $this->start_timer( __METHOD__ . '::' . $name );

			if ( $action == null || ! is_callable( $action ) ) {
				$this->stop_timer( $t );
				throw new InvalidArgumentException();
			}

			if ( $expiration == null || ! is_numeric( $expiration ) ) {
				$this->stop_timer( $t );
				throw new InvalidArgumentException();
			}

			$args = func_get_args();
			$args = array_reverse( $args );
			array_pop( $args ); // Removing $name from $args
			array_pop( $args ); // Removing $action from $args
			array_pop( $args ); // Removing $expiration from $args
			$args = array_reverse( $args );

			$h = $name . '_' . $this->generate_transient_hash( $name, $args );
			$r = \get_transient( $h );

			if ( ! $r ) {
				$r = $action();
				\set_transient( $h, $r, $expiration );
			}
			$this->stop_timer( $t );

			return $r;
		}

		public function get_news() {
			return EDU()->get_transient( 'eduadmin-wp-news', function() {
				$user_locale = get_user_locale();
				$lang        = "en";
				switch ( $user_locale ) {
					case "sv_SE":
						$lang = "sv";
						break;
					default:
						$lang = "en";
						break;
				}

				$u                 = wp_get_current_user();
				$ut                = md5( EDU()->version );
				$eduadmin_news_url = 'https://productnews.multinet.com/display/json/eduadmin-wp-plugin/live/' . $u->ID . '/' . $ut . '?lang=' . $lang;
				$resp              = wp_remote_get( $eduadmin_news_url );

				$news_items = json_decode( $resp['body'], true );

				$needs_update = false;

				foreach ( $news_items as $i => $ni ) {
					$news_items[ $i ]['UpdateRecommended'] = false;
					if ( mb_stripos( $ni["newsBody"], "<!--" ) !== false ) {
						if ( preg_match_all( "/<!-- (\{.*?\}) -->/", $ni["newsBody"], $config ) > 0 ) {
							$news_items[ $i ]["newsBody"]       = trim( str_replace( $config[0][0], '', $ni["newsBody"] ) );
							$news_items[ $i ]['NewsItemConfig'] = json_decode( $config[1][0], true );

							if ( $news_items[ $i ]['NewsItemConfig']['recommendedVersion'] ) {
								$recommendedVersion = $news_items[ $i ]['NewsItemConfig']['recommendedVersion'];

								$updateRecommended                      = version_compare( EDU()->version, $recommendedVersion ) < 0;
								$news_items[ $i ]['UpdateRecommended']  = $updateRecommended;
								$news_items[ $i ]['RecommendedVersion'] = $recommendedVersion;
								$needs_update                           = true;
							}
						}
					}
				}

				if ( $needs_update ) {
					EDU()->new_version_needed_notice();
				}

				return $news_items;
			}, HOUR_IN_SECONDS );
		}

		private function new_version_needed_notice() {
			?>
			<div class="notice notice-error">
				<p>EduAdmin - <?php echo _x( 'Update needed', 'backend', 'eduadmin-booking' ); ?></p>
				<p><?php echo _x( 'Please view the news and update the EduAdmin plugin for optimal functionality.', 'backend', 'eduadmin-booking' ); ?></p>
			</div>
			<?php
		}

		public function get_version() {
			if ( function_exists( 'get_plugin_data' ) ) {
				$p_data = get_plugin_data( __FILE__ );

				return $p_data['Version'];
			} else {
				$default_headers = array(
					'Name'        => 'Plugin Name',
					'PluginURI'   => 'Plugin URI',
					'Version'     => 'Version',
					'Description' => 'Description',
					'Author'      => 'Author',
					'AuthorURI'   => 'Author URI',
					'TextDomain'  => 'Text Domain',
					'DomainPath'  => 'Domain Path',
					'Network'     => 'Network',
					'_sitewide'   => 'Site Wide Only',
				);

				$p_data = get_file_data( __FILE__, $default_headers );

				return $p_data['Version'];
			}
		}

		private function includes() {
			$t = $this->start_timer( __METHOD__ );
			include_once 'class/class-eduadminrouter.php';
			$this->router = new EduAdminRouter();
			$this->router->init();

			include_once 'includes/eduadmin-api-phpclient/eduadmin-api-client.php';
			include_once 'includes/eduapi-helper-functions.php';

			if ( ! class_exists( 'Recursive_ArrayAccess' ) ) {
				include_once 'libraries/class-recursive-arrayaccess.php';
			}

			if ( ! class_exists( 'WP_Session' ) ) {
				include_once 'libraries/class-wp-session.php';
				include_once 'libraries/wp-session.php';
			}

			$this->session = WP_Session::get_instance();

			include_once 'includes/edu-column-functions.php';
			include_once 'includes/edu-api-functions.php';
			include_once 'class/class-eduadmin-bookinginfo.php';
			include_once 'class/class-eduadmin-bookinghandler.php';
			include_once 'class/class-eduadmin-loginhandler.php';

			include_once 'includes/plugin/class-edu-integration.php'; // Integration interface
			include_once 'includes/plugin/class-edu-integrationloader.php'; // Integration loader

			if ( is_wp_error( $this->get_new_api_token() ) ) {
				add_action( 'admin_notices', array( $this, 'setup_warning' ) );
			}

			include_once 'includes/edu-options.php';
			include_once 'includes/edu-ajax-functions.php';
			include_once 'includes/edu-rewrites.php';
			include_once 'includes/edu-shortcodes.php';

			include_once 'includes/edu-question-functions.php';
			include_once 'includes/edu-attribute-functions.php';
			include_once 'includes/edu-text-functions.php';
			include_once 'includes/edu-login-functions.php';
			include_once 'includes/edu-sort-functions.php';

			include_once 'class/class-eduadmin-apicontroller.php';

			$this->rest_controller = new EduAdmin_APIController();
			$this->booking_handler = new EduAdmin_BookingHandler();
			$this->login_handler   = new EduAdmin_LoginHandler();
			$this->stop_timer( $t );
		}

		public function call_home() {
			global $wp_version;
			$usage_data    = array(
				'siteUrl'       => get_site_url(),
				'siteName'      => get_option( 'blogname' ),
				'wpVersion'     => $wp_version,
				'phpVersion'    => PHP_VERSION,
				'token'         => get_option( 'eduadmin-api-key' ),
				'pluginVersion' => $this->version,
			);
			$call_home_url = 'https://ws10.multinet.se/edu-plugin/wp_phone_home.php';
			wp_remote_post( $call_home_url, array( 'body' => $usage_data ) );

			EDU()->get_news();
		}

		private function init_hooks() {
			$t = $this->start_timer( __METHOD__ );
			register_activation_hook( __FILE__, array( $this, 'activate' ) );

			add_action( 'after_switch_theme', array( $this, 'new_theme' ) );
			add_action( 'init', array( $this, 'init' ) );
			add_action( 'plugins_loaded', array( $this, 'load_language' ) );
			add_action( 'eduadmin_call_home', array( $this, 'call_home' ) );
			add_action( 'eduadmin_clear_expired', array( $this, 'clear_expired_transients' ) );
			add_action( 'wp_footer', 'edu_get_timers' );
			add_action( 'wp_footer', array( $this, 'get_transient_list' ) );
			add_action( 'wp_footer', array( $this, 'get_scheduled_tasks' ) );

			add_filter( 'cron_schedules', array( $this, 'add_cron_schedule' ) );

			register_deactivation_hook( __FILE__, array( $this, 'deactivate' ) );
			$this->stop_timer( $t );
		}

		public function add_cron_schedule( $schedules ) {
			$schedules['five_minutes'] = array(
				'interval' => 5 * 60,
				'display'  => esc_html__( 'Every Five Minutes' ),
			);

			return $schedules;
		}

		public function get_scheduled_tasks() {
			if ( ! empty( $_GET['edu-showtasks'] ) && '1' === $_GET['edu-showtasks'] ) {
				echo '<!-- EduAdmin Booking (' . esc_html( EDU()->version ) . ") Scheduled Tasks -->\n";

				$tasks = _get_cron_array();

				$prettyList = array();

				foreach ( $tasks as $nextExecution => $task ) {
					if ( stristr( key( $task ), "eduadmin" ) == true ) {
						$_task = array();

						$_task['next_execution']    = date( "Y-m-d H:i:s", $nextExecution );
						$_task['action_to_execute'] = key( $task );
						$_task['schedule_name']     = current( current( $task ) )["schedule"];
						$_task['schedule_interval'] = current( current( $task ) )["interval"];

						$prettyList[] = $_task;
					}
				}

				foreach ( $prettyList as $t ) {
					echo "<!-- " . $t['action_to_execute'] . " :: Next execution: " . $t['next_execution'] . " (Schedule: " . $t['schedule_name'] . ", interval: " . $t['schedule_interval'] . ") -->\n";
				}
				echo "<!-- /EduAdmin Booking Scheduled Tasks -->\n";
			}
		}

		public function get_transient_list() {
			if ( ! empty( $_GET['edu-showtransients'] ) && '1' === $_GET['edu-showtransients'] ) {
				global $wpdb;

				$prefix     = esc_sql( 'eduadmin-' );
				$options    = $wpdb->options;
				$t          = esc_sql( "%transient%$prefix%" );
				$sql        = $wpdb->prepare( "SELECT option_name, option_value FROM $options WHERE option_name LIKE '%s'", $t );
				$transients = $wpdb->get_results( $sql );

				$list = array();
				foreach ( $transients as $transient ) {
					$key            = str_replace( array(
						                               '_transient_timeout_',
						                               '_transient_',
					                               ), '', $transient->option_name );
					$list[ $key ][] = $transient;
				}
				echo '<!-- EduAdmin Booking (' . esc_html( EDU()->version ) . ") Transients -->\n";

				$nowTime = time();
				foreach ( $list as $trn => $value ) {
					$expires = "";
					$_value  = "";
					foreach ( $value as $item ) {
						if ( stristr( $item->option_name, "timeout" ) == true ) {
							$timeToExpire = $item->option_value - $nowTime;
							if ( abs( $timeToExpire ) > 59 ) {
								if ( $timeToExpire > 0 ) {
									$expires = "Expires in: " . human_time_diff( $nowTime, $item->option_value );
								} else {
									$expires = "Expired: " . human_time_diff( $item->option_value, $nowTime ) . " ago";
								}
							} else {
								if ( $timeToExpire > 0 ) {
									$expires = "Expires in: " . $timeToExpire . " seconds";
								} else {
									$expires = "Expired: " . abs( $timeToExpire ) . " seconds ago";
								}
							}
						} else {
							$_value = $item->option_value;
						}
					}
					echo '<!-- ' . esc_html( $trn ) . ": " . $expires . " -->\n";
					//echo '<!-- ' . esc_html( $_value ) . " -->\n";
				}
				echo "<!-- /EduAdmin Booking Transients -->\n";
			}
		}

		public function init() {
			$t                  = $this->start_timer( __METHOD__ );
			$this->integrations = new EDU_IntegrationLoader();
			add_action( 'rest_api_init', function() {
				$this->rest_controller->register_routes();
			} );
			$this->week_days = array(
				1 => _x( 'monday', 'frontend', 'eduadmin-booking' ),
				2 => _x( 'tuesday', 'frontend', 'eduadmin-booking' ),
				3 => _x( 'wednesday', 'frontend', 'eduadmin-booking' ),
				4 => _x( 'thursday', 'frontend', 'eduadmin-booking' ),
				5 => _x( 'friday', 'frontend', 'eduadmin-booking' ),
				6 => _x( 'saturday', 'frontend', 'eduadmin-booking' ),
				7 => _x( 'sunday', 'frontend', 'eduadmin-booking' ),
			);

			$this->short_week_days = array(
				1 => _x( 'mon', 'frontend', 'eduadmin-booking' ),
				2 => _x( 'tue', 'frontend', 'eduadmin-booking' ),
				3 => _x( 'wed', 'frontend', 'eduadmin-booking' ),
				4 => _x( 'thu', 'frontend', 'eduadmin-booking' ),
				5 => _x( 'fri', 'frontend', 'eduadmin-booking' ),
				6 => _x( 'sat', 'frontend', 'eduadmin-booking' ),
				7 => _x( 'sun', 'frontend', 'eduadmin-booking' ),
			);

			$this->months = array(
				1  => _x( 'january', 'frontend', 'eduadmin-booking' ),
				2  => _x( 'february', 'frontend', 'eduadmin-booking' ),
				3  => _x( 'march', 'frontend', 'eduadmin-booking' ),
				4  => _x( 'april', 'frontend', 'eduadmin-booking' ),
				5  => _x( 'may', 'frontend', 'eduadmin-booking' ),
				6  => _x( 'june', 'frontend', 'eduadmin-booking' ),
				7  => _x( 'july', 'frontend', 'eduadmin-booking' ),
				8  => _x( 'august', 'frontend', 'eduadmin-booking' ),
				9  => _x( 'september', 'frontend', 'eduadmin-booking' ),
				10 => _x( 'october', 'frontend', 'eduadmin-booking' ),
				11 => _x( 'november', 'frontend', 'eduadmin-booking' ),
				12 => _x( 'december', 'frontend', 'eduadmin-booking' ),
			);

			$this->short_months = array(
				1  => _x( 'jan', 'frontend', 'eduadmin-booking' ),
				2  => _x( 'feb', 'frontend', 'eduadmin-booking' ),
				3  => _x( 'mar', 'frontend', 'eduadmin-booking' ),
				4  => _x( 'apr', 'frontend', 'eduadmin-booking' ),
				5  => _x( 'may', 'short form of the month may', 'eduadmin-booking' ),
				6  => _x( 'jun', 'frontend', 'eduadmin-booking' ),
				7  => _x( 'jul', 'frontend', 'eduadmin-booking' ),
				8  => _x( 'aug', 'frontend', 'eduadmin-booking' ),
				9  => _x( 'sep', 'frontend', 'eduadmin-booking' ),
				10 => _x( 'oct', 'frontend', 'eduadmin-booking' ),
				11 => _x( 'nov', 'frontend', 'eduadmin-booking' ),
				12 => _x( 'dec', 'frontend', 'eduadmin-booking' ),
			);

			$this->stop_timer( $t );
		}

		public static function setup_warning() {
			?>
			<div class="notice notice-warning is-dismissable">
				<p>
					<?php
					/* translators: 1: start of link 2: end of link */
					echo wp_kses_post( sprintf( _x( 'Please complete the configuration: %1$sEduAdmin - Api Authentication%2$s', 'backend', 'eduadmin-booking' ), '<a href="' . admin_url() . 'admin.php?page=eduadmin-settings">', '</a>' ) );
					?>
				</p>
			</div>
			<?php
		}

		/**
		 * @return string Returns the users IP adress
		 */
		public function get_ip_adress() {
			$ip_check = array( 'HTTP_CLIENT_IP', 'HTTP_FORWARDED_FOR', 'HTTP_FORWARDED', 'REMOTE_ADDR' );
			foreach ( $ip_check as $header ) {
				if ( ! empty( $_SERVER[ $header ] ) ) { // Var input okay.
					return $_SERVER[ $header ]; // Var input okay.
				}
			}

			return 'UNKNOWN';
		}

		public function load_language() {
			$t = $this->start_timer( __METHOD__ );
			load_plugin_textdomain( 'eduadmin-booking', false, EDUADMIN_PLUGIN_PATH . '/languages' );

			if ( ! wp_next_scheduled( 'eduadmin_call_home' ) ) {
				wp_schedule_event( time(), 'hourly', 'eduadmin_call_home' );
			}

			if ( ! wp_next_scheduled( 'eduadmin_clear_expired' ) ) {
				wp_schedule_event( time(), 'five_minutes', 'eduadmin_clear_expired' );
			}

			$this->stop_timer( $t );
		}

		public function new_theme() {
			update_option( 'eduadmin-options_have_changed', 1 );
		}

		public function activate() {
			$this->clear_transients();
			wp_cache_flush();
			eduadmin_activate_rewrite();
		}

		public function clear_expired_transients() {
			global $wpdb;

			$prefix     = esc_sql( 'eduadmin-' );
			$options    = $wpdb->options;
			$t          = esc_sql( "%transient%$prefix%" );
			$sql        = $wpdb->prepare( "SELECT option_name, option_value FROM $options WHERE option_name LIKE '%s'", $t );
			$transients = $wpdb->get_results( $sql );

			$list = array();
			foreach ( $transients as $transient ) {
				$key            = str_replace( array(
					                               '_transient_timeout_',
					                               '_transient_',
				                               ), '', $transient->option_name );
				$list[ $key ][] = $transient;
			}

			$expired_transients = array();

			$nowTime = time();
			foreach ( $list as $trn => $value ) {
				foreach ( $value as $item ) {
					if ( stristr( $item->option_name, "timeout" ) == true ) {
						$timeToExpire = $item->option_value - $nowTime;
						if ( $timeToExpire <= 0 ) {
							$expired_transients[] = $trn;
						}
					} else {
						$expired_transients[] = $trn;
					}
				}
			}

			foreach ( $expired_transients as $ex_tran ) {
				delete_transient( $ex_tran );
			}
		}

		public function clear_transients() {
			global $wpdb;

			$prefix     = esc_sql( 'eduadmin-' );
			$options    = $wpdb->options;
			$t          = esc_sql( "%transient%$prefix%" );
			$sql        = $wpdb->prepare( "SELECT option_name FROM $options WHERE option_name LIKE '%s'", $t );
			$transients = $wpdb->get_col( $sql );
			foreach ( $transients as $transient ) {
				$key = str_replace( array(
					                    '_transient_timeout_',
					                    '_transient_',
				                    ), '', $transient );
				delete_transient( $key );
			}
		}

		public function deactivate() {
			eduadmin_deactivate_rewrite();
			wp_clear_scheduled_hook( 'eduadmin_call_home' );
			wp_clear_scheduled_hook( 'eduadmin_clear_expired' );
			$this->clear_transients();

			wp_cache_flush();
		}

		private function get_new_api_token() {
			$new_key = get_option( 'eduadmin-newapi-key', null );

			if ( null !== $new_key && ! empty( $new_key ) ) {
				$key = edu_decrypt_api_key( $new_key );
				EDUAPI()->SetCredentials( $key->UserId, $key->Hash );
			} else {
				$old_key = get_option( 'eduadmin-api-key', null );
				if ( null !== $old_key && ! empty( $old_key ) ) {
					$key = edu_decrypt_api_key( $old_key );
					EDUAPI()->SetCredentials( $key->UserId, $key->Hash );
				} else {
					EDUAPI()->SetCredentials( '', '' );
				}
			}

			$current_token = get_transient( 'eduadmin-newapi-token__' . $this->version );
			if ( false === $current_token || ! $current_token->IsValid() ) {
				try {
					$current_token = EDUAPI()->GetToken();
				} catch ( Exception $ex ) {
					return new WP_Error( 'broke', _x( 'Could not fetch a new access token for the EduAdmin API, please contact MultiNet support.', 'backend', 'eduadmin-booking' ) );
				}

				if ( empty( $current_token->Issued ) ) {
					return new WP_Error( 'broke', _x( 'The key for the EduAdmin API is not configured to work with the new API, please contact MultiNet support.', 'backend', 'eduadmin-booking' ) );
				}
				set_transient( 'eduadmin-newapi-token__' . $this->version, $current_token, WEEK_IN_SECONDS );
			}

			EDUAPI()->SetToken( $current_token );

			return null;
		}
	}

	/**
	 * @return EduAdmin
	 */
	function EDU() {
		return EduAdmin::instance();
	}

	$GLOBALS['eduadmin'] = EDU();
	if ( function_exists( 'wp_get_timezone_string' ) ) {
		date_default_timezone_set( wp_get_timezone_string() );
		if ( false === @ini_set( 'date.timezone', wp_get_timezone_string() ) ) {
			add_action( 'admin_notices', function() {
				?>
				<div class="notice notice-warning is-dismissable">
					<p><?php echo esc_html_x( 'Could not set timezone', 'backend', 'eduadmin-booking' ); ?></p>
				</div>
				<?php
			} );
		}
	}

	/* Handle plugin-settings */
	add_action(
		'wp_loaded',
		function() {
			$t = EDU()->start_timer( __METHOD__ );
			if ( ! empty( $_POST['plugin-settings-nonce'] ) && wp_verify_nonce( $_POST['plugin-settings-nonce'], 'eduadmin-plugin-settings' ) ) {
				if ( ! empty( $_POST['option_page'] ) && 'eduadmin-plugin-settings' === sanitize_text_field( $_POST['option_page'] ) ) { // Input var okay.
					$integrations = EDU()->integrations->integrations;
					foreach ( $integrations as $integration ) {
						do_action( 'eduadmin-plugin-save_' . $integration->id );
					}
					add_action( 'admin_notices', function() {
						?>
						<div class="notice notice-success is-dismissible">
							<p><?php echo esc_html_x( 'Plugin settings saved', 'backend', 'eduadmin-booking' ); ?></p>
						</div>
						<?php
					} );
				}
			}
			EDU()->stop_timer( $t );
		}
	);

	add_action( 'in_plugin_update_message-eduadmin-booking/eduadmin.php',
		function( $current_plugin_metadata, $new_plugin_metadata ) {
			if ( ! empty( $new_plugin_metadata->upgrade_notice ) && strlen( trim( $new_plugin_metadata->upgrade_notice ) ) > 0 ) {
				echo '<p style="background-color: #d54e21; padding: 10px; color: #f9f9f9; margin-top: 10px"><strong>' . esc_html_x( 'Important Upgrade Notice', 'backend', 'eduadmin-booking' ) . ':</strong> ';
				echo esc_html( $new_plugin_metadata->upgrade_notice ), '</p>';
			}
		},
		        10,
		        2
	);
endif;
