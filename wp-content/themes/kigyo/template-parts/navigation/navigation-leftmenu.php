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
          <?php if (qtrans_getLanguage()=='ja'){ ?>
              <li class="">
                 <a href="/evolable">トップ</a>
              </li>
            
              <li>
                 <a href="<?php echo get_site_url(); ?>/ja/column-index">求職者応援コラム</a>
              </li>

               <li  class="nav-parrent">
                   <a href="#">求人情報検索</a>
                   <ul class="sub-nav">
                    <li><a href="<?php echo get_site_url(); ?>/ja/interviews">利用者インタビュー</a></li>
                    <li><a href="#">応募フォーム</a></li>
                   </ul>
               </li>
               <li>
                   <a href="<?php echo get_site_url(); ?>/ja/about">企業概要</a>
               </li>
              <?php }else if (qtrans_getLanguage()=='vi'){ ?> 
                  <li class="">
                 <a href="/evolable">トップ</a>
              </li>
            
              <li>
                 <a href="<?php echo get_site_url(); ?>/vi/column-index">求職者応援コラム</a>
              </li>

               <li  class="nav-parrent">
                   <a href="#">求人情報検索</a>
                   <ul class="sub-nav">
                    <li><a href="<?php echo get_site_url(); ?>/vi/interviews">利用者インタビュー</a></li>
                    <li><a href="#">応募フォーム</a></li>
                   </ul>
               </li>
               <li>
                   <a href="<?php echo get_site_url(); ?>/vi/about">企業概要</a>
               </li>
              <?php }else if (qtrans_getLanguage()=='en'){ ?> 
                  <li class="">
                 <a href="/evolable">トップ</a>
              </li>
            
              <li>
                 <a href="<?php echo get_site_url(); ?>/en/column-index">求職者応援コラム</a>
              </li>

               <li  class="nav-parrent">
                   <a href="#">求人情報検索</a>
                   <ul class="sub-nav">
                    <li><a href="<?php echo get_site_url(); ?>/en/interviews">利用者インタビュー</a></li>
                    <li><a href="#">応募フォーム</a></li>
                   </ul>
               </li>
               <li>
                   <a href="<?php echo get_site_url(); ?>/en/about">企業概要</a>
               </li>
              <?php } ?>

       </ul>



