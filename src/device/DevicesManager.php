<?php

namespace Thiago\CellphonePlans\device;

class DevicesManager
{
    /**
     * @var array<Device>
     */
    private array $devices;

    public function __construct()
    {
    }

    public function addDevice(Device $device): void
    {
        $this->devices[] = $device;
    }

    public function sortPlans(): void
    {
        // Sort all plans of all devices
    }

    public function sortPlan(int $planId): void
    {
        // Sort plans of device
    }
}