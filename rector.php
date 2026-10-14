<?php

declare(strict_types=1);

use Rector\Config\RectorConfig;
use Utils\Rector\Rector\EnsureCarbonTestNowIsReleasedRector;

return RectorConfig::configure()
    ->withPaths([
        __DIR__.'/tests',
    ])
    ->withRules([
        EnsureCarbonTestNowIsReleasedRector::class,
    ]);
