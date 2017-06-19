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

        $list = $this->dbHandler->makeQuery( $query );


        return $list;
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

    public function getBookIdByChapterId( $chapterId )
    {
        $query = "SELECT book_id FROM chapter WHERE id = '$chapterId'";
        $bookIdList = $this->dbHandler->makeQuery( $query );

        $bookId = $bookIdList[0]['book_id'];

        return $bookId;
    }

    public function getBookIdByPageId( $pageId )
    {
        $query = "SELECT book.id FROM book 
                  JOIN chapter 
                    ON chapter.book_id = book.id
                  JOIN page
                    ON page.chapter_id = chapter.id
                  WHERE page.id = '$pageId'";

        $bookId = $this->dbHandler->makeQuery( $query )[0]['id'];

        return $bookId;
    }

    public function getBookNameById( $bookId )
    {
        $query = "SELECT title FROM book
                WHERE id = '$bookId'";

        $bookNameList = $this->dbHandler->makeQuery( $query );

        return $bookNameList[0]['title'];
    }

    public function getChapterIdByPageId( $pageId )
    {
        $query = "SELECT chapter.id FROM chapter 
                  JOIN page
                    ON page.chapter_id = chapter.id
                  WHERE page.id = '$pageId'";

        $chapterId = $this->dbHandler->makeQuery( $query )[0]['id'];

        return $chapterId;

    }
}