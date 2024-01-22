<?php

namespace Command;

use Interfaces\DeviceCommandInterface;
use Interfaces\JsonServiceInterface;
use Thiago\CellphonePlans\device\Device;
use Thiago\CellphonePlans\device\DevicePlan;

class DeviceJsonCommand implements DeviceCommandInterface
{
    private JsonServiceInterface $jsonService;

    public function __construct(JsonServiceInterface $jsonService)
    {
        $this->jsonService = $jsonService;
    }

    public function getDevice(string $jsonPath): Device
    {
        $deviceData = $this->jsonService->getJsonData($jsonPath);
        $device     = new Device(name: $deviceData->Aparelho->name);

        foreach ($deviceData->plans as $plan) {
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

        return $device;
    }
}