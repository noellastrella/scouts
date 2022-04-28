<?php
/**
 * The template for displaying archive pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package scouts
 */

get_header();

$hero_image = "";

if(the_post_thumbnail_url()){
	$hero_image = the_post_thumbnail_url();
}else{
	if(get_field("default_hero_image", "option")){
		$hero_image = get_field("default_hero_image", "option");
	}else{
		$hero_image = get_template_directory_uri() . "/images/dens.jpg";
	}
}

?>

	<main id="primary" class="site-main">
		<header class="entry-header" id="hero-header" style="background-image:url(<?php echo $hero_image; ?>)">
			<?php 
                if(get_field('display_sign_up_button', "option")){
                    echo get_field('sign_up_button', "option"); 
                }
            ?>   
		</header><!-- .entry-header -->
		<section id="content_sections">
			<div class="entry-content">
				<section class="content_section">
						<h1 class="page-title">Pack Events!!</h1>
							<header class="page-header">
								<?php
								the_archive_description( '<div class="archive-description">', '</div>' );
								?>
							</header><!-- .page-header -->
						<?php if ( have_posts() ) : ?>



						<?php
						/* Start the Loop */
						while ( have_posts() ) :
							the_post();
							get_template_part( 'template-parts/partial-events', get_post_type() );
							/*
							* Include the Post-Type-specific template for the content.
							* If you want to override this in a child theme, then include a file
							* called content-___.php (where ___ is the Post Type name) and that will be used instead.
							*/
							//get_template_part( 'template-parts/content', get_post_type() );
							
						endwhile;

						the_posts_navigation();

					else :

						get_template_part( 'template-parts/content', 'none' );

					endif;
					?>
				</section>
			</div>
		</section>
	</main><!-- #main -->

<?php
get_sidebar();
get_footer();
