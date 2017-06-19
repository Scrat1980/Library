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

    protected function commonView( $params = null )
    {
        if( isset( $params['language'] ) ) {
            $language = $params['language'];
            $this->language = $language;
        } else {
            $language = $this->language = self::RUSSIAN;
        }

        echo $this->translate( $language, "Select language" ) . '<br>';

        $currentUrl = "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
        $languagePresentInUrl = (bool) strstr( $currentUrl, 'language' );
        if( $languagePresentInUrl ) {
            $numberOfLanguageInUrl = (int) stripos( $currentUrl, 'language' );
            $currentUrl = substr_replace( $currentUrl, '', $numberOfLanguageInUrl, 12 );
            $lastLetterNumber = strlen($currentUrl);
            $currentUrl = substr_replace( $currentUrl, '', $lastLetterNumber, 1 );

            $linkToRussian = $currentUrl . "language=RUS";
            $linkToEnglish = $currentUrl . "language=ENG";
        } else {
            $urlHasParameters = (bool) strstr( $currentUrl, '?' );
            $urlHasIndex = (bool) strstr( $currentUrl, 'index.php' );
            if( $urlHasParameters ) {
                $firstSymbol = '&';
            } else if( $urlHasIndex ) {
                $firstSymbol = '?';
            } else {
                $firstSymbol = 'index.php?';
            }
            $linkToRussian = $currentUrl . $firstSymbol . "language=RUS";
            $linkToEnglish = $currentUrl . $firstSymbol . "language=ENG";

        }


        echo "<a href=\"$linkToRussian\">Russian</a>";
        echo ' ';
        echo "<a href=\"$linkToEnglish\">English</a>";
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
            ],
        ];
        
        return $translate[$language][$phrase];
    }
}