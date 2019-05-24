<?php
$user         = EDU()->session['eduadmin-loginUser'];
$contact      = $user->Contact;
$customer     = $user->Customer;
$certificates = EDUAPI()->OData->Persons->GetItem(
	$contact->PersonId,
	'PersonId',
	'Certificates'
)['Certificates'];
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
			foreach ( $certificates as $certificate ) {
				?>
				<tr>
					<td align="left"><?php echo esc_html( $certificate['CertificateName'] ); ?></td>
					<td align="left"><?php echo esc_html( date( 'Y-m-d', strtotime( $certificate['CertificateDate'] ) ) ); ?></td>
					<td align="left"><?php echo wp_kses_post( get_old_start_end_display_date( $certificate['ValidFrom'], $certificate['ValidTo'] ) ); ?></td>
				</tr>
				<?php
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
