<?php
// Copyright 2012 FirstGiving.com. All Rights Reserved.
//
// +---------------------------------------------------------------------------+
// | FirstGiving.com PHP API Client                                             |
// +---------------------------------------------------------------------------+
// | Copyright (c) 2012 FirstGiving.com                                        |
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
class FirstGivingTransactionDetailResponse {
	private $_transactionId = NULL;
	private $_billToTitle = NULL;
	private $_billToFirstName = NULL;
	private $_billToMiddleName = NULL;
	private $_billToLastName = NULL;
	private $_billToAddressLine1 = NULL;
	private $_billToAddressLine2 = NULL;
	private $_billToAddressLine3 = NULL;
	private $_billToCity = NULL;
	private $_billToState = NULL;
	private $_billToZip = NULL;
	private $_billToCountry = NULL;
	private $_billToEmail = NULL;
	private $_billToPhone = NULL;
	private $_charityId = NULL;
	private $_eventId = NULL;
	private $_fundraiserId = NULL;
	private $_orderId = NULL;
	private $_description = NULL;
	private $_donationMessage = NULL;
	private $_honorMemoryName = NULL;
	private $_amount = NULL;
	private $_currencyCode = NULL;
	private $_recurringBillingFrequency = NULL;
	private $_recurringBillingTerm = NULL;
	private $_recurringBillingAmount = NULL;
	private $_status = 'FG_UNAVAILABLE';
	private $_commissionFees = 'FG_UNAVAILABLE';
	private $_ccFees = 'FG_UNAVAILABLE';
	private $_totalFees = 'FG_UNAVAILABLE';
	private $_netToOrganization = 'FG_UNAVAILABLE';
	private $_paymentId = 'FG_UNAVAILABLE';
	private $_paymentStatus = 'FG_UNAVAILABLE';
	private $_postingDate = 'FG_UNAVAILABLE';

	public function setTransactionId($transactionId) {
		$this->_transactionId = $transactionId;
	}

	public function setBillToTitle($billToTitle) {
		$this->_billToTitle = $billToTitle;
	}

	public function setBillToFirstName($billToFirstName) {
		$this->_billToFirstName = $billToFirstName;
	}

	public function setBillToMiddleName($billToMiddleName) {
		$this->_billToMiddleName = $billToMiddleName;
	}

	public function setBillToLastName($billToLastName) {
		$this->_billToLastName = $billToLastName;
	}

	public function setBillToAddressLine1($billToAddressLine1) {
		$this->_billToAddressLine1 = $billToAddressLine1;
	}

	public function setBillToAddressLine2($billToAddressLine2) {
		$this->_billToAddressLine2 = $billToAddressLine2;
	}

	public function setBillToAddressLine3($billToAddressLine3) {
		$this->_billToAddressLine3 = $billToAddressLine3;
	}

	public function setBillToCity($billToCity) {
		$this->_billToCity = $billToCity;
	}

	public function setBillToState($billToState) {
		$this->_billToState = $billToState;
	}

	public function setBillToZip($billToZip) {
		$this->_billToZip = $billToZip;
	}

	public function setBillToCountry($billToCountry) {
		$this->_billToCountry = $billToCountry;
	}

	public function setBillToEmail($billToEmail) {
		$this->_billToEmail = $billToEmail;
	}

	public function setBillToPhone($billToPhone) {
		$this->_billToPhone = $billToPhone;
	}

	public function setCharityId($charityId) {
		$this->_charityId = $charityId;
	}

	public function setEventId($eventId) {
		$this->_eventId = $eventId;
	}

	public function setFundraiserId($fundraiserId) {
		$this->_fundraiserId = $fundraiserId;
	}

	public function setOrderId($orderId) {
		$this->_orderId = $orderId;
	}

	public function setDescription($description) {
		$this->_description = $description;
	}

	public function setDonationMessage($donationMessage) {
		$this->_donationMessage = $donationMessage;
	}

	public function setHonorMemoryName($honorMemoryName) {
		$this->_honorMemoryName = $honorMemoryName;
	}

	public function setAmount($amount) {
		$this->_amount = $amount;
	}

	public function setCurrencyCode($currencyCode) {
		$this->_currencyCode = $currencyCode;
	}

	public function setStatus($status) {
		$this->_status = $status;
	}

	public function setCommissionFees($commissionFees) {
		$this->_commissionFees = $commissionFees;
	}

	public function setCcFees($ccFees) {
		$this->_ccFees = $ccFees;
	}

	public function setTotalFees($totalFees) {
		$this->_totalFees = $totalFees;
	}

	public function setNetToOrganization($netToOrganization) {
		$this->_netToOrganization = $netToOrganization;
	}

	public function setPaymentId($paymentId) {
		$this->_paymentId = $paymentId;
	}

	public function setPaymentStatus($paymentStatus) {
		$this->_paymentStatus = $paymentStatus;
	}

	public function setPostingDate($postingDate) {
		$this->_postingDate = $postingDate;
	}

	public function getTransactionId() {
		return $this->_transactionId;
	}

	public function getBillToTitle() {
		return $this->_billToTitle;
	}

	public function getBillToFirstName() {
		return $this->_billToFirstName;
	}

	public function getBillToMiddleName() {
		return $this->_billToMiddleName;
	}

	public function getBillToLastName() {
		return $this->_billToLastName;
	}

	public function getBillToAddressLine1() {
		return $this->_billToAddressLine1;
	}

	public function getBillToAddressLine2() {
		return $this->_billToAddressLine2;
	}

	public function getBillToAddressLine3() {
		return $this->_billToAddressLine3;
	}

	public function getBillToCity() {
		return $this->_billToCity;
	}

	public function getBillToState() {
		return $this->_billToState;
	}

	public function getBillToZip() {
		return $this->_billToZip;
	}

	public function getBillToCountry() {
		return $this->_billToCountry;
	}

	public function getBillToEmail() {
		return $this->_billToEmail;
	}

	public function getBillToPhone() {
		return $this->_billToPhone;
	}

	public function getCharityId() {
		return $this->_charityId;
	}

	public function getEventId() {
		return $this->_eventId;
	}

	public function getFundraiserId() {
		return $this->_fundraiserId;
	}

	public function getOrderId() {
		return $this->_orderId;
	}

	public function getDescription() {
		return $this->_description;
	}

	public function getDonationMessage() {
		return $this->_donationMessage;
	}

	public function getHonorMemoryName() {
		return $this->_honorMemoryName;
	}

	public function getAmount() {
		return $this->_amount;
	}

	public function getCurrencyCode() {
		return $this->_currencyCode;
	}

	public function getStatus() {
		return $this->_status;
	}

	public function getCommissionFees() {
		return $this->_commissionFees;
	}

	public function getCcFees() {
		return $this->_ccFees;
	}

	public function getTotalFees() {
		return $this->_totalFees;
	}

	public function getNetToOrganization() {
		return $this->_netToOrganization;
	}

	public function getPaymentId() {
		return $this->_paymentId;
	}

	public function getPaymentStatus() {
		return $this->_paymentStatus;
	}

	public function getPostingDate() {
		return $this->_postingDate;
	}
}
