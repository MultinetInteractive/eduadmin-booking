<?php
function edu_render_general_settings() {
	EDU()->timers[ __METHOD__ ] = microtime( true );
	if ( isset( $_REQUEST['act'] ) && $_REQUEST['act'] == "clearTransients" ) {
		global $wpdb;

		$prefix     = esc_sql( 'eduadmin-' );
		$options    = $wpdb->options;
		$t          = esc_sql( "%transient%$prefix%" );
		$sql        = $wpdb->prepare( "SELECT option_name FROM $options WHERE option_name LIKE '%s'", $t );
		$transients = $wpdb->get_col( $sql );
		foreach ( $transients as $transient ) {
			$key = str_replace( '_transient_timeout_', '', $transient );
			delete_transient( $key );
			$key = str_replace( '_site_transient_timeout_', '', $transient );
			delete_transient( $key );
		}

		wp_cache_flush();
	}
	?>
	<div class="eduadmin wrap">
		<h2><?php echo esc_html( sprintf( _x( 'EduAdmin settings - %s', 'backend', 'eduadmin-booking' ), _x( 'General', 'backend', 'eduadmin-booking' ) ) ); ?></h2>

		<form method="post" action="options.php">
			<?php settings_fields( 'eduadmin-rewrite' ); ?>
			<?php do_settings_sections( 'eduadmin-rewrite' ); ?>
			<div class="block">
				<h3><?php echo esc_html_x( 'General settings', 'backend', 'eduadmin-booking' ); ?></h3>
				<?php echo esc_html_x( 'Availability text', 'backend', 'eduadmin-booking' ); ?>
				<br />
				<?php
				$spotLeft = get_option( 'eduadmin-spotsLeft', 'exactNumbers' );
				?>
				<select class="eduadmin-spotsLeft" name="eduadmin-spotsLeft" onchange="EduAdmin.SpotExampleText();">
					<option<?php echo( $spotLeft === "exactNumbers" ? " selected=\"selected\"" : "" ); ?>
						value="exactNumbers"><?php _ex( 'Exact numbers', 'backend', 'eduadmin-booking' ); ?></option>
					<option<?php echo( $spotLeft === "onlyText" ? " selected=\"selected\"" : "" ); ?>
						value="onlyText"><?php _ex( 'Only text (Spots left/ Few spots / No spots left)', 'backend', 'eduadmin-booking' ); ?></option>
					<option<?php echo( $spotLeft === "intervals" ? " selected=\"selected\"" : "" ); ?>
						value="intervals"><?php _ex( 'Interval (Please specify below)', 'backend', 'eduadmin-booking' ); ?></option>
					<option<?php echo( $spotLeft === "alwaysFewSpots" ? " selected=\"selected\"" : "" ); ?>
						value="alwaysFewSpots"><?php _ex( 'Always few spots', 'backend', 'eduadmin-booking' ); ?></option>
				</select> <span id="eduadmin-spotExampleText"></span>
				<br />
				<div class="eduadmin-spotsSettings">
					<div id="eduadmin-intervalSetting">
						<br />
						<b><?php echo esc_html_x( 'Interval settings', 'backend', 'eduadmin-booking' ); ?></b>
						<br />
						<?php echo esc_html_x( 'Insert one interval range per row (1-3, 4-10, 10+)', 'backend', 'eduadmin-booking' ); ?>
						<br />
						<textarea name="eduadmin-spotsSettings" class="form-control" rows="5" cols="30"><?php echo get_option( 'eduadmin-spotsSettings', "1-5\n5-10\n10+" ); ?></textarea>
					</div>
					<div id="eduadmin-alwaysFewSpots">
						<br />
						<b><?php echo esc_html_x( 'Number of participants before showing as \"Few spots left\"', 'backend', 'eduadmin-booking' ); ?></b>
						<br />
						<input type="number" name="eduadmin-alwaysFewSpots" value="<?php echo esc_attr( get_option( 'eduadmin-alwaysFewSpots', "3" ) ); ?>" />
					</div>
				</div>
				<br />
				<?php echo esc_html_x( 'Number of months to fetch events for', 'backend', 'eduadmin-booking' ); ?>
				<br />
				<input type="number" name="eduadmin-monthsToFetch" value="<?php echo esc_attr( get_option( 'eduadmin-monthsToFetch', '6' ) ); ?>" /> <?php _ex( 'months', 'backend', 'eduadmin-booking' ); ?>
				<br />
				<p class="submit">
					<input type="submit" name="submit" id="submit" class="button button-primary" value="<?php echo esc_attr_x( 'Save settings', 'backend', 'eduadmin-booking' ); ?>" />
				</p>
				<h3><?php echo esc_html_x( 'Rewrite settings', 'backend', 'eduadmin-booking' ); ?></h3>
				<p>
					<?php echo esc_html_x( 'Enter the URL you want to use with the application (please check that the URL does not exists)', 'backend', 'eduadmin-booking' ); ?>
				</p>
				<?php echo home_url(); ?>/<input style="width: 200px;" type="text" class="form-control folder" name="eduadmin-rewriteBaseUrl" id="eduadmin-rewriteBaseUrl" value="<?php echo esc_attr( get_option( 'eduadmin-rewriteBaseUrl' ) ); ?>" placeholder="<?php echo _x( 'URL', 'backend', 'eduadmin-booking' ); ?>" />/
				<?php
				$pages    = get_pages();
				$eduPages = array();
				foreach ( $pages as $p ) {
					if ( strstr( $p->post_content, '[eduadmin' ) ) {
						$eduPages[] = $p;
					}
				}

				if ( 0 === count( $eduPages ) ) {
					$eduPages = $pages;
				}
				?>
				<h3><?php echo esc_html_x( 'Course templates', 'backend', 'eduadmin-booking' ); ?></h3>
				<table>
					<tr>
						<td><?php echo esc_html_x( 'List view page', 'backend', 'eduadmin-booking' ); ?></td>
						<td>
							<select class="form-control" style="width: 300px;" name="eduadmin-listViewPage" id="eduadmin-listViewPage">
								<option value="">-- <?php echo esc_html_x( 'No page selected', 'backend', 'eduadmin-booking' ); ?>--
								</option>
								<?php
								$listPage = get_option( 'eduadmin-listViewPage' );
								foreach ( $eduPages as $p ) {
									$suggested = false;
									if ( stristr( $p->post_content, '[eduadmin-listview' ) ) {
										$suggested = true;
									}
									echo "\t\t\t\t\t\t\t<option" . ( $listPage == $p->ID ? " selected=\"selected\"" : "" ) . " value=\"" . $p->ID . "\">" .
									     htmlentities( $p->post_title . " (ID: " . $p->ID . ")" ) .
									     ( $suggested ? " (" . _x( 'suggested', 'backend', 'eduadmin-booking' ) . ")" : "" ) .
									     "</option>\n";
								}
								?>
							</select>
						</td>
						<td>
							<i title="<?php echo esc_attr_x( 'Shortcode to use in your page', 'backend', 'eduadmin-booking' ); ?>">[eduadmin-listview]</i>
						</td>
					</tr>
					<tr>
						<td><?php echo _x( 'Details view page', 'backend', 'eduadmin-booking' ); ?></td>
						<td>
							<select class="form-control" style="width: 300px;" name="eduadmin-detailViewPage" id="eduadmin-detailViewPage">
								<option value="">-- <?php _ex( 'No page selected', 'backend', 'eduadmin-booking' ); ?>--
								</option>
								<?php
								$detailPage = get_option( 'eduadmin-detailViewPage' );
								foreach ( $eduPages as $p ) {
									$suggested = false;
									if ( stristr( $p->post_content, '[eduadmin-detailview' ) ) {
										$suggested = true;
									}
									echo "\t\t\t\t\t\t\t<option" . ( $detailPage == $p->ID ? " selected=\"selected\"" : "" ) . " value=\"" . $p->ID . "\">" .
									     htmlentities( $p->post_title . " (ID: " . $p->ID . ")" ) .
									     ( $suggested ? " (" . _x( 'suggested', 'backend', 'eduadmin-booking' ) . ")" : "" ) .
									     "</option>\n";
								}
								?>
							</select>
						</td>
						<td>
							<i title="<?php echo esc_attr_x( 'Shortcode to use in your page', 'backend', 'eduadmin-booking' ); ?>">[eduadmin-detailview]</i>
						</td>
					</tr>
					<tr>
						<td><?php echo _x( 'Booking view page', 'backend', 'eduadmin-booking' ); ?></td>
						<td>
							<select class="form-control" style="width: 300px;" name="eduadmin-bookingViewPage" id="eduadmin-bookingViewPage">
								<option value="">-- <?php _ex( 'No page selected', 'backend', 'eduadmin-booking' ); ?>--
								</option>
								<?php
								$bookingPage = get_option( 'eduadmin-bookingViewPage' );
								foreach ( $eduPages as $p ) {
									$suggested = false;
									if ( stristr( $p->post_content, '[eduadmin-bookingview' ) ) {
										$suggested = true;
									}
									echo "\t\t\t\t\t\t\t<option" . ( $bookingPage == $p->ID ? " selected=\"selected\"" : "" ) . " value=\"" . $p->ID . "\">" .
									     htmlentities( $p->post_title . " (ID: " . $p->ID . ")" ) .
									     ( $suggested ? " (" . _x( 'suggested', 'backend', 'eduadmin-booking' ) . ")" : "" ) .
									     "</option>\n";
								}
								?>
							</select>
						</td>
						<td>
							<i title="<?php echo esc_attr_x( 'Shortcode to use in your page', 'backend', 'eduadmin-booking' ); ?>">[eduadmin-bookingview]</i>
						</td>
					</tr>
					<tr>
						<td><?php _ex( 'Thank you page', 'backend', 'eduadmin-booking' ); ?></td>
						<td>
							<select class="form-control" style="width: 300px;" name="eduadmin-thankYouPage" id="eduadmin-thankYouPage">
								<option value="">-- <?php _ex( 'No page selected', 'backend', 'eduadmin-booking' ); ?>--
								</option>
								<?php
								$thankPage = get_option( 'eduadmin-thankYouPage' );
								foreach ( $pages as $p ) {
									echo "\t\t\t\t\t\t\t<option" . ( $thankPage == $p->ID ? " selected=\"selected\"" : "" ) . " value=\"" . $p->ID . "\">" .
									     htmlentities( $p->post_title . " (ID: " . $p->ID . ")" ) .
									     "</option>\n";
								}
								?>
							</select>
						</td>
						<td>&nbsp;</td>
					</tr>
					<tr>
						<td><?php echo _x( 'Login page', 'backend', 'eduadmin-booking' ); ?></td>
						<td>
							<select class="form-control" style="width: 300px;" name="eduadmin-loginViewPage" id="eduadmin-loginViewPage">
								<option value="">-- <?php _ex( 'No page selected', 'backend', 'eduadmin-booking' ); ?>--
								</option>
								<?php
								$loginPage = get_option( 'eduadmin-loginViewPage' );
								foreach ( $eduPages as $p ) {
									$suggested = false;
									if ( stristr( $p->post_content, '[eduadmin-loginview' ) ) {
										$suggested = true;
									}
									echo "\t\t\t\t\t\t\t<option" . ( $loginPage == $p->ID ? " selected=\"selected\"" : "" ) . " value=\"" . $p->ID . "\">" .
									     htmlentities( $p->post_title . " (ID: " . $p->ID . ")" ) .
									     ( $suggested ? " (" . _x( 'suggested', 'backend', 'eduadmin-booking' ) . ")" : "" ) .
									     "</option>\n";
								}
								?>
							</select>
						</td>
						<td>
							<i title="<?php echo esc_attr_x( 'Shortcode to use in your page', 'backend', 'eduadmin-booking' ); ?>">[eduadmin-loginview]</i>
						</td>
					</tr>
					<tr>
						<td><?php echo _x( 'Course interest page', 'backend', 'eduadmin-booking' ); ?></td>
						<td>
							<select class="form-control" style="width: 300px;" name="eduadmin-interestObjectPage" id="eduadmin-interestObjectPage">
								<option value="">-- <?php _ex( 'No page selected', 'backend', 'eduadmin-booking' ); ?>--
								</option>
								<?php
								$objectInterestPage = get_option( 'eduadmin-interestObjectPage' );
								foreach ( $eduPages as $p ) {
									$suggested = false;
									if ( stristr( $p->post_content, '[eduadmin-objectinterest' ) ) {
										$suggested = true;
									}
									echo "\t\t\t\t\t\t\t<option" . ( $objectInterestPage == $p->ID ? " selected=\"selected\"" : "" ) . " value=\"" . $p->ID . "\">" .
									     htmlentities( $p->post_title . " (ID: " . $p->ID . ")" ) .
									     ( $suggested ? " (" . _x( 'suggested', 'backend', 'eduadmin-booking' ) . ")" : "" ) .
									     "</option>\n";
								}
								?>
							</select>
						</td>
						<td>
							<i title="<?php echo esc_attr_x( 'Shortcode to use in your page', 'backend', 'eduadmin-booking' ); ?>">[eduadmin-objectinterest]</i>
						</td>
					</tr>
					<tr>
						<td><?php echo _x( 'Event interest page', 'backend', 'eduadmin-booking' ); ?></td>
						<td>
							<select class="form-control" style="width: 300px;" name="eduadmin-interestEventPage" id="eduadmin-interestEventPage">
								<option value="">-- <?php _ex( 'No page selected', 'backend', 'eduadmin-booking' ); ?>--
								</option>
								<?php
								$eventInterestPage = get_option( 'eduadmin-interestEventPage' );
								foreach ( $eduPages as $p ) {
									$suggested = false;
									if ( stristr( $p->post_content, '[eduadmin-eventinterest' ) ) {
										$suggested = true;
									}
									echo "\t\t\t\t\t\t\t<option" . ( $eventInterestPage == $p->ID ? " selected=\"selected\"" : "" ) . " value=\"" . $p->ID . "\">" .
									     htmlentities( $p->post_title . " (ID: " . $p->ID . ")" ) .
									     ( $suggested ? " (" . _x( 'suggested', 'backend', 'eduadmin-booking' ) . ")" : "" ) .
									     "</option>\n";
								}
								?>
							</select>
						</td>
						<td>
							<i title="<?php echo esc_attr_x( 'Shortcode to use in your page', 'backend', 'eduadmin-booking' ); ?>">[eduadmin-eventinterest]</i>
						</td>
					</tr>
				</table>
				<?php
				$pages           = get_pages();
				$programme_pages = array();
				foreach ( $pages as $p ) {
					if ( strstr( $p->post_content, '[eduadmin' ) ) {
						$programme_pages[] = $p;
					}
				}

				if ( 0 === count( $programme_pages ) ) {
					$programme_pages = $pages;
				}
				?>
				<h3><?php _ex( 'Programmes', 'backend', 'eduadmin-booking' ); ?></h3>
				<table>
					<tr>
						<td><?php _ex( 'List view page', 'backend', 'eduadmin-booking' ); ?></td>
						<td>
							<select class="form-control" style="width: 300px;" name="eduadmin-programme-list" id="eduadmin-programme-list">
								<option value="">-- <?php _ex( 'No page selected', 'backend', 'eduadmin-booking' ); ?>--
								</option>
								<?php
								$list_page = get_option( 'eduadmin-programme-list' );
								foreach ( $programme_pages as $p ) {
									$suggested = false;
									if ( stristr( $p->post_content, '[eduadmin-programme-list' ) ) {
										$suggested = true;
									}
									echo "\t\t\t\t\t\t\t<option" . ( $list_page == $p->ID ? ' selected="selected"' : '' ) . ' value="' . $p->ID . '">' .
									     htmlentities( $p->post_title . ' (ID: ' . $p->ID . ')' ) .
									     ( $suggested ? ' (' . _x( 'suggested', 'backend', 'eduadmin-booking' ) . ")" : "" ) .
									     "</option>\n";
								}
								?>
							</select>
						</td>
						<td>
							<i title="<?php echo esc_attr_x( 'Shortcode to use in your page', 'backend', 'eduadmin-booking' ); ?>">[eduadmin-programme-list]</i>
						</td>
					</tr>
					<tr>
						<td><?php _ex( 'Detail view page', 'backend', 'eduadmin-booking' ); ?></td>
						<td>
							<select class="form-control" style="width: 300px;" name="eduadmin-programme-detail" id="eduadmin-programme-detail">
								<option value="">-- <?php _ex( 'No page selected', 'backend', 'eduadmin-booking' ); ?>--
								</option>
								<?php
								$detail_page = get_option( 'eduadmin-programme-detail' );
								foreach ( $programme_pages as $p ) {
									$suggested = false;
									if ( stristr( $p->post_content, '[eduadmin-programme-detail' ) ) {
										$suggested = true;
									}
									echo "\t\t\t\t\t\t\t<option" . ( $detail_page == $p->ID ? " selected=\"selected\"" : "" ) . " value=\"" . $p->ID . "\">" .
									     htmlentities( $p->post_title . " (ID: " . $p->ID . ")" ) .
									     ( $suggested ? " (" . _x( 'suggested', 'backend', 'eduadmin-booking' ) . ")" : "" ) .
									     "</option>\n";
								}
								?>
							</select>
						</td>
						<td>
							<i title="<?php echo esc_attr_x( 'Shortcode to use in your page', 'backend', 'eduadmin-booking' ); ?>">[eduadmin-programme-detail]</i>
						</td>
					</tr>
					<tr>
						<td><?php _ex( 'Booking view page', 'backend', 'eduadmin-booking' ); ?></td>
						<td>
							<select class="form-control" style="width: 300px;" name="eduadmin-programme-book" id="eduadmin-programme-book">
								<option value="">-- <?php _ex( 'No page selected', 'backend', 'eduadmin-booking' ); ?>--
								</option>
								<?php
								$book_page = get_option( 'eduadmin-programme-book' );
								foreach ( $programme_pages as $p ) {
									$suggested = false;
									if ( stristr( $p->post_content, '[eduadmin-programme-book' ) ) {
										$suggested = true;
									}
									echo "\t\t\t\t\t\t\t<option" . ( $book_page == $p->ID ? " selected=\"selected\"" : "" ) . " value=\"" . $p->ID . "\">" .
									     htmlentities( $p->post_title . " (ID: " . $p->ID . ")" ) .
									     ( $suggested ? " (" . _x( 'suggested', 'backend', 'eduadmin-booking' ) . ")" : "" ) .
									     "</option>\n";
								}
								?>
							</select>
						</td>
						<td>
							<i title="<?php echo esc_attr_x( 'Shortcode to use in your page', 'backend', 'eduadmin-booking' ); ?>">[eduadmin-programme-book]</i>
						</td>
					</tr>
				</table>

				<input type="hidden" name="eduadmin-options_have_changed" value="true" />
				<p class="submit">
					<input type="submit" name="submit" id="submit" class="button button-primary" value="<?php echo esc_attr_x( 'Save settings', 'backend', 'eduadmin-booking' ); ?>" />
				</p>
			</div>
		</form>
		<form action="" method="POST">
			<input type="hidden" name="act" value="clearTransients" />
			<input type="submit" class="button button-primary" value="<?php echo esc_attr_x( 'Clear transients/cache', 'backend', 'eduadmin-booking' ); ?>" />
		</form>
	</div>
	<script type="text/javascript">

		var availText = {
			exactNumbers: "<?php echo esc_attr_x( 'No spots left / 5 spots left', 'backend', 'eduadmin-booking' ); ?>",
			onlyText: "<?php echo esc_attr_x( 'No spots left / Few spots left / Spots left', 'backend', 'eduadmin-booking' ); ?>",
			intervals: "<?php echo esc_attr_x( 'No spots left / 3-5 spots left / 6+ spots left', 'backend', 'eduadmin-booking' ); ?>",
			alwaysFewSpots: "<?php echo esc_attr_x( 'Few spots left', 'backend', 'eduadmin-booking' ); ?>"
		};

		jQuery(document).ready(function () {
			EduAdmin.SpotExampleText();
		});
	</script>
	<?php
	EDU()->timers[ __METHOD__ ] = microtime( true ) - EDU()->timers[ __METHOD__ ];
}
