<?php

declare(strict_types=1);

use Rector\Config\RectorConfig;
use Utils\Rector\Rector\EnsureCarbonTestNowIsReleasedRector;

return RectorConfig::configure()
    ->withRules([
        EnsureCarbonTestNowIsReleasedRector::class,
    ]);
