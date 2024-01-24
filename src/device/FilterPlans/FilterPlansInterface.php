<?php

namespace Thiago\CellphonePlans\device\FilterPlans;

use Thiago\CellphonePlans\device\DevicesList;

interface FilterPlansInterface
{
    public function filter(DevicesList $devicesList): void;

}