<?php get_header(); ?>
<!--body section-->
<div class="inr_drk_container">
	<div class="inrprd_container">
		<h1><?php single_cat_title(); ?></h1>
		<?php $y=1; ?>
        <?php if (have_posts()) : while (have_posts()) : the_post(); ?>  	
	        <div class="inrprd_box <?php if($y%4==0){ ?>last<?php } ?>">
	     
	        	<?php if(get_post_meta( get_the_ID(), 'best_products',true )){?><span class="bstslr">Bestseller</span><?php } ?>
	            <?php if(get_post_meta( get_the_ID(), 'featured_products',true )){?><span class="ftrd">Featured</span><?php } ?>
	        	<a href="<?php the_permalink(); ?>">
	        		<div class="inrprd_thumbbox">
	        			<?php if (has_post_thumbnail( get_the_ID() ) ){ ?>
				         <?php $image = wp_get_attachment_image_src( get_post_thumbnail_id( get_the_ID() ), 'fitness-product-small' ); ?>        
				         <img src="<?php echo $image[0]; ?>"  />
				        <?php } ?>
	        		</div>
	                
					<?php if(get_post_meta( get_the_ID(), 'brand_company_name',true )){?><div class="inrprd_incmpbox"><?php echo get_post_meta( get_the_ID(), 'brand_company_name',true ); ?></div><?php } ?>
					<?php 
					$Ctm_Tax = 'fitness_product_cat';
					$Cats = get_the_terms( $post->ID, $Ctm_Tax ); 
					foreach($Cats as $keys => $vals){ ?>
					<div class="inrprd_incatbox"><?php echo $vals->name; ?></div>
					<?php }	?>
					<div class="inrprd_ttlbox">
						<?php the_title(); ?>
					</div>
	            </a>
	        </div>
        <?php $y=$y+1; endwhile; else: ?>
		<h2><?php _e('Not Found') ?></h2>
		<p><?php _e('Sorry, no posts matched your criteria.'); ?></p>
		<?php endif; ?>
        <div class="clear"></div>
    </div>
</div>
<!--body section-->
<?php get_footer(); ?>