<?php

require_once "../vendor/autoload.php";

use Thiago\CellphonePlans\Command\DeviceCommandHandler;
use Thiago\CellphonePlans\Command\DeviceJsonCommand;
use Thiago\CellphonePlans\Services\JsonService;
use Thiago\CellphonePlans\Device\DevicesManager;
use Thiago\CellphonePlans\Response\DeviceHttpJsonResponse;

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
