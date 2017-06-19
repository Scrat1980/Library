<?php

/**
 * Created by PhpStorm.
 * User: root
 * Date: 16.06.17
 * Time: 14:20
 */
class Library
{
    private $dbHandler;

    public function __construct()
    {
        $this->dbHandler = new Db();
    }
    
    public function getBooksList()
    {
        $query = "SELECT title, author, id 
                    FROM book 
                    ORDER BY title ASC";

        return $list = $this->dbHandler->makeQuery( $query );
    }

    public function getChapters( $bookId )
    {
        $query = "SELECT number, title, id
                    FROM chapter
                    WHERE book_id = '$bookId'
                    ORDER BY number";
        return $list = $this->dbHandler->makeQuery( $query );
    }

    public function getPages( $chapterId )
    {
        $query = "SELECT number, id
                    FROM page
                    WHERE chapter_id = '$chapterId'
                    ORDER BY number";
        return $list = $this->dbHandler->makeQuery( $query );
    }

    public function getPageContent( $pageId )
    {
        $query =
            "SELECT content
              FROM page
              WHERE id = '$pageId'";
        return $pageContent = $this->dbHandler->makeQuery( $query );
    }

    public function getBookNameById( $bookId )
    {
        $numericBookId = (int) $bookId;
        $query = "SELECT id
                FROM book";
//                WHERE id = 5";


        $bookNameList = $this->dbHandler->makeQuery( $query );
        die('dd');
//        die;
        return $bookNameList[0];
    }
}