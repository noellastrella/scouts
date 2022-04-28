<?php
/**
 * 
 *  Template Name: Documents
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package scouts
 */


get_header();
?>

	<main id="primary" class="site-main">

		<?php
		while ( have_posts() ) :
			the_post();

			get_template_part( 'template-parts/content-documents', 'page' );

			// If comments are open or we have at least one comment, load up the comment template.
			if ( comments_open() || get_comments_number() ) :
				comments_template();
			endif;




		endwhile; // End of the loop.
		?>
    </section>
	</main><!-- #main -->

<?php
get_sidebar();
get_footer();
