<?php /*Template Name: Search Venue */ 

$typeSelect = '';
if(isset($_GET['venue_type'])){
	if($_GET['venue_type'] != 'All'){
		$typeSelect = $_GET['venue_type'];
	}
}

$regionSelect = '';
if(isset($_GET['venue_region'])){
	if($_GET['venue_region'] != 'All'){
		$regionSelect = $_GET['venue_region'];
	}
}

$sizeSelect = '';
if(isset($_GET['venue_size'])){
	if($_GET['venue_size'] != 'All'){
		$sizeSelect = $_GET['venue_size'];
	}
}

$venueSelect = '';
if(isset($_GET['venue_style'])){
	if($_GET['venue_style'] != 'All'){
		$venueSelect = $_GET['venue_style'];
	}
}


$venueKey = false;
	if(isset($_GET['search_venue'])){
    $venueKey = $_GET['search_venue'];
}

get_header(); ?>
<?php if($imageSrc = get_post_thumbnail_id($post->ID)) {  $image = wp_get_attachment_image_src($imageSrc, 'interior-banner'); ?>
  <div id="inner-pg-banner" style="background-image:url(<?php echo $image[0]; ?>)" class="pg-banner">
<?php } else { $imageSrc = get_sub_field('default_banner_image', 'options'); $image = wp_get_attachment_image_src($imageSrc, 'interior-banner'); ?>
  <div id="inner-pg-banner" style="background-image:url(<?php echo $image[0]; ?>)" class="pg-banner">
  <?php } ?>
    	<h3>Search Venues</h3>
        <div class="line" style="background-color:#419298"></div>
    </div>
    
    <main id="venues">
    	<div class="vanues-rw1">
        	<p>Search Results For: <?php echo $typeSelect.' '.$regionSelect.' '.$sizeSelect.' '.$venueSelect.' '.$venueKey; ?></p>
        </div>
        <!-- Need To Fix This -->  <div class="module">
				<?php get_template_part('inc-venue-search'); ?>
       
    


            <?php $paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
	    $dishArgs = array('post_type' => 'venue', 'posts_per_page' => -1, 'paged' => $paged, 's' => $venueKey, 'event-type' => $typeSelect, 'region' => $regionSelect, 'event-size' => $sizeSelect, 'venue-style' => $venueSelect);
	    $search = new WP_Query($dishArgs);  ?>
            <div class="v-boxes">
            <?php if($search->have_posts()) :?>
			
            	<ul>
            	<?php while($search->have_posts()) : $search->the_post(); 
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
            <?php if($search->have_posts()) :?>
            <div class="v-small-box">
            	<ul>
            	<?php while($search->have_posts()) : $search->the_post(); if(!$imageSrc = get_post_thumbnail_id($post->ID)) {  ?>
                	<li>
                    	<a href="<?php the_field('venue_link'); ?>">
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
			<?php else : ?>
				
				Sorry we couldn't find anything matching your search creatia.
				
            <?php endif; wp_reset_query(); ?>
        </div>
    </main>
	
	<?php /*$venue = array('post_type' => 'venue', 'posts_per_page' => -1); query_posts($venue); ?>
	 <?php if(have_posts()) : ?>
	 <?php while(have_posts()) : the_post(); ?>
	    <div class="venue-popup-wrap" style="display:none">
    	<div class="venue-slider-wrap" id="<?php echo $post->post_name; ?>">
        
        	<div class="topic-wrap">
            	<div class="venue-content" ><span><?php the_title(); ?></span></div>
            </div>
            
            <div class="venue-slider-<?php echo $post->post_name; ?>">
            <?php if(have_rows('images')) : while(have_rows('images')) : the_row(); ?>
                
                <?php $img = get_sub_field('image'); ?>
				
				<div><img src="<?php echo $img['sizes']['venue-large']; ?>" alt="<?php echo $img['alt']; ?>" /></div>
				
            <?php endwhile; endif; ?>
            </div>
            <div class="venue-nav-wrap">
            	<div class="slide-nav-wrapper">
                    <div class="slide-nav-<?php echo $post->post_name; ?>"></div>
                </div>
            </div>
        </div>
        
    </div>
    <?php endwhile; endif; wp_reset_query(); */?>
       
             

<?php get_footer(); ?>

