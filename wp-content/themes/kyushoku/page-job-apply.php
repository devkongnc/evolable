<?php
if( !isset( $_GET['id'] ) && $_GET['id'] != '' ) {
	wp_die();
}
global $wp;
$job_id = $_GET['id'];
$lang = qtranxf_getLanguage();
$output = array();
if( isset( $_POST ) && !empty( $_POST ) ) {
	$validate = true;
	add_filter( 'upload_dir', 'wp_jobs_upload_dir' );
	$upload_dir = wp_upload_dir();
	$base_dir = $upload_dir['path']; //print_r($upload_dir); die();

	if( $_POST['name'] == '' ) {
		$validate = false;
		$output['name'] = 'error';
	}
	if( $_POST['phone_number'] == '' ) {
		$validate = false;
		$output['phone_number'] = 'error';
	}
	if( !is_email( $_POST['email'] ) ) {
		$validate = false;
		$output['email'] = 'error';
	}

	if( $_FILES["file_cv"]['name'] != '' ) {
		$file1 = $_FILES["file_cv"]['name'];
		$path1 = $base_dir.'/'.$file1;
	} else {
		$file1 = '';
		$path1 = '';
	}

	if( $_FILES["file_other"]['name'] != '' ) {
		$file2 = $_FILES["file_other"]['name'];
		$path2 = $base_dir.'/'.$file2;
	} else {
		$file2 = '';
		$path2 = '';
	}

	if( $validate == true ) {
		$cv_file = '';
		$other_file = '';

		if( move_uploaded_file( $_FILES["file_cv"]["tmp_name"], $path1 ) ) {
			$cv_file = $upload_dir['url'].'/'.$file1;
		}

		if( move_uploaded_file( $_FILES["file_other"]["tmp_name"], $path2 ) ) {
			$other_file = $upload_dir['url'].'/'.$file2;
		}
		$arrData =  array(
			'apply_date' => date( 'Y-m-d H:i:s' ),
			'name' => $_POST['name'],
			'phone_number' => $_POST['phone_number'],
			'email' => $_POST['email'],
			'expected_salary' => $_POST['expected_salary'],
			'job_id' => $_POST['job_id'],
			'job_no' => $_POST['job_no'],
			'job_title' => $_POST['job_title'],
			'cv_file' => $cv_file,
			'other_file' => $other_file,
			'request' => $_POST['request'],
			'language' => $lang
		);
		$wpdb->insert( $wpdb->prefix.'job_candidates',$arrData);
	}
}
$job_apply_wpnonce = wp_create_nonce('job_apply_wpnonce');
get_header();
get_sidebar();
?>
<div class="right-content">
	<div id="job-apply">
		<div class="breadcrumb-bg">
			<h2>APPLICANT FORM</h2>
		</div>
		<div class="container">
			<div class="row">
				<div class="col-md-12">
					<ul class="btn-section btn-3">
						<li><a href="<?php echo get_site_url(); ?>">
						<?php if (qtrans_getLanguage()=='ja'){ ?>
				            求人情報
				        <?php }else if (qtrans_getLanguage()=='vi'){ ?>
				            求人情報
				        <?php }else if (qtrans_getLanguage()=='en'){ ?>
				            求人情報
				        <?php } ?>
				     	</a></li>
						<li><a href="<?php echo str_replace("/recruitment/".qtranxf_getLanguage()."/","/top/".qtranxf_getLanguage()."/",get_site_url().'/'.qtranxf_getLanguage().'/column-index'); ?>">
						<?php if (qtrans_getLanguage()=='ja'){ ?>
				            コラム
				        <?php }else if (qtrans_getLanguage()=='vi'){ ?>
				            コラム
				        <?php }else if (qtrans_getLanguage()=='en'){ ?>
				            コラム
				        <?php } ?>
					    </a></li>
							<li><a href="<?php echo str_replace("/recruitment/".qtranxf_getLanguage()."/","/top/".qtranxf_getLanguage()."/",get_site_url().'/'.qtranxf_getLanguage().'/interviews'); ?>">
							<?php if (qtrans_getLanguage()=='ja'){ ?>
					            INTERVIEW
					        <?php }else if (qtrans_getLanguage()=='vi'){ ?>
					            INTERVIEW
					        <?php }else if (qtrans_getLanguage()=='en'){ ?>
					            INTERVIEW
					        <?php } ?>
					    </a></li>
					</ul>
				</div>
			</div>

			<div id="cont-apply-job" class="row company-if">
				<div class="col-md-4">
					<h1>
					<?php if (qtrans_getLanguage()=='ja'){ ?>
			            こちらに応募する場合、
						下記をご記入ください。
			        <?php }else if (qtrans_getLanguage()=='vi'){ ?>
			            こちらに応募する場合、
						下記をご記入ください。
			        <?php }else if (qtrans_getLanguage()=='en'){ ?>
			            こちらに応募する場合、
						下記をご記入ください。
			        <?php } ?>
	        		</h1>

				</div>
				<div class="col-md-8">
					<div class="row">
						<div class="col-md-4">
							<?php
							if( get_field('default_image', $job_id) ) {
								$src = get_field('default_image', $job_id);
							} else {
								$src = get_template_directory_uri()."/images/apply_job/img_job.jpg";
							} ?>
		                    <img class="img-responsive" src="<?php echo $src; ?>"/>
						</div>
						<div class="col-md-8">
							<h2><?php echo get_post_field( 'post_title', $job_id ); ?> </h2>
							<p>■No.<?php echo get_post_meta( $job_id, 'job_no', true ); ?></p>

					        <div class="toogle-benefit">
	            					<p>■<?php echo mb_strimwidth(wp_strip_all_tags(get_post_meta( $job_id, 'benefits', true )), 0, 80, '...'); ?></p>
	                         	</div>

							<div class="right">
								<a href="<?php echo get_permalink($job_id); ?>" class="view-more-btn">詳細に戻る</a>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>

	    <div class="form-content gray-bg">
			<div id="apply-form" class="container-fluid">
			    <div class="container">
			        <div class="row">
			            <div class="col-xs-12 col-md-12 col-lg-12">
			                <form action="" method="POST" enctype="multipart/form-data;charset=utf-8" class="row cont-apply-form">
			                	<input type="hidden" name="action" value="job_apply">
			                	<input type="hidden" name="_wpnonce" id="_wpnonce" value="<?php echo $job_apply_wpnonce; ?>">
			                	<input type="hidden" name="job_id" value="<?php echo $job_id; ?>">
			                	<input type="hidden" name="job_no" value="<?php echo get_post_meta( $job_id, 'job_no', true ); ?>">
			                	<input type="hidden" name="job_title" value="<?php echo get_post_field( 'post_title', $job_id ); ?>">
			                	<!-- <input type="hidden" name="url" value="<?php echo home_url( add_query_arg( array(), $wp->request ) ); ?>"> -->
			                    <div class="panel-default">

			                        <div class="panel-body body-apply-form">
			                            <div class="row">

			                                <div class="col-md-6">
			                                    <div class="form-horizontal">
			                                        <div class="row form-group">
			                                            <label class="col-md-offset-1 col-xs-4 col-sm-4 col-md-3 control-label required" for="name">
			                                            <span><?php echo __('[:ja]お名前[:en]Name[:vi]Họ và tên'); ?></span>
			                                            <span class="txt-red txt-required"><?php echo __('[:ja]「必須」[:en][Required][:vi][Bắt buộc]'); ?></span>
			                                            </label>
			                                            <div class="col-xs-8 col-sm-8 col-md-8">
			                                                <input id="name" name="name" type="text" placeholder="" class="form-control input-md <?php echo isset( $output['name'] ) ? 'error' : ''; ?>">
			                                            </div>
			                                        </div>
			                                        <div class="row form-group">
			                                            <label class="col-md-offset-1 col-xs-4 col-sm-4 col-md-3 control-label required" for="email">
			                                            <span><?php echo __('[:ja]<dt class="sp-only-fs">メールアドレス</dt>[:en]Email[:vi]Email'); ?></span>
			                                            <span class="txt-red txt-required"><?php echo __('[:ja]「必須」[:en][Required][:vi][Bắt buộc]'); ?></span>
			                                            </label>
			                                            <div class="col-xs-8 col-sm-8 col-md-8">
			                                                <input id="email" name="email" type="text" placeholder="" class="form-control input-md <?php echo isset( $output['email'] ) ? 'error' : ''; ?>">
			                                            </div>
			                                        </div>
			                                        <div class="row form-group have-fileupload">
			                                            <label class="col-md-offset-1 col-xs-4 col-sm-4 col-md-3 control-label" for="file_cv">
			                                            <span>CV</span>
			                                            </label>
			                                            <div class="col-xs-8 col-sm-8 col-md-8">
			                                                <input id="file_cv" name="file_cv" class="input-file" type="file">
			                                                <label for="file_cv" class=""><?php echo __('[:ja]ファイルを選択[:en]Choose file[:vi]Chọn tập tin'); ?></label>
			                                                <span class="btn btn-default"><span class="glyphicon glyphicon-ok"></span></span>
			                                                <p id="des_file_cv" class="txt-ex cv-description"><?php _e('[:ja].doc, .docx, .pdf, .xls, .xlsx, .zip, .rarのファイル形式のみをアップしてください[:vi]Chúng tôi chấp nhận .doc .docx, .pdf,.xls, .xlsx, .zip, .rar[:en]We accept .doc .docx, .pdf, .xls, .xlsx, .zip, .rar');?></p>
			                                            </div>
			                                        </div>
			                                    </div>
			                                </div>

			                                <div class="col-md-6">
			                                    <div class="form-horizontal">
			                                        <div class="row form-group">
			                                            <label class="col-xs-4 col-sm-4 col-md-3 control-label required" for="phone_number">
			                                            <span><?php echo __('[:ja]電話番号[:en]Phone[:vi]Số điện thoại'); ?></span>
			                                            <span class="txt-red txt-required"><?php echo __('[:ja]「必須」[:en][Required][:vi][Bắt buộc]'); ?></span>
			                                            </label>
			                                            <div class="col-xs-8 col-sm-8 col-md-8">
			                                                <input id="phone_number" name="phone_number" type="number" placeholder="" class="form-control input-md <?php echo isset( $output['phone_number'] ) ? 'error' : ''; ?>">
			                                            </div>
			                                        </div>
			                                        <div class="row form-group">
			                                            <label class="col-xs-4 col-sm-4 col-md-3 control-label" for="expected_salary"><?php echo __('[:ja]希望年収 <br>[万円][:en]Desired salary[:vi]Mức lương mong muốn'); ?></label>
			                                            <div class="col-xs-8 col-sm-8 col-md-8">
			                                                <input id="expected_salary" name="expected_salary" type="number" placeholder="" class="form-control input-md">
			                                            </div>
			                                        </div>
			                                        <div class="row form-group have-fileupload">
			                                            <label class="col-xs-4 col-sm-4 col-md-3 control-label" for="file_other">
			                                            <span><?php echo __('[:ja]その他添付<br class="sp-only-460">ファイル[:en]Other file[:vi]Tài liệu đính kèm'); ?></span>
			                                            </label>
			                                            <div class="col-xs-8 col-sm-8 col-md-8">
			                                                <input id="file_other" name="file_other" class="input-file" type="file">
			                                                <label for="file_other" class=""><?php echo __('[:ja]ファイルを選択[:en]Choose file[:vi]Chọn tập tin'); ?></label>
			                                                <span class="btn btn-default"><span class="glyphicon glyphicon-ok"></span></span>
			                                                <p id="des_file_other" class="txt-ex cv-description"><?php _e('[:ja].doc, .docx, .pdf, .xls, .xlsx, .zip, .rarのファイル形式のみをアップしてください[:vi]Chúng tôi chấp nhận .doc .docx, .pdf,.xls, .xlsx, .zip, .rar[:en]We accept .doc .docx, .pdf, .xls, .xlsx, .zip, .rar');?></p>
			                                            </div>
			                                        </div>
			                                    </div>
			                                </div>

			                            </div>
			                            <div class="row">
			                                <div class="col-md-12">
			                                    <div class="form-horizontal">
			                                        <div class="row form-group form-group-comment">
			                                            <label class="col-xs-12 col-sm-4 col-md-2 control-label lb-comment" for="request"><?php echo __('[:ja]その他ご要望[:en]Other wishes[:vi]Mong muốn khác'); ?></label>
			                                            <div class="col-xs-12 col-sm-8 col-md-10 ">
			                                                <textarea class="form-control" id="request" name="request"></textarea>
			                                            </div>
			                                        </div>
			                                    </div>
			                                </div>
			                                <div class="col-md-12">
			                                    <div class="term-content">
			                                    	<?php echo __('[:ja]監査責任者を選任し、個人情報の保護に関する実践と運用状況の内部監査を実施します。<br>
		                お取引先の企業および個人に対し、個人情報の保護に係わる協力を要請します。<br>
		                基本方針は、当社のホームページ（http://agent.evolable.asia/）に掲載することにより、いつでもどなたにも閲覧可能な状態とします。個人情報に関するお問い合わせにつきましてもホームページ掲載の窓口にて受付いたします。<br>
		                個人情報保護マネジメントシステムは適宜見直しをし、継続的に改善します。<br>
		                1.個人情報の取得および利用について<br>
		                個人情報のご提供をお願いする際には、あらかじめその利用目的を明示いたします。 また、ご提供頂きました個人情報は、以下に記載する利用目的の範囲内で利用し、皆様の同意なく利用目的以外に使用することはありません。<br>

		                万一、当該目的以外の目的で利用する場合や、利用目的そのものを変更する場合は事前に速やかに告知いたします。<br>

		                また利用目的に照らして不要となった個人情報については速やかに且つ適正に削除・廃棄いたします。<br>

		                個人情報の種類 利用目的 <br>
		                新規の有料職業紹介事業者の情報 当社で開催するセミナー及び当社サービスのご案内のため。 <br>
		                メールマガジンの配信情報 当社で開催するセミナー及び当社サービスのご案内のため。 <br>
		                一般に公開されているHPなどの情報ならびに書籍の情報 当社で開催するセミナー及び当社サービスのご案内のため。 <br>
		                当社で開催するセミナーへのお申込み、アンケートでご提出いただいた情報 次回以降のセミナーのご案内のため。当社商品・サービスの評価のため。その他、個別にご同意いただいた利用目的のため。 <br>
		                お客様に関する情報 お客様管理、営業活動、各種ご連絡、季節のご挨拶状送付のため。 <br>
		                サポートへお問合せ頂いた情報 お問い合わせへのご回答のため。 <br>
		                他の事業者から個人情報の処理の全部または一部について委託された場合等（データ移行等） 委託された当該業務の利用目的の範囲内において適切且つ円滑な遂行のため。 <br>
		                制作会社様・転職ポータルサイト様の情報 商談上のご連絡のため。 <br>
		                採用応募者の情報 選考ならびに採用希望者へのご連絡のため。 <br>
		                当社従業員、その家族または退職者を含む関係者等の情報 当社従業員の労務管理のため。 <br>



		                2.個人情報の第三者への開示・提供について<br>
		                当社は、以下のいずれかに該当する場合を除き、個人情報を第三者へ開示または提供しません。 <br>

		                ご本人の同意がある場合<br>
		                個人情報の取扱に関する業務の全部または一部を委託する場合<br>
		                （但しこの場合、当社は委託先との間で個人情報保護に関する契約を締結する等、委託先の適切な監督に努めます。）<br>
		                統計的なデータなどご本人を識別することができない状態で開示・提供する場合<br>
		                法令に基づき開示・提供を求められた場合<br>
		                人の生命、身体または財産の保護のために必要な場合であって、ご本人の同意を得ることが困難である場合<br>
		                公衆衛生の向上又は児童の健全な育成の推進のために特に必要がある場合であって、本人の同意を得ることが困難であるとき<br>
		                国または地方公共団体等が公的な事務を実施するうえで、協力する必要がある場合であって、ご本人の同意を得ることにより当該事務の遂行に支障を及ぼすおそれがある場合<br>
		                3.個人情報の共同利用について<br>
		                当社は、他社と合同セミナーを開催する場合に、個人情報を共同利用することがあります。この場合には、予め利用目的等を通知又は公表いたします。また、安全管理が図られるよう、個人情報の共同利用に関する契約の締結や適切な管理を行います。<br>
		                <br>
		                4.個人情報の取り扱いに関する委託について<br>
		                当社は、利用目的の達成に必要な範囲内において、他の事業者へ個人情報を委託することがあります。この場合には、個人情報保護体制が整備された委託先を選定するとともに、個人情報保護に関する契約を締結いたします。<br>


		                5.個人情報に関する権利（開示等、訂正等、利用停止等の請求）のお問合せ<br>
		                1.に該当する個人情報に関して、皆様がご自身の情報の開示、訂正、追加、削除ならびに利用停止・消去（以下、開示等）をご希望される場合には、お申し出いただいた方がご本人であることを確認したうえで迅速に対応させて頂きます。<br>

		                また、以下に記載する場合は開示等の対象外とさせていただきます。<br>

		                開示等を行わないことを決定した場合は、その旨理由を付して通知いたします。<br>

		                【全般】<br>

		                ご本人であることが確認できない場合<br>[:en]demo[:vi]Dưới đây là những điều khoản về chính sách bảo mật mà công ty Evolable Asia Agent quy định về việc sử dụng thông tin bảo mật ở những dịch vụ cung cấp trên trang web Evolable Asia Agent. Điều 1: Thông tin bảo mật 1.Khái niệm “thông tin cá nhân” trong thông tin bảo mật chỉ những thông tin cá nhân được luật pháp bảo vệ, là những thông tin có liên quan đến một cá nhân đang tồn tại bao gồm họ tên, ngày tháng năm sinh, địa chỉ, số điện thoại, địa chỉ liên lạc hoặc những thông tin khác. 2. Thông tin đặc điểm và thông tin lý lịch trong thông tin bảo mật là những thông tin khác với “thông tin cá nhân” quy định ở trên bao gồm: thông tin nhận dạng của các thiết bị đầu cuối, thông tin vị trí, thông tin cookies, địa chỉ IP của người dùng, tuổi tác, nghề nghiệp, giới tính, mã bưu điện, môi trường sử dụng, phương pháp sử dụng, ngày giờ sử dụng, từ khóa tìm kiếm, lịch sử quảng cáo và các trang đã truy cập, những sản phẩm đã mua hoặc những dịch vụ đã sử dụng. Điều 2: Phương pháp thu thập thông tin bảo mật 1. Công ty sẽ hỏi những thông tin cá nhân như tên họ người dùng, ngày tháng năm sinh, địa chỉ, số điện thoại, địa chỉ mail, số giấy phép lái xe. Hoặc thu thập từ đối tác kinh doanh hoặc từ những ghi chép trong quá trình trao đổi bao gồm những thông tin cá nhân của người dùng đã được thực hiện giữa đối tác và người dùng. 2. Công ty sẽ tiến hành thu thập những thông tin đặc điểm, thông tin lí lịch về người dùng như máy chủ hoặc phần mềm đã sử dụng, lịch sử quảng cáo, lịch sử các trang đã truy cập, từ khóa tìm kiếm,ngày giờ sử dụng, phương pháp sử dụng, hoàn cảnh sử dụng (bao gồm thông tin thiết lập các loại khi sử dụng, tình trạng truyền tin của các thiết bị cuối trong trường hợp thông qua thiết bị cuối di động), địa chỉ IP, thông tin cookies, thông tin vị trí, thông tin thiết bị cuối khi người dùng xem hoặc sử dụng dịch vụ của nhà cung cấp hoặc của công ty. Điều 3: Mục đích thu thập và sử dụng thông tin cá nhân Mục đích của công ty về việc sử dụng và thu thập thông tin cá nhân được nêu như sau: (1) Mục đích hiển thị những thông tin như họ tên, địa chỉ, nơi liên lạc những dịch vụ đã sử dụng hoặc những thông tin liên quan đến chúng nhằm thực hiện việc xem lại hiện trạng sử dụng, chỉnh sửa, xem lại những thông tin mà người dùng đã tự mình đăng kí . (2) Mục đích sử dụng thông tin nơi liên lạc như địa chỉ, họ tên để liên lạc khi cần thiết, để gửi các sản phẩm cho người dùng hoặc trong các trường hợp sử dụng địa chỉ mail để liên lạc, thông báo cho người dùng. (3) Mục đích sử dụng thông tin như họ tên, ngày tháng năm sinh, địa chỉ, số điện thoại, số tài khoản ngân hàng, số giấy phép lái xe, kết quả chuyển phát thư bảo đảm…để tiến hành xác nhận với chính người dùng. (4) Mục đích làm cho hiển thị trên màn hình nhập liệu những thông tin đã đăng ký với công ty, và chuyển tiếp các dịch vụ dựa trên chỉ thị của người dùng (bao gồm cả những dịch vụ đối tác đã cung cấp) để người dùng có thể nhập dữ liệu 1 cách dễ dàng. (5) Mục đích sử dụng thông tin để xác định đặc điểm cá nhân như địa chỉ, họ tên, tình trạng sử dụng để từ chối sự sử dụng người dùng với mục đích bất chính, không thích hợp hoặc người dùng vi phạm điều khoản sử dụng dịch vụ này làm phát sinh thiệt hại do bên thứ 3 hoặc chậm trễ thanh toán. (6) Mục đích sử dụng những thông tin liên lạc, tình trạng sử dụng dịch vụ của người dùng, những thông tin cần thiết khi công ty cung cấp dịch vụ cho người dùng như thông tin liên quan đến yêu cầu thanh toán, nội dung trao đổi liên lạc để giải đáp những trao đổi, thắc mắc từ người dùng. (7) Mục đích kết hợp với những mục đích sử dụng được nêu ở trên. Điều 4: Cung cấp những thông tin cá nhân cho bên thứ 3 1. Ngoài những trường hợp được công ty nêu dưới đây, nếu không có được sự đồng ý trước từ người dùng thì không được cung cấp thông tin cá nhân cho bất cứ bên thứ 3 nào. Tuy nhiên, trừ trường hợp được luật bảo vệ thông tin cá nhân hoặc các điều luật khác cho phép. (1) Trường hợp dựa trên cơ sở quy định của pháp luật. (2) Trường hợp cần thiết bảo hộ tài sản, thân thể, tính mạng con người nhưng gặp khó khăn trong việc nhận được sự chấp thuận của chính người đó. (3) Trường hợp cần duy trì sự phát triển lành mành của trẻ em hoặc cải thiện vệ sinh cộng nhưng gặp khó khăn trong việc nhận được sự chấp thuận của chính người đó. (4) Trường hợp cần hợp tác với cơ quan nhà nước, chính quyền địa phương hoặc những người nhận ủy thác để thực hiện những công vụ theo quy định của pháp luật mà việc có sự đồng ý của chính người đó có nguy cơ cản trở việc thực hiện những công việc tương ứng. (5) Trường hợp những mục được công bố hoặc thông báo được quy định dưới đây: + Cung cấp cho bên thứ 3 vì mục đích sử dụng + Những dữ liệu phải cung cấp cho bên thứ 3 + Phương pháp hoặc cách thức để cung cấp cho bên thứ 3. + Theo yêu cầu của chính người đó về việc tạm ngưng cung cấp thông tin cá nhân cho bên thứ 3 2. Không kể đến những mục đã được quy định ở trên,những trường hợp được nêu dưới đây thì không dành cho bên thứ 3. (1)Trong trường hợp được công ty ủy thác 1 phần hoặc toàn bộ việc xử lý thông tin trong phạm vi cần thiết nhằm đạt được mục đích sử dụng. (2)Trong trường hợp được cung cấp thông tin cá nhân để tiếp tục công việc do vấn đề hợp nhất công ty hoặc những lí do khác. (3)Trong trường hợp phải sử dụng chung thông tin cá nhân giữa những người được chỉ định thì phải thông báo trước cho người đó hoặc để chính người đó biết tình hình sơ lược về biệt hiệu hoặc tên của người có trách nhiệm quản lý thông tin cá nhân tương ứng hoặc mục đích sử dụng của người sử dụng, phạm vị sử dụng của những người cùng sử dụng, cũng như những mục được sử dụng chung. Điều 5: Công khai thông tin cá nhân 1. Khi nhận được yêu cầu công khai thông tin cá nhân của chính chủ, công ty sẽ không trì hoãn mà công khai ngay cho người đó.Tuy nhiên khi công bố những thông tin cá nhân cũng gặp 1 trong những trường hợp như quyết định không công bố hoặc chỉ công bố 1 phần hoặc toàn bộ, trong những trường hợp đó công ty sẽ nhanh chóng thông báo cho người đó. (1). Trong trường hợp có nguy cơ gây ra thiệt hại về tính mạng, thân thể, tài sản hoặc các lợi ích, quyền lợi khác cho bên thứ 3 hoặc chính người đó. (2). Trong trường hợp có nguy cơ gây ảnh hưởng trở ngại cho những hoạt động của công ty. (3). Trường hợp vi phạm pháp luật khác. 2. Đối với những thông tin ngoài thông tin cá nhân như thông tin lí lịch hoặc thông tin đặc điểm thì không liên quan đến những quy định ở trên, về nguyên tắc là không được công bố. Điều 6: Chỉnh sửa và xóa bỏ thông tin cá nhân 1. Người dùng có thể yêu cầu công ty xóa bỏ hoặc đính chính thông tin cá nhân do những thủ tục được công ty quy định trong trường hợp thông tin cá nhân mà công ty lưu giữ bị nhầm lẫn. 2. Trong trường hợp đã phán đoán có sự cần thiết với yêu cầu đó sau khi tiếp nhận yêu cầu như đã nêu trên, công ty sẽ nhanh chóng tiến hành xóa bỏ hoặc chỉnh sửa thông tin cá nhân rồi thông báo với người dùng. Điều 7: Đình chỉ việc sử dụng thông tin cá nhân Nếu như người dùng yêu cầu công ty xóa bỏ hoặc đình chỉ việc sử dụng thông tin cá nhân vì những lí do như thông tin cá nhân được sử dụng quá phạm vi mục đích sử dụng hoặc lấy thông tin bằng những thủ đoạn bất chính thì công ty sẽ nhanh chóng tiến hành những điều tra cần thiết, sau đó dựa vào kết quả điều tra đó đế tiến hành đình chỉ việc sử dụng thông tin cá nhân, thông báo cho nạn nhân. Tuy nhiên, đối với những trường hợp có phát sinh chi phí lớn để đình chỉ việc sử dụng thông tin cá nhân,trường hợp khó khăn trong việc tiến hành đình chỉ quyền sử dụng khác với quyền sử dụng đó, trường hợp có thể lấy những biện pháp thay thế cần thiết để bảo toàn lợi ích quyền lợi của nạn nhân thì sẽ tiến hành biện pháp thay thế tạm thời. Điều 8: Thay đổi chính sách bảo mật 1. Nội dung của chính sách bảo mật có thể thay đổi mà không cần thông báo cho người dùng. 2. Chính sách bảo mật sau khi thay đổi, trừ những trường hợp được công ty quy định riêng thì sẽ có hiệu lực từ thời điểm được đăng tải lên trang web này. Điều 9: Địa chỉ liên hệ Đối với những thắc mắc có liên quan đến vấn đề bảo mật,vui lòng liên hệ qua địa chỉ sau. Địa chỉ: Shibadaimon Center Building,10 floor,Shibadaimon 1-10-11,Minato-ku,Tokyo: Tên công ty: Evolable Asia Agent.,ltd Bộ phận phụ trách:Bộ phận quản lý Email: agent@evolable.asia'); ?>
			                                    </div>
			                                </div>
			                                <div class="col-xs-12 col-sm-12 col-md-12">
			                                    <div class="text-center">
			                                          <button id="btnSubmit" data-toggle="modal" data-target="#myConfirm" class="btn btn-default text-uppercase big-btn" >
			                                          <?php if (qtrans_getLanguage()=='ja'){ ?>
											            エントリーする
											        <?php }else if (qtrans_getLanguage()=='vi'){ ?>
											            エントリーする
											        <?php }else if (qtrans_getLanguage()=='en'){ ?>
											            エントリーする
											        <?php } ?>
			                                          </button>
			                                    </div>
			                                </div>
			                            </div>
			                        </div>
			                    </div>
			                </form>
			            </div>
			        </div>
			    </div>
			</div>
		</div>
	</div>

	<div id="myConfirm" class="container-fluid modal fade" role="dialog" style="display: none;">
	   <div class="modal-dialog">
	      <!-- Modal content-->
	      <div class="modal-content">
	         <div class="modal-header">
	            <button type="button" class="close" data-dismiss="modal">×</button>
	            <h4 class="modal-title"><?php echo __("[:ja]以下の内容がメールで送信されます[:en]Content validation[:vi]Xác nhận thông tin trước khi gửi"); ?></h4>
	         </div>
	         <div class="modal-body">
	            <div class="panel-body body-apply-form">
	               <div class="row">
	                  <div class="col-md-6">
	                     <div class="form-horizontal">
	                        <div class="row form-group">
	                           <label class="col-full col-md-offset-1 col-xs-4 col-sm-4 col-md-3  required" for="nameInput">
	                           <span><?php echo __("[:ja]お名前[:en]Name[:vi]Họ và tên"); ?></span>
	                           </label>
	                           <div class="col-xs-8 col-sm-8 col-md-8" for="name">

	                           </div>
	                        </div>
	                        <div class="row form-group email-confirm">
	                           <label class="col-full col-md-offset-1 col-xs-4 col-sm-4 col-md-3  required" for="emailInput">
	                           <span><?php echo __("[:ja]メールアドレス[:en]Email[:vi]Email"); ?></span>
	                           </label>
	                           <div class="col-xs-8 col-sm-8 col-md-8" for="email">

	                           </div>
	                        </div>
	                        <div class="row form-group have-fileupload">
	                           <label class="col-full col-md-offset-1 col-xs-4 col-sm-4 col-md-3 " for="cvFile">
	                           <span>CV</span>
	                           </label>
	                           <div class="col-xs-8 col-sm-8 col-md-8" for="file_cv">
	                           		<span id="fileCvName"></span>
	                           </div>
	                        </div>
	                     </div>
	                  </div>
	                  <div class="col-md-6">
	                     <div class="form-horizontal">
	                        <div class="row form-group">
	                           <label class="col-full col-xs-4 col-sm-4 col-md-3 control-label required" for="phoneInput">
	                           <span><?php echo __("[:ja]電話番号[:en]Phone[:vi]Số điện thoại"); ?></span>
	                           </label>
	                           <div class="col-xs-8 col-sm-8 col-md-8" for="phone_number">

	                           </div>
	                        </div>
	                        <div class="row form-group">
	                           <label class="col-full col-xs-4 col-sm-4 col-md-3 control-label" for="salaryInput"> <span><?php echo __("[:ja]希望年収 [万円][:en]Desired salary[:vi]Mức lương mong muốn"); ?></span></label>
	                           <div class="col-xs-8 col-sm-8 col-md-8" for="expected_salary">

	                           </div>
	                        </div>
	                        <div class="row form-group have-fileupload">
	                           <label class="col-full col-xs-4 col-sm-4 col-md-3 control-label" for="docFile">
	                           <span><?php echo __("[:ja]その他 添付ファイル[:en]Other file[:vi]Tài liệu đính kèm"); ?></span>
	                           </label>
	                           <div class="col-xs-8 col-sm-8 col-md-8" for="file_other">
	                              <span id="fileOtherName"></span>
	                           </div>
	                        </div>
	                     </div>
	                  </div>
	                  <div class="col-md-12 cmt-other">
	                     <div class="form-horizontal">
	                        <div class="row form-group form-group-comment">
	                           <label class="col-full col-xs-12 col-sm-4 col-md-2 lb-comment" for="txt-comment"><span><?php echo __("[:ja]その他ご要望[:en]Other wishes[:vi]Mong muốn khác"); ?></span></label>
	                           <div class="col-xs-12 col-sm-8 col-md-10" for="request">

	                           </div>
	                        </div>
	                     </div>
	                  </div>
	                  <div class="col-xs-12 col-sm-12 col-md-12 box-confirm-btn">
	                     <div class="confirm-btn">
	                        <button type="button" data-target="#mySuccess" data-toggle="modal" data-dismiss="modal" class="btn btn-default text-uppercase"><img src="<?php echo get_template_directory_uri(); ?>/images/apply_job/confirm-btn-<?php echo __('[:ja]ja[:en]en[:vi]vi'); ?>.png" alt=""></button>
	                     </div>
	                     <div class="confirm-btn">
	                        <button type="button" data-toggle="modal" data-dismiss="modal" class="btn btn-default text-uppercase"><img src="<?php echo get_template_directory_uri(); ?>/images/apply_job/confirm-return-<?php echo __('[:ja]ja[:en]en[:vi]vi'); ?>.png" alt=""></button>
	                     </div>
	                  </div>
	               </div>
	            </div>
	         </div>
	      </div>
		</div>
	</div>

	<div id="mySuccess" class="modal fade" role="dialog">
		<div class="modal-dialog">
			<!-- Modal content-->
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal">×</button>
					<h4 class="modal-title"><?php echo __("[:ja]この度はご応募頂き、誠にありがとうございます[:en]Thank you very much for your entry this time[:vi]Nộp đơn ứng tuyển thành công"); ?></h4>
				</div>
				<div class="modal-body">
					<p><?php echo __("[:ja]改めて担当者よりご連絡をさせていただきます<br>
					   3日以上経っても連絡がない場合は、お手数ですが、以下のメールアドレスまでお問い合わせください。<br>
					   agent@evolable.asia[:en]We will contact you again from the person in charge.<br>
						If you do not hear from us after 3 days or more, please contact us at the following e-mail address.<br>
						agent@evolable.asia[:vi]Cảm ơn bạn đã nộp đơn ứng tuyển. <br>
						Chúng tôi sẽ liên hệ đến bạn trong thời gian sớm nhất. <br>
						Trường hợp sau 3 ngày không nhận được sự liên hệ vui lòng liên hệ với chúng tôi theo e-mail agent@evolable.asia"); ?>
					</p>
				</div>
				<div class="modal-footer">
					<a href="<?php echo esc_url( home_url( '/' ) ); ?>" class="btn btn-default"><img src="<?php echo get_template_directory_uri(); ?>/images/apply_job/close-popup-<?php echo __('[:ja]ja[:en]en[:vi]vi'); ?>.png"></a>
				</div>
			</div>
		</div>
	</div>
<?php
get_footer();
?>
<script type="text/javascript">
(function($){
	$('#file_cv,#file_other').on('change', function(){
		//alert(this.files[0].size);
		var ext = $(this).val().split('.').pop().toLowerCase();
		if ($.inArray(ext, ['doc','docx','pdf','zip','rar','xls','xlsx']) == -1){
			$(this).closest('div').find('.cv-description').addClass('error');
		}else{
			$(this).closest('div').find('.cv-description').removeClass('error');
		}
	});
})(jQuery);
</script>