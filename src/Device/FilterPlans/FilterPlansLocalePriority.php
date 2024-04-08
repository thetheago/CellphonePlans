<?php

namespace Thiago\CellphonePlans\Device\FilterPlans;

use Thiago\CellphonePlans\Device\Device;
use Thiago\CellphonePlans\Device\DevicePlan;
use Thiago\CellphonePlans\Device\DevicesList;

class FilterPlansLocalePriority implements FilterPlansInterface
{
    public function filter(DevicesList $devicesList): void
    {
        $timeNow = time();

        foreach ($devicesList->getDevices() as $device) {
            $groups = [];
            $groups = $this->makeGroups($device->getDevicePlans());

            $this->filterPlans($groups, $device, $timeNow);
        }
    }

    /**
     * @param DevicePlan[] $devicePlans
     * @return array
     */
    private function makeGroups(array $devicePlans): array
    {
        $groups = [];

        foreach ($devicePlans as $plan) {
            $nameGroup = $plan->getName();
            $priority  = $plan->getLocale()->prioridade;

            $groups[$nameGroup][$priority][] = $plan;
        }

        return $groups;
    }

    /**
     * @param array $groups
     * @param Device $device
     * @param int $timeNow
     * @return void
     */
    private function filterPlans(array $groups, Device $device, int $timeNow): void
    {
        $plansIdToStay = [];

        foreach ($groups as $groupNamed) {
            foreach ($groupNamed as $priorityGroup) {
                $plansIdToStay[] = $this->filterPlanToStay($priorityGroup, $timeNow);
            }
        }

        $devicePlansIds = $device->getDevicePlansIds();
        $plansIdToRemove = array_diff($devicePlansIds, $plansIdToStay);

        foreach ($plansIdToRemove as $id) {
            $device->removePlan($id);
        }
    }

    /**
     * @param array $priorityGroup
     * @param int $timeNow
     * @return int
     */
    private function filterPlanToStay(array $priorityGroup, int $timeNow): int
    {
        if (count($priorityGroup) > 1) {
            return $this->getPlanIdWithMostRecentStartDate($priorityGroup, $timeNow);
        }

        return $priorityGroup[0]->getId();
    }

    /**
     * @param DevicePlan[] $devicePlans
     * @param int $timeNow
     * @return int
     */
    private function getPlanIdWithMostRecentStartDate(array $devicePlans, int $timeNow): int
    {
        $planIdWithMostRecentStartDate = 0;
        $lastDifference = PHP_INT_MAX;

        foreach ($devicePlans as $plan) {
            $differenceBetweenPlanTimeAndNow = abs($timeNow - strtotime($plan->getStartDate()));

            if ($differenceBetweenPlanTimeAndNow <= $lastDifference) {
                $lastDifference = $differenceBetweenPlanTimeAndNow;
                $planIdWithMostRecentStartDate = $plan->getId();
            }
        }

        return $planIdWithMostRecentStartDate;
    }
}
