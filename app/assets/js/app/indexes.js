/**
 * Indexes tags.
 */
define( [ 'app/breakpoint', 'swiper/dist/js/swiper' ], function( breakpoint, Swiper ) {
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
        if ( breakpoint.isSmallerThan( 'MD' ) ) {
            var item = jQuery( '.indexes__item' ).eq( this.snapIndex );

            scroolToElement( item.find( 'a' ).attr( 'href' ) );
        }
    }

    /**
     * Scroll to index section.
     *
     * @param {String} target
     */
    function scroolToElement( target, extraMargin ) {
        var elOffset = jQuery( target ).offset().top,
            indexHeight = jQuery( '.indexes' ).outerHeight(),
            marginBottom = 25,
            headerHeight = jQuery( '.top-header-wrapper' ).outerHeight();

        extraMargin = extraMargin ? extraMargin : 0;

        jQuery( 'html, body' ).animate( {
            scrollTop: elOffset - ( headerHeight + indexHeight + marginBottom + extraMargin )
        }, 800 );
    }

    /**
     * Set current index.
     *
     * @param {Event} e
     */
    function setIndex( e ) {
        var $this = jQuery( this );

        if ( ! breakpoint.isSmallerThan( 'MD' ) ) {
            setIndexAsActive( $this );
            scroolToElement( $this.find( 'a' ).attr( 'href' ) );
        }

        e.preventDefault();
    }

    /**
     * Set current index class.
     *
     * @param {jQuery} $index
     */
    function setIndexAsActive ( $index ) {
        var className = 'indexes__item--active';

        jQuery( '.' + className ).removeClass( className );
        $index.addClass( className );
    }

    /**
     * Generate index select.
     */
    function generateIndexSelect() {
        jQuery( '.indexes__item' ).each( function( index, el ) {
            jQuery( '.indexes__select' ).append( '<div class="indexes__select-item">' + jQuery( el ).html() + '</div>' );
        } );
    }

    /**
     * Handle with toggler click.
     */
    function toggleSelect() {
        jQuery( '.indexes__select' ).toggleClass( 'indexes__select--open' );
    }

    /**
     * Handle with selected index.
     *
     * @param {Event} e
     */
    function selectedIndex( e ) {
        swiper.slideTo( jQuery( this ).index() );
        toggleSelect();

        e.preventDefault();
    }

    /**
     * Set the index item width for Swiper calculate correctly.
     */
    jQuery( '.indexes__item' ).each( function( index, el ) {
        // @TODO: Check why extra size is required
        var width = jQuery( el ).width() + 7;

        if ( index === jQuery( '.indexes__item' ).length - 1 ) {
            width += 3;
        }

        jQuery( el ).width( width );
    } ).promise().done( function() {
        swiper.init();
    } );

    // Add index item event.
    jQuery( '.indexes__item' ).click( setIndex );

    // Add toggler event.
    jQuery( '.indexes__toggler' ).click( toggleSelect );

    // Add index select event.
    jQuery( 'body' ).on( 'click', '.indexes__select-item', selectedIndex );
} );
