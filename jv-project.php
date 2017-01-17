<?php
/*
Template Name: Project Page
*/
?>
<?php 
get_header(do_shortcode('[jv-header]'));
?>
<?php 
include("resize_img.php");
query_posts( array(
   	'post_type' => 'jv_projects',
   	'posts_per_page' => -1,
   	'order' => 'ASC',
   	'orderby'=>'order'
   ));
?>
<div id="primary" class="content-area">
    <div id="content" class="site-content">
        <div id="jv_projects">
           <div id="post-<?php the_ID(); ?>">
              <?php $categories = get_categories(array('taxonomy'=>'jv_projects_category', 'hide_empty'=>0));?>
                <div class="toolbar">
                    <ul class="post-categories filter">
                        <?php foreach($categories as $cat):?>
                        <li><span data-target=".<?php echo $cat->slug?>" title="<?php echo $cat->cat_name?>"><?php echo $cat->cat_name?></span></li>
                        <?php endforeach;?>
                    </ul>
                </div>
              <div id="container" >
              <?php if (have_posts()) : ?>
              <?php while (have_posts()) : the_post(); ?>
              <?php
        		$sluges = array();
                foreach(get_the_terms(get_the_ID() , 'jv_projects_category' ) as $cat)
                array_push($sluges, $cat->slug);
				$img_thumb = wp_get_attachment_url( get_post_thumbnail_id($post->ID));
				$ext = strrchr($img_thumb, '.');
				$resizeObj = new resize1($img_thumb);
				$resizeObj -> resizeImage(354,260,'crop');
				$resizeObj -> saveImage("wp-content/themes/goc/resize/".$post->ID.$ext, 100);
				$img=get_template_directory_uri()."/resize/".$post->ID.$ext;
                ?>
                 <div class="element <?php echo implode(' ',$sluges);?> isotope-item">
                   <a class="thumb" title="<?php echo get_the_title(); ?>"  href="<?php echo get_permalink()?>">
				   <img  src="<?php echo $img; ?>" alt="<?php echo get_the_title(); ?>" />
				   </a>
                    <h3><?php echo get_the_title(); ?></h3>
					 <div class="wpb_clear"></div>
                 </div>
                 <!-- end div.element -->      
              <?php endwhile; ?>
              <?php endif; ?>
              </div>
              <div class="wpb_clear"></div>
              <?php wp_reset_query(); ?> 
           </div>
        </div>
        <div class="wpb_clear"></div>
        <?php 
        /* Install script handle grid */
        wp_enqueue_style('jv-css-isotope', get_template_directory_uri().'/css/isotope.css');
        foreach(array('jv-js-isotope'=>'isotope.js','jv-js-custom'=>'custom.lib.js') as $k=>$script)
        wp_enqueue_script($k, join('/', array(get_template_directory_uri(),'js',$script)));
        ?>
    </div>
</div>
<?php  get_footer(); ?>