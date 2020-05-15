<?php
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

function edu_write_certificate_date( $start_date, $end_date ) {
	$date_str = '';

	if ( ! empty( $start_date ) ) {
		$date_str = date( 'Y-m-d', strtotime( $start_date ) ) . ' - ';
	}

	if ( ! empty( $end_date ) ) {
		$date_str .= date( 'Y-m-d', strtotime( $end_date ) );
	} else {
		$date_str .= _x( 'Ongoing', 'frontend', 'eduadmin-booking' );
	}

	return $date_str;
}

?>
<div class="eduadmin">
	<?php
	$tab = 'certificates';
	require_once 'login-tab-header.php';
	?>
	<h2><?php echo esc_html_x( 'Certificates', 'frontend', 'eduadmin-booking' ); ?></h2>
	<table class="myCertificationsTable">
		<tr>
			<th align="left"><?php echo esc_html_x( 'Name', 'frontend', 'eduadmin-booking' ); ?></th>
			<th align="left"><?php echo esc_html_x( 'Certified', 'frontend', 'eduadmin-booking' ); ?></th>
			<th align="left"><?php echo esc_html_x( 'Valid', 'frontend', 'eduadmin-booking' ); ?></th>
		</tr>
		<?php
		if ( ! empty( $certificates ) ) {
			foreach ( $certificates as $certificateHolder ) {
				if ( $show_company_certificates ) {
					?>
					<tr>
						<th align="left" colspan="3"><?php echo esc_html( $certificateHolder['FirstName'] . ' ' . $certificateHolder['LastName'] ); ?></th>
					</tr>
					<?php
				}
				if ( ! empty( $certificateHolder['Certificates'] ) ) {
					foreach ( $certificateHolder['Certificates'] as $certificate ) {
						?>
						<tr>
							<td align="left"><?php echo esc_html( $certificate['CertificateName'] ); ?></td>
							<td align="left"><?php echo esc_html( date( 'Y-m-d', strtotime( $certificate['CertificateDate'] ) ) ); ?></td>
							<td align="left"><?php echo esc_html( edu_write_certificate_date( $certificate['ValidFrom'], $certificate['ValidTo'] ) ); ?></td>
						</tr>
						<?php
					}
				} else {
					?>
					<tr>
						<td colspan="3" align="center">
							<i><?php echo sprintf( esc_html_x( '%s doesn\'t have any certificates.', 'frontend', 'eduadmin-booking' ), ( $certificateHolder['FirstName'] . ' ' . $certificateHolder['LastName'] ) ); ?></i>
						</td>
					</tr>
					<?php
				}
			}
		} else {
			?>
			<tr>
				<td colspan="3" align="center">
					<i><?php echo esc_html_x( 'You have no certificates.', 'frontend', 'eduadmin-booking' ); ?></i>
				</td>
			</tr>
			<?php
		}
		?>
	</table>
