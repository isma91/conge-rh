<?php
namespace controller;
/**
 * UserController.php
 *
 *
 * PHP 7.0.28
 *
 * @category Model
 * @package  Model
 * @author   isma91 <ismaydogmus@gmail.com>
 * @license  http://opensource.org/licenses/gpl-license.php GNU Public License
 */
use model\User;
/**
 * Class UserController
 * @package controller
 */
class UserController
{

    public function sendJson($error, $data)
    {
        echo json_encode(array("error" => $error, "data" => $data));
    }

    public function getData() {
        $user = new User();
        $data = $user->getData();
        if (!empty($data)) {
            self::sendJson("", $data);
        } else {
            self::sendJson("Une erreur est survenue lors de la recuperation des utilisateur !!", "");
        }
    }

    public function add($firstname, $lastname, $address) {
        $errField = array();
        $firstname = $_POST["firstname"];
        $lastname = $_POST["lastname"];
        $address = $_POST["address"];
        $allField = [
            'firstname' => $firstname,
            'lastname' => $lastname,
            'address' => $address
        ];
        foreach($allField as $filed => $value) {
            if (empty(trim($value))) {
                array_push($errField, $value);
            }
        }
        if (count($errField) > 0) {
            $fields = "";
            foreach($errField as $key => $value) {
                $fields = $fields . ", " . $value;
            }
            $fields = substr($fields, 2);
            return array('error' => "These fields are empty: " . $fields . " !!", "success" => "");
        } else {
            $user = new User();
            $add = $user->add($firstname, $lastname, $address);
            if ($add) {
                return array("error" => "", "success" => "");
            } else {
                return array("error" => 'There is a problem when we try to add the new user in the database !!', 'success' => '');
            }
        }
    }


}