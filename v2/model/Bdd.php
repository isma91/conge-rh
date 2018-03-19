<?php
/**
* Bdd.php
*
* File to use the database
*
* PHP 7.0.28
*
* @category Model
* @package  Model
* @author   isma91
* @license  http://opensource.org/licenses/gpl-license.php GNU Public License
*/
namespace model;
Class Bdd
{
    private $_bdd;

    /**
    * __construct de Bdd
    */
    public function __construct ()
    {
        if (file_exists("config.php")) {
            $config = include 'config.php';
        } else {
            $config = include '../config.php';
        }
        try {
            $this->_bdd = new \PDO('mysql:host=' . $config['host'] . ';dbname=' . $config['dbname'], $config['user'], $config['password']);
        }
        catch (\PDOException $e) {
            die('Erreur : '.$e->getMessage());
        }
    }
    /** 
     * GetBdd
     *
     * @return $_bdd return pdo
     */
    public function getBdd () 
    {
        return $this->_bdd;
    }

    public function getData() {
        $data = self::getBdd()->prepare("SELECT id, firstName, lastName, address, dateBegin, conges.acquis, conges.pris FROM salaries INNER JOIN conges ON conges.salaries_id = salaries.id");
        $data->execute();
        $result = $data->fetchAll(\PDO::FETCH_ASSOC);
        return $result;
    }

    public function getAllById($id) {
        $data = self::getBdd()->prepare("SELECT id, firstName, lastName, address, dateBegin, conges.acquis, conges.pris FROM salaries INNER JOIN conges ON conges.salaries_id = salaries.id WHERE salaries.id = :id");
        $data->bindParam(":id", $id);
        $data->execute();
        $result = $data->fetchAll(\PDO::FETCH_ASSOC);
        return $result;
    }
    
    public function updateCongeAcquis($id, $conge) {
        $id = (int)$id;
        $conge = (int)$conge;
        if (!is_int($id) && !is_int($conge)) {
            return false;
        }
        $update = self::getBdd()->prepare("UPDATE conges SET acquis = :acquis WHERE salaries_id = :id");
        $update->bindParam(":acquis", $conge);
        $update->bindParam(":id", $id);
        $update->execute();
        return $update;
    }
    
    

}