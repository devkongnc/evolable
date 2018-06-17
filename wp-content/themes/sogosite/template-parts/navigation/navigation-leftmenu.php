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
         <li class="current">
                 <a href="<?php echo get_site_url(); ?>">トップ</a>
              </li>

              <li>
                <?php
                  switch_to_blog(3); ?> 
                  <a href="<?php echo get_site_url().'/'.qtranxf_getLanguage().'/column-index'; ?>">求職者応援コラム</a>
                  <?php restore_current_blog();
                ?>
                 
              </li>

               <li  class="nav-parrent">
                <?php
                  switch_to_blog(2); ?> 
                  <a href="<?php echo get_site_url(); ?>">求人情報検索</a>
                  <?php restore_current_blog();
                ?>
                  
                   <ul class="sub-nav">
                    <li>
                      <?php
                  switch_to_blog(3); ?> 
                  <a href="<?php echo get_site_url().'/'.qtranxf_getLanguage().'/interviews'; ?>">利用者インタビュー</a>
                  <?php restore_current_blog();
                ?>
              </li>
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
                <?php
                  switch_to_blog(3); ?> 
                  <a href="<?php echo get_site_url().'/'.qtranxf_getLanguage().'/about'; ?>">企業概要</a>
                  <?php restore_current_blog();
                ?>
               </li>

       </ul>
