<?php
class SiteHomeController extends BaseSiteController{
    public function __construct(){
        parent::__construct();
    }

	//Trang chu
    public function index(){
		
        $this->layout->content = View::make('site.SiteLayouts.Home');
        $this->footer();
    }
	
	public function linkCaptcha(){
		$captchaImages = new captchaImages(60,30,4);
	}
	function captchaCheckAjax(){
		$code = '';
		if(Session::has('security_code')){
			$code = Session::get('security_code');
		}
		$get_code = addslashes(Request::get('captcha', ''));
		if($get_code != '' && $code == $get_code){
			echo 1;
		}else{
			echo 0;
			Session::forget('security_code');
		}
		exit();
	}
}
