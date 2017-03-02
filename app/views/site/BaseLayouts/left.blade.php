<div class="col-lg-3 col-md-3 col-sm-12 col-left">
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
			<a href="" title="KẾ HOẠCH Tổ chức Hội thi " học="" sinh,="" sinh="" viên="" giỏi="" tin="" văn="" phòng”="" trường="" cao="" đẳng="" sư="" phạm="" trung="" ương="" năm="" 2016-2017"="">KẾ HOẠCH Tổ chức Hội thi "Học sinh, sinh viên giỏi Tin VP” Trường CDSPTW năm học 2016-2017 <img src="http://project.vn/KHAC/cdsptw.edu.vn/assets/frontend/img/new.gif"></a>
		</div>
		<div class="event-item">
			<div class="n-date">
				<span>  Thời gian </span>
				<strong> 11-13/11/2016</strong>
			</div>
			<a href="" title="Hoạt động ngoại khóa kết hợp với Thanh niên tình nguyện - Nâng cao chất lượng công tác hoạt động tình nguyện hè tại địa phương">Hoạt động ngoại khóa kết hợp với Thanh niên tình nguyện <img src="http://project.vn/KHAC/cdsptw.edu.vn/assets/frontend/img/new.gif"></a>
		</div>
		<div class="event-item">
			<div class="n-date">
				<span>  Thời gian </span>
				<strong> 22/12/2016</strong>
			</div>
			<a href="" title="KẾ HOẠCH Tổ chức Hội thi " học="" sinh,="" sinh="" viên="" giỏi="" tin="" văn="" phòng”="" trường="" cao="" đẳng="" sư="" phạm="" trung="" ương="" năm="" 2016-2017"="">KẾ HOẠCH Tổ chức Hội thi "Học sinh, sinh viên giỏi Tin VP” Trường CDSPTW năm học 2016-2017 <img src="http://project.vn/KHAC/cdsptw.edu.vn/assets/frontend/img/new.gif"></a>
		</div>
		<div class="event-item">
			<div class="n-date">
				<span>  Thời gian </span>
				<strong> 11-13/11/2016</strong>
			</div>
			<a href="" title="Hoạt động ngoại khóa kết hợp với Thanh niên tình nguyện - Nâng cao chất lượng công tác hoạt động tình nguyện hè tại địa phương">Hoạt động ngoại khóa kết hợp với Thanh niên tình nguyện <img src="http://project.vn/KHAC/cdsptw.edu.vn/assets/frontend/img/new.gif"></a>
		</div>
		<div class="event-item">
			<div class="n-date">
				<span>  Thời gian </span>
				<strong> 22/12/2016</strong>
			</div>
			<a href="" title="KẾ HOẠCH Tổ chức Hội thi " học="" sinh,="" sinh="" viên="" giỏi="" tin="" văn="" phòng”="" trường="" cao="" đẳng="" sư="" phạm="" trung="" ương="" năm="" 2016-2017"="">KẾ HOẠCH Tổ chức Hội thi "Học sinh, sinh viên giỏi Tin VP” Trường CDSPTW năm học 2016-2017 <img src="http://project.vn/KHAC/cdsptw.edu.vn/assets/frontend/img/new.gif"></a>
		</div>
		<div class="event-item">
			<div class="n-date">
				<span>  Thời gian </span>
				<strong> 11-13/11/2016</strong>
			</div>
			<a href="" title="Hoạt động ngoại khóa kết hợp với Thanh niên tình nguyện - Nâng cao chất lượng công tác hoạt động tình nguyện hè tại địa phương">Hoạt động ngoại khóa kết hợp với Thanh niên tình nguyện <img src="http://project.vn/KHAC/cdsptw.edu.vn/assets/frontend/img/new.gif"></a>
		</div>
	</div>
	@if(sizeof($arrBannerLeft) > 0)
		@foreach($arrBannerLeft as $item)
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