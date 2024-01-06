<?php

namespace Thiago\CellphonePlans;

use Interfaces\AppInterface;
use Services\JsonService;

class App implements AppInterface
{

    private $data;

    public function __construct(string $jsonPath)
    {
        $this->data = JsonService::getJsonData($jsonPath);

    }

    public function show()
    {
        echo json_encode($this->data);
    }
}