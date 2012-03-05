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

class FirstGivingCreditCardPayment extends FirstGivingAbstractPayment {
	
	private $ccNumber;
	private $ccType;
	private $ccExpDateMonth;
	private $ccExpDateYear;
	private $ccCardValidationNum;
	private $billingDescriptor;
    private $cardOnFileId;
	
	/**
	 * @return the $ccNumber
	 */
	public function getCcNumber() {
		return $this->ccNumber;
	}

	/**
	 * @param $ccNumber the $ccNumber to set
	 */
	public function setCcNumber($ccNumber) {
		$this->ccNumber = $ccNumber;
	}

	/**
	 * @return the $ccType
	 */
	public function getCcType() {
		return $this->ccType;
	}

	/**
	 * @param $ccType the $ccType to set
	 */
	public function setCcType($ccType) {
		$this->ccType = $ccType;
	}

	/**
	 * @return the $ccCardValidationNum
	 */
	public function getCcCardValidationNum() {
		return $this->ccCardValidationNum;
	}

	/**
	 * @param $ccCardValidationNum the $ccCardValidationNum to set
	 */
	public function setCcCardValidationNum($ccCardValidationNum) {
		$this->ccCardValidationNum = $ccCardValidationNum;
	}
	
	/**
	 * @return the $ccExpDateMonth
	 */
	public function getCcExpDateMonth() {
		return $this->ccExpDateMonth;
	}

	/**
	 * @return the $ccExpDateYear
	 */
	public function getCcExpDateYear() {
		return $this->ccExpDateYear;
	}

	/**
	 * @param $ccExpDateMonth the $ccExpDateMonth to set
	 */
	public function setCcExpDateMonth($ccExpDateMonth) {
		$this->ccExpDateMonth = $ccExpDateMonth;
	}

	/**
	 * @param $ccExpDateYear the $ccExpDateYear to set
	 */
	public function setCcExpDateYear($ccExpDateYear) {
		$this->ccExpDateYear = $ccExpDateYear;
	}
	/**
	 * @return the $billingDescriptor
	 */
	public function getBillingDescriptor() {
		return $this->billingDescriptor;
	}

	/**
	 * @param $billingDescriptor the $billingDescriptor to set
	 */
	public function setBillingDescriptor($billingDescriptor) {
		$this->billingDescriptor = $billingDescriptor;
	}

    public function setCardOnFileId($cardOnFileId)
    {
        $this->cardOnFileId = $cardOnFileId;
    }

    public function getCardOnFileId()
    {
        return $this->cardOnFileId;
    }

}