<?php

namespace Interfaces;

use Thiago\CellphonePlans\device\Device;

interface DeviceCommandInterface
{
    public function getDevice(string $jsonPath): Device;
}