<?php
$eds = $subjects;

$edl = $levels;

$filter_courses = array();

$category_id = null;
if ( ! empty( $attributes['category'] ) ) {
	$category_id = $attributes['category'];
}

if ( ! empty( $attributes['categorydeep'] ) ) {
	$category_id = "deep-" . $attributes['categorydeep'];
}

$show_images = EDU()->is_checked( 'eduadmin-showCourseImage', true );

if ( ! empty( $attributes['showimages'] ) ) {
	$show_images = true;
}

if ( ! empty( $attributes['hideimages'] ) ) {
	$show_images = false;
}

$custom_order_by       = null;
$custom_order_by_order = null;
if ( ! empty( $attributes['orderby'] ) ) {
	$custom_order_by = $attributes['orderby'];
}

if ( ! empty( $attributes['order'] ) ) {
	$custom_order_by_order = $attributes['order'];
}

$custom_mode = null;
if ( ! empty( $attributes['mode'] ) ) {
	$custom_mode = $attributes['mode'];
}

$show_ondemand = false;
if ( ! empty( $attributes['ondemand'] ) ) {
	$show_ondemand = $attributes['ondemand'];
}

if ( null !== $custom_mode ) {
	if ( 'event' === $custom_mode ) {
		$str = include $attributes['template'] . '_listEvents.php';
		echo $str;
	} elseif ( 'course' === $custom_mode ) {
		$str = include $attributes['template'] . '_listCourses.php';
		echo $str;
	}
} else {
	if ( $show_events ) {
		$str = include $attributes['template'] . '_listEvents.php';
		echo $str;
	} elseif ( ! $show_events ) {
		$str = include $attributes['template'] . '_listCourses.php';
		echo $str;
	}
}
