<?php
/**
 * Template part for displaying posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package scouts
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<?php
	if(has_post_thumbnail()){
	?>
		<header class="entry-header" id="hero-header" style="background-image:url(<?php the_post_thumbnail_url(); ?>)">
			
		</header><!-- .entry-header -->
	<?php
	}else{
	?>
		<header class="entry-header" id="hero-header" style="background-image:url(<?php get_template_directory_uri() . "/images/dens.jpg" ?>)">
			
		</header><!-- .entry-header -->
	<?php
	}
	?>	
	X

	<?php scouts_post_thumbnail(); ?>

	<div class="entry-content">
		<?php
		the_content(
			sprintf(
				wp_kses(
					/* translators: %s: Name of current post. Only visible to screen readers */
					__( 'Continue reading<span class="screen-reader-text"> "%s"</span>', 'scouts' ),
					array(
						'span' => array(
							'class' => array(),
						),
					)
				),
				wp_kses_post( get_the_title() )
			)
		);

		wp_link_pages(
			array(
				'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'scouts' ),
				'after'  => '</div>',
			)
		);
		?>
	</div><!-- .entry-content -->

	<footer class="entry-footer">
		<?php scouts_entry_footer(); ?>
	</footer><!-- .entry-footer -->
</article><!-- #post-<?php the_ID(); ?> -->
