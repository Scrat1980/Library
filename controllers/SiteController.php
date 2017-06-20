<?php
/**
 * Created by PhpStorm.
 * User: root
 * Date: 15.06.17
 * Time: 14:34
 */

class SiteController
{
    public function index( $config = null )
    {
        $params = [];
        $model = new Library();
        
        $commonView = new View();
        $language = $commonView->language;

        $params['books'] = $model->getBooksList( $language );

        $view = new BooksListView();

        $view->render( $params );
    }

    public function chapters( $config = null )
    {
        $bookId = $config['bookId'];
        
        $params = [];
        $model = new Library();
        
        $params['chapters'] = $model->getChapters( $bookId );
        $params['bookName'] = $model->getBookNameById( $bookId );

        $view = new ChapterView();
        $view->render( $params );
    }

    public function pages( $config = null )
    {
        $chapterId = $config['chapterId'];

        $params = [];
        $model = new Library();
        $bookId = $model->getBookIdByChapterId( $chapterId );

        $params['bookId'] = $bookId;
        $params['pages'] = $model->getPages( $chapterId );

        $view = new PagesView();
        $view->render( $params );

    }

    public function page( $config = null )
    {
        $pageId = $config['pageId'];

        $model = new Library();
        $bookId = $model->getBookIdByPageId( $pageId );
        $params['bookId'] = $bookId;

        $chapterId = $model->getChapterIdByPageId( $pageId );
        $params['chapterId'] = $chapterId;

        $page = $model->getPageContent( $pageId )[0]['content'];

        $params['page'] = $page;

        $view = new PageView();
        $view->render( $params );
    }

    public function setLanguage( $params )
    {
        $_SESSION['language'] = $params['language'];
    }
}