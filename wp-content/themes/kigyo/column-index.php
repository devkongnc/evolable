<?php
/**
 * The front page template file
 *
 * If the user has selected a static page for their homepage, this is what will
 * appear.
 * Learn more: https://codex.wordpress.org/Template_Hierarchy
 * Template Name: Column-index
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
        <h2><?php if (qtrans_getLanguage()=='ja'){ ?>
            News Release & Column
        <?php }else if (qtrans_getLanguage()=='vi'){ ?>
            News Release & Column
        <?php }else if (qtrans_getLanguage()=='en'){ ?>
            News Release & Column
        <?php } ?>
    </h2>
        <div class="container">
        <div class="row">
            <div class="col-md-12">
        <div class="bc-desc">
        <?php if (qtrans_getLanguage()=='ja'){ ?>
            近年、日本国内で働く外国人や、逆に国外で働く日本人の姿をよく見かけるようになりました。そんな背景などを盛り込みながらエボラブルアジアエージェントの概要を200文字くらいで説明した文章を入れようと思います。近年、日本国内で働く外国人や、逆に国外で働く日本人の姿をよく見かけるように
        <?php }else if (qtrans_getLanguage()=='vi'){ ?>
            近年、日本国内で働く外国人や、逆に国外で働く日本人の姿をよく見かけるようになりました。そんな背景などを盛り込みながらエボラブルアジアエージェントの概要を200文字くらいで説明した文章を入れようと思います。近年、日本国内で働く外国人や、逆に国外で働く日本人の姿をよく見かけるように
        <?php }else if (qtrans_getLanguage()=='en'){ ?>
            近年、日本国内で働く外国人や、逆に国外で働く日本人の姿をよく見かけるようになりました。そんな背景などを盛り込みながらエボラブルアジアエージェントの概要を200文字くらいで説明した文章を入れようと思います。近年、日本国内で働く外国人や、逆に国外で働く日本人の姿をよく見かけるように
        <?php } ?>
    </div>
        </div>
        </div>
        </div>
    </div>

    <div class="news-top">
        <div class="container">
        <div clss="row">
        <div class="col-md-12">
        <div class="title-blk">
            <h2 class="title-h">
            <?php if (qtrans_getLanguage()=='ja'){ ?>
                News Release
            <?php }else if (qtrans_getLanguage()=='vi'){ ?>
                News Release
            <?php }else if (qtrans_getLanguage()=='en'){ ?>
                News Release
            <?php } ?>
    </h2>
            <?php if (qtrans_getLanguage()=='ja'){ ?>
                <a href="<?php echo get_site_url(); ?>/ja/newsrelease" class="view-more-btn">一覧を見る</a>
            <?php }else if (qtrans_getLanguage()=='vi'){ ?>
                <a href="<?php echo get_site_url(); ?>/vi/newsrelease" class="view-more-btn">一覧を見る</a>
            <?php }else if (qtrans_getLanguage()=='en'){ ?>
               <a href="<?php echo get_site_url(); ?>/en/newsrelease" class="view-more-btn">一覧を見る</a>
            <?php } ?>

        </div>
        <?php
        global $post;

    $posts = get_posts( array(
        'posts_per_page' => 3,
        'post_type' => 'newsrelease',
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
        </div>
        </div>
        </div>
    </div>


   <div class="blog-section gray-bg">
        <div class="container">
        <div clss="row">
            <div class="col-md-12">
                <div class="title-blk">
                <h2 class="title-h"><?php if (qtrans_getLanguage()=='ja'){ ?>
                    求人者様向けコラム
                <?php }else if (qtrans_getLanguage()=='vi'){ ?> 
                    求人者様向けコラム
                <?php }else if (qtrans_getLanguage()=='en'){ ?> 
                   求人者様向けコラム
                <?php } ?>
            </h2>
                <a href="<?php echo str_replace("/top/".qtranxf_getLanguage()."/","/recruitment/".qtranxf_getLanguage()."/",get_site_url().'/'.qtranxf_getLanguage().'/columns'); ?>" class="view-more-btn">
                <?php if (qtrans_getLanguage()=='ja'){ ?>
                    一覧を見る
                <?php }else if (qtrans_getLanguage()=='vi'){ ?> 
                    一覧を見る
                <?php }else if (qtrans_getLanguage()=='en'){ ?> 
                   一覧を見る
                <?php } ?>
            </a>
                </div>
            </div>
        </div>
        <div clss="row">
            <div class="col-md-12">
                 <?php
                 switch_to_blog(2);
                global $post;
             
                $posts = get_posts( array(
                    'posts_per_page' => 3,
                    'post_type' => 'columns',
                    'post_status'=>'publish',
                    'orderby' => 'post_date',
                    'order' => 'DESC',
                ) );
             
                if ($posts) {
                    foreach ($posts as $post) : 
                        setup_postdata($post); ?>

                        <div class="blog-blk">
                
                        <img src="<?php echo get_the_post_thumbnail_url( null, 'post-thumbnail' );?>" >

                        <a href="<?php echo get_permalink($post->ID); ?>"><?php the_title(); ?></a>
                        
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
                 restore_current_blog(); 
            ?>
            </div>
        </div>
        </div>
   </div>

    <div class="blog-section">
        <div class="container">
        <div clss="row">
            <div class="col-md-12">
                <div class="title-blk">
                <h2 class="title-h">
                <?php if (qtrans_getLanguage()=='ja'){ ?>
                    企業様向けコラム
                <?php }else if (qtrans_getLanguage()=='vi'){ ?>
                    企業様向けコラム
                <?php }else if (qtrans_getLanguage()=='en'){ ?>
                   企業様向けコラム
                <?php } ?>
            </h2>
                <?php if (qtrans_getLanguage()=='ja'){ ?>
                    <a href="<?php echo get_site_url(); ?>/ja/column" class="view-more-btn">一覧を見る</a>
                <?php }else if (qtrans_getLanguage()=='vi'){ ?>
                    <a href="<?php echo get_site_url(); ?>/vi/column" class="view-more-btn">一覧を見る</a>
                <?php }else if (qtrans_getLanguage()=='en'){ ?>
                   <a href="<?php echo get_site_url(); ?>/en/column" class="view-more-btn">一覧を見る</a>
                <?php } ?>
                </div>
            </div>
        </div>
        <div clss="row">
            <div class="col-md-12">

                <?php
                global $post;

                $posts = get_posts( array(
                    'posts_per_page' => 2,
                    'post_type' => 'columns',
                    'post_status'=>'publish',
                    'orderby' => 'post_date',
                    'order' => 'DESC',
                ) );

                if ($posts) {
                    foreach ($posts as $post) :
                        setup_postdata($post); ?>

                        <div class="blog-blk">

                        <img src="<?php echo get_the_post_thumbnail_url( null, 'post-thumbnail' );?>" >

                        <a href="<?php echo get_permalink($post->ID); ?>"><?php the_title(); ?></a>

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

    <div class="blog-section gray-bg">
        <div class="container">
        <div clss="row">
            <div class="col-md-12">
                <div class="title-blk">
                <h2 class="title-h">Englist / Vietnamese Column</h2>
                <a href="#" class="view-more-btn">All</a>
                </div>
            </div>
        </div>
        <div clss="row">
            <div class="col-md-12">

                <div class="blog-blk">

                        <img src="<?php echo get_template_directory_uri(); ?>/new/img/img0.jpg" >
                        <a href="#">Lorem ipsum dolor sit amet, consectetur adipiscing</a>
                        <ul class="tags-list">
                            <li><a href="#">マネジメント</a></li>
                            <li><a href="#">建設／建築</a></li>
                            <li><a href="#">海外</a></li>
                            <li><a href="#">マネジメント</a></li>
                            <li><a href="#">マネジメント</a></li>
                            <li><a href="#">マネジメント</a></li>
                        </ul>
                        <p>
                            Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit
                        </p>
                        <span class="blog-date">― 2018.04.01 UPDATED</span>

                </div>
                <div class="blog-blk">

                        <img src="<?php echo get_template_directory_uri(); ?>/new/img/img0.jpg" >
                        <a href="#">Lorem ipsum dolor sit amet, consectetur adipiscing</a>
                        <ul class="tags-list">
                            <li><a href="#">マネジメント</a></li>
                            <li><a href="#">建設／建築</a></li>
                            <li><a href="#">海外</a></li>
                            <li><a href="#">マネジメント</a></li>
                            <li><a href="#">マネジメント</a></li>
                            <li><a href="#">マネジメント</a></li>
                        </ul>
                        <p>
                            Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit
                        </p>
                        <span class="blog-date">― 2018.04.01 UPDATED</span>

                </div>
            </div>
        </div>
        </div>
   </div>


   <div class="recommend-job">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h2>
                <?php if (qtrans_getLanguage()=='ja'){ ?>
                    おすすめの求人
                <?php }else if (qtrans_getLanguage()=='vi'){ ?>
                    おすすめの求人
                <?php }else if (qtrans_getLanguage()=='en'){ ?>
                    おすすめの求人
                <?php } ?>
            </h2>
            </div>
        </div>
        <div class="row">
            <?php
            switch_to_blog(2);
                global $post;

                $posts = get_posts( array(
                    'posts_per_page' => 8,
                    'post_type' => 'jobs',
                    'post_status'=>'publish',
                    'orderby'   => 'rand',
                ) );

                if ($posts) {
                    $taxonomies = array('job-location');
                $check_later = array();
                    global $wp_taxonomies;
                    foreach($taxonomies as $taxonomy){
                        if (isset($wp_taxonomies[$taxonomy])){
                            $check_later[$taxonomy] = false;
                        } else {
                            $wp_taxonomies[$taxonomy] = true;
                            $check_later[$taxonomy] = true;
                        }
                    }

                    $args       = array('hide_empty' => false);
                    $terms      = get_terms($taxonomies, $args );
                   // $i=4;
                    foreach ($posts as $key => $post) :


                        setup_postdata($post);
                        $term_positions = get_the_terms($post->ID, "job-position");
                        $term_locations = get_the_terms($post->ID, 'job-location');
                       // print_r($term_locations);

                        ?>

                        <div class="col-md-3 col-sm-6 recruit">

                <div class="job-blk">
                		<?php
                        	$custom = get_post_custom();
                        	$image = wp_get_attachment_image(get_post_meta($post->ID, 'default_image', true));
                        	if($image){
                        		echo $image;
                        	}else{
                        		echo '<img src="'.get_template_directory_uri().'/new/img/s2.jpg" >';
                        	}
                       	?>

                    <a href="<?php echo get_permalink($post->ID); ?>"><?php the_title(); ?></a>
                    <div class="job-if"><img src="<?php echo get_template_directory_uri(); ?>/new/img/icon-money.png" >
                        <?php

                       foreach ($custom['salary'] as $key => $value) {
                        //print_r($value);
                           //echo $value;
                           echo mb_strimwidth(wp_strip_all_tags($value), 0, 25, '...');
                       }

                            // if ( !is_null(get_field('salary')) ) :
                        //echo mb_strimwidth(wp_strip_all_tags(the_field('salary',$post->ID)), 0, 5, '...');
                          //  endif; ?></div>
                    <div class="job-if loca"><img src="<?php echo get_template_directory_uri(); ?>/new/img/icon-map.png" >
                        <?php
                            if($term_locations){
                            foreach ($term_locations as $location) {
                            echo $location->name . ", ";
                        } } ?>
                    </div>
                    <span class="job-date">― <?php the_modified_time('Y.m.d'); ?> UPDATE</span>
                </div>
            </div>

                    <?php

                    endforeach;
                    wp_reset_postdata();



                }

                restore_current_blog();
            ?>

            </div>
        </div>
    </div>
<?php get_footer();?>