/**
 * Indexes tags.
 */
define( [ 'swiper/dist/js/swiper' ], function( Swiper ) {
    var swiper = new Swiper( '.indexes__swiper-container', {
        init: false,
        slidesPerView: 'auto',
        spaceBetween: 30,

        navigation: {
            nextEl: '.indexes__nav--next',
            prevEl: '.indexes__nav--prev',
            disabledClass: 'indexes__nav--disabled'
        }
    } );

    // Set the index item width for Swiper calculate correctly.
    jQuery( '.indexes__item' ).each( function( index, el ) {
        jQuery( el ).width( jQuery( el ).width() + 40 );
    } ).promise().done( function() {
        swiper.init();
    } );
} );
