<!DOCTYPE html>
<html lang="vi">
<head>
	{{CGlobal::$extraMeta}}
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
	<link rel="shortcut icon" href="{{Config::get('config.WEB_ROOT')}}assets/frontend/img/favicon.ico" type="image/vnd.microsoft.icon">
		
	{{ HTML::style('assets/lib/bootstrap/css/bootstrap.css'); }}
	{{ HTML::style('assets/frontend/css/site.css'); }}
	{{ HTML::style('assets/frontend/css/media.css'); }}
	
	{{ HTML::script('assets/js/jquery.2.1.1.min.js', array(), Config::get('config.SECURE')) }}
	{{ HTML::script('assets/lib/bootstrap/js/bootstrap.min.js', array(), Config::get('config.SECURE')) }}
	 
	{{CGlobal::$extraHeaderCSS}}
	{{CGlobal::$extraHeaderJS}}
	
    <script type="text/javascript">
        var WEB_ROOT = "{{url('', array(), Config::get('config.SECURE'))}}";
        var DEVMODE = "{{Config::get('config.DEVMODE')}}";
        var COOKIE_DOMAIN = "{{Config::get('config.DOMAIN_COOKIE_SERVER')}}";
    </script>
    
    @if(Config::get('config.DEVMODE') == false)
        <meta name="google-site-verification" content="b71v5Ru4Ajs2e9RwaLDzECAyF3y7RhPX680ixfPpY3I" />
    @endif
</head>
<body>
<div id="wrapper">
	@if(isset($header))
	<div id="header">
		{{$header}}
	</div>
	@endif
	 
	<div id="content">
		<div class="line-content">
			<div class="container">
				<div class="wraps">
					@if(isset($slider))
						{{$slider}}
					@endif
					<div class="line">
						@if(isset($left))
							{{$left}}
						@endif

						@if(isset($content))
							{{$content}}
						@endif

						@if(isset($right))
							{{$right}}
						@endif
					</div>
					@if(isset($eduBottom))
					<div class="line">
						{{$eduBottom}}
					</div>
					@endif
					@if(isset($imagesVideoBottom))
					<div class="line">
						{{$imagesVideoBottom}}
					</div>
					@endif
					@if(isset($sliderPartnerBottom))
					<div class="line">
						{{$sliderPartnerBottom}}
					</div>
					@endif
				</div>
			</div>
		</div>
	</div>
	@if(isset($footer))
	<div id="footer">
		{{$footer}}
	</div>
	@endif
</div>
{{CGlobal::$extraFooterCSS}}
{{CGlobal::$extraFooterJS}}
</body>
</html>
