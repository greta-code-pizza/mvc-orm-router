<?php

namespace DBProject;
require("vendor/autoload.php");

use \DBProject\Lib\TinyRouter;
use \DBProject\Lib\TinyORM;

$route = new TinyRouter($_GET['route']);
$route->call();
