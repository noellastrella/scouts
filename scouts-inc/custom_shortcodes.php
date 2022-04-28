<?php

function event_posts_sc(){
    $result = "";
    $args = array(
                    'post_type'      => 'pack160_events',
                    'posts_per_page' => '10',
                    'publish_status' => 'published',
                 );
  
    $query = new WP_Query($args);
  
    if($query->have_posts()) :
  
        while($query->have_posts()) :
  
            $query->the_post() ;
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
			
        $result .= <<<PACKEVENT
        <article class="pack_event">
            <h3>$event_title | status: <span>($event_status)</span></h3>
            <sup>From: $start_date $start_time To: $end_date $end_time</sup>
            <section>
                $upcoming_event_description;
            <h3>Dens:</h3>
            $dens_list
            <p><a href="$event_link">Learn More</a></p>
            </section>
        </article>
PACKEVENT;        
  
        endwhile;
  
        wp_reset_postdata();
  
    endif;    
  
    return $result;            
}
  
add_shortcode( 'event-list', 'event_posts_sc' ); 
  