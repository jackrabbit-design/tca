<?php /*Template Name: Blog*/ get_header(); ?>

<?php if($imageSrc = get_post_thumbnail_id($post->ID)) {  $image = wp_get_attachment_image_src($imageSrc, 'interior-banner'); ?>
	<div id="inner-pg-banner" style="background-image:url(<?php echo $image[0]; ?>)" class="pg-banner">
<?php } else { $imageSrc = get_field('default_banner_image', 'options'); $image = wp_get_attachment_image_src($imageSrc, 'interior-banner'); ?>
	<div id="inner-pg-banner" style="background-image:url(<?php echo $image[0]; ?>)" class="pg-banner">
<?php } ?>
    	<h2><?php the_title(); ?></h2>
        <div class="line" style="background-color:#675b79"></div>
    </div>
<main id="blog">
    	<div class="pg-rw-one">
        <?php the_content(); ?>
            
        </div>
    <?php get_template_part( 'inc-blog-search' ); ?>     
            
            <div class="blog-post module">  
                          <?php $paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
	                          $dishArgs = array('post_type' => 'the-dishes', 'posts_per_page' => 10, 'paged' => $paged); 
	                          query_posts($dishArgs); 
	                          if(have_posts()) : while(have_posts()) : the_post(); 
                          ?>
                <div class="main-post">
                <a href="<?php the_permalink(); ?>"><?php $img_id = get_post_thumbnail_id($post->ID); $image = wp_get_attachment_image_src($img_id, 'blog-landing-size');  $alt_text = get_post_meta($img_id , '_wp_attachment_image_alt', true); ?>
                    <img src="<?php echo $image[0]; ?>" alt="<?php echo $alt_text; ?>" /></a>
                    <div class="main-post-content">
                        <div class="main-post-border">
                            <h4><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h4>
                            <p><?php $content = get_the_excerpt(); $trimmed_content = wp_trim_words( $content, 45); echo $trimmed_content; ?></p>
                            <a href="<?php the_permalink(); ?>" class="read-more">Read More</a>
                        </div>
                    </div>
                </div>
                <?php endwhile; ?> 

                <div class="loading">
                   <?php next_posts_link('Load More'); ?>
                </div>
                
                <?php endif; wp_reset_query(); ?>
            </div>
    </main>
<?php get_footer(); ?>
