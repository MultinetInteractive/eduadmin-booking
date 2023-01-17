<?php
$user     = EDU()->session['eduadmin-loginUser'];
$contact  = $user->Contact;
$customer = $user->Customer;
if ( isset( $_POST['eduaction'] ) && 'savePassword' === sanitize_text_field( $_POST['eduaction'] ) ) {
	$valid_login = EDUAPI()->REST->Person->LoginById( $contact->PersonId, sanitize_text_field( $_POST['currentPassword'] ) );
	if ( 200 === $valid_login['@curl']['http_code'] ) {
		if ( 0 === strlen( sanitize_text_field( $_POST['newPassword'] ) ) ) {
			$msg = _x( 'You must fill in a password to change it.', 'frontend', 'eduadmin-booking' );
		} elseif ( sanitize_text_field( $_POST['newPassword'] ) !== sanitize_text_field( $_POST['confirmPassword'] ) ) {
			$msg = _x( 'Given password does not match.', 'frontend', 'eduadmin-booking' );
		} elseif ( sanitize_text_field( $_POST['newPassword'] ) === sanitize_text_field( $_POST['currentPassword'] ) ) {
			$msg = _x( 'You cannot set your password to be the same as the one before.', 'frontend', 'eduadmin-booking' );
		} else {
			$pass           = new stdClass();
			$pass->Password = trim( sanitize_text_field( $_POST['newPassword'] ) );
			$response       = EDUAPI()->REST->Person->Update( $contact->PersonId, $pass );
			if ( 204 === $response['@curl']['http_code'] ) {
				$msg = _x( 'Your password has been updated.', 'frontend', 'eduadmin-booking' );
			} else {
				$msg = _x( 'An error occurred while trying to change your password.', 'frontend', 'eduadmin-booking' );
			}
		}
	} else {
		$msg = $valid_login['Message'];
	}
}
?>
<div class="eduadmin">
	<?php
	$tab = 'profile';
	require_once 'login-tab-header.php';
	?>
	<h2><?php echo esc_html_x( 'Change password', 'frontend', 'eduadmin-booking' ); ?></h2>
	<form action="" method="POST">
		<input type="hidden" name="eduaction" value="savePassword" />
		<div class="eduadminContactInformation">
			<h3><?php echo esc_html_x( 'Contact information', 'frontend', 'eduadmin-booking' ); ?></h3>
			<label>
				<div
					class="inputLabel"><?php echo esc_html_x( 'Current password', 'frontend', 'eduadmin-booking' ); ?></div>
				<div class="inputHolder">
					<input type="password" name="currentPassword" required maxlength="50" autocomplete="current-password"
					       placeholder="<?php echo esc_attr_x( 'Current password', 'frontend', 'eduadmin-booking' ); ?>" />
				</div>
			</label>
			<label>
				<div
					class="inputLabel"><?php echo esc_html_x( 'New password', 'frontend', 'eduadmin-booking' ); ?></div>
				<div class="inputHolder">
					<input type="password" name="newPassword" required maxlength="50" autocomplete="new-password"
					       placeholder="<?php echo esc_attr_x( 'New password', 'frontend', 'eduadmin-booking' ); ?>" />
				</div>
			</label>
			<label>
				<div
					class="inputLabel"><?php echo esc_html_x( 'Confirm password', 'frontend', 'eduadmin-booking' ); ?></div>
				<div class="inputHolder">
					<input type="password" name="confirmPassword" required maxlength="50" autocomplete="new-password"
					       placeholder="<?php echo esc_attr_x( 'Confirm password', 'frontend', 'eduadmin-booking' ); ?>" />
				</div>
			</label>
		</div>
		<button
			class="profileSaveButton cta-btn"><?php echo esc_html_x( 'Save', 'frontend', 'eduadmin-booking' ); ?></button>
	</form>
	<?php if ( isset( $msg ) ) { ?>
		<div class="edu-modal warning" style="display: block; clear: both;">
			<?php echo esc_html( $msg ); ?>
		</div>
	<?php } ?>
	<?php require_once 'login-tab-footer.php'; ?>
</div>
