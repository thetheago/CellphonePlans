<?php

namespace Thiago\CellphonePlans\Interfaces;

use Thiago\CellphonePlans\Device\Device;

interface DeviceCommandInterface
{
    public function getDevice(string $jsonPath): Device;
}
