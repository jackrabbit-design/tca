<?php if($terms = get_terms('gallery-category', array('orderby'=> 'title', 'order' => 'ASC'))) :  foreach($terms as $term) : ?>
<div style="display:none;">
	<div id="<?php echo $term->slug; ?>">
		<div class="cycle-slideshow">
		<?php query_posts(array('post_type' => 'gallery-image', 'posts_per_page' => -1)); if(have_posts()) : while(have_posts()) : the_post(); 
				$size = get_field('large_image_or_small_image');
				$img_id = get_post_thumbnail_id($post->ID);
				$imageLarge = wp_get_attachment_image_src($img_id, 'gallery-page-large'); 
				$full = wp_get_attachment_image_src($img_id, 'full');
				$imageSmall = wp_get_attachment_image_src($img_id, 'gallery-page-small'); 
				$alt_text = get_post_meta($img_id , '_wp_attachment_image_alt', true);
		?>
			<img src="<?php echo $full[0]; ?>" />
		
		
		<?php endwhile; endif; ?>
		</div>
	</div>
</div>
<?php endforeach; endif;?>