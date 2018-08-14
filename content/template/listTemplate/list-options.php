<?php
$allow_region_search   = get_option( 'eduadmin-allowRegionSearch', false );
$allow_location_search = get_option( 'eduadmin-allowLocationSearch', true );
$allow_subject_search  = get_option( 'eduadmin-allowSubjectSearch', false );
$allow_category_search = get_option( 'eduadmin-allowCategorySearch', false );
$allow_level_search    = get_option( 'eduadmin-allowLevelSearch', false );

$show_search        = $attributes['showsearch'];
$show_more_number   = $attributes['showmore'];
$show_city          = $attributes['showcity'];
$show_book_btn      = $attributes['showbookbtn'];
$show_read_more_btn = $attributes['showreadmorebtn'];

$filter_city = $attributes['filtercity'];

$search_visible = $show_search == true || ( $attributes['hidesearch'] == false || $attributes['hidesearch'] == null );

$subjects = get_transient( 'eduadmin-subjects' . '__' . EDU()->version );
if ( ! $subjects ) {
	$subjects = EDUAPI()->OData->Subjects->Search(
		null,
		null,
		null,
		'SubjectName asc'
	)['value'];
	set_transient( 'eduadmin-subjects' . '__' . EDU()->version, $subjects, DAY_IN_SECONDS );
}

$distinct_subjects = array();
foreach ( $subjects as $subj ) {
	if ( ! key_exists( $subj['SubjectId'], $distinct_subjects ) ) {
		$distinct_subjects[ $subj['SubjectId'] ] = $subj['SubjectName'];
	}
}

$regions = get_transient('eduadmin-regions' . '__' . EDU()->version);
if(!$regions){
	$regions = EDUAPI()->OData->Regions->Search(
		null,
		null,
		'Locations($filter=PublicLocation;$expand=LocationAddresses;)',
		'RegionName asc'
	);
	set_transient( 'eduadmin-regions' . '__' . EDU()->version, $regions, DAY_IN_SECONDS );
}

$addresses = get_transient( 'eduadmin-locations' . '__' . EDU()->version );
if ( ! $addresses ) {
	$addresses = EDUAPI()->OData->Locations->Search(
		'LocationId,City',
		'PublicLocation'
	)['value'];
	set_transient( 'eduadmin-locations' . '__' . EDU()->version, $addresses, DAY_IN_SECONDS );
}

$show_events = get_option( 'eduadmin-showEventsInList', false );

$categories = get_transient( 'eduadmin-categories' . '__' . EDU()->version );
if ( ! $categories ) {
	$categories = EDUAPI()->OData->Categories->Search(
		'CategoryId,CategoryName',
		'ShowOnWeb'
	)['value'];

	set_transient( 'eduadmin-categories' . '__' . EDU()->version, $categories, DAY_IN_SECONDS );
}

$levels = get_transient( 'eduadmin-levels' . '__' . EDU()->version );
if ( ! $levels ) {
	$levels = EDUAPI()->OData->CourseLevels->Search()['value'];
	set_transient( 'eduadmin-levels' . '__' . EDU()->version, $levels, DAY_IN_SECONDS );
}
