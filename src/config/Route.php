<?php
/**
 * Rômulo Berri Micro-framework
 * Route file
 * @author Rômulo Berri <romuloberri@gmail.com>
 * Mar 05 2017
 */

namespace rb\app\config;

/**
 * Routes configuration class 
 */
class Route {

    /**
     * Valid routes
     * Represented in an array with the format as the example below:
     * array('Class1'=>['index','create', 'read', 'update', 'delete'],Class2=>['actionx']);
     * the array above would represent the Controller Class:
     *   class Class1Controller {
     *     public function indexAction { .. }
     *     public function createAction { .. }
     *     public function readAction { .. }
     *     public function updateAction { .. }
     *     public function deleteAction { .. }
     *   }
     */
    public static $valid_routes = array(
        'ControllerName'=>array('index',
           'create',
           'read',
           'update',
           'delete')
           );

    /**
     * Default route
     * When trying to access a invalid route or the route is not specified, 
     * redirects to this default route
     */
    public static $default_class = 'ControllerName';
    public static $default_action = 'index';
}