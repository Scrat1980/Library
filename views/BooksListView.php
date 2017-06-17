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
        echo "Список книг:" . '<br>';

        foreach ( $params['books'] as $bookName ) {
            var_dump( $bookName );
            echo '<br>';
        }
    }
}
