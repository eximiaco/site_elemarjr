/**
 * Index tag.
 */
define( [], function() {
    var $list = jQuery( '.index-tags__list' ),
        $toggler = jQuery( '.index-tags__toggler' );

    function toggleList( e ) {
        $list.toggleClass( 'index-tags__list--open' );

        e.preventDefault();
    }

    $toggler.click( toggleList );
} );
