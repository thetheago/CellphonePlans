<?php

include_once ("interfaces/JsonServiceInterface.php");

use interfaces\JsonServiceInterface;


class JsonService implements JsonServiceInterface {

  /**
  * Método responsável por buscar os dados.
  * @return array
  */
  public static function getJsonData(string $jsonPath): mixed
  {
    $data = file_get_contents($jsonPath);
    return json_decode($data);
  }

}
