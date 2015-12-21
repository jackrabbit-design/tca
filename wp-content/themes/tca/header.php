<?php echo get_template_part( 'inc-metahead' ); ?>
<meta name="google-site-verification" content="n6GDMaMxSNtsMw8FPgB6TWSFukNRtfgu2vxau9YgN0U" />
    <script type="text/javascript">var switchTo5x=true;</script>
	<script type="text/javascript" src="http://w.sharethis.com/button/buttons.js"></script>
	<script type="text/javascript">stLight.options({publisher: "cd2bc686-4dc4-4476-ac6c-41222b964bc7", doNotHash: false, doNotCopy: false, hashAddressBar: false});</script>
	<script>
		(function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
		(i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
		m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
		})(window,document,'script','//www.google-analytics.com/analytics.js','ga');
		ga('create', 'UA-10216094-1', 'auto');
		ga('send', 'pageview');
	</script>
</head>
<body <?php body_class(); ?>>
    <!--[if lte IE 7]><iframe src="unsupported.html" frameborder="0" scrolling="no" id="no_ie6"></iframe><![endif]-->
	<!--[if lt IE 9]><script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script><![endif]-->
	<header>
		<div class="top-header-wrapper">
			<div class="top-header clearfix">
				
				<div class="search-form-desk">
					<span class="search-icon"></span>
					<form role="search" method="get" id="search-desktop" class="searchform" action="<?php echo esc_url( home_url( '/') ); ?>">
						<input type="search" class="search" name="s" value="<?php the_search_query(); ?>"/>
					</form>
				</div>
				<nav>
					<ul>
						<?php if($phone = get_field('phone_number', 'options')) { ?><li><a href="tel:<?php echo $phone; ?>"><?php echo $phone; ?></a></li>
						<?php } if($pin = get_field('pinterest', 'options')) { ?><li><a href="<?php echo $pin; ?>" target="_blank" class="pinterest"><i class="social-pinterest"></i></a></li>
						<?php } if($linked = get_field('linkedin', 'options')) { ?><li><a href="<?php echo $linked; ?>" target="_blank"  class="linkedin"><i class="social-linkedin"></i></a></li>
						<?php } if($face = get_field('facebook', 'options')) { ?><li><a href="<?php echo $face; ?>" target="_blank"  class="facebook"><i class="social-facebook"></i></a></li>
						<?php } if($twitter = get_field('twitter', 'options')) { ?><li><a href="<?php echo $twitter; ?>" target="_blank"  class="twitter"><i class="social-twitter"></i></a></li>
						<?php } if($google = get_field('google', 'options')) {?><li><a href="<?php echo $google; ?>" target="_blank" class="googlePlus"><i class="social-googleplus"></i></a></li>
						<?php } if($insta = get_field('instagram', 'options')) {?><li><a href="<?php echo $insta; ?>" target="_blank" class="instagram"><i class="social-instagram"></i></a></li><?php } ?>
					</ul>
				</nav>
		
			</div>
		</div>
		<div class="main-header-wrapper">
			<div class="main-header clearfix <?php if(is_front_page()) { echo 'home-header'; } ?>">
		
					<a class="logo" href="<?php bloginfo('url'); ?>"> The Catered Affair</a>
			<?php $desktop = array( 'theme_location'  => 'Main Menu',
				'menu' => 'main-menu',
				'container' => 'nav',
				'container_class' => 'desktop',
				'menu_class' => 'menu',
				'echo' => true,
				'fallback_cb' => 'wp_page_menu',
				'items_wrap' => '<ul id="%1$s" class="%2$s">%3$s</ul>',
				'depth' => 0); wp_nav_menu($desktop); ?>

                <div id="toggle_menu_btn">menu</div>
                
				<nav class="mobile" style="display: none;" id="mobileNav" aria-hidden="true">
				
						<?php $mobile = array( 'theme_location'  => 'Main Menu',
				'menu' => 'main-menu',
				'menu_class' => 'mobile-menu',
				'menu_id' => 'mobileMenu',
				'container' => '',
				'echo' => true,
				'fallback_cb' => 'wp_page_menu',
				'items_wrap' => '<ul id="%1$s" class="%2$s">%3$s</ul>',
				'depth' => 0); wp_nav_menu($mobile); ?>
				
                    
                    <div class="m-search">
                    	<div class="inner-wrap">
                        	<form role="search" method="get" id="search-mobile" action="<?php echo esc_url( home_url( '/') ); ?>">
                                <ul>
                                    <li>
                                        <input type="search" class="search"  name="s" placeholder="Search" value="<?php the_search_query(); ?>"/>
                                     </li>
                                </ul>
                            </form>
                        </div>
                    </div>
                    
                    <div class="m-nav-contact">
                    	<span>781.982.9333</span>
						<?php if($pin = get_field('pinterest', 'options')) { ?>	   <a href="<?php echo $pin; ?>" target="_blank" ><i class="social-pinterest"></i></a>
						<?php } if($linked = get_field('linkedin', 'options')) { ?><a href="<?php echo $linked; ?>" target="_blank" ><i class="social-linkedin"></i></a>
                        <?php } if($face = get_field('twitter', 'options')) { ?><a href="<?php echo $face; ?>" target="_blank" ><i class="social-facebook"></i></a>
                        <?php } if($twitter = get_field('twitter', 'options')) { ?><a href="<?php echo $twitter; ?>" target="_blank" ><i class="social-twitter"></i></a>
                        <?php } if($google = get_field('google', 'options')) {?><a href="<?php echo $google; ?>" target="_blank" ><i class="social-googleplus"></i></a>
                        <?php } if($insta = get_field('instagram', 'options')) {?><li><a href="<?php echo $insta; ?>" target="_blank" class="googlePlus"><i class="social-googleplus"></i></a></li><?php } ?>
                        </div>
				</nav>
			</div>
		</div>
	</header>
	