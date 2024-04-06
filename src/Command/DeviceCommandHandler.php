<?php

namespace Thiago\CellphonePlans\Command;

use Thiago\CellphonePlans\Interfaces\DeviceCommandInterface;
use Thiago\CellphonePlans\Interfaces\DevicesManagerInterface;
use Thiago\CellphonePlans\Device\DevicesList;

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
