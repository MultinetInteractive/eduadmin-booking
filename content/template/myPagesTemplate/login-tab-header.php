<?php
$surl = get_home_url();
$cat  = get_option( 'eduadmin-rewriteBaseUrl' );

$base_url = $surl . '/' . $cat;

function edu_profile_menu_item( $url, $text, $active ) {
	$surl = get_home_url();
	$cat  = get_option( 'eduadmin-rewriteBaseUrl' );

	$base_url = $surl . '/' . $cat;

	echo '<a href="' . esc_url( $base_url . $url ) . '" class="tab_item' . ( $active ? ' active' : '' ) . '">' . esc_html( $text ) . '</a>';
}

?>
<div class="tab_container tabhead">
	<?php
	edu_profile_menu_item( '/profile/myprofile', _x( 'Profile', 'frontend', 'eduadmin-booking' ), 'profile' === $tab );
	edu_profile_menu_item( '/profile/certificates', _x( 'Certificates', 'frontend', 'eduadmin-booking' ), 'certificates' === $tab );
	edu_profile_menu_item( '/profile/bookings', _x( 'Reservations', 'frontend', 'eduadmin-booking' ), 'bookings' === $tab );
	edu_profile_menu_item( '/profile/card', _x( 'Discount Cards', 'frontend', 'eduadmin-booking' ), 'limitedDiscount' === $tab );
	?>
</div>
