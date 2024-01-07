<?php

namespace Thiago\CellphonePlans;

use Services\JsonService;
use Thiago\CellphonePlans\device\Device;
use Thiago\CellphonePlans\device\DevicePlan;
use Thiago\CellphonePlans\device\DevicesManager;

class App
{
    private object $deviceData;

    public function __construct(string $jsonPath)
    {
        $this->deviceData = JsonService::getJsonData($jsonPath);
    }

    public function run(): void
    {
        $device = new Device(name: $this->deviceData->Aparelho->name);

        foreach ($this->deviceData->plans as $plan) {
            $device->addPlan(new DevicePlan(
                id: $plan->id,
                type: $plan->type,
                name: $plan->name,
                phonePrice: $plan->phonePrice,
                phonePriceOnPlan: $plan->phonePriceOnPlan,
                installments: $plan->installments,
                monthlyFee: $plan->monthly_fee,
                startDate: $plan->schedule->startDate,
                locale: $plan->localidade,
            ));
        }

        $devicesManager = new DevicesManager();
        $devicesManager->addDevice($device);
        $devicesManager->sortPlans();

//        echo json_encode($this->deviceData);
    }
}