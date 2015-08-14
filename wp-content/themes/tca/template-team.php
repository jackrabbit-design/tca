<?php 
	/*Template Name: Team Page */ 
	get_header(); ?>

  <div class="team-header">
 		<div class="header-row row-bg"></div>
  		<div class="header-row row-three"></div>
     	<div class="header-row row-two"></div>
     	<div class="header-row row-one"></div>
     	<div class="gradient"></div>
     

   <?php query_posts(array('post_type' => 'team-member', 'posts_per_page' => '-1', 'team-category' => 'management')); if(have_posts()) : ?>
			<div class="team-slider">
				<?php while(have_posts()): the_post();
					$image = wp_get_attachment_image_src(get_post_thumbnail_id($post->ID), 'full'); 
				 ?>

				<div><img src="<?php echo $image[0]; ?>"/>
					<div class="hover"><span><p><?php the_field('manager_quote'); ?></p> <small><?php the_field('manager_quote_sub'); ?></small></span></div>
				</div>
				<?php endwhile; ?>
			</div>
		<?php endif; wp_reset_query(); ?>

		
	</div>
	
	<div class="page-title">
		<h1><?php the_title(); ?></h1>
		<div class="team-controls">
	      <button class="btn prev hide"></button>
	      <button class="btn next"></button>
	    </div>
		
	</div>


	<div class="wrapper">
		<?php query_posts(array('post_type' => 'team-member', 'posts_per_page' => '-1', 'team-category' => 'management')); if(have_posts()) : ?>
		<div class="team-bios">
			<?php while(have_posts()) : the_post(); ?>
			<div><div class="biography">
				<h3><?php the_title(); ?></h3>
				<small><?php the_field('job_title'); ?></small>
				<?php the_content(); ?>
			</div></div>

			<?php endwhile; ?>
			
		</div>
		
		<div class="team-controls-btm">
	      <button class="btn prev hide">Previous</button>
	      <button class="btn next">Next </button>
	    </div>
	
	<?php endif;  wp_reset_query(); ?>

    </div>
    <?php query_posts(array('post_type' => 'team-member', 'posts_per_page' => '-1', 'team-category' => 'non-managment')); if(have_posts()) : ?>
    <div id="full-team" class="clearfix">
    	<ul>
    		<?php while(have_posts()) : the_post(); ?>
    		<li>
    			<div class="headshot">
    				<?php
					$img_id = get_post_thumbnail_id($post->ID); 
					$image = wp_get_attachment_image_src($img_id, 'headshot');  ?>
    				<img src="<?php echo $image[0]; ?>" alt="<?php the_title(); ?>"/>
    				<div class="hover">
    					<div class="hover-border">
    						<blockquote><?php echo get_the_content(); ?></blockquote>
    					</div>
    				</div>
    			</div>
    			<div class="name">
    				<h4><?php the_title(); ?></h4>
    				<small><?php the_field('job_title'); ?></small>
    			</div>
    		</li>
    	<?php endwhile; ?>
    	</ul>
    </div>
    <?php endif; wp_reset_query(); ?>
	<?php if(have_rows('team_slider')) : ?>
	<div id="big-team" class="module">
		<?php while(have_rows('team_slider')) : the_row(); 
			$manimage = get_sub_field('photo');
		?>
		<div>
				<img src="<?php echo $manimage['sizes']['blog-landing-size']; ?>" alt="<?php the_sub_field('title'); ?>">

				<div class="main-post-content">
					<div class="main-post-border">
						<h4><?php the_sub_field('title'); ?></h4>
						<p><?php the_sub_field('text'); ?></p>
					</div>
				</div>
		</div>
	<?php endwhile; ?>

	
	</div>
<?php endif; ?>

<?php get_footer(); ?>