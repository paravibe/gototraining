# GoToTraining PHP wrapper

[![Latest Version](https://img.shields.io/github/release/paravibe/gototraining.svg?style=flat-square)](https://github.com/paravibe/gototraining/releases)
[![Build Status](https://img.shields.io/travis/paravibe/gototraining.svg?style=flat-square)](https://travis-ci.org/paravibe/gototraining)
[![Total Downloads](https://img.shields.io/packagist/dt/paravibe/gototraining.svg?style=flat-square)](https://packagist.org/packages/paravibe/gototraining)

## Installation
`composer require paravibe/gototraining`

## How to use

### Initialize client
`$client = new \LogMeIn\GoToTraining\Client($access_token, $values);`

Where `$access_token` is a token retrived during authorization procedure - https://developer.goto.com/guides/HowTos/03_HOW_accessToken/  
and `$values` are response data that contain:
* account_key
* account_type
* email
* firstName
* lastName
* organizer_key

Use any method described here https://developer.goto.com/GoToTrainingV1
by passing proper HTTP method and endpoint to `createRequest()` method.

### GET/DELETE methods
```php
$get = $client->createRequest('GET', "organizers/{$organizer_key}/trainings")->execute();
$data = $get->getDecodedBody();
```
### POST/PUT methods
```php
$post_data = array(
  'name' => 'Training',
  'description' => 'Test API integration',
  'times' => [
    [
      'startDate' => '2021-03-02T12:00:00Z',
      'endDate' => '2021-03-02T13:00:00Z',
    ]
  ],
  'timeZone' => 'Europe/Kiev',
);

$new = $client->createRequest('POST', "organizers/{$organizer_key}/trainings")
  ->attachBody($post_data)
  ->execute();
```
