/**
 * Clean files and folders
 */
module.exports = {
	images: {
		expand: true,
		cwd: '<%= config.assets.src %>/images',
		src: '**/*',
		dest : '<%= config.assets.build %>/images'
	},
	'font-icon': {
		expand: true,
		cwd: '<%= config.assets.src %>/font-icon/fonts',
		src: '**/*',
		dest : '<%= config.assets.build %>/fonts/icons/'
	},
	assets: {
		expand: true,
		cwd: '<%= config.assets.build %>',
		src: '**/*',
		dest: '<%= config.template.src %>/assets/'
	}
};
