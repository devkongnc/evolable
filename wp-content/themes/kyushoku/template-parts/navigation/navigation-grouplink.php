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
<li><a href="<?php echo get_site_url(); ?>">
  <?php if (qtrans_getLanguage()=='ja'){ ?>
          求人情報
      <?php }else if (qtrans_getLanguage()=='vi'){ ?> 
          求人情報
      <?php }else if (qtrans_getLanguage()=='en'){ ?> 
          求人情報
      <?php } ?>
    </a></li>
  <li>
    <?php switch_to_blog(3); ?> 
  <a href="<?php echo get_site_url().'/'.qtranxf_getLanguage().'/column-index'; ?>">
   <?php if (qtrans_getLanguage()=='ja'){ ?>
          転職のためのコラム
      <?php }else if (qtrans_getLanguage()=='vi'){ ?> 
          転職のためのコラム
      <?php }else if (qtrans_getLanguage()=='en'){ ?> 
          転職のためのコラム
      <?php } ?>
      </a>
  <?php restore_current_blog();
?>
</li>
  <li>
    <?php switch_to_blog(3); ?> 
  <a href="<?php echo get_site_url().'/'.qtranxf_getLanguage().'/interviews'; ?>">
   <?php if (qtrans_getLanguage()=='ja'){ ?>
          転職者インタビュー
      <?php }else if (qtrans_getLanguage()=='vi'){ ?> 
          転職者インタビュー
      <?php }else if (qtrans_getLanguage()=='en'){ ?> 
          転職者インタビュー
      <?php } ?>
      </a>
  <?php restore_current_blog();
?>
</li>

  <li><a href="<?php echo get_site_url(); ?>/jobs/">
  <?php if (qtrans_getLanguage()=='ja'){ ?>
          応募フォーム
      <?php }else if (qtrans_getLanguage()=='vi'){ ?> 
          応募フォーム
      <?php }else if (qtrans_getLanguage()=='en'){ ?> 
          応募フォーム
      <?php } ?>
      </a></li>