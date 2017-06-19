<?php

/**
 * Created by PhpStorm.
 * User: root
 * Date: 18.06.17
 * Time: 0:54
 */
class PagesView extends View
{
    public function render( $params = null )
    {
        echo '<a href="/index.php">К списку книг</a>' . '<br>';
        echo '<a href="">К списку глав</a>' . '<br>';

        if( count( $params['pages'] ) > 0  ) {
            echo "Список страниц:" . '<br>' . '<br>';

            foreach ($params['pages'] as $page) {
                echo '<a href="/index.php?action=page&pageId=' . $page['id'] . '">'
                    . $page['number']
                    . '</a>';
                echo ' ';
            }
        } else {
            echo 'Список страниц пуст';
        }
    }

}