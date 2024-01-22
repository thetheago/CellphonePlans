<?php

namespace Interfaces;

use Thiago\CellphonePlans\device\Device;
use Thiago\CellphonePlans\device\DevicesList;

interface DevicesManagerInterface
{
    public function addDevice(Device $device): void;

    public function sortPlans(): void;

    public function getDevices(): DevicesList;
}