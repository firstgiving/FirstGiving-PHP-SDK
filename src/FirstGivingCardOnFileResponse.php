<?php 
class FirstGivingCardOnFileResponse {
	
	private $cardOnFileId;
	private $rawResponse;
	private $responseCode;
	

	/**
	 * @return the $rawResponse
	 */
	public function getRawResponse() {
		return $this->rawResponse;
	}

	/**
	 * @return the $responseCode
	 */
	public function getResponseCode() {
		return $this->responseCode;
	}

	/**
	 * @param $rawResponse the $rawResponse to set
	 */
	public function setRawResponse($rawResponse) {
		$this->rawResponse = $rawResponse;
	}

	/**
	 * @param $responseCode the $responseCode to set
	 */
	public function setResponseCode($responseCode) {
		$this->responseCode = $responseCode;
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