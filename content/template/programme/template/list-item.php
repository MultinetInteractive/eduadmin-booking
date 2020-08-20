<div class="programme-list-item">
	<div class="programme-name">
		<?php
		echo esc_html( $programme['ProgrammeName'] );
		?>
	</div>
	<div class="programme-length">
		<?php
		if ( ! empty( $programme['LengthUnit'] ) && ! empty( $programme['Length'] ) ) {
			switch ( $programme['LengthUnit'] ) {
				case 'Days':
					/* translators: 1. Amount */
					echo esc_html( sprintf( _nx( '%d day', '%d days', intval( $programme['Length'] ), 'Length of programme', 'eduadmin-booking' ), intval( $programme['Length'] ) ) );
					break;
				case 'Weeks':
					/* translators: 1. Amount */
					echo esc_html( sprintf( _nx( '%d week', '%d weeks', intval( $programme['Length'] ), 'Length of programme', 'eduadmin-booking' ), intval( $programme['Length'] ) ) );
					break;
				case 'Months':
					/* translators: 1. Amount */
					echo esc_html( sprintf( _nx( '%d month', '%d months', intval( $programme['Length'] ), 'Length of programme', 'eduadmin-booking' ), intval( $programme['Length'] ) ) );
					break;
			}
		}
		?>
	</div>
	<div class="programme-nextstart">
		<?php
		if ( ! empty( $programme['ProgrammeStarts'] ) ) {
			$next_start = current( $programme['ProgrammeStarts'] );
			/* translators: 1. The date for the next programme start */
			echo wp_kses_post( sprintf( _x( 'Next start: %s', 'Next programme start', 'eduadmin-booking' ), get_display_date( $next_start['StartDate'] ) ) );
			echo '<br />';
			echo wp_kses_post( $next_start['ParticipantNumberLeft'] > 0 || intval( $next_start['MaxParticipantNumber'] ) == 0 ? '<span class="spots-left">' . _x( 'Spots left', 'frontend', 'eduadmin-booking' ) . '</span>' : '<span class="no-spots">' . _x( 'No spots', 'frontend', 'eduadmin-booking' ) . '</span>' );
		}
		?>
	</div>
	<div class="programme-buttons">
		<a href="<?php echo esc_url( get_home_url() . '/programmes/' . make_slugs( $programme['ProgrammeName'] ) . '_' . $programme['ProgrammeId'] . '/' ); ?>" class="cta-btn">
			<?php echo esc_html_x( 'Details', 'frontend', 'eduadmin-booking' ); ?>
		</a>
	</div>
</div>
