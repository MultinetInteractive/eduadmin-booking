<div class="questionPanel">
	<?php
	foreach ( $booking_questions as $question ) {
		render_question( $question, false, 'booking' );
	}
	?>
</div>
