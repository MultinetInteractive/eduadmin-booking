<?php
function edu_render_news_page() {
	$t = EDU()->start_timer( __METHOD__ );

	?>
	<div class="eduadmin wrap">
		<h2><?php echo esc_html( sprintf( _x( 'EduAdmin settings - %s', 'backend', 'eduadmin-booking' ), _x( 'News', 'backend', 'eduadmin-booking' ) ) ); ?></h2>

		<div class="block">
			<?php
			$news = EDU()->get_news();
			foreach ( $news as $item ) {
				edu_render_news_item( $item );
			}
			?>
		</div>
	</div>
	<?php

	EDU()->stop_timer( $t );
}

function edu_render_news_item( $item ) {
	if ( $item['obsolete'] ) {
		return;
	}
	?>
<div class="news-item<?php echo $item["UpdateRecommended"] ? " update-recommended" : ""; ?>">        <h3>
		<u><?php echo esc_html( $item["newsHeader"] ); ?></u> -
		<i><?php echo edu_get_timezoned_date( "Y-m-d", $item['liveDate'] ); ?></i></h3>
	<hr />
	<?php echo wp_kses( $item['newsBody'], array(
		'p'  => array(),
		'ul' => array(),
		'li' => array(),
	) ); ?><?php
	if ( $item["UpdateRecommended"] ) {
		?>
		<hr />
		<h3><?php echo esc_html_x( 'It is highly recommended that you update to the latest version of the plugin.', 'backend', 'eduadmin-booking' ); ?></h3>
		<?php echo sprintf( esc_html_x( 'Your current version: %s Lowest recommended version: %s', 'backend', 'eduadmin-booking' ), EDU()->version, $item['RecommendedVersion'] ); ?>
		</div>
		<?php
	}
}
