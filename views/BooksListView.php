<?php

/**
 * Created by PhpStorm.
 * User: root
 * Date: 16.06.17
 * Time: 13:36
 */

class BooksListView
{
    public function render( $params = null )
    {
        echo "Список книг:" . '<br>' . '<br>';

        foreach ( $params['books'] as $bookName ) {
            echo '<a href="">' . $bookName['title'] . '</a>';
            echo '<br>';
        }
    }
}
