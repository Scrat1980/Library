<?php

/**
 * Created by PhpStorm.
 * User: root
 * Date: 16.06.17
 * Time: 14:20
 */
class Book
{
    public function getBooksList()
    {
        $dbHandler = new Db();
        $query = "SELECT title FROM book";
        $list = $dbHandler->makeQuery( $query );

        return $list;
    }
}