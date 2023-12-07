<?php
	
	if(!function_exists('load_job_index')){
		function load_job_index(){
			global $post;

			$search_term_index = "";
			if(function_exists('qtranxf_getLanguage')){
				$search_term_index = "[:".qtranxf_getLanguage()."]";
			}
			$args = array(
				'post_type'         => 'jobs',
				'posts_per_page'    => 4,
				's' => $search_term_index,
				'orderby'           => 'modified', 
				'order'             => 'ASC'
			);
			add_filter( 'posts_where', 'title_filter', 10, 2 );
			$query = new WP_Query( $args );
			remove_filter( 'posts_where', 'title_filter', 10, 2 );

			$langsk = "スキル:";
			$langsl = "年収下限:";
		    if(function_exists('qtranxf_getLanguage')){
		        if (qtranxf_getLanguage() == "ja"){
		            $langsk = "スキル:";
		            $langsl = "年収下限:";
		        } elseif (qtranxf_getLanguage() == "en"){
		            $langsk = "Skill:";
		            $langsl = "Salary:";
		        } else {
		            $langsk = "Kỹ năng:";
		            $langsl = "Mức lương:";
		        }
		    }

			$htmlRender = "";
			if ( $query->have_posts() ) {
				while ( $query->have_posts() ) : $query->the_post();
					$term_skills = get_the_terms($post->ID, 'job-skill');
					$term_location = get_the_terms($post->ID, 'job-location');

					$htmlTerm = "";
					$htmlLocation = "";

					$salary = '';
					if (get_field('salary') !== false){
		                $salary = get_field('salary');              
		            }
					if (is_array($term_location)) {
						$countLocation = 1;
						foreach ($term_location as $location_item) {
							if($countLocation == 1){
							    $htmlLocation =  $location_item->name;
							}

							$countLocation++;
						} 
					}

					if (is_array($term_skills)) {
						foreach ($term_skills as $skill_item) {
							$htmlTerm .=  $skill_item->name;         
							if(count($term_skills) > 1){
							    $htmlTerm .= ', ';
							}
						} 
					}
					$post_id = $post->ID;
					$langCode =  qtranxf_getLanguage();
					$langImg ='';
					if($langCode!='ja'):
						$langImg ='_'.$langCode;
					endif;
					if ( get_field('default_image'.$langImg, $post_id) ) {
						$thumbJobNew = get_post_field('default_image'.$langImg, $post_id);
					}else if(get_field('default_image', $post_id)){
						$thumbJobNew = get_post_field('default_image', $post_id);
					}
					$image_thumb = wp_get_attachment_image_src( $thumbJobNew, 'thumb-recruit-index' );
					$image_thumb_sp = wp_get_attachment_image_src( $thumbJobNew, 'thumb-recruit-index-sp' );
					$image_src = "";
					$image_src_sp = "";
					if($thumbJobNew != ""){
						$image_src = $image_thumb[0];
						$image_src_sp = $image_thumb_sp[0];
					}else{
						$image_src = get_template_directory_uri() ."/images/imgNew_job_1.png";
						$image_src_sp = get_template_directory_uri() ."/images/imgNew_job_1.png";
					}

					$htmlRender .= '<div class="row job-element">';
				    $htmlRender .= '<a href="'. get_the_permalink($post->ID) .'">';
				        $htmlRender .= '<div class="inner">';

				            $htmlRender .= '<div class="job-img">';
				            $htmlRender .= '<div class="img-job-index jobpc"><img src="'. $image_src .'" alt="'. get_the_title($post->ID) .'" title="'. get_the_title($post->ID) .'"></div>';
				            $htmlRender .= '<div class="img-job-index jobsp"><img src="'. $image_src_sp .'" alt="'. get_the_title($post->ID) .'" title="'. get_the_title($post->ID).'"></div>';
				                $htmlRender .= '<div class="visible-xs-block location"><span class="glyphicon glyphicon-map-marker"></span> '. $htmlLocation .'</div>';
				            $htmlRender .= '</div>';
				            $htmlRender .= '<div class="job-content">';
				                $htmlRender .= '<div class="title-content">'.get_the_title($post->ID) .'</div>';
				                $htmlRender .= '<div class="skill-content"><span>'.$langsk.'</span> '. $htmlTerm .'</div>';
				                $htmlRender .= '<div class="salary-content"><span>'.$langsl.'</span> '. $salary .'</div>';
				            $htmlRender .= '</div>';
				            $htmlRender .= '<div class="hidden-xs job-location">';
				                $htmlRender .= '<div><span class="glyphicon glyphicon-map-marker"></span> '. $htmlLocation .'</div>';
				            $htmlRender .= '</div>';
				            
				        $htmlRender .= '</div>';
				    $htmlRender .= '</a>';
				$htmlRender .= '</div>';
				endwhile;
        		wp_reset_postdata();
			}

			return $htmlRender;
		}

		add_shortcode('load_job_news_index', 'load_job_index');
	}
?>

