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
     * @return DevicePlan[]
     */
    public function getDevicePlans(): array
    {
        return $this->devicePlans;
    }

    /**
     * @return int[]
     */
    public function getDevicePlansIds(): array
    {
        return array_map(fn($plan) => $plan->getId(), $this->devicePlans);
    }

    public function removePlan(int $id): void
    {
        foreach ($this->devicePlans as $key => $plan) {
            if ($plan->getId() === $id) {
                unset($this->devicePlans[$key]);
                return;
            }
        }
    }

    public function orderPlansByPriority(): void
    {
        usort($this->devicePlans, function ($a, $b) {
            return $a->getLocale()->prioridade - $b->getLocale()->prioridade;
        });
    }
}
