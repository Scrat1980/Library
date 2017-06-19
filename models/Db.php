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
    private $handler;


    public function __construct()
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

//        $this->handler = null;

        return $result;
    }

    public function update( $sql )
    {
        try {
            $this->handler->exec( $sql );
        } catch( PDOException $e ) {
            echo $sql . "<br>" . $e->getMessage();
        }
        

    }

}