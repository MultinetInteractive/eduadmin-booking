<?php

$regions_with_public_locations = array();
foreach ( $regions['value'] as $region ) {
	foreach ( $region['Locations'] as $location ) {
		if ( $location['PublicLocation'] ) {
			$regions_with_public_locations[] = $region;
			break;
		}
	}
}

foreach ( $regions_with_public_locations as $re ) {
	?>
	<a class="edu-regionbutton neutral-btn<?php echo( ! empty( $_REQUEST['edu-region'] ) && sanitize_text_field( $_REQUEST['edu-region'] ) === make_slugs( $re['RegionName'] ) ? " active" : "" ); ?>" href="?edu-region=<?php echo esc_attr( make_slugs( $re['RegionName'] ) ) . edu_get_query_string( '&', array( 'edu-region' ) ); ?>"><?php echo esc_html( $re['RegionName'] ); ?></a>
	<?php
}

if ( ! empty( $_REQUEST['edu-region'] ) ) {
	?>
	<a class="edu-regionbutton neutral-btn" href="./"><?php esc_html_e( 'All regions', 'eduadmin-booking' ); ?></a>
	<?php
}
