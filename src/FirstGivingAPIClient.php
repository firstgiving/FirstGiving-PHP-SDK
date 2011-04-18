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

require_once dirname(__FILE__) . '/RestRequest.php';
require_once dirname(__FILE__) . '/RestUtils.php';
require_once dirname(__FILE__) . '/FirstGivingSayHello.php';
require_once dirname(__FILE__) . '/FirstGivingDonation.php';
require_once dirname(__FILE__) . '/FirstGivingAbstractPayment.php';
require_once dirname(__FILE__) . '/FirstGivingCreditCardPayment.php';
require_once dirname(__FILE__) . '/FirstGivingRecurringCreditCardProfileRequest.php';
require_once dirname(__FILE__) . '/FirstGivingRecurringCreditCardProfileResponse.php';
require_once dirname(__FILE__) . '/FirstGivingECheckPayment.php';
require_once dirname(__FILE__) . '/FirstGivingCreditCardDonationResponse.php';
require_once dirname(__FILE__) . '/FirstGivingPaypalExpressCheckoutRequest.php';
require_once dirname(__FILE__) . '/FirstGivingPaypalExpressCheckoutRedirectResponse.php';
require_once dirname(__FILE__) . '/FirstGivingPaypalExpressCheckoutPaymentResponse.php';
require_once dirname(__FILE__) . '/FirstGivingPaypalExpressCheckoutBuyerInformation.php';
require_once dirname(__FILE__) . '/Exception/FirstGivingGeneralException.php';
require_once dirname(__FILE__) . '/Exception/FirstGivingCurlException.php';
require_once dirname(__FILE__) . '/Exception/FirstGivingInvalidInputException.php';


class FirstGivingAPIClient {

	protected $_application_id;
	protected $_security_token;
	protected $_api_endpoint;

	/* @var RestRequest */
	protected $_last_rest_request;

	protected $_logger;

	/**
	 * Creates an instance of the API client.
	 *
	 * @param string $applicationId
	 * @param string $securityToken
	 * @param string $apiEndpoint
	 */
	public function __construct($applicationId, $securityToken, $apiEndpoint,$logger=null) {
		$this->_application_id = $applicationId;
		$this->_security_token = $securityToken;
		$this->_api_endpoint = $apiEndpoint;
		$this->_logger = $logger;
	}

	/**
	 * Gives you the RestRequest object that describes the last REST request.
	 * @return RestRequest
	 */
	public function getLastRestRequest() {
		return $this->_last_rest_request;
	}


	/**
	 * Allows you to verify your ability to talk to the server. This should only be used for initial debugging purposes.
	 *
	 * @return FirstGivingSayHello
	 */
	public function sayHello() {

		// Send the array of values to FirstGiving.
		/* @var $restRequestObject RestRequest */
		$restRequestObject = $this->sendApiRequest('/default/test/0', 'GET');

		/* @var $firstGivingResponseObject FirstGivingSayHello */
		$firstGivingResponseObject = $this->createSayHelloObject($restRequestObject);

		return $firstGivingResponseObject;

	}

	/**
	 *
	 * @param FirstGivingPaypalExpressCheckoutRequest $expressCheckoutRedirectRequest
	 * $remoteAddr string IP address of the remote user's computer.
	 * @return FirstGivingPaypalExpressCheckoutRedirectResponse
	 */
	public function getExpressCheckoutRedirect(FirstGivingPaypalExpressCheckoutRequest $expressCheckoutRedirectRequest, $remoteAddr = null) {

		// If no remote addr was manually passed, set it to the remote addr reported by the web server.
		if($remoteAddr == null) {
			$remoteAddr = $_SERVER['REMOTE_ADDR'];
		}

		// Create an array of values to be passed to FirstGiving.
		$restApiInputValues = array();
		$restApiInputValues['amount'] = $expressCheckoutRedirectRequest->getAmount();
		$restApiInputValues['currencyCode'] = $expressCheckoutRedirectRequest->getCurrencyCode();
		$restApiInputValues['returnUrl'] = $expressCheckoutRedirectRequest->getReturnUrl();
		$restApiInputValues['cancelUrl'] = $expressCheckoutRedirectRequest->getCancelUrl();
		$restApiInputValues['fundraiserId'] = $expressCheckoutRedirectRequest->getFundraiserId();
		$restApiInputValues['charityId'] = $expressCheckoutRedirectRequest->getCharityId();
		$restApiInputValues['eventId'] = $expressCheckoutRedirectRequest->getEventId();
		$restApiInputValues['orderId'] = $expressCheckoutRedirectRequest->getOrderId();
		$restApiInputValues['description'] = $expressCheckoutRedirectRequest->getDescription();
		$restApiInputValues['remoteAddr'] = $remoteAddr;
		$restApiInputValues['reportDonationToTaxAuthority'] = ($expressCheckoutRedirectRequest->getReportDonationToTaxAuthority() == true) ? '1' : '0';
		$restApiInputValues['personalIdentificationNumber'] = ($expressCheckoutRedirectRequest->getPersonalIdentificationNumber() == null) ? '' : $expressCheckoutRedirectRequest->getPersonalIdentificationNumber();

		// Send the array of values to FirstGiving.
		$restResponseObject = $this->sendApiRequest('/paypal/expresscheckoutrequest', 'GET', $restApiInputValues);

		/* @var $firstGivingPaypalCreditCardDonationResponse FirstGivingPaypalCreditCardDonationResponse */
		$firstGivingPaypalCreditCardDonationResponse = $this->createPaypalExpressCheckoutRedirectResponseObject($restResponseObject);

		return $firstGivingPaypalCreditCardDonationResponse;
	}

	/**
	 * Captures a payment from the buyer identified by $expresscheckoutsessionid.
	 * @param $expresscheckoutsessionid
	 * @return FirstGivingPaypalExpressCheckoutPaymentResponse
	 */
	public function captureExpressCheckoutPayment($expresscheckoutsessionid) {

		// Create an array of values to be passed to FirstGiving.
		$restApiInputValues = array();
		$restApiInputValues['expresscheckoutsession'] = $expresscheckoutsessionid;

    	// Send the array of values to FirstGiving.
		$restResponseObject = $this->sendApiRequest('/paypal/expresscheckoutpayment', 'POST', $restApiInputValues);

		/* @var $firstGivingPaypalExpressCheckoutPaymentResponse FirstGivingPaypalExpressCheckoutPaymentResponse */
		$firstGivingPaypalExpressCheckoutPaymentResponse = $this->createPaypalExpressCheckoutPaymentResponpseObject($restResponseObject);

		return $firstGivingPaypalExpressCheckoutPaymentResponse;
	}

	/**
	 * Create a recurring donations profile.
	 * @returns FirstGivingRecurringCreditCardProfileResponse
	 */
	public function createRecurringDonationProfile(FirstGivingDonation $donationObject, FirstGivingCreditCardPayment $paymentInformationObject, $remoteAddr, $frequency, $term) {

		/* @var $restApiInputValues array */
		$restApiInputValues = $this->assembleRestApiInputValuesForCreditCardDonation($donationObject, $paymentInformationObject, $remoteAddr);

		// Add the recurring values.
        $restApiInputValues['ccNumber'] = $paymentInformationObject->getCcNumber();
        $restApiInputvalues['ccType'] = $paymentInformationObject->getCcType();
		$restApiInputValues['recurringBillingFrequency'] = $frequency;
		$restApiInputValues['recurringBillingTerm'] = $term;

		// Send the array of values to FirstGiving.
		$restResponseObject = $this->sendApiRequest('/donation/recurringcreditcardprofile', 'POST', $restApiInputValues);

		/* @var $firstGivingCCProfileResponseObject FirstGivingRecurringCreditCardProfileResponse */
		$firstGivingCCProfileResponseObject = $this->createRecurringCreditCardProfileResponseObject($restResponseObject);

		return $firstGivingCCProfileResponseObject;

	}

	/**
	 * Verifies if a message was sent from FirstGiving.
	 *
	 * Returns bool to indicate if a message you received originated from FirstGiving.
	 *
	 * @param string $message
	 * @param string $signature
	 * @returns bool
	 */
	public function messageWasSentFromFirstGiving($message, $signature) {

		/* @var $restApiInputValues array */
		$restApiInputValues = array('signature'	=> $signature,
									'message'	=> $message);

		// Send the array of values to FirstGiving.
		$restResponseObject = $this->sendApiRequest('/verify', 'POST', $restApiInputValues);

		/* @var $valid bool */
		$valid = $this->getMessageWasFromFirstGiving($restResponseObject);

		return $valid == 1;

	}

	/**
	 * Submit a donation to FirstGiving's web API.
	 *
	 * @param FirstGivingDonation $donationObject
	 * @param FirstGivingCreditCardPayment $paymentInformationObject
	 * @param string $remoteAddr The IP address of the donor.
	 * @return FirstGivingCreditCardDonationResponse
	 */
	public function makeCreditCardDonation(FirstGivingDonation $donationObject, FirstGivingCreditCardPayment $paymentInformationObject, $remoteAddr) {

		/* @var $restApiInputValues array */
		$restApiInputValues = $this->assembleRestApiInputValuesForCreditCardDonation($donationObject, $paymentInformationObject, $remoteAddr);

		// Send the array of values to FirstGiving.
		$restResponseObject = $this->sendApiRequest('/donation/creditcard', 'POST', $restApiInputValues);

		/* @var $firstGivingResponseObject FirstGivingCreditCardDonationResponse */
		$firstGivingResponseObject = $this->createCreditCardDonationResponseObject($restResponseObject);

		return $firstGivingResponseObject;

	}

	/**
	 * Returns the original array with nulls removed.
	 * @param $inputArray
	 */
	private function removeNulls($inputArray) {
		$newArray = array();
		foreach($inputArray as $thisKey => $thisValue) {
			if($thisValue !== null) {
				$newArray[$thisKey] = $thisValue;
			}
		}
		return $newArray;
	}

	/**
	 * Returns all of the information about the buyer as provided by Paypal's express checkout interface.
	 * @param $expresscheckoutsessionid
	 * @return FirstGivingPaypalExpressCheckoutBuyerInformation
	 */
	public function getPaypalExpressCheckoutBuyerInformation($expresscheckoutsessionid) {

		// Send the array of values to FirstGiving.
		$restResponseObject = $this->sendApiRequest('/paypal/expresscheckoutbuyerinformation/'.$expresscheckoutsessionid, 'GET', array());

		/* @var $firstGivingPaypalExpressCheckoutBuyerInformation FirstGivingPaypalExpressCheckoutBuyerInformation */
		$firstGivingPaypalExpressCheckoutBuyerInformation = $this->createPaypalExpressCheckoutBuyerInformationObject($restResponseObject);

		return $firstGivingPaypalExpressCheckoutBuyerInformation;
	}

	/**
	 * Loads a buyer information object.
	 * @param $restResponseObject
	 * @return FirstGivingPaypalExpressCheckoutBuyerInformation
	 */
	public function createPaypalExpressCheckoutBuyerInformationObject($restResponseObject) {

		// Convert to an xml object.
		$xmlObject = simplexml_load_string($restResponseObject->getResponseBody());

		$buyerInfo = new FirstGivingPaypalExpressCheckoutBuyerInformation();
		$buyerInfo->setFirstName(current($xmlObject->firstGivingResponse->firstName));
		$buyerInfo->setLastName(current($xmlObject->firstGivingResponse->lastName));
		$buyerInfo->setEmail(current($xmlObject->firstGivingResponse->email));
		$buyerInfo->setCountry(current($xmlObject->firstGivingResponse->country));
		$buyerInfo->setAddress1(current($xmlObject->firstGivingResponse->address1));
		if(current($xmlObject->firstGivingResponse->address2) !== false) {
			$buyerInfo->setAddress2(current($xmlObject->firstGivingResponse->address2));
		}
		$buyerInfo->setCity(current($xmlObject->firstGivingResponse->city));
		$buyerInfo->setState(current($xmlObject->firstGivingResponse->state));
		$buyerInfo->setZip(current($xmlObject->firstGivingResponse->zip));
		$buyerInfo->setCurrencyCode(current($xmlObject->firstGivingResponse->currencyCode));
		$buyerInfo->setAmount(current($xmlObject->firstGivingResponse->amount));

		return $buyerInfo;

	}


	/**
	 * Post some XML content to litle and return the Zend_Http_Response response object.
	 * PUBLIC ONLY FOR MOCKING IN PHPUNIT.
	 * @param string $resourceName URI of REST resource.
	 * @param string $httpMethod HTTP REST method to invoke.
	 * @param $array Name and value pairs to send across the wire.
	 * @return RestRequest
	 */
	public function sendApiRequest($resourceName, $httpMethod, $arrayOfValues=array()) {

		// Create an object to store the HTTP response values.
		$stdObject = new stdClass();

		// Create an instance of curl.
		$curlHandle = curl_init();

		// I expect the resource name to always be prefixed with a beginning slash.
		// Example: "/donation/creditcard".
		// If we find the initial slash, remove it so that we have a valid abs link.
		if(substr($resourceName, 0,1) == '/') {
			$resourceName = substr($resourceName, 1);
		}

		// Create the api URL.
		$apiUrl = $this->_api_endpoint . $resourceName;

		// Create a REST request.
		$restRequest = new RestRequest($this->_application_id, $this->_security_token, $apiUrl, strtoupper($httpMethod), $arrayOfValues, $this->_logger);

		// Execute the request.
		$restRequest->execute();

		// Remember the last request.
		$this->_last_rest_request = $restRequest;

		// Handle error responses from the server.
		switch ($restRequest->getHttpResponseCode()) {

			// If an unauthorized response was returned, throw an unauthorized exception.
			case '401':

				throw new FirstGivingGeneralException(  'You may not access the API with an application id of ' . $this->_application_id . ' and a security token of ' . $this->_security_token . '.',
														'Problems were detected when connecting to the donations gateway.',
														null,
														$restRequest->getResponseBody(),
														$restRequest->getHttpResponseCode());
				break;

				// ($verboseMessage, $friendlyMessage='An error occurred. No further details are available.', $errorTarget=null, $rawResponse=null, $responseCode=null

			// If invalid input, throw an error.
			case '400':

				// Convert to an xml object.
				$xmlObject = simplexml_load_string($restRequest->getResponseBody());

				// Try to capture error messages.
				$verboseErrorMessage = null;
				$friendlyErrorMessage = null;
				$errorTarget = null;

				if(isset($xmlObject->firstGivingResponse['verboseErrorMessage'])) {
					$verboseErrorMessage = current($xmlObject->firstGivingResponse['verboseErrorMessage']);
				}
				if(isset($xmlObject->firstGivingResponse['verboseErrorMessage'])) {
					$friendlyErrorMessage = current($xmlObject->firstGivingResponse['friendlyErrorMessage']);
				}
				if(isset($xmlObject->firstGivingResponse['errorTarget'])) {
					$errorTarget = current($xmlObject->firstGivingResponse['errorTarget']);
				}
				throw new FirstGivingInvalidInputException($verboseErrorMessage, $friendlyErrorMessage, $errorTarget, $restRequest->getResponseBody(), $restRequest->getHttpResponseCode());
				break;

			// If messed up application.
			case '500':

				// What was the raw response?
				$rawResponse = $restRequest->getResponseBody();

				// Convert to an xml object.
				$xmlObject = simplexml_load_string($rawResponse);

				// Try to capture error messages.
				$verboseErrorMessage = null;
				$friendlyErrorMessage = null;
				$errorTarget = null;

				if(isset($xmlObject->firstGivingResponse['verboseErrorMessage'])) {
					$verboseErrorMessage = current($xmlObject->firstGivingResponse['verboseErrorMessage']);
				}
				if(isset($xmlObject->firstGivingResponse['friendlyErrorMessage'])) {
					$friendlyErrorMessage = current($xmlObject->firstGivingResponse['friendlyErrorMessage']);
				}
				if(isset($xmlObject->firstGivingResponse['errorTarget'])) {
					$errorTarget = current($xmlObject->firstGivingResponse['errorTarget']);
				}

				throw new FirstGivingGeneralException($verboseErrorMessage, $friendlyErrorMessage, $errorTarget, $rawResponse, $restRequest->getHttpResponseCode());
				break;

		}

		if($restRequest->getHttpResponseCode() == '401') {

		}

		// If the HTTP response  it was not equal to "400" (created), then
		// we've got a problem.
		if($this->_last_rest_request->getHttpResponseCode() !== '400') {

		}

		return $restRequest;

	}

	/**
	 * Given a REST request
	 * @param RestRequest $restRequestObject
	 * @return FirstGivingSayHello
	 */
	private function createSayHelloObject(RestRequest $restRequestObject) {

		// Create the result object.
		$helloResponse = new FirstGivingSayHello();

		// Convert to an xml object.
		$xmlObject = simplexml_load_string($restRequestObject->getResponseBody());

		$helloResponse->setFriendlyMessage(current($xmlObject->firstGivingResponse->friendlyMessage));

		return $helloResponse;
	}

	/**
	 * Converts a generic REST request response into a proper FirstGiving Paypal donation response object.
	 * @param RestRequest $restRequestObject
	 * @return FirstGivingPaypalExpressCheckoutRedirectResponse
	 */
	private function createPaypalExpressCheckoutRedirectResponseObject(RestRequest $restRequestObject) {

		// Create the response object.
		/* @var $response FirstGivingPaypalExpressCheckoutRedirectResponse */
		$response = new FirstGivingPaypalExpressCheckoutRedirectResponse();

		// Convert to an xml object.
		$xmlObject = simplexml_load_string($restRequestObject->getResponseBody());

		$response->setRedirectUrl(current($xmlObject->firstGivingResponse->redirectUrl));

		return $response;

	}

	/**
	 * Converts a generic REST response into a proper FirstGiving Paypal payment response object.
	 * @param RestRequest $restRequestObject
	 * @return FirstGivingPaypalExpressCheckoutPaymentResponse
	 */
	private function createPaypalExpressCheckoutPaymentResponpseObject(RestRequest $restRequestObject) {

		// Create the response object.
		/* @var $paymentResponse FirstGivingPaypalExpressCheckoutPaymentResponse */
		$paymentResponse = new FirstGivingPaypalExpressCheckoutPaymentResponse();

		// Convert to an xml object.
		$xmlObject = simplexml_load_string($restRequestObject->getResponseBody());

		$paymentResponse->setTransactionId(current($xmlObject->firstGivingResponse->transactionId));

		return $paymentResponse;

	}

	/**
	 * Converts a generic REST request response into a proper FirstGiving credit card donation response object.
	 * @param RestRequest $restRequestObject
	 * @return FirstGivingCreditCardDonationResponse
	 */
	private function createCreditCardDonationResponseObject(RestRequest $restRequestObject) {

		// Create the response object.
		$response = new FirstGivingCreditCardDonationResponse();

		// Convert to an xml object.
		$xmlObject = simplexml_load_string($restRequestObject->getResponseBody());

		$response->setTransactionId(current($xmlObject->firstGivingResponse->transactionId));
		$response->setRawResponse($restRequestObject->getResponseBody());
		$response->setResponseCode($restRequestObject->getHttpResponseCode());
		// If a recurring billing profile id was detected, set it now
		if(isset($xmlObject->firstGivingResponse->recurringBillingProfileId)) {
			$response->setRecurringBillingProfileId(current($xmlObject->firstGivingResponse->recurringBillingProfileId));
		}

		return $response;

	}

	/**
	 * Converts a generic REST request response into a proper FirstGiving credit card donation response object.
	 * @param RestRequest $restRequestObject
	 * @return FirstGivingRecurringCreditCardProfileResponse
	 */
	private function createRecurringCreditCardProfileResponseObject(RestRequest $restRequestObject) {

		// Create the response object.
		$response = new FirstGivingRecurringCreditCardProfileResponse();

        // Convert to an xml object.
		$xmlObject = simplexml_load_string($restRequestObject->getResponseBody());

		$response->setRawResponse($restRequestObject->getResponseBody());
		$response->setResponseCode($restRequestObject->getHttpResponseCode());
        $response->setRecurringBillingProfileId(current($xmlObject->firstGivingResponse->recurringDonationProfileId));

		return $response;
	}

	/**
	 * Scans through xml returned from the verifiy method and returns the bool valid element text value.
	 * @param RestRequest $restRequestObject
	 * @returns bool
	 */
	private function getMessageWasFromFirstGiving(RestRequest $restRequestObject) {
		// Convert to an xml object.
		$xmlObject = simplexml_load_string($restRequestObject->getResponseBody());

		return current($xmlObject->firstGivingResponse->valid);
	}


/**
	 * Creates an assoc array of all of the api input values.
	 *
	 * @param FirstGivingDonation $donationObject
	 * @param FirstGivingCreditCardPayment $paymentInformationObject
	 * @param string $remoteAddr The IP address of the donor.
	 * @returns array
	 */
	private function assembleRestApiInputValuesForCreditCardDonation(FirstGivingDonation $donationObject, FirstGivingCreditCardPayment $paymentInformationObject, $remoteAddr) {
		// Create an array of values to be passed to FirstGiving.
		$restApiInputValues = array();
		$restApiInputValues['ccNumber'] = $paymentInformationObject->getCcNumber();
		$restApiInputValues['ccType'] = $paymentInformationObject->getCcType();
		$restApiInputValues['ccExpDateMonth'] = $paymentInformationObject->getCcExpDateMonth();
		$restApiInputValues['ccExpDateYear'] = $paymentInformationObject->getCcExpDateYear();
		$restApiInputValues['ccCardValidationNum'] = $paymentInformationObject->getCcCardValidationNum();
		$restApiInputValues['billToTitle'] = $paymentInformationObject->getBillToTitle();
		$restApiInputValues['billToFirstName'] = $paymentInformationObject->getBillToFirstName();
		$restApiInputValues['billToMiddleName'] = $paymentInformationObject->getBillToMiddleName();
		$restApiInputValues['billToLastName'] = $paymentInformationObject->getBillToLastName();
		$restApiInputValues['billToAddressLine1'] = $paymentInformationObject->getBillToAddressLine1();
		$restApiInputValues['billToAddressLine2'] = $paymentInformationObject->getBillToAddressLine2();
		$restApiInputValues['billToAddressLine3'] = $paymentInformationObject->getBillToAddressLine3();
		$restApiInputValues['billToCity'] = $paymentInformationObject->getBillToCity();
		$restApiInputValues['billToState'] = $paymentInformationObject->getBillToState();
		$restApiInputValues['billToZip'] = $paymentInformationObject->getBillToZip();
		$restApiInputValues['billToCountry'] = $paymentInformationObject->getBillToCountry();
		$restApiInputValues['billToEmail'] = $paymentInformationObject->getBillToEmail();
		$restApiInputValues['billToPhone'] = $paymentInformationObject->getBillToPhone();
		$restApiInputValues['remoteAddr'] = $remoteAddr;
		$restApiInputValues['charityId'] = $donationObject->getCharityId();
		if($donationObject->getEventId() == null) {
			$restApiInputValues['eventId'] = '';
		} else {
			$restApiInputValues['eventId'] = $donationObject->getEventId();
		}
		$restApiInputValues['fundraiserId'] = $donationObject->getFundraiserId();
		$restApiInputValues['orderId'] = $donationObject->getOrderId();
		$restApiInputValues['description'] = $donationObject->getDescription();
		$restApiInputValues['reportDonationToTaxAuthority'] = ($donationObject->getReportDonationToTaxAuthority() == true) ? '1' : '0';
		$restApiInputValues['personalIdentificationNumber'] = ($donationObject->getPersonalIdentificationNumber() == null) ? '' : $donationObject->getPersonalIdentificationNumber();
		$restApiInputValues['donationMessage'] = $donationObject->getDonationMessage();
		$restApiInputValues['honorMemoryName'] = $donationObject->getHonorMemoryName();
		$restApiInputValues['billingDescriptor'] = $paymentInformationObject->getBillingDescriptor();
		$restApiInputValues['amount'] = $donationObject->getAmount();
		$restApiInputValues['currencyCode'] = $donationObject->getCurrencyCode();
		$restApiInputValues['recurringBillingFrequency'] = $donationObject->getRecurringBillingFrequency();
		$restApiInputValues['recurringBillingTerm'] = $donationObject->getRecurringBillingTerm();

		return $restApiInputValues;
	}

}