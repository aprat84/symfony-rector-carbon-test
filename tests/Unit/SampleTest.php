<?php
declare(strict_types=1);

namespace App\Tests\Unit;

use Carbon\CarbonImmutable;
use PHPUnit\Framework\TestCase;

class SampleTest extends TestCase
{
    public function testSomeCode(): void
    {
        CarbonImmutable::setTestNow('now');

        // Some code

        self::assertNotEmpty('asdf');
    }
}
