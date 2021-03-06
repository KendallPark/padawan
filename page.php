<?php
/**
 * The template for displaying all pages.
 *
 * @package WordPress
 * @subpackage padawan
 */

get_header(); ?>
<section>
<?php if ( have_posts() ) while ( have_posts() ) : the_post(); ?>

	<?php if ( is_front_page() ) { ?>
		<h2><?php the_title(); ?></h2>
	<?php } else { ?>	
		<h1><?php the_title(); ?></h1>
	<?php } ?>				

	<?php the_content(); ?>
	<?php wp_link_pages( array( 'before' => '' . __( 'Pages:', 'padawan' ), 'after' => '' ) ); ?>
	<?php edit_post_link( __( 'Edit', 'padawan' ), '', '' ); ?>

	<?php comments_template( '', true ); ?>

<?php endwhile; ?>
</section>
<?php get_sidebar(); ?>
<?php get_footer(); ?>