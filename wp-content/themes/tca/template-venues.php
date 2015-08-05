<?php /*Template Name: Venues*/ 
	get_header(); the_post(); ?>
<?php if($imageSrc = get_post_thumbnail_id($post->ID)) {  $image = wp_get_attachment_image_src($imageSrc, 'interior-banner'); ?>
  <div id="inner-pg-banner" style="background-image:url(<?php echo $image[0]; ?>)" class="pg-banner">
<?php } else { $imageSrc = get_sub_field('default_banner_image', 'options'); $image = wp_get_attachment_image_src($imageSrc, 'interior-banner'); ?>
  <div id="inner-pg-banner" style="background-image:url(<?php echo $image[0]; ?>)" class="pg-banner">
  <?php } ?>
    	<h2><?php the_title(); ?></h2>
        <div class="line" style="background-color:#419298"></div>
    </div>
    
    <main id="venues">
    	<div class="vanues-rw1">
        	<?php the_content(); ?>
        </div>
        <!-- Need To Fix This -->  <div class="module">
				<?php get_template_part('inc-venue-search'); ?>
       
     
            <?php $venue = array('post_type' => 'venue', 'posts_per_page' => -1); query_posts($venue); ?>
            <div class="v-boxes">
            <?php if(have_posts()) : ?>
            	<ul>
            	<?php while(have_posts()) : the_post(); 
	            	if($imageSrc = get_post_thumbnail_id($post->ID)) { 
	            	$image = wp_get_attachment_image_src($imageSrc, 'venue-size');
	            	$alt_text = get_post_meta($imageSrc , '_wp_attachment_image_alt', true);
            	?>
                    <li>
                    
                    <a href="<?php the_permalink(); ?>" class="venue-popup-<?php echo $post->post_name; ?>">
                        <div class="thumbnail">
                            <img src="<?php echo $image[0]; ?>" alt="<?php echo $alt_text; ?>" width="475" height="305"/>
                        </div>
                        <div class="venue-content"><span><?php the_title(); ?></span></div>
                        <div class="icons">
                        <?php $terms =  has_term('','event-type');  ?>
                        	<span class="ring <?php if( has_term( 'wedding', 'event-type' ) ) { echo 'active'; } ?>"></span>
                            <span class="gala <?php if( has_term( 'gala', 'event-type' ) ) { echo 'active'; } ?>"></span>
                            <span class="coporate <?php if( has_term( 'corporate', 'event-type' ) ) { echo 'active'; } ?>"></span>
                        </div>
                    </a>
                    </li>
                    <?php } endwhile; ?>
                </ul>
                <?php endif; ?>
            </div> <!-- v-boxes -->
            <?php if(have_posts()) : ?>
            <div class="v-small-box">
            	<ul>
            	<?php while(have_posts()) : the_post(); if(!$imageSrc = get_post_thumbnail_id($post->ID)) {  ?>
                	<li>
                    	<a name="<?php the_title(); ?>" target="_blank" <?php if(get_field('venue_link')){ ?>href="<?php the_field('venue_link'); ?>"<?php } ?>>
                        	<div class="wrap">
                            	<h3><?php the_title(); ?></h3>
                                <span><?php the_field('venue_location'); ?></span>
                                <div class="icons">
	                            	<span class="ring <?php if( has_term( 'wedding', 'event-type' ) ) { echo 'active'; } ?>"></span>
									<span class="gala <?php if( has_term( 'gala', 'event-type' ) ) { echo 'active'; } ?>"></span>
									<span class="coporate <?php if( has_term( 'corporate', 'event-type' ) ) { echo 'active'; } ?>"></span>
                                </div>
                            </div>
                        </a>
                    </li>
                   <?php } endwhile; ?>
                </ul>
            </div>
            <?php endif; wp_reset_query(); ?>
        </div>
    </main>
	
	
       
             

<?php get_footer(); ?>

