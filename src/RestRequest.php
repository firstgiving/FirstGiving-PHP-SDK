<?php

/**
 * This class helps submit rest requests and manage rest responses.
 * 
 * Based on the tutorial located at "http://www.gen-x-design.com/archives/create-a-rest-api-with-php/".
 * @author jonathanblock
 *
 */
class RestRequest {
	
	//THESE METHODS ARE ONLY PUBLIC SO THAT I CAN MANIIUPLATE THEM IN A MOCK UNIT TEST.
	// I DID NOT WRITE THIS CLASS.. SHOULD PROBABLY BE REWRITTEN AT SOME POINT. HAVE A NICE DAY.
	public $url;
	public $verb;
	public $requestBody;
	public $requestLength;
	public $username;
	public $password;
	public $acceptType;
	public $responseBody;
	public $responseInfo=array();
	public $applicationId;
	public $securityToken;
	// How long before curl times out?
	public $curlTimeoutSeconds = 10;
	// Zend_Log
	private $_logger;
	
	/**
	 * Returns the http response code of the loaded response.
	 * @return string
	 */
	public function getHttpResponseCode() {
		return $this->responseInfo['http_code'];
	}
	
	public function __construct($applicationId, $securityToken, $url = null, $verb = 'GET', $requestBody = null, $logger=null) {
		
		$this->applicationId = $applicationId;
		$this->securityToken = $securityToken;
		$this->url = $url;
		$this->verb = $verb;
		$this->requestBody = $requestBody;
		$this->requestLength = 0;
		$this->username = null;
		$this->password = null;
		$this->acceptType = 'application/json';
		$this->responseBody = null;
		$this->responseInfo = null;
		$this->_logger = $logger;
		
		if ($this->requestBody !== null) {
			$this->buildPostBody ();
		}
	}
	
	/**
	 * Log something to to the customized log.
	 * @param unknown_type $logLine
	 * @param string Log severity.
	 */
	protected function log($logLine, $severity=null) {
		if($severity == null) {
			$severity = Zend_Log::INFO;
		}
		
		if($this->_logger !== null) {
			$this->_logger->log($logLine, $severity);
		}
	}
	
	public function flush() {
		$this->requestBody = null;
		$this->requestLength = 0;
		$this->verb = 'GET';
		$this->responseBody = null;
		$this->responseInfo = null;
	}
	
	/**
	 * Returns the contents of the response body from the request.
	 * @return string
	 */
	public function getResponseBody() {
		return $this->responseBody;
	}
	
	/**
	 * Gets the raw reqest body.
	 * @return string
	 */
	public function getRequestBody() {
		return $this->requestBody;
	}
	/**
	 * This function wants an associative array in order to build the name/value pairs to send with the request.
	 * @param unknown_type $data
	 */
	public function buildPostBody ($data = null)
	{
		$data = ($data !== null) ? $data : $this->requestBody;

		if (!is_array($data))
		{
			throw new InvalidArgumentException('Invalid data input for postBody.  Array expected');
		}
		
		$dataString = '';
		
		// Loop over each array element and create a URL encoded string.
		foreach($data as $thisKey => $thisValue) {
			if(strlen($dataString)) {
				$dataString .= '&';
			}
			$dataString .= $thisKey . '=' . urlencode($thisValue);
		}
		
		// Hm... this function does not concat in the null values.
		// $data = http_build_query($data, '', '&');
		
		$this->requestBody = $dataString;
	}
	
	
	protected function executePost ($ch)
	{
		if (!is_string($this->requestBody))
		{
			$this->buildPostBody();
		}

		curl_setopt($ch, CURLOPT_POSTFIELDS, $this->requestBody);
		curl_setopt($ch, CURLOPT_POST, 1);
		
		$this->doExecute($ch, $this->url, 'POST');
	}
	
	
	protected function executeGet ($ch)
	{
		$fullUrl = $this->url . '?' . $this->requestBody;
		$this->doExecute($ch, $fullUrl, 'GET');
	}
	
	
	
	protected function executePut ($ch)
	{
		if (!is_string($this->requestBody))
		{
			$this->buildPostBody();
		}

		$this->requestLength = strlen($this->requestBody);

		$fh = fopen('php://memory', 'rw');
		fwrite($fh, $this->requestBody);
		rewind($fh);

		curl_setopt($ch, CURLOPT_INFILE, $fh);
		curl_setopt($ch, CURLOPT_INFILESIZE, $this->requestLength);
		curl_setopt($ch, CURLOPT_PUT, true);
		$this->doExecute($ch, $this->url, 'PUT');

		fclose($fh);
	}
	
	
	protected function executeDelete ($ch)
	{
		$fullUrl = $this->url . '?' . $this->requestBody;
		curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'DELETE');
		$this->doExecute($ch, $fullUrl, 'DELETE');
	}
	
	
	public function execute ()
	{
		$ch = curl_init();
		$this->setAuth($ch);

		try
		{
			switch (strtoupper($this->verb))
			{
				case 'GET':
					$this->executeGet($ch);
					break;
				case 'POST':
					$this->executePost($ch);
					break;
				case 'PUT':
					$this->executePut($ch);
					break;
				case 'DELETE':
					$this->executeDelete($ch);
					break;
				default:
					throw new InvalidArgumentException('Current verb (' . $this->verb . ') is an invalid REST verb.');
			}
		}
		catch (InvalidArgumentException $e)
		{
			curl_close($ch);
			throw $e;
		}
		catch (Exception $e)
		{
			curl_close($ch);
			throw $e;
		}
		
		return $this->responseBody;

	}

	/**
	 * 
	 * @param curlresource $curlHandle
	 * @param string $url URL of endpoint.
	 */
	protected function doExecute (&$curlHandle, $url, $method)
	{
		// Set a bunch of random options.
		$this->setCurlOpts($curlHandle);
		
		// Point at the correct endpoint.
		curl_setopt($curlHandle, CURLOPT_URL, $url);
		
		// Finish the log line.
		$this->log('About to send an "' . $method . '" request to the following URL "' . $url . '".');
		
		// Create a timer.
		$timer = new FirstGiving_Utility_Date_Timer();
 
		// Connect to the endpoint..
		$this->responseBody = curl_exec($curlHandle);
		
	 	// Stop the timer.
		$milliseconds = $timer->getElapsedTime();
 		
		// If the curl request did not work, throw an exception.
		if($this->responseBody === false)
		{
			$capturedCurlErrorMessage = curl_error($curlHandle);
			$verboseErrorMessage = 'Curl errored after ' . $milliseconds . ' milliseconds with the following message: "' . $capturedCurlErrorMessage . '" when accessing "' . $url . '".';
			$this->log($verboseErrorMessage, Zend_Log::ERR);
		    throw new FirstGivingCurlException($verboseErrorMessage, 'We had trouble connecting to the donations processing system.', null, $verboseErrorMessage, $this->getHttpResponseCode());
		} else {
			// Finish the log line.
			$this->log('Completed curl request after ' . $milliseconds . ' milliseconds with the following response body: "' . $this->responseBody . '".');
		}
		
		
		$this->responseInfo	= curl_getinfo($curlHandle);

		curl_close($curlHandle);
	}
	
	/**
	 * Sets general opts used by curl.
	 * @param unknown_type $curlHandle
	 */
	protected function setCurlOpts (&$curlHandle)
	{
		curl_setopt($curlHandle, CURLOPT_TIMEOUT, $this->curlTimeoutSeconds);
		curl_setopt($curlHandle, CURLOPT_RETURNTRANSFER, true);
		// Turning off the server and peer verification(TrustManager Concept).
        curl_setopt ( $curlHandle, CURLOPT_SSL_VERIFYPEER, FALSE );
        curl_setopt ( $curlHandle, CURLOPT_SSL_VERIFYHOST, FALSE );
		// curl_setopt($curlHandle, CURLOPT_HTTPHEADER, array ('Accept: ' . $this->acceptType));
		curl_setopt($curlHandle, CURLOPT_HTTPHEADER, array('JG_APPLICATIONKEY:'.$this->applicationId, 'JG_SECURITYTOKEN:'.$this->securityToken));
	}
	
	
	protected function setAuth (&$curlHandle)
	{
		if ($this->username !== null && $this->password !== null)
		{
			curl_setopt($curlHandle, CURLOPT_HTTPAUTH, CURLAUTH_DIGEST);
			curl_setopt($curlHandle, CURLOPT_USERPWD, $this->username . ':' . $this->password);
		}
	}
}
