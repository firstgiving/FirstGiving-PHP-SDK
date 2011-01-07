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

abstract class FirstGivingAbstractPayment {
	
	private $billToTitle;
	private $billToFirstName;
	private $billToMiddleName;
	private $billToLastName;
	private $billToAddressLine1;
	private $billToAddressLine2;
	private $billToAddressLine3;
	private $billToCity;
	private $billToState;
	private $billToZip;
	private $billToCountry;
	private $billToEmail;
	private $billToPhone;
		

	/**
	 * @return the $billToAddressLine1
	 */
	public function getBillToAddressLine1() {
		return $this->billToAddressLine1;
	}

	/**
	 * @param $billToAddressLine1 the $billToAddressLine1 to set
	 */
	public function setBillToAddressLine1($billToAddressLine1) {
		$this->billToAddressLine1 = $billToAddressLine1;
	}

	/**
	 * @return the $billToAddressLine2
	 */
	public function getBillToAddressLine2() {
		return $this->billToAddressLine2;
	}

	/**
	 * @param $billToAddressLine2 the $billToAddressLine2 to set
	 */
	public function setBillToAddressLine2($billToAddressLine2) {
		$this->billToAddressLine2 = $billToAddressLine2;
	}

	/**
	 * @return the $billToCity
	 */
	public function getBillToCity() {
		return $this->billToCity;
	}

	/**
	 * @param $billToCity the $billToCity to set
	 */
	public function setBillToCity($billToCity) {
		$this->billToCity = $billToCity;
	}

	/**
	 * @return the $billToState
	 */
	public function getBillToState() {
		return $this->billToState;
	}

	/**
	 * @param $billToState the $billToState to set
	 */
	public function setBillToState($billToState) {
		$this->billToState = $billToState;
	}

	/**
	 * @return the $billToZip
	 */
	public function getBillToZip() {
		return $this->billToZip;
	}

	/**
	 * @param $billToZip the $billToZip to set
	 */
	public function setBillToZip($billToZip) {
		$this->billToZip = $billToZip;
	}

	/**
	 * @return the $billToCountry
	 */
	public function getBillToCountry() {
		return $this->billToCountry;
	}

	/**
	 * @param $billToCountry the $billToCountry to set
	 */
	public function setBillToCountry($billToCountry) {
		$this->billToCountry = $billToCountry;
	}

	/**
	 * @return the $billToEmail
	 */
	public function getBillToEmail() {
		return $this->billToEmail;
	}

	/**
	 * @param $billToEmail the $billToEmail to set
	 */
	public function setBillToEmail($billToEmail) {
		$this->billToEmail = $billToEmail;
	}

	/**
	 * @return the $billToPhone
	 */
	public function getBillToPhone() {
		return $this->billToPhone;
	}

	/**
	 * @param $billToPhone the $billToPhone to set
	 */
	public function setBillToPhone($billToPhone) {
		$this->billToPhone = $billToPhone;
	}
	
	/**
	 * @return the $billToFirstName
	 */
	public function getBillToFirstName() {
		return $this->billToFirstName;
	}

	/**
	 * @param $billToFirstName the $billToFirstName to set
	 */
	public function setBillToFirstName($billToFirstName) {
		$this->billToFirstName = $billToFirstName;
	}

	/**
	 * @return the $billToLastName
	 */
	public function getBillToLastName() {
		return $this->billToLastName;
	}

	/**
	 * @param $billToLastName the $billToLastName to set
	 */
	public function setBillToLastName($billToLastName) {
		$this->billToLastName = $billToLastName;
	}
	
	/**
	 * @return the $billToMiddleName
	 */
	public function getBillToMiddleName() {
		return $this->billToMiddleName;
	}

	/**
	 * @return the $billToAddressLine3
	 */
	public function getBillToAddressLine3() {
		return $this->billToAddressLine3;
	}

	/**
	 * @param $billToMiddleName the $billToMiddleName to set
	 */
	public function setBillToMiddleName($billToMiddleName) {
		$this->billToMiddleName = $billToMiddleName;
	}

	/**
	 * @param $billToAddressLine3 the $billToAddressLine3 to set
	 */
	public function setBillToAddressLine3($billToAddressLine3) {
		$this->billToAddressLine3 = $billToAddressLine3;
	}

	/**
	 * @return the $billToTitle
	 */
	public function getBillToTitle() {
		return $this->billToTitle;
	}


	
	/**
	 * @param $billToTitle the $billToTitle to set
	 */
	public function setBillToTitle($billToTitle) {
		$this->billToTitle = $billToTitle;
	}


	
}
