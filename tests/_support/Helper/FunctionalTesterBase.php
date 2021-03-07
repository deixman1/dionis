<?php
declare(strict_types=1);

namespace Helper;

use Codeception\Test\Unit;
use Psr\Container\ContainerInterface;

class FunctionalTesterBase extends Unit
{
    protected ContainerInterface $container;

    public function __construct(?string $name = null, array $data = [], $dataName = '')
    {
        $this->container = setUpDi();
        parent::__construct($name, $data, $dataName);
    }
}