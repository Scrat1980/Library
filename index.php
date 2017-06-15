<?php
/**
 * Created by PhpStorm.
 * User: root
 * Date: 15.06.17
 * Time: 13:37
 */

function getInput( $attribute ) {
    $result = ( isset( $_GET[$attribute] ) )
        ? $_GET[$attribute]
        : null;

    return $result;
}

$controller = getInput('controller');
$action = getInput('action');

$allSet = ( ! is_null( $controller ) ) && ( ! is_null( $action ) );

if( ! $allSet ) {
    $controller = 'SiteController';
    $action = 'index';
}

$c = new $controller();
$c->{$action}();

class SiteController
{
    public function index()
    {
        echo 11;
    }
}