<?php

namespace Thiago\CellphonePlans\device;

use Interfaces\DevicesManagerInterface;
use Thiago\CellphonePlans\device\FilterPlans\FilterPlansLocalePriority;
use Thiago\CellphonePlans\device\FilterPlans\FilterPlansWithInvalidDate;

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

    public function getDevices(): DevicesList
    {
        return $this->devicesList;
    }

    public function sortPlans(): void
    {
        $filterInvalidDate = new FilterPlansWithInvalidDate(new FilterPlansLocalePriority());
        $filterInvalidDate->filter($this->devicesList);
        $this->orderPlansByPriority($this->devicesList);
    }

    private function orderPlansByPriority(DevicesList $devicesList): void
    {
        foreach ($devicesList->getDevices() as $device) {
            $device->orderPlansByPriority();
        }
    }
}
