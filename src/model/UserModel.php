<?php
/**
 * Rômulo Berri Micro-framework
 * UserModel Class - Sample model class
 * @author Rômulo Berri <romuloberri@gmail.com>
 * Mar 05 2017
 */
namespace rb\app\model;

use \PDO;
use rb\app\model\AppModel;

/**
 * This is a sample class that may be useful if extended to the app needs
 * so fell free to modify this
 */
class UserModel {

    public $id;
    public $name = '';
    public $password = '';

    public function load($username, $password) {

        // retrieves data for the username
        $sql  = "select * from user where name = :name";
        $stmt = AppModel::$conn->prepare($sql);
        $stmt->bindValue(':name',$username, PDO::PARAM_STR);

        if ($stmt->execute()) {
            $row = $stmt->fetch(PDO::FETCH_ASSOC);
            if ($row !== false) {

                // verifies if the password is correct
                if (password_verify($password, $row['password'])) {
                    $this->id           = $row['iduser'];
                    $this->name         = $row['name'];
                    return true;

                }
            }
        }
        return false;
    }

}
