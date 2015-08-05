<?php get_header(); ?>

<div id="single-pg-banner" class="pg-banner">

<?php if($imageSrc = get_post_thumbnail_id($post->ID)) {  $image = wp_get_attachment_image_src($imageSrc, 'blog-banner'); ?>


    	<div class="pg-banner-bg" style="background-image:url(<?php echo $image[0]; ?>);"></div>
    	<?php } ?>
    	<div class="main-post-content">
            <div class="main-post-border">
                <h4><?php the_title(); ?></h4>
                <span><?php echo the_date('F j, Y'); ?></span>
                <?php if($text = get_field('top_text')) { ?> <p><?php echo $text; ?></p><?php } ?>
            </div>
        </div>
    </div>
    
    <main id="single">
    
        
        <div class="post-content">
        	<div class="post-share desktop">
                <span>SHARE</span>
               <span class='st_twitter_large' displayText='Tweet'></span>
			   <span class='st_facebook_large' displayText='Facebook'></span>
			   <span class='st_sharethis_large' displayText='ShareThis'></span>
                            </div>
        
         <?php the_content(); ?>
                       
            <div class="post-share mobile">
                <span>SHARE</span>
                
             <span class='st_twitter_large' displayText='Tweet'></span>
			 <span class='st_facebook_large' displayText='Facebook'></span>
			<span class='st_sharethis_large' displayText='ShareThis'></span>
            </div>
            
        </div>
        
         <?php if(have_rows('gallery_images')) : ?>
            <div class="post-images clearfix">
            <ul>
            <?php while(have_rows('gallery_images')) : the_row(); 
	            $image = get_sub_field('image');
	            $size = get_sub_field('large_or_small');
            ?>
            	
                	<li class="<?php if($size == 'large') { echo 'large'; } elseif($size == 'small') { echo 'small'; } ?>"> 
					<a class="btn-social pinterest" target="_blank" href="http://pinterest.com/pin/create/button/?url=<?php the_permalink(); ?>&description=<?php the_title(); ?>&media=<?php echo $image['url']; ?>">	<span></span></a>
				
                	<?php if($size == 'large') { ?>
                		<img src="<?php echo $image['sizes']['gallery-page-large']; ?>" alt="<?php echo $image['alt']; ?>" title="" class="pin-me" />
                	<?php } elseif($size == 'small') { ?>																		   
                		<img src="<?php echo $image['sizes']['gallery-page-small']; ?>" alt="<?php echo $image['alt']; ?>" title="" class="pin-me" />
                	<?php } ?>
					
					
                	</li>
                	<?php endwhile; ?>
             
                </ul>
                <?php endif; ?>
            </div>

        
    <?php if($post_object = get_field('related_post')) : 
	    $post = $post_object;
	    setup_postdata($post);
    ?>
         <div class="blog-post module">  
       <h2><span>Related Blog Post</span></h2>
		
            <div class="main-post">
			<?php
				$imgSrc = get_post_thumbnail_id($post->ID); // This gets just the ID of the img
				$image = wp_get_attachment_image_src($imgSrc, 'blog-landing-size'); // Get URL of the image, and size can be set here too (same as with get_the_post_thumbnail, I think)
				$alt_text = get_post_meta($image , '_wp_attachment_image_alt', true); ?>
				<img src="<?php echo $image[0]; ?>" alt="<?php echo $alt_text; ?>" />
        
                <div class="main-post-content">
                    <div class="main-post-border">
                        <h4><?php the_title(); ?></h4>
						<?php the_excerpt(); ?>
						<a href="<?php the_permalink(); ?>" class="read-more">Read More</a>
                    </div>
                </div>
            </div>
       </div>
       <?php endif; wp_reset_postdata(); ?>
       
     </main>
<?php get_footer(); ?>