<?php
/**
 * Rômulo Berri Micro-framework
 * Index file
 * @author Rômulo Berri <romuloberri@gmail.com>
 * Mar 05 2017
 */

require __DIR__."/../bootstrap.php";

use rb\app\config\Route;
use rb\app\model\AppModel;

$class = filter_input(INPUT_GET,'class',FILTER_SANITIZE_SPECIAL_CHARS);
$action = filter_input(INPUT_GET,'action',FILTER_SANITIZE_SPECIAL_CHARS);

/**
 * if it is not a valid route use the default route.
 * Configure the valid routes in src/config/Route.php
 */
if (!array_key_exists ($class,Route::$valid_routes)||
    !in_array($action,Route::$valid_routes[$class])) {
    $class  = Route::$default_class;
    $action = Route::$default_action;
}

/**
 * Saves received data
 */
AppModel::$data['get']  = $_GET;
AppModel::$data['post'] = $_POST;

/**
 * Calls the controller
 */
$controller_class = 'rb\\app\\controller\\'.$class.'Controller';
$action_name      = $action.'Action';

if (class_exists($controller_class)){
    $controller  = new $controller_class;
    $controller->$action_name();
} else {
    http_response_code(404);
}

/**
 * Returns a link to a controller action
 */
function controller_url($class,$action) {
    return "index.php?class=$class&action=$action";
}