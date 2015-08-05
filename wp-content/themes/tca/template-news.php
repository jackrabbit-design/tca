<?php /*Template Name: News*/ get_header(); ?>
<?php if($imageSrc = get_post_thumbnail_id($post->ID)) {  $image = wp_get_attachment_image_src($imageSrc, 'interior-banner'); ?>
	<div id="inner-pg-banner" style="background-image:url(<?php echo $image[0]; ?>)" class="pg-banner">
<?php } else { $imageSrc = get_field('default_banner_image', 'options'); $image = wp_get_attachment_image_src($imageSrc, 'interior-banner'); ?>
	<div id="inner-pg-banner" style="background-image:url(<?php echo $image[0]; ?>)" class="pg-banner">
<?php } ?>
    	<h2><?php the_title(); ?></h2>
        <div class="line" style="background-color:#675b79"></div>
    </div>
    
    <main id="news">
    	<div class="module">
    		<div class="news-wrap">
    	<?php $count=0; $paged = (get_query_var('paged')) ? get_query_var('paged') : 1; query_posts(array('post_type' => 'news-post', 'posts_per_page' => 6, 'paged' => $paged)); 
    	if(have_posts()) : ?>
        	
        	<?php while(have_posts()) : the_post(); ?>
        	<?php if($count % 2 == 0) { echo '</ul><ul>'; } ?>
                <li>
                    <h3><a href="<?php if($link = get_field('news_link')) { echo $link; } else { echo get_permalink(); } ?>" <?php if($link){ echo 'target="_blank"'; } ?>><?php the_title(); ?></a></h3>
                    <span><?php the_date('F, j Y'); ?>  |  <?php the_field('news_source'); ?></span>
                </li>
                <?php if($count % 2 == 1) { echo '</ul>'; } ?>
               <?php $count++; endwhile; ?>
            
               <div class="loading">
            	<?php next_posts_link('Load More'); ?>
            </div>
            <?php else : ?>
            
           <p><?php //_e( 'Sorry, no news items.' ); ?></p>
            
         
        <?php endif; wp_reset_query(); ?>
    </div>
        </div>
    </main>
<?php get_footer(); ?>
