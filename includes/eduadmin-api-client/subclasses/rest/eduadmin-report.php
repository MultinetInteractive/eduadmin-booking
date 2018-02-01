<?php

	/**
	 * Class EduAdmin_REST_Report
	 */
	class EduAdmin_REST_Report extends EduAdminRESTClient {
		protected $api_url = "/v1/Report";

		/**
		 * @param integer                     $reportId
		 * @param EduAdmin_Data_ReportOptions $options
		 *
		 * @return mixed
		 */
		public function CreateUrl( $reportId, EduAdmin_Data_ReportOptions $options ) {
			return parent::POST( "/$reportId/CreateUrl", $options, get_called_class() . "|" . __FUNCTION__ );
		}
	}