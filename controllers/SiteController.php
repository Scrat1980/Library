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
        $model = new Book();

        $params['books'] = $model->getBooksList();

        $view = new BooksListView();
        $view->render( $params );
    }

    public function chapters()
    {
        
    }
}