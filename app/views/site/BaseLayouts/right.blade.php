<div class="col-lg-3 col-md-3 col-sm-12 col-right">
	@if(sizeof($arrType) > 0)
	<div class="item-box">
		<div class="donvi-khoa-trungtam">
			<div class="h2">CÁC ĐƠN VỊ TRỰC THUỘC</div>
			<div class="navigation">
				<ul>
					@foreach($arrType as $type)
					<li class="dot"><a href="javascript:void(0)">{{$type}}</a>
						<ul>
							<li><a href="">Khoa Xã hội - Nhân văn</a></li>
							<li><a href="">Khoa Quản lý - Văn thư</a></li>
							<li><a href="">Khoa Công Nghệ Thông Tin</a></li>
						</ul>
					</li>
					@endforeach
				</ul>
			</div>
		</div>
	</div>
	@endif
	@if(!empty($menuCategoriessAll))
		@foreach($menuCategoriessAll as $cat)
			@if($cat['category_show_right'] == CGlobal::status_show)
			<div class="item-box">
				<div class="top-title"><span><a @if(isset($catid) && $catid == $cat['category_id']) act @endif" @if($cat['category_link'] != '')href="{{$cat['category_link']}}" target="_blank" @else href="{{FunctionLib::buildLinkCategory($cat['category_id'], $cat['category_name'])}}" @endif title="{{$cat['category_name']}}">{{$cat['category_name']}}</a></span></div>
				<div class="list">
					<ul>
						<?php $arrItem = BaseSiteController::getPostInCategoryId($cat['category_id'], $limit=10); ?>
						@if(sizeof($arrItem) > 0)
							@foreach($arrItem as $item)
									<li><a title="{{$item['news_title']}}" href="{{FunctionLib::buildLinkDetailNews($item['news_category_name'], $item['news_title'], $item['news_id'])}}">{{$item['news_title']}}</a></li>
							@endforeach
						@endif
					</ul>
				</div>
			</div>
			@endif
		@endforeach
	@endif

	<div class="item-box">
		<div class="top-title">
         <span>
         <a href="">Liên kết</a>
         </span>
		</div>
		<div class="list">
			<div class="title-select">» Cơ quan Đảng - Nhà nước</div>
			<select name="link" class="selectLink">
				<option>--Liên kết---</option>
				<option>ĐH QG Hà Nội</option>
				<option>ĐH Bách Khoa</option>
			</select>
			<div class="title-select">» Các trường Đại học</div>
			<select name="link" class="selectLink">
				<option>--Liên kết---</option>
				<option>ĐH QG Hà Nội</option>
				<option>ĐH Bách Khoa</option>
			</select>
			<div class="title-select">» Các website khác</div>
			<select name="link" class="selectLink">
				<option>--Liên kết---</option>
				<option>ĐH QG Hà Nội</option>
				<option>ĐH Bách Khoa</option>
			</select>
		</div>
	</div>
	@if(sizeof($arrBannerRight) > 0)
		@foreach($arrBannerRight as $item)
				@if($item->banner_image != '')
				<div class="item-box">
					<a @if($item->banner_is_rel == CGlobal::LINK_NOFOLLOW) rel="nofollow" @endif @if($item->banner_is_target == CGlobal::BANNER_TARGET_BLANK) target="_blank" @endif href="@if($item->banner_link != '') {{$item->banner_link}} @else javascript:void(0) @endif" title="{{$item->banner_name}}">
						<img src="{{ThumbImg::thumbImageBannerNormal($item->banner_id,$item->banner_parent_id, $item->banner_image, CGlobal::sizeImage_1000,CGlobal::sizeImage_200, $item->banner_name,true,true)}}" alt="{{$item->banner_name}}" />
					</a>
				</div>
				@endif
		@endforeach
	@endif
</div>