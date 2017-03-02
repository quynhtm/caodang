<div class="head-banner">
	<div class="container">
		<div class="flash">
	        @if(sizeof($arrBannerHead) > 0)
				<?php $i=0; ?>
				@foreach($arrBannerHead as $item)
					<?php $i++; ?>
					@if($i == 1)
						@if($item->banner_image != '')
								<img src="{{ThumbImg::thumbImageBannerNormal($item->banner_id,$item->banner_parent_id, $item->banner_image, CGlobal::sizeImage_1000,CGlobal::sizeImage_200, $item->banner_name,true,true)}}" alt="{{$item->banner_name}}" />
						@endif
					@endif
				@endforeach
			@endif
			<div class="language">
				<a class="vi class=" href="?lang=vi"></a>
				<a class="en class=" href="?lang=en"></a>
			</div>
	    </div>
		<div class="bg-menu">
			<div class="container">
				<ul class="menu">
					<li><a class="aline" href="{{URL::route('site.home')}}">Trang chủ</a></li>
					@if(!empty($menuCategoriessAll))
                        <?php $i=1; ?>
						@foreach($menuCategoriessAll as $cat)
							@if($i <= $numCategory)
								@if($cat['category_show_top'] == CGlobal::status_show)
                                    <?php $i++; ?>
									<li><a class="aline @if(isset($catid) && $catid == $cat['category_id']) act @endif" @if($cat['category_link'] != '')href="{{$cat['category_link']}}" target="_blank" @else href="{{FunctionLib::buildLinkCategory($cat['category_id'], $cat['category_name'])}}" @endif title="{{$cat['category_name']}}">{{$cat['category_name']}}</a></li>
								@endif
							@endif
						@endforeach
					@endif
					<li><a href="{{URL::route('site.pageContact')}}" title="Liên hệ">Liên hệ</a></li>
				</ul>
			</div>
		</div>
	</div>
</div>