<?php

namespace Utils\Rector\Tests\Rector\EnsureCarbonTestNowIsReleasedRector\Fixture;

use Carbon\Carbon;
use Carbon\CarbonImmutable;
use PHPUnit\Framework\TestCase;

class ReleaseBoth extends TestCase
{
    public function testSomeFunctionality()
    {
        Carbon::setTestNow('now');
        CarbonImmutable::setTestNow('now');

        // Some code
    }
}

?>
-----
<?php

namespace Utils\Rector\Tests\Rector\EnsureCarbonTestNowIsReleasedRector\Fixture;

use Carbon\Carbon;
use Carbon\CarbonImmutable;
use PHPUnit\Framework\TestCase;

class ReleaseBoth extends TestCase
{
    public function testSomeFunctionality()
    {
        Carbon::setTestNow('now');
        CarbonImmutable::setTestNow('now');

        // Some code

        CarbonImmutable::setTestNow();
    }
}

?>
