<?php
$allow_region_search   = EDU()->is_checked( 'eduadmin-allowRegionSearch', false );
$allow_location_search = EDU()->is_checked( 'eduadmin-allowLocationSearch', true );
$allow_subject_search  = EDU()->is_checked( 'eduadmin-allowSubjectSearch', false );
$allow_category_search = EDU()->is_checked( 'eduadmin-allowCategorySearch', false );
$allow_level_search    = EDU()->is_checked( 'eduadmin-allowLevelSearch', false );

$show_search        = $attributes['showsearch'];
$show_more_number   = $attributes['showmore'];
$show_city          = $attributes['showcity'];
$show_book_btn      = $attributes['showbookbtn'];
$show_read_more_btn = $attributes['showreadmorebtn'];

$filter_city = $attributes['filtercity'];

$search_visible = $show_search == true || ( $attributes['hidesearch'] == false || $attributes['hidesearch'] == null );

$subjects = EDU()->get_transient( 'eduadmin-subjects', function() {
	return EDUAPI()->OData->Subjects->Search(
		'SubjectId,SubjectName',
		null,
		null,
		'SubjectName asc'
	);
}, DAY_IN_SECONDS );

$distinct_subjects = array();
if ( isset( $subjects['value'] ) ) {
	foreach ( $subjects['value'] as $subj ) {
		if ( ! key_exists( (string) $subj['SubjectId'], $distinct_subjects ) ) {
			$distinct_subjects[ (string) $subj['SubjectId'] ] = $subj['SubjectName'];
		}
	}
}

$regions = EDUAPIHelper()->GetRegions();

$addresses = EDU()->get_transient( 'eduadmin-locations', function() {
	return EDUAPI()->OData->Locations->Search(
		'LocationId,City',
		'PublicLocation'
	);
}, DAY_IN_SECONDS );

$show_events = EDU()->is_checked( 'eduadmin-showEventsInList', false );

$categories = EDU()->get_transient( 'eduadmin-categories', function() {
	return EDUAPI()->OData->Categories->Search(
		'CategoryId,CategoryName',
		'ShowOnWeb'
	);
}, DAY_IN_SECONDS );

$levels = EDU()->get_transient( 'eduadmin-levels', function() {
	return EDUAPI()->OData->CourseLevels->Search(
		'CourseLevelId,Name'
	);
}, DAY_IN_SECONDS );
