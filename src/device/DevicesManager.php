<?php

namespace Thiago\CellphonePlans\device;

use Interfaces\DevicesManagerInterface;

class DevicesManager implements DevicesManagerInterface
{
    private DevicesList $devicesList;

    public function __construct()
    {
        $this->devicesList = new DevicesList();
    }

    public function addDevice(Device $device): void
    {
        $this->devicesList->addDevice($device);
    }

    public function sortPlans(): void
    {
        // Sort all plans of device
    }

    public function getDevices(): DevicesList
    {
        return $this->devicesList;
    }
}