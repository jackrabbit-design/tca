<?php /*Template Name: Gallery*/ get_header(); the_post(); ?>
<?php if($imageSrc = get_post_thumbnail_id($post->ID)) {  $image = wp_get_attachment_image_src($imageSrc, 'interior-banner'); ?>
	<div id="inner-pg-banner" style="background-image:url(<?php echo $image[0]; ?>)" class="pg-banner">
<?php } else { $imageSrc = get_field('default_banner_image', 'options'); $image = wp_get_attachment_image_src($imageSrc, 'interior-banner'); ?>
	<div id="inner-pg-banner" style="background-image:url(<?php echo $image[0]; ?>)" class="pg-banner">
<?php } ?>
    	<h2><?php the_title(); ?></h2>
        <div class="line" style="background-color:#675b79"></div>
    </div>
    
    <main id="gallery">
    	<div class="pg-top-rw">
        	<?php the_content(); ?>
        </div>
        
        
        <div class="module">
        	<div id="galleryContainer">
            
                <div class="ctrl-bar">
               
                    <div class="filter" data-filter="all">All</div>
                    <?php if($terms = get_terms('gallery-category', array('orderby'=> 'title', 'order' => 'ASC'))) :
	                    foreach($terms as $term) :
                    ?>
                    	<div class="filter" data-filter=".<?php echo $term->slug; ?>"><?php echo $term->name; ?></div>
                    <?php endforeach; endif; ?>
                </div>
             <?php $g = 1; $paged = (get_query_var('paged')) ? get_query_var('paged') : 1; query_posts(array('post_type' => 'gallery-image', 'posts_per_page' => -1, 'paged' => $paged)); if(have_posts()) : ?>
                <div class="gallery-images">
					<?php while(have_posts()) : the_post(); $postTerms = get_the_terms($post->ID, 'gallery-category');
						$size = get_field('large_image_or_small_image');
						$img_id = get_post_thumbnail_id($post->ID);
						$imageLarge = wp_get_attachment_image_src($img_id, 'gallery-page-large'); 
						$full = wp_get_attachment_image_src($img_id, 'full');
						$imageSmall = wp_get_attachment_image_src($img_id, 'gallery-page-small'); 
						$alt_text = get_post_meta($img_id , '_wp_attachment_image_alt', true);
					?>
					<?php if($size == 'large-image') { ?>
						<a class="mix <?php foreach($postTerms as $postTerm) { echo $postTerm->slug; } ?> large-image" href="<?php the_permalink(); //echo $full[0]; ?>">
							<img src="" data-src="<?php echo $imageLarge[0]; ?>" alt="<?php echo $alt_text; ?>" width="960" height="507" class="lazyload"/>
						</a>
						<?php } elseif($size == 'small-image') { ?>
						<a class="mix <?php foreach($postTerms as $postTerm) { echo $postTerm->slug; } ?> small-image" href="<?php the_permalink(); //echo $full[0]; ?>">
							<img src="" data-src="<?php echo $imageSmall[0]; ?>" alt="<?php echo $alt_text; ?>" width="475" height="500" class="lazyload"/>
						</a>
						<?php } ?>
					<?php endwhile; ?> 
                </div>
              
                  <?php endif; wp_reset_query(); ?>
                  <a href="<?php echo get_permalink(1816); ?>" class="read-more">Photography Credits</a>
            </div><!--galleryContainer-->
        </div> 
    </main>
	
	
	<?php //echo get_template_part('inc-gallery-inline'); ?>
	
	
<?php get_footer(); ?>