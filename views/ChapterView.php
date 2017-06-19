<?php

/**
 * Created by PhpStorm.
 * User: root
 * Date: 17.06.17
 * Time: 22:05
 */

class ChapterView extends View
{
    public function render( $params = null )
    {

        echo '<a href="/index.php">К списку книг</a>' . '<br>';

        if( count( $params['chapters'] ) > 0 ) {
            
            echo "Главы:" . '<br>' . '<br>';

            foreach ($params['chapters'] as $chapter) {
                echo '<a href="' . '/index.php?action=pages&chapterId=' . $chapter['id'] . '">'
                    . $chapter['number']
                    . '. '
                    . $chapter['title']
                    . '</a>';
                echo '<br>';
            }
        } else {
            echo 'Список глав пуст';
        }
    }
}