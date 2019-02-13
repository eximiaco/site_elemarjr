/**
 * Indexes tags.
 */
define( [], function() {
    // Attributes
    var $list        = jQuery( '.indexes-tags__list' ),
        $prev        = jQuery( '.indexes-tags__arrow--prev' ),
        $next        = jQuery( '.indexes-tags__arrow--next' ),
        $index       = jQuery( '.indexes-tags__list a' ),
        $selected    = jQuery( '.indexes-tags__selected' ),
        $toggler     = jQuery( '.indexes-tags__toggler' ),
        currentIndex = 0;

    /**
     * Toggle index lists.
     *
     * @param {Event} e
     */
    function toggleList( e ) {
        $list.toggleClass( 'indexes-tags__list--open' );
        e.preventDefault();
    }

    /**
     * Scroll to index section.
     *
     * @param {String} target
     */
    function scroolToElement( target ) {
        var elOffset       = jQuery( target ).offset().top,
            headerHeight   = 70, //jQuery( '.top-header-wrapper' ).height(),
            selectedHeight = $selected.height();

        jQuery( 'html, body' ).animate( {
            scrollTop: elOffset - ( headerHeight + selectedHeight )
        }, 800 );
    }

    /**
     * Set clicked index.
     *
     * @param {Event} e
     */
    function selectIndex( e ) {
        var $this   = jQuery( this ),
            $target = jQuery( this ).attr( 'href' );

        if ( $target.length ) {
            scroolToElement( $target );
            toggleList( e );
            $selected.text( $this.text() );

            currentIndex = $this.parent().index();
        }

        e.preventDefault();
    }

    /**
     * Go to the index.
     *
     * @param {Number} index
     */
    function goToIndex( index ) {
        if ( index >= 0 && index <= $index.length ) {
            var $el    = jQuery( $index[index] ),
                $target = $el.attr( 'href' );

            scroolToElement( $target );
            currentIndex = index;
            $selected.text( $el.text() );
        }
    }

    /**
     * Go to the prev index.
     *
     * @param {Event} e
     */
    function prev( e ) {
        goToIndex( currentIndex - 1 );
        e.preventDefault();
    }

    /**
     * Go to the next index.
     *
     * @param {Event} e
     */
    function next( e ) {
        goToIndex( currentIndex + 1 );
        e.preventDefault();
    }

    $next.click( next );
    $prev.click( prev );
    $index.click( selectIndex );
    $toggler.click( toggleList );
} );
