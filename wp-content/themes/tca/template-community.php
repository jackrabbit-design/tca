<?php 
	/*Template Name: Community*/
	get_header(); the_post(); ?>
<?php if($imageSrc = get_post_thumbnail_id($post->ID)) {  $image = wp_get_attachment_image_src($imageSrc, 'interior-banner'); ?>
	<div id="inner-pg-banner" style="background-image:url(<?php echo $image[0]; ?>)" class="pg-banner">
<?php } else { $imageSrc = get_field('default_banner_image', 'options'); $image = wp_get_attachment_image_src($imageSrc, 'interior-banner'); ?>
	<div id="inner-pg-banner" style="background-image:url(<?php echo $image[0]; ?>)" class="pg-banner">
<?php } ?>
    	<h2><?php the_title(); ?></h2>
        <div class="line" style="background-color:#675b79"></div>
    </div>
    
        <main id="event">
  		<section class="event-copy clearfix">
			<article>
				<?php the_content(); ?>
			</article>			
			<aside>
				<blockquote><?php the_field('call_out_text'); ?></blockquote>
			</aside>	
		</section>	
		<?php if(have_rows('logos')) : ?>
		<section class="community-logos">
			<ul>
			<?php while(have_rows('logos')) : the_row(); 
				$logo = get_sub_field('logo');
			?>
				<li><a href="<?php the_sub_field('url'); ?>"><img src="<?php echo $logo['sizes']['medium']; ?>" alt="<?php echo $logo['alt']; ?>"/></a></li>
				<?php endwhile; ?>
			</ul>
		</section>
		<?php endif; ?>
	<?php $homeVenues = get_field('venues'); 
				if($homeVenues) : 
			?>
        <div class="venues module desktop">

			<h2><span>Venues</span></h2>
			<small>FIND YOUR PERFECT VENUE</small>
		
			<ul>
			<?php foreach($homeVenues as $post) : setup_postdata($post);  ?>
				<li>
				<a href="<?php the_permalink(); ?>">
					<div class="thumbnail">
					<?php
						$imgSrc = get_post_thumbnail_id($post->ID); // This gets just the ID of the img
						$image = wp_get_attachment_image_src($imgSrc, 'venue-size'); // Get URL of the image, and size can be set here too (same as with get_the_post_thumbnail, I think)
						$alt_text = get_post_meta($imgSrc , '_wp_attachment_image_alt', true);
					?>
						<img src="<?php echo $image[0]; ?>" alt="<?php echo $alt_text; ?>" width="475" height="305"/>
					</div>
					<div class="venue-content"><span><?php the_title(); ?></span></div>
				</a>
				</li>
				<?php endforeach; wp_reset_postdata(); ?>
			</ul>
			
		</div>
		<?php endif; ?>
			<?php $homeVenues = get_field('venues'); 
				if($homeVenues) : 
			?>
        <div class="venues module mobile">

			<h2><span>Venues</span></h2>
			<small>FIND YOUR PERFECT VENUE</small>
		
			<ul>
				<?php foreach($homeVenues as $post) : setup_postdata($post);  ?>
				<li>
				<a href="<?php the_permalink(); ?>">
					<div class="thumbnail">
					<?php
						$imgSrc = get_post_thumbnail_id($post->ID); // This gets just the ID of the img
						$image = wp_get_attachment_image_src($imgSrc, 'venue-size'); // Get URL of the image, and size can be set here too (same as with get_the_post_thumbnail, I think)
						$alt_text = get_post_meta($imgSrc , '_wp_attachment_image_alt', true);
					?>
						<img src="<?php echo $image[0]; ?>" alt="<?php echo $alt_text; ?>" width="475" height="305"/>
					</div>
					<div class="venue-content"><span><?php the_title(); ?></span></div>
				</a>
				</li>
				<?php endforeach; wp_reset_postdata(); ?>
			</ul>
			
		</div>
		<?php endif; ?>
       
       			<?php $galleryImages = get_field('gallery');
if($galleryImages) :
?>
        <?php //Galler Vars

$gTitle = get_field('gallery_title');
$gSub = get_field('gallery_subhead'); ?>
        <div class="gallery">
			<div class="module">
				<h2><span><?php echo $gTitle; ?></span></h2>
				<small><?php echo $gSub; ?></small>
			</div>

			<div class="home-slider">
				<?php foreach($galleryImages as $post) :
					setup_postdata($post); 
					$imgSrc = get_post_thumbnail_id($post->ID);
					$image = wp_get_attachment_image_src($imgSrc,'gallery-large');
					$alt =  get_post_meta($imgSrc , '_wp_attachment_image_alt', true);

?>

					<div><img src="<?php echo $image[0]; ?>"  alt="<?php echo $alt; ?>"/></div>
				<?php endforeach; ?>
			</div>
			<?php wp_reset_postdata(); ?>
			<div class="slide-nav-wrapper">
				<div class="slide-nav"></div>
			</div>
		</div>
		<?php  endif; ?>
       
		<?php if(get_field('farm_main_title')) { ?>
			<div class="the-dish module">
			
				<?php if($link = get_field('headline_main_link')) { ?><a href="<?php echo $link; ?>"><?php } ?><h2><span><?php echo esc_html(get_field('farm_main_title')); ?></span></h2>
					<small><?php echo esc_html(get_field('farm_subhead')); ?></small><?php if($link) { ?></a><?php } ?>
					<?php $img = get_field('full_screen_photo'); ?>
					<div class="full-banner" style="background-image:url(<?php echo $img['sizes']['blog-landing-size']; ?>)">
					
					</div>
					<div class="mobile-banner">
					<?php $imgm = get_field('mobile_photo'); ?>
						<img src="<?php echo $imgm['sizes']['blog-landing-size'];  ?>" alt="<?php echo $imgm['alt']; ?>" class="mobile"/>
					</div>
					
					<div class="main-post">
					
						<div class="main-post-content">
							<div class="main-post-border">
							<h4><?php echo esc_html(get_field('farm_title')); ?></h4>
							<?php echo get_field('farm_excerpt'); ?>
							<a href="<?php the_field('farm_link'); ?>" class="read-more">Read More</a>
							</div>
						</div>
				
				
					</div>
			</div>
		 <?php } else { ?>
		   <?php
$dishArgs = array('post_type' => 'the-dishes', 'posts_per_page' => 1);
query_posts($dishArgs); if(have_posts()): ?>
        <div class="the-dish module">
			<a href="<?php echo get_permalink(53); ?>"><h2><span>The Dish</span></h2>
			<small>WHAT'S HAPPENING AT TCA</small></a>
			<?php while(have_posts()) : the_post(); ?>
			<div class="main-post">
				<?php
				$imgSrc = get_post_thumbnail_id($post->ID); 
				$image = wp_get_attachment_image_src($imgSrc, 'blog-landing-size'); 
				$alt_text = get_post_meta($image , '_wp_attachment_image_alt', true); ?>


				<img src="<?php echo $image[0]; ?>" alt="<?php echo $alt_text; ?>" />

				<div class="main-post-content">
					<div class="main-post-border">
						<h4><?php the_title(); ?> </h4>
						<?php the_excerpt(); ?>
						<a href="<?php the_permalink(); ?>" class="read-more">Read More</a>
					</div>
				</div>
			</div>
			<?php endwhile; ?>
		</div>
		<?php endif; wp_reset_query(); ?>
		 
		 
		 <?php } ?>
    </main>
<?php get_footer(); ?>