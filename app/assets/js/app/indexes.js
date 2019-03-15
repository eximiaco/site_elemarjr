/**
 * Indexes tags.
 */
define( [ 'app/breakpoint', 'swiper/dist/js/swiper' ], function( breakpoint, Swiper ) {
    /**
     * Setup Swiper.
     */
    var swiper = new Swiper( '.indexes__swiper-container', {
        slidesPerView: 'auto',
        spaceBetween: 30,

        // Navigation
        navigation: {
            nextEl: '.indexes__nav--next',
            prevEl: '.indexes__nav--prev',
            disabledClass: 'indexes__nav--disabled'
        },

        // Breakpoints
        breakpoints: {
            1229: {
                spaceBetween: 0,
                slidesPerView: 1
            }
        },

        // Events
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
            indexHeight = jQuery( '.indexes__container' ).outerHeight(),
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
        jQuery( '.indexes__toggler' ).toggleClass( 'indexes__toggler--open' );
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
     * Fix index item width.
     */
    function fixIndexWidth() {
        if ( jQuery( window ).width() >= 1230 ) {
            jQuery( '.indexes__item' ).each( function () {
                jQuery( this ).css( 'width', 'auto' );
            } );
        }
    }

    /**
     * Basic JavaScript debounce function taken from Underscore.js.
     *
     * @TODO: Move this function to a requirejs module.
     * @param {Function} func
     * @param {Number} wait
     * @param {Boolean} immediate
     */
    function debounce( func, wait, immediate ) {
        var timeout;

        return function() {
            var args = arguments;
            var context = this;

            var later = function() {
                timeout = null;
                if ( ! immediate ) {
                    func.apply( context, args );
                }
            };

            var callNow = immediate && ! timeout;
            clearTimeout( timeout );
            timeout = setTimeout( later, wait );

            if ( callNow ) {
                func.apply( context, args );
            }
        };
    }

    /**
     * On window resize.
     */
    jQuery( window ).on( 'resize', debounce( fixIndexWidth, 150 ) );

    // Add index item event.
    jQuery( '.indexes__item' ).click( setIndex );

    // Add toggler event.
    jQuery( '.indexes__toggler' ).click( toggleSelect );

    // Add index select event.
    jQuery( 'body' ).on( 'click', '.indexes__select-item', selectedIndex );
} );
