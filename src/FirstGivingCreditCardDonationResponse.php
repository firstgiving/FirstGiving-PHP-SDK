<?php
// Copyright 2010 FirstGiving.com. All Rights Reserved.
//
// +---------------------------------------------------------------------------+
// | FirstGiving.com PHP API Client                                             |
// +---------------------------------------------------------------------------+
// | Copyright (c) 2010 FirstGiving.com                                        |
// | All rights reserved.                                                      |
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

class FirstGivingCreditCardDonationResponse {
	
	private $transactionId;
	private $rawResponse;
	private $responseCode;
	private $recurringBillingProfileId;
	
	/**
	 * @return the $transactionId
	 */
	public function getTransactionId() {
		return $this->transactionId;
	}

	/**
	 * @param $transactionId the $transactionId to set
	 */
	public function setTransactionId($transactionId) {
		$this->transactionId = $transactionId;
	}
	/**
	 * @return the $rawResponse
	 */
	public function getRawResponse() {
		return $this->rawResponse;
	}

	/**
	 * @param $rawResponse the $rawResponse to set
	 */
	public function setRawResponse($rawResponse) {
		$this->rawResponse = $rawResponse;
	}
	/**
	 * @return the $responseCode
	 */
	public function getResponseCode() {
		return $this->responseCode;
	}

	/**
	 * @param $responseCode the $responseCode to set
	 */
	public function setResponseCode($responseCode) {
		$this->responseCode = $responseCode;
	}
	/**
	 * @return the $recurringBillingProfileId
	 */
	public function getRecurringBillingProfileId() {
		return $this->recurringBillingProfileId;
	}

	/**
	 * @param $recurringBillingProfileId the $recurringBillingProfileId to set
	 */
	public function setRecurringBillingProfileId($recurringBillingProfileId) {
		$this->recurringBillingProfileId = $recurringBillingProfileId;
	}

	
}
