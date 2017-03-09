<div class="line bd2">
	<div class="col-lg-3 col-md-3 col-sm-12">
		<h3 class="heading-news">
			<a href="{{URL::route('site.pageEvent')}}" title="Lịch sự kiện">Lịch sự kiện</a>
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
			@if(sizeof($arrEventNew) > 0)
				<?php $eventTotal = count($arrEventNew); ?>
				@foreach($arrEventNew as $k=>$item)
				<div class="event-item @if($eventTotal == $k+1) last @endif">
					<div class="n-date">
						<span>Thời gian </span>
						<strong>
						@if((int)$item->event_time_start > 0)
							{{date('d',(int)$item->event_time_start)}}-
						@endif
						@if((int)$item->event_time_end > 0)
							{{date('d/m/Y',(int)$item->event_time_end)}}
						@endif
						</strong>
					</div>
					<a title="{{$item->event_title}}" href="{{FunctionLib::buildLinkDetailEvent($item->event_title, $item->event_id)}}">
						@if($item['event_title'] != '')
							{{FunctionLib::substring($item['event_title'], 100, '...') }}
						@endif
						@if($item['event_type'] == CGlobal::NEW_TYPE_TIN_HOT)
							<i class="icon-new"></i>
						@endif
				</div>
				@endforeach
			@endif
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
			@if(sizeof($arrTab) > 0)
				@foreach($arrTab as $k=>$item)
					<li><h3><a @if($item->tab_link=='')href="javascript:void(0)" data="tab{{$k}}" @else href="{{$item->tab_link}}" data="" @endif @if($k==0)class="active"@endif >{{$item->tab_name}}</a></h3></li>
				@endforeach
			@endif
		</ul>
	</div>
	<div class="tabDetails">
		@if(sizeof($arrTab) > 0)
			@foreach($arrTab as $k=>$item)
			<?php $arrTabSub = TabSub::searchSubTabLimitAsc($item->tab_id, 4);?>
			<div @if($item->tab_link=='')id="tab{{$k}}"@endif class="tabContents @if($k==0)active @endif">
				@if(sizeof($arrTabSub) > 0)
					<?php $totals = count($arrTabSub); ?>
					@foreach($arrTabSub as $s=>$sub)
					<div class="box-brand @if($totals == $s+1) box-brand-last @endif">
						<a href="{{$sub->tab_sub_link}}">
							<span class="transit mask"></span>
							@if($sub['tab_sub_image'] != '')
							<img src="{{ ThumbImg::getImageThumb(CGlobal::FOLDER_TAB_SUB, $sub['tab_sub_id'], $sub['tab_sub_image'], CGlobal::sizeImage_600, '', true, CGlobal::type_thumb_image_product, false)}}" alt="{{$sub->tab_sub_name}}">
							@endif
						</a>
						<h4>{{$sub->tab_sub_name}}</h4>
					</div>
					@endforeach
				@endif
			</div>
			@endforeach
		@endif
		<!--Tab fix cứng-->
        <?php $arrTabSubFix = TabSub::searchSubTabLimitAsc($catTabFix, 4);?>
		@if(sizeof($arrTabSubFix) > 0)
			<?php $totals = count($arrTabSubFix); ?>
			@foreach($arrTabSubFix as $s=>$sub)
				<div class="box-brand @if($totals == $s+1) box-brand-last @endif">
					<a href="{{$sub->tab_sub_link}}">
						<span class="transit mask"></span>
						@if($sub['tab_sub_image'] != '')
							<img src="{{ ThumbImg::getImageThumb(CGlobal::FOLDER_TAB_SUB, $sub['tab_sub_id'], $sub['tab_sub_image'], CGlobal::sizeImage_600, '', true, CGlobal::type_thumb_image_product, false)}}" alt="{{$sub->tab_sub_name}}">
						@endif
					</a>
					<h4>{{$sub->tab_sub_name}}</h4>
				</div>
			@endforeach
		@endif
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