<?php

/**
 * Created by PhpStorm.
 * User: root
 * Date: 16.06.17
 * Time: 14:23
 */
class Db
{
    private $host = 'localhost';
    private $userName = 'root';
    private $password = '1';
    private $dbName = 'library';


    public function getHandler()
    {
        try {
            $dbHandler = new PDO(
                "mysql:host=$this->host;dbname=$this->dbName",
                $this->userName,
                $this->password
            );
            $dbHandler->exec( 'set names utf8' );
        } catch(PDOException $e) {
            echo $e->getMessage();
        }

        return $dbHandler;
    }
    
    

}