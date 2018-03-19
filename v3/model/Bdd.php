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

}