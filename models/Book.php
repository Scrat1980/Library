<?php

/**
 * Created by PhpStorm.
 * User: root
 * Date: 16.06.17
 * Time: 14:20
 */
class Book
{
    private $db;
    
    public function __construct()
    {
        $this->db = new Db();
    }

    public function getBooksList()
    {

        $query = "SELECT title FROM book";

        try {
            $statementHandler = $this->db
                ->getHandler()
                ->prepare( $query );
            $statementHandler->execute();
            $list = $statementHandler->fetch( PDO::FETCH_ASSOC );
        } catch( PDOException $e ) {
            echo $query . '<br>' . $e->getMessage();
        }

        $this->db = null;
        
        return $list;
    }
}