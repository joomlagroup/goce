<?php
/**
 * The template for displaying all single posts
 *
 * @package WordPress
 * @subpackage Twenty_Thirteen
 * @since Twenty Thirteen 1.0
 */
?>
<?php get_header(do_shortcode('[jv-header]')); ?>


	<div id="primary" class="content-area">
		<div id="content" class="site-content" role="main">

			<?php /* The loop */ ?>
			<?php while ( have_posts() ) : the_post(); ?>
                <?php if(!strcmp($post->post_type, 'jv_projects')) :?>
				<?php get_template_part( 'content', 'swiper' ); ?>
                <?php else:?>
                <?php get_template_part( 'content', get_post_format() ); ?>
				<?php twentythirteen_post_nav(); ?>
                <?php endif;?>

<?php if( is_singular('jv_projects') ) { ?>
<nav class="nav-single">
<div class="alignleft prev-next-post-nav"><?php previous_post_link( '%link', 'PREVIOUS PROJECT' ) ?></div>
<div class="alignright prev-next-post-nav"><?php next_post_link( '%link', 'NEXT PROJECT' ) ?></div>
</nav><!-- .nav-single -->
<?php } ?>

				
			<?php comments_template(); ?>

			<?php endwhile; ?>

		</div><!-- #content -->
	</div><!-- #primary -->
<?php get_sidebar(); ?>
<?php get_footer(); ?>