<?php
/**
 * Rômulo Berri Micro-framework
 * Controller class file
 * @author Rômulo Berri <romuloberri@gmail.com>
 * Mar 05 2017
 */

namespace rb\app\controller;

use rb\app\model\AppModel;

class Controller {

    /**
     * Used to the controllers to call the views
     * @param $view string The view name
     * @param $vars array an array containing all the server generated data to show on the view
     */
    protected function callView($view, $vars) {

        $user_name = AppModel::getLoggedUsername();

        $view_file = __DIR__.'/../view/'.$view.'View.php';
        require __DIR__.'/../view/_layout.php';
    }
}