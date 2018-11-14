<?php

/**
 * Class EduAdmin_REST_Coupon
 */
class EduAdmin_REST_Coupon extends EduAdminRESTClient {
	protected $api_url = '/v1/Coupon';

	/**
	 * @param integer $event_id
	 * @param string $coupon_code
	 *
	 * @return bool|mixed
	 */
	public function IsValid( $event_id, $coupon_code ) {
		return parent::GET(
			'/IsValid',
			array(
				'eventId'    => $event_id,
				'couponCode' => $coupon_code,
			),
			get_called_class() . '|' . __FUNCTION__
		);
	}

	/**
	 * @param integer $programme_start_id
	 * @param string $coupon_code
	 *
	 * @return bool|mixed
	 */
	public function ProgrammeStartCouponIsValid( $programme_start_id, $coupon_code ) {
		return parent::GET(
			'/ProgrammeStart/IsValid',
			array(
				'programmeStartId' => $programme_start_id,
				'couponCode' 	   => $coupon_code,
			),
			get_called_class() . '|' . __FUNCTION__
		);
	}
}