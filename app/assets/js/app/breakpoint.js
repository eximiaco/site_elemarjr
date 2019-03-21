/**
 * Manipulate header to show after load the font
 */
define( [], function () {
	return {
        is: function( size ) {
            var width = jQuery( window ).width();

            if ( size.toLocaleUpperCase() === 'XS' ) {
                return width <= 480;
            }

            if ( size.toLocaleUpperCase() === 'SM' ) {
                return width > 480 && width <= 768;
            }

            if ( size.toLocaleUpperCase() === 'MD' ) {
                return width > 768 && width <= 1190;
            }

            return false;
        },

        isSmallerThan: function( size ) {
            var width = jQuery( window ).width();

            if ( size.toLocaleUpperCase() === 'MD' ) {
                return width <= 768;
            }

            return false;
        },

        isGreaterThan: function( size ) {
            var width = jQuery( window ).width();

            if ( size.toLocaleUpperCase() === 'MD' ) {
                return width >= 768;
            }
        }
    };
});
