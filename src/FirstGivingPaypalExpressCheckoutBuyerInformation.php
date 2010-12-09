<?php

class FirstGivingPaypalExpressCheckoutBuyerInformation {
	
	private $firstName;
	private $lastName;
	private $email;
	private $country;
	private $address1;
	private $address2;
	private $city;
	private $state;
	private $zip;
	private $currencyCode;
	private $amount;
	
	/**
	 * @return the $firstName
	 */
	public function getFirstName() {
		return $this->firstName;
	}

	/**
	 * @param $firstName the $firstName to set
	 */
	public function setFirstName($firstName) {
		$this->firstName = $firstName;
	}

	/**
	 * @return the $lastName
	 */
	public function getLastName() {
		return $this->lastName;
	}

	/**
	 * @param $lastName the $lastName to set
	 */
	public function setLastName($lastName) {
		$this->lastName = $lastName;
	}

	/**
	 * @return the $email
	 */
	public function getEmail() {
		return $this->email;
	}

	/**
	 * @param $email the $email to set
	 */
	public function setEmail($email) {
		$this->email = $email;
	}

	/**
	 * @return the $country
	 */
	public function getCountry() {
		return $this->country;
	}

	/**
	 * @param $country the $country to set
	 */
	public function setCountry($country) {
		$this->country = $country;
	}

	/**
	 * @return the $address1
	 */
	public function getAddress1() {
		return $this->address1;
	}

	/**
	 * @param $address1 the $address1 to set
	 */
	public function setAddress1($address1) {
		$this->address1 = $address1;
	}

	/**
	 * @return the $address2
	 */
	public function getAddress2() {
		return $this->address2;
	}

	/**
	 * @param $address2 the $address2 to set
	 */
	public function setAddress2($address2) {
		$this->address2 = $address2;
	}

	/**
	 * @return the $city
	 */
	public function getCity() {
		return $this->city;
	}

	/**
	 * @param $city the $city to set
	 */
	public function setCity($city) {
		$this->city = $city;
	}

	/**
	 * @return the $state
	 */
	public function getState() {
		return $this->state;
	}

	/**
	 * @param $state the $state to set
	 */
	public function setState($state) {
		$this->state = $state;
	}

	/**
	 * @return the $zip
	 */
	public function getZip() {
		return $this->zip;
	}

	/**
	 * @param $zip the $zip to set
	 */
	public function setZip($zip) {
		$this->zip = $zip;
	}

	/**
	 * @return the $currencyCode
	 */
	public function getCurrencyCode() {
		return $this->currencyCode;
	}

	/**
	 * @param $currencyCode the $currencyCode to set
	 */
	public function setCurrencyCode($currencyCode) {
		$this->currencyCode = $currencyCode;
	}

	/**
	 * @return the $amount
	 */
	public function getAmount() {
		return $this->amount;
	}

	/**
	 * @param $amount the $amount to set
	 */
	public function setAmount($amount) {
		$this->amount = $amount;
	}

}