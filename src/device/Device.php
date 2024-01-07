<?php

namespace Thiago\CellphonePlans\device;

class Device
{
    private string $name;

    /**
     * @var array<DevicePlan>
     */
    private array $devicePlans;

    public function __construct(string $name)
    {
        $this->name = $name;
    }

    /**
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }

    public function addPlan(DevicePlan $devicePlan): void
    {
        $this->devicePlans[] = $devicePlan;
    }

    /**
     * @param int $id
     * @return DevicePlan
     */
    public function getDevicePlan(int $id): DevicePlan
    {
        return $this->devicePlans[$id];
    }

    /**
     * @return array
     */
    public function getDevicePlans(): array
    {
        return $this->devicePlans;
    }
}