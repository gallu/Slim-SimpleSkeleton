<?php
declare(strict_types=1);

namespace App\Controller;

use DI\Container;

class BaseController
{
    public function __construct(
        protected Container $container,
    ) {
    }
}
