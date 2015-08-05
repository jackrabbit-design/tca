    <?php if(!is_page(55)) { echo get_template_part( 'inc-contact' ); } ?>     
	<footer>	
			<div class="footer-inner clearfix">
				<div class="address-box">
					<div class="address address-one">
						<h6>Main Office</h6>
						<table cellpadding="0" cellspacing="0">
							<tr>		
								<td>PHONE <br/></td>
								<td><a href="tel:<?php the_field('phone_number_1','options'); ?>"><?php the_field('phone_number_1_display', 'options'); ?></a></td>
							</tr>
							<tr>
								<td>FAX</td>
								<td><a href="tel:<?php the_field('phone_number_2','options'); ?>"><?php the_field('phone_number_2_display', 'options'); ?></a></td>
							</tr>
						</table>
					</div>
					<div class="address address-two">
						<h6><?php the_field('location_one','options'); ?></h6>
						<p><?php the_field('address_box_one','options'); ?></p>
					</div>
					<div class="address address-three">
						<h6><?php the_field('location_two','options'); ?></h6>
						<p><?php the_field('address_box_two','options'); ?></p>
					</div>
						<div class="address address-three">
						<h6><?php the_field('location_three','options'); ?></h6>
						<p><?php the_field('address_box_three','options'); ?></p>
					</div>
				</div>
				<div class="cater-logo">
				<?php $image = get_field('footer_logo','options'); ?>
					<a href="<?php the_field('footer_logo_link','options'); ?>">
						<img src="<?php echo $image['sizes']['footer-lead']; ?>" alt="<?php echo $image['alt']; ?>" />
					</a>
				</div>
			</div>
			<div class="footer-inner clearfix">
				<div class="footer-left">
					<p>&copy; <?php echo date('Y'); ?> The Catered Affair. All rights reserved.</p>


				</div>
					<div class="footer-right">
						<a href="http://www.jumpingjackrabbit.com" title="Website Design by Jackrabbit" target="_blank" class="grey">Website Design</a> by <a href="http://www.jumpingjackrabbit.com" title="Website Design by Jackrabbit" target="_blank">Jackrabbit</a>
					</div>
			</div>
        
    	</footer>
        <?php wp_footer(); ?>
	    <script>
			$(document).ready(function(e) {
	            // Resize COLORBOX
				$(window).resize(function(){
					if( $(window).innerWidth() < 980 ){		
						$.colorbox.resize({
							maxWidth:"auto",
							width:95+'%',
						});
					}
				});
	        });
	    	// auto popup contact
			$('.contact-popup').colorbox({
				inline:true, 
				width:95+"%",
				maxWidth:942+'px',
				height:'auto',
				scrolling: false,
				onComplete: function() {
					$('#cboxOverlay').addClass('colorbox-contact');
					$('#colorbox').addClass('colorbox-contact');
				}
			});
	    </script>   

</body>
</html>