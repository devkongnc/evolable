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
		<h2>求人情報検索</h2>
	</div>

	<div class="container">
		<div class="row">
			<div class="col-md-12">
				<ul class="btn-section btn-3">
					<li><a class="current" href="#">勤務地から探す</a></li>
					<li><a href="#job" class="fancybox">職種から探す</a></li>
					<li><a href="#key-word" class="fancybox">キーワードから探す</a></li>

				</ul>
			</div>
		</div>
		<div class="row search-work">
			<div class="col-md-12">
				<h2 class="green-txt">勤務地から探す</h2>
				<div class="row nav nav-tabs">
                    <div class="col-md-4">
                        <ul>
                            <li class="active"><a data-toggle="tab" href="#tab1">地方から探す</a></li>
                            <li><a data-toggle="tab" href="#tab2">都道府県から探す</a></li>
                            <li><a data-toggle="tab" href="#tab3">海外から探す</a></li>
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
					                    <form action="<?php echo site_url( '/'.qtranxf_getLanguage().'/jobs/'); ?>" method="get">
					                        <input type="hidden" name="position" value="<?php echo $arlocation[0]->term_id ?>">
					                        <li><button type="submit"><?php echo $arlocation[0]->name ?></button></li>
					                    </form>
					                    <?php } ?>
                                    </ul>
                                </div>
                                <div id="tab3" class="tab-pane fade">
                                    <ul class="search-job-list">
                                    	<?php foreach ($plocations as $key => $arlocation) { ?>
					                    <form action="<?php echo site_url( '/'.qtranxf_getLanguage().'/jobs/'); ?>" method="get">
					                        <input type="hidden" name="position" value="<?php echo $arlocation[0]->term_id ?>">
					                        <li><button type="submit"><?php echo $arlocation[0]->name ?></button></li>
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
				<h2>最新求人情報</h2>
				<div class="recruit-blk">

						<img src="<?php echo get_template_directory_uri(); ?>/new/img/s1.jpg" >
						<a href="#">【経験必須】トレーニングマネージャー募集</a>
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
				<div class="recruit-blk">

						<img src="<?php echo get_template_directory_uri(); ?>/new/img/s2.jpg" >
						<a href="#">【経験必須】トレーニングマネージャー募集</a>
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
				<div class="recruit-blk">

						<img src="<?php echo get_template_directory_uri(); ?>/new/img/s3.jpg" >
						<a href="#">【経験必須】トレーニングマネージャー募集</a>
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
				<div class="recruit-blk">

						<img src="<?php echo get_template_directory_uri(); ?>/new/img/s4.jpg" >
						<a href="#">【経験必須】トレーニングマネージャー募集</a>
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
				<div class="recruit-blk">

						<img src="<?php echo get_template_directory_uri(); ?>/new/img/s5.jpg" >
						<a href="#">【経験必須】トレーニングマネージャー募集</a>
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

				<div class="center">
					<ul class="pagination-circle">
					<li class="current"><a href="#">1</a></li>
					<li><a href="#">2</a></li>
					<li><a href="#">3</a></li>
				</ul>
				</div>


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
						クトマネージャー
					</a>
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
						筋力必須）
					</a>
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
						必須）
					</a>
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
						ングメニュー作成）
					</a>
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
						でここに表示させるんです
					</a>
  					<div class="job-if"><img src="<?php echo get_template_directory_uri(); ?>/new/img/icon-money.png" > 1,800 - 3,000 USD</div>
  					<div class="job-if"><img src="<?php echo get_template_directory_uri(); ?>/new/img/icon-map.png" > 東京【23区】, 関東</div>
  					<span class="job-date">― 2018.04.01 UPDATE</span>
   				</div>
   			</div>
   			<div class="col-md-3 col-sm-6">
   				<div class="job-blk">
   					<img src="<?php echo get_template_directory_uri(); ?>/new/img/j7.jpg" >
   					<a href="#">サービスアパートメント運
						営責任者（ベトナム勤務）
					</a>
  					<div class="job-if"><img src="<?php echo get_template_directory_uri(); ?>/new/img/icon-money.png" > 1,800 - 3,000 USD</div>
  					<div class="job-if"><img src="<?php echo get_template_directory_uri(); ?>/new/img/icon-map.png" > 東京【23区】, 関東</div>
  					<span class="job-date">― 2018.04.01 UPDATE</span>
   				</div>
   			</div><div class="col-md-3 col-sm-6">
   				<div class="job-blk">
   					<img src="<?php echo get_template_directory_uri(); ?>/new/img/j8.jpg" >
   					<a href="#">モバイルゲーム運営ディレ
						クター（タンクトップ必須）
					</a>
  					<div class="job-if"><img src="<?php echo get_template_directory_uri(); ?>/new/img/icon-money.png" > 1,800 - 3,000 USD</div>
  					<div class="job-if"><img src="<?php echo get_template_directory_uri(); ?>/new/img/icon-map.png" > 東京【23区】, 関東</div>
  					<span class="job-date">― 2018.04.01 UPDATE</span>
   				</div>
   			</div>
   		</div>
   	</div>
   </div>
<?php
get_footer();