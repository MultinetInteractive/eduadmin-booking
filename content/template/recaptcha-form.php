<?php
function eduadmin_render_recaptcha_form() {
	$recaptcha_enabled   = EDU()->is_checked( 'eduadmin-recaptcha-enabled', false );
	$recaptcha_sitekey   = EDU()->get_option( 'eduadmin-recaptcha-sitekey', '' );
	$recaptcha_secretkey = EDU()->get_option( 'eduadmin-recaptcha-secretkey', '' );

	if ( $recaptcha_enabled && ! empty( $recaptcha_sitekey ) && ! empty( $recaptcha_secretkey ) ) {
		?>
		<div class="recaptchaView">
			<div class="g-recaptcha" data-sitekey="<?php echo esc_attr( $recaptcha_sitekey ); ?>"></div>
		</div>
		<?php
	}
}
