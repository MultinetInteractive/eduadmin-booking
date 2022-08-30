<?php
global $wp_query;

if ( ! empty( $wp_query->query_vars['courseId'] ) ) {
	$course_id = $wp_query->query_vars['courseId'];
} elseif ( ! empty( $attributes['courseid'] ) ) {
	$course_id = $attributes['courseid'];
} else {
	$course_id = null;
}

if ( $course_id == null ) {
	return;
}

$group_by_city       = EDU()->is_checked( 'eduadmin-groupEventsByCity' );
$group_by_city_class = '';

$fetch_months = EDU()->get_option( 'eduadmin-monthsToFetch', 6 );
if ( ! is_numeric( $fetch_months ) ) {
	$fetch_months = 6;
}

$edo = EDUAPIHelper()->GetCourseDetailInfo( $course_id, $fetch_months, $group_by_city );

$organization = EDUAPIHelper()->GetOrganization();

$selected_course = false;
$name            = '';
if ( $edo ) {
	$selected_course = json_decode( $edo, true );
	$name            = ( ! empty( $selected_course['CourseName'] ) ?
		$selected_course['CourseName'] :
		$selected_course['InternalCourseName'] );

	$is_ondemand = $selected_course['OnDemand'];

	if ( $is_ondemand ) {
		$selected_course = json_decode( EDUAPIHelper()->GetOnDemandCourseDetailInfo( $course_id, $group_by_city ), true );
	}

	$description = wp_strip_all_tags(
		str_replace(
			[ "<br />", "<br>", "</p>" ],
			[ "&#xA;", "&#xA;", "</p>&#xA;&#xA;" ],
			! empty( $selected_course['CourseDescriptionShort'] ) ?
				$selected_course['CourseDescriptionShort'] :
				$selected_course['CourseDescription']
		)
	);

	if ( strlen( $description ) == 0 ) {
		return;
	}

	$surl     = get_home_url();
	$cat      = EDU()->get_option( 'eduadmin-rewriteBaseUrl' );
	$base_url = $surl . '/' . $cat;

	?>

	<meta name="twitter:card" content="summary">
	<meta property="og:type" content="website" />
	<meta property="og:site_name" content="<?php echo esc_attr( get_bloginfo( 'name' ) ); ?>" />
	<meta property="og:title" content="<?php echo esc_attr( $name ); ?>" />
	<meta name="twitter:title" content="<?php echo esc_attr( $name ); ?>" />
	<meta property="og:url"
	      content="<?php echo $base_url; ?>/<?php echo make_slugs( $name ); ?>__<?php echo $selected_course['CourseTemplateId']; ?>/<?php echo edu_get_query_string(); ?>" />
	<meta property="og:description" content="<?php echo esc_attr( $description ); ?>" />
	<meta name="twitter:description" content="<?php echo esc_attr( $description ); ?>" />
	<?php if ( ! empty( $selected_course['ImageUrl'] ) ) : ?>
		<meta property="og:image" content="<?php echo esc_attr( $selected_course['ImageUrl'] ); ?>" />
		<meta name="twitter:image" content="<?php echo esc_attr( $selected_course['ImageUrl'] ); ?>" />
	<?php endif; ?><?php if ( ! empty( $organization['LogoUrl'] ) ) : ?>
		<meta property="og:image" content="<?php echo esc_attr( $organization['LogoUrl'] ); ?>" />
	<?php endif; ?><?php
}
