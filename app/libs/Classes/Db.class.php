<?php
/*
DB CLASS - abstarct logic for interactions with the DB - utilize PDO and OOP to have reusable methods (WORK IN PROGRESS)
 */

class Db
{

    private static $_instance = null;
    private $_pdo;

    private function __construct()
    {
        try {
            //pulls from config.php file to establish connection - make sure you have proper mysql credentials entered!
            $this->_pdo = new PDO('mysql:host=' . DB_HOST . ';dbname=' . DB_NAME .'', DB_USER, DB_PASS);
        } catch (PDOException $e) {
            die($e->getMessage());
        }
    }

    /**
     * call as ----> Db::getInstance();
     * @return db object [returns active db connection]
     */
    public static function getInstance()
    {
        if (!isset(self::$_instance)) {
            self::$_instance = new Db();
        }

        return self::$_instance;
    }

    public function prepare($sql)
    {
        return $this->_pdo->prepare($sql);
    }
}
