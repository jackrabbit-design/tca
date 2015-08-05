<?php get_header(); ?>
<?php $herotext = get_field('hero_text'); $rows = get_field('hero_banner_images'); $rand_row = $rows[array_rand( $rows )]; $rand_row_image = $rand_row['images' ]; $image = wp_get_attachment_image_src( $rand_row_image, 'full' );?>
	<div class="video-wrapper" style="background: url(<?php echo $image[0]; ?>) no-repeat 50% 0;">
		<div class="text-wrapper">
				<div class="text-wrapper-inner">
					<?php echo '<h2>';  echo $herotext; '</h2>';  ?>
				</div>
				<a href="#home" class="scroll">Scroll To bottom</a>
		</div>
		<?php if(have_rows('home_page_video')) : ?>
		<video autoplay loop muted id="bgvid">
		<?php while(have_rows('home_page_video')) : the_row(); ?>
		<?php $file = get_sub_field('video_file'); //var_dump($file) ?> 
			<source src="<?php echo $file['url'];?>" type="<?php echo $file['mime_type'];?>">
			<?php endwhile; ?>
		</video>
		<?php endif; ?>
	</div>



    <main id="home">
    
    	<!--Start Home Tabs-->
	<?php $c = 1; $c2 = 1; if(have_rows('tabs')) : ?>
		<div class="home-tabs hm-pg-tabs">
			<div class="tabs-select">
				<ul>
				<?php while(have_rows('tabs')) : the_row();
	$Ttitle = get_sub_field('title'); ?>
					<li><a href="#tab-<?php echo $c; ?>" <?php if($c == 1) { echo 'class="current"'; } ?>><?php echo esc_html($Ttitle); ?></a></li>
				<?php $c++; endwhile; ?>
				</ul>
			</div>

			<div class="tab-container">
				<?php while(have_rows('tabs')) : the_row(); $Tcontent = get_sub_field('tab_content'); $Tlink = get_sub_field('tab_link'); ?>
				<div class="tab-content" id="tab-<?php echo $c2; ?>" <?php if($c2 == 1) { echo 'style="display: block;"'; } ?>>
					<?php echo $Tcontent; ?>
					<a href="<?php echo $Tlink; ?>" class="read-more green">Read More</a>
				</div>
				<?php $c2++; endwhile; ?>


			</div>
		</div>
		<!--End home tabs-->
    	<?php endif; ?>
<?php //Galler Vars
$gTitle = get_field('gallery_title');
$gSub = get_field('gallery_subhead'); ?>
        <div class="gallery">
			<div class="module">
				<a href="<?php echo get_permalink(51); ?>"><h2><span><?php echo $gTitle; ?></span></h2>
				<small><?php echo $gSub; ?></small></a>
			</div>
			<?php $galleryImages = get_field('gallery');
if($galleryImages) :
?>
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
			<?php wp_reset_postdata(); endif; ?>
			<div class="slide-nav-wrapper">
				<div class="slide-nav"></div>
			</div>
		</div>

        <div class="venues module desktop">

			<a href="<?php echo get_permalink(49); ?>"><h2><span>Venues</span></h2>
			<small>FIND YOUR PERFECT VENUE</small></a>
			<?php $homeVenues = get_field('venues'); 
				if($homeVenues) : 
			?>
			<ul>
			<?php foreach($homeVenues as $post) : setup_postdata($post);  ?>
				<li>
				<a href="<?php the_permalink(); ?>">
					<div class="thumbnail">
					<?php
						$imgSrc = get_post_thumbnail_id($post->ID); 
						$image = wp_get_attachment_image_src($imgSrc, 'venue-size'); 
						$alt_text = get_post_meta($imgSrc , '_wp_attachment_image_alt', true);
					?>
						<img src="<?php echo $image[0]; ?>" alt="<?php echo $alt_text; ?>" width="475" height="305"/>
					</div>
					<div class="venue-content"><span><?php the_title(); ?></span></div>
				</a>
				</li>
				<?php endforeach; wp_reset_postdata(); ?>
				<li>
					<a href="<?php echo get_permalink(49); ?>">
						<div class="thumbnail">
						<?php
							$image = get_field('venues_image'); 
							
						?>
							<img src="<?php echo $image['sizes']['venue-size']; ?>" alt="<?php echo $image['alt']; ?>" width="475" height="305"/>
						</div>
						<div class="venue-content"><span>All Venues</span></div>
					</a>
				</li>
			</ul>
			<?php endif; ?>
		</div>
        <div class="venues module mobile">

			<a href="<?php echo get_permalink(49); ?>"><h2><span>Venues</span></h2>
			<small>FIND YOUR PERFECT VENUE</small></a>
			<?php $homeVenuesm = get_field('venues'); 
				if($homeVenuesm) : 
			?>
			<ul>
				<?php foreach($homeVenuesm as $post) : setup_postdata($post);  ?>
								<li>
				<a href="<?php the_permalink(); ?>">
					<div class="thumbnail">
					<?php
						$imgSrc = get_post_thumbnail_id($post->ID); 
						$image = wp_get_attachment_image_src($imgSrc, 'venue-size'); 
						$alt_text = get_post_meta($imgSrc , '_wp_attachment_image_alt', true);
					?>
						<img src="<?php echo $image[0]; ?>" alt="<?php echo $alt_text; ?>" width="475" height="305"/>
					</div>
					<div class="venue-content"><span><?php the_title(); ?></span></div>
				</a>
				</li>
				<?php endforeach; wp_reset_postdata(); ?>
				
				<li>
					<a href="<?php echo get_permalink(49); ?>">
						<div class="thumbnail">
						<?php
							$image = get_field('venues_image'); 
							
						?>
							<img src="<?php echo $image['sizes']['venue-size']; ?>" alt="<?php echo $alt_text; ?>" width="475" height="305"/>
						</div>
						<div class="venue-content"><span>All Venues</span></div>
					</a>
				</li>
				
			</ul>
			<?php endif; ?>
		</div>
        
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


				<a href="<?php the_permalink(); ?>"><img src="<?php echo $image[0]; ?>" alt="<?php echo $alt_text; ?>" /></a>

				<div class="main-post-content">
					<div class="main-post-border">
						<h4><?php the_title(); ?> </h4>
						<p><?php $content = get_the_excerpt(); $trimmed_content = wp_trim_words( $content, 45); echo $trimmed_content; ?></p>
						<a href="<?php the_permalink(); ?>" class="read-more">Read More</a>
					</div>
				</div>
			</div>
			<?php endwhile; ?>
		</div>
		<?php endif; wp_reset_query(); ?>

		<div class="farm-to-fork ">
			<div class="module">
				<h2><span><a href="#"><?php echo esc_html(get_field('farm_main_title')); ?></a></span></h2>
				<small><?php echo esc_html(get_field('farm_subhead')); ?></small>
			</div>
					<?php $img = get_field('full_screen_photo'); ?>
			<a href="<?php the_field('farm_link'); ?>"><div class="full-banner" style="background-image:url(<?php echo $img['url']; ?>)"></div></a>
			<div class="mobile-banner">
			<?php $imgm = get_field('mobile_photo'); ?>
				<a href="<?php the_field('farm_link'); ?>"><img src="<?php echo $imgm['sizes']['blog-landing-size'];  ?>" alt="<?php $imgm['alt']; ?>" class="mobile"/></a>
			</div>


				<div class="main-post">

				<div class="main-post-content">
					<div class="main-post-border">
						<h4><?php echo esc_html(get_field('farm_title')); ?></h4>
						<p><?php echo esc_html(get_field('farm_excerpt')); ?></p>
						<a href="<?php the_field('farm_link'); ?>" class="read-more">Read More</a>
					</div>
				</div>


			</div>
		</div>

    </main>
<?php get_footer(); ?>