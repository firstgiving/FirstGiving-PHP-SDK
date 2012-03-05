<?php
class FirstGivingIdealRequest {

    private $_bankId = NULL;
    private $_amount = NULL;
    private $_returnUrl = NULL;

    // Quantiv charity id
    private $_charityId = NULL;

    private $_callbackUrl = NULL;

    // Donor email address
    private $_email = NULL;

    // Local fundraiser id
    private $_fundraiserId = NULL;

    public function getBankId() {
        return $this->_bankId;
    }

    public function getAmount() {
        return $this->_amount;
    }

    public function getReturnUrl() {
        return $this->_returnUrl;
    }

    public function getCharityId() {
        return $this->_charityId;
    }

    public function getCallbackUrl() {
        return $this->_callbackUrl;
    }

    public function setBankId($bankId) {
        $this->_bankId = $bankId;
    }

    public function setAmount($amount) {
        $this->_amount = $amount;
    }

    public function setReturnUrl($returnUrl) {
        $this->_returnUrl = $returnUrl;
    }

    public function setCharityId($charityId) {
        $this->_charityId = $charityId;
    }

    public function setCallbackUrl($callbackUrl) {
        $this->_callbackUrl = $callbackUrl;
    }

    public function setEmail($email) {
        $this->_email = $email;
    }

    public function getEmail() {
        return $this->_email;
    }

    public function setFundraiserId($fundraiserId) {
        $this->_fundraiserId = $fundraiserId;
    }

    public function getFundraiserId() {
        return $this->_fundraiserId;
    }

    public function toArray() {
        $arr = array(
            'bankId' => $this->_bankId,
            'amount' => $this->_amount,
            'returnUrl' => $this->_returnUrl,
            'charityId' => $this->_charityId,
            'fundraiserId' => $this->_fundraiserId,
            'email' => $this->_email
        );

        if ($this->_callbackUrl !== NULL) {
            $arr['callbackUrl'] = $this->_callbackUrl;
        }

        return $arr;
    }
}