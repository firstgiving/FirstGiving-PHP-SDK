<?php

/**
 * The FirstGiving PHP API client will try to detect common exception conditions and throw Exceptions 
 * accordingly.
 * 
 * @author jonathanblock
 *
 */
abstract class AbstractFirstGivingAPIException extends Exception {
	
	private $verboseExceptionMessage;
	private $friendlyConsumerError; 
	private $errorTarget;
	private $rawResponse;
	private $responseCode;
	
	public function __construct($verboseMessage, $friendlyMessage='An error occurred. No further details are available.', $errorTarget=null, $rawResponse=null, $responseCode=null) {
		$this->verboseExceptionMessage = $verboseMessage;
		$this->friendlyConsumerError = $friendlyMessage;
		$this->errorTarget = $errorTarget;
		$this->rawResponse = $rawResponse;
		$this->responseCode = $responseCode;
		parent::__construct($verboseMessage);
	}
	
	/**
	 * @return the $verboseExceptionMessage
	 */
	public function getVerboseExceptionMessage() {
		return $this->verboseExceptionMessage;
	}

	/**
	 * @return the $friendlyConsumerError
	 */
	public function getFriendlyConsumerError() {
		return $this->friendlyConsumerError;
	}

	/**
	 * @return the $errorTarget
	 */
	public function getErrorTarget() {
		return $this->errorTarget;
	}

	/**
	 * @param $verboseExceptionMessage the $verboseExceptionMessage to set
	 */
	public function setVerboseExceptionMessage($verboseExceptionMessage) {
		$this->verboseExceptionMessage = $verboseExceptionMessage;
	}

	/**
	 * @param $friendlyConsumerError the $friendlyConsumerError to set
	 */
	public function setFriendlyConsumerError($friendlyConsumerError) {
		$this->friendlyConsumerError = $friendlyConsumerError;
	}

	/**
	 * @param $errorTarget the $errorTarget to set
	 */
	public function setErrorTarget($errorTarget) {
		$this->errorTarget = $errorTarget;
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


	
}