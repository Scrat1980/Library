<?php

/**
 * Created by PhpStorm.
 * User: root
 * Date: 16.06.17
 * Time: 14:23
 */
class Db
{
    private $host;
    private $userName;
    private $password;
    private $dbName;
    private $handler;

    public function __construct()
    {
        $db = require ('config/db.php');
        
        $this->host = $db['host'];
        $this->userName = $db['userName'];
        $this->password = $db['password'];
        $this->dbName = $db['dbName'];

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

        $this->handler = $dbHandler;
    }

    public function makeQuery( $sql )
    {
        try {
            $statementHandler = $this->handler
                ->prepare( $sql );
            $statementHandler->execute();
            $result = $statementHandler->fetchAll( PDO::FETCH_ASSOC );
        } catch( PDOException $e ) {
            echo $sql . '<br>' . $e->getMessage();
        }

        return $result;
    }
    
}