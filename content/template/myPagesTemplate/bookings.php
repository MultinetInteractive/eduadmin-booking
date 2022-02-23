<?php
$user     = EDU()->session['eduadmin-loginUser'];
$contact  = $user->Contact;
$customer = $user->Customer;

const valid_sort = [
	'Created',
	'StartDate',
];

const valid_sort_order = [
	'ASC',
	'DESC',
];

?>
<div class="eduadmin">
	<?php
	$tab = 'bookings';
	require_once 'login-tab-header.php';
	?>
	<h2 class="header-with-button">
		<?php echo esc_html_x( 'Reservations', 'frontend', 'eduadmin-booking' ); ?>
		<button class="cta-btn" onclick="eduGlobalMethods.GetBookingExport(-1);">
			<?php echo esc_html_x( 'Export to Excel (All)', 'frontend', 'eduadmin-booking' ); ?>
		</button>
	</h2>

	<a href="./?booking-sort=StartDate">
		<?php echo esc_html_x('Sort by event start date', 'frontend', 'eduadmin-booking'); ?>
	</a>
	<a href="./?booking-sort=Created">
		<?php echo esc_html_x('Sort by booking created', 'frontend', 'eduadmin-booking'); ?>
	</a>
	<hr />
	<?php

	$events = EDUAPI()->OData->Events->Search(
		'EventId,EventName,CourseName,InternalCourseName,OnDemand,StartDate,EndDate',
		'Bookings/any(b:b/Customer/CustomerId eq ' . $customer->CustomerId . ') and StatusId eq 1',
		'Bookings($expand=Participants($select=FirstName,LastName,Arrived,GradeName,Canceled,PriceNameId),UnnamedParticipants($select=PriceNameId,Quantity,Canceled);$filter=Customer/CustomerId eq ' . $customer->CustomerId . ' and NumberOfParticipants gt 0;$select=BookingId,Created,NumberOfParticipants,TotalPriceIncVat,TotalPriceExVat)'
	);

	$bookings = array();
	foreach ( $events['value'] as $ev ) {
		$_bookings = $ev['Bookings'];
		foreach ( $_bookings as $booking ) {
			unset( $ev['Bookings'] );
			$booking['Event'] = $ev;

			$booking['StartDate'] = $booking['Event']['StartDate'];

			$sorting_field = 'Created';

			if ( ! empty( $_REQUEST['booking-sort'] ) && in_array( $_REQUEST['booking-sort'], valid_sort ) ) {
				$sorting_field = $_REQUEST['booking-sort'];
			}

			$bookings[ $booking[ $sorting_field ] . '-' . $booking['BookingId'] ] = $booking;
		}
	}

	$sort_order = 'DESC';

	if ( ! empty( $_REQUEST['booking-sort-order'] ) && in_array( $_REQUEST['booking-sort-order'], valid_sort_order ) ) {
		$sort_order = $_REQUEST['booking-sort-order'];
	}

	switch ( $sort_order ) {
		case "ASC":
			ksort( $bookings );
			break;
		case "DESC":
			krsort( $bookings );
			break;
	}

	$currency               = EDU()->get_option( 'eduadmin-currency', 'SEK' );
	$selected_price_setting = EDU()->get_option( 'eduadmin-profile-priceType', 'IncVat' );

	?>
	<table class="myReservationsTable">
		<tr>
			<th class="edu-table-left table-booked-date"><?php echo esc_html_x( 'Booked', 'frontend', 'eduadmin-booking' ); ?></th>
			<th class="edu-table-left table-course"><?php echo esc_html_x( 'Course', 'frontend', 'eduadmin-booking' ); ?></th>
			<th class="edu-table-right table-dates"><?php echo esc_html_x( 'Dates', 'frontend', 'eduadmin-booking' ); ?></th>
			<th class="edu-table-right table-participants"><?php echo esc_html_x( 'Participants', 'frontend', 'eduadmin-booking' ); ?></th>
			<th class="edu-table-right table-price"><?php echo esc_html_x( 'Price', 'frontend', 'eduadmin-booking' ); ?></th>
		</tr>
		<?php
		if ( empty( $bookings ) ) {
			?>
			<tr>
				<td colspan="5" class="edu-table-center">
					<i><?php echo esc_html_x( 'No courses booked', 'frontend', 'eduadmin-booking' ); ?></i>
				</td>
			</tr>
			<?php
		} else {
			foreach ( $bookings as $book ) {
				$name = $book['Event']['EventName'] !== $book['Event']['CourseName'] ? $book['Event']['EventName'] : $book['Event']['CourseName'];
				if ( empty( $name ) ) {
					$name = $book['Event']['InternalCourseName'];
				}
				?>
				<tr data-bookingid="<?php echo esc_attr( $book['BookingId'] ); ?>"
				    data-course-data="<?php echo esc_attr( json_encode( $book ) ); ?>">
					<td class="table-booked-date">
						<?php echo wp_kses_post( get_display_date( $book['Created'], true ) ); ?>
					</td>
					<td class="table-course" title="<?php echo esc_attr( $name ); ?>">
						<?php echo esc_html( $name ); ?>
					</td>
					<td class="edu-table-right table-dates">
						<?php
						if ( $book['Event']['OnDemand'] ) {
							echo esc_html_x( 'On-demand', 'frontend', 'eduadmin-booking' );
						} else {
							echo wp_kses_post( get_old_start_end_display_date( $book['Event']['StartDate'], $book['Event']['EndDate'], true ) );
						}
						?>
					</td>
					<td class="edu-table-right table-participants">
						<?php echo esc_html( $book['NumberOfParticipants'] ); ?>
					</td>
					<td class="edu-table-right table-price">
						<?php echo esc_html( convert_to_money( ( 'IncVat' === $selected_price_setting ? $book['TotalPriceIncVat'] : $book['TotalPriceExVat'] ), $currency ) ); ?>
					</td>
				</tr>
				<?php
				if ( $book['NumberOfParticipants'] > 0 ) {
					?>
					<tr class="edu-participants-row">
						<td colspan="5">
							<table class="edu-event-participantList">
								<tr>
									<th class="edu-table-left edu-participantList-name"><?php echo esc_html_x( 'Participant name', 'frontend', 'eduadmin-booking' ); ?></th>
									<th class="edu-table-center edu-participantList-arrived"><?php echo esc_html_x( 'Arrived', 'frontend', 'eduadmin-booking' ); ?></th>
									<th class="edu-table-right edu-participantList-grade"><?php echo esc_html_x( 'Grade', 'frontend', 'eduadmin-booking' ); ?></th>
								</tr>
								<?php
								foreach ( $book['Participants'] as $participant ) {
									?>
									<tr>
										<td class="edu-table-left edu-participantList-name"><?php echo esc_html( $participant['FirstName'] . ' ' . $participant['LastName'] ); ?></td>
										<td class="edu-table-center edu-participantList-arrived"><?php echo true === $participant['Arrived'] ? '&#9745;' : '&#9744;'; ?></td>
										<td class="edu-table-right edu-participantList-grade"><?php echo( ! empty( $participant['GradeName'] ) ? esc_html( $participant['GradeName'] ) : '<i>' . esc_html_x( 'Not graded', 'frontend', 'eduadmin-booking' ) . '</i>' ); ?></td>
									</tr>
									<?php
								}

								if ( ! empty( $book['UnnamedParticipants'] ) ) {
									$number_of_unnamed_participants = 0;
									foreach ( $book['UnnamedParticipants'] as $unnamed_booking ) {
										$number_of_unnamed_participants += $unnamed_booking['Quantity'];
									}
									?>
									<tr>
										<td class="edu-table-left">
											<em><?php echo sprintf(
													_n( '%s unnamed participant', '%s unnamed participants', $number_of_unnamed_participants, 'eduadmin-booking' ),
													number_format_i18n( $number_of_unnamed_participants )
												); ?></em>
										</td>
										<td class="edu-table-center">&nbsp;</td>
										<td class="edu-table-right">&nbsp;</td>
									</tr>
									<?php
								}
								?>
							</table>
							<button class="cta-btn export-button"
							        onclick="eduGlobalMethods.GetBookingExport(<?php echo esc_js( $book['BookingId'] ); ?>);">
								<?php echo esc_html_x( 'Export to Excel', 'frontend', 'eduadmin-booking' ); ?>
							</button>
						</td>
					</tr>
					<?php
				}
			}
		}
		?>
	</table>
	<?php require_once 'login-tab-footer.php'; ?>
</div>
