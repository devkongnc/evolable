<?php 
/**
 * The front page template file
 *
 * If the user has selected a static page for their homepage, this is what will
 * appear.
 * Learn more: https://codex.wordpress.org/Template_Hierarchy
 * Template Name: Company-top
 * @package WordPress
 * @subpackage Twenty_Seventeen
 * @since 1.0
 * @version 1.0
 */

get_header();
get_sidebar();
?>
    <div class="right-content">
    
    <div class="top-intro2">
        <div class="container">
        <div class="row">
        <div class="col-md-12">
        <?php if (qtrans_getLanguage()=='ja'){ ?>
            <h1>CREATE BORDERLESS</h1>
            <h1>WORKING OPPORTUNITY</h1>
            <p>日本国内の人材採用・グローバル人材 
            <br>日本国内での人材採用に加えグローバルマーケットで 
            <br>活躍いただける人材の採用についてもサポートいたします。 </p>
        <?php }else if (qtrans_getLanguage()=='vi'){ ?> 
            <h1>CREATE BORDERLESS</h1>
            <h1>WORKING OPPORTUNITY</h1>
            <p>日本国内の人材採用・グローバル人材 
            <br>日本国内での人材採用に加えグローバルマーケットで 
            <br>活躍いただける人材の採用についてもサポートいたします。 </p>
        <?php }else if (qtrans_getLanguage()=='en'){ ?> 
            <h1>CREATE BORDERLESS</h1>
            <h1>WORKING OPPORTUNITY</h1>
            <p>日本国内の人材採用・グローバル人材 
            <br>日本国内での人材採用に加えグローバルマーケットで 
            <br>活躍いただける人材の採用についてもサポートいたします。 </p>
        <?php } ?>
        </div>
        </div>
        </div>
    </div>
    
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <ul class="btn-section">
                    <li><a class="current" href="#">会社情報</a></li>
                    <li><a href="#">3つの強み</a></li>
                    <li><a href="#">INTERVIEW</a></li>
                    <li><a href="#">企業様向けコラム</a></li>
                    <li><a href="#">お問い合わせ</a></li>
                </ul>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="special-p">
                    <div class="col-md-5">
                        <img src="<?php echo get_template_directory_uri(); ?>/new/img/p3.jpg" >
                    </div>
                    <div class="col-md-7">
                        <h2>私たちができること。</h2>
                        <p>人材を必要とされるお客様の専門的なご相談にも応じられるように、 各業界・職種に専門特化しています。 
<br>業界出身のコンサルタントも多く在籍しており、 詳しい知識や自身の経験を活かした転職サポートができる体制を構築。 
<br>業界出身者にしか分からないような転職活動や キャリアに関する悩み・疑問など、様々なご相談を承っております。 
<br>海外のほうにもたくさんのお客様がおり、世界と日本をつなぐ 充実した人材探しが実現できます。 
<br>転職活動の始まりから転職後まで、 転職のプロがあなたのパートナーとしてきめ細かいサポートを提供いたします。
</p>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="center">
                    <div class="sub-desc">
                        <?php if (qtrans_getLanguage()=='ja'){ ?>
                            どんな採用ニーズをお持ちですか？　まずはご相談ください。
                        <?php }else if (qtrans_getLanguage()=='vi'){ ?> 
                            どんな採用ニーズをお持ちですか？　まずはご相談ください。
                        <?php }else if (qtrans_getLanguage()=='en'){ ?> 
                            どんな採用ニーズをお持ちですか？　まずはご相談ください。
                        <?php } ?>

                    </div>
                    <a href="#" class="big-btn">お問い合わせ、ご相談はこちらからお願いいたします</a>
                </div>
            </div>
        </div>
  </div>
   
   
    
    <div class="feature-top style2">
        <div class="container">
        <div clss="row">
        <div class="col-md-12">
            <div class="center">
                <h2 class="title-br"><?php echo get_field('title_service'); ?></h2>
            </div>
        </div>
        </div>
        <div clss="row">
            <div class="col-md-4">
                <div class="feature-blk">
                    <h3><?php echo get_field('title_service1'); ?></h3>
                    <?php
                         $image1 = get_field('image_service1');
                         $imageAlt = esc_attr($image1['alt']); 
                         $imageURL = esc_url($image1['url']); 
                         $imageThumbURL = esc_url($image1['sizes']['medium']); 
                    ?>
                <img src="<?php echo $imageThumbURL;?>">
                    <p><?php echo get_field('content_service1'); ?></p>
                </div>
            </div>
            <div class="col-md-4">
                <div class="feature-blk">
                    <h3><?php echo get_field('title_service2'); ?></h3>
                    <?php
                         $image1 = get_field('image_service2');
                         $imageAlt = esc_attr($image1['alt']); 
                         $imageURL = esc_url($image1['url']); 
                         $imageThumbURL = esc_url($image1['sizes']['medium']); 
                    ?>
                <img src="<?php echo $imageThumbURL;?>">
                    <p><?php echo get_field('content_service2'); ?></p>
                </div>
            </div>
            <div class="col-md-4">
                <div class="feature-blk">
                    <h3><?php echo get_field('title_service3'); ?></h3>
                    <?php
                         $image1 = get_field('image_service3');
                         $imageAlt = esc_attr($image1['alt']); 
                         $imageURL = esc_url($image1['url']); 
                         $imageThumbURL = esc_url($image1['sizes']['medium']); 
                    ?>
                <img src="<?php echo $imageThumbURL;?>">
                    <p><?php echo get_field('content_service3'); ?></p>
                </div>
            </div>
        </div>
        <div clss="row">
        <div class="col-md-12">
            <div class="center">
                <?php echo get_field('button_service'); ?>
                
            </div>
        </div>
        </div>
        </div>
    </div>
    
    <div class="interview-top">
            
                    <?php
            global $post;
            $posts = array(
                'post_type'         => 'interviews',
                'posts_per_page'    => 1,
                'post_status'=>'publish',
                'orderby'           => 'date',
                'order'             => 'ASC',
                'meta_query' => array(
                    array(
                        'key'     => 'interviews-candidate',
                        'value'   => 'customer',
                    ),
                ),
            );
            $query = new WP_Query( $posts );
            if ( $query->have_posts() ) {
            $query->the_post();
                $thumb_id = get_post_thumbnail_id($post->ID);
                    $image_thumb1 = wp_get_attachment_image_src( $thumb_id, 'thumb-interview-page' );
                    $image_thumb2 = wp_get_attachment_image_src( $thumb_id, 'thumb-news-index' );
                    $image_full = wp_get_attachment_image_src( $thumb_id, 'medium' );

                    $image_src = "";
                    if($thumb_id != ""){
                        $image_src = $image_thumb1[0];
                    }else{
                        $image_src = get_template_directory_uri() ."/images/avatar_1.jpg";
                    }

                    $position = '';
                    if (get_field('position') !== false){
                        $position = get_field('position');
                    }
                     $termCompany = get_the_terms($post->ID, "interviews-company");
                    // print_r($termCompany);
                    $link = get_post_meta($post->ID, '_eaa_interview_link_value', true);
                    
                ?>
                <div class="inter-big" style="background:url(<?php echo $image_src ;?>) no-repeat top left;background-size:cover;">
                <div class="inter-big-overlay">
                    <a href="<?php echo get_permalink($post->ID); ?>"><?php echo get_the_title($post->ID); ?></a>
                    <p><?php echo mb_strimwidth(wp_strip_all_tags(get_the_content($post->ID)), 0, 80, '...'); ?></p>
                    <div class="inter-big-name">
                        <label><?php echo get_the_title($post->ID); ?></label>
                        <span><?php echo $termCompany[0]->name; ?></span>
                    </div>
                </div>
                    <?php   
            wp_reset_postdata();
            }
        ?>
                
            </div>
            <div class="inter-bg">
                <div class="title-blk">
                    <h2>
                    <?php if (qtrans_getLanguage()=='ja'){ ?>
                        インタビュー
                    <?php }else if (qtrans_getLanguage()=='vi'){ ?> 
                        インタビュー
                    <?php }else if (qtrans_getLanguage()=='en'){ ?> 
                        インタビュー
                    <?php } ?>
                    </h2>
                <a href="#" class="view-more-btn no-bg">一覧を見る</a>
                </div>
                <div class="inter-list">
                <?php
                global $post;
            $posts = array(
                'post_type'         => 'interviews',
                'posts_per_page'    => 2,
                'post_status'=>'publish',
                'orderby'           => 'date',
                'order'             => 'DESC',
                'meta_query' => array(
                    array(
                        'key'     => 'interviews-candidate',
                        'value'   => 'customer',
                    ),
                ),
                
            );
            $query = new WP_Query( $posts );
            if ( $query->have_posts() ) {
            while ( $query->have_posts() ) : $query->the_post();
                $thumb_id = get_post_thumbnail_id($post->ID);
                    $image_thumb1 = wp_get_attachment_image_src( $thumb_id,"medium",true  );
                    $image_thumb2 = wp_get_attachment_image_src( $thumb_id, 'thumb-news-index' );
                    $image_full = wp_get_attachment_image_src( $thumb_id, 'full' );//array('250','150'),true 

                    $image_src = "";
                    if($thumb_id != ""){
                        $image_src = $image_thumb1[0];
                    }else{
                        $image_src = get_template_directory_uri() ."/images/avatar_1.jpg";
                    }
                   
                     $termCompany = get_the_terms($post->ID, "interviews-company");
                  
                    
                ?>
                <div class="inter-blk">
                    <img src="<?php echo $image_src; ?>" >
                    <a href="<?php echo get_permalink($post->ID); ?>"><?php echo get_the_title($post->ID); ?></a>

                    <div class="inter-name">
                        <label><?php echo get_the_title($post->ID); ?></label>
                        <span><?php echo $termCompany[0]->name; ?></span>
                    </div>
                </div>


                <?php   endwhile;
            wp_reset_postdata();
            }
        ?>
                
                
                </div>



            </div>
    </div>
    
      <div class="blog-section">
        <div class="container">
        <div clss="row">
            <div class="col-md-12">
                <div class="title-blk">
                <h2 class="title-h">企業様向けコラム</h2>
                <a href="#" class="view-more-btn">一覧を見る</a>
                </div>
            </div>
        </div>
        <div clss="row">
            <div class="col-md-12">
            
                <div class="blog-blk">
                
                        <img src="<?php echo get_template_directory_uri(); ?>/new/img/img0.jpg" >
                        <a href="#">【経験必須】トレーニングマネージャー募集</a>
                        <ul class="tags-list">
                            <li><a href="#">マネジメント</a></li>
                            <li><a href="#">建設／建築</a></li>
                            <li><a href="#">海外</a></li>
                            <li><a href="#">マネジメント</a></li>
                            <li><a href="#">マネジメント</a></li>
                            <li><a href="#">マネジメント</a></li>
                        </ul>
                        <p>
                            ■業務内容・日本国内の代理店様への電話対応・納期調整や仕様変更を関係部署との調整 ■必須スキル・社会人経験3年以上(VISA取得の為)・英語での実務経験(日常英会話程度でも可)…
                        </p>
                        <span class="blog-date">― 2018.04.01 UPDATED</span>
                
                </div>
                <div class="blog-blk">
                    
                        <img src="<?php echo get_template_directory_uri(); ?>/new/img/img0.jpg" >
                        <a href="#">【経験必須】トレーニングマネージャー募集</a>
                        <ul class="tags-list">
                            <li><a href="#">マネジメント</a></li>
                            <li><a href="#">建設／建築</a></li>
                            <li><a href="#">海外</a></li>
                            <li><a href="#">マネジメント</a></li>
                            <li><a href="#">マネジメント</a></li>
                            <li><a href="#">マネジメント</a></li>
                        </ul>
                        <p>
                            ■業務内容・日本国内の代理店様への電話対応・納期調整や仕様変更を関係部署との調整 ■必須スキル・社会人経験3年以上(VISA取得の為)・英語での実務経験(日常英会話程度でも可)…
                        </p>
                        <span class="blog-date">― 2018.04.01 UPDATED</span>
                    
                </div>
            </div>
        </div>
        
        
        
        
        </div>
   </div> 
    
    
    
    <div class="client-top">
        <div class="container">
        <div clss="row">
        <div class="col-md-12">
            <div class="center">
                <h2 class="title-h"><?php echo get_field('title_company'); ?></h2>
                <ul class="client-list">
                    <?php 
                        $images = acf_photo_gallery('logo_company', get_the_ID());
                        if( $images ):
                    ?>

                    <?php foreach( $images as $key => $image ): ?>
                        <li> 
                            <img src="<?php echo $image['full_image_url']; ?>"  >
                        </li>
                    <?php endforeach; 
                        endif; 
                    ?>
                </ul>
            </div>
        </div>
        </div>
        
        <div class="row">
            <div class="col-md-12">
                <div class="center">
                    <div class="sub-desc">
                         <?php if (qtrans_getLanguage()=='ja'){ ?>
                            どんな採用ニーズをお持ちですか？　まずはご相談ください。
                        <?php }else if (qtrans_getLanguage()=='vi'){ ?> 
                            どんな採用ニーズをお持ちですか？　まずはご相談ください。
                        <?php }else if (qtrans_getLanguage()=='en'){ ?> 
                            どんな採用ニーズをお持ちですか？　まずはご相談ください。
                        <?php } ?>
                    </div>
                    <?php echo get_field('button_contact'); ?>
                </div>
            </div>
        </div>
        
        
        </div>
    </div>
<?php get_footer();?>