<?php 
/**
 * The front page template file
 *
 * If the user has selected a static page for their homepage, this is what will
 * appear.
 * Learn more: https://codex.wordpress.org/Template_Hierarchy
 * Template Name: Contact
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
        <h2>
        <?php if (qtrans_getLanguage()=='ja'){ ?>
                CONTACT FORM
            <?php }else if (qtrans_getLanguage()=='vi'){ ?> 
                CONTACT FORM
            <?php }else if (qtrans_getLanguage()=='en'){ ?> 
                CONTACT FORM
            <?php } ?>
        </h2>
    </div>
    
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <ul class="btn-section btn-3">
                    <li><a class="current" href="<?php echo str_replace("/company/","/search/",get_site_url().'/'); ?>"">求人情報 </a></li>
                    <li><a href="<?php echo get_site_url();?>/column"">コラム</a></li>
                    <li><a href="<?php echo get_site_url();?>/interviews">INTERVIEW</a></li>
                    
                </ul>
            </div>
        </div>
    
        
        
    </div>  
   
   <div class="form-content gray-bg">
        <div class="container">
        <?php echo do_shortcode('[contact-form-7 id="610" title="Contact form 1"]'); ?>
        
        </div>
   </div>
    <?php get_footer();?>
