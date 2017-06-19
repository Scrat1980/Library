<?php

/**
 * Created by PhpStorm.
 * User: root
 * Date: 19.06.17
 * Time: 6:45
 */
class View
{
    const ENGLISH = 'ENG';
    const RUSSIAN = 'RUS';

    const ENTRY_POINT_URL = '/index.php?';

    public $language;

    public function __construct()
    {
        $model = new Language();
        $this->language = $model->getLanguage();
    }

    protected function commonView()
    {
        echo " <script src='/js/jquery-3.2.1.min.js'></script>";
        echo " <script src='/js/main.js'></script>";

        echo "{$this->translate( $this->language, 'Select language' )}" . "<br>";

        $russianId = self::RUSSIAN;
        $englishId = self::ENGLISH;

        echo "<a href=\"\" id=\"$russianId\" class='language'>Russian</a>";
        echo ' ';
        echo "<a href=\"\" id=\"$englishId\" class='language'>English</a>";
        echo '<br><br>';

    }
    
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

    /**
     * Метод переводит фразу с английского языка на заданный
     * @param $language
     * @param $phrase
     * @return mixed
     */
    protected function translate( $language, $phrase )
    {
        $translate = [
            self::RUSSIAN => [
                'Books list' => 'Список книг',
                'Books list empty' => 'Список книг пуст',
                'Chapters' => 'Главы',
                'Chapters list empty' => 'Список глав пуст',
                'Pages list' => 'Страницы',
                'Pages list empty' => 'Список страниц пуст',
                'Select language' => 'Выберите язык',
                'To books list' => 'К списку книг',
                'To chapters list' => 'К списку глав',
                'To pages list' => 'К списку страниц',
            ],
            self::ENGLISH => [
                'Books list' => 'Books list',
                'Books list empty' => 'Books list empty',
                'Chapters' => 'Chapters',
                'Chapters list empty' => 'Chapters list empty',
                'Pages list' => 'Pages list',
                'Pages list empty' => 'Pages list empty',
                'Select language' => 'Select language',
                'To books list' => 'To books list',
                'To chapters list' => 'To chapters list',
                'To pages list' => 'To pages list',
            ],
        ];
        
        $translation = isset( $translate[$language][$phrase] ) 
            ? $translate[$language][$phrase]
            : 'Failed to translate';
        
        return $translation;
    }
}