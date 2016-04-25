<?php
// Copyright 2010 FirstGiving.com. All Rights Reserved.
//
// +---------------------------------------------------------------------------+
// | FirstGiving.com PHP API Client                                             |
// +---------------------------------------------------------------------------+
// | Copyright (c) 2010 FirstGiving.com                                        |
// | All rights reserved.                                                       |
// |                                                                           |
// | Redistribution and use in source and binary forms, with or without        |
// | modification, are permitted provided that the following conditions        |
// | are met:                                                                  |
// |                                                                           |
// | 1. Redistributions of source code must retain the above copyright         |
// |    notice, this list of conditions and the following disclaimer.          |
// | 2. Redistributions in binary form must reproduce the above copyright      |
// |    notice, this list of conditions and the following disclaimer in the    |
// |    documentation and/or other materials provided with the distribution.   |
// |                                                                           |
// | THIS SOFTWARE IS PROVIDED BY THE AUTHOR ``AS IS'' AND ANY EXPRESS OR      |
// | IMPLIED WARRANTIES, INCLUDING, BUT NOT LIMITED TO, THE IMPLIED WARRANTIES |
// | OF MERCHANTABILITY AND FITNESS FOR A PARTICULAR PURPOSE ARE DISCLAIMED.   |
// | IN NO EVENT SHALL THE AUTHOR BE LIABLE FOR ANY DIRECT, INDIRECT,          |
// | INCIDENTAL, SPECIAL, EXEMPLARY, OR CONSEQUENTIAL DAMAGES (INCLUDING, BUT  |
// | NOT LIMITED TO, PROCUREMENT OF SUBSTITUTE GOODS OR SERVICES; LOSS OF USE, |
// | DATA, OR PROFITS; OR BUSINESS INTERRUPTION) HOWEVER CAUSED AND ON ANY     |
// | THEORY OF LIABILITY, WHETHER IN CONTRACT, STRICT LIABILITY, OR TORT       |
// | (INCLUDING NEGLIGENCE OR OTHERWISE) ARISING IN ANY WAY OUT OF THE USE OF  |
// | THIS SOFTWARE, EVEN IF ADVISED OF THE POSSIBILITY OF SUCH DAMAGE.         |
// +---------------------------------------------------------------------------+

class FirstGivingDonation {

	private $charityId;
	private $eventId;
	private $fundraiserId;
	private $orderId;
	private $description;
	private $reportDonationToTaxAuthority;
	private $personalIdentificationNumber;
	private $donationMessage;
	private $honorMemoryName;
	private $amount;
	private $currencyCode;
	private $recurringBillingFrequency;
	private $recurringBillingTerm;
	private $recurringBillingAmount;

	// extended attribution fields (internal use only)
	private $attributionType = null;
	private $attributionName;
	private $notificationName;
	private $attributionEmail;
	private $attributionAddressLine1;
	private $attributionAddressLine2;
	private $attributionCity;
	private $attributionState;
	private $attributionZip;

	// merchant parameters (internal use only)
	private $merchantId = null;
	private $merchantEmail = null;
	private $merchantName = null;
	private $commissionRate = null;

	/**
	 * @return the $attributionType
	 */
	public function getAttributionType() {
		return $this->attributionType;
	}

	/**
	 * @param $attributionType the $attributionType to set
	 */
	public function setAttributionType($attributionType) {
		$this->attributionType = $attributionType;
	}

	/**
	 * @return the $attributionName
	 */
	public function getAttributionName() {
		return $this->attributionName;
	}

	/**
	 * @param $attributionName the $attributionName to set
	 */
	public function setAttributionName($attributionName) {
		$this->attributionName = $attributionName;
	}

	/**
	 * @return the $notificationName
	 */
	public function getNotificationName() {
		return $this->notificationName;
	}

	/**
	 * @param $notificationName the $notificationName to set
	 */
	public function setNotificationName($notificationName) {
		$this->notificationName = $notificationName;
	}

	/**
	 * @return the $attributionEmail
	 */
	public function getAttributionEmail() {
		return $this->attributionEmail;
	}

	/**
	 * @param $attributionEmail the $attributionEmail to set
	 */
	public function setAttributionEmail($attributionEmail) {
		$this->attributionEmail = $attributionEmail;
	}

	/**
	 * @return the $attributionAddressLine1
	 */
	public function getAttributionAddressLine1() {
		return $this->attributionAddressLine1;
	}

	/**
	 * @param $attributionAddressLine1 the $attributionAddressLine1 to set
	 */
	public function setAttributionAddressLine1($attributionAddressLine1) {
		$this->attributionAddressLine1 = $attributionAddressLine1;
	}

	/**
	 * @return the $attributionAddressLine2
	 */
	public function getAttributionAddressLine2() {
		return $this->attributionAddressLine2;
	}

	/**
	 * @param $attributionAddressLine2 the $attributionAddressLine2 to set
	 */
	public function setAttributionAddressLine2($attributionAddressLine2) {
		$this->attributionAddressLine2 = $attributionAddressLine2;
	}

	/**
	 * @return the $attributionCity
	 */
	public function getAttributionCity() {
		return $this->attributionCity;
	}

	/**
	 * @param $attributionCity the $attributionCity to set
	 */
	public function setAttributionCity($attributionCity) {
		$this->attributionCity = $attributionCity;
	}

	/**
	 * @return the $attributionState
	 */
	public function getAttributionState() {
		return $this->attributionState;
	}

	/**
	 * @param $attributionState the $attributionState to set
	 */
	public function setAttributionState($attributionState) {
		$this->attributionState = $attributionState;
	}

	/**
	 * @return the $attributionZip
	 */
	public function getAttributionZip() {
		return $this->attributionZip;
	}

	/**
	 * @param $attributionZip the $attributionZip to set
	 */
	public function setAttributionZip($attributionZip) {
		$this->attributionZip = $attributionZip;
	}

	/**
	 * @return the $merchantId
	 */
	public function getMerchantId() {
		return $this->merchantId;
	}

	/**
	 * @param $merchantId the $merchantId to set
	 */
	public function setMerchantId($merchantId) {
		$this->merchantId = $merchantId;
	}

	/**
	 * @return the $merchantName
	 */
	public function getMerchantName() {
		return $this->merchantName;
	}

	/**
	 * @param $merchantName the $merchantName to set
	 */
	public function setMerchantName($merchantName) {
		$this->merchantName = $merchantName;
	}

	/**
	 * @return the $merchantEmail
	 */
	public function getMerchantEmail() {
		return $this->merchantEmail;
	}

	/**
	 * @param $merchantId the $merchantEmail to set
	 */
	public function setMerchantEmail($merchantEmail) {
		$this->merchantEmail = $merchantEmail;
	}

	/**
	 * @return the $eventId
	 */
	public function getEventId() {
		return $this->eventId;
	}

	/**
	 * @return the $fundraiserId
	 */
	public function getFundraiserId() {
		return $this->fundraiserId;
	}

	/**
	 * @param $eventId the $eventId to set
	 */
	public function setEventId($eventId) {
		$this->eventId = $eventId;
	}

	/**
	 * @param $fundraiserId the $fundraiserId to set
	 */
	public function setFundraiserId($fundraiserId) {
		$this->fundraiserId = $fundraiserId;
	}
	
	/**
	 * @return the $charityId
	 */
	public function getCharityId() {
		return $this->charityId;
	}

	/**
	 * @param $charityId the $charityId to set
	 */
	public function setCharityId($charityId) {
		$this->charityId = $charityId;
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
	/**
	 * @return the $donationMessage
	 */
	public function getDonationMessage() {
		return $this->donationMessage;
	}

	/**
	 * @return the $honorMemoryName
	 */
	public function getHonorMemoryName() {
		return $this->honorMemoryName;
	}

	/**
	 * @param $donationMessage the $donationMessage to set
	 */
	public function setDonationMessage($donationMessage) {
		$this->donationMessage = $donationMessage;
	}

	/**
	 * @param $honorMemoryName the $honorMemoryName to set
	 */
	public function setHonorMemoryName($honorMemoryName) {
		$this->honorMemoryName = $honorMemoryName;
	}
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
	 * @return the $recurringBillingFrequency
	 */
	public function getRecurringBillingFrequency() {
		return $this->recurringBillingFrequency;
	}

	/**
	 * @return the $recurringBillingTerm
	 */
	public function getRecurringBillingTerm() {
		return $this->recurringBillingTerm;
	}

	/**
	 * @return the $recurringBillingAmount
	 */
	public function getRecurringBillingAmount() {
		return $this->recurringBillingAmount;
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
	 * @param $recurringBillingFrequency the $recurringBillingFrequency to set
	 */
	public function setRecurringBillingFrequency($recurringBillingFrequency) {
		$this->recurringBillingFrequency = $recurringBillingFrequency;
	}

	/**
	 * @param $recurringBillingTerm the $recurringBillingTerm to set
	 */
	public function setRecurringBillingTerm($recurringBillingTerm) {
		$this->recurringBillingTerm = $recurringBillingTerm;
	}

	/**
	 * @param $recurringBillingAmount the $recurringBillingAmount to set
	 */
	public function setRecurringBillingAmount($recurringBillingAmount) {
		$this->recurringBillingAmount = $recurringBillingAmount;
	}

	/**
	 * @return the $commissionRate
	 */
	public function getCommissionRate() {
		return $this->commissionRate;
	}

	/**
	 * @param $commissionRate the $commissionRate to set
	 */
	public function setCommissionRate($commissionRate) {
		$this->commissionRate = $commissionRate;
	}
	
}
