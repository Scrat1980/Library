/**
 * Created by root on 19.06.17.
 */

$( document ).ready( function() {
    App.manageLanguage();
} );

var App = {
    // RUSSIAN: 'RUS',
    // ENGLISH: 'ENG',
    manageLanguage: function() {
        $( '.language' ).on( 'click', function( e ){
            e.preventDefault();
            var language = $( this ).prop( 'id' );
            $.ajax({
                url: '/index.php?action=setLanguage',
                data: {
                    language: language,
                }
            }).done( function( response ) {
                location.reload();
            } );
        } );

    },
};