<?php
require('../../../wp-load.php');
$limit =  $_GET['limit'];
$offset = $_GET['offset'];
$num = $_GET['num'];
$termID = $_GET['hidTerm'];
$args = array('post_type'=>'fitness_product','tax_query'=>array(array('taxonomy'=>'fitness_product_cat','field'=>'id','terms'=>$termID,),),'showposts'=>$limit,'orderby'=>'menu_order','order'=>'ASC','offset'=>$offset);
$query = new WP_Query($args);
$cnt =1;
if($query->have_posts()){
while($query->have_posts()){
$query->the_post();
$my_cat = get_the_category($post->ID);
$atspons_id = get_post_meta($post->ID, '_sponsor_post_meta_id',true);
$is_access = get_post_meta($atspons_id, 'deactivate_sponsor', true);
$relink = get_post_meta($atspons_id, 'sposnor_redirect', true);
$at_spons = get_post($atspons_id);
?>
<li class="col-sm-3 box inrprd_box"> <a href="<?php the_permalink(); ?>">
  <div class="thumb">
    <?php $secondary_img = MultiPostThumbnails::get_post_thumbnail_url('fitness_product', 'secondary-featured-image',$post->ID); 			          if($secondary_img){ $getimage = $secondary_img; } else {  
		  $image = wp_get_attachment_image_src(get_post_thumbnail_id(get_the_ID()),'fitness-product-small');
		  $getimage = $image[0]; } ?>    
     <?php if($getimage){?>     
    <img src="<?php echo $getimage; ?>" alt="<?php the_title(); ?>"/>
    <?php } ?>
  </div>
  <div class="infobox">
    <h5><?php the_title(); ?></h5>
  </div>
  </a>
  <?php $meta = get_post_meta(get_the_ID()); ?>
  <?php if(get_post_meta(get_the_ID(),'best_products',true)){?>
  <span class="bestseller">Best Seller</span>
  <?php } ?>
  <?php if(get_post_meta(get_the_ID(),'featured_products',true)){?>
  <span class="feature">Featured</span>
  <?php } ?>
</li>
<?php $cnt++; } wp_reset_query(); } else { echo 'no'; } ?>
