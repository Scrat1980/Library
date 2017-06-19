<?php

/**
 * Created by PhpStorm.
 * User: root
 * Date: 19.06.17
 * Time: 6:45
 */
class View
{
    const ENTRY_POINT_URL = '/index.php?';
    
    protected function makeUrl( $urlParameters )
    {
        $url = self::ENTRY_POINT_URL;

        $arrayKeys = array_keys( $urlParameters );
        $lastArrayKey = array_pop( $arrayKeys );

        foreach ( $urlParameters as $key => $value ) {
            $url .= $key . '=' . $value;
            if( $key !== $lastArrayKey ) {
                $url .= '&';
            }
        }

        return $url;
    }
}