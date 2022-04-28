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

	<section id="content_sections" >
		<div class="entry-content">

<?php
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
				$cost_list = "<ul class='event_listing'>";
				foreach($event_costs as $event_costs){
					//var_dump($event_cost);
					$cost_list .= '<li>' . $event_costs["cost_description"] . ' : $' . $event_costs["cost_amount"] . '</li>';
				}
				$cost_list .= "</ul>";
			}

			if($dens_participating){
				$dens_list = "<ul class='event_listing'>";
				foreach($dens_participating as $den_participating){
					//echo $den_participating;
					$dens_list .= '<li>' . $den_participating . '</li>';
				}
				$dens_list .= "</ul>";
			}

			//upcoming_event_description
            //pack160_events
echo <<<SCOUTCONTENT
<section class="content_section" >
	<h2>$event_title</h2>
	<h3>Status: $event_status</h3>
	<h3>From: $start_date ($start_time) To: $end_date ($end_time)</h3>
	<h3>Event Description:</h3>
	<div class="content">
		$event_description
	</div>
	<h3>Event Costs:</h3>
	<div class="content">
		$cost_list
	</div>
	<h3>Dens Participating:</h3>
	<div class="content">
		$dens_list
	</div>
	<div>
		<a href="$event_link">Learn More</a>
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
