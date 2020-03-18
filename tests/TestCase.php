<?php

namespace Tests;

use JMac\Testing\Traits\HttpTestAssertions;
use Illuminate\Foundation\Testing\TestCase as BaseTestCase;

abstract class TestCase extends BaseTestCase
{
    use CreatesApplication;
    use HttpTestAssertions;
    use ManagesTestUsers;
    use AddsCustomAssertions;

    public function setUp(): void
    {
        parent::setUp();

        $this->setupTestResponseMacros();
    }
}
