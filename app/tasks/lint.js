/**
 * Valida código Stylus e Javascript
 *
 * @param {object} grunt The Grunt object.
 */
module.exports = function ( grunt ) {
	grunt.task.registerTask( 'lint', [
		'stylint',
		'jshint'
	] );
};
