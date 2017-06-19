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

        echo "<a href=\"/index.php\">{$this->translate( $this->language, 'To books list' )}</a>" . '<br>';

        $bookId = $params['bookId'];
        echo "<a href=\"/index.php?action=chapters&bookId=$bookId\">{$this->translate( $this->language, 'To chapters list' )}</a>" . '<br>';

        $chapterId = $params['chapterId'];
        echo "<a href=\"/index.php?action=pages&chapterId=$chapterId\">{$this->translate( $this->language, 'To pages list' )}</a>" . '<br>';

        echo $params['page'];
    }

}