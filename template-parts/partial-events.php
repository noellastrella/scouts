<?php
/**
 * Template part for displaying page content in page.php
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
<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>	

	<section id="content_sections">
		<div class="entry-content">
			<section class="page_sections">
				<section class="content_section">
		<?php the_title( '<h1 class="entry-title">', '</h1>' ); ?>
			<?php
			//the_content();
			echo get_the_title();
			
			wp_link_pages(
				array(
					'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'scouts' ),
					'after'  => '</div>',
				)
			);
?>
			</section>
		</section>
<?php
			$title = get_field('title');
            $startdate = get_field('start-date');
            $enddate = get_field('start-time');
            //pack160_events
echo <<<SCOUTCONTENT
<section class="content_section" style="background-color:$bgc">
	<h2>$header</h2>
	<h3>$startdate $enddate</h3>
	<div class="content">
		$text
	</div>
</section>

SCOUTCONTENT;

			
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
