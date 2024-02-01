<?php

require_once "../vendor/autoload.php";

use Command\DeviceCommandHandler;
use Command\DeviceJsonCommand;
use Services\JsonService;
use Thiago\CellphonePlans\device\DevicesManager;
use Thiago\CellphonePlans\response\DeviceHttpJsonResponse;

// Dependencies
$jsonService = new JsonService();
$devicesManager = new DevicesManager();

// Handler
$deviceCommandHandler = new DeviceCommandHandler($devicesManager);

//Command
$deviceJsonCommand = new DeviceJsonCommand($jsonService);
$devicesSorted = $deviceCommandHandler->execute($deviceJsonCommand);

header('Content-type: application/json');
echo new DeviceHttpJsonResponse($devicesSorted);
