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
    <style>

    </style>

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

			if(get_field('intro_video')['url']){
			?>
			<style>
				header#hero-header{
					overflow: hidden;
					position: relative;
					background-color: #2d509f;
					background-image:none !important; 
					height: 25em
				}

				header#hero-header::before {
					content: " ";
					display: block;
					position: absolute;
					top: 0;
					left: 0;
					bottom: 0;
					right: 0;
					background: linear-gradient(rgba(18, 16, 16, 0) 50%, rgba(0, 0, 0, 0.25) 50%), linear-gradient(90deg, rgba(255, 0, 0, 0.06), rgba(0, 255, 0, 0.02), rgba(0, 0, 255, 0.06));
					z-index: 2;
					background-size: 100% 2px, 3px 100%;
					pointer-events: none;
				}

				#header-video{
					width: 100%;
					position: absolute;
					top: -180px;
					opacity: .8;
					box-shadow: inset 1px 0px 23px 26px rgba(0,0,0,0.57);
				}


				@media screen and (max-width: 600px) {
					#header-video{
        				top: 0;
    				}
					header#hero-header {
						height: 12px;
    					min-height: 12em;
					}
			</style>
<video autoplay loop playsinline muted width="250" id="header-video">


<source src="<?php  echo get_field('intro_video')['url'];?>"
		type="video/mp4">

Sorry, your browser doesn't support embedded videos.
</video>			
			<?php
			}
                if(get_field('display_sign_up_button', "option")){
                    echo get_field('sign_up_button', "option"); 
                }

            ?>             
        </header><!-- .entry-header -->
	<?php

	?>
	<section id="content_sections">
		<div class="entry-content">
			<section class="page_sections">
				<section class="content_section">
		<?php the_title( '<h1 class="entry-title">', '</h1>' ); ?>
			<?php
			the_content();
			
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
			$rows = get_field('sections');
			if( $rows ) {
				echo '<section class="page_sections">';
				foreach( $rows as $row ) {
					$header = $row['header'];
					$text = $row['text'];
					//$bgc = $row['background-color'];
                    if($row['section_id']){
                        $section_id = 'id="'.$row['section_id']. '"';
                    }else{
                        $section_id="";
                    }
echo <<<SCOUTCONTENT
<section class="content_section" $section_id>
	<h2>$header</h2>
	<div class="content">
		$text
	</div>
</section>

SCOUTCONTENT;
					echo '</li>';
				}
				echo '</section>';
			}
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
