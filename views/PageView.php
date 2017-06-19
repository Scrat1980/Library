<?php

/**
 * Created by PhpStorm.
 * User: root
 * Date: 19.06.17
 * Time: 0:08
 */
class PageView extends View
{
    public function render( $params = null )
    {
        $this->commonView( $params );

        echo '<a href="/index.php">К списку книг</a>' . '<br>';

        $bookId = $params['bookId'];
        echo "<a href=\"/index.php?action=chapters&bookId=$bookId\">К списку глав</a>" . '<br>';

        $chapterId = $params['chapterId'];
        echo "<a href=\"/index.php?action=pages&chapterId=$chapterId\">К списку страниц</a>" . '<br>';

        echo $params['page'];
    }

}