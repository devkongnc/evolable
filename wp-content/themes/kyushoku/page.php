<?php
get_header();
get_sidebar();
?>
<?php
	//display db admin

	/*while ( have_posts() ) : the_post();

		the_content();

	endwhile; // End of the loop.*/




?>
<!-- page search -->
<div class="right-content">
	<div class="breadcrumb-bg">
		<h2>
		<?php if (qtrans_getLanguage()=='ja'){ ?>
            求人情報検索
        <?php }else if (qtrans_getLanguage()=='vi'){ ?>
            求人情報検索
        <?php }else if (qtrans_getLanguage()=='en'){ ?>
            求人情報検索
        <?php } ?>
    </h2>
	</div>

	<div class="container">
		<div class="row">
			<div class="col-md-12">
				<ul class="btn-section btn-3">
				<?php if (qtrans_getLanguage()=='ja'){ ?>
		            <li><a class="current" href="#">勤務地から探す</a></li>
					<li><a href="#job" class="fancybox">職種から探す</a></li>
					<li><a href="#key-word" class="fancybox">キーワードから探す</a></li>
		        <?php }else if (qtrans_getLanguage()=='vi'){ ?>
		            <li><a class="current" href="#">勤務地から探す</a></li>
					<li><a href="#job" class="fancybox">職種から探す</a></li>
					<li><a href="#key-word" class="fancybox">キーワードから探す</a></li>
		        <?php }else if (qtrans_getLanguage()=='en'){ ?>
		            <li><a class="current" href="#">勤務地から探す</a></li>
					<li><a href="#job" class="fancybox">職種から探す</a></li>
					<li><a href="#key-word" class="fancybox">キーワードから探す</a></li>
		        <?php } ?>


				</ul>
			</div>
		</div>
		<div class="row search-work">
			<div class="col-md-12">
				<h2 class="green-txt">
				<?php if (qtrans_getLanguage()=='ja'){ ?>
		            勤務地から探す
		        <?php }else if (qtrans_getLanguage()=='vi'){ ?>
		            勤務地から探す
		        <?php }else if (qtrans_getLanguage()=='en'){ ?>
		            勤務地から探す
		        <?php } ?>
    			</h2>
				<div class="row nav nav-tabs">
                    <div class="col-md-4">
                        <ul>
                    	<?php if (qtrans_getLanguage()=='ja'){ ?>
				            <li class="active"><a data-toggle="tab" href="#tab1">地方から探す</a></li>
                            <li><a data-toggle="tab" href="#tab2">都道府県から探す</a></li>
                            <li><a data-toggle="tab" href="#tab3">海外から探す</a></li>
				        <?php }else if (qtrans_getLanguage()=='vi'){ ?>
				            <li class="active"><a data-toggle="tab" href="#tab1">地方から探す</a></li>
                            <li><a data-toggle="tab" href="#tab2">都道府県から探す</a></li>
                            <li><a data-toggle="tab" href="#tab3">海外から探す</a></li>
				        <?php }else if (qtrans_getLanguage()=='en'){ ?>
				            <li class="active"><a data-toggle="tab" href="#tab1">地方から探す</a></li>
                            <li><a data-toggle="tab" href="#tab2">都道府県から探す</a></li>
                            <li><a data-toggle="tab" href="#tab3">海外から探す</a></li>
				        <?php } ?>

                        </ul>
                    </div>
                    <div class="col-md-8">
                        <div class="tab-content">
                                <div id="tab1" class="tab-pane fade in active">
                                    <div class="maps-wraper">
                                        <div class="map-text-area">
                                            <img src="<?php echo get_template_directory_uri(); ?>/new/map-japan.png" usemap="#image-map">
                                            <map name="image-map" >
                                                <span class="lightred-txt area1">Kyushu-Okinawa</span>
                                                <span class="yellow-txt area2">Chugoku</span>
                                                <span class="pink-txt area3">Kansai</span>
                                                <span class="green-txt area4">Koushinetsu</span>
                                                <span class="emeral-txt area5">Shikoku</span>
                                                <span class="lightblue-txt area6">Tokai</span>
                                                <span class="orange-txt area7">Kanto</span>
                                                <span class="sky-txt area8">Tohoku</span>
                                                <span class="blue-txt area9">Hokkaido</span>

                                                <area id="kyushu-okinawa" value="108" href="#" coords="103,364,125,364,125,401,103,401,103,382,103,372" shape="poly">
                                                <area id="kyushu-okinawa" value="108" href="#" coords="131,289,149,289,149,293,204,293,204,382,176,390,176,376,168,376,168,386,151,386,151,348,155,348,155,319,151,319,151,334,131,334" shape="poly">

                                                <area id="shikoku" value="" href="#" coords="216,330,253,323,252,338,263,338,263,323,299,324,301,382,269,382,269,370,252,370,252,379,216,379,216,355" shape="poly">
                                                <area id="chugoku" value="" href="#" coords="208,281,231,263,289,263,289,313,208,313" shape="poly">

                                                <area id="kansai" value="107" href="#" coords="348,355,348,298,369,298,369,277,328,277,328,263,289,263,289,313,316,313,316,355" shape="poly">
                                                <area id="kansai" value="107" href="#" coords="304,316,313,316,313,330,304,330" shape="poly">

                                                <area id="tokai" value="124" href="#" coords="368,355,368,316,376,316,376,334,421,335,435,322,435,330,452,330,452,317,445,317,445,304,406,304,406,299,399,300,399,258,377,258,377,277,370,277,370,298,348,298,348,355" shape="poly">
                                                <area id="koushinetsu" value="351" href="#" coords="341,255,354,248,354,223,377,222,377,232,434,198,434,238,425,238,424,290,441,290,441,304,406,303,406,300,399,300,399,258,377,257,377,277,328,277,328,263,341,263" shape="poly">
                                                <area id="kanto" value="3" href="#" coords="474,316,474,293,480,293,480,316,474,316,510,316,509,267,502,260,501,238,425,238,424,290,441,290,441,304,445,304,445,317" shape="poly">
                                                <area id="tohoku" value="114" href="#" coords="471,106,494,106,494,125,507,134,507,169,501,174,501,238,434,238,434,115,458,115,458,120,471,120" shape="poly">
                                                <area id="hokkaido" value="350" href="#" coords="453,0,478,0,533,49,552,49,552,91,524,90,498,100,477,90,466,90,466,102,434,102,434,73,452,58" shape="poly">
                                            </map>
                                        </div>
                                    </div>
                                    <form id="form-maps" action="<?php echo site_url( '/'.qtranxf_getLanguage().'/jobs/'); ?>" method="get">
                                        <input class="location-name" type="hidden" name="location" value="">
                                    </form>
                                </div>
                                <?php
								    $plocations = get_locations();
								?>
                                <div id="tab2" class="tab-pane fade">
                                    <ul class="search-job-list">
                                    	<?php foreach ($plocations as $key => $arlocation) { ?>
                                    	<?php if ($arlocation[0]->count > 0 && $arlocation[0]->parent != 0 && $arlocation[0]->parent != 353 && $arlocation[0]->parent != 354 && $arlocation[0]->parent != 355) { ?>
					                    <form action="<?php echo site_url( '/'.qtranxf_getLanguage().'/jobs/'); ?>" method="get">
					                        <input type="hidden" name="location" value="<?php echo $arlocation[0]->term_id ?>">
					                        <li><button type="submit"><?php echo $arlocation[0]->name ?></button></li>
					                    </form>
					                   	<?php } ?>
					                    <?php } ?>
                                    </ul>
                                </div>
                                <div id="tab3" class="tab-pane fade">
                                    <ul class="search-job-list">
                                    	<?php
                                    	$oj_id = 353;
										$oj_taxonomy_name = 'job-location';
										$term_children = get_term_children( $oj_id, $oj_taxonomy_name );
										?>
                                    	<?php foreach ( $term_children as $child ) { ?>
											<?php $term = get_term_by( 'id', $child, $oj_taxonomy_name ); ?>
											<form action="<?php echo site_url( '/'.qtranxf_getLanguage().'/jobs/'); ?>" method="get">
						                        <input type="hidden" name="location" value="<?php echo $child; ?>">
						                        <li><button type="submit"><?php echo $term->name ?></button></li>
						                    </form>
										<?php } ?>
                                    </ul>
                                </div>
                        </div>
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
					<?php get_template_part( 'template-parts/navigation/navigation', 'grouplink' ); ?>
				</ul>
			 </div>
		</div>
	</div>
</div>


<div class="recruit-list">
  	<div class="container">
		<div class="row">
			<div class="col-md-12">
				<h2>
				<?php if (qtrans_getLanguage()=='ja'){ ?>
			            最新求人情報
			        <?php }else if (qtrans_getLanguage()=='vi'){ ?>
			           	最新求人情報
			        <?php }else if (qtrans_getLanguage()=='en'){ ?>
			            最新求人情報
			        <?php } ?></h2>

				<?php
				$paged = ( get_query_var( 'paged' ) ) ? absint( get_query_var( 'paged' ) ) : 1;
              //  global $post;

                $argsJobs = array(
                    'posts_per_page' => 5,
                    'post_type' => 'jobs',
                    'post_status'=>'publish',
                    'orderby' => 'post_date',
                    'order' => 'DESC',
                    'paged'			 => $paged

                );
             $wp_query1 = new WP_Query( $argsJobs );
                if ($wp_query1->have_posts()) {
                    while( $wp_query1->have_posts() ) : $wp_query1->the_post();
                        setup_postdata($post);
                        $term_positions = get_the_terms($post->ID, "job-position");
                        $term_locations = get_the_terms($post->ID, 'job-location');
                       // print_r($termCompany);
                        ?>

                        <div class="recruit-blk">
                        	<img src="<?php
							if ( get_field('default_image') ) {
								echo get_field('default_image');
							}
							else {
								echo get_template_directory_uri()."/images/recruitment/img-4.png";
							}
						?>" alt="<?php the_title();?>" />

						<a href="<?php echo get_permalink($post->ID); ?>"><?php the_title(); ?></a>
						<ul class="tags-list">
							<?php
							if($term_positions){
							foreach ($term_positions as $position) {
							 //$cate_link = get_term_link( $position->term_id );
							 ?>
								<li><a href="<?php echo get_permalink($post->ID); ?>"><?php echo $position->name; ?></a></li>
							<?php } } ?>
						</ul>
						<ul class="recruit-if">
							<li><img src="<?php echo get_template_directory_uri(); ?>/new/img/icon-money.png">
							<?php
							 if ( !is_null(get_field('salary')) ) :
								echo mb_strimwidth(wp_strip_all_tags(get_field('salary')), 0, 80, '...');
							endif; ?></li>
							<li><img src="<?php echo get_template_directory_uri(); ?>/new/img/icon-map.png">
							<?php
							if($term_locations){
							foreach ($term_locations as $location) {
							echo $location->name . ", ";
							} } ?>
						</li>
						</ul>
						<p>
							<?php
							 if ( !is_null(get_field('description')) ) :
								echo mb_strimwidth(wp_strip_all_tags(get_field('description')), 0, 150, '...');
							endif; ?>

						</p>
						<span class="recruit-date">― <?php the_modified_time('Y.m.d'); ?> UPDATED</span>
						<a href="<?php echo get_permalink($post->ID); ?>" class="view-more-btn">
						<?php if (qtrans_getLanguage()=='ja'){ ?>
		                	詳細を見る
			            <?php }else if (qtrans_getLanguage()=='vi'){ ?>
			                詳細を見る
			            <?php }else if (qtrans_getLanguage()=='en'){ ?>
			                詳細を見る
			            <?php } ?>
        			</a>
				</div>



                    <?php
                    endwhile;
                    wp_reset_postdata();
                }
            ?>


				<div class="row row-recrui">
		<?php if (function_exists('agent_pagenavi')) agent_pagenavi($wp_query1); ?>
		<!-- /PAGINATION -->
	</div>


			</div>
		</div>
	</div>
</div>

	<?php get_template_part( 'template-parts/content/content', 'recruitment' ); ?>
<?php
get_footer();