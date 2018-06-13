
<?php 
/**
 * The front page template file
 *
 * If the user has selected a static page for their homepage, this is what will
 * appear.
 * Learn more: https://codex.wordpress.org/Template_Hierarchy
 * Template Name: Column
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
        <h2>インタビュー</h2>
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
  
<?php get_footer();?>