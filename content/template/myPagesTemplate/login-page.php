<div class="eduadmin loginForm">
	<div class="loginBox">
		<h2 class="loginTitle"><?php echo esc_html_x( 'Login to My Pages', 'frontend', 'eduadmin-booking' ); ?></h2>
		<form action="" method="POST" onsubmit="">
			<input type="hidden" name="edu-login-ver"
			       value="<?php echo esc_attr( wp_create_nonce( 'edu-profile-login' ) ); ?>" />
			<input type="hidden" name="eduformloginaction" value="" />
			<input type="hidden" name="eduReturnUrl"
			       value="<?php echo esc_attr( ! empty( $_SERVER['HTTP_REFERER'] ) ? $_SERVER['HTTP_REFERER'] : '' ); ?>" />
			<?php
			$selected_login_field = get_option( 'eduadmin-loginField', 'Email' );
			$login_label          = _x( 'E-mail address', 'frontend', 'eduadmin-booking' );
			$field_type           = 'text';
			switch ( $selected_login_field ) {
				case 'Email':
					$login_label = _x( 'E-mail address', 'frontend', 'eduadmin-booking' );
					$field_type  = 'email';
					break;
				case 'CivicRegistrationNumber':
					$login_label = _x( 'Civic Registration Number', 'frontend', 'eduadmin-booking' );
					$field_type  = 'text';
					break;
				case 'CustomerNumber':
					$login_label = _x( 'Customer number', 'frontend', 'eduadmin-booking' );
					$field_type  = 'text';
					break;
			}
			?>
			<label class="login-field">
				<div class="loginLabel"><?php echo esc_html( $login_label ); ?></div>
				<div class="loginInput">
					<input type="<?php echo esc_attr( $field_type ); ?>"
					       name="eduadminloginEmail"<?php echo( 'CivicRegistrationNumber' === $selected_login_field ? ' class="eduadmin-civicRegNo" onblur="eduBookingView.ValidateCivicRegNo();"' : '' ); ?>
					       required autocomplete="off"
					       title="<?php echo esc_attr( sprintf( _x( 'Please enter your %s here', 'frontend', 'eduadmin-booking' ), $login_label ) ); ?>"
					       placeholder="<?php echo esc_attr( $login_label ); ?>"
					       value="<?php echo esc_attr( ! empty( $_POST['eduadminloginEmail'] ) ? sanitize_text_field( $_POST['eduadminloginEmail'] ) : '' ); ?>" />
				</div>
			</label>
			<label class="login-field">
				<div class="loginLabel"><?php echo esc_html_x( 'Password', 'frontend', 'eduadmin-booking' ); ?></div>
				<div class="loginInput">
					<input type="password" autocomplete="off" name="eduadminpassword" required
					       title="<?php echo esc_attr_x( 'Please enter your password here', 'frontend', 'eduadmin-booking' ); ?>"
					       placeholder="<?php echo esc_attr_x( 'Password', 'frontend', 'eduadmin-booking' ); ?>" />
				</div>
			</label>
			<?php
			$click = '';
			if ( 'CivicRegistrationNumber' === $selected_login_field && EDU()->is_checked( 'eduadmin-validateCivicRegNo', false ) ) {
				$click = 'if(!eduBookingView.ValidateCivicRegNo()) { alert(\'' . _x( 'Please enter a valid swedish civic registration number.', 'frontend', 'eduadmin-booking' ) . '\');  return false; }';
			}
			?>
			<button class="loginButton cta-btn"
			        onclick="this.form.eduadminpassword.required = true; this.form.eduformloginaction.value = 'login';<?php echo esc_attr( $click ); ?>"><?php echo esc_html_x( 'Log in', 'frontend', 'eduadmin-booking' ); ?></button>
			<button class="forgotPasswordButton neutral-btn"
			        onclick="this.form.eduadminpassword.required = false; this.form.eduadminpassword.value = ''; this.form.eduformloginaction.value = 'forgot';"><?php echo esc_html_x( 'Forgot password', 'frontend', 'eduadmin-booking' ); ?></button>
		</form>
	</div>

	<?php
	if ( isset( EDU()->session['eduadminLoginError'] ) ) {
		?>
		<div class="edu-modal warning" style="display: block; clear: both;">
			<?php echo esc_html( EDU()->session['eduadminLoginError'] ); ?>
		</div>
		<?php
		unset( EDU()->session['eduadminLoginError'] );
	}

	if ( ! empty( EDU()->session['eduadmin-forgotPassSent'] ) && true === EDU()->session['eduadmin-forgotPassSent'] ) {
		unset( EDU()->session['eduadmin-forgotPassSent'] );
		?>
		<div class="edu-modal warning" style="display: block; clear: both;">
			<?php echo esc_html_x( 'A new password has been sent by email.', 'frontend', 'eduadmin-booking' ); ?>
		</div>
		<?php
	} elseif ( ! empty( EDU()->session['eduadmin-forgotPassSent'] ) && false === EDU()->session['eduadmin-forgotPassSent'] ) {
		unset( EDU()->session['eduadmin-forgotPassSent'] );
		?>
		<div class="edu-modal warning" style="display: block; clear: both;">
			<?php echo esc_html_x( 'Could not send a new password by email.', 'frontend', 'eduadmin-booking' ); ?>
		</div>
		<?php
	}
	?>
</div>
