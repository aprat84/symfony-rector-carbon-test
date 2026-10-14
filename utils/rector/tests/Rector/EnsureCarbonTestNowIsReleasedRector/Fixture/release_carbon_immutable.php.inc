<?php

namespace Utils\Rector\Tests\Rector\EnsureCarbonTestNowIsReleasedRector\Fixture;

use Carbon\CarbonImmutable;
use PHPUnit\Framework\TestCase;

class ReleaseCarbonImmutable extends TestCase
{
    public function testSomeFunctionality()
    {
        CarbonImmutable::setTestNow('now');

        // Some code
    }
}

?>
-----
<?php

namespace Utils\Rector\Tests\Rector\EnsureCarbonTestNowIsReleasedRector\Fixture;

use Carbon\CarbonImmutable;
use PHPUnit\Framework\TestCase;

class ReleaseCarbonImmutable extends TestCase
{
    public function testSomeFunctionality()
    {
        CarbonImmutable::setTestNow('now');

        // Some code

        CarbonImmutable::setTestNow();
    }
}

?>
