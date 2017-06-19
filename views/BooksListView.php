<?php

/**
 * Created by PhpStorm.
 * User: root
 * Date: 16.06.17
 * Time: 13:36
 */

class BooksListView extends View
{
    public function render( $params = null )
    {

        if( count( $params['books'] ) > 0  ) {
            echo "Список книг:" . '<br>' . '<br>';

            foreach ($params['books'] as $bookName) {
                $bookUrlParameters = [
                    'action' => 'chapters',
                    'bookId' => $bookName['id']
                ];
                $toBookUrl = $this->makeUrl( $bookUrlParameters );

                echo "<a href=$toBookUrl>"
                    . $bookName['title']
                    . '</a>';
                echo ' - ' . $bookName['author'];
                echo '<br>';
            }
        } else {
            echo 'Список книг пуст';
        }
    }


}
