<div class="participantView">
	<h2><?php echo esc_html_x( 'Participant information', 'frontend', 'eduadmin-booking' ); ?></h2>
	<div class="participantHolder" id="edu-participantHolder">
		<?php
		require_once 'participants/contact-participant.php';
		require_once 'participants/participant-template.php';
		?>
	</div>
	<div>
		<a href="javascript://" class="addParticipantLink neutral-btn"
		   onclick="eduBookingView.AddParticipant(); return false;"><?php echo esc_html_x( '+ Add participant', 'frontend', 'eduadmin-booking' ); ?></a>
	</div>
	<div class="edu-modal warning" id="edu-warning-participants">
		<?php echo esc_html_x( 'You cannot add any more participants.', 'frontend', 'eduadmin-booking' ); ?>
	</div>
</div>
