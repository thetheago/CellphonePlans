<?php

namespace Thiago\CellphonePlans\Device;

use ArrayIterator;
use IteratorAggregate;

class DevicesList implements IteratorAggregate
{
    /* @var Device[] */
    private array $devices;

    public function __construct()
    {
        $this->devices = [];
    }

    public function addDevice(Device $device): void
    {
        $this->devices[] = $device;
    }

    public function getIterator(): ArrayIterator
    {
        return new ArrayIterator($this->devices);
    }

    /**
     * @return Device[]
     */
    public function getDevices(): array
    {
        return $this->devices;
    }
}
