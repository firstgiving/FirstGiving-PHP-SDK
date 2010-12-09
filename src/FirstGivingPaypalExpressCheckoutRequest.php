<?php
class FirstGivingPaypalExpressCheckoutRequest {
	
	private $amount;
	private $currencyCode;
	private $returnUrl;
	private $cancelUrl;
	private $fundraiserId;
	private $charityId;
	private $eventId;
	private $orderId;
	private $description;
	private $reportDonationToTaxAuthority;
	private $personalIdentificationNumber;
	
	/**
	 * @return the $amount
	 */
	public function getAmount() {
		return $this->amount;
	}

	/**
	 * @return the $currencyCode
	 */
	public function getCurrencyCode() {
		return $this->currencyCode;
	}

	/**
	 * @return the $returnUrl
	 */
	public function getReturnUrl() {
		return $this->returnUrl;
	}

	/**
	 * @return the $cancelUrl
	 */
	public function getCancelUrl() {
		return $this->cancelUrl;
	}

	/**
	 * @param $amount the $amount to set
	 */
	public function setAmount($amount) {
		$this->amount = $amount;
	}

	/**
	 * @param $currencyCode the $currencyCode to set
	 */
	public function setCurrencyCode($currencyCode) {
		$this->currencyCode = $currencyCode;
	}

	/**
	 * @param $returnUrl the $returnUrl to set
	 */
	public function setReturnUrl($returnUrl) {
		$this->returnUrl = $returnUrl;
	}

	/**
	 * @param $cancelUrl the $cancelUrl to set
	 */
	public function setCancelUrl($cancelUrl) {
		$this->cancelUrl = $cancelUrl;
	}
	/**
	 * @return the $fundraiserId
	 */
	public function getFundraiserId() {
		return $this->fundraiserId;
	}

	/**
	 * @return the $charityId
	 */
	public function getCharityId() {
		return $this->charityId;
	}

	/**
	 * @return the $eventId
	 */
	public function getEventId() {
		return $this->eventId;
	}

	/**
	 * @param $fundraiserId the $fundraiserId to set
	 */
	public function setFundraiserId($fundraiserId) {
		$this->fundraiserId = $fundraiserId;
	}

	/**
	 * @param $charityId the $charityId to set
	 */
	public function setCharityId($charityId) {
		$this->charityId = $charityId;
	}

	/**
	 * @param $eventId the $eventId to set
	 */
	public function setEventId($eventId) {
		$this->eventId = $eventId;
	}
	
	/**
	 * @return the $orderId
	 */
	public function getOrderId() {
		return $this->orderId;
	}

	/**
	 * @param $orderId the $orderId to set
	 */
	public function setOrderId($orderId) {
		$this->orderId = $orderId;
	}
	
	/**
	 * @return the $description
	 */
	public function getDescription() {
		return $this->description;
	}

	/**
	 * @param $description the $description to set
	 */
	public function setDescription($description) {
		$this->description = $description;
	}
	/**
	 * @return the $reportDonationToTaxAuthority
	 */
	public function getReportDonationToTaxAuthority() {
		return $this->reportDonationToTaxAuthority;
	}

	/**
	 * @param $reportDonationToTaxAuthority the $reportDonationToTaxAuthority to set
	 */
	public function setReportDonationToTaxAuthority($reportDonationToTaxAuthority) {
		$this->reportDonationToTaxAuthority = $reportDonationToTaxAuthority;
	}

	/**
	 * @return the $personalIdentificationNumber
	 */
	public function getPersonalIdentificationNumber() {
		return $this->personalIdentificationNumber;
	}

	/**
	 * @param $personalIdentificationNumber the $personalIdentificationNumber to set
	 */
	public function setPersonalIdentificationNumber($personalIdentificationNumber) {
		$this->personalIdentificationNumber = $personalIdentificationNumber;
	}





}