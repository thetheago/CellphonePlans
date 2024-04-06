<?php

namespace Thiago\CellphonePlans\response;

use Thiago\CellphonePlans\device\DevicesList;

class DeviceHttpJsonResponse
{
    private array $result;

    public function __construct(DevicesList $devicesList)
    {
        $result = [];

        foreach ($devicesList as $key => $device) {
            $result[$key]['name'] = $device->getName();

            $plans = [];
            foreach ($device->getDevicePlans() as $keyPlan => $plan) {
                $plans[$keyPlan]['id'] = $plan->getId();
                $plans[$keyPlan]['type'] = $plan->getType();
                $plans[$keyPlan]['name'] = $plan->getName();
                $plans[$keyPlan]['phonePrice'] = $plan->getPhonePrice();
                $plans[$keyPlan]['phonePriceOnPlan'] = $plan->getPhonePriceOnPlan();
                $plans[$keyPlan]['installments'] = $plan->getInstallments();
                $plans[$keyPlan]['monthly_fee'] = $plan->getMonthlyFee();
                $plans[$keyPlan]['startDate'] = $plan->getStartDate();
                $plans[$keyPlan]['localidade'] = $plan->getLocale();
            }

            $result[$key]['plans'] = $plans;
        }

        $this->result = $result;
    }

    public function __toString(): string
    {
        return json_encode($this->result);
    }
}
