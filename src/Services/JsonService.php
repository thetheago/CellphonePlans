<?php

namespace Thiago\CellphonePlans\Services;

use Thiago\CellphonePlans\Interfaces\JsonServiceInterface;

class JsonService implements JsonServiceInterface
{
    /**
     * Método responsável por buscar os dados.
     * @param string $jsonPath
     * @return object
     */
    public static function getJsonData(string $jsonPath): object
    {
        $data = file_get_contents($jsonPath);
        return json_decode($data);
    }
}
