<?php

/**
 * @file
 */

namespace LogMeIn\GoToTraining;

use LogMeIn\GoToTraining\Core\GoToTrainingConstants;
use LogMeIn\GoToTraining\Http\GoToTrainingRequest;

class Client {

  public $values = array();

  protected $baseUrl;
  protected $apiPrefix;
  protected $accessToken;

  public function __construct($token, $values = array()) {
    $this->baseUrl = GoToTrainingConstants::REST_API_ENDPOINT;
    $this->apiPrefix = GoToTrainingConstants::REST_API_PREFIX;
    $this->accessToken = $token;

    // Set additional values received after token request.
    $this->values = array(
      'accountKey' => isset($values['account_key']) ? $values['account_key'] : NULL,
      'accountType' => isset($values['account_type']) ? $values['account_type'] : NULL,
      'email' => isset($values['email']) ? $values['email'] : NULL,
      'firstName' => isset($values['firstName']) ? $values['firstName'] : NULL,
      'lastName' => isset($values['lastName']) ? $values['lastName'] : NULL,
      'organizerKey' => isset($values['organizer_key']) ? $values['organizer_key'] : NULL,
    );
  }

  public function createRequest($requestType, $endpoint) {
    return new GoToTrainingRequest(
      $requestType,
      $endpoint,
      $this->accessToken,
      $this->baseUrl,
      $this->apiPrefix
    );
  }

}
