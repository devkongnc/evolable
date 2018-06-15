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
                 <a href="<?php echo get_site_url(); ?>/top/<?php echo qtranxf_getLanguage(); ?>/column-index">求職者応援コラム</a>
              </li>

               <li  class="nav-parrent">
                   <a href="<?php echo get_site_url(); ?>/recruitment">求人情報検索</a>
                   <ul class="sub-nav">
                    <li><a href="<?php echo get_site_url(); ?>/top/<?php echo qtranxf_getLanguage(); ?>/interviews">利用者インタビュー</a></li>
                    <li><a href="<?php echo get_site_url(); ?>/recruitment/<?php echo qtranxf_getLanguage(); ?>/job-apply">応募フォーム</a></li>
                   </ul>
               </li>
               <li>
                   <a href="<?php echo get_site_url(); ?>/top/<?php echo qtranxf_getLanguage(); ?>/about">企業概要</a>
               </li>

       </ul>
