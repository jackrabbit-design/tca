<?php /*Template Name: Search Blog*/ 

$termSelect = '';
if(isset($_GET['blog-categories'])){
	if($_GET['blog-categories'] != 'All'){
		$termSelect = $_GET['blog-categories'];
	}
}

$search = false;
	if(isset($_GET['search_keyword'])){
    $search = $_GET['search_keyword'];
}



get_header(); ?>

<?php if($imageSrc = get_post_thumbnail_id($post->ID)) {  $image = wp_get_attachment_image_src($imageSrc, 'interior-banner'); ?>
	<div id="inner-pg-banner" style="background-image:url(<?php echo $image[0]; ?>)" class="pg-banner">
<?php } else { $imageSrc = get_field('default_banner_image', 'options'); $image = wp_get_attachment_image_src($imageSrc, 'interior-banner'); ?>
	<div id="inner-pg-banner" style="background-image:url(<?php echo $image[0]; ?>)" class="pg-banner">
<?php } ?>
    	<h3>Search Results</h3>
        <div class="line" style="background-color:#675b79"></div>
    </div>
<main id="blog">
    	<div class="pg-rw-one">
        <?php the_content(); ?>
            
        </div>
    <?php get_template_part( 'inc-blog-search' ); ?>     
            
            <div class="blog-post module">  
                          <?php $paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
	                          	$dishArgs = array('post_type' => 'the-dishes', 'posts_per_page' => 10, 'paged' => $paged, 's' => $search, 'blog-category' => $termSelect);
	                          	$search = new WP_Query($dishArgs); 
	                       //   query_posts($dishArgs); 
	                          if($search->have_posts()) : while($search->have_posts()) : $search->the_post(); 
                          ?>
                <div class="main-post">
                <?php $img_id = get_post_thumbnail_id($post->ID); $image = wp_get_attachment_image_src($img_id, 'blog-landing-size');  $alt_text = get_post_meta($img_id , '_wp_attachment_image_alt', true); ?>
                    <img src="<?php echo $image[0]; ?>" alt="<?php echo $alt_text; ?>" />
                    <div class="main-post-content">
                        <div class="main-post-border">
                            <h4><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h4>
                            <?php the_excerpt(); ?>
                            <a href="<?php the_permalink(); ?>" class="read-more">Read More</a>
                        </div>
                    </div>
                </div>
                <?php endwhile; ?> 

                <div class="loading">
                   <?php next_posts_link('Load More'); ?>
                </div>
                
                <?php else : ?>
                
                Sorry No Posts 
                
                <?php endif; wp_reset_query(); ?>
            </div>
    </main>
<?php get_footer(); ?>