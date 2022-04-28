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

			$event_title = get_the_title();
            $start_date = get_field('event_start_date');
            $end_date = get_field('event_end_date');
            $start_time = get_field('event_start_time');
            $end_time = get_field('event_end_time');
            $upcoming_event_description = get_field("upcoming_event_description");
            $event_status = get_field("event_status");

			$event_description = get_field('upcoming_event_description');
			
			

			$event_costs = get_field('event_costs');
			$dens_participating = get_field('dens_participating');
			
			$cost_list = "N/A";
			$dens_list = "N/A";
			$event_link = get_permalink();

            if($event_costs){
				$cost_list = "<ul class='event_listing homepage'>";
				foreach($event_costs as $event_costs){
					//var_dump($event_cost);
					$cost_list .= '<li>' . $event_costs["cost_description"] . ' : $' . $event_costs["cost_amount"] . '</li>';
				}
				$cost_list .= "</ul>";
			}

			if($dens_participating){
				$dens_list = "<ul class='event_listing homepage'>";
				foreach($dens_participating as $den_participating){
					//echo $den_participating;
					$dens_list .= '<li>' . $den_participating . '</li>';
				}
				$dens_list .= "</ul>";
			}
			
        echo <<<PACKEVENT
        <article class="pack_event">
            <h3>$event_title | status: <span>($event_status)</span></h3>
            <sup>From: $start_date $start_time To: $end_date $end_time</sup>
            <section>
                $upcoming_event_description;
            <h3>Dens:</h3>
            $dens_list
            </section>
        </article>
PACKEVENT;        
  


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
