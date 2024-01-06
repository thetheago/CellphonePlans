<?php

require_once "../vendor/autoload.php";

use Thiago\CellphonePlans\App;

$app = new App('data.json');
$app->show();
