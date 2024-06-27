# TYPO3 Health Middleware

## Installation

`composer require diego/health-middleware`

## Configuration (example)

```php
# Configuration/RequestMiddlewares.php

<?php declare(strict_types=1);

use Diego\HealthMiddleware\HealthMiddleware;
use TYPO3\CMS\Core\Core\Environment;

return [
    'frontend' => [
        HealthMiddleware::IDENTIFIER => [
            'target' => HealthMiddleware::class,
            'before' => [
                'typo3/cms-frontend/timetracker',
            ],
            'disabled' => !Environment::getContext()->isDevelopment(),
        ],
    ],
];
```
