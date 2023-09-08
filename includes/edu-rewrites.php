<?php
defined( 'ABSPATH' ) || die( 'This plugin must be run within the scope of WordPress.' );

function eduadmin_activate_rewrite() {
	$t = EDU()->start_timer( __METHOD__ );
	eduadmin_rewrite_init();
	flush_rewrite_rules();
	EDU()->stop_timer( $t );
}

function eduadmin_deactivate_rewrite() {
	$t = EDU()->start_timer( __METHOD__ );
	flush_rewrite_rules();
	EDU()->stop_timer( $t );
}

function eduadmin_rewrite_init() {
	$t = EDU()->start_timer( __METHOD__ );
	if ( true == EDU()->get_option( 'eduadmin-options_have_changed', 0 ) ) {
		flush_rewrite_rules();
		EDU()->update_option( 'eduadmin-options_have_changed', 0 );
	}
	EDU()->stop_timer( $t );
}

add_action( 'init', 'eduadmin_rewrite_init' );
add_action( 'admin_init', 'eduadmin_rewrite_init' );
