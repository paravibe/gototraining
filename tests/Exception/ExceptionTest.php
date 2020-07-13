<?php

/**
 * @file
 * PHPUnit tests for Exception.
 */

use PHPUnit\Framework\TestCase;
use LogMeIn\GoToTraining\Exception\GoToTrainingException;

class ExceptionTest extends TestCase {

    public function testToString() {
      $exception = new GoToTrainingException('error', '500');
      $this->assertEquals("LogMeIn\GoToTraining\Exception\GoToTrainingException: [500]: error\n", $exception->__toString());
    }

}
