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
        $data = $bdd->getBdd()->prepare("SELECT id, firstName, lastName, address, dateBegin, conges.acquis, conges.pris FROM salaries INNER JOIN conges ON conges.salaries_id = salaries.id");
        $data->execute();
        $result = $data->fetchAll(\PDO::FETCH_ASSOC);
        return $result;
    }

    public function getAllById($id) {
        $bdd = new Bdd();
        $data = $bdd->getBdd()->prepare("SELECT id, firstName, lastName, address, dateBegin, conges.acquis, conges.pris FROM salaries INNER JOIN conges ON conges.salaries_id = salaries.id WHERE salaries.id = :id");
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

}