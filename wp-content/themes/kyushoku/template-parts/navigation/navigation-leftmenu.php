<?php
/**
 * Displays navleft navigation
 *
 * @package WordPress
 * @subpackage Twenty_Seventeen
 * @since 1.0
 * @version 1.2
 */

?>
<!--     
  <?php// switch_to_blog(2); //switch to main site
     // if ( has_nav_menu( 'leftmenu' ) ) : ?> -->
      <div class="collapse navbar-collapse nav-collapse">
        <ul class="nav navbar-nav" id="top-nav">
          <?php if (qtrans_getLanguage()=='ja'){ ?>
              <li class="current">
                 <a href="<?php echo get_site_url(); ?>">トップ</a>
              </li>
            
              <li>
                 <a href="<?php echo get_site_url(); ?>/company/ja/column">求職者応援コラム</a>
              </li>

               <li  class="nav-parrent">
                   <a href="#">求人情報検索</a>
                   <ul class="sub-nav">
                    <li><a href="<?php echo get_site_url(); ?>/company/ja/interviews">利用者インタビュー</a></li>
                    <li><a href="#">応募フォーム</a></li>
                   </ul>
               </li>
               <li>
                   <a href="<?php echo get_site_url(); ?>/company/ja/about">企業概要</a>
               </li>
              <?php }else if (qtrans_getLanguage()=='vi'){ ?> 
                  <li class="current">
                 <a href="<?php echo get_site_url(); ?>">トップ</a>
              </li>
            
              <li>
                 <a href="<?php echo get_site_url(); ?>/company/vi/column">求職者応援コラム</a>
              </li>

               <li  class="nav-parrent">
                   <a href="#">求人情報検索</a>
                   <ul class="sub-nav">
                    <li><a href="<?php echo get_site_url(); ?>/company/ja/interviews">利用者インタビュー</a></li>
                    <li><a href="#">応募フォーム</a></li>
                   </ul>
               </li>
               <li>
                   <a href="<?php echo get_site_url(); ?>/company/vi/about">企業概要</a>
               </li>
              <?php }else if (qtrans_getLanguage()=='en'){ ?> 
                  <li class="current">
                 <a href="<?php echo get_site_url(); ?>">トップ</a>
              </li>
            
              <li>
                 <a href="<?php echo get_site_url(); ?>/company/en/column">求職者応援コラム</a>
              </li>

               <li  class="nav-parrent">
                   <a href="#">求人情報検索</a>
                   <ul class="sub-nav">
                    <li><a href="<?php echo get_site_url(); ?>/company/ja/interviews">利用者インタビュー</a></li>
                    <li><a href="#">応募フォーム</a></li>
                   </ul>
               </li>
               <li>
                   <a href="<?php echo get_site_url(); ?>/company/en/about">企業概要</a>
               </li>
              <?php } ?>

       </ul>
     <!--  <?php //get_template_part( 'template-parts/navigation/navigation', 'leftmenu' ); ?> -->
      </div>
      <!-- <?php //endif; ?> -->
  <?php // restore_current_blog(); ?>