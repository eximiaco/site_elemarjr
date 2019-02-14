/**
 * Indexes tags.
 */
define( [ 'swiper/dist/js/swiper' ], function( Swiper ) {
    /**
     * Setup Swiper.
     */
    var swiper = new Swiper( '.indexes__swiper-container', {
        init: false,
        slidesPerView: 'auto',
        spaceBetween: 30,

        navigation: {
            nextEl: '.indexes__nav--next',
            prevEl: '.indexes__nav--prev',
            disabledClass: 'indexes__nav--disabled'
        },

        breakpoints: {
            768: {
                spaceBetween: 0,
                slidesPerView: 1
            }
        },

        on: {
            init: generateIndexSelect,
            slideChange: scrollToIndex
        }
    } );

    /**
     * Scroll to index ID.
     */
    function scrollToIndex() {
        var item = jQuery( '.indexes__item' ).eq( this.snapIndex );
        scroolToElement( item.find( 'a' ).attr( 'href' ) );
    }

    /**
     * Scroll to index section.
     *
     * @param {String} target
     */
    function scroolToElement( target ) {
        var elOffset = jQuery( target ).offset().top;

        jQuery( 'html, body' ).animate( {
            scrollTop: elOffset
        }, 800 );
    }

    /**
     * Generate index select.
     */
    function generateIndexSelect() {
        jQuery( '.indexes__item' ).each( function( index, el ) {
            jQuery( '.indexes__select' ).append( '<div class="indexes__select-item">' + jQuery( el ).html() + '</div>' );
        } );
    }

    jQuery( '.indexes__toggler' ).click( function() {
        jQuery( '.indexes__select' ).toggleClass( 'indexes__select--open' );
    } );

    /**
     * Set the index item width for Swiper calculate correctly.
     */
    jQuery( '.indexes__item' ).each( function( index, el ) {
        jQuery( el ).width( jQuery( el ).width() + 40 );
    } ).promise().done( function() {
        swiper.init();
    } );
} );
