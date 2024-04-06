<?php

namespace Thiago\CellphonePlans\Interfaces;

use Thiago\CellphonePlans\Device\Device;
use Thiago\CellphonePlans\Device\DevicesList;

interface DevicesManagerInterface
{
    public function addDevice(Device $device): void;

    public function sortPlans(): void;

    public function getDevices(): DevicesList;
}
