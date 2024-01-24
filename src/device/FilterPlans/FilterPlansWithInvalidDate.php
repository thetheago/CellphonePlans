<?php

namespace Thiago\CellphonePlans\device\FilterPlans;

use Thiago\CellphonePlans\device\DevicesList;

class FilterPlansWithInvalidDate implements FilterPlansInterface
{
    private FilterPlansInterface $filterPlan;

    public function __construct(FilterPlansInterface $filterPlan)
    {
        $this->filterPlan = $filterPlan;
    }

    public function filter(DevicesList $devicesList): void
    {
        foreach ($devicesList->getDevices() as $device) {
            foreach ($device->getDevicePlans() as $plan) {
                if (strtotime($plan->getStartDate()) >= time()) {
                    $device->removePlan($plan->getId());
                }
            }
        }

        $this->filterPlan->filter($devicesList);
    }
}