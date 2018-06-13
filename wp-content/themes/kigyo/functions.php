<?php 

	// setup kigy0 themes
	require get_template_directory() . '/inc/common.php';

	// enqueue files
	require get_template_directory() . '/inc/enqueue.php';

	// news
	require get_template_directory() . '/inc/news/index.php';

	// interviews
	require get_template_directory() . '/inc/interviews/index.php';

	// our client
	require get_template_directory() . '/inc/client/index.php';



	//register sidebar
	register_sidebar(array(
	    'name' => 'Block after content',
	    'id' => 'sidebar-1',
	    'description' => 'Khu vực sidebar hiển thị dưới mỗi bài viết',
	    'before_widget' => '<aside id="%1$s" class="widget %2$s">',
	    'after_widget' => '</aside>',
	    'before_title' => '<h1 class="widget-title">',
	    'after_title' => '</h1>'
	));


	
?>