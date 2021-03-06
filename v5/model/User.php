<?php
/**
* User.php
*
* File to manage the User
*
* PHP 7.0.28
*
* @category Model
* @package  Model
* @author   isma91
* @license  http://opensource.org/licenses/gpl-license.php GNU Public License
*/
namespace model;
Class User
{

    public function getData() {
        $bdd = new Bdd();
        $data = $bdd->getBdd()->prepare("SELECT id, firstName, lastName, address, dateBegin, conges.acquis, conges.pris, newcomer, active FROM salaries INNER JOIN conges ON conges.salaries_id = salaries.id");
        $data->execute();
        $result = $data->fetchAll(\PDO::FETCH_ASSOC);
        return $result;
    }

    public function getAllById($id) {
        $bdd = new Bdd();
        $data = $bdd->getBdd()->prepare("SELECT id, firstName, lastName, address, dateBegin, conges.acquis, conges.pris FROM salaries INNER JOIN conges ON conges.salaries_id = salaries.id WHERE salaries.id = :id AND salaries.newcomer = 0 AND salaries.active = 1");
        $data->bindParam(":id", $id);
        $data->execute();
        $result = $data->fetchAll(\PDO::FETCH_ASSOC);
        return $result;
    }
    
    public function updateCongeAcquis($id, $conge) {
        $bdd = new Bdd();
        $id = (int)$id;
        $conge = (int)$conge;
        if (!is_int($id) && !is_int($conge)) {
            return false;
        }
        $update = $bdd->getBdd()->prepare("UPDATE conges SET acquis = :acquis WHERE salaries_id = :id");
        $update->bindParam(":acquis", $conge);
        $update->bindParam(":id", $id);
        $update->execute();
        return $update;
    }
    
    public function updateCongePris($id, $conge) {
        $bdd = new Bdd();
        $id = (int)$id;
        $conge = (int)$conge;
        if (!is_int($id) && !is_int($conge)) {
            return false;
        }
        $update = $bdd->getBdd()->prepare("UPDATE conges SET pris = :pris WHERE salaries_id = :id");
        $update->bindParam(":pris", $conge);
        $update->bindParam(":id", $id);
        $update->execute();
        return $update;
    }

    public function add($firstname, $lastname, $address) {
        $bdd = new Bdd();
        $date = date("Y-m-d");
        /*
         je n'arrive pas à ajouter pour `dateEnd` 0000-00-00 
         vu que ce champ est de type 'date' et qu'il ne peut pas être NULL
         et j'ai du ajouter la current date sur ce champ pour que l'INSERT pouisse passer sans erreur
         (php 7.0.28 & mysql 14.14 Distrib 5.7.21 for linux)
        */
        $addUser = $bdd->getBdd()->prepare("INSERT INTO salaries (firstName, lastName, address, dateBegin, dateEnd) VALUES (:firstname, :lastname, :address, :dateBegin, :dateEnd)");
        $addUser->bindParam(":firstname", $firstname);
        $addUser->bindParam(":lastname", $lastname);
        $addUser->bindParam(":address", $address);
        $addUser->bindParam(":dateBegin", $date);
        $addUser->bindParam(":dateEnd", $date);
        $addUser->execute();
        if ($addUser) {
            $id = $bdd->getBdd()->lastInsertId();
            $addConge = $bdd->getBdd()->prepare("INSERT INTO conges (salaries_id, acquis, pris) VALUES (:id, 0, 0)");
            $addConge->bindParam(":id", $id);
            $addConge->execute();
            return $addConge;
        } else {
            return false;
        }
    }

    public function delete($id) {
        $bdd = new Bdd();
        $id = (int)$id;
        if (!is_int($id)) {
            return false;
        }
        $update = $bdd->getBdd()->prepare("UPDATE salaries SET active = 0 WHERE id = :id");
        $update->bindParam(":id", $id);
        $update->execute();
        return $update;
    }

}