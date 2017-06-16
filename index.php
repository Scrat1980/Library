<?php
/**
 * Created by PhpStorm.
 * User: root
 * Date: 15.06.17
 * Time: 13:37
 */

$controller = getInput('controller');
$action = getInput('action');

$allSet =
    ( ! is_null( $controller ) )
    && ( ! is_null( $action ) );

if( ! $allSet ) {
    $controller = 'SiteController';
    $action = 'index';
}

spl_autoload_register( 'myAutoloader' );

$c = new $controller();
$c->{$action}();


function getInput( $attribute ) {
    $result = ( isset( $_GET[$attribute] ) )
        ? $_GET[$attribute]
        : null;

    return $result;
}

function myAutoloader( $className ) {
    $directories = ['controllers', 'models', 'views'];

    foreach ($directories as $directory) {
        $fileName = $directory . "/" . $className . ".php";
        if( file_exists( $fileName ) ) {
            include_once( $fileName );
        }
    }
}