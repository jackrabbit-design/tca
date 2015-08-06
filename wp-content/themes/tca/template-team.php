<?php 
	/*Template Name: Team Page */ 
	get_header(); ?>

  <div class="team-header">
 		<div class="header-row row-bg"><img src="/ui/images/team/team-bg.jpg"/></div>
  		<div class="header-row row-three"><img src="/ui/images/team/mid-ground.png"/></div>
     	<div class="header-row row-two"><img src="/ui/images/team/front.png"/></div>
     	<div class="header-row row-one"><img src="/ui/images/team/chandy-front.png"/></div>
     	<div class="gradient"></div>
     


			<div class="team-slider">
				<div><img src="/ui/images/team/team-1.png"/></div>
				<div><img src="/ui/images/team/team-2.png"/></div>
				<div><img src="/ui/images/team/team-3.png"/></div>
				<div><img src="/ui/images/team/team-1.png"/></div>
				<div><img src="/ui/images/team/team-3.png"/></div>
			</div>


		
	</div>
	
	<div class="page-title">
		<h1><?php the_title(); ?></h1>
	</div>


	<div class="wrapper">
		
		<div class="team-bios">
			<div><div class="biography">
				<h3>Person 1</h3>
				<small>Boston Public Library General Manager</small>
				<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nam at scelerisque ante. Curabitur tincidunt eros id metus finibus aliquam. </p>
			</div></div>
			<div>
				<div class="biography">
					<h3>Person 2</h3>
					<small>Boston Public Library General Manager</small>
					<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nam at scelerisque ante. Curabitur tincidunt eros id metus finibus aliquam. </p>
				</div>
			</div>
			<div>
			<div class="biography">
				<h3>Person 3</h3>
				<small>Boston Public Library General Manager</small>
				<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nam at scelerisque ante. Curabitur tincidunt eros id metus finibus aliquam. </p>
			</div>
			</div>
			<div>
				<div class="biography">
					<h3>Person 4</h3>
					<small>Boston Public Library General Manager</small>
					<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nam at scelerisque ante. Curabitur tincidunt eros id metus finibus aliquam. </p>
				</div>
			</div>
			<div>
				<div class="biography">
					<h3>Person 5</h3>
					<small>Boston Public Library General Manager</small>
					<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nam at scelerisque ante. Curabitur tincidunt eros id metus finibus aliquam. </p>
				</div>
			</div>
		</div>

		
	
	<div class="team-controls">
      <button class="btn prev">Meet Previous</button>
      <button class="btn next">Next</button>
    </div>

    </div>
    <?php query_posts(array('post_type' => 'team-member')); if(have_posts()) : ?>
    <div id="full-team" class="clearfix">
    	<ul>
    		<?php while(have_posts()) : the_post(); ?>
    		<li>
    			<div class="headshot">
    				<img src="http://placehold.it/236x271"/>
    				<div class="hover">
    					<div class="hover-border">
    						<blockquote>Nothing is more perfect than a gin summer cocktail topped with refreshing lemon or lime</blockquote>
    					</div>
    				</div>
    			</div>
    			<div class="name">
    				<h4><?php the_title(); ?></h4>
    				<small><?php the_field('job_title'); ?></small>
    			</div>
    		</li>
    	<?php endwhile; ?>
    	<?php endif; wp_reset_query(); ?>


    	</ul>
    </div>
<?php get_footer(); ?>