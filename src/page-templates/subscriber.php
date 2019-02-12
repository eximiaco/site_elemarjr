<?php
/**
 * The template for displaying all pages
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site may use a
 * different template.
 *
 * Template name: Subscriber
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package WordPress
 * @subpackage ElemarJr
 * @since 0.1.0
 * @version 0.1.0
 */

get_header();
?>

<nav class="indexes">
	<div class="container indexes__container">
		<div class="indexes__nav">
			<i class="i-arrow-left"></i>
		</div>
		<ul class="indexes__list">
			<li class="indexes__item"><a href="#">Nome do indíce A</a></li>
		</ul>
		<div class="indexes__nav">
			<i class="i-arrow-right"></i>
		</div>
	</div>
</nav>

<?php get_footer(); ?>
