<?php
$surl = get_home_url();
$cat  = EDU()->get_option( 'eduadmin-rewriteBaseUrl' );

$base_url = $surl . '/' . $cat;

$user     = EDU()->session['eduadmin-loginUser'];
$contact  = $user->Contact;
$customer = $user->Customer;

$show_company_certificates = EDU()->is_checked( 'eduadmin-profile-showCompanyCertificates', false );

$certificates = array();

if ( $show_company_certificates ) {
	$certificates = EDUAPI()->OData->Persons->Search(
		'PersonId,FirstName,LastName,CivicRegistrationNumber',
		'CustomerId eq ' . $customer->CustomerId,
		'Certificates'
	)["value"];
} else {
	$certificates[] = EDUAPI()->OData->Persons->GetItem(
		$contact->PersonId,
		'PersonId,FirstName,LastName,CivicRegistrationNumber',
		'Certificates'
	);
}

$show_certificates = count( $certificates ) > 0;

$cards = EDUAPI()->OData->Customers->GetItem( $customer->CustomerId, '', 'Vouchers' )['Vouchers'];

$show_discount = count( $cards ) > 0;

function edu_profile_menu_item( $url, $text, $active ) {
	$surl = get_home_url();
	$cat  = EDU()->get_option( 'eduadmin-rewriteBaseUrl' );

	$base_url = $surl . '/' . $cat;

	echo '<a href="' . esc_url( $base_url . $url ) . '" class="tab_item' . ( $active ? ' active' : '' ) . '">' . esc_html( $text ) . '</a>';
}

?>
<div class="tab_container tabhead">
	<?php
	edu_profile_menu_item( '/profile/myprofile', _x( 'Profile', 'frontend', 'eduadmin-booking' ), 'profile' === $tab );
	if ( $show_certificates ) {
		edu_profile_menu_item( '/profile/certificates', _x( 'Certificates', 'frontend', 'eduadmin-booking' ), 'certificates' === $tab );
	}
	edu_profile_menu_item( '/profile/bookings', _x( 'Reservations', 'frontend', 'eduadmin-booking' ), 'bookings' === $tab );
	if ( $show_discount ) {
		edu_profile_menu_item( '/profile/card', _x( 'Discount Cards', 'frontend', 'eduadmin-booking' ), 'limitedDiscount' === $tab );
	}
	?>
</div>
