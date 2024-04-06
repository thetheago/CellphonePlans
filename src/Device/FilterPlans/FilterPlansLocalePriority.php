<?php

namespace Thiago\CellphonePlans\Device\FilterPlans;

use Thiago\CellphonePlans\Device\DevicePlan;
use Thiago\CellphonePlans\Device\DevicesList;

class FilterPlansLocalePriority implements FilterPlansInterface
{
    /**
     * @param DevicePlan[] $devicePlans
     * @param int $timeNow
     * @return int
     */
    private function getPlanIdWithMostRecentStarDate(array $devicePlans, int $timeNow): int
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

    public function filter(DevicesList $devicesList): void
    {
        $timeNow = time();

        foreach ($devicesList->getDevices() as $device) {
            $groups = [];

            foreach ($device->getDevicePlans() as $plan) {
                $nameGroup = $plan->getName();
                $priority  = $plan->getLocale()->prioridade;

                $groups[$nameGroup][$priority][] = $plan;
            }

            $plansIdToStay = [];

            foreach ($groups as $groupNamed) {
                foreach ($groupNamed as $priorityGroup) {
                    if (count($priorityGroup) > 1) {
                        $plansIdToStay[] = $this->getPlanIdWithMostRecentStarDate($priorityGroup, $timeNow);
                    } else {
                        $plansIdToStay[] = $priorityGroup[0]->getId();
                    }
                }
            }

            $devicePlansIds = $device->getDevicePlansIds();
            $plansIdToRemove = array_diff($devicePlansIds, $plansIdToStay);

            foreach ($plansIdToRemove as $id) {
                $device->removePlan($id);
            }
        }
    }
}
