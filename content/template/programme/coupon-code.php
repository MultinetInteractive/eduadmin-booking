<?php
if ( EDU()->is_checked( 'eduadmin-allowDiscountCode', false ) ) :
	?>
	<div class="discountView">
		<label>
			<div class="inputLabel">
				<?php echo esc_html_x( 'Discount code', 'frontend', 'eduadmin-booking' ); ?>
			</div>
			<div class="inputHolder">
				<input type="text" autocomplete="off" name="edu-discountCode" id="edu-discountCode" class="discount-box" placeholder="<?php echo esc_attr_x( 'Discount code', 'frontend', 'eduadmin-booking' ); ?>" />
				<button class="validateDiscount neutral-btn" data-programmestartid="<?php echo esc_attr( $programme['ProgrammeStartId'] ); ?>" onclick="eduBookingView.ValidateProgrammeDiscountCode(); return false;">
					<?php echo esc_html_x( 'Validate', 'frontend', 'eduadmin-booking' ); ?>
				</button>
			</div>
		</label>
		<div class="edu-modal warning" id="edu-warning-discount">
			<?php echo esc_html_x( 'Invalid discount code, please check your code and try again.', 'frontend', 'eduadmin-booking' ); ?>
		</div>
	</div>
<?php
endif;
