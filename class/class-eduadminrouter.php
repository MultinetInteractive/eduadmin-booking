<?php
defined( 'ABSPATH' ) || die( 'This plugin must be run within the scope of WordPress.' );

if ( ! class_exists( 'EduAdminRouter' ) ) {
	class EduAdminRouter {
		public function init() {
			add_action( 'init', array( $this, 'register_post_types' ) );
			add_action( 'init', array( $this, 'register_routes' ) );
			add_action( 'parse_request', array( $this, 'route_requests' ) );
		}

		public function route_requests( $wp_query ) {
			global $wp;

			if ( ! empty( $_GET['debug_route'] ) ) {
				EDU()->write_debug( $wp_query );
			}
		}

		public function register_post_types() {
			/*register_post_type( 'edu_programme', array(
				'public'              => true,
				'label'               => _x( 'Programmes', 'backend', 'eduadmin-booking' ),
				'rewrite'             => array(
					'with_front' => false,
					'slug'       => 'programmes',
				),
				'hierarchical'        => true,
				'capability_type'     => 'post',
				'exclude_from_search' => true,
			) );

			register_post_type( 'edu_coursetemplate', array(
				'public'              => true,
				'label'               => _x( 'Course templates', 'backend', 'eduadmin-booking' ),
				'rewrite'             => array(
					'with_front' => false,
					'slug'       => 'coursetemplates',
				),
				'hierarchical'        => true,
				'capability_type'     => 'post',
				'exclude_from_search' => true,
			) );*/
		}

		public function register_routes() {
			$this->register_course_routes();
			$this->register_programme_routes();
			$this->register_profile_routes();
		}

		private function register_course_routes() {
			/*
			 * Course template routes
			 */

			$list_view            = EDU()->get_option( 'eduadmin-listViewPage' );
			$details_view         = EDU()->get_option( 'eduadmin-detailViewPage' );
			$booking_view         = EDU()->get_option( 'eduadmin-bookingViewPage' );
			$object_interest_page = EDU()->get_option( 'eduadmin-interestObjectPage' );
			$event_interest_page  = EDU()->get_option( 'eduadmin-interestEventPage' );

			add_rewrite_tag( '%courseSlug%', '([^&]+)' );
			add_rewrite_tag( '%courseId%', '([^&]+)' );

			$course_folder = EDU()->get_option( 'eduadmin-rewriteBaseUrl' );
			$course_folder = trim( $course_folder );

			if ( false !== $course_folder && ! empty( $course_folder ) ) {
				if ( false !== $booking_view ) {
					if ( false !== $event_interest_page ) {
						add_rewrite_rule( $course_folder . '/(.*?)__(.*)/book/interest/?', 'index.php?page_id=' . $event_interest_page . '&courseSlug=$matches[1]&courseId=$matches[2]', 'top' );
					}
					add_rewrite_rule( $course_folder . '/(.*?)__(.*)/book/?', 'index.php?page_id=' . $booking_view . '&courseSlug=$matches[1]&courseId=$matches[2]', 'top' );
				}

				if ( false !== $details_view ) {
					if ( $object_interest_page ) {
						add_rewrite_rule( $course_folder . '/(.*?)__(.*)/interest/?', 'index.php?page_id=' . $object_interest_page . '&courseSlug=$matches[1]&courseId=$matches[2]', 'top' );
					}
					add_rewrite_rule( $course_folder . '/(.*?)__(.*)/?', 'index.php?page_id=' . $details_view . '&courseSlug=$matches[1]&courseId=$matches[2]', 'top' );
				}

				if ( false !== $list_view ) {
					add_rewrite_rule( $course_folder . '/?$', 'index.php?page_id=' . $list_view, 'top' );
				}
			}
		}

		private function register_profile_routes() {
			/*
			 * Profile routes
			 */

			$login_view = EDU()->get_option( 'eduadmin-loginViewPage' );

			add_rewrite_tag( '%edu-login%', '([^&]+)' );
			add_rewrite_tag( '%edu-profile%', '([^&]+)' );
			add_rewrite_tag( '%edu-bookings%', '([^&]+)' );
			add_rewrite_tag( '%edu-certificates%', '([^&]+)' );
			add_rewrite_tag( '%edu-limiteddiscount%', '([^&]+)' );
			add_rewrite_tag( '%edu-logout%', '([^&]+)' );
			add_rewrite_tag( '%edu-password%', '([^&]+)' );

			$course_folder = EDU()->get_option( 'eduadmin-rewriteBaseUrl' );
			$course_folder = trim( $course_folder );

			if ( false !== $course_folder && ! empty( $course_folder ) ) {
				add_rewrite_rule( $course_folder . '/profile/login/?', 'index.php?page_id=' . $login_view . '&edu-login=1', 'top' );
				add_rewrite_rule( $course_folder . '/profile/myprofile/?', 'index.php?page_id=' . $login_view . '&edu-profile=1', 'top' );
				add_rewrite_rule( $course_folder . '/profile/bookings/?', 'index.php?page_id=' . $login_view . '&edu-bookings=1', 'top' );
				add_rewrite_rule( $course_folder . '/profile/card/?', 'index.php?page_id=' . $login_view . '&edu-limiteddiscount=1', 'top' );
				add_rewrite_rule( $course_folder . '/profile/certificates/?', 'index.php?page_id=' . $login_view . '&edu-certificates=1', 'top' );
				add_rewrite_rule( $course_folder . '/profile/changepassword/?', 'index.php?page_id=' . $login_view . '&edu-password=1', 'top' );
				add_rewrite_rule( $course_folder . '/profile/logout/?', 'index.php?page_id=' . $login_view . '&edu-logout=1', 'top' );
			}
		}

		private function register_programme_routes() {
			/*
			 * Programme routes
			 */

			$programme_list_id   = EDU()->get_option( 'eduadmin-programme-list' );
			$programme_detail_id = EDU()->get_option( 'eduadmin-programme-detail' );
			$programme_book_id   = EDU()->get_option( 'eduadmin-programme-book' );

			add_rewrite_tag( '%edu_programme%', '([^&]+)' );

			add_rewrite_rule(
				'programmes/?$',
				'index.php?page_id=' . $programme_list_id,
				'top'
			);

			add_rewrite_rule(
				'programmes/([^/]+)/?$',
				'index.php?page_id=' . $programme_detail_id . '&edu_programme=$matches[1]',
				'top'
			);
			add_rewrite_rule(
				'programmes/([^/]+)/book/?$',
				'index.php?page_id=' . $programme_book_id . '&edu_programme=$matches[1]',
				'top'
			);
		}
	}
}
