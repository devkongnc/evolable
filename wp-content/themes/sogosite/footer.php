<!--.FOOTER -->
	<div class="footer">
   		<p>©2018 EVOLABLE ASIA AGENT Co,. Ltd. </p>
   </div>

</div>

<a id="back_to_top" href="#">
	<span class="fa-stack">
		<i class="fa  fa-angle-up"></i>
	</span>
</a>

<div class="modal-box" id="place-box" style="display:none;">
	<div class="search-work">
		<div class="col-md-12">
			<h2 class="green-txt">勤務地から探す</h2>
				<div class="row">
					<div class="col-md-4">
						<ul>
                            <li class="active"><a data-toggle="tab" href="#tab1">地方から探す</a></li>
                            <li><a data-toggle="tab" href="#tab2">都道府県から探す</a></li>
                            <li><a data-toggle="tab" href="#tab3">海外から探す</a></li>
                        </ul>
					</div>
					<div class="col-md-8">
						<?php switch_to_blog(2); ?>
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
							$taxonomies = array('job-location');
							$check_later = array();
						    global $wp_taxonomies;
						    foreach($taxonomies as $taxonomy){
						        if (isset($wp_taxonomies[$taxonomy])){
						            $check_later[$taxonomy] = false;
						        } else {
						            $wp_taxonomies[$taxonomy] = true;
						            $check_later[$taxonomy] = true;
						        }
						    }

						    $args       = array('hide_empty' => false);
						    $plocations      = get_terms($taxonomies, $args );
						    // var_dump($terms);
							?>
                            <div id="tab2" class="tab-pane fade">
                                <ul class="search-job-list">
                                    <?php foreach ($plocations as $arlocation) { ?>
                                    <?php if ($arlocation->count > 0 && $arlocation->parent != 0 && $arlocation->parent != 353 && $arlocation->parent != 354 && $arlocation->parent != 355) { ?>
                                    <form action="<?php echo site_url( '/'.qtranxf_getLanguage().'/jobs/'); ?>" method="get">
                                        <input type="hidden" name="location" value="<?php echo $arlocation->term_id ?>">
                                        <li><button type="submit"><?php echo $arlocation->name ?></button></li>
                                    </form>
                                    <?php } ?>
                                    <?php } ?>
                                </ul>
                            </div>
                            <div id="tab3" class="tab-pane fade">
                                <ul class="search-job-list">
                                    <?php foreach ($plocations as $arlocation) { ?>
                                    <?php if ($arlocation->parent != 0 && $arlocation->parent == 353 || $arlocation->parent == 354 || $arlocation->parent == 355) { ?>
                                    <form action="<?php echo site_url( '/'.qtranxf_getLanguage().'/jobs/'); ?>" method="get">
                                        <input type="hidden" name="location" value="<?php echo $arlocation->term_id ?>">
                                        <li><button type="submit"><?php echo $arlocation->name ?></button></li>
                                    </form>
                                    <?php } ?>
                                    <?php } ?>
                                </ul>
                            </div>
                    	</div>
					</div>
				</div>
		</div>
	</div>
</div>

<div class="modal-box" id="job" style="display:none;">
	<div class="search-work">
		<div class="col-md-12">
			<h2 class="green-txt">職種から探す</h2>
			<div class="center">
				<ul class="search-job-list">
					<?php
					$tax_position = array('job-position');
					$check_later = array();
				    global $wp_taxonomies;
				    foreach($tax_position as $taxonomy){
				        if (isset($wp_taxonomies[$taxonomy])){
				            $check_later[$taxonomy] = false;
				        } else {
				            $wp_taxonomies[$taxonomy] = true;
				            $check_later[$taxonomy] = true;
				        }
				    }

				    $args       = array('hide_empty' => false);
				    $ppositions      = get_terms($tax_position, $args );
				    // var_dump($terms);
					?>
					<?php foreach ($ppositions as $arposition) { ?>
                    <form action="<?php echo site_url( '/'.qtranxf_getLanguage().'/jobs/'); ?>" method="get">
                        <input type="hidden" name="location" value="<?php echo $arposition->term_id ?>">
                        <li><button type="submit"><?php echo $arposition->name ?></button></li>
                    </form>
                    <?php } ?>
				</ul>
			</div>
		</div>
	</div>
</div>

<div class="modal-box" id="key-word" style="display:none;">

<div class="search-work">
		<div class="col-md-12">
			<h2 class="green-txt">キーワードから探す</h2>
			<div class="big-search">
                <form action="<?php echo site_url( '/'.qtranxf_getLanguage().'/jobs/'); ?>" method="get">
                    <input type="text" id="keyword" name="keyword" value="<?php if (isset($_GET['keyword'])) echo $_GET['keyword']; ?>">
                    <input type="submit" value="" class="big-search-btn" >
                </form>
            </div>
		</div>
	</div>
</div>
<?php restore_current_blog(); ?>

<!-- css maps -->
<style type="text/css">
    .maps-wraper{transform: scale(0.9)}
    .map-text-area{width: 620px;}
    .lightred-txt{color:#dc7c7d}
    .yellow-txt{color:#eec700}
    .pink-txt{color:#c62f72}
    .green-txt{color:#63b400}
    .emeral-txt{color:#7ddcc8}
    .lightblue-txt{color:#637cb4}
    .orange-txt{color:#ef9500}
    .sky-txt{color:#0095c7}
    .blue-txt{color:#005ac8}
    .map-text-area{position:relative;}
    .map-text-area span{font-weight:900;font-size:18px;min-width:120px;}
    .area1{position:absolute;top:247px;left:0;}
    .area2{position:absolute;top:208px;left:125px;}
    .area3{position:absolute;top:165px;left:200px;}
    .area4{position:absolute;top:106px;left:214px;}
    .area5{position:absolute;top:404px;left:270px;}
    .area6{position:absolute;top:404px;left:429px;}
    .area7{position:absolute;top:292px;left:540px;}
    .area8{position:absolute;top:160px;left:540px;}
    .area9{position:absolute;top:24px;left:322px;}
</style>

<!-- js new -->
<script src="<?php echo get_template_directory_uri(); ?>/new/js/jquery.min.js"></script>
<script src="<?php echo get_template_directory_uri(); ?>/new/js/bootstrap.min.js"></script>
<script src="<?php echo get_template_directory_uri(); ?>/new/js/twitter-bootstrap-hover-dropdown.min.js"></script>
<script src="<?php echo get_template_directory_uri(); ?>/new/js/waypoints.min.js"></script>
<script src="<?php echo get_template_directory_uri(); ?>/new/js/jquery.easing.min.js"></script>
<script src="<?php echo get_template_directory_uri(); ?>/new/js/TweenLite.min.js"></script>
<script src="<?php echo get_template_directory_uri(); ?>/new/js/smoothPageScroll.js"></script>
<script src="<?php echo get_template_directory_uri(); ?>/new/js/jquery.nicescroll.min.js"></script>
<script src="<?php echo get_template_directory_uri(); ?>/new/js/owl.carousel.min.js"></script>
<script src="<?php echo get_template_directory_uri(); ?>/new/js/jquery.fancybox.js"></script>
<script src="<?php echo get_template_directory_uri(); ?>/new/js/scripts.js"></script>
<script type="text/javascript">
$(document).ready(function() {
		$('area').each(function(){
            $(this).click(function(){
                $('.location-name').val($(this).attr('value'));
                $('#form-maps').submit();
            });
        });
		$(".fancybox").fancybox();
		$('.column-carousel').owlCarousel({
			loop:true,
			items:3,
			margin:20,
			nav:true,
			responsive:{
				0:{
					items:1
				},
				600:{
					items:2
				},
				1000:{
					items:3
				}
			}
		});
});
</script>
<script src="<?php echo get_template_directory_uri(); ?>/new/js/wow.min.js"></script>
<script>new WOW().init();</script>


	    <?php wp_footer(); ?>
	</body>
</html>
