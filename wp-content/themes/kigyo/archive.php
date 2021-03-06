<?php 
/**
 * The front page template file
 *
 * If the user has selected a static page for their homepage, this is what will
 * appear.
 * Learn more: https://codex.wordpress.org/Template_Hierarchy
 *
 * @package WordPress
 * @subpackage Twenty_Seventeen
 * @since 1.0
 * @version 1.0
 */


get_header();
get_sidebar();
?>
<div class="right-content">
    <div class="breadcrumb-bg">
        <h2>
            <?php if (qtrans_getLanguage()=='ja'){ ?>
                企業向けコラム
            <?php }else if (qtrans_getLanguage()=='vi'){ ?> 
                企業向けコラム
            <?php }else if (qtrans_getLanguage()=='en'){ ?> 
                企業向けコラム
            <?php } ?>
        </h2>
    </div>
    
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <?php if ( has_nav_menu( 'topmenu' ) ) : ?>
                    <?php get_template_part( 'template-parts/navigation/navigation', 'topmenu' ); ?>
                <?php endif; ?>
            </div>
        </div>
    </div>

    <div class="blog-section">
        <div class="container">
        <div clss="row">
            <div class="col-md-12">
            <?php
	if ( is_single() ) {
$cats =  get_the_category();
 $cat = $cats[0]; // let's just assume the post has one category
}
else { // category archives
$cat = get_category( get_query_var( 'cat' ) );

}
@$cat_id = $cat->term_id;
@$cat_name = $cat->name;
@$cat_slug = $cat->slug;
?>
<?php
    global $post;
 
    $posts = get_posts( array(
        'posts_per_page' => 7,
        'post_type' => 'newsrelease',
        'category' => $cat_id,
        'post_status'=>'publish',
        'orderby' => 'post_date',
        'order' => 'DESC',
    ) );

    if ($posts) { ?>
 <ul class="news-list">
    <?php
        foreach ($posts as $post) : 
            setup_postdata($post); ?>
            
            
            <li>
                <label class="news-date"><?php echo get_the_date('Y.m.d'); ?></label>
                <ul class="categories-list">
                    <?php 
                        foreach((get_the_category()) as $key => $category) { 
                            $category_link = get_category_link($category->cat_ID); ?>
                            <li><a class="<?php echo ($key%2) ? "blue" : "pink"; ?>" href="<?php echo $category_link; ?>"><?php echo $category->cat_name; ?></a></li>
                            
                    <?php } ?>
                </ul>
                <a href="<?php echo get_permalink(); ?>" class="news-title"><?php the_title(); ?></a>
            </li>
   
        <?php
        endforeach;
        wp_reset_postdata();
        echo '</ul>';
    }
?>         
<!-- newrelease -->
<?php
    global $post;
 
    $posts = get_posts( array(
        'posts_per_page' => 7,
        'post_type' => 'columns',
        'category' => $cat_id,
        'post_status'=>'publish',
        'orderby' => 'post_date',
        'order' => 'DESC',
    ) );
 
    if ($posts) {
        foreach ($posts as $post) : 
            setup_postdata($post); ?>

            <div class="blog-blk">
    
            <img src="<?php echo get_the_post_thumbnail_url( null, 'post-thumbnail' );?>" >
            <a href="<?php echo get_permalink(); ?>"><?php the_title(); ?></a>
            
            <ul class="tags-list">
                <?php 
            foreach((get_the_category()) as $key => $category) { 
                $category_link = get_category_link($category->cat_ID); ?>
                
                <li>
                    <a href="<?php echo $category_link; ?>" class="catlink" data-id="<?php echo $category->cat_ID; ?>"><?php echo $category->cat_name; ?></a>
        </li>
                
        <?php   } 
        ?>

               
            </ul>
            <p>
            <?php echo mb_strimwidth(wp_strip_all_tags(get_the_content($post->post_content)), 0, 150, '...'); ?>
               
            </p>
            <span class="blog-date">― <?php the_modified_time('Y.m.d'); ?> UPDATED</span>
    
    </div>


            
        <?php
        endforeach;
        wp_reset_postdata();
    }
?>  
            </div>
        </div>
        
        
        
        
        </div>
   </div> 
  
<?php get_footer();?>