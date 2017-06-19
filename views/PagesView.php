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
        $this->commonView( $params );

        echo "<a href=\"/index.php\">{$this->translate( $this->language, 'To books list' )}</a>" . '<br>';
        $bookId = $params['bookId'];
        echo "<a href=\"/index.php?action=chapters&bookId=$bookId\">{$this->translate( $this->language, 'To chapters list' )}</a>" . '<br>';

        if( count( $params['pages'] ) > 0  ) {
            echo $this->translate( $this->language, 'Pages list' ) . ":" . '<br>' . '<br>';

            foreach ($params['pages'] as $page) {
                echo '<a href="/index.php?action=page&pageId=' . $page['id'] . '">'
                    . $page['number']
                    . '</a>';
                echo ' ';
            }
        } else {
            echo $this->translate( $this->language, 'Pages list empty' );
        }
    }

}