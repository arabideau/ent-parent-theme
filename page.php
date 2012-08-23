<?php
/**
 * The template for displaying all pages.
 *
 * This is the template that displays all pages by default.
 * Please note that this is the wordpress construct of pages
 * and that other 'pages' on your wordpress site will use a
 * different template.
 *
 * @package WordPress
 * @subpackage Boilerplate
 * @since Boilerplate 1.0
 */

get_header(); ?>

<?php if ( have_posts() ) while ( have_posts() ) : the_post(); 
	$meta = get_post_meta($post->ID, 'audiology_page_title', true);
	$theCategories = get_the_category();
	foreach($theCategories as $category) { if($category->category_parent != 0) $theCategory = $category; }
	$categorySlug = $theCategory->slug;
	$catID = $theCategory->cat_ID; ?>
	<?php echo get_sub_nav($catID, $categorySlug, 'sub-nav '.$categorySlug); ?>
	<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
		<?php get_sidebar(); ?>
		<h1><?=  get_post_meta($post->ID, 'audiology_page_title', true) ? get_post_meta($post->ID, 'audiology_page_title', true) : the_title(); ?></h1>
		<div class="entry-content">
			<?php the_content(); ?>
			<?php wp_link_pages( array( 'before' => '' . __( 'Pages:', 'boilerplate' ), 'after' => '' ) ); ?>
			<?php edit_post_link( __( 'Edit', 'boilerplate' ), '', '' ); ?>
		</div><!-- .entry-content -->
	</article><!-- #post-## -->
	<?php comments_template( '', true ); ?>
<?php endwhile; ?>
<?php get_footer(); ?>