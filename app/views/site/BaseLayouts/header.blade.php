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
		<nav class="navbar navbar-inverse">
			<div class="container">
				<div class="top-header-button">
					<div class="navbar-header">
						<button type="button" class="navbar-toggle collapsed" data-toggle="collapse"
								data-target="#navbar" aria-expanded="false" aria-controls="navbar">
							<span class="sr-only">Menu icon</span>
							<span class="icon-bar"></span>
							<span class="icon-bar"></span>
							<span class="icon-bar"></span>
						</button>
					</div>
				</div>
			</div>
			<div class="bg-menu">
				<div id="navbar" class="collapse navbar-collapse">
					<ul class="menu nav navbar-nav menu-header ">
						<li><a class="aline" href="{{URL::route('site.home')}}">Trang chủ</a></li>
						@if(!empty($menuCategoriessAll))
                            <?php $i=1; ?>
							@foreach($menuCategoriessAll as $cat)
								@if($i <= $numCategory)
									@if($cat['category_show_top'] == CGlobal::status_show && $cat['category_parent_id'] == CGlobal::status_hide)
                                        <?php $i++; ?>
										<li><a class="aline @if(isset($catid) && $catid == $cat['category_id']) act @endif" @if($cat['category_link'] != '')href="{{$cat['category_link']}}" target="_blank" @else href="{{FunctionLib::buildLinkCategory($cat['category_id'], $cat['category_name'])}}" @endif title="{{$cat['category_name']}}">{{$cat['category_name']}}</a>
											<ul class="menu-sub">
												@foreach($menuCategoriessAll as $sub)
													@if($sub['category_parent_id'] == $cat['category_id'] && $sub['category_show_top'] == CGlobal::status_show)
														<li><a @if($sub['category_link'] != '')href="{{$sub['category_link']}}" target="_blank" @else href="{{FunctionLib::buildLinkCategory($sub['category_id'], $sub['category_name'])}}" @endif title="{{$sub['category_name']}}">{{$sub['category_name']}}</a></a></li>
													@endif
												@endforeach
											</ul>
										</li>
									@endif
								@endif
							@endforeach
						@endif
						<li><a href="{{URL::route('site.pageContact')}}" title="Liên hệ">Liên hệ</a></li>
					</ul>
				</div>
			</div>
		</nav>
	</div>
</div>