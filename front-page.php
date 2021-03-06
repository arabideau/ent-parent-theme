<?php
/**
 * The main template file.
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query. 
 * E.g., it puts together the home page when no home.php file exists.
 * Learn more: http://codex.wordpress.org/Template_Hierarchy
 *
 * @package WordPress
 * @subpackage Boilerplate
 * @since Boilerplate 1.0
 */

get_header(); ?>

	<ul class="slideshow">
		<? $showcases = get_showcase(); foreach ($showcases as $adscene) { ?>
		<li><a href="<?= $adscene['link'] ?>"><img src="<? bloginfo('stylesheet_directory') ?>/images/showcase/<?= $adscene['image'] ?>" /></a></li>
		<? } ?>
	</ul>

<?php get_footer(); ?>