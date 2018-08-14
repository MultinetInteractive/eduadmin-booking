<?php

function sortEvents( $events, $order_by, $order ) {
	usort( $events, function( $evA, $evB ) use ( $order_by, $order ) {
		return multiSort( $evA, $evB, $order_by, $order, 0 );
	} );

	return $events;
}

function multiSort( $evA, $evB, $order_by, $order, $idx ) {
	if ( sizeof( $order_by ) > $idx && $evA[ $order_by[ $idx ] ] === $evB[ $order_by[ $idx ] ] ) {
		$idx += 1;

		return multiSort( $evA, $evB, $order_by, $order, $idx );
	}

	if ( isset( $order_by[ $idx ] ) ) {
		return @( strcmp( $evA[ $order_by[ $idx ] ], $evB[ $order_by[ $idx ] ] ) ) * ( $order[ $idx ] !== null ? $order[ $idx ] : 1 );
	}

	return false;
}