<?php

class FirstGivingPaypalExpressCheckoutRedirectResponse {
	
	private $redirectUrl;
	
	/**
	 * @return the $redirectUrl
	 */
	public function getRedirectUrl() {
		return $this->redirectUrl;
	}

	/**
	 * @param $redirectUrl the $redirectUrl to set
	 */
	public function setRedirectUrl($redirectUrl) {
		$this->redirectUrl = $redirectUrl;
	}

	
}