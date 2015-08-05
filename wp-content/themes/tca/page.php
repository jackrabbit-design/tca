<?php get_header(); the_post(); ?>
<?php if($imageSrc = get_post_thumbnail_id($post->ID)) {  $image = wp_get_attachment_image_src($imageSrc, 'interior-banner'); ?>
	<div id="inner-pg-banner" style="background-image:url(<?php echo $image[0]; ?>)" class="pg-banner">
<?php } else { $imageSrc = get_field('default_banner_image', 'options'); $image = wp_get_attachment_image_src($imageSrc, 'interior-banner'); ?>
	<div id="inner-pg-banner" style="background-image:url(<?php echo $image[0]; ?>)" class="pg-banner">
<?php } ?>
    	<h2><?php the_title(); ?></h2>
        <div class="line" style="background-color:#675b79"></div>
    </div>
   <main id="default">
        <div class="post-content general">
        	<?php the_content(); ?>
        </div>
    
    
    </main>

<?php get_footer(); ?>