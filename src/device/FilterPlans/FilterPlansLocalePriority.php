<?php

namespace Thiago\CellphonePlans\device\FilterPlans;

use Thiago\CellphonePlans\device\DevicesList;
use Thiago\CellphonePlans\device\FilterPlans\FilterPlansInterface;

class FilterPlansLocalePriority implements FilterPlansInterface
{
    public function filter(DevicesList $devicesList): void
    {
        // TODO: Implement filter() method.
        // Filtrar planos pelo nome, localidade
        // Ideia : Agrupar os planos em nome e localidade, filtrar e retornar os ids dos que devem permanecer
        // fazer um array_diff com todos os ids e remover os que não devem permanecer.
    }
}