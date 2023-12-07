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
        <ul class="nav navbar-nav" id="top-nav">
         <li class="">
                 <?php
                  switch_to_blog(1); ?> 
                  <a href="<?php echo get_site_url(); ?>">トップ</a>
                  <?php restore_current_blog();
                ?>
              </li>
            
              <li>
                 <a href="<?php echo get_site_url(); ?>/<?php echo qtranxf_getLanguage(); ?>/column-index">求職者応援コラム</a>
              </li>

               <li  class="nav-parrent">
                <?php
                  switch_to_blog(2); ?> 
                  <a href="<?php echo get_site_url().'/'.qtranxf_getLanguage(); ?>">求人情報検索</a>
                  <?php restore_current_blog();
                ?>
                  
                   <ul class="sub-nav">
                    <li><a href="<?php echo get_site_url(); ?>/<?php echo qtranxf_getLanguage(); ?>/interviews">利用者インタビュー</a></li>
                    <li>
                      <?php
                  switch_to_blog(2); ?> 
                  <a href="<?php echo get_site_url().'/'.qtranxf_getLanguage().'/job-apply'; ?>">応募フォーム</a>
                  <?php restore_current_blog();
                ?>
              </li>
                   </ul>
               </li>
               <li>
                   <a href="<?php echo get_site_url(); ?>/<?php echo qtranxf_getLanguage(); ?>/about">企業概要</a>
               </li>
       </ul>



