<?php

namespace Thiago\CellphonePlans\Device\FilterPlans;

use Thiago\CellphonePlans\Device\DevicesList;

interface FilterPlansInterface
{
    public function filter(DevicesList $devicesList): void;
}
