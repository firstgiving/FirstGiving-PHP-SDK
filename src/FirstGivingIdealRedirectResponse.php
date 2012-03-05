<?php

class FirstGivingIdealRedirectResponse {

    private $_redirectUrl = NULL;
    private $_note = NULL;
    private $_idealPaymentRequestId = NULL;

    public function getRedirectUrl() {
        return $this->_redirectUrl;
    }

    public function getNote() {
        return $this->_note;
    }

    public function getIdealPaymentRequestId() {
        return $this->_idealPaymentRequestId;
    }

    public function setRedirectUrl($redirectUrl) {
        $this->_redirectUrl = $redirectUrl;
    }

    public function setNote($note) {
        $this->_note = $note;
    }

    public function setIdealPaymentRequestId($idealPaymentRequestId) {
        $this->_idealPaymentRequestId = $idealPaymentRequestId;
    }
}