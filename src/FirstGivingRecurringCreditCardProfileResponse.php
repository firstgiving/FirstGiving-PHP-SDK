<?php 
class FirstGivingRecurringCreditCardProfileResponse {
	
	private $recurringBillingProfileId;
	private $rawResponse;
	private $responseCode;
	
	/**
	 * @return the $recurringBillingProfileId
	 */
	public function getRecurringBillingProfileId() {
		return $this->recurringBillingProfileId;
	}

	/**
	 * @return the $rawResponse
	 */
	public function getRawResponse() {
		return $this->rawResponse;
	}

	/**
	 * @return the $responseCode
	 */
	public function getResponseCode() {
		return $this->responseCode;
	}

	/**
	 * @param $recurringBillingProfileId the $recurringBillingProfileId to set
	 */
	public function setRecurringBillingProfileId($recurringBillingProfileId) {
		$this->recurringBillingProfileId = $recurringBillingProfileId;
	}

	/**
	 * @param $rawResponse the $rawResponse to set
	 */
	public function setRawResponse($rawResponse) {
		$this->rawResponse = $rawResponse;
	}

	/**
	 * @param $responseCode the $responseCode to set
	 */
	public function setResponseCode($responseCode) {
		$this->responseCode = $responseCode;
	}

	
}