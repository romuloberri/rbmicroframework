<?php
/**
 * Rômulo Berri Micro-framework
 * Bootstrap file
 * @author Rômulo Berri <romuloberri@gmail.com>
 * Mar 05 2017
 */

session_start();

require __DIR__."/vendor/autoload.php";

use \rb\app\config\Params;
use \rb\app\model\AppModel;

AppModel::dbConnect(Params::$host, Params::$dbname, Params::$user, Params::$password);