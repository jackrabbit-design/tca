<?php if(have_posts()) : while(have_posts()) : the_post(); ?>
<!DOCTYPE html>
<html lang="en" style="background:rgb(16, 16, 16);" >
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
   <?php $img_id = get_post_thumbnail_id($post->ID); $image = wp_get_attachment_image_src($img_id, 'full'); $alt_text = get_post_meta($img_id , '_wp_attachment_image_alt', true); ?>
<div class="gallery-popup-images gallerysingle" style="background: url(<?php echo $image[0]; ?>);">
        
             
<!-- 	               <img src=""  alt="<?php echo $alt_text; ?>"/> -->
				<div id="buttonsWrapper">
					<?php $prev_post = get_adjacent_post( true, '', false, 'gallery-category' ); ?>
					<?php if ( is_a( $prev_post, 'WP_Post' ) ) { ?>
						<a href="<?php echo get_permalink( $prev_post->ID ); ?>" class="prevbut"><span class="prev">Previous</span></a>
					<?php } ?>
					<a href="<?php bloginfo('url'); ?>/gallery/"><span>Back to Gallery</span></a>
					<?php $next_post = get_adjacent_post( true, '', true, 'gallery-category' ); ?>
						<?php if ( is_a( $next_post, 'WP_Post' ) ) {  ?>
							<a href="<?php echo get_permalink( $next_post->ID ); ?>" class="nextbut"><span class="next">Next</span></a>
						<?php } ?>
				
			
					<div class="social-share">
                    Share : <a href="http://pinterest.com/pin/create/button/?url=<?php the_permalink(); ?>&media=<?php echo $image[0]; ?>" class="pinterest"><i class="social-pinterest-round"></i></a> 
                            <a href="http://www.facebook.com/sharer/sharer.php?u=<?php the_permalink(); ?>"><i class="social-facebook"></i></a> 
                            <a href="https://twitter.com/intent/tweet?text=<?php the_title(); ?>&url=<?php the_permalink(); ?>&via=thecateredaffr"><i class="social-twitter"></i></a> 
                </div>
				</div>
				<?php if(get_field('photography_credit')) { ?> 
	                <div class="credits">
	                	<?php if($link = get_field('photography_credit_link')) { ?><a href="<?php echo $link; ?>" target="_blank"><?php } ?><p><?php the_field('photography_credit'); ?><p><?php if($link) { ?></a><?php } ?>
	                </div>
                <?php } ?>
            </div> <!--gallery-popup-images-->

<?php wp_footer(); ?>		
</body>
</html>
<?php endwhile; endif; ?>

