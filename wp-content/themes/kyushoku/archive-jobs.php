<?php
get_header();
get_sidebar();

global $wpdb;
global $q_config;
$lang_slug = '_qts_slug_'.$q_config['language'];
$langCode =  qtranxf_getLanguage();
$terms = get_terms(array(
    'taxonomy' => 'job-skill',
    'meta_key' , $lang_slug,
    'orderby'    => 'meta_value',
));
$arrTerm = array();
foreach ( $terms as $term ) {
	$arrTerm[strtolower($term->name)] = $term->term_taxonomy_id;
}

?>

<?php
	$paged = ( get_query_var( 'paged' ) ) ? absint( get_query_var( 'paged' ) ) : 1;

	$search_term = "[:".qtranxf_getLanguage()."]";

	if(isset($_GET['id'])){
		$terms_position = get_the_terms(intVal($_GET['id']), "job-position");
	    $id_terms_position = array();
	    if(is_array($terms_position)){
	    	foreach($terms_position as $key => $term){
	    		$id_terms_position[] = $term->term_id;
	    	}
	    }

	    $term_locations = get_the_terms(intVal($_GET['id']), 'job-location');
	    $id_terms_location = array();
	    if(is_array($term_locations)){
	    	foreach($term_locations as $key => $term){
	    		$id_terms_location[] = $term->term_id;
	    	}
	    }

		$term_skills = get_the_terms(intVal($_GET['id']), 'job-skill');
	    $id_terms_skills = array();
	    if(is_array($term_skills)){
	    	foreach($term_skills as $key => $term){
	    		$id_terms_skills[] = $term->term_id;
	    	}
	    }
		$argsJobs=array(
	        'post_type' => "jobs",
	        'tax_query' => array(

		        array(
		            'taxonomy' => 'job-position',
		            'terms' => $id_terms_position
		        ),
		        array(
		            'taxonomy' => 'job-location',
		            'terms' => $id_terms_location
		        ),
		        array(
		            'taxonomy' => 'job-skill',
		            'terms' => $id_terms_skills
		        )
		    ),
	        'posts_per_page' => 12,
	        'caller_get_posts' => 1,
	        'orderby'        => 'modified',
			'order'            => 'ASC',
			'post_status'    => 'publish',
			'search_prod_title' => $search_term,
			'hide_empty'     => false,
			'paged'			 => $paged
        );
	}else if(isset($_GET['location']) || isset($_GET['position']) || isset($_GET['salary']) || isset($_GET['keyword'])){
			if($_GET['location'] == "" && $_GET['position'] == "" && $_GET['salary'] == "" && $_GET['keyword'] == ""){
				$argsJobs = array(
					'post_type'      => 'jobs',
					'orderby'        => 'modified',
					'order'            => 'ASC',
					'hide_empty'     => false,
					'depth'          => 1,
					'post_status'    => 'publish',
					'search_prod_title' => $search_term,
					'posts_per_page' => 12,
					'paged'			 => $paged
				);
			}if($_GET['location'] == "" && $_GET['position'] == "" && $_GET['salary'] == "" && $_GET['keyword'] != ""){
				$keyword = $_GET['keyword'];
				$termIdSkill =  $arrTerm[strtolower($keyword)];
				if($termIdSkill>0){
					$argsJobs = array(
						'post_type' => 'jobs',
						'orderby'        => 'modified',
						'order'            => 'ASC',
						'hide_empty'     => false,
						'depth'          => 1,
						'post_status'    => 'publish',
						'search_prod_title' => $search_term,
						'posts_per_page' => 12,
						'paged'			 => $paged,
						'tax_query' => array(
					        array(
					            'taxonomy' => 'job-skill',
					            'terms' => $termIdSkill
					        ))
					);
				}else{
					$argsJobs = array(
						'post_type'      => 'jobs',
						'orderby'        => 'modified',
						'order'            => 'ASC',
						'hide_empty'     => false,
						'depth'          => 1,
						'post_status'    => 'publish',
						'search_prod_title_keyword' => $keyword,
						'search_prod_title' => $search_term,
						'posts_per_page' => 12,
						'paged'			 => $paged
					);
				}
			}else{
				if(is_array($_GET['location']) || is_array($_GET['position']) || is_array($_GET['skill']) ){

				    $id_terms_position = array();
				    if(is_array($_GET['location'])){
				    	foreach($_GET['location'] as $key => $term){
				    		$id_terms_position[] = $term;
				    	}
				    }

				    $id_terms_location = array();
				    if(is_array($_GET['position'])){
				    	foreach($_GET['position'] as $key => $term){
				    		$id_terms_location[] = $term;
				    	}
				    }

				    $id_terms_skills = array();
				    if(is_array($_GET['skill'])){
				    	foreach($_GET['skill'] as $key => $term){
				    		$id_terms_skills[] = $term;
				    	}
				    }

				    $tax_query = array();
				    if(count($id_terms_position) > 0){
				    	$tax_query[] = array(
					            'taxonomy' => 'job-location',
					            'terms' => $id_terms_position,
					            'field' => 'term_id'
					        );
				    }

				    if(count($id_terms_location) > 0){
				    	$tax_query[] = array(
					            'taxonomy' => 'job-position',
					            'terms' => $id_terms_location,
					            'field' => 'term_id'
					        );
				    }

				    if(count($id_terms_skills) > 0){
				    	$tax_query[] = array(
					            'taxonomy' => 'job-skill',
					            'terms' => $id_terms_skills,
					            'field' => 'term_id'
					        );
				    }

					$argsJobs=array(
				        'post_type' => "jobs",
				        'tax_query' => $tax_query,
				        'posts_per_page' => 12,
				        'caller_get_posts' => 1,
				        'orderby'        => 'modified',
						'order'            => 'ASC',
						'post_status'    => 'publish',
						'search_prod_title' => $search_term,
						'hide_empty'     => false,
						'paged'			 => $paged
			        );
				}else{
					$tax_query = array();

					$meta_query = array();
					if($_GET['location'] !=""){
						$tax_query[] = array(
							    'taxonomy' => 'job-location',
							    'field' => 'term_id',
							    'terms' => intVal($_GET['location'])
						     );
					}

					if($_GET['position'] !=""){
						$tax_query[] = array(
							    'taxonomy' => 'job-position',
							    'field' => 'term_id',
							    'terms' => intVal($_GET['position'])
						     );
					}

					if($_GET['salary'] !=""){
						$meta_query = array('relation' => 'AND',array(
							    'key' => 'min_salary',
							    'value' => intVal($_GET['salary']),
							    'compare' => '>='
						     ));
					}

					$keyword = "";
					if($_GET['keyword'] !=""){
						$keyword = $_GET['keyword'];
					}
					$argsJobs=array(
				        'post_type' => "jobs",
				        'tax_query' => $tax_query,
				        'meta_query' => $meta_query,
				        'posts_per_page' => 12,
				        'caller_get_posts' => 1,
				        'orderby'        => 'modified',
						'order'            => 'DESC',
						'post_status'    => 'publish',
						'search_prod_title_keyword' => $keyword,
						'search_prod_title' => $search_term,
						'hide_empty'     => false,
						'paged'			 => $paged
			        );
				}

			}
		}else{
			$argsJobs = array(
				'post_type'      => 'jobs',
				'orderby'        => 'modified',
				'order'            => 'ASC',
				'hide_empty'     => false,
				'depth'          => 1,
				'post_status'    => 'publish',
				'posts_per_page' => 12,
				'search_prod_title' => $search_term,
				'paged'			 => $paged,

			);
		}
	add_filter( 'posts_where', 'title_filter', 10, 2 );
	$wp_query1 = new WP_Query( $argsJobs );
	//remove_filter( 'posts_where', 'title_filter', 10, 2 );
?>
<div class="right-content">
	<div class="breadcrumb-bg">
		<div class="container">
			<div class="row">
				<div class="col-md-12">
					<div class="search-intro">
						<img src="<?php echo get_template_directory_uri(); ?>/new/img/search-w.png" > 求人情報を検索する
						<ul class="search-list-btn">
							<li><a href="#place-box" class="fancybox">勤務地から探す</a></li>
							<li><a href="#job" class="fancybox">職種から探す</a></li>
							<li><a href="#key-word" class="fancybox">キーワードから探す</a></li>
						</ul>
					</div>
				</div>
			</div>
		</div>
	</div>



<div class="group-link">
	<div class="container">
	<div class="row">
		<div class="col-md-12">
			<ul>
				<li><a href="#">求人情報</a></li>
				<li><a href="#">転職のためのコラム</a></li>
				<li><a href="#">転職者インタビュー</a></li>
				<li><a href="#">応募フォーム</a></li>
			</ul>
		 </div>
	</div>
 </div>
</div>


<div class="recruit-list">
  	<div class="container">
		<div class="row">
			<div class="col-md-12">
				<h2 class="left">検索結果 <span>（ <strong class="red-txt">100</strong> 件見つかりました ）</span></h2>
				<?php if( $wp_query1->have_posts() ) : ?>
					<?php while( $wp_query1->have_posts() ) : $wp_query1->the_post(); ?>
						<div class="recruit-blk">
							<img src="<?php echo get_template_directory_uri(); ?>/new/img/s1.jpg" >
							<a href="#"><?php the_title();?></a>
							<ul class="tags-list">
								<li><a href="#">マネジメント</a></li>
								<li><a href="#">建設／建築</a></li>
								<li><a href="#">海外</a></li>
								<li><a href="#">マネジメント</a></li>
								<li><a href="#">マネジメント</a></li>
								<li><a href="#">マネジメント</a></li>
							</ul>
							<ul class="recruit-if">
								<li><img src="<?php echo get_template_directory_uri(); ?>/new/img/icon-money.png"> 1,800 - 3,000 USD</li>
								<li><img src="<?php echo get_template_directory_uri(); ?>/new/img/icon-map.png"> 東京【23区】, 関東</li>
							</ul>
							<p>
								■業務内容・日本国内の代理店様への電話対応・納期調整や仕様変更を関係部署との調整 ■必須スキル・社会人経験3年以上(VISA取得の為)・英語での実務経験(日常英会話程度でも可)…
							</p>
							<span class="recruit-date">― 2018.04.01 UPDATED</span>
							<a href="#" class="view-more-btn">詳細を見る</a>
						</div>
					<?php endwhile; ?>
					<?php wp_reset_postdata(); ?>

					<div class="center">
						<?php if (function_exists('agent_pagenavi')) agent_pagenavi($wp_query1); ?>
						<!-- /PAGINATION -->
					</div>
				<?php else: ?>
					<div class='no-content' style="padding: 10px 0px 30px">
						<p>
							<img src="<?php echo get_template_directory_uri() ?>/images/no-content-<?php echo __('[:ja]ja[:en]en[:vi]vi'); ?>.png" ." style='margin:0 auto;' class='img-responsive pc-only'>
							<img src="<?php echo get_template_directory_uri() ?>/images/no-content-sp-<?php echo __('[:ja]ja[:en]en[:vi]vi'); ?>.png" ." style='margin:0 auto;' class='img-responsive sp-only'>
						</p>
					</div>
				<?php endif; ?>
			</div>
		</div>
	</div>
  </div>

  <div class="latest-column gray-bg">

  	<div class="container">
		<div class="row">
			<div class="col-md-12">
				<div class="title-blk">
				<h2 class="title-h">最新コラム</h2>
				<a href="#" class="view-more-btn">一覧を見る</a>
			</div>


			</div>
		</div>
		<div class="row">
			<div class="col-md-3">
				<div class="column-blk">
						<img src="<?php echo get_template_directory_uri(); ?>/new/img/img1.jpg" >
						<a href="#">転職は筋肉次第！？あっと驚…</a>
						<p>転職に役立つブログの内容を50文字くらい表示する。転職に役立つブログの内容を50文字くらい表示する。</p>
						<span class="column-date">― 2018.04.01 UPDATE</span>
					</div>
			</div>
			<div class="col-md-3">
				<div class="column-blk">
						<img src="<?php echo get_template_directory_uri(); ?>/new/img/img2.jpg" >
						<a href="#">転職は筋肉次第！？あっと驚…</a>
						<p>転職に役立つブログの内容を50文字くらい表示する。転職に役立つブログの内容を50文字くらい表示する。</p>
						<span class="column-date">― 2018.04.01 UPDATE</span>
					</div>
			</div>
			<div class="col-md-3">
				<div class="column-blk">
						<img src="<?php echo get_template_directory_uri(); ?>/new/img/img4.jpg" >
						<a href="#">転職は筋肉次第！？あっと驚…</a>
						<p>転職に役立つブログの内容を50文字くらい表示する。転職に役立つブログの内容を50文字くらい表示する。</p>
						<span class="column-date">― 2018.04.01 UPDATE</span>
					</div>
			</div>
			<div class="col-md-3">
				<div class="column-blk">
						<img src="<?php echo get_template_directory_uri(); ?>/new/img/img5.jpg" >
						<a href="#">転職は筋肉次第！？あっと驚…</a>
						<p>転職に役立つブログの内容を50文字くらい表示する。転職に役立つブログの内容を50文字くらい表示する。</p>
						<span class="column-date">― 2018.04.01 UPDATE</span>
					</div>
			</div>
		</div>
	 </div>
  </div>

  <div class="interview-top">
  			<div class="inter-big">
  				<div class="inter-big-overlay">
  					<a href="#">日本人社員の新しい気付きや見直すきっかけとなり良い影響になっています。</a>
  					<p>弊社では以前から外国人人材の採用をしていて、現在は日本のオフィスでも全社員のうち約１割が外国人です…</p>
  					<div class="inter-big-name">
  						<label>吉村 絵里香</label>
  						<span>W2 Solution Corporation</span>
  					</div>
  				</div>
  			</div>
			<div class="inter-bg">
				<div class="title-blk">
					<h2>インタビュー</h2>
				<a href="#" class="view-more-btn no-bg">一覧を見る</a>
				</div>


				<div class="inter-list">
				<div class="inter-blk">
					<img src="<?php echo get_template_directory_uri(); ?>/new/img/inter2.jpg" >
					<a href="#">インタビュータイトルを40文字程度で。インタビュータイトルを40文字程度で。</a>
					<div class="inter-name">
						<label>藤田 正樹</label>
						<span>EVOLABLE ASIA</span>
					</div>
				</div>

				<div class="inter-blk">
					<img src="<?php echo get_template_directory_uri(); ?>/new/img/inter3.jpg" >
					<a href="#">だいたいのことは筋肉で解決できるってことを日本人の先輩から教わりました。</a>
					<div class="inter-name">
						<label>David McNoname</label>
						<span>Aruka Naika Wakarana inc.</span>
					</div>
				</div>
				</div>
			</div>
  	</div>

  	 <div class="recommend-job">
   	<div class="container">
   		<div class="row">
   			<div class="col-md-12">
   				<h2>おすすめの求人</h2>
   			</div>
   		</div>
   		<div class="row">
   			<div class="col-md-3 col-sm-6">
   				<div class="job-blk">
   					<img src="<?php echo get_template_directory_uri(); ?>/new/img/j1.jpg" >
   					<a href="#">[未経験応募可] IT企業で
の筋肉ムキムキのプロジェ
クトマネージャー</a>
  					<div class="job-if"><img src="<?php echo get_template_directory_uri(); ?>/new/img/icon-money.png" > 1,800 - 3,000 USD</div>
  					<div class="job-if"><img src="<?php echo get_template_directory_uri(); ?>/new/img/icon-map.png" > 東京【23区】, 関東</div>
  					<span class="job-date">― 2018.04.01 UPDATE</span>
   				</div>
   			</div>
   			<div class="col-md-3 col-sm-6">
   				<div class="job-blk">
   					<img src="<?php echo get_template_directory_uri(); ?>/new/img/j2.jpg" >
   					<a href="#">自動車部品製造工場長</a>
  					<div class="job-if"><img src="<?php echo get_template_directory_uri(); ?>/new/img/icon-money.png" > 1,800 - 3,000 USD</div>
  					<div class="job-if"><img src="<?php echo get_template_directory_uri(); ?>/new/img/icon-map.png" > 東京【23区】, 関東</div>
  					<span class="job-date">― 2018.04.01 UPDATE</span>
   				</div>
   			</div>
   			<div class="col-md-3 col-sm-6">
   				<div class="job-blk">
   					<img src="<?php echo get_template_directory_uri(); ?>/new/img/j3.jpg" >
   					<a href="#">サービスアパートメント運
営責任者（ベトナム勤務、
筋力必須）</a>
  					<div class="job-if"><img src="<?php echo get_template_directory_uri(); ?>/new/img/icon-money.png" > 1,800 - 3,000 USD</div>
  					<div class="job-if"><img src="<?php echo get_template_directory_uri(); ?>/new/img/icon-map.png" > 東京【23区】, 関東</div>
  					<span class="job-date">― 2018.04.01 UPDATE</span>
   				</div>
   			</div>
   			<div class="col-md-3 col-sm-6">
   				<div class="job-blk">
   					<img src="<?php echo get_template_directory_uri(); ?>/new/img/j4.jpg" >
   					<a href="#">[経験不問]モバイルゲーム
運営ディレクター（中国語
必須）</a>
  					<div class="job-if"><img src="<?php echo get_template_directory_uri(); ?>/new/img/icon-money.png" > 1,800 - 3,000 USD</div>
  					<div class="job-if"><img src="<?php echo get_template_directory_uri(); ?>/new/img/icon-map.png" > 東京【23区】, 関東</div>
  					<span class="job-date">― 2018.04.01 UPDATE</span>
   				</div>
   			</div>
   			<div class="col-md-3 col-sm-6">
   				<div class="job-blk">
   					<img src="<?php echo get_template_directory_uri(); ?>/new/img/j5.jpg" >
   					<a href="#">ボディービルダートレーナ
ー募集（IT企業のトレーニ
ングメニュー作成）</a>
  					<div class="job-if"><img src="<?php echo get_template_directory_uri(); ?>/new/img/icon-money.png" > 1,800 - 3,000 USD</div>
  					<div class="job-if"><img src="<?php echo get_template_directory_uri(); ?>/new/img/icon-map.png" > 東京【23区】, 関東</div>
  					<span class="job-date">― 2018.04.01 UPDATE</span>
   				</div>
   			</div>
   			<div class="col-md-3 col-sm-6">
   				<div class="job-blk">
   					<img src="<?php echo get_template_directory_uri(); ?>/new/img/j6.jpg" >
   					<a href="#">【求人のタイトル】求人のタ
イトルを最大40文字ほど
でここに表示させるんです</a>
  					<div class="job-if"><img src="<?php echo get_template_directory_uri(); ?>/new/img/icon-money.png" > 1,800 - 3,000 USD</div>
  					<div class="job-if"><img src="<?php echo get_template_directory_uri(); ?>/new/img/icon-map.png" > 東京【23区】, 関東</div>
  					<span class="job-date">― 2018.04.01 UPDATE</span>
   				</div>
   			</div>
   			<div class="col-md-3 col-sm-6">
   				<div class="job-blk">
   					<img src="<?php echo get_template_directory_uri(); ?>/new/img/j7.jpg" >
   					<a href="#">サービスアパートメント運
営責任者（ベトナム勤務）</a>
  					<div class="job-if"><img src="<?php echo get_template_directory_uri(); ?>/new/img/icon-money.png" > 1,800 - 3,000 USD</div>
  					<div class="job-if"><img src="<?php echo get_template_directory_uri(); ?>/new/img/icon-map.png" > 東京【23区】, 関東</div>
  					<span class="job-date">― 2018.04.01 UPDATE</span>
   				</div>
   			</div><div class="col-md-3 col-sm-6">
   				<div class="job-blk">
   					<img src="<?php echo get_template_directory_uri(); ?>/new/img/j8.jpg" >
   					<a href="#">モバイルゲーム運営ディレ
クター（タンクトップ必須）</a>
  					<div class="job-if"><img src="<?php echo get_template_directory_uri(); ?>/new/img/icon-money.png" > 1,800 - 3,000 USD</div>
  					<div class="job-if"><img src="<?php echo get_template_directory_uri(); ?>/new/img/icon-map.png" > 東京【23区】, 関東</div>
  					<span class="job-date">― 2018.04.01 UPDATE</span>
   				</div>
   			</div>
   		</div>
   	</div>
   </div>
<?php get_footer(); ?>
