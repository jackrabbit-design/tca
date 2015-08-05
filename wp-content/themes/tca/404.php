<?php get_header(); the_post(); ?>
<?php  $imageSrc = get_field('default_banner_image', 'options'); $image = wp_get_attachment_image_src($imageSrc, 'interior-banner'); ?>
	<div id="inner-pg-banner" style="background-image:url(<?php echo $image[0]; ?>)" class="pg-banner">

    	<h2>404</h2>
        <div class="line" style="background-color:#675b79"></div>
    </div>
   <main id="default">
        <div class="post-content general">
        	<h4>Oops...</h4>
        	<p>We're sorry, the page you're looking for couldn't be found.</p>
        </div>
    
    
    </main>

<?php get_footer(); ?>
