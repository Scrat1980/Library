<?php
/**
 * Created by PhpStorm.
 * User: root
 * Date: 15.06.17
 * Time: 13:37
 */
session_start();

spl_autoload_register( 'myAutoloader' );

$controller = getInput('controller');
$action = getInput('action');

$params = getRoutParams();

if( is_null( $controller ) ) {
    $controller = 'SiteController';
}

if( is_null( $action ) ) {
    $action = 'index';
}

if( is_null( $params['language'] ) ) {
    $params['language'] = View::RUSSIAN;
}

$c = new $controller();
$c->{$action}( $params );



function getRoutParams()
{
    $params = [];

    foreach ($_GET as $inputParamKey => $inputParamValue) {
        if (
            $inputParamKey === 'controller'
            || $inputParamKey === 'action'
        ) {
            continue;
        }
        $params[$inputParamKey] = $inputParamValue;
    }

    return $params;
}

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