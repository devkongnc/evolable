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
   <a href="<?php echo get_site_url(); ?>/top/column">求職者応援コラム</a>
</li>

 <li  class="nav-parrent">
     <a href="#">求人情報検索</a>
     <ul class="sub-nav">
      <li><a href="<?php echo get_site_url(); ?>/top/interviews">求人情報一覧</a></li>
      <li><a href="#">ニュース・ブログ</a></li>
     </ul>
 </li>
 <li>
     <a href="<?php echo get_site_url(); ?>/top/about">企業概要</a>
 </li>

</ul>
