<?php /*Template Name: Restaurant*/ get_header(); the_post(); ?>
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
    <?php if(have_rows('restaurants')) : ?>
        <div class="the-dish module restaurant">
			<?php while(have_rows('restaurants')) : the_row(); ?>
			<div class="main-post">
			<?php $img = get_sub_field('restaurant_image'); ?>
				<img src="<?php echo $img['sizes']['blog-landing-size'];?>" alt="<?php echo $img['alt']; ?>" />

				<div class="main-post-content">
					<div class="main-post-border">
						<h4><?php the_sub_field('name'); ?></h4>
						<?php the_sub_field('description'); ?>
						<a href="<?php  the_sub_field('restaurant_link'); ?>" class="read-more">Visit the <?php the_sub_field('name'); ?></a>
					</div>
				</div>
			</div>
			<?php  endwhile; ?>
        </div>
		<?php endif; ?>
    </main>

<?php get_footer(); ?>