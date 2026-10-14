<?php

namespace Utils\Rector\Tests\Rector\EnsureCarbonTestNowIsReleasedRector\Fixture;

use Carbon\CarbonImmutable;
use PHPUnit\Framework\TestCase;

class SkipAlreadyReleasedCarbonImmutable extends TestCase
{
    public function testSomeFunctionality()
    {
        CarbonImmutable::setTestNow('now');

        // Some code

        CarbonImmutable::setTestNow();
    }
}

?>
