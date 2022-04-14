<?php
/**
 * Template part for displaying a message that posts cannot be found
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package scouts
 */

?>

<?php
$hero_image = "";

if(has_post_thumbnail()){
	$hero_image = get_the_post_thumbnail_url();
}else{
	if(get_field("default_hero_image", "theme-general-settings")){
		$hero_image = get_field("default_hero_image", "theme-general-settings");
	}else{
		$hero_image = get_template_directory_uri() . "/images/dens.jpg";
	}
}
?>
	<header class="entry-header" id="hero-header" style="background-image:url(<?php echo $hero_image ?>)">
		<?php 
			if(get_field('display_sign_up_button', 'option')){
				echo get_field('sign_up_button', 'option'); 
			}
		?>             
	</header><!-- .entry-header -->

<section class="no-results not-found">
	<header class="page-header">
		<h1 class="page-title"><?php esc_html_e( 'Nothing Found', 'scouts' ); ?></h1>
	</header><!-- .page-header -->

	<div class="page-content">
		<?php
		if ( is_home() && current_user_can( 'publish_posts' ) ) :

			printf(
				'<p>' . wp_kses(
					/* translators: 1: link to WP admin new post page. */
					__( 'Ready to publish your first post? <a href="%1$s">Get started here</a>.', 'scouts' ),
					array(
						'a' => array(
							'href' => array(),
						),
					)
				) . '</p>',
				esc_url( admin_url( 'post-new.php' ) )
			);

		elseif ( is_search() ) :
			?>

			<p><?php esc_html_e( 'Sorry, but nothing matched your search terms. Please try again with some different keywords.', 'scouts' ); ?></p>
			<?php
			get_search_form();

		else :
			?>

			<p><?php esc_html_e( 'It seems we can&rsquo;t find what you&rsquo;re looking for. Perhaps searching can help.', 'scouts' ); ?></p>
			<?php
			get_search_form();

		endif;
		?>
	</div><!-- .page-content -->
</section><!-- .no-results -->
