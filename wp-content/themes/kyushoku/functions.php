<?php
// setup, ... themes
require get_template_directory() . '/inc/common.php';

// enqueue files
require get_template_directory() . '/inc/enqueue.php';
// faq
require get_template_directory() . '/inc/eaa_faq/index.php';
// why agent
require get_template_directory() . '/inc/why_agent/index.php';
// interviews
require get_template_directory() . '/inc/interviews/index.php';

// index
require get_template_directory() . '/inc/index/index.php';
// news
require get_template_directory() . '/inc/news/index.php';

// job-apply
require get_template_directory() . '/inc/job-apply.php';

// search-job
require get_template_directory() . '/inc/index/search-job.php';

// banner
require get_template_directory() . '/inc/banner/index.php';
/***Add colum for page recruitment****/
/*add_filter('manage_posts_columns', 'recruitment_columns');
function recruitment_columns($columns) {
	if (is_admin()) {
		$postType = $_GET['post_type'];
		switch ($postType) {
			case 'jobs':
				$columns['codeWork'] = '求人No';
				break;
			default:
				break;
		}
		return $columns;
	}
}
add_action('manage_posts_custom_column', 'recruitment_show_columns');
function recruitment_show_columns($name) {
	global $post;
	switch($name){
		case 'codeWork':
		$feat = get_field('job_no',$post->ID);
		echo '<strong>'.$feat.'</strong>';
	}
}
add_action('admin_head', 'recruitment_admin_custom_styles');
function recruitment_admin_custom_styles() {
    $output_css = '<style type="text/css">
       #codeWork { width:10%;}
    </style>';
    echo $output_css;
}*/

