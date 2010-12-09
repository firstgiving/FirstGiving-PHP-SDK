<?php

class FirstGivingPaypalExpressCheckoutPaymentResponse {
	
	private $transactionId;
	
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


	
}