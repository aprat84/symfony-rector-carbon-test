<?php

namespace Utils\Rector\Tests\Rector\EnsureCarbonTestNowIsReleasedRector\Fixture;

use Carbon\Carbon;
use PHPUnit\Framework\TestCase;

class SkipAlreadyReleasedCarbon extends TestCase
{
    public function testSomeFunctionality()
    {
        Carbon::setTestNow('now');

        // Some code

        Carbon::setTestNow();
    }
}

?>
