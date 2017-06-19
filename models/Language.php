<?php

/**
 * Created by PhpStorm.
 * User: root
 * Date: 19.06.17
 * Time: 23:52
 */
class Language
{
    private $dbHandler;

    public function __construct()
    {
        $this->dbHandler = new Db();
    }

    public function setLanguage( $languageToSet )
    {
        $updateQuery = "UPDATE lang SET language = '$languageToSet'
                WHERE id = 1";

        $this->dbHandler->update( $updateQuery );
    }

    public function getLanguage()
    {
        $query = "SELECT language FROM lang WHERE id = 1";

        $result = $this->dbHandler->makeQuery( $query );

        return $result[0]['language'];
    }
}