<?php
defined( 'ABSPATH' ) || die( 'This plugin must be run within the scope of WordPress.' );
if ( ! function_exists( 'normalize_empty_atts' ) ) {
	function normalize_empty_atts( $atts ) {
		if ( empty( $atts ) ) {
			return $atts;
		}
		foreach ( $atts as $attribute => $value ) {
			if ( is_int( $attribute ) ) {
				$atts[ strtolower( $value ) ] = true;
				unset( $atts[ $attribute ] );
			}
		}

		return $atts;
	}
}

function eduadmin_get_list_view( $attributes ) {
	$t                 = EDU()->start_timer( __METHOD__ );
	$selected_template = EDU()->get_option( 'eduadmin-listTemplate', 'template_A' );

	$style_version = filemtime( EDUADMIN_PLUGIN_PATH . '/content/style/compiled/frontend/listView.css' );
	wp_register_style(
		'eduadmin_frontend_list',
		plugins_url( 'content/style/compiled/frontend/listView.css', dirname( __FILE__ ) ),
		array( 'eduadmin_frontend_style' ),
		date_version( $style_version )
	);
	wp_enqueue_style( 'eduadmin_frontend_list' );

	$attributes = shortcode_atts(
		array(
			'template'        => $selected_template,
			'category'        => null,
			'subject'         => null,
			'subjectid'       => null,
			'hidesearch'      => false,
			'onlyevents'      => false,
			'onlyempty'       => false,
			'numberofevents'  => null,
			'mode'            => null,
			'orderby'         => null,
			'order'           => null,
			'showsearch'      => null,
			'showmore'        => null,
			'showcity'        => true,
			'showbookbtn'     => true,
			'showreadmorebtn' => true,
			'city'            => null,
			'courselevel'     => null,
			'searchCourse'    => null,
			'filtercity'      => null,
			'hideimages'      => null,
			'showimages'      => null,
			'categorydeep'    => null,
			'ondemand'        => false,
			'allcourses'      => false,
		),
		normalize_empty_atts( $attributes ),
		'eduadmin-listview'
	);
	$str        = include EDUADMIN_PLUGIN_PATH . '/content/template/listTemplate/' . $attributes['template'] . '.php';
	EDU()->stop_timer( $t );

	return $str;
}

function eduadmin_get_object_interest( $attributes ) {
	$t          = EDU()->start_timer( __METHOD__ );
	$attributes = shortcode_atts(
		array(
			'courseid' => null,
		),
		normalize_empty_atts( $attributes ),
		'eduadmin-objectinterest'
	);
	$str        = include EDUADMIN_PLUGIN_PATH . '/content/template/interestRegTemplate/interest-reg-object.php';
	EDU()->stop_timer( $t );

	return $str;
}

function eduadmin_get_event_interest( $attributes ) {
	$t          = EDU()->start_timer( __METHOD__ );
	$attributes = shortcode_atts(
		array(),
		normalize_empty_atts( $attributes ),
		'eduadmin-eventinterest'
	);
	$str        = include EDUADMIN_PLUGIN_PATH . '/content/template/interestRegTemplate/interest-reg-event.php';
	EDU()->stop_timer( $t );

	return $str;
}

function eduadmin_get_detail_view( $attributes ) {
	$t                 = EDU()->start_timer( __METHOD__ );
	$selected_template = EDU()->get_option( 'eduadmin-detailTemplate', 'template_A' );

	$style_version = filemtime( EDUADMIN_PLUGIN_PATH . '/content/style/compiled/frontend/detailView.css' );
	wp_register_style(
		'eduadmin_frontend_detail',
		plugins_url( 'content/style/compiled/frontend/detailView.css', dirname( __FILE__ ) ),
		array( 'eduadmin_frontend_style' ),
		date_version( $style_version )
	);
	wp_enqueue_style( 'eduadmin_frontend_detail' );

	$attributes                  = shortcode_atts(
		array(
			'template'       => $selected_template,
			'courseid'       => null,
			'customtemplate' => null,
			'showmore'       => null,
			'hide'           => null,
		),
		normalize_empty_atts( $attributes ),
		'eduadmin-detailview'
	);
	EDU()->session['checkEmail'] = null;
	EDU()->session['needsLogin'] = null;
	unset( EDU()->session['checkEmail'] );
	unset( EDU()->session['needsLogin'] );
	if ( isset( EDU()->session['eduadmin-loginUser']->NewCustomer ) ) {
		unset( EDU()->session['eduadmin-loginUser']->NewCustomer );
	}

	$use_eduadmin_form = EDU()->is_checked( 'eduadmin-useBookingFormFromApi' );

	EDU()->session->regenerate_id( true );
	if ( empty( $attributes['customtemplate'] ) || 1 !== intval( $attributes['customtemplate'] ) ) {
		$str = include_once EDUADMIN_PLUGIN_PATH . '/content/template/detailTemplate/' . $attributes['template'] . '.php';
		EDU()->stop_timer( $t );

		return $str;
	}

	EDU()->stop_timer( $t );

	return '';
}

function eduadmin_get_course_public_pricename( $attributes ) {
	$t = EDU()->start_timer( __METHOD__ );
	global $wp_query;
	$attributes = shortcode_atts(
		array(
			'courseid'       => null,
			'orderby'        => null,
			'order'          => null,
			'numberofprices' => null,
		),
		normalize_empty_atts( $attributes ),
		'eduadmin_coursepublicpricename'
	);

	if ( empty( $attributes['courseid'] ) || $attributes['courseid'] <= 0 ) {
		if ( isset( $wp_query->query_vars['courseId'] ) ) {
			$course_id = $wp_query->query_vars['courseId'];
		} else {
			EDU()->stop_timer( $t );

			return 'Missing courseId in attributes';
		}
	} else {
		$course_id = $attributes['courseid'];
	}
	EDU()->stop_timer( $t );

	return include_once EDUADMIN_PLUGIN_PATH . '/content/template/detailTemplate/course-price-names.php';
}

function eduadmin_get_booking_view( $attributes ) {
	$t = EDU()->start_timer( __METHOD__ );
	if ( ! defined( 'DONOTCACHEPAGE' ) ) {
		define( 'DONOTCACHEPAGE', true );
	}

	$style_version = filemtime( EDUADMIN_PLUGIN_PATH . '/content/style/compiled/frontend/bookingPage.css' );
	wp_register_style(
		'eduadmin_frontend_booking',
		plugins_url( 'content/style/compiled/frontend/bookingPage.css', dirname( __FILE__ ) ),
		array( 'eduadmin_frontend_style' ),
		date_version( $style_version )
	);
	wp_enqueue_style( 'eduadmin_frontend_booking' );

	$selected_template = EDU()->get_option( 'eduadmin-bookingTemplate', 'template_A' );
	$attributes        = shortcode_atts(
		array(
			'template'               => $selected_template,
			'courseid'               => null,
			'hideinvoiceemailfield'  => null,
			'showinvoiceinformation' => null,
		),
		normalize_empty_atts( $attributes ),
		'eduadmin-bookingview'
	);
	if ( ! EDU()->is_checked( 'eduadmin-useLogin', false ) || ( isset( EDU()->session['eduadmin-loginUser'] ) && ( ( isset( EDU()->session['eduadmin-loginUser']->Contact->PersonId ) && 0 !== EDU()->session['eduadmin-loginUser']->Contact->PersonId ) || isset( EDU()->session['eduadmin-loginUser']->NewCustomer ) ) ) ) {
		$str = include_once EDUADMIN_PLUGIN_PATH . '/content/template/bookingTemplate/' . $attributes['template'] . '.php';
	} else {
		$str = include_once EDUADMIN_PLUGIN_PATH . '/content/template/bookingTemplate/login-view.php';
	}
	EDU()->stop_timer( $t );

	return $str;
}

function eduadmin_get_detailinfo( $attributes ) {
	$t = EDU()->start_timer( __METHOD__ );
	global $wp_query;
	$attributes = shortcode_atts(
		array(
			'courseid'                  => null,
			'coursename'                => null,
			'coursepublicname'          => null,
			'courselevel'               => null,
			'courseimage'               => null,
			'courseimagetext'           => null,
			'coursedays'                => null,
			'coursestarttime'           => null,
			'courseendtime'             => null,
			'courseprice'               => null,
			'eventprice'                => null,
			'coursedescriptionshort'    => null,
			'coursedescription'         => null,
			'coursegoal'                => null,
			'coursetarget'              => null,
			'courseprerequisites'       => null,
			'courseafter'               => null,
			'coursequote'               => null,
			'courseeventlist'           => null,
			'showmore'                  => null,
			'courseattributeid'         => null,
			'courseattributehasvalue'   => null,
			'courseeventlistfiltercity' => null,
			'pagetitlejs'               => null,
			'bookurl'                   => null,
			'courseinquiryurl'          => null,
			'order'                     => null,
			'orderby'                   => null,
			'ondemand'                  => false,
			'allcourses'                => false,
		),
		normalize_empty_atts( $attributes ),
		'eduadmin-detailinfo'
	);

	$ret_str = '';

	if ( empty( $attributes['courseid'] ) || str_replace( array(
		                                                      '&#8221;',
		                                                      '&#8243;',
	                                                      ), '', $attributes['courseid'] ) <= 0 ) {
		if ( isset( $wp_query->query_vars['courseId'] ) ) {
			$course_id = $wp_query->query_vars['courseId'];
		} else {
			EDU()->stop_timer( $t );

			return 'Missing courseid in attributes';
		}
	} else {
		$course_id = str_replace(
			array(
				'&#8221;',
				'&#8243;',
			),
			'',
			$attributes['courseid']
		);
	}

	$api_key = EDU()->get_option( 'eduadmin-api-key' );

	if ( empty( $api_key ) ) {
		EDU()->stop_timer( $t );

		return 'Please complete the configuration: <a href="' . admin_url() . 'admin.php?page=eduadmin-settings">EduAdmin - Api Authentication</a>';
	} else {
		$fetch_months  = EDU()->get_option( 'eduadmin-monthsToFetch', 6 );
		$group_by_city = EDU()->is_checked( 'eduadmin-groupEventsByCity', false );
		if ( ! is_numeric( $fetch_months ) ) {
			$fetch_months = 6;
		}

		if ( ! $attributes['ondemand'] ) {
			$edo = EDUAPIHelper()->GetCourseDetailInfo( $course_id, $fetch_months, $group_by_city );
		} else {
			$edo = EDUAPIHelper()->GetOnDemandCourseDetailInfo( $course_id, $group_by_city );
		}

		$selected_course = false;

		if ( ! empty( $edo ) ) {
			$selected_course = json_decode( $edo, true );
		}

		if ( ! is_array( $selected_course ) ) {
			EDU()->stop_timer( $t );

			return 'Course with ID ' . $course_id . ' could not be found.';
		} else {
			if ( isset( $selected_course["@error"] ) ) {
				EDU()->stop_timer( $t );

				return $selected_course["@error"];
			}

			$org = EDUAPIHelper()->GetOrganization();

			if ( isset( $attributes['coursename'] ) ) {
				$ret_str .= $selected_course['InternalCourseName'];
			}
			if ( isset( $attributes['coursepublicname'] ) ) {
				$ret_str .= $selected_course['CourseName'];
			}
			if ( isset( $attributes['courseimage'] ) ) {
				$ret_str .= $selected_course['ImageUrl'];
			}
			if ( isset( $attributes['coursedays'] ) ) {
				/* translators: 1: Number of days */
				$ret_str .= sprintf( _n( '%1$d day', '%1$d days', $selected_course['Days'], 'eduadmin-booking' ), $selected_course['Days'] );
			}
			if ( isset( $attributes['coursestarttime'] ) ) {
				$ret_str .= $selected_course['StartTime'];
			}
			if ( isset( $attributes['courseendtime'] ) ) {
				$ret_str .= $selected_course['EndTime'];
			}
			if ( isset( $attributes['coursedescriptionshort'] ) ) {
				$ret_str .= $selected_course['CourseDescriptionShort'];
			}
			if ( isset( $attributes['coursedescription'] ) ) {
				$ret_str .= $selected_course['CourseDescription'];
			}
			if ( isset( $attributes['coursegoal'] ) ) {
				$ret_str .= $selected_course['CourseGoal'];
			}
			if ( isset( $attributes['coursetarget'] ) ) {
				$ret_str .= $selected_course['TargetGroup'];
			}
			if ( isset( $attributes['courseprerequisites'] ) ) {
				$ret_str .= $selected_course['Prerequisites'];
			}
			if ( isset( $attributes['courseafter'] ) ) {
				$ret_str .= $selected_course['CourseAfter'];
			}
			if ( isset( $attributes['coursequote'] ) ) {
				$ret_str .= $selected_course['Quote'];
			}
			if ( isset( $attributes['coursesubject'] ) ) {
				$subject_names = array();
				foreach ( $selected_course['Subjects'] as $subj ) {
					$subject_names[] = $subj['SubjectName'];
				}
				$ret_str .= join( ', ', $subject_names );
			}

			if ( isset( $attributes['courselevel'] ) ) {
				if ( ! empty( $selected_course['CourseLevelId'] ) ) {
					$course_level = EDUAPI()->OData->CourseLevels->GetItem( $selected_course['CourseLevelId'] );
					if ( ! empty( $course_level ) ) {
						$ret_str .= $course_level['Name'];
					}
				}
			}

			if ( isset( $attributes['courseattributeid'] ) ) {
				$attrid = intval( $attributes['courseattributeid'] );
				foreach ( $selected_course['CustomFields'] as $cf ) {
					if ( $cf['CustomFieldId'] === $attrid ) {
						switch ( $cf['CustomFieldType'] ) {
							case 'Text':
							case 'Html':
							case 'Textarea':
								$ret_str .= wp_kses_post( $cf['CustomFieldValue'] );
								break;
							case 'Dropdown':
								$ret_str .= wp_kses_post( $cf['CustomFieldAlternativeValue'] );
								break;
							case 'Checkbox':
								$ret_str .= wp_kses_post( $cf['CustomFieldChecked'] ?
									                          _x( "Checked", 'frontend', 'eduadmin-booking' ) :
									                          _x( "Not Checked", 'frontend', 'eduadmin-booking' ) );
								break;
						}
						break;
					}
				}
			}

			if ( isset( $attributes['courseattributehasvalue'] ) ) {
				$attrid = intval( $attributes['courseattributehasvalue'] );
				foreach ( $selected_course['CustomFields'] as $cf ) {
					if ( $cf['CustomFieldId'] === $attrid ) {
						switch ( $cf['CustomFieldType'] ) {
							case 'Text':
							case 'Html':
							case 'Textarea':
								return strlen( $cf['CustomFieldValue'] ) > 0;
							case 'Dropdown':
								return strlen( $cf['CustomFieldAlternativeValue'] ) > 0;
							case 'Checkbox':
								return $cf['CustomFieldChecked'];
						}
						break;
					}
				}

				return false;
			}

			if ( isset( $attributes['courseprice'] ) ) {
				$prices = array();

				foreach ( $selected_course['PriceNames'] as $pn ) {
					$prices[ (string) $pn['PriceNameId'] ] = $pn;
				}

				if ( 1 === count( $prices ) ) {
					$ret_str .= '<div class="pricename"><span class="pricename-price">' . esc_html( edu_get_price( current( $prices )['Price'], $selected_course['ParticipantVat'], $attributes['courseprice'] ) ) . "</span></div>\n";
				} else {
					foreach ( $prices as $price ) {
						$ret_str .= wp_kses_post( sprintf( '<div class="pricename"><span class="pricename-description">%1$s</span> <span class="pricename-price">%2$s</span></div>', $price['PriceNameDescription'], edu_get_price( $price['Price'], $selected_course['ParticipantVat'], $attributes['courseprice'] ) ) ) . "\n";
					}
				}
			}

			if ( isset( $attributes['eventprice'] ) ) {
				$events = $selected_course['Events'];
				$prices = array();

				foreach ( $events as $e ) {
					foreach ( $e['PriceNames'] as $pn ) {
						$prices[ (string) $pn['PriceNameId'] ] = $pn;
					}
				}

				if ( 1 === count( $prices ) ) {
					$ret_str .= '<div class="pricename"><span class="pricename-price">' . esc_html( edu_get_price( current( $prices )['Price'], $selected_course['ParticipantVat'], $attributes['eventprice'] ) ) . "</span></div>\n";
				} else {
					foreach ( $prices as $price ) {
						$ret_str .= wp_kses_post( sprintf( '<div class="pricename"><span class="pricename-description">%1$s</span> <span class="pricename-price">%2$s</span></div>', $price['PriceNameDescription'], edu_get_price( $price['Price'], $edo['ParticipantVat'], $attributes['eventprice'] ) ) ) . "\n";
					}
				}
			}

			if ( isset( $attributes['pagetitlejs'] ) ) {
				$new_title = $selected_course['CourseName'];

				$ret_str .= '
				<script type="text/javascript">
				(function() {
					var title = document.title;
					document.title = \'' . esc_js( $new_title ) . ' | \' + title;
				})();
				</script>';
			}

			if ( isset( $attributes['bookurl'] ) ) {
				$surl     = get_home_url();
				$cat      = EDU()->get_option( 'eduadmin-rewriteBaseUrl' );
				$base_url = $surl . '/' . $cat;

				$name = ( ! empty( $selected_course['CourseName'] ) ? $selected_course['CourseName'] : $selected_course['InternalCourseName'] );

				$ret_str .= esc_url( $base_url . '/' . make_slugs( $name ) . '__' . $selected_course['CourseTemplateId'] . '/book/' . edu_get_query_string() . '&_=' . time() );
			}

			if ( isset( $attributes['courseinquiryurl'] ) ) {
				$surl     = get_home_url();
				$cat      = EDU()->get_option( 'eduadmin-rewriteBaseUrl' );
				$base_url = $surl . '/' . $cat;

				$name = ( ! empty( $selected_course['CourseName'] ) ? $selected_course['CourseName'] : $selected_course['InternalCourseName'] );

				$ret_str .= esc_url( $base_url . '/' . make_slugs( $name ) . '__' . $selected_course['CourseTemplateId'] . '/interest/' . edu_get_query_string() . '&_=' . time() );
			}

			if ( isset( $attributes['courseeventlist'] ) ) {
				$events = $selected_course['Events'];

				if ( ! empty( $attributes['courseeventlistfiltercity'] ) ) {
					$_city  = $attributes['courseeventlistfiltercity'];
					$events = array_filter( $events, function( $_event ) use ( $_city ) {
						return $_event['City'] === $_city;
					} );
				}

				$group_by_city_class = '';
				if ( $group_by_city ) {
					$group_by_city_class = ' noCity';
				}

				$custom_order_by       = null;
				$custom_order_by_order = null;
				if ( ! empty( $attributes['orderby'] ) ) {
					$custom_order_by = $attributes['orderby'];
				}

				if ( ! empty( $attributes['order'] ) ) {
					$custom_order_by_order = $attributes['order'];
				}

				if ( null !== $custom_order_by ) {
					$orderby   = explode( ' ', $custom_order_by );
					$sortorder = explode( ' ', $custom_order_by_order );
					foreach ( $orderby as $od => $v ) {
						if ( isset( $sortorder[ $od ] ) ) {
							$or = $sortorder[ $od ];
						} else {
							$or = 'ASC';
						}
					}
				}

				$surl = get_home_url();
				$cat  = EDU()->get_option( 'eduadmin-rewriteBaseUrl' );

				$last_city = '';

				$show_more        = isset( $attributes['showmore'] ) && ! empty( $attributes['showmore'] ) ? $attributes['showmore'] : -1;
				$spot_left_option = EDU()->get_option( 'eduadmin-spotsLeft', 'exactNumbers' );
				$always_few_spots = EDU()->get_option( 'eduadmin-alwaysFewSpots', '3' );
				$spot_settings    = EDU()->get_option( 'eduadmin-spotsSettings', "1-5\n5-10\n10+" );

				$base_url = $surl . '/' . $cat;
				$name     = ( ! empty( $selected_course['CourseName'] ) ? $selected_course['CourseName'] : $selected_course['InternalCourseName'] );

				$object_interest_page      = EDU()->get_option( 'eduadmin-interestObjectPage' );
				$allow_interest_reg_object = EDU()->is_checked( 'eduadmin-allowInterestRegObject', false );

				$event_interest_page      = EDU()->get_option( 'eduadmin-interestEventPage' );
				$allow_interest_reg_event = EDU()->is_checked( 'eduadmin-allowInterestRegEvent', false );

				$use_eduadmin_form = EDU()->is_checked( 'eduadmin-useBookingFormFromApi' );

				$ret_str .= '<div class="eduadmin">';
				$ret_str .= '<div class="event-table eventDays" data-eduwidget="eventlist" ';
				$ret_str .= 'data-objectid="' . esc_attr( $selected_course['CourseTemplateId'] );
				$ret_str .= '" data-spotsleft="' . esc_attr( $spot_left_option );
				$ret_str .= '" data-showmore="' . esc_attr( $show_more );
				$ret_str .= '" data-groupbycity="' . esc_attr( $group_by_city ) . '"';
				$ret_str .= '" data-spotsettings="' . esc_attr( $spot_settings ) . '"';
				$ret_str .= '" data-fewspots="' . esc_attr( $always_few_spots ) . '"';
				$ret_str .= ( ! empty( $attributes['courseeventlistfiltercity'] ) ? ' data-city="' . esc_attr( $attributes['courseeventlistfiltercity'] ) . '"' : '' );
				$ret_str .= ' data-fetchmonths="' . esc_attr( $fetch_months ) . '"';
				$ret_str .= ( isset( $_REQUEST['eid'] ) ? ' data-event="' . intval( $_REQUEST['eid'] ) . '"' : '' );
				$ret_str .= ' data-order="' . esc_attr( $custom_order_by ) . '"';
				$ret_str .= ' data-orderby="' . esc_attr( $custom_order_by_order ) . '"';
				$ret_str .= ' data-showvenue="' . esc_attr( EDU()->is_checked( 'eduadmin-showEventVenueName', false ) ) . '"';
				$ret_str .= ' data-eventinquiry="' . esc_attr( EDU()->is_checked( 'eduadmin-allowInterestRegEvent', false ) ) . '"';
				$ret_str .= ' data-ondemand="' . esc_attr( $attributes['ondemand'] ) . '"';
				$ret_str .= ' data-allcourses="' . esc_attr( $attributes['allcourses'] ) . '"';
				$ret_str .= '>';

				$i                = 0;
				$has_hidden_dates = false;
				$show_event_venue = EDU()->is_checked( 'eduadmin-showEventVenueName', false );

				$event_interest_page = EDU()->get_option( 'eduadmin-interestEventPage' );

				if ( ! empty( $events ) ) {
					foreach ( $events as $ev ) {
						$spots_left = $ev['ParticipantNumberLeft'];

						if ( ! empty( $_REQUEST['eid'] ) ) {
							if ( $ev['EventId'] !== intval( $_REQUEST['eid'] ) ) {
								continue;
							}
						}

						ob_start();
						include EDUADMIN_PLUGIN_PATH . '/content/template/detailTemplate/blocks/event-item.php';
						$ret_str .= ob_get_clean();

						$last_city = $ev['City'];
						$i++;
					}
				}
				if ( empty( $events ) ) {
					$ret_str .= '<div class="noDatesAvailable"><i>' . esc_html_x( 'No available dates for the selected course', 'frontend', 'eduadmin-booking' ) . '</i></div>';
				}
				if ( $has_hidden_dates ) {
					$ret_str .= '<div class="eventShowMore"><a class="neutral-btn" href="javascript://" onclick="eduDetailView.ShowAllEvents(\'eduev' . esc_attr( ( $group_by_city ? '-' . $last_city : '' ) ) . '\', this);">' . esc_html_x( 'Show all events', 'frontend', 'eduadmin-booking' ) . '</a></div>';
				}
				$ret_str .= '</div></div>';
			}
		}
	}
	EDU()->stop_timer( $t );

	return $ret_str;
}

function eduadmin_get_login_widget( $attributes ) {
	$t          = EDU()->start_timer( __METHOD__ );
	$attributes = shortcode_atts(
		array(
			'logintext'  => _x( 'Log in', 'frontend', 'eduadmin-booking' ),
			'logouttext' => _x( 'Log out', 'frontend', 'eduadmin-booking' ),
			'guesttext'  => _x( 'Guest', 'frontend', 'eduadmin-booking' ),
		),
		normalize_empty_atts( $attributes ),
		'eduadmin-loginwidget'
	);

	$surl = get_home_url();
	$cat  = EDU()->get_option( 'eduadmin-rewriteBaseUrl' );

	$base_url = $surl . '/' . $cat;
	if ( isset( EDU()->session['eduadmin-loginUser'] ) ) {
		$user = EDU()->session['eduadmin-loginUser'];
	}
	EDU()->stop_timer( $t );

	return '<div class="eduadminLogin" data-eduwidget="loginwidget"
	data-logintext="' . esc_attr( $attributes['logintext'] ) . '"
	data-logouttext="' . esc_attr( $attributes['logouttext'] ) . '"
	data-guesttext="' . esc_attr( $attributes['guesttext'] ) . '">' .
	       '</div>';
}

function eduadmin_get_login_view( $attributes ) {
	$t = EDU()->start_timer( __METHOD__ );
	if ( ! defined( 'DONOTCACHEPAGE' ) ) {
		define( 'DONOTCACHEPAGE', true );
	}

	$style_version = filemtime( EDUADMIN_PLUGIN_PATH . '/content/style/compiled/frontend/profilePage.css' );
	wp_register_style(
		'eduadmin_frontend_profile',
		plugins_url( 'content/style/compiled/frontend/profilePage.css', dirname( __FILE__ ) ),
		array( 'eduadmin_frontend_style' ),
		date_version( $style_version )
	);
	wp_enqueue_style( 'eduadmin_frontend_profile' );

	$attributes = shortcode_atts(
		array(
			'logintext'  => _x( 'Log in', 'frontend', 'eduadmin-booking' ),
			'logouttext' => _x( 'Log out', 'frontend', 'eduadmin-booking' ),
			'guesttext'  => _x( 'Guest', 'frontend', 'eduadmin-booking' ),
		),
		normalize_empty_atts( $attributes ),
		'eduadmin-loginview'
	);
	EDU()->stop_timer( $t );

	return include_once EDUADMIN_PLUGIN_PATH . '/content/template/myPagesTemplate/login.php';
}

function eduadmin_get_programme_list( $attributes ) {
	$attributes = shortcode_atts(
		array(
			'category' => null,
		),
		normalize_empty_atts( $attributes ),
		'eduadmin-programmelist'
	);

	$style_version = filemtime( EDUADMIN_PLUGIN_PATH . '/content/style/compiled/frontend/listProgrammeView.css' );
	wp_register_style(
		'eduadmin_frontend_programmelist',
		plugins_url( 'content/style/compiled/frontend/listProgrammeView.css', dirname( __FILE__ ) ),
		array( 'eduadmin_frontend_style' ),
		date_version( $style_version )
	);
	wp_enqueue_style( 'eduadmin_frontend_programmelist' );

	$programmes = EDUAPI()->OData->Programmes->Search(
		null,
		'ShowOnWeb' .
		( ! empty( $attributes['category'] ) ? ' and CategoryId eq ' . $attributes['category'] : '' ),
		'ProgrammeStarts(' .
		'$filter=' .
		'HasPublicPriceName' .
		' and (ApplicationOpenDate le ' . date_i18n( 'c' ) . ' or ApplicationOpenDate eq null)' .
		' and StartDate ge ' . date_i18n( 'c' ) .
		';' .
		'$orderby=' .
		'StartDate),Courses'
	);

	include_once EDUADMIN_PLUGIN_PATH . '/content/template/programme/list.php';
}

function eduadmin_get_programme_details( $attributes ) {
	$attributes = shortcode_atts(
		array(
			'programmeid' => null,
		),
		normalize_empty_atts( $attributes ),
		'eduadmin-programmedetail'
	);

	$style_version = filemtime( EDUADMIN_PLUGIN_PATH . '/content/style/compiled/frontend/detailView.css' );
	wp_register_style(
		'eduadmin_frontend_detail',
		plugins_url( 'content/style/compiled/frontend/detailView.css', dirname( __FILE__ ) ),
		array( 'eduadmin_frontend_style' ),
		date_version( $style_version )
	);
	wp_enqueue_style( 'eduadmin_frontend_detail' );

	global $wp_query;

	if ( ! empty( $wp_query->query_vars['edu_programme'] ) ) {
		$exploded_id  = explode( '_', $wp_query->query_vars['edu_programme'] )[1];
		$programme_id = $exploded_id;
	} elseif ( ! empty( $attributes['programmeid'] ) ) {
		$programme_id = $attributes['programmeid'];
	} else {
		$programme_id = null;
	}

	if ( ! empty( $programme_id ) ) {
		$programme = EDUAPI()->OData->Programmes->GetItem(
			$programme_id,
			null,
			'ProgrammeStarts(' .
			'$filter=' .
			'HasPublicPriceName' .
			' and (ApplicationOpenDate le ' . date_i18n( 'c' ) . ' or ApplicationOpenDate eq null)' .
			' and StartDate ge ' . date_i18n( 'c' ) .
			';' .
			'$orderby=' .
			'StartDate' .
			';' .
			'$expand=' .
			'Courses($orderby=ProgrammeCourseSortIndex),Events($expand=EventDates($orderby=StartDate;$select=StartDate,EndDate;);$orderby=ProgrammeCourseSortIndex),PriceNames' .
			'),PriceNames'
		);

		include_once EDUADMIN_PLUGIN_PATH . '/content/template/programme/detail.php';
	}
}

function eduadmin_get_programme_booking( $attributes ) {
	$attributes = shortcode_atts(
		array(
			'programmeid'      => null,
			'programmestartid' => null,
		),
		normalize_empty_atts( $attributes ),
		'eduadmin-programmebooking'
	);

	$style_version = filemtime( EDUADMIN_PLUGIN_PATH . '/content/style/compiled/frontend/bookingPage.css' );
	wp_register_style(
		'eduadmin_frontend_booking',
		plugins_url( 'content/style/compiled/frontend/bookingPage.css', dirname( __FILE__ ) ),
		array( 'eduadmin_frontend_style' ),
		date_version( $style_version )
	);
	wp_enqueue_style( 'eduadmin_frontend_booking' );

	global $wp_query;

	if ( ! empty( $wp_query->query_vars['edu_programme'] ) ) {
		$exploded_id  = explode( '_', $wp_query->query_vars['edu_programme'] )[1];
		$programme_id = $exploded_id;
	} elseif ( ! empty( $attributes['programmeid'] ) ) {
		$programme_id = $attributes['programmeid'];
	} else {
		$programme_id = null;
	}

	$programmestart_id = null;
	if ( ! empty( $attributes['programmestartid'] ) ) {
		$programmestart_id = $attributes['programmestartid'];
	} elseif ( ! empty( $_GET['id'] ) ) {
		$programmestart_id = $_GET['id'];
	}

	if ( ! empty( $programmestart_id ) ) {
		$programme = EDUAPI()->OData->ProgrammeStarts->GetItem(
			$programmestart_id,
			null,
			'Courses,Events,PaymentMethods,PriceNames'
		);

		include_once EDUADMIN_PLUGIN_PATH . '/content/template/programme/book.php';
	}
}

if ( is_callable( 'add_shortcode' ) ) {
	add_shortcode( 'eduadmin-listview', 'eduadmin_get_list_view' );
	add_shortcode( 'eduadmin-detailview', 'eduadmin_get_detail_view' );
	add_shortcode( 'eduadmin-bookingview', 'eduadmin_get_booking_view' );
	add_shortcode( 'eduadmin-detailinfo', 'eduadmin_get_detailinfo' );
	add_shortcode( 'eduadmin-loginwidget', 'eduadmin_get_login_widget' );
	add_shortcode( 'eduadmin-loginview', 'eduadmin_get_login_view' );
	add_shortcode( 'eduadmin-objectinterest', 'eduadmin_get_object_interest' );
	add_shortcode( 'eduadmin-eventinterest', 'eduadmin_get_event_interest' );
	add_shortcode( 'eduadmin-coursepublicpricename', 'eduadmin_get_course_public_pricename' );

	add_shortcode( 'eduadmin-programme-list', 'eduadmin_get_programme_list' );
	add_shortcode( 'eduadmin-programme-detail', 'eduadmin_get_programme_details' );
	add_shortcode( 'eduadmin-programme-book', 'eduadmin_get_programme_booking' );
}
