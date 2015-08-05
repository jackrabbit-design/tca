<!DOCTYPE html>
<html lang="en" style="background: rgb(16, 16, 16);">
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=Edge"/><meta name="MSSmartTagsPreventParsing" content="true" />
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no target-densitydpi=device-dpi" />
    <title><?php wp_title(); ?></title>
    <!-- <link rel="stylesheet" type="text/css" href="//cdn.jsdelivr.net/jquery.slick/1.3.15/slick.css"/> -->
    <link rel="apple-touch-icon" sizes="57x57" href="<?php bloginfo('url'); ?>/ui/icons/apple-touch-icon-57x57.png">
	<link rel="apple-touch-icon" sizes="114x114" href="<?php bloginfo('url'); ?>/ui/icons/apple-touch-icon-114x114.png">
	<link rel="apple-touch-icon" sizes="72x72" href="<?php bloginfo('url'); ?>/ui/icons/apple-touch-icon-72x72.png">
	<link rel="apple-touch-icon" sizes="144x144" href="<?php bloginfo('url'); ?>/ui/icons/apple-touch-icon-144x144.png">
	<link rel="apple-touch-icon" sizes="60x60" href="<?php bloginfo('url'); ?>/ui/icons/apple-touch-icon-60x60.png">
	<link rel="apple-touch-icon" sizes="120x120" href="<?php bloginfo('url'); ?>/ui/icons/apple-touch-icon-120x120.png">
	<link rel="apple-touch-icon" sizes="76x76" href="<?php bloginfo('url'); ?>/ui/icons/apple-touch-icon-76x76.png">
	<link rel="apple-touch-icon" sizes="152x152" href="<?php bloginfo('url'); ?>/ui/icons/apple-touch-icon-152x152.png">
	<link rel="apple-touch-icon" sizes="180x180" href="<?php bloginfo('url'); ?>/ui/icons/apple-touch-icon-180x180.png">
	<link rel="shortcut icon" href="<?php bloginfo('url'); ?>/ui/icons/favicon.ico">
	<link rel="icon" type="image/png" href="<?php bloginfo('url'); ?>/ui/icons/favicon-192x192.png" sizes="192x192">
	<link rel="icon" type="image/png" href="<?php bloginfo('url'); ?>/ui/icons/favicon-160x160.png" sizes="160x160">
	<link rel="icon" type="image/png" href="<?php bloginfo('url'); ?>/ui/icons/favicon-96x96.png" sizes="96x96">
	<link rel="icon" type="image/png" href="<?php bloginfo('url'); ?>/ui/icons/favicon-16x16.png" sizes="16x16">
	<link rel="icon" type="image/png" href="<?php bloginfo('url'); ?>/ui/icons/favicon-32x32.png" sizes="32x32">
	<meta name="msapplication-TileColor" content="#00aba9">
	<meta name="msapplication-TileImage" content="<?php bloginfo('url'); ?>/ui/icons/mstile-144x144.png">
	<meta name="msapplication-config" content="<?php bloginfo('url'); ?>/ui/icons/browserconfig.xml">

    <link type="text/plain" rel="author" href="authors.txt" />
    <?php wp_head(); ?>
</head>
<body style="background: #000;">
	<div class="venue-popup-wrap">
	  <div class="close"><a href="/venues/">Close X</a></div>
    	<div class="venue-slider-wrap" id="<?php echo $post->post_name; ?>">
        
        	<div id="slides">
	            <div class="venue-slider slides-container">
	            <?php if(have_rows('images')) : while(have_rows('images')) : the_row(); ?>
	                
	                <?php $img = get_sub_field('image'); ?>
					
					<img src="<?php echo $img['sizes']['venue-large']; ?>" alt="<?php echo $img['alt']; ?>" />
					
	            <?php endwhile; endif; ?>
	            </div>
        	</div>
			<nav class="slides-navigation">
				<a href="#" class="next">Next</a>
				<a href="#" class="prev">Previous</a>
			</nav>
            <div class="topic-wrap">
            	<div class="venue-content" data-url="<?php the_field('venue_link'); ?>"><span><a href="<?php the_field('venue_link'); ?>" target="_blank"><h4><?php the_title(); ?></h4></a><?php the_content(); ?><a href="<?php the_field('venue_link'); ?>" <?php if(!get_field('dont_open_in_new_tab')) { ?>target="_blank"<?php } ?>>Venue Site</a></span></div>
            </div>
     
        </div>
        
    </div>
    <?php wp_footer(); ?>
</body>
</html>