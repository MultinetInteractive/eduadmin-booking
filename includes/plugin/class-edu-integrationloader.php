<?php

class EDU_IntegrationLoader {
	/**
	 * @var \EDU_Integration[]|array
	 */
	public $integrations = array();

	public function __construct() {
		$t = EDU()->start_timer( __METHOD__ );
		do_action( 'edu_integrations_init' );

		$integration_list = apply_filters( 'edu_integrations', array() );

		foreach ( $integration_list as $int ) {
			$load_int                            = new $int();
			$this->integrations[ $load_int->id ] = $load_int;
		}
		EDU()->stop_timer( $t );
	}

	/**
	 * @param callable|null $filter
	 *
	 * @return array|\EDU_Integration[]
	 */
	public function get_integrations( $filter = null ) {
		if ( $filter != null ) {
			return $filter( $this->integrations );
		}

		return $this->integrations;
	}
}
