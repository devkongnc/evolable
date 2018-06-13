<?php
/**
 * The sidebar containing the main widget area
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package WordPress
 * @subpackage eaa
 * @since 1.0
 * @version 1.0
 */



?>
<div class="left-menu">
<div class="left-menu-scroll">
<div class="left-menu-content">
  <div id="navwrap">
                          <nav class="transparent-white navbar navbar-transparent" role="navigation">
                                <div class="navbar-header page-scroll">
                                   <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-main-collapse">
                                   <i class="fa fa-bars"></i>
                                   </button>
                                   <a class="navbar-brand" href="index.html">
                                   <span ><img src="<?php echo get_template_directory_uri(); ?>/new/img/logo.png" ></span>
                                   </a>
                                </div>
                <ul class="lang-menu">
                  <li><a href="#" class="current">JP</a></li>
                  <li><a href="#">EN</a></li>
                  <li><a href="#">VN</a></li>
                </ul>
                                <div class="collapse navbar-collapse navbar-main-collapse">
                                   <ul class="nav navbar-nav" id="top-nav">
                                      <li class="current">
                                         <a href="#">トップ</a>
                                      </li>
                                    
                                      <li>
                                         <a href="column.html">求職者応援コラム</a>
                                      </li>

                                       <li  class="nav-parrent">
                                           <a href="#">求人情報検索</a>
                                           <ul class="sub-nav">
                                            <li><a href="search.html">求人情報一覧</a></li>
                                            <li><a href="blog.html">ニュース・ブログ</a></li>
                                            <li><a href="service.html">利用者インタビュー</a></li>
                                            <li><a href="contact-form.html">応募フォーム</a></li>
                                           </ul>
                                       </li>
                                       <li>
                                           <a href="about.html">企業概要</a>
                                       </li>
                                       <li>
                                          <ul class="lang-menu">
                        <li><a href="#" class="current">JP</a></li>
                        <li><a href="#">EN</a></li>
                        <li><a href="#">VN</a></li>
                      </ul>
                                       </li>
                                       
                                      

                                   </ul>
                                </div>

                            <a href="#" class="employ-btn"><img src="<?php echo get_template_directory_uri(); ?>/new/img/icon-building.png" > 採用企業の皆さまへ</a>
                          </nav>
                       </div>
        <div class="banner">
          <a href="#"><img src="<?php echo get_template_directory_uri(); ?>/new/img/banner1.jpg" ></a>
          <a href="#"><img src="<?php echo get_template_directory_uri(); ?>/new/img/banner2.jpg" ></a>
          <a href="#"><img src="<?php echo get_template_directory_uri(); ?>/new/img/banner3.jpg" ></a>
        </div>               
   
  </div>                
</div>
</div>
