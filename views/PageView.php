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
        echo '<a href="/index.php">К списку книг</a>' . '<br>';
        echo '<a href="">К списку глав</a>' . '<br>';
        echo '<a href="">К списку страниц</a>' . '<br>';
//var_dump( $params['page'] );
        echo $params['page'];
    }

}