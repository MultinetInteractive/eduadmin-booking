<?php
/**
 * Returns the timezone string for a site, even if it's set to a UTC offset
 *
 * Adapted from http://www.php.net/manual/en/function.timezone-name-from-abbr.php#89155
 *
 * @return string valid PHP timezone string
 */
if ( ! function_exists( 'wp_get_timezone_string' ) ) {
	function wp_get_timezone_string() {
		$t = EDU()->start_timer( __METHOD__ );
		// if site timezone string exists, return it
		if ( $timezone = get_option( 'timezone_string' ) ) {
			EDU()->stop_timer( $t );

			return $timezone;
		}

		// get UTC offset, if it isn't set then return UTC
		if ( 0 === ( $utc_offset = get_option( 'gmt_offset', 0 ) ) ) {
			EDU()->stop_timer( $t );

			return 'UTC';
		}

		// adjust UTC offset from hours to seconds
		$utc_offset *= 3600;

		// attempt to guess the timezone string from the UTC offset
		if ( $timezone = timezone_name_from_abbr( '', $utc_offset, 0 ) ) {
			EDU()->stop_timer( $t );

			return $timezone;
		}

		// last try, guess timezone string manually
		$is_dst = date( 'I' );

		foreach ( timezone_abbreviations_list() as $abbr ) {
			foreach ( $abbr as $city ) {
				if ( $city['dst'] === $is_dst && $city['offset'] === $utc_offset ) {
					EDU()->stop_timer( $t );

					return $city['timezone_id'];
				}
			}
		}

		// fallback to UTC
		EDU()->stop_timer( $t );

		return 'UTC';
	}
}

function edu_get_price( $price, $vatPercent ) {
	$t = EDU()->start_timer( __METHOD__ );

	$show_vat = EDU()->is_checked( 'eduadmin-showVatTexts', true );

	$org = EDUAPIHelper()->GetOrganization();

	$inc_vat = $org['PriceIncVat'];

	$forcePriceAs = EDU()->get_option( 'eduadmin-showPricesAsSelected', '' );

	$currency = EDU()->get_option( 'eduadmin-currency', 'SEK' );

	$priceExcl = convert_to_money( $inc_vat ? $price / ( 1 + ( $vatPercent / 100 ) ) : $price, $currency );
	$priceIncl = convert_to_money( ! $inc_vat ? $price * ( 1 + ( $vatPercent / 100 ) ) : $price, $currency );

	$returnString = '';

	switch ( $forcePriceAs ) {
		case 'both':
			$returnString = $priceExcl . ' ' . _x( 'ex VAT', 'frontend', 'eduadmin-booking' ) .
			                ' / ' .
			                $priceIncl . ' ' . _x( 'inc VAT', 'frontend', 'eduadmin-booking' );
			break;
		case 'inclVat':
			$returnString = $priceIncl . ' ' . _x( 'inc VAT', 'frontend', 'eduadmin-booking' );
			break;
		case 'exclVat':
			$returnString = $priceExcl . ' ' . _x( 'ex VAT', 'frontend', 'eduadmin-booking' );
			break;
		default:
			// The old way
			$returnString = convert_to_money( $price, $currency ) .
			                ( $show_vat ?
				                ' ' . ( $inc_vat ?
					                _x( 'inc VAT', 'frontend', 'eduadmin-booking' ) :
					                _x( 'ex VAT', 'frontend', 'eduadmin-booking' )
				                ) :
				                ''
			                );
			break;
	}

	EDU()->stop_timer( $t );

	return $returnString;
}

function edu_get_percent_from_values( $current_value, $max_value ) {
	if ( 0 === $current_value || 0 === $max_value ) {
		return 'percentUnknown';
	}
	$percent = ( $current_value / $max_value ) * 100;

	return edu_get_percent_class( $percent );
}

function edu_output_event_venue( $parts, $prefix = null ) {
	$empty     = true;
	$new_parts = [];
	foreach ( $parts as $part ) {
		if ( ! empty( $part ) ) {
			$empty       = false;
			$new_parts[] = $part;
		}
	}

	if ( $empty ) {
		return '';
	}

	return $prefix . join( ', ', $new_parts );
}

function edu_get_percent_class( $percent ) {
	if ( $percent >= 100 ) {
		return 'percent100';
	} elseif ( $percent >= 90 ) {
		return 'percent90';
	} elseif ( $percent >= 80 ) {
		return 'percent80';
	} elseif ( $percent >= 70 ) {
		return 'percent70';
	} elseif ( $percent >= 60 ) {
		return 'percent60';
	} elseif ( $percent >= 50 ) {
		return 'percent50';
	} elseif ( $percent >= 40 ) {
		return 'percent40';
	} elseif ( $percent >= 30 ) {
		return 'percent30';
	} elseif ( $percent >= 20 ) {
		return 'percent20';
	} elseif ( $percent >= 10 ) {
		return 'percent10';
	}

	return 'percent0';
}

function edu_get_country_list( $element_name, $selected_value = 'SE', $required = true ) {
	if ( empty( $selected_value ) && $required ) {
		$orgCountryCode = EDUAPIHelper()->GetOrganization()["CountryCode"];
		$selected_value = ! empty( $orgCountryCode ) ? $orgCountryCode : 'SE'; // Will be replaced with country from company
	}

	?>
	<select<?php echo( $required ? " required" : "" ); ?>
		autocomplete="off" name="<?php echo esc_attr( $element_name ); ?>">
		<option>
			<?php _ex( '-- Select country --', 'frontend', 'eduadmin-booking' ); ?>
		</option>
		<option value="AF"<?php selected( $selected_value, 'AF' ); ?>>
			<?php _ex( 'Afghanistan', 'frontend', 'eduadmin-booking' ); ?>
		</option>
		<option value="AX"<?php selected( $selected_value, 'AX' ); ?>>
			<?php _ex( 'Åland Islands', 'frontend', 'eduadmin-booking' ); ?>
		</option>
		<option value="AL"<?php selected( $selected_value, 'AL' ); ?>>
			<?php _ex( 'Albania', 'frontend', 'eduadmin-booking' ); ?>
		</option>
		<option value="DZ"<?php selected( $selected_value, 'DZ' ); ?>>
			<?php _ex( 'Algeria', 'frontend', 'eduadmin-booking' ); ?>
		</option>
		<option value="AS"<?php selected( $selected_value, 'AS' ); ?>>
			<?php _ex( 'American Samoa', 'frontend', 'eduadmin-booking' ); ?>
		</option>
		<option value="AD"<?php selected( $selected_value, 'AD' ); ?>>
			<?php _ex( 'Andorra', 'frontend', 'eduadmin-booking' ); ?>
		</option>
		<option value="AO"<?php selected( $selected_value, 'AO' ); ?>>
			<?php _ex( 'Angola', 'frontend', 'eduadmin-booking' ); ?>
		</option>
		<option value="AI"<?php selected( $selected_value, 'AI' ); ?>>
			<?php _ex( 'Anguilla', 'frontend', 'eduadmin-booking' ); ?>
		</option>
		<option value="AQ"<?php selected( $selected_value, 'AQ' ); ?>>
			<?php _ex( 'Antarctica', 'frontend', 'eduadmin-booking' ); ?>
		</option>
		<option value="AG"<?php selected( $selected_value, 'AG' ); ?>>
			<?php _ex( 'Antigua and Barbuda', 'frontend', 'eduadmin-booking' ); ?>
		</option>
		<option value="AR"<?php selected( $selected_value, 'AR' ); ?>>
			<?php _ex( 'Argentina', 'frontend', 'eduadmin-booking' ); ?>
		</option>
		<option value="AM"<?php selected( $selected_value, 'AM' ); ?>>
			<?php _ex( 'Armenia', 'frontend', 'eduadmin-booking' ); ?>
		</option>
		<option value="AW"<?php selected( $selected_value, 'AW' ); ?>>
			<?php _ex( 'Aruba', 'frontend', 'eduadmin-booking' ); ?>
		</option>
		<option value="AU"<?php selected( $selected_value, 'AU' ); ?>>
			<?php _ex( 'Australia', 'frontend', 'eduadmin-booking' ); ?>
		</option>
		<option value="AT"<?php selected( $selected_value, 'AT' ); ?>>
			<?php _ex( 'Austria', 'frontend', 'eduadmin-booking' ); ?>
		</option>
		<option value="AZ"<?php selected( $selected_value, 'AZ' ); ?>>
			<?php _ex( 'Azerbaijan', 'frontend', 'eduadmin-booking' ); ?>
		</option>
		<option value="BS"<?php selected( $selected_value, 'BS' ); ?>>
			<?php _ex( 'Bahamas', 'frontend', 'eduadmin-booking' ); ?>
		</option>
		<option value="BH"<?php selected( $selected_value, 'BH' ); ?>>
			<?php _ex( 'Bahrain', 'frontend', 'eduadmin-booking' ); ?>
		</option>
		<option value="BD"<?php selected( $selected_value, 'BD' ); ?>>
			<?php _ex( 'Bangladesh', 'frontend', 'eduadmin-booking' ); ?>
		</option>
		<option value="BB"<?php selected( $selected_value, 'BB' ); ?>>
			<?php _ex( 'Barbados', 'frontend', 'eduadmin-booking' ); ?>
		</option>
		<option value="BY"<?php selected( $selected_value, 'BY' ); ?>>
			<?php _ex( 'Belarus', 'frontend', 'eduadmin-booking' ); ?>
		</option>
		<option value="BE"<?php selected( $selected_value, 'BE' ); ?>>
			<?php _ex( 'Belgium', 'frontend', 'eduadmin-booking' ); ?>
		</option>
		<option value="BZ"<?php selected( $selected_value, 'BZ' ); ?>>
			<?php _ex( 'Belize', 'frontend', 'eduadmin-booking' ); ?>
		</option>
		<option value="BJ"<?php selected( $selected_value, 'BJ' ); ?>>
			<?php _ex( 'Benin', 'frontend', 'eduadmin-booking' ); ?>
		</option>
		<option value="BM"<?php selected( $selected_value, 'BM' ); ?>>
			<?php _ex( 'Bermuda', 'frontend', 'eduadmin-booking' ); ?>
		</option>
		<option value="BT"<?php selected( $selected_value, 'BT' ); ?>>
			<?php _ex( 'Bhutan', 'frontend', 'eduadmin-booking' ); ?>
		</option>
		<option value="BO"<?php selected( $selected_value, 'BO' ); ?>>
			<?php _ex( 'Bolivia, Plurinational State of', 'frontend', 'eduadmin-booking' ); ?>
		</option>
		<option value="BQ"<?php selected( $selected_value, 'BQ' ); ?>>
			<?php _ex( 'Bonaire, Sint Eustatius and Saba', 'frontend', 'eduadmin-booking' ); ?>
		</option>
		<option value="BA"<?php selected( $selected_value, 'BA' ); ?>>
			<?php _ex( 'Bosnia and Herzegovina', 'frontend', 'eduadmin-booking' ); ?>
		</option>
		<option value="BW"<?php selected( $selected_value, 'BW' ); ?>>
			<?php _ex( 'Botswana', 'frontend', 'eduadmin-booking' ); ?>
		</option>
		<option value="BV"<?php selected( $selected_value, 'BV' ); ?>>
			<?php _ex( 'Bouvet Island', 'frontend', 'eduadmin-booking' ); ?>
		</option>
		<option value="BR"<?php selected( $selected_value, 'BR' ); ?>>
			<?php _ex( 'Brazil', 'frontend', 'eduadmin-booking' ); ?>
		</option>
		<option
			value="IO"<?php selected( $selected_value, 'IO' ); ?>><?php _ex( 'British Indian Ocean Territory', 'frontend', 'eduadmin-booking' ); ?></option>
		<option
			value="BN"<?php selected( $selected_value, 'BN' ); ?>><?php _ex( 'Brunei Darussalam', 'frontend', 'eduadmin-booking' ); ?></option>
		<option
			value="BG"<?php selected( $selected_value, 'BG' ); ?>><?php _ex( 'Bulgaria', 'frontend', 'eduadmin-booking' ); ?></option>
		<option
			value="BF"<?php selected( $selected_value, 'BF' ); ?>><?php _ex( 'Burkina Faso', 'frontend', 'eduadmin-booking' ); ?></option>
		<option
			value="BI"<?php selected( $selected_value, 'BI' ); ?>><?php _ex( 'Burundi', 'frontend', 'eduadmin-booking' ); ?></option>
		<option
			value="KH"<?php selected( $selected_value, 'KH' ); ?>><?php _ex( 'Cambodia', 'frontend', 'eduadmin-booking' ); ?></option>
		<option
			value="CM"<?php selected( $selected_value, 'CM' ); ?>><?php _ex( 'Cameroon', 'frontend', 'eduadmin-booking' ); ?></option>
		<option
			value="CA"<?php selected( $selected_value, 'CA' ); ?>><?php _ex( 'Canada', 'frontend', 'eduadmin-booking' ); ?></option>
		<option
			value="CV"<?php selected( $selected_value, 'CV' ); ?>><?php _ex( 'Cape Verde', 'frontend', 'eduadmin-booking' ); ?></option>
		<option
			value="KY"<?php selected( $selected_value, 'KY' ); ?>><?php _ex( 'Cayman Islands', 'frontend', 'eduadmin-booking' ); ?></option>
		<option
			value="CF"<?php selected( $selected_value, 'CF' ); ?>><?php _ex( 'Central African Republic', 'frontend', 'eduadmin-booking' ); ?></option>
		<option
			value="TD"<?php selected( $selected_value, 'TD' ); ?>><?php _ex( 'Chad', 'frontend', 'eduadmin-booking' ); ?></option>
		<option
			value="CL"<?php selected( $selected_value, 'CL' ); ?>><?php _ex( 'Chile', 'frontend', 'eduadmin-booking' ); ?></option>
		<option
			value="CN"<?php selected( $selected_value, 'CN' ); ?>><?php _ex( 'China', 'frontend', 'eduadmin-booking' ); ?></option>
		<option
			value="CX"<?php selected( $selected_value, 'CX' ); ?>><?php _ex( 'Christmas Island', 'frontend', 'eduadmin-booking' ); ?></option>
		<option
			value="CC"<?php selected( $selected_value, 'CC' ); ?>><?php _ex( 'Cocos (Keeling) Islands', 'frontend', 'eduadmin-booking' ); ?></option>
		<option
			value="CO"<?php selected( $selected_value, 'CO' ); ?>><?php _ex( 'Colombia', 'frontend', 'eduadmin-booking' ); ?></option>
		<option
			value="KM"<?php selected( $selected_value, 'KM' ); ?>><?php _ex( 'Comoros', 'frontend', 'eduadmin-booking' ); ?></option>
		<option
			value="CG"<?php selected( $selected_value, 'CG' ); ?>><?php _ex( 'Congo', 'frontend', 'eduadmin-booking' ); ?></option>
		<option
			value="CD"<?php selected( $selected_value, 'CD' ); ?>><?php _ex( 'Congo, the Democratic Republic of the', 'frontend', 'eduadmin-booking' ); ?></option>
		<option
			value="CK"<?php selected( $selected_value, 'CK' ); ?>><?php _ex( 'Cook Islands', 'frontend', 'eduadmin-booking' ); ?></option>
		<option
			value="CR"<?php selected( $selected_value, 'CR' ); ?>><?php _ex( 'Costa Rica', 'frontend', 'eduadmin-booking' ); ?></option>
		<option
			value="CI"<?php selected( $selected_value, 'CI' ); ?>><?php _ex( 'Côte d\'Ivoire', 'frontend', 'eduadmin-booking' ); ?></option>
		<option
			value="HR"<?php selected( $selected_value, 'HR' ); ?>><?php _ex( 'Croatia', 'frontend', 'eduadmin-booking' ); ?></option>
		<option
			value="CU"<?php selected( $selected_value, 'CU' ); ?>><?php _ex( 'Cuba', 'frontend', 'eduadmin-booking' ); ?></option>
		<option
			value="CW"<?php selected( $selected_value, 'CW' ); ?>><?php _ex( 'Curaçao', 'frontend', 'eduadmin-booking' ); ?></option>
		<option
			value="CY"<?php selected( $selected_value, 'CY' ); ?>><?php _ex( 'Cyprus', 'frontend', 'eduadmin-booking' ); ?></option>
		<option
			value="CZ"<?php selected( $selected_value, 'CZ' ); ?>><?php _ex( 'Czech Republic', 'frontend', 'eduadmin-booking' ); ?></option>
		<option
			value="DK"<?php selected( $selected_value, 'DK' ); ?>><?php _ex( 'Denmark', 'frontend', 'eduadmin-booking' ); ?></option>
		<option
			value="DJ"<?php selected( $selected_value, 'DJ' ); ?>><?php _ex( 'Djibouti', 'frontend', 'eduadmin-booking' ); ?></option>
		<option
			value="DM"<?php selected( $selected_value, 'DM' ); ?>><?php _ex( 'Dominica', 'frontend', 'eduadmin-booking' ); ?></option>
		<option
			value="DO"<?php selected( $selected_value, 'DO' ); ?>><?php _ex( 'Dominican Republic', 'frontend', 'eduadmin-booking' ); ?></option>
		<option
			value="EC"<?php selected( $selected_value, 'EC' ); ?>><?php _ex( 'Ecuador', 'frontend', 'eduadmin-booking' ); ?></option>
		<option
			value="EG"<?php selected( $selected_value, 'EG' ); ?>><?php _ex( 'Egypt', 'frontend', 'eduadmin-booking' ); ?></option>
		<option
			value="SV"<?php selected( $selected_value, 'SV' ); ?>><?php _ex( 'El Salvador', 'frontend', 'eduadmin-booking' ); ?></option>
		<option
			value="GQ"<?php selected( $selected_value, 'GQ' ); ?>><?php _ex( 'Equatorial Guinea', 'frontend', 'eduadmin-booking' ); ?></option>
		<option
			value="ER"<?php selected( $selected_value, 'ER' ); ?>><?php _ex( 'Eritrea', 'frontend', 'eduadmin-booking' ); ?></option>
		<option
			value="EE"<?php selected( $selected_value, 'EE' ); ?>><?php _ex( 'Estonia', 'frontend', 'eduadmin-booking' ); ?></option>
		<option
			value="ET"<?php selected( $selected_value, 'ET' ); ?>><?php _ex( 'Ethiopia', 'frontend', 'eduadmin-booking' ); ?></option>
		<option
			value="FK"<?php selected( $selected_value, 'FK' ); ?>><?php _ex( 'Falkland Islands (Malvinas)', 'frontend', 'eduadmin-booking' ); ?></option>
		<option
			value="FO"<?php selected( $selected_value, 'FO' ); ?>><?php _ex( 'Faroe Islands', 'frontend', 'eduadmin-booking' ); ?></option>
		<option
			value="FJ"<?php selected( $selected_value, 'FJ' ); ?>><?php _ex( 'Fiji', 'frontend', 'eduadmin-booking' ); ?></option>
		<option
			value="FI"<?php selected( $selected_value, 'FI' ); ?>><?php _ex( 'Finland', 'frontend', 'eduadmin-booking' ); ?></option>
		<option
			value="FR"<?php selected( $selected_value, 'FR' ); ?>><?php _ex( 'France', 'frontend', 'eduadmin-booking' ); ?></option>
		<option
			value="GF"<?php selected( $selected_value, 'GF' ); ?>><?php _ex( 'French Guiana', 'frontend', 'eduadmin-booking' ); ?></option>
		<option
			value="PF"<?php selected( $selected_value, 'PF' ); ?>><?php _ex( 'French Polynesia', 'frontend', 'eduadmin-booking' ); ?></option>
		<option
			value="TF"<?php selected( $selected_value, 'TF' ); ?>><?php _ex( 'French Southern Territories', 'frontend', 'eduadmin-booking' ); ?></option>
		<option
			value="GA"<?php selected( $selected_value, 'GA' ); ?>><?php _ex( 'Gabon', 'frontend', 'eduadmin-booking' ); ?></option>
		<option
			value="GM"<?php selected( $selected_value, 'GM' ); ?>><?php _ex( 'Gambia', 'frontend', 'eduadmin-booking' ); ?></option>
		<option
			value="GE"<?php selected( $selected_value, 'GE' ); ?>><?php _ex( 'Georgia', 'frontend', 'eduadmin-booking' ); ?></option>
		<option
			value="DE"<?php selected( $selected_value, 'DE' ); ?>><?php _ex( 'Germany', 'frontend', 'eduadmin-booking' ); ?></option>
		<option
			value="GH"<?php selected( $selected_value, 'GH' ); ?>><?php _ex( 'Ghana', 'frontend', 'eduadmin-booking' ); ?></option>
		<option
			value="GI"<?php selected( $selected_value, 'GI' ); ?>><?php _ex( 'Gibraltar', 'frontend', 'eduadmin-booking' ); ?></option>
		<option
			value="GR"<?php selected( $selected_value, 'GR' ); ?>><?php _ex( 'Greece', 'frontend', 'eduadmin-booking' ); ?></option>
		<option
			value="GL"<?php selected( $selected_value, 'GL' ); ?>><?php _ex( 'Greenland', 'frontend', 'eduadmin-booking' ); ?></option>
		<option
			value="GD"<?php selected( $selected_value, 'GD' ); ?>><?php _ex( 'Grenada', 'frontend', 'eduadmin-booking' ); ?></option>
		<option
			value="GP"<?php selected( $selected_value, 'GP' ); ?>><?php _ex( 'Guadeloupe', 'frontend', 'eduadmin-booking' ); ?></option>
		<option
			value="GU"<?php selected( $selected_value, 'GU' ); ?>><?php _ex( 'Guam', 'frontend', 'eduadmin-booking' ); ?></option>
		<option
			value="GT"<?php selected( $selected_value, 'GT' ); ?>><?php _ex( 'Guatemala', 'frontend', 'eduadmin-booking' ); ?></option>
		<option
			value="GG"<?php selected( $selected_value, 'GG' ); ?>><?php _ex( 'Guernsey', 'frontend', 'eduadmin-booking' ); ?></option>
		<option
			value="GN"<?php selected( $selected_value, 'GN' ); ?>><?php _ex( 'Guinea', 'frontend', 'eduadmin-booking' ); ?></option>
		<option
			value="GW"<?php selected( $selected_value, 'GW' ); ?>><?php _ex( 'Guinea-Bissau', 'frontend', 'eduadmin-booking' ); ?></option>
		<option
			value="GY"<?php selected( $selected_value, 'GY' ); ?>><?php _ex( 'Guyana', 'frontend', 'eduadmin-booking' ); ?></option>
		<option
			value="HT"<?php selected( $selected_value, 'HT' ); ?>><?php _ex( 'Haiti', 'frontend', 'eduadmin-booking' ); ?></option>
		<option
			value="HM"<?php selected( $selected_value, 'HM' ); ?>><?php _ex( 'Heard Island and McDonald Islands', 'frontend', 'eduadmin-booking' ); ?></option>
		<option
			value="VA"<?php selected( $selected_value, 'VA' ); ?>><?php _ex( 'Holy See (Vatican City State)', 'frontend', 'eduadmin-booking' ); ?></option>
		<option
			value="HN"<?php selected( $selected_value, 'HN' ); ?>><?php _ex( 'Honduras', 'frontend', 'eduadmin-booking' ); ?></option>
		<option
			value="HK"<?php selected( $selected_value, 'HK' ); ?>><?php _ex( 'Hong Kong', 'frontend', 'eduadmin-booking' ); ?></option>
		<option
			value="HU"<?php selected( $selected_value, 'HU' ); ?>><?php _ex( 'Hungary', 'frontend', 'eduadmin-booking' ); ?></option>
		<option
			value="IS"<?php selected( $selected_value, 'IS' ); ?>><?php _ex( 'Iceland', 'frontend', 'eduadmin-booking' ); ?></option>
		<option
			value="IN"<?php selected( $selected_value, 'IN' ); ?>><?php _ex( 'India', 'frontend', 'eduadmin-booking' ); ?></option>
		<option
			value="ID"<?php selected( $selected_value, 'ID' ); ?>><?php _ex( 'Indonesia', 'frontend', 'eduadmin-booking' ); ?></option>
		<option
			value="IR"<?php selected( $selected_value, 'IR' ); ?>><?php _ex( 'Iran, Islamic Republic of', 'frontend', 'eduadmin-booking' ); ?></option>
		<option
			value="IQ"<?php selected( $selected_value, 'IQ' ); ?>><?php _ex( 'Iraq', 'frontend', 'eduadmin-booking' ); ?></option>
		<option
			value="IE"<?php selected( $selected_value, 'IE' ); ?>><?php _ex( 'Ireland', 'frontend', 'eduadmin-booking' ); ?></option>
		<option
			value="IM"<?php selected( $selected_value, 'IM' ); ?>><?php _ex( 'Isle of Man', 'frontend', 'eduadmin-booking' ); ?></option>
		<option
			value="IL"<?php selected( $selected_value, 'IL' ); ?>><?php _ex( 'Israel', 'frontend', 'eduadmin-booking' ); ?></option>
		<option
			value="IT"<?php selected( $selected_value, 'IT' ); ?>><?php _ex( 'Italy', 'frontend', 'eduadmin-booking' ); ?></option>
		<option
			value="JM"<?php selected( $selected_value, 'JM' ); ?>><?php _ex( 'Jamaica', 'frontend', 'eduadmin-booking' ); ?></option>
		<option
			value="JP"<?php selected( $selected_value, 'JP' ); ?>><?php _ex( 'Japan', 'frontend', 'eduadmin-booking' ); ?></option>
		<option
			value="JE"<?php selected( $selected_value, 'JE' ); ?>><?php _ex( 'Jersey', 'frontend', 'eduadmin-booking' ); ?></option>
		<option
			value="JO"<?php selected( $selected_value, 'JO' ); ?>><?php _ex( 'Jordan', 'frontend', 'eduadmin-booking' ); ?></option>
		<option
			value="KZ"<?php selected( $selected_value, 'KZ' ); ?>><?php _ex( 'Kazakhstan', 'frontend', 'eduadmin-booking' ); ?></option>
		<option
			value="KE"<?php selected( $selected_value, 'KE' ); ?>><?php _ex( 'Kenya', 'frontend', 'eduadmin-booking' ); ?></option>
		<option
			value="KI"<?php selected( $selected_value, 'KI' ); ?>><?php _ex( 'Kiribati', 'frontend', 'eduadmin-booking' ); ?></option>
		<option
			value="KP"<?php selected( $selected_value, 'KP' ); ?>><?php _ex( 'Korea, Democratic People\'s Republic of', 'frontend', 'eduadmin-booking' ); ?></option>
		<option
			value="KR"<?php selected( $selected_value, 'KR' ); ?>><?php _ex( 'Korea, Republic of', 'frontend', 'eduadmin-booking' ); ?></option>
		<option
			value="KW"<?php selected( $selected_value, 'KW' ); ?>><?php _ex( 'Kuwait', 'frontend', 'eduadmin-booking' ); ?></option>
		<option
			value="KG"<?php selected( $selected_value, 'KG' ); ?>><?php _ex( 'Kyrgyzstan', 'frontend', 'eduadmin-booking' ); ?></option>
		<option
			value="LA"<?php selected( $selected_value, 'LA' ); ?>><?php _ex( 'Lao People\'s Democratic Republic', 'frontend', 'eduadmin-booking' ); ?></option>
		<option
			value="LV"<?php selected( $selected_value, 'LV' ); ?>><?php _ex( 'Latvia', 'frontend', 'eduadmin-booking' ); ?></option>
		<option
			value="LB"<?php selected( $selected_value, 'LB' ); ?>><?php _ex( 'Lebanon', 'frontend', 'eduadmin-booking' ); ?></option>
		<option
			value="LS"<?php selected( $selected_value, 'LS' ); ?>><?php _ex( 'Lesotho', 'frontend', 'eduadmin-booking' ); ?></option>
		<option
			value="LR"<?php selected( $selected_value, 'LR' ); ?>><?php _ex( 'Liberia', 'frontend', 'eduadmin-booking' ); ?></option>
		<option
			value="LY"<?php selected( $selected_value, 'LY' ); ?>><?php _ex( 'Libya', 'frontend', 'eduadmin-booking' ); ?></option>
		<option
			value="LI"<?php selected( $selected_value, 'LI' ); ?>><?php _ex( 'Liechtenstein', 'frontend', 'eduadmin-booking' ); ?></option>
		<option
			value="LT"<?php selected( $selected_value, 'LT' ); ?>><?php _ex( 'Lithuania', 'frontend', 'eduadmin-booking' ); ?></option>
		<option
			value="LU"<?php selected( $selected_value, 'LU' ); ?>><?php _ex( 'Luxembourg', 'frontend', 'eduadmin-booking' ); ?></option>
		<option
			value="MO"<?php selected( $selected_value, 'MO' ); ?>><?php _ex( 'Macao', 'frontend', 'eduadmin-booking' ); ?></option>
		<option
			value="MK"<?php selected( $selected_value, 'MK' ); ?>><?php _ex( 'Macedonia, the former Yugoslav Republic of', 'frontend', 'eduadmin-booking' ); ?></option>
		<option
			value="MG"<?php selected( $selected_value, 'MG' ); ?>><?php _ex( 'Madagascar', 'frontend', 'eduadmin-booking' ); ?></option>
		<option
			value="MW"<?php selected( $selected_value, 'MW' ); ?>><?php _ex( 'Malawi', 'frontend', 'eduadmin-booking' ); ?></option>
		<option
			value="MY"<?php selected( $selected_value, 'MY' ); ?>><?php _ex( 'Malaysia', 'frontend', 'eduadmin-booking' ); ?></option>
		<option
			value="MV"<?php selected( $selected_value, 'MV' ); ?>><?php _ex( 'Maldives', 'frontend', 'eduadmin-booking' ); ?></option>
		<option
			value="ML"<?php selected( $selected_value, 'ML' ); ?>><?php _ex( 'Mali', 'frontend', 'eduadmin-booking' ); ?></option>
		<option
			value="MT"<?php selected( $selected_value, 'MT' ); ?>><?php _ex( 'Malta', 'frontend', 'eduadmin-booking' ); ?></option>
		<option
			value="MH"<?php selected( $selected_value, 'MH' ); ?>><?php _ex( 'Marshall Islands', 'frontend', 'eduadmin-booking' ); ?></option>
		<option
			value="MQ"<?php selected( $selected_value, 'MQ' ); ?>><?php _ex( 'Martinique', 'frontend', 'eduadmin-booking' ); ?></option>
		<option
			value="MR"<?php selected( $selected_value, 'MR' ); ?>><?php _ex( 'Mauritania', 'frontend', 'eduadmin-booking' ); ?></option>
		<option
			value="MU"<?php selected( $selected_value, 'MU' ); ?>><?php _ex( 'Mauritius', 'frontend', 'eduadmin-booking' ); ?></option>
		<option
			value="YT"<?php selected( $selected_value, 'YT' ); ?>><?php _ex( 'Mayotte', 'frontend', 'eduadmin-booking' ); ?></option>
		<option
			value="MX"<?php selected( $selected_value, 'MX' ); ?>><?php _ex( 'Mexico', 'frontend', 'eduadmin-booking' ); ?></option>
		<option
			value="FM"<?php selected( $selected_value, 'FM' ); ?>><?php _ex( 'Micronesia, Federated States of', 'frontend', 'eduadmin-booking' ); ?></option>
		<option
			value="MD"<?php selected( $selected_value, 'MD' ); ?>><?php _ex( 'Moldova, Republic of', 'frontend', 'eduadmin-booking' ); ?></option>
		<option
			value="MC"<?php selected( $selected_value, 'MC' ); ?>><?php _ex( 'Monaco', 'frontend', 'eduadmin-booking' ); ?></option>
		<option
			value="MN"<?php selected( $selected_value, 'MN' ); ?>><?php _ex( 'Mongolia', 'frontend', 'eduadmin-booking' ); ?></option>
		<option
			value="ME"<?php selected( $selected_value, 'ME' ); ?>><?php _ex( 'Montenegro', 'frontend', 'eduadmin-booking' ); ?></option>
		<option
			value="MS"<?php selected( $selected_value, 'MS' ); ?>><?php _ex( 'Montserrat', 'frontend', 'eduadmin-booking' ); ?></option>
		<option
			value="MA"<?php selected( $selected_value, 'MA' ); ?>><?php _ex( 'Morocco', 'frontend', 'eduadmin-booking' ); ?></option>
		<option
			value="MZ"<?php selected( $selected_value, 'MZ' ); ?>><?php _ex( 'Mozambique', 'frontend', 'eduadmin-booking' ); ?></option>
		<option
			value="MM"<?php selected( $selected_value, 'MM' ); ?>><?php _ex( 'Myanmar', 'frontend', 'eduadmin-booking' ); ?></option>
		<option
			value="NA"<?php selected( $selected_value, 'NA' ); ?>><?php _ex( 'Namibia', 'frontend', 'eduadmin-booking' ); ?></option>
		<option
			value="NR"<?php selected( $selected_value, 'NR' ); ?>><?php _ex( 'Nauru', 'frontend', 'eduadmin-booking' ); ?></option>
		<option
			value="NP"<?php selected( $selected_value, 'NP' ); ?>><?php _ex( 'Nepal', 'frontend', 'eduadmin-booking' ); ?></option>
		<option
			value="NL"<?php selected( $selected_value, 'NL' ); ?>><?php _ex( 'Netherlands', 'frontend', 'eduadmin-booking' ); ?></option>
		<option
			value="NC"<?php selected( $selected_value, 'NC' ); ?>><?php _ex( 'New Caledonia', 'frontend', 'eduadmin-booking' ); ?></option>
		<option
			value="NZ"<?php selected( $selected_value, 'NZ' ); ?>><?php _ex( 'New Zealand', 'frontend', 'eduadmin-booking' ); ?></option>
		<option
			value="NI"<?php selected( $selected_value, 'NI' ); ?>><?php _ex( 'Nicaragua', 'frontend', 'eduadmin-booking' ); ?></option>
		<option
			value="NE"<?php selected( $selected_value, 'NE' ); ?>><?php _ex( 'Niger', 'frontend', 'eduadmin-booking' ); ?></option>
		<option
			value="NG"<?php selected( $selected_value, 'NG' ); ?>><?php _ex( 'Nigeria', 'frontend', 'eduadmin-booking' ); ?></option>
		<option
			value="NU"<?php selected( $selected_value, 'NU' ); ?>><?php _ex( 'Niue', 'frontend', 'eduadmin-booking' ); ?></option>
		<option
			value="NF"<?php selected( $selected_value, 'NF' ); ?>><?php _ex( 'Norfolk Island', 'frontend', 'eduadmin-booking' ); ?></option>
		<option
			value="MP"<?php selected( $selected_value, 'MP' ); ?>><?php _ex( 'Northern Mariana Islands', 'frontend', 'eduadmin-booking' ); ?></option>
		<option
			value="NO"<?php selected( $selected_value, 'NO' ); ?>><?php _ex( 'Norway', 'frontend', 'eduadmin-booking' ); ?></option>
		<option
			value="OM"<?php selected( $selected_value, 'OM' ); ?>><?php _ex( 'Oman', 'frontend', 'eduadmin-booking' ); ?></option>
		<option
			value="PK"<?php selected( $selected_value, 'PK' ); ?>><?php _ex( 'Pakistan', 'frontend', 'eduadmin-booking' ); ?></option>
		<option
			value="PW"<?php selected( $selected_value, 'PW' ); ?>><?php _ex( 'Palau', 'frontend', 'eduadmin-booking' ); ?></option>
		<option
			value="PS"<?php selected( $selected_value, 'PS' ); ?>><?php _ex( 'Palestinian Territory, Occupied', 'frontend', 'eduadmin-booking' ); ?></option>
		<option
			value="PA"<?php selected( $selected_value, 'PA' ); ?>><?php _ex( 'Panama', 'frontend', 'eduadmin-booking' ); ?></option>
		<option
			value="PG"<?php selected( $selected_value, 'PG' ); ?>><?php _ex( 'Papua New Guinea', 'frontend', 'eduadmin-booking' ); ?></option>
		<option
			value="PY"<?php selected( $selected_value, 'PY' ); ?>><?php _ex( 'Paraguay', 'frontend', 'eduadmin-booking' ); ?></option>
		<option
			value="PE"<?php selected( $selected_value, 'PE' ); ?>><?php _ex( 'Peru', 'frontend', 'eduadmin-booking' ); ?></option>
		<option
			value="PH"<?php selected( $selected_value, 'PH' ); ?>><?php _ex( 'Philippines', 'frontend', 'eduadmin-booking' ); ?></option>
		<option
			value="PN"<?php selected( $selected_value, 'PN' ); ?>><?php _ex( 'Pitcairn', 'frontend', 'eduadmin-booking' ); ?></option>
		<option
			value="PL"<?php selected( $selected_value, 'PL' ); ?>><?php _ex( 'Poland', 'frontend', 'eduadmin-booking' ); ?></option>
		<option
			value="PT"<?php selected( $selected_value, 'PT' ); ?>><?php _ex( 'Portugal', 'frontend', 'eduadmin-booking' ); ?></option>
		<option
			value="PR"<?php selected( $selected_value, 'PR' ); ?>><?php _ex( 'Puerto Rico', 'frontend', 'eduadmin-booking' ); ?></option>
		<option
			value="QA"<?php selected( $selected_value, 'QA' ); ?>><?php _ex( 'Qatar', 'frontend', 'eduadmin-booking' ); ?></option>
		<option
			value="RE"<?php selected( $selected_value, 'RE' ); ?>><?php _ex( 'Réunion', 'frontend', 'eduadmin-booking' ); ?></option>
		<option
			value="RO"<?php selected( $selected_value, 'RO' ); ?>><?php _ex( 'Romania', 'frontend', 'eduadmin-booking' ); ?></option>
		<option
			value="RU"<?php selected( $selected_value, 'RU' ); ?>><?php _ex( 'Russian Federation', 'frontend', 'eduadmin-booking' ); ?></option>
		<option
			value="RW"<?php selected( $selected_value, 'RW' ); ?>><?php _ex( 'Rwanda', 'frontend', 'eduadmin-booking' ); ?></option>
		<option
			value="BL"<?php selected( $selected_value, 'BL' ); ?>><?php _ex( 'Saint Barthélemy', 'frontend', 'eduadmin-booking' ); ?></option>
		<option
			value="SH"<?php selected( $selected_value, 'SH' ); ?>><?php _ex( 'Saint Helena, Ascension and Tristan da Cunha', 'frontend', 'eduadmin-booking' ); ?></option>
		<option
			value="KN"<?php selected( $selected_value, 'KN' ); ?>><?php _ex( 'Saint Kitts and Nevis', 'frontend', 'eduadmin-booking' ); ?></option>
		<option
			value="LC"<?php selected( $selected_value, 'LC' ); ?>><?php _ex( 'Saint Lucia', 'frontend', 'eduadmin-booking' ); ?></option>
		<option
			value="MF"<?php selected( $selected_value, 'MF' ); ?>><?php _ex( 'Saint Martin (French part)', 'frontend', 'eduadmin-booking' ); ?></option>
		<option value="PM"<?php selected( $selected_value, 'PM' ); ?>>
			<?php _ex( 'Saint Pierre and Miquelon', 'frontend', 'eduadmin-booking' ); ?>
		</option>
		<option value="VC"<?php selected( $selected_value, 'VC' ); ?>>
			<?php _ex( 'Saint Vincent and the Grenadines', 'frontend', 'eduadmin-booking' ); ?>
		</option>
		<option value="WS"<?php selected( $selected_value, 'WS' ); ?>>
			<?php _ex( 'Samoa', 'frontend', 'eduadmin-booking' ); ?>
		</option>
		<option value="SM"<?php selected( $selected_value, 'SM' ); ?>>
			<?php _ex( 'San Marino', 'frontend', 'eduadmin-booking' ); ?>
		</option>
		<option value="ST"<?php selected( $selected_value, 'ST' ); ?>>
			<?php _ex( 'Sao Tome and Principe', 'frontend', 'eduadmin-booking' ); ?>
		</option>
		<option value="SA"<?php selected( $selected_value, 'SA' ); ?>>
			<?php _ex( 'Saudi Arabia', 'frontend', 'eduadmin-booking' ); ?>
		</option>
		<option value="SN"<?php selected( $selected_value, 'SN' ); ?>>
			<?php _ex( 'Senegal', 'frontend', 'eduadmin-booking' ); ?>
		</option>
		<option value="RS"<?php selected( $selected_value, 'RS' ); ?>>
			<?php _ex( 'Serbia', 'frontend', 'eduadmin-booking' ); ?>
		</option>
		<option value="SC"<?php selected( $selected_value, 'SC' ); ?>>
			<?php _ex( 'Seychelles', 'frontend', 'eduadmin-booking' ); ?>
		</option>
		<option value="SL"<?php selected( $selected_value, 'SL' ); ?>>
			<?php _ex( 'Sierra Leone', 'frontend', 'eduadmin-booking' ); ?>
		</option>
		<option value="SG"<?php selected( $selected_value, 'SG' ); ?>>
			<?php _ex( 'Singapore', 'frontend', 'eduadmin-booking' ); ?>
		</option>
		<option value="SX"<?php selected( $selected_value, 'SX' ); ?>>
			<?php _ex( 'Sint Maarten (Dutch part)', 'frontend', 'eduadmin-booking' ); ?>
		</option>
		<option value="SK"<?php selected( $selected_value, 'SK' ); ?>>
			<?php _ex( 'Slovakia', 'frontend', 'eduadmin-booking' ); ?>
		</option>
		<option value="SI"<?php selected( $selected_value, 'SI' ); ?>>
			<?php _ex( 'Slovenia', 'frontend', 'eduadmin-booking' ); ?>
		</option>
		<option value="SB"<?php selected( $selected_value, 'SB' ); ?>>
			<?php _ex( 'Solomon Islands', 'frontend', 'eduadmin-booking' ); ?>
		</option>
		<option value="SO"<?php selected( $selected_value, 'SO' ); ?>>
			<?php _ex( 'Somalia', 'frontend', 'eduadmin-booking' ); ?>
		</option>
		<option value="ZA"<?php selected( $selected_value, 'ZA' ); ?>>
			<?php _ex( 'South Africa', 'frontend', 'eduadmin-booking' ); ?>
		</option>
		<option value="GS"<?php selected( $selected_value, 'GS' ); ?>>
			<?php _ex( 'South Georgia and the South Sandwich Islands', 'frontend', 'eduadmin-booking' ); ?>
		</option>
		<option value="SS"<?php selected( $selected_value, 'SS' ); ?>>
			<?php _ex( 'South Sudan', 'frontend', 'eduadmin-booking' ); ?>
		</option>
		<option value="ES"<?php selected( $selected_value, 'ES' ); ?>>
			<?php _ex( 'Spain', 'frontend', 'eduadmin-booking' ); ?>
		</option>
		<option value="LK"<?php selected( $selected_value, 'LK' ); ?>>
			<?php _ex( 'Sri Lanka', 'frontend', 'eduadmin-booking' ); ?>
		</option>
		<option value="SD"<?php selected( $selected_value, 'SD' ); ?>>
			<?php _ex( 'Sudan', 'frontend', 'eduadmin-booking' ); ?>
		</option>
		<option value="SR"<?php selected( $selected_value, 'SR' ); ?>>
			<?php _ex( 'Suriname', 'frontend', 'eduadmin-booking' ); ?>
		</option>
		<option value="SJ"<?php selected( $selected_value, 'SJ' ); ?>>
			<?php _ex( 'Svalbard and Jan Mayen', 'frontend', 'eduadmin-booking' ); ?>
		</option>
		<option value="SZ"<?php selected( $selected_value, 'SZ' ); ?>>
			<?php _ex( 'Swaziland', 'frontend', 'eduadmin-booking' ); ?>
		</option>
		<option value="SE"<?php selected( $selected_value, 'SE' ); ?>>
			<?php _ex( 'Sweden', 'frontend', 'eduadmin-booking' ); ?>
		</option>
		<option value="CH"<?php selected( $selected_value, 'CH' ); ?>>
			<?php _ex( 'Switzerland', 'frontend', 'eduadmin-booking' ); ?>
		</option>
		<option value="SY"<?php selected( $selected_value, 'SY' ); ?>>
			<?php _ex( 'Syrian Arab Republic', 'frontend', 'eduadmin-booking' ); ?>
		</option>
		<option value="TW"<?php selected( $selected_value, 'TW' ); ?>>
			<?php _ex( 'Taiwan, Province of China', 'frontend', 'eduadmin-booking' ); ?>
		</option>
		<option value="TJ"<?php selected( $selected_value, 'TJ' ); ?>>
			<?php _ex( 'Tajikistan', 'frontend', 'eduadmin-booking' ); ?>
		</option>
		<option value="TZ"<?php selected( $selected_value, 'TZ' ); ?>>
			<?php _ex( 'Tanzania, United Republic of', 'frontend', 'eduadmin-booking' ); ?>
		</option>
		<option value="TH"<?php selected( $selected_value, 'TH' ); ?>>
			<?php _ex( 'Thailand', 'frontend', 'eduadmin-booking' ); ?>
		</option>
		<option value="TL"<?php selected( $selected_value, 'TL' ); ?>>
			<?php _ex( 'Timor-Leste', 'frontend', 'eduadmin-booking' ); ?>
		</option>
		<option value="TG"<?php selected( $selected_value, 'TG' ); ?>>
			<?php _ex( 'Togo', 'frontend', 'eduadmin-booking' ); ?>
		</option>
		<option value="TK"<?php selected( $selected_value, 'TK' ); ?>>
			<?php _ex( 'Tokelau', 'frontend', 'eduadmin-booking' ); ?>
		</option>
		<option value="TO"<?php selected( $selected_value, 'TO' ); ?>>
			<?php _ex( 'Tonga', 'frontend', 'eduadmin-booking' ); ?>
		</option>
		<option value="TT"<?php selected( $selected_value, 'TT' ); ?>>
			<?php _ex( 'Trinidad and Tobago', 'frontend', 'eduadmin-booking' ); ?>
		</option>
		<option value="TN"<?php selected( $selected_value, 'TN' ); ?>>
			<?php _ex( 'Tunisia', 'frontend', 'eduadmin-booking' ); ?>
		</option>
		<option value="TR"<?php selected( $selected_value, 'TR' ); ?>>
			<?php _ex( 'Turkey', 'frontend', 'eduadmin-booking' ); ?>
		</option>
		<option value="TM"<?php selected( $selected_value, 'TM' ); ?>>
			<?php _ex( 'Turkmenistan', 'frontend', 'eduadmin-booking' ); ?>
		</option>
		<option value="TC"<?php selected( $selected_value, 'TC' ); ?>>
			<?php _ex( 'Turks and Caicos Islands', 'frontend', 'eduadmin-booking' ); ?>
		</option>
		<option value="TV"<?php selected( $selected_value, 'TV' ); ?>>
			<?php _ex( 'Tuvalu', 'frontend', 'eduadmin-booking' ); ?>
		</option>
		<option value="UG"<?php selected( $selected_value, 'UG' ); ?>>
			<?php _ex( 'Uganda', 'frontend', 'eduadmin-booking' ); ?>
		</option>
		<option value="UA"<?php selected( $selected_value, 'UA' ); ?>>
			<?php _ex( 'Ukraine', 'frontend', 'eduadmin-booking' ); ?>
		</option>
		<option value="AE"<?php selected( $selected_value, 'AE' ); ?>>
			<?php _ex( 'United Arab Emirates', 'frontend', 'eduadmin-booking' ); ?>
		</option>
		<option value="GB"<?php selected( $selected_value, 'GB' ); ?>>
			<?php _ex( 'United Kingdom', 'frontend', 'eduadmin-booking' ); ?>
		</option>
		<option value="US"<?php selected( $selected_value, 'US' ); ?>>
			<?php _ex( 'United States', 'frontend', 'eduadmin-booking' ); ?>
		</option>
		<option value="UM"<?php selected( $selected_value, 'UM' ); ?>>
			<?php _ex( 'United States Minor Outlying Islands', 'frontend', 'eduadmin-booking' ); ?>
		</option>
		<option value="UY"<?php selected( $selected_value, 'UY' ); ?>>
			<?php _ex( 'Uruguay', 'frontend', 'eduadmin-booking' ); ?>
		</option>
		<option value="UZ"<?php selected( $selected_value, 'UZ' ); ?>>
			<?php _ex( 'Uzbekistan', 'frontend', 'eduadmin-booking' ); ?>
		</option>
		<option value="VU"<?php selected( $selected_value, 'VU' ); ?>>
			<?php _ex( 'Vanuatu', 'frontend', 'eduadmin-booking' ); ?>
		</option>
		<option value="VE"<?php selected( $selected_value, 'VE' ); ?>>
			<?php _ex( 'Venezuela, Bolivarian Republic of', 'frontend', 'eduadmin-booking' ); ?>
		</option>
		<option value="VN"<?php selected( $selected_value, 'VN' ); ?>>
			<?php _ex( 'Viet Nam', 'frontend', 'eduadmin-booking' ); ?>
		</option>
		<option value="VG"<?php selected( $selected_value, 'VG' ); ?>>
			<?php _ex( 'Virgin Islands, British', 'frontend', 'eduadmin-booking' ); ?>
		</option>
		<option value="VI"<?php selected( $selected_value, 'VI' ); ?>>
			<?php _ex( 'Virgin Islands, U.S.', 'frontend', 'eduadmin-booking' ); ?>
		</option>
		<option value="WF"<?php selected( $selected_value, 'WF' ); ?>>
			<?php _ex( 'Wallis and Futuna', 'frontend', 'eduadmin-booking' ); ?>
		</option>
		<option value="EH"<?php selected( $selected_value, 'EH' ); ?>>
			<?php _ex( 'Western Sahara', 'frontend', 'eduadmin-booking' ); ?>
		</option>
		<option value="YE"<?php selected( $selected_value, 'YE' ); ?>>
			<?php _ex( 'Yemen', 'frontend', 'eduadmin-booking' ); ?>
		</option>
		<option value="ZM"<?php selected( $selected_value, 'ZM' ); ?>>
			<?php _ex( 'Zambia', 'frontend', 'eduadmin-booking' ); ?>
		</option>
		<option value="ZW"<?php selected( $selected_value, 'ZW' ); ?>>
			<?php _ex( 'Zimbabwe', 'frontend', 'eduadmin-booking' ); ?>
		</option>
	</select>
	<?php
}

function edu_get_query_string( $prepend = '?', $remove_parameters = array() ) {
	array_push( $remove_parameters, 'eduadmin-thankyou' );
	array_push( $remove_parameters, 'q' );
	array_push( $remove_parameters, '_' );
	foreach ( $remove_parameters as $par ) {
		unset( $_GET[ $par ] );
	}
	if ( ! empty( $_GET ) ) {
		return $prepend . http_build_query( $_GET );
	}

	return '';
}

function get_spots_left( $free_spots, $max_spots, $spot_option = 'exactNumbers', $spot_settings = "1-5\n5-10\n10+", $always_few_spots = 3 ) {
	if ( 0 === intval( $max_spots ) ) {
		return _x( 'Spots left', 'frontend', 'eduadmin-booking' );
	}

	if ( intval( $free_spots ) <= 0 ) {
		return _x( 'No spots left', 'frontend', 'eduadmin-booking' );
	}

	switch ( $spot_option ) {
		case 'exactNumbers':
			/* translators: 1: Number of spots */

			return sprintf( _n( '%1$s spot left', '%1$s spots left', $free_spots, 'eduadmin-booking' ), $free_spots );
		case 'onlyText':
			$few_spots_limit = intval( $always_few_spots );
			if ( intval( $free_spots ) > ( intval( $max_spots ) - $few_spots_limit ) ) {
				return _x( 'Spots left', 'frontend', 'eduadmin-booking' );
			} elseif ( intval( $free_spots ) <= ( intval( $max_spots ) - $few_spots_limit ) && 1 !== intval( $free_spots ) ) {
				return _x( 'Few spots left', 'frontend', 'eduadmin-booking' );
			} elseif ( 1 === intval( $free_spots ) ) {
				return _x( 'One spot left', 'frontend', 'eduadmin-booking' );
			} elseif ( intval( $free_spots ) <= 0 ) {
				return _x( 'No spots left', 'frontend', 'eduadmin-booking' );
			}

			return _x( 'Spots left', 'frontend', 'eduadmin-booking' );
		case 'intervals':
			$interval = $spot_settings;
			if ( empty( $interval ) ) {
				/* translators: 1: Number of spots */

				return sprintf( _n( '%1$s spot left', '%1$s spots left', $free_spots, 'eduadmin-booking' ), $free_spots );
			} else {
				$lines = explode( "\n", $interval );
				foreach ( $lines as $line ) {
					if ( stripos( $line, '-' ) > -1 ) {
						$range = explode( '-', $line );
						$min   = intval( $range[0] );
						$max   = intval( $range[1] );
						if ( intval( $free_spots ) <= $max && intval( $free_spots ) >= $min ) {
							/* translators: 1: Number of spots (range) */

							return sprintf( _x( '%1$s spots left', 'frontend', 'eduadmin-booking' ), $line );
						}
					} elseif ( stripos( $line, '+' ) > -1 ) {
						/* translators: 1: Number of spots (range) */

						return sprintf( _x( '%1$s spots left', 'frontend', 'eduadmin-booking' ), $line );
					}
				}

				/* translators: 1: Number of spots */

				return sprintf( _n( '%1$s spot left', '%1$s spots left', $free_spots, 'eduadmin-booking' ), $free_spots );
			}

		case 'alwaysFewSpots':
			$min_participants = $always_few_spots;
			if ( ( $max_spots - intval( $free_spots ) ) >= $min_participants ) {
				return _x( 'Few spots left', 'frontend', 'eduadmin-booking' );
			}

			return _x( 'Spots left', 'frontend', 'eduadmin-booking' );
		default:
			return '';
	}
}

function get_utf8( $input ) {
	$order = array( 'utf-8', 'iso-8859-1', 'iso-8859-15', 'windows-1251' );
	if ( 'UTF-8' === mb_detect_encoding( $input, $order, true ) ) {
		return $input;
	}

	return mb_convert_encoding( $input, 'utf-8', $order );
}

function date_version( $date ) {
	return sprintf(
		'%1$s-%2$s-%3$s.%4$s',
		date_i18n( 'Y', $date ),
		date_i18n( 'm', $date ),
		date_i18n( 'd', $date ),
		date_i18n( 'His', $date )
	);
}

function convert_to_money( $value, $currency = 'SEK', $decimal = ',', $thousand = ' ' ) {
	$d = $value;
	if ( empty( $d ) ) {
		$d = 0;
	}

	$d = sprintf( '%1$s %2$s', number_format( $d, 0, $decimal, $thousand ), $currency );

	return $d;
}

function edu_timezone_shim() {
	$offset  = (float) get_option( 'gmt_offset' );
	$hours   = (int) $offset;
	$minutes = ( $offset - $hours );

	$sign     = ( $offset < 0 ) ? '-' : '+';
	$abs_hour = abs( $hours );
	$abs_mins = abs( $minutes * 60 );

	return sprintf( '%s%02d:%02d', $sign, $abs_hour, $abs_mins );
}

function edu_now_date() {
	$timezone_string = get_option( 'timezone_string' );
	if ( $timezone_string ) {
		date_default_timezone_set( $timezone_string );
	}
	$offset    = (float) get_option( 'gmt_offset' );
	$timestamp = time() + $offset;

	return date( "Y-m-d\TH:i:s", $timestamp ) . edu_timezone_shim();
}

function edu_get_timezoned_date( $dateformat, $input_date = null ) {
	$t          = EDU()->start_timer( __METHOD__ );
	$orig_input = $input_date;
	if ( $input_date == null || $input_date == "" ) {
		$input_date = edu_now_date();
	}

	if ( stripos( $input_date, "now" ) !== false ) {
		if ( $input_date === "now" ) {
			$offset     = (float) get_option( 'gmt_offset' );
			$input_date = "now " . date( "H:i:s", strtotime( "now" ) + $offset );
		}
		$input_date = date( "c", strtotime( substr( edu_now_date(), 0, 10 ) . " " . substr( $input_date, 4 ) ) );
	}

	if ( ! empty( $_GET['edu-debugdates'] ) && '1' === $_GET['edu-debugdates'] ) { // Input var okay.
		echo "<!-- " . print_r( [
			                        $dateformat,
			                        $orig_input,
			                        $input_date,
			                        get_date_from_gmt( $input_date, $dateformat ),
			                        edu_timezone_shim(),
			                        date( "Z" ),
			                        debug_backtrace()[1]['function'],
		                        ], true ) . "-->\n";
	}
	EDU()->stop_timer( $t );

	return get_date_from_gmt( $input_date, $dateformat );
}

function get_display_date( $in_date, $short = true ) {
	$months = $short ? EDU()->short_months : EDU()->months;

	$year     = edu_get_timezoned_date( 'Y', $in_date );
	$now_year = date( 'Y' );

	return '<span class="eduadmin-dateText" data-date="' . esc_attr( $in_date ) . '">' .
	       edu_get_timezoned_date( 'd', $in_date ) . ' ' .
	       $months[ edu_get_timezoned_date( 'n', $in_date ) ] .
	       ( $now_year !== $year ? ' ' . $year : '' ) .
	       '</span>';
}

function get_logical_date_groups( $dates, $short = false, $event = null, $show_days = false, $overridden = false, $always_show_schedule = false, $never_group = false ) {
	if ( count( $dates ) > 3 && ! $overridden ) {
		$short     = true;
		$show_days = true;
	}

	$n_dates = edu_get_date_range( $dates, $short, $event, $show_days, $always_show_schedule, $never_group );

	return join( '<span class="edu-dateSeparator"></span>', $n_dates );
}

function edu_get_date_range( $days, $short, $event, $show_days, $always_show_schedule = false, $never_group = false ) {
	usort( $days, "DateComparer" );

	if ( 1 === count( $days ) && ! $always_show_schedule ) {
		return array( get_start_end_display_date( $days[0], $days[0], $short, $event, $show_days ) );
	}

	$added_dates = array();

	$total_days = count( $days );

	for ( $x = 0; $x < $total_days; $x++ ) {
		$day = $days[ $x ];

		$added_dates[ edu_get_timezoned_date( 'H:i', $day['StartDate'] ) . '-' . edu_get_timezoned_date( 'H:i', $day['EndDate'] ) ][] = $day;
	}

	$ordered_dategroups = array();

	if ( $never_group ) {
		foreach ( $days as $day ) {
			$ordered_dategroups[ $day["StartDate"] ] = get_start_end_display_date( $day, $day, $short, $event, $show_days );
		}
	} else {
		foreach ( $added_dates as $time => $_days ) {
			$start_date  = $_days[0];
			$finish_date = $_days[ count( $_days ) - 1 ];
			foreach ( $_days as $key => $date ) {
				if ( $key > 0 && ( strtotime( $date['StartDate'] ) - strtotime( $_days[ $key - 1 ]['StartDate'] ) > 99999 ) ) {
					$ordered_dategroups[ $start_date['StartDate'] ] = get_start_end_display_date( $start_date, $_days[ $key - 1 ], $short, $event, $show_days );
					$start_date                                     = $date;
				}
			}
			$ordered_dategroups[ $start_date['StartDate'] ] = get_start_end_display_date( $start_date, $finish_date, $short, $event, $show_days );
		}
	}

	ksort( $ordered_dategroups );

	if ( count( $ordered_dategroups ) > 3 || $always_show_schedule ) {
		$n_res = array();
		$ret   =
			'<span class="edu-manyDays" title="' . esc_attr_x( 'Show schedule', 'frontend', 'eduadmin-booking' ) . '" onclick="edu_openDatePopup(this);">' .
			/* translators: 1: Number of days 2: Date range */
			wp_kses_post( sprintf( _x( '%1$d days between %2$s', 'frontend', 'eduadmin-booking' ), count( $days ), get_start_end_display_date( $days[0], end( $days ), $short, $show_days ) ) ) .
			'</span><div class="edu-DayPopup">
<b>' . esc_html_x( 'Schedule', 'frontend', 'eduadmin-booking' ) . '</b><br />
' . join( "<br />\n", $ordered_dategroups ) . '
<br />
<a href="javascript://" onclick="edu_closeDatePopup(event, this);">' . esc_html_x( 'Close', 'frontend', 'eduadmin-booking' ) . '</a>
</div>';

		$n_res[] = $ret;

		return $n_res;
	}

	return $ordered_dategroups;
}

function get_start_end_display_date( $start_date, $end_date, $short, $event, $show_days = false ) {
	$week_days = $short ? EDU()->short_week_days : EDU()->week_days;
	$months    = $short ? EDU()->short_months : EDU()->months;

	$start_year  = edu_get_timezoned_date( 'Y', $start_date['StartDate'] );
	$start_month = edu_get_timezoned_date( 'n', $start_date['StartDate'] );
	$end_year    = edu_get_timezoned_date( 'Y', $end_date['EndDate'] );
	$end_month   = edu_get_timezoned_date( 'n', $end_date['EndDate'] );
	$now_year    = edu_get_timezoned_date( 'Y' );

	$str = '<span class="eduadmin-dateText" data-startdate="' . esc_attr( $start_date['StartDate'] ) . '" data-enddate="' . esc_attr( $end_date['EndDate'] ) . '">';

	if ( $show_days ) {
		$str .= $week_days[ edu_get_timezoned_date( 'N', $start_date['StartDate'] ) ] . ' ';
	}
	$str .= edu_get_timezoned_date( 'd', $start_date['StartDate'] );
	if ( edu_get_timezoned_date( 'Y-m-d', $start_date['StartDate'] ) !== edu_get_timezoned_date( 'Y-m-d', $end_date['EndDate'] ) ) {
		if ( $start_year === $end_year ) {
			if ( $start_month === $end_month ) {
				if ( $show_days && ( edu_get_timezoned_date( 'H:i', $start_date['StartDate'] ) !== edu_get_timezoned_date( 'H:i', $end_date['StartDate'] ) && edu_get_timezoned_date( 'H:i', $start_date['EndDate'] ) !== edu_get_timezoned_date( 'H:i', $end_date['EndDate'] ) )
				) {
					$str .= ' ' . edu_get_timezoned_date( 'H:i', $start_date['StartDate'] ) . '-' . edu_get_timezoned_date( 'H:i', $start_date['EndDate'] );
				}
				$str .= ' - ';
				if ( $show_days ) {
					$str .= $week_days[ edu_get_timezoned_date( 'N', $end_date['EndDate'] ) ] . ' ';
				}
				$str .= edu_get_timezoned_date( 'd', $end_date['EndDate'] );
				$str .= ' ';
				$str .= $months[ edu_get_timezoned_date( 'n', $start_date['StartDate'] ) ];
				$str .= ( $now_year !== $start_year ? ' ' . $start_year : '' );
				if ( $show_days ) {
					$str .= ' ' . edu_get_timezoned_date( 'H:i', $end_date['StartDate'] ) . '-' . edu_get_timezoned_date( 'H:i', $end_date['EndDate'] );
				}
			} else {
				$str .= ' ';
				$str .= $months[ edu_get_timezoned_date( 'n', $start_date['StartDate'] ) ];
				if ( $show_days && ( edu_get_timezoned_date( 'H:i', $start_date['StartDate'] ) !== edu_get_timezoned_date( 'H:i', $end_date['StartDate'] ) && edu_get_timezoned_date( 'H:i', $start_date['EndDate'] ) !== edu_get_timezoned_date( 'H:i', $end_date['EndDate'] ) )
				) {
					$str .= ' ' . edu_get_timezoned_date( 'H:i', $start_date['StartDate'] ) . '-' . edu_get_timezoned_date( 'H:i', $start_date['EndDate'] );
				}
				$str .= ' - ';
				if ( $show_days ) {
					$str .= $week_days[ edu_get_timezoned_date( 'N', $end_date['EndDate'] ) ] . ' ';
				}
				$str .= edu_get_timezoned_date( 'd', $end_date['EndDate'] );
				$str .= ' ';
				$str .= $months[ edu_get_timezoned_date( 'n', $end_date['EndDate'] ) ];
				$str .= ( $now_year !== $start_year ? ' ' . $start_year : '' );
				if ( $show_days ) {
					$str .= ' ' . edu_get_timezoned_date( 'H:i', $end_date['StartDate'] ) . '-' . edu_get_timezoned_date( 'H:i', $end_date['EndDate'] );
				}
			}
		} else {
			$str .= ' ';
			$str .= $months[ edu_get_timezoned_date( 'n', $start_date['StartDate'] ) ];
			$str .= ( $now_year !== $start_year ? ' ' . $start_year : '' );
			$str .= ' - ';
			if ( $show_days ) {
				$str .= $week_days[ edu_get_timezoned_date( 'N', $end_date['EndDate'] ) ] . ' ';
			}
			$str .= edu_get_timezoned_date( 'd', $end_date['EndDate'] );
			$str .= ' ';
			$str .= $months[ edu_get_timezoned_date( 'n', $end_date['EndDate'] ) ];
			$str .= ( $now_year !== $end_year ? ' ' . $end_year : '' );
			if ( $show_days ) {
				$str .= ' ' . edu_get_timezoned_date( 'H:i', $end_date['StartDate'] ) . '-' . edu_get_timezoned_date( 'H:i', $end_date['EndDate'] );
			}
		}
	} else {
		$str .= ' ';
		$str .= $months[ edu_get_timezoned_date( 'n', $start_date['EndDate'] ) ];
		$str .= ( $now_year !== $start_year ? ' ' . $start_year : '' );
		if ( $show_days ) {
			$str .= ' ' . edu_get_timezoned_date( 'H:i', $start_date['StartDate'] ) . '-' . edu_get_timezoned_date( 'H:i', $start_date['EndDate'] );
		}
	}

	$str .= '</span>';

	return $str;
}

function get_old_start_end_display_date( $start_date, $end_date, $short = false, $show_week_days = false ) {
	if ( ! isset( $start_date ) && ! isset( $end_date ) ) {
		return '';
	}

	if ( null === $end_date ) {
		$end_date = $start_date;
	}

	$week_days = $short ? EDU()->short_week_days : EDU()->week_days;
	$months    = $short ? EDU()->short_months : EDU()->months;

	$start_year  = edu_get_timezoned_date( 'Y', $start_date );
	$start_month = edu_get_timezoned_date( 'n', $start_date );
	$end_year    = edu_get_timezoned_date( 'Y', $end_date );
	$end_month   = edu_get_timezoned_date( 'n', $end_date );
	$now_year    = date_i18n( 'Y' );
	$str         = '<span class="eduadmin-dateText" data-startdate="' . esc_attr( $start_date ) . '" data-enddate="' . esc_attr( $end_date ) . '">';
	if ( $show_week_days ) {
		$str .= $week_days[ edu_get_timezoned_date( 'N', $start_date ) ] . ' ';
	}
	$str .= edu_get_timezoned_date( 'd', $start_date );
	if ( edu_get_timezoned_date( 'Y-m-d', $start_date ) !== edu_get_timezoned_date( 'Y-m-d', $end_date ) ) {
		if ( $start_year === $end_year ) {
			if ( $start_month === $end_month ) {
				$str .= ' - ';
				if ( $show_week_days ) {
					$str .= $week_days[ edu_get_timezoned_date( 'N', $end_date ) ] . ' ';
				}
				$str .= edu_get_timezoned_date( 'd', $end_date );
				$str .= ' ';
				$str .= $months[ edu_get_timezoned_date( 'n', $start_date ) ];
				$str .= ( $now_year !== $start_year ? ' ' . $start_year : '' );
			} else {
				$str .= ' ';
				$str .= $months[ edu_get_timezoned_date( 'n', $start_date ) ];
				$str .= ' - ';
				if ( $show_week_days ) {
					$str .= $week_days[ edu_get_timezoned_date( 'N', $end_date ) ] . ' ';
				}
				$str .= edu_get_timezoned_date( 'd', $end_date );
				$str .= ' ';
				$str .= $months[ edu_get_timezoned_date( 'n', $end_date ) ];
				$str .= ( $now_year !== $start_year ? ' ' . $start_year : '' );
			}
		} else {
			$str .= ' ';
			$str .= $months[ edu_get_timezoned_date( 'n', $start_date ) ];
			$str .= ( $now_year !== $start_year ? ' ' . $start_year : '' );
			$str .= ' - ';
			if ( $show_week_days ) {
				$str .= $week_days[ edu_get_timezoned_date( 'N', $end_date ) ] . ' ';
			}
			$str .= edu_get_timezoned_date( 'd', $end_date );
			$str .= ' ';
			$str .= $months[ edu_get_timezoned_date( 'n', $end_date ) ];
			$str .= ( $now_year !== $end_year ? ' ' . $end_year : '' );
		}
	} else {
		$str .= ' ';
		$str .= $months[ edu_get_timezoned_date( 'n', $start_date ) ];
		$str .= ( $now_year !== $start_year ? ' ' . $start_year : '' );
	}
	$str .= '</span>';

	return $str;
}

function DateComparer( $a, $b ) {
	$a_date = edu_get_timezoned_date( 'Y-m-d H:i:s', $a['StartDate'] );
	$b_date = edu_get_timezoned_date( 'Y-m-d H:i:s', $b['StartDate'] );
	if ( $a_date === $b_date ) {
		return 0;
	}

	return ( $a_date < $b_date ? -1 : 1 );
}

function KeySort( $key ) {
	return function( $a, $b ) use ( $key ) {
		return strcmp( $a->{$key}, $b->{$key} );
	};
}

if ( ! function_exists( 'edu_event_item_date' ) ) {
	function edu_event_item_date( $ev, $event_dates ) {
		$__t = EDU()->start_timer( __METHOD__ );

		$event_detail_setting = EDU()->get_option( 'eduadmin-date-eventDates-detail', 'default' );
		$use_short            = false;
		$show_names           = false;
		$show_time            = true;

		$overridden = false;

		switch ( $event_detail_setting ) {
			case 'customSettings':
				$use_short  = EDU()->is_checked( 'eduadmin-date-eventDates-detail-short' );
				$show_names = EDU()->is_checked( 'eduadmin-date-eventDates-detail-show-daynames' );
				$show_time  = EDU()->is_checked( 'eduadmin-date-eventDates-detail-show-time' );
				$overridden = true;
				break;
			case 'customFormat':
				$event_detail_custom_format = EDU()->get_option( 'eduadmin-date-eventDates-detail-custom-format' );
				if ( ! empty( trim( $event_detail_custom_format ) ) ) {
					echo $event_detail_custom_format;

					return;
				}
		}

		$event_date_setting = EDU()->get_option( 'eduadmin-date-courseDays-event', 'default' );

		$always_show_schedule = false;
		$never_group          = false;

		switch ( $event_date_setting ) {
			case 'customSettings':
				$always_show_schedule = EDU()->is_checked( 'eduadmin-date-courseDays-event-alwaysNumbers' );
				$never_group          = EDU()->is_checked( 'eduadmin-date-courseDays-event-neverGroup' );
				break;
		}

		if ( $ev['OnDemand'] ) {
			echo '<span class="eduadmin-dateText">' . esc_html_x( 'On-demand', 'frontend', 'eduadmin-booking' ) . '</span>';
		} else {
			echo isset( $event_dates[ (string) $ev['EventId'] ] ) ?
				get_logical_date_groups( $event_dates[ (string) $ev['EventId'] ], $use_short, null, $show_names, $overridden, $always_show_schedule, $never_group ) :
				wp_kses_post( get_old_start_end_display_date( $ev['StartDate'], $ev['EndDate'], $use_short, $show_names ) );
			if ( $show_time ) {
				echo ! isset( $event_dates[ (string) $ev['EventId'] ] ) ?
					'<span class="eventTime">, ' . esc_html( edu_get_timezoned_date( 'H:i', $ev['StartDate'] ) ) . ' - ' . esc_html( edu_get_timezoned_date( 'H:i', $ev['EndDate'] ) ) . '</span>' :
					'';
			}
		}

		EDU()->stop_timer( $__t );
	}
}

if ( ! function_exists( 'edu_event_item_applicationopendate' ) ) {
	function edu_event_item_applicationopendate( $application_open_date ) {
		$__t = EDU()->start_timer( __METHOD__ );

		$event_detail_setting = EDU()->get_option( 'eduadmin-date-eventDates-detail', 'default' );
		$use_short            = false;
		$show_names           = false;
		$show_time            = true;

		$overridden = false;

		switch ( $event_detail_setting ) {
			case 'customSettings':
				$use_short  = EDU()->is_checked( 'eduadmin-date-eventDates-detail-short' );
				$show_names = EDU()->is_checked( 'eduadmin-date-eventDates-detail-show-daynames' );
				$show_time  = EDU()->is_checked( 'eduadmin-date-eventDates-detail-show-time' );
				$overridden = true;
				break;
			case 'customFormat':
				$event_detail_custom_format = EDU()->get_option( 'eduadmin-date-eventDates-detail-custom-format' );
				if ( ! empty( trim( $event_detail_custom_format ) ) ) {
					echo $event_detail_custom_format;

					return;
				}
		}

		$retValue = wp_kses_post( get_old_start_end_display_date( $application_open_date, $application_open_date, $use_short, $show_names ) );
		if ( $show_time ) {
			$retValue .= '<span class="applicationOpenTime">, ' . esc_html( edu_get_timezoned_date( 'H:i', $application_open_date ) ) . '</span>';
		}

		EDU()->stop_timer( $__t );

		return $retValue;
	}
}

if ( ! function_exists( 'edu_course_listitem_nextdate' ) ) {
	function edu_course_listitem_nextdate( $next_event ) {
		$show_event_venue = EDU()->is_checked( 'eduadmin-showEventVenueName', false );

		if ( $next_event['OnDemand'] ) {
			echo esc_html_x( 'On-demand', 'frontend', 'eduadmin-booking' );
		} else {
			echo esc_html( sprintf( _x( 'Next event %1$s', 'frontend', 'eduadmin-booking' ), edu_get_timezoned_date( 'Y-m-d', $next_event['StartDate'] ) ) . ' ' . $next_event['City'] );
			if ( $show_event_venue && ! empty( $next_event['AddressName'] ) ) {
				echo '<span class="venueInfo">, ' . esc_html( $next_event['AddressName'] ) . '</span>';
			}
		}
	}
}

if ( ! function_exists( 'edu_event_listitem_date' ) ) {
	function edu_event_listitem_date( $ev ) {
		$__t = EDU()->start_timer( __METHOD__ );

		$event_detail_setting = EDU()->get_option( 'eduadmin-date-eventDates-list', 'default' );
		$use_short            = true;
		$show_names           = false;
		$show_time            = false;

		$overridden = false;

		switch ( $event_detail_setting ) {
			case 'customSettings':
				$use_short  = EDU()->is_checked( 'eduadmin-date-eventDates-list-short' );
				$show_names = EDU()->is_checked( 'eduadmin-date-eventDates-list-show-daynames' );
				$show_time  = EDU()->is_checked( 'eduadmin-date-eventDates-list-show-time' );
				$overridden = true;
				break;
			case 'customFormat':
				$event_detail_custom_format = EDU()->get_option( 'eduadmin-date-eventDates-list-custom-format' );
				if ( ! empty( trim( $event_detail_custom_format ) ) ) {
					echo $event_detail_custom_format;

					return;
				}
		}

		if ( $ev['OnDemand'] ) {
			echo _x( 'On-demand', 'frontend', 'eduadmin-booking' );
		} else {
			echo wp_kses_post( get_old_start_end_display_date( $ev['StartDate'], $ev['EndDate'], $use_short, $show_names ) );
			if ( $show_time ) {
				echo '<span class="eventTime">, ' . esc_html( edu_get_timezoned_date( 'H:i', $ev['StartDate'] ) ) . ' - ' . esc_html( edu_get_timezoned_date( 'H:i', $ev['EndDate'] ) ) . '</span>';
			}
		}

		EDU()->stop_timer( $__t );
	}
}

if ( ! function_exists( 'edu_event_listitem_applicationopendate' ) ) {
	function edu_event_listitem_applicationopendate( $application_open_date ) {
		$__t = EDU()->start_timer( __METHOD__ );

		$event_detail_setting = EDU()->get_option( 'eduadmin-date-eventDates-list', 'default' );
		$use_short            = true;
		$show_names           = false;
		$show_time            = false;

		$overridden = false;

		switch ( $event_detail_setting ) {
			case 'customSettings':
				$use_short  = EDU()->is_checked( 'eduadmin-date-eventDates-list-short' );
				$show_names = EDU()->is_checked( 'eduadmin-date-eventDates-list-show-daynames' );
				$show_time  = EDU()->is_checked( 'eduadmin-date-eventDates-list-show-time' );
				$overridden = true;
				break;
			case 'customFormat':
				$event_detail_custom_format = EDU()->get_option( 'eduadmin-date-eventDates-list-custom-format' );
				if ( ! empty( trim( $event_detail_custom_format ) ) ) {
					echo $event_detail_custom_format;

					return;
				}
		}

		$retVal = wp_kses_post( get_old_start_end_display_date( $application_open_date, $application_open_date, $use_short, $show_names ) );
		if ( $show_time ) {
			$retVal .= '<span class="applicationOpenTime">, ' . esc_html( edu_get_timezoned_date( 'H:i', $application_open_date ) ) . '</span>';
		}

		EDU()->stop_timer( $__t );

		return $retVal;
	}
}

if ( ! function_exists( 'my_str_split' ) ) {
	// Credits go to https://code.google.com/p/php-slugs/
	function my_str_split( $string ) {
		$s_array = array();
		$slen    = strlen( $string );
		for ( $i = 0; $i < $slen; $i++ ) {
			$s_array[ (string) $i ] = $string[ $i ];
		}

		return $s_array;
	}
}

if ( ! function_exists( 'no_diacritics' ) ) {
	function no_diacritics( $string ) {
		//cyrylic transcription
		$cyrylic_from = array(
			'А',
			'Б',
			'В',
			'Г',
			'Д',
			'Е',
			'Ё',
			'Ж',
			'З',
			'И',
			'Й',
			'К',
			'Л',
			'М',
			'Н',
			'О',
			'П',
			'Р',
			'С',
			'Т',
			'У',
			'Ф',
			'Х',
			'Ц',
			'Ч',
			'Ш',
			'Щ',
			'Ъ',
			'Ы',
			'Ь',
			'Э',
			'Ю',
			'Я',
			'а',
			'б',
			'в',
			'г',
			'д',
			'е',
			'ё',
			'ж',
			'з',
			'и',
			'й',
			'к',
			'л',
			'м',
			'н',
			'о',
			'п',
			'р',
			'с',
			'т',
			'у',
			'ф',
			'х',
			'ц',
			'ч',
			'ш',
			'щ',
			'ъ',
			'ы',
			'ь',
			'э',
			'ю',
			'я',
		);
		$cyrylic_to   = array(
			'A',
			'B',
			'W',
			'G',
			'D',
			'Ie',
			'Io',
			'Z',
			'Z',
			'I',
			'J',
			'K',
			'L',
			'M',
			'N',
			'O',
			'P',
			'R',
			'S',
			'T',
			'U',
			'F',
			'Ch',
			'C',
			'Tch',
			'Sh',
			'Shtch',
			'',
			'Y',
			'',
			'E',
			'Iu',
			'Ia',
			'a',
			'b',
			'w',
			'g',
			'd',
			'ie',
			'io',
			'z',
			'z',
			'i',
			'j',
			'k',
			'l',
			'm',
			'n',
			'o',
			'p',
			'r',
			's',
			't',
			'u',
			'f',
			'ch',
			'c',
			'tch',
			'sh',
			'shtch',
			'',
			'y',
			'',
			'e',
			'iu',
			'ia',
		);

		$from = array(
			'Á',
			'À',
			'Â',
			'Ä',
			'Ă',
			'Ā',
			'Ã',
			'Å',
			'Ą',
			'Æ',
			'Ć',
			'Ċ',
			'Ĉ',
			'Č',
			'Ç',
			'Ď',
			'Đ',
			'Ð',
			'É',
			'È',
			'Ė',
			'Ê',
			'Ë',
			'Ě',
			'Ē',
			'Ę',
			'Ə',
			'Ġ',
			'Ĝ',
			'Ğ',
			'Ģ',
			'á',
			'à',
			'â',
			'ä',
			'ă',
			'ā',
			'ã',
			'å',
			'ą',
			'æ',
			'ć',
			'ċ',
			'ĉ',
			'č',
			'ç',
			'ď',
			'đ',
			'ð',
			'é',
			'è',
			'ė',
			'ê',
			'ë',
			'ě',
			'ē',
			'ę',
			'ə',
			'ġ',
			'ĝ',
			'ğ',
			'ģ',
			'Ĥ',
			'Ħ',
			'I',
			'Í',
			'Ì',
			'İ',
			'Î',
			'Ï',
			'Ī',
			'Į',
			'Ĳ',
			'Ĵ',
			'Ķ',
			'Ļ',
			'Ł',
			'Ń',
			'Ň',
			'Ñ',
			'Ņ',
			'Ó',
			'Ò',
			'Ô',
			'Ö',
			'Õ',
			'Ő',
			'Ø',
			'Ơ',
			'Œ',
			'ĥ',
			'ħ',
			'ı',
			'í',
			'ì',
			'i',
			'î',
			'ï',
			'ī',
			'į',
			'ĳ',
			'ĵ',
			'ķ',
			'ļ',
			'ł',
			'ń',
			'ň',
			'ñ',
			'ņ',
			'ó',
			'ò',
			'ô',
			'ö',
			'õ',
			'ő',
			'ø',
			'ơ',
			'œ',
			'Ŕ',
			'Ř',
			'Ś',
			'Ŝ',
			'Š',
			'Ş',
			'Ť',
			'Ţ',
			'Þ',
			'Ú',
			'Ù',
			'Û',
			'Ü',
			'Ŭ',
			'Ū',
			'Ů',
			'Ų',
			'Ű',
			'Ư',
			'Ŵ',
			'Ý',
			'Ŷ',
			'Ÿ',
			'Ź',
			'Ż',
			'Ž',
			'ŕ',
			'ř',
			'ś',
			'ŝ',
			'š',
			'ş',
			'ß',
			'ť',
			'ţ',
			'þ',
			'ú',
			'ù',
			'û',
			'ü',
			'ŭ',
			'ū',
			'ů',
			'ų',
			'ű',
			'ư',
			'ŵ',
			'ý',
			'ŷ',
			'ÿ',
			'ź',
			'ż',
			'ž',
		);
		$to   = array(
			'A',
			'A',
			'A',
			'A',
			'A',
			'A',
			'A',
			'A',
			'A',
			'AE',
			'C',
			'C',
			'C',
			'C',
			'C',
			'D',
			'D',
			'D',
			'E',
			'E',
			'E',
			'E',
			'E',
			'E',
			'E',
			'E',
			'G',
			'G',
			'G',
			'G',
			'G',
			'a',
			'a',
			'a',
			'a',
			'a',
			'a',
			'a',
			'a',
			'a',
			'ae',
			'c',
			'c',
			'c',
			'c',
			'c',
			'd',
			'd',
			'd',
			'e',
			'e',
			'e',
			'e',
			'e',
			'e',
			'e',
			'e',
			'g',
			'g',
			'g',
			'g',
			'g',
			'H',
			'H',
			'I',
			'I',
			'I',
			'I',
			'I',
			'I',
			'I',
			'I',
			'IJ',
			'J',
			'K',
			'L',
			'L',
			'N',
			'N',
			'N',
			'N',
			'O',
			'O',
			'O',
			'O',
			'O',
			'O',
			'O',
			'O',
			'CE',
			'h',
			'h',
			'i',
			'i',
			'i',
			'i',
			'i',
			'i',
			'i',
			'i',
			'ij',
			'j',
			'k',
			'l',
			'l',
			'n',
			'n',
			'n',
			'n',
			'o',
			'o',
			'o',
			'o',
			'o',
			'o',
			'o',
			'o',
			'o',
			'R',
			'R',
			'S',
			'S',
			'S',
			'S',
			'T',
			'T',
			'T',
			'U',
			'U',
			'U',
			'U',
			'U',
			'U',
			'U',
			'U',
			'U',
			'U',
			'W',
			'Y',
			'Y',
			'Y',
			'Z',
			'Z',
			'Z',
			'r',
			'r',
			's',
			's',
			's',
			's',
			'B',
			't',
			't',
			'b',
			'u',
			'u',
			'u',
			'u',
			'u',
			'u',
			'u',
			'u',
			'u',
			'u',
			'w',
			'y',
			'y',
			'y',
			'z',
			'z',
			'z',
		);

		$from = array_merge( $from, $cyrylic_from );
		$to   = array_merge( $to, $cyrylic_to );

		return str_replace( $from, $to, $string );
	}
}

if ( ! function_exists( 'make_slugs' ) ) {
	function make_slugs( $string, $maxlen = 0 ) {
		$new_string_tab = array();
		$string         = strtolower( no_diacritics( $string ) );
		if ( function_exists( 'str_split' ) ) {
			$string_tab = str_split( $string );
		} else {
			$string_tab = my_str_split( $string );
		}

		$numbers = array( '0', '1', '2', '3', '4', '5', '6', '7', '8', '9', '-' );

		foreach ( $string_tab as $letter ) {
			if ( in_array( $letter, range( 'a', 'z' ), true ) || in_array( $letter, $numbers, true ) ) {
				$new_string_tab[] = $letter;
			} elseif ( ' ' === $letter ) {
				$new_string_tab[] = '-';
			}
		}

		if ( ! empty( $new_string_tab ) ) {
			$new_string = implode( $new_string_tab );
			if ( $maxlen > 0 ) {
				$new_string = substr( $new_string, 0, $maxlen );
			}

			$new_string = remove_duplicates( '--', '-', $new_string );
		} else {
			$new_string = '';
		}

		return $new_string;
	}
}

if ( ! function_exists( 'check_slug' ) ) {
	function check_slug( $s_slug ) {
		if ( preg_match( '/^[a-zA-Z0-9]+[a-zA-Z0-9\_\-]*$/', $s_slug ) ) {
			return true;
		}

		return false;
	}
}

if ( ! function_exists( 'remove_duplicates' ) ) {
	function remove_duplicates( $s_search, $s_replace, $s_subject ) {
		$i = 0;
		do {
			$s_subject = str_replace( $s_search, $s_replace, $s_subject );
			$pos       = strpos( $s_subject, $s_search );

			$i++;
			if ( $i > 100 ) {
				die( 'removeDuplicates() loop error' );
			}
		} while ( false !== $pos );

		return $s_subject;
	}
}

if ( ! function_exists( 'edu_starts_with' ) ) {
	function edu_starts_with( $haystack, $needle ) {
		return substr( $haystack, 0, strlen( $needle ) ) === $needle;
	}
}

if ( ! function_exists( 'edu_ends_with' ) ) {
	function edu_ends_with( $haystack, $needle ) {
		return substr( $haystack, -strlen( $needle ) ) === $needle;
	}
}
