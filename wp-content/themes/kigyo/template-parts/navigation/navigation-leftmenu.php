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
                 <a href="/evolable">トップ</a>
              </li>
            
              <li>
                 <a href="<?php echo get_site_url(); ?>/<?php echo qtranxf_getLanguage(); ?>/column-index">求職者応援コラム</a>
              </li>

               <li  class="nav-parrent">
                <a href="<?php echo str_replace("/top/".qtranxf_getLanguage()."/","/recruitment/".qtranxf_getLanguage()."/",get_site_url().'/'.qtranxf_getLanguage().'/'); ?>">求人情報検索</a>
                  
                   <ul class="sub-nav">
                    <li><a href="<?php echo get_site_url(); ?>/<?php echo qtranxf_getLanguage(); ?>/interviews">利用者インタビュー</a></li>
                    <li><a href="#">応募フォーム</a></li>
                   </ul>
               </li>
               <li>
                   <a href="<?php echo get_site_url(); ?>/<?php echo qtranxf_getLanguage(); ?>/about">企業概要</a>
               </li>
       </ul>



