<?php

namespace Command;

use Interfaces\DeviceCommandInterface;
use Interfaces\DevicesManagerInterface;
use Thiago\CellphonePlans\device\DevicesList;

class DeviceCommandHandler
{
    private DevicesManagerInterface $devicesManager;

    public function __construct(DevicesManagerInterface $devicesManager)
    {
        $this->devicesManager = $devicesManager;
    }

    public function execute(DeviceCommandInterface $deviceCommand): DevicesList
    {
        $device = $deviceCommand->getDevice(__DIR__ . '/../public/data.json');
        $this->devicesManager->addDevice($device);
        $this->devicesManager->sortPlans();

        return $this->devicesManager->getDevices();
    }
}