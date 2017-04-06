<?php
/**
 * Rômulo Berri Micro-framework
 * Route file
 * @author Rômulo Berri <romuloberri@gmail.com>
 * Mar 05 2017
 */

namespace rb\app\model;

use \PDO;

/**
 * This AppModel Class holds the essential data for running an application like
 *  - Connection to database
 *  - The logged user
 *  - The data received by get and post
 */
class AppModel {

    // variable session name for store username and user id
    const USERNAME = 'rb_app_username';
    const USERID = 'rb_app_user_id';

    const DB_DATE_FORMAT = "Y-m-d H:i:s";

    // Database connection
    public static $conn = null;

    // Data received by get or post
    public static $data = array();

    /**
     * Connects to database
     */
    public static function dbConnect($host, $dbname, $user, $password) {
        try {
            AppModel::$conn = new PDO('mysql:host='.$host.';dbname='.$dbname, 
                $user, $password, 
                array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8",
                      PDO::ATTR_ERRMODE=> PDO::ERRMODE_EXCEPTION, 
                      PDO::ATTR_EMULATE_PREPARES=>TRUE) );

        } catch(PDOException $e) {
            echo 'ERROR: ' . $e->getMessage();
        }

    }

    /**
     * return the logged Username
     */
    public static function getLoggedUsername() {
        if (isset($_SESSION[AppModel::USERNAME])) {
            return $_SESSION[AppModel::USERNAME];
        }
        return '';
    }

    /**
     * return the logged UserId
     */
    public static function getLoggedUserId() {
        if (isset($_SESSION[AppModel::USERID])) {
            return $_SESSION[AppModel::USERID];
        }
        return '';
    }

    /**
     * sets the logged UserId and username
     */
    public static function setLoggedUser($id, $username) {
        $_SESSION[AppModel::USERID] = $id;
        $_SESSION[AppModel::USERNAME] = $username;
    }

    /**
     * unsets the logged UserId and username
     */
    public static function unsetLoggedUser() {
        unset($_SESSION[AppModel::USERID]);
        unset($_SESSION[AppModel::USERNAME]);
    }

    /**
     * Returns if the user is logged
     */
    public static function isUserLogged() {
        return isset($_SESSION[AppModel::USERID]);
    }


}

