<?php

function event_posts_sc(){
  
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
        $result .= <<<PACKEVENT
        <article class="pack_event">
            <h3>$event_title | status: <span>($event_status)</span></h3>
            <sup>From: $start_date $start_time To: $end_date $end_time</sup>
            <section>
                $upcoming_event_description;
            </section>
        </article>
PACKEVENT;        
  
        endwhile;
  
        wp_reset_postdata();
  
    endif;    
  
    return $result;            
}
  
add_shortcode( 'event-list', 'event_posts_sc' ); 
  