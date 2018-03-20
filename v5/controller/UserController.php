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
    
    public function getAllById($id) {
        $user = new User();
        $data = $user->getAllById($id);
        if (!empty($data)) {
            self::sendJson("", $data);
        } else {
            self::sendJson("Une erreur est survenue lors de la recuperation de l'utilisateur !!", "");
        }
    }
    
    public function updateAcquis($conge, $id) {
        $user = new User();
        $data = $user->updateCongeAcquis($id, $conge);
        if (!empty($data)) {
            self::sendJson("", "");
        } else {
            self::sendJson("Une erreur est survenue lors du changement du conge acquis !!", "");
        }
    }
    
    public function updatePris($conge, $id) {
        $user = new User();
        $data = $user->updateCongePris($id, $conge);
        if (!empty($data)) {
            self::sendJson("", "");
        } else {
            self::sendJson("Une erreur est survenue lors du changement du conge pris !!", "");
        }
    }

    public function createUser($firstname, $lastname, $address) {
        $errField = array();
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
            self::sendJson("These fields are empty: " . $fields . " !!", "");
        } else {
            $user = new User();
            $add = $user->add($firstname, $lastname, $address);
            if ($add) {
                self::sendJson("", "");
            } else {
                self::sendJson('There is a problem when we try to add the new user in the database !!', '');
            }
        }
    }

    public function deleteUser($id) {
        $user = new User();
        $data = $user->delete($id);
        if (!empty($data)) {
            self::sendJson("", "");
        } else {
            self::sendJson("Une erreur est survenue lors de la suppression de l'utilisateur !!", "");
        }
    }
}