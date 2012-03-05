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

}