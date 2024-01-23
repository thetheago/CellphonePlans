<?php

namespace Thiago\CellphonePlans\device;

use DateTime;
use Interfaces\DevicesManagerInterface;

class DevicesManager implements DevicesManagerInterface
{
    private DevicesList $devicesList;

    public function __construct()
    {
        $this->devicesList = new DevicesList();
    }

    public function addDevice(Device $device): void
    {
        $this->devicesList->addDevice($device);
    }

    public function getDevices(): DevicesList
    {
        return $this->devicesList;
    }

    public function sortPlans(): void
    {
        // Remover planos com data inválida
        foreach ($this->devicesList->getDevices() as $device) {
            foreach ($device->getDevicePlans() as $plan) {
                if (strtotime($plan->getStartDate()) >= time()) {
                    $device->removePlan($plan->getId());
                }
            }
        }

        // Filtrar planos pelo nome, localidade
        // Ideia : Agrupar os planos em nome e localidade, filtrar e retornar os ids dos que devem permanecer
        // fazer um array_diff com todos os ids e remover os que não devem permanecer.

        // TODO: Aplicar Chain of responsability pattern (Pra este caso acho excesso de engenharia, porém como é um teste seria legal mostrar que tem o conhecimento do pattern.)
    }
}
