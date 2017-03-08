<div class="line bd2">
	<div class="col-lg-3 col-md-3 col-sm-12">
		<h3 class="heading-news">
			<a href="" title="Lịch sự kiện">Lịch sự kiện</a>
		</h3>
		<div class="event-list">
			<div class="banner-week">
				@if(sizeof($arrBannerWeek) > 0)
					@foreach($arrBannerWeek as $item)
						@if($item->banner_image != '')
							<a @if($item->banner_is_rel == CGlobal::LINK_NOFOLLOW) rel="nofollow" @endif @if($item->banner_is_target == CGlobal::BANNER_TARGET_BLANK) target="_blank" @endif href="@if($item->banner_link != '') {{$item->banner_link}} @else javascript:void(0) @endif" title="{{$item->banner_name}}">
								<img src="{{ThumbImg::thumbImageBannerNormal($item->banner_id,$item->banner_parent_id, $item->banner_image, CGlobal::sizeImage_1000,CGlobal::sizeImage_200, $item->banner_name,true,true)}}" alt="{{$item->banner_name}}" />
							</a>
						@endif
					@endforeach
				@endif
			</div>
			<div class="event-item">
				<div class="n-date">
					<span>  Thời gian </span>
					<strong> 22/12/2016</strong>
				</div>
				<a href="" title="KẾ HOẠCH Tổ chức Hội thi "Học sinh, sinh viên giỏi Tin học Văn phòng” Trường Cao đẳng Sư phạm Trung ương năm học 2016-2017">KẾ HOẠCH Tổ chức Hội thi "Học sinh, sinh viên giỏi Tin VP” Trường CDSPTW năm học 2016-2017 <i class="icon-new"></i></a>
			</div>
			<div class="event-item">
				<div class="n-date">
					<span>  Thời gian </span>
					<strong> 11-13/11/2016</strong>
				</div>
				<a href="" title="Hoạt động ngoại khóa kết hợp với Thanh niên tình nguyện - Nâng cao chất lượng công tác hoạt động tình nguyện hè tại địa phương">Hoạt động ngoại khóa kết hợp với Thanh niên tình nguyện <i class="icon-new"></i></a>
			</div>
			<div class="event-item">
				<div class="n-date">
					<span>  Thời gian </span>
					<strong> 22/12/2016</strong>
				</div>
				<a href="" title="KẾ HOẠCH Tổ chức Hội thi "Học sinh, sinh viên giỏi Tin học Văn phòng” Trường Cao đẳng Sư phạm Trung ương năm học 2016-2017">KẾ HOẠCH Tổ chức Hội thi "Học sinh, sinh viên giỏi Tin VP” Trường CDSPTW năm học 2016-2017 <i class="icon-new"></i></a>
			</div>
			<div class="event-item">
				<div class="n-date">
					<span>  Thời gian </span>
					<strong> 11-13/11/2016</strong>
				</div>
				<a href="" title="Hoạt động ngoại khóa kết hợp với Thanh niên tình nguyện - Nâng cao chất lượng công tác hoạt động tình nguyện hè tại địa phương">Hoạt động ngoại khóa kết hợp với Thanh niên tình nguyện <i class="icon-new"></i></a>
			</div>
			<div class="event-item">
				<div class="n-date">
					<span>  Thời gian </span>
					<strong> 22/12/2016</strong>
				</div>
				<a href="" title="KẾ HOẠCH Tổ chức Hội thi "Học sinh, sinh viên giỏi Tin học Văn phòng” Trường Cao đẳng Sư phạm Trung ương năm học 2016-2017">KẾ HOẠCH Tổ chức Hội thi "Học sinh, sinh viên giỏi Tin VP” Trường CDSPTW năm học 2016-2017 <i class="icon-new"></i></a>
			</div>
		</div>
	</div>
	<div class="col-lg-6 col-md-6 col-sm-12">
		<h3 class="heading-news left">
			<a href="" title="Bản tin">Bản tin</a>
		</h3>
		<div class="home-news-list home-news-list-center">
			<div class="line-center">
				<div class="cold45 mgl5p">
					@if(isset($data_ts_dt_csv['post']))
						@foreach($data_ts_dt_csv['post'] as $k=>$item)
							@if($k == 0)
								<div class="home-news-first-item">
									@if($item['news_image'] != '')
										<a class="post-thumb" title="{{$item['news_title']}}" href="{{FunctionLib::buildLinkDetailNews($item['news_category_name'], $item['news_title'], $item['news_id'])}}">
											<img alt="{{$item['news_title']}}"
												 src="{{ThumbImg::getImageThumb(CGlobal::FOLDER_NEWS, $item['news_id'], $item['news_image'], CGlobal::sizeImage_500)}}">
										</a>
									@endif
									<h4 class="home-news-title">
										<a class="post-title" title="{{$item['news_title']}}" href="{{FunctionLib::buildLinkDetailNews($item['news_category_name'], $item['news_title'], $item['news_id'])}}">
											{{$item['news_title']}}
											@if($item['news_type'] == CGlobal::NEW_TYPE_TIN_HOT)
											<i class="icon-new"></i>
											@endif
										</a>
									</h4>
									<div class="excerpt">
										@if($item['news_intro'] != '')
											{{FunctionLib::substring($item['news_intro'], 200, '...') }}
										@else
											{{FunctionLib::substring($item['news_content'], 200, '...') }}
										@endif</div>
								</div>
							@else
								<div class="home-news-item">
									<a class="post-title" title="{{$item['news_title']}}" href="{{FunctionLib::buildLinkDetailNews($item['news_category_name'], $item['news_title'], $item['news_id'])}}">
										<i class="fa fa-circle"></i> {{$item['news_title']}}
										@if($item['news_type'] == CGlobal::NEW_TYPE_TIN_HOT)
											<i class="icon-new"></i>
										@endif
									</a>
								</div>
							@endif
						@endforeach
					@endif
				</div>
				<div class="cold45">
					@if(isset($data_khac['post']))
						@foreach($data_khac['post'] as $k=>$item)
							@if($k == 0)
								<div class="home-news-first-item">
									@if($item['news_image'] != '')
										<a class="post-thumb" title="{{$item['news_title']}}" href="{{FunctionLib::buildLinkDetailNews($item['news_category_name'], $item['news_title'], $item['news_id'])}}">
											<img alt="{{$item['news_title']}}"
												 src="{{ThumbImg::getImageThumb(CGlobal::FOLDER_NEWS, $item['news_id'], $item['news_image'], CGlobal::sizeImage_500)}}">
										</a>
									@endif
									<h4 class="home-news-title">
										<a class="post-title" title="{{$item['news_title']}}" href="{{FunctionLib::buildLinkDetailNews($item['news_category_name'], $item['news_title'], $item['news_id'])}}">
											{{$item['news_title']}}
											@if($item['news_type'] == CGlobal::NEW_TYPE_TIN_HOT)
												<i class="icon-new"></i>
											@endif
										</a>
									</h4>
									<div class="excerpt">
										@if($item['news_intro'] != '')
											{{FunctionLib::substring($item['news_intro'], 200, '...') }}
										@else
											{{FunctionLib::substring($item['news_content'], 200, '...') }}
										@endif</div>
								</div>
							@else
								<div class="home-news-item">
									<a class="post-title" title="{{$item['news_title']}}" href="{{FunctionLib::buildLinkDetailNews($item['news_category_name'], $item['news_title'], $item['news_id'])}}">
										<i class="fa fa-circle"></i> {{$item['news_title']}}
										@if($item['news_type'] == CGlobal::NEW_TYPE_TIN_HOT)
											<i class="icon-new"></i>
										@endif
									</a>
								</div>
							@endif
						@endforeach
					@endif
				</div>
			</div>
		</div>
	</div>
	@if(sizeof($data_hdsv) > 0)
	<div class="col-lg-3 col-md-3 col-sm-12">
		@if(isset($data_hdsv['cat']))
		<h3 class="heading-news">
			<a @if(isset($data_hdsv['cat']['category_id']) && $data_hdsv['cat']['category_id'] > 0) href="{{FunctionLib::buildLinkCategory($data_hdsv['cat']['category_id'], $data_hdsv['cat']['category_name'])}}" @endif title="{{$data_hdsv['cat']['category_name']}}">{{$data_hdsv['cat']['category_name']}}</a>
		</h3>
		@endif
		<div class="home-news-list">
			@if(isset($data_hdsv['post']))
				@foreach($data_hdsv['post'] as $k=>$item)
				@if($k == 0)
					<div class="home-news-first-item">
						@if($item['news_image'] != '')
							<a class="post-thumb" title="{{$item['news_title']}}" href="{{FunctionLib::buildLinkDetailNews($item['news_category_name'], $item['news_title'], $item['news_id'])}}">
							<img alt="{{$item['news_title']}}"
								 src="{{ThumbImg::getImageThumb(CGlobal::FOLDER_NEWS, $item['news_id'], $item['news_image'], CGlobal::sizeImage_500)}}">
							</a>
						@endif
					<h4 class="home-news-title">
						<a class="post-title" title="{{$item['news_title']}}" href="{{FunctionLib::buildLinkDetailNews($item['news_category_name'], $item['news_title'], $item['news_id'])}}">
							{{$item['news_title']}}
							@if($item['news_type'] == CGlobal::NEW_TYPE_TIN_HOT)
								<i class="icon-new"></i>
							@endif
						</a>
					</h4>
					<div class="excerpt">
						@if($item['news_intro'] != '')
							{{FunctionLib::substring($item['news_intro'], 200, '...') }}
						@else
							{{FunctionLib::substring($item['news_content'], 200, '...') }}
						@endif</div>
					</div>
				@else
					<div class="home-news-item">
						<a class="post-title" title="{{$item['news_title']}}" href="{{FunctionLib::buildLinkDetailNews($item['news_category_name'], $item['news_title'], $item['news_id'])}}">
							<i class="fa fa-circle"></i> {{$item['news_title']}}
							@if($item['news_type'] == CGlobal::NEW_TYPE_TIN_HOT)
								<i class="icon-new"></i>
							@endif
						</a>
					</div>
				@endif
				@endforeach
			@endif
		</div>
	</div>
	@endif
</div>
<div class="line bd2">
	<div class="headingline">Tuyển sinh và đào tạo</div>
	<div class="tabLine" id="tabContaier">
		<ul>
			<li><h3><a href="#tab1" class="active">Các ngành đào tạo</a></h3></li>
			<li><h3><a href="#tab2">Cao đẳng chính quy</a></h3></li>
			<li><h3><a href="#tab3">Chương trình quốc tế</a></h3></li>
			<li><h3><a href="#tab4">Liên thông</a></h3></li>
			<li><h3><a href="#tab5">Khóa ngắn hạn</a></h3></li>
			<li><h3><a href="#tab16" class="cl-red">Đăng ký học trực tuyến</a></h3></li>
		</ul>
	</div>
	<div class="tabDetails">
		<div class="tabContents">
			<div class="box-brand ">
				<a href="">
					<span class="transit mask"></span>
					<img src="http://daihocnguyentrai.edu.vn/wp-content/uploads/2016/12/20161216_094344.jpg" alt="Ngành Tài chính - Ngân hàng">
				</a>
				<h4><a href="">Ngành Tài chính - Ngân hàng</a></h4>
			</div>
			<div class="box-brand ">
				<a href="">
					<span class="transit mask"></span>
					<img src="http://daihocnguyentrai.edu.vn/wp-content/uploads/2016/05/Untitled-1-1.jpg" alt="Quy trình đào tạo - Đại học Ứng Dụng">
				</a>
				<h4><a href="">Quy trình đào tạo - Đại học Ứng Dụng</a></h4>
			</div>
			<div class="box-brand ">
				<a href="">
					<span class="transit mask"></span>
					<img src="http://daihocnguyentrai.edu.vn/wp-content/uploads/2017/02/P_20161223_143752.jpg" alt="Ngành Quản trị kinh doanh">
				</a>
				<h4><a href="">Ngành Quản trị kinh doanh</a></h4>
			</div>
			<div class="box-brand box-brand-last">
				<a href="h">
					<span class="transit mask"></span>
					<img src="http://daihocnguyentrai.edu.vn/wp-content/uploads/2017/02/IMG20170116111146-1.jpg" alt="Ngành Kế toán">
				</a>
				<h4><a href="">Ngành Kế toán</a></h4>
			</div>
			<div class="box-brand ">
				<a href="">
					<span class="transit mask"></span>
					<img src="http://daihocnguyentrai.edu.vn/wp-content/uploads/2017/02/P_20161223_143752.jpg" alt="Ngành Quản trị kinh doanh">
				</a>
				<h4><a href="">Ngành Quản trị kinh doanh</a></h4>
			</div>
			<div class="box-brand ">
				<a href="h">
					<span class="transit mask"></span>
					<img src="http://daihocnguyentrai.edu.vn/wp-content/uploads/2017/02/IMG20170116111146-1.jpg" alt="Ngành Kế toán">
				</a>
				<h4><a href="">Ngành Kế toán</a></h4>
			</div>
			<div class="box-brand ">
				<a href="">
					<span class="transit mask"></span>
					<img src="http://daihocnguyentrai.edu.vn/wp-content/uploads/2016/05/Untitled-1-1.jpg" alt="Quy trình đào tạo - Đại học Ứng Dụng">
				</a>
				<h4><a href="">Quy trình đào tạo - Đại học Ứng Dụng</a></h4>
			</div>
			<div class="box-brand box-brand-last">
				<a href="">
					<span class="transit mask"></span>
					<img src="http://daihocnguyentrai.edu.vn/wp-content/uploads/2016/12/20161216_094344.jpg" alt="Ngành Tài chính - Ngân hàng">
				</a>
				<h4><a href="">Ngành Tài chính - Ngân hàng</a></h4>
			</div>
		</div>
	</div>
</div>
<div class="line">
	<div class="headingline">Thư viện ảnh & Video</div>
	<div class="home-gallery-video">
		<div class="sp-image-container">
			@if(sizeof($arrImg) > 0)
				<h2 class="title-path-ext"><a href="{{URL::route('site.pageLibrary')}}" title="Thư viện ảnh">Thư viện ảnh</a></h2>
				<div id="sliderPro" class="slider-pro">
					@foreach($arrImg as $k=>$items)
						<?php $arrListImg = ($items->image_image_other != '') ? unserialize($items->image_image_other) : array();?>
						@if(!empty($arrListImg))
						<div class="sp-slides">
							@foreach($arrListImg as $item)
							<div class="sp-slide">
								<img class="sp-image" src="{{URL::route('site.home')}}/assets/frontend/img/blank.gif"
										 data-src="{{ThumbImg::getImageThumb(CGlobal::FOLDER_LIBRARY_IMAGE, $items['image_id'], $item, CGlobal::sizeImage_1000)}}"
										 data-small="{{ThumbImg::getImageThumb(CGlobal::FOLDER_LIBRARY_IMAGE, $items['image_id'], $item, CGlobal::sizeImage_1000)}}"
										 data-medium="{{ThumbImg::getImageThumb(CGlobal::FOLDER_LIBRARY_IMAGE, $items['image_id'], $item, CGlobal::sizeImage_1000)}}"
										 data-large="{{ThumbImg::getImageThumb(CGlobal::FOLDER_LIBRARY_IMAGE, $items['image_id'], $item, CGlobal::sizeImage_1000)}}"
										 data-retina="{{ThumbImg::getImageThumb(CGlobal::FOLDER_LIBRARY_IMAGE, $items['image_id'], $item, CGlobal::sizeImage_1000)}}"/>
									<p class="sp-layer sp-white sp-padding"
									   data-horizontal="50" data-vertical="50"
									   data-show-transition="left" data-show-delay="400">{{$items['image_title']}}
									</p>
							</div>
							@endforeach
						</div>
						<div class="sp-thumbnails">
							@foreach($arrListImg as $item)
								<img class="sp-thumbnail" src="{{ThumbImg::getImageThumb(CGlobal::FOLDER_LIBRARY_IMAGE, $items['image_id'], $item, CGlobal::sizeImage_500)}}"/>
							@endforeach
						</div>
						@endif
				@endforeach
				</div>
				<script type="text/javascript">
                    $( document ).ready(function( $ ) {
                        $( '#sliderPro' ).sliderPro({
                            width: 570,
                            height: 265,
                            fade: true,
                            arrows: true,
                            buttons: false,
                            fullScreen: true,
                            shuffle: true,
                            smallSize: 500,
                            mediumSize: 1000,
                            largeSize: 3000,
                            thumbnailArrows: true,
                            autoplay: false
                        });
                    });
				</script>
			@endif
		</div>
		<div class="home-video">
			<h2 class="title-path-ext"><a href="{{URL::route('site.pageVideo')}}" title="Video">Video</a></h2>
			@if(sizeof($arrVideo) > 0)
				@foreach($arrVideo as $k=>$item)
					@if($k == 0)
                        <?php
                        $_video = str_replace('https://www.youtube.com/watch?v=', 'https://www.youtube.com/embed/', $item->video_link);
                        $embed = '<iframe width="540" height="350" src="'.$_video.'?rel=0" frameborder="0" allowfullscreen></iframe>';
                        echo $embed;
                        ?>
					@endif
				@endforeach
			@endif
		</div>
	</div>
</div>