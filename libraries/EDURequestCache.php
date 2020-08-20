<?php

define( 'EDURequestCachePrefix', 'EDU::' );

/**
 * Class EDURequestCache
 */
class EDURequestCache {
	/**
	 * @param string   $key         The key that we cache data on
	 * @param callable $missingData The method we execute if the data is missing
	 *
	 * @return mixed
	 */

	static function GetItem( $key, $missingData ) {
		if ( key_exists( EDURequestCachePrefix . $key, $GLOBALS ) ) {
			return $GLOBALS[ EDURequestCachePrefix . $key ];
		}
		$t               = EDU()->start_timer( EDURequestCachePrefix . $key );
		$GLOBALS[ EDURequestCachePrefix . $key ] = $missingData();
		EDU()->stop_timer( $t );

		return $GLOBALS[ EDURequestCachePrefix . $key ];
	}
}
