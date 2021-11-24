<?php
/**
 * @param $events   array
 * @param $order_by array
 * @param $order    array
 *
 * @return mixed
 */
function sortEvents( $events, $order_by, $order ) {
	$t = EDU()->start_timer( 'sortEvents' );
	usort( $events, function( $evA, $evB ) use ( $order_by, $order ) {
		return multiSort( $evA, $evB, $order_by, $order, 0 );
	} );
	EDU()->stop_timer( $t );

	return $events;
}

function multiSort( $evA, $evB, $order_by, $order, $idx ) {
	if ( sizeof( $order_by ) > $idx && MNNaturalize( $evA[ $order_by[ $idx ] ] ) === MNNaturalize( $evB[ $order_by[ $idx ] ] ) ) {
		$idx += 1;

		return multiSort( $evA, $evB, $order_by, $order, $idx );
	}

	if ( isset( $order_by[ $idx ] ) ) {
		return @( strcmp( MNNaturalize( $evA[ $order_by[ $idx ] ] ), MNNaturalize( $evB[ $order_by[ $idx ] ] ) ) ) * ( $order[ $idx ] !== null ? $order[ $idx ] : 1 );
	}

	return false;
}

function MNNaturalize( $val ) {
	if ( empty( $val ) && $val != "0" ) {
		return $val;
	}

	while ( stristr( $val, "  " ) ) {
		$val = str_replace( "  ", " ", $val );
	}

	$maxLength = 1000;
	$padLength = 25;

	$inNumber  = false;
	$isDecimal = false;
	$numStart  = 0;
	$numLength = 0;
	$length    = strlen( $val ) < $maxLength ? strlen( $val ) : $maxLength;

	//TODO: optimize this so that we exit for loop once sb.ToString() >= maxLength
	$sb = [];
	for ( $i = 0; $i < $length; $i++ ) {
		$charCode = ord( substr( $val, $i, 1 ) );

		if ( $charCode >= 48 && $charCode <= 57 ) {
			if ( ! $inNumber ) {
				$numStart  = $i;
				$numLength = 1;
				$inNumber  = true;
				continue;
			}
			$numLength++;
			continue;
		}
		if ( $inNumber ) {
			$sb[]     = MNPadNumber( substr( $val, $numStart, $numLength ), $isDecimal, $padLength );
			$inNumber = false;
		}
		$isDecimal = ( $charCode == 46 );
		$sb[]      = substr( $val, $i, 1 );
	}
	if ( $inNumber ) {
		$sb[] = MNPadNumber( substr( $val, $numStart, $numLength ), $isDecimal, $padLength );
	}

	$ret = join( "", $sb );

	return strlen( $ret ) > $maxLength ? substr( $ret, 0, $maxLength ) : $ret;
}

function MNPadNumber( $num, $isDecimal, $padLength ) {
	return str_pad( $num, $padLength, "0", $isDecimal ? STR_PAD_RIGHT : STR_PAD_LEFT );
}
