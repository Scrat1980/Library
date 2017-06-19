<?php
/**
 * Created by PhpStorm.
 * User: root
 * Date: 15.06.17
 * Time: 14:34
 */

class SiteController
{
    public function index()
    {
        $params = [];
        $model = new Library();

        $params['books'] = $model->getBooksList();

        $view = new BooksListView();
        $view->render( $params );
    }

    public function chapters( $config = null )
    {
        $bookId = $config['bookId'];
        
        $params = [];
        $model = new Library();
        
        $params['chapters'] = $model->getChapters( $bookId );
//        $params['bookName'] = $model->getBookNameById( $bookId );
        
        $view = new ChapterView();
        $view->render( $params );
    }

    public function pages( $config = null )
    {
        $chapterId = $config['chapterId'];
        
        $params = [];
        $model = new Library();
        
        $params['pages'] = $model->getPages( $chapterId );
        $view = new PagesView();
        $view->render( $params );
        
    }

    public function page( $config = null )
    {
        $pageId = $config['pageId'];

        $model = new Library();

        $page = $model->getPageContent( $pageId )[0]['content'];

//        var_dump( $page );

        $params['page'] = /*htmlentities( $page )*/$page;
        $view = new PageView();
        $view->render( $params );
    }
}