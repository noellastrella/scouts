<?php
/**
 * Template part for displaying page content in page.php
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package scouts
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>


<?php

	$hero_image = "";

	if(has_post_thumbnail()){
		$hero_image = get_the_post_thumbnail_url();
	}else{
	if(get_field("default_hero_image", "option")){
		$hero_image = get_field("default_hero_image", "option");
	}else{
		$hero_image = get_template_directory_uri() . "/images/dens.jpg";
	}
}
?>
	<header class="entry-header" id="hero-header" style="background-image:url(<?php echo $hero_image ?>)">
		<?php 
		echo get_field('display_sign_up_button', "option");
			if(get_field('display_sign_up_button', "option")){
				echo get_field('sign_up_button', "option"); 
			}
		?>             
	</header><!-- .entry-header -->
	<section id="content_sections">
		<div class="entry-content">
			<section class="page_sections">
				<section class="content_section">
		<?php the_title( '<h1 class="entry-title">', '</h1>' ); ?>
			<?php
			the_content();


?>
			</section>
		</section>
<?php
		
			?>
		</div><!-- .entry-content -->
	</section>
	<?php if ( get_edit_post_link() ) : ?>
		<footer class="entry-footer">
			<?php
			edit_post_link(
				sprintf(
					wp_kses(
						/* translators: %s: Name of current post. Only visible to screen readers */
						__( 'Edit <span class="screen-reader-text">%s</span>', 'scouts' ),
						array(
							'span' => array(
								'class' => array(),
							),
						)
					),
					wp_kses_post( get_the_title() )
				),
				'<span class="edit-link">',
				'</span>'
			);
			?>
		</footer><!-- .entry-footer -->
	<?php endif; ?>
</article><!-- #post-<?php the_ID(); ?> -->
