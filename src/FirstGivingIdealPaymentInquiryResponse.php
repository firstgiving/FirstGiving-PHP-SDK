<?php
class FirstGivingIdealPaymentInquiryResponse {

    private $_amount = NULL;
    private $_status = NULL;
    private $_transactionId = NULL;
    private $_consumerName = NULL;
    private $_consumerCity = NULL;

    public $idealPaymentRequestId = NULL;

    public function setAmount($amount) {
        $this->_amount = $amount;
    }

    public function getAmount() {
        return $this->_amount;
    }

    public function getStatus() {
        return $this->_status;
    }

    public function setStatus($status) {
        $this->_status = $status;
    }

    public function setTransactionId($transactionId) {
        $this->_transactionId = $transactionId;
    }

    public function getTransactionId() {
        return $this->_transactionId;
    }

    public function setConsumerName($consumerName) {
        $this->_consumerName = $consumerName;
    }

    public function getConsumerName() {
        return $this->_consumerName;
    }
    
    public function setConsumerCity($consumerCity) {
        $this->_consumerCity = $consumerCity;
    }

    public function getConsumerCity() {
        return $this->_consumerCity;
    }
}