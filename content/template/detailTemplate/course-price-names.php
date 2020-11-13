<?php
$api_key = get_option( 'eduadmin-api-key' );
ob_start();

if ( ! $api_key || empty( $api_key ) ) {
	return 'Please complete the configuration: <a href="' . admin_url() . 'admin.php?page=eduadmin-settings">EduAdmin - Api Authentication</a>';
} else {
	$sorting         = array();
	$custom_order    = null;
	$custom_order_by = null;
	if ( ! empty( $attributes['order'] ) ) {
		$custom_order = $attributes['order'];
	}

	if ( ! empty( $attributes['orderby'] ) ) {
		$custom_order_by = $attributes['orderby'];
	}

	if ( null !== $custom_order_by ) {
		$orderby   = explode( ' ', $custom_order );
		$sortorder = explode( ' ', $custom_order_by );
		foreach ( $orderby as $od => $v ) {
			if ( isset( $sortorder[ $od ] ) ) {
				$or = $sortorder[ $od ];
			} else {
				$or = 'asc';
			}

			$sorting[] = $v . ' ' . strtolower( $or );
		}
	} else {
		$sorting[] = 'PriceNameId asc';
	}

	$edo = EDU()->get_transient( 'eduadmin-objectpublicpricename', function() use ( $course_id, $sorting ) {
		return EDUAPI()->OData->CourseTemplates->GetItem(
			$course_id,
			'CourseTemplateId,ParticipantVat',
			'PriceNames($filter=PublicPriceName;$orderby=' . join( ',', $sorting ) . ')'
		);
	}, 10, $course_id );

	$price_names = $edo['PriceNames'];

	if ( ! empty( $attributes['numberofprices'] ) ) {
		$price_names = array_slice( $price_names, 0, $attributes['numberofprices'], true );
	}

	$currency = get_option( 'eduadmin-currency', 'SEK' );
	?>
	<div class="eventInformation">
		<h3>
			<?php echo esc_html_x( 'Prices', 'frontend', 'eduadmin-booking' ); ?>
		</h3>
		<?php
		foreach ( $price_names as $price ) {
			echo esc_html( sprintf( '%1$s: %2$s', $price['PriceNameDescription'], edu_get_price( $price['Price'], $edo['ParticipantVat'] ) ) );
			echo '<br />';
		}
		?>
		<hr />
	</div>
	<?php
}

return ob_get_clean();
