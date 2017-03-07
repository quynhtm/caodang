<?php
class SiteHomeController extends BaseSiteController{
    public function __construct(){
        parent::__construct();
        FunctionLib::site_js('lib/swfObject/swfObject.js', CGlobal::$POS_HEAD);
    }

	//Trang chu
    public function index(){
		
    	//Meta title
    	$meta_title='';
    	$meta_keywords='';
    	$meta_description='';
    	$meta_img='';
    	$arrMeta = Info::getItemByKeyword('SITE_SEO_HOME');
    	if(!empty($arrMeta)){
    		$meta_title = $arrMeta->meta_title;
    		$meta_keywords = $arrMeta->meta_keywords;
    		$meta_description = $arrMeta->meta_description;
    		$meta_img = $arrMeta->info_img;
    		if($meta_img != ''){
    			$meta_img = ThumbImg::thumbBaseNormal(CGlobal::FOLDER_INFO, $arrMeta->info_id, $arrMeta->info_img, 550, 0, '', true, true);
    		}
    	}
    	FunctionLib::SEO($meta_img, $meta_title, $meta_keywords, $meta_description);

        //Banner Calendar Week
        $arrBannerWeeks = Banner::getBannerAdvanced(CGlobal::BANNER_TYPE_CALENDAR_WEEK);
        $arrBannerWeek = $this->getBannerWithPosition($arrBannerWeeks);
		
		//Video
		$dataField['field_get'] = 'video_link';
		$arrVideo = Video::getNewVideo($dataField='', 1, 0);
		
    	$this->header();
        $this->slider();
        $this->layout->content = View::make('site.SiteLayouts.Home')
                                ->with('arrBannerWeek', $arrBannerWeek)
                                ->with('arrVideo', $arrVideo);
        $this->sliderPartnerBottom();
        $this->footer();
    }
	public function pageCategory(){
		return Redirect::route('site.home');
	}
    public function pageContact(){
        
        //Meta title
        $meta_title='';
        $meta_keywords='';
        $meta_description='';
        $meta_img='';
        $arrMeta = Info::getItemByKeyword('SITE_SEO_CONTACT');
        if(!empty($arrMeta)){
            $meta_title = $arrMeta->meta_title;
            $meta_keywords = $arrMeta->meta_keywords;
            $meta_description = $arrMeta->meta_description;
            $meta_img = $arrMeta->info_img;
            if($meta_img != ''){
                $meta_img = ThumbImg::thumbBaseNormal(CGlobal::FOLDER_INFO, $arrMeta->info_id, $arrMeta->info_img, 550, 0, '', true, true);
            }
        }
        FunctionLib::SEO($meta_img, $meta_title, $meta_keywords, $meta_description);

        $info = '';
        $arrInfo = Info::getItemByKeyword('SITE_INFO_CONTACT');
        if(sizeof($arrInfo) > 0){
            $info = stripslashes($arrInfo->info_content);
        }

        $messages = FunctionLib::messages('messages');
        if(!empty($_POST)){
            $token = Request::get('_token', '');
            if(Session::token() === $token){
                $contact_name = addslashes(Request::get('txtName', ''));
                $contact_phone = addslashes(Request::get('txtMobile', ''));
                $contact_email = addslashes(Request::get('txtEmail', ''));
                $contact_title = addslashes(Request::get('txtTitle', ''));
                $contact_content = addslashes(Request::get('txtMessage', ''));
                $get_code = addslashes(Request::get('captcha', ''));
                $contact_created = time();
                $code = '';
                if(Session::has('security_code')){
                    $code = Session::get('security_code');
                }
                if($contact_title != '' && $contact_name != '' && $contact_phone !=''  && $contact_content !='' && $get_code != '' && $code == $get_code){
                    $dataInput = array(
                        'contact_user_name_send'=>$contact_name,
                        'contact_phone_send'=>$contact_phone,
                        'contact_email_send'=>$contact_email,
                        'contact_title'=>$contact_title,
                        'contact_content'=>$contact_content,
                        'contact_time_creater'=>$contact_created,
                        'contact_status'=>0,
                    );
                    $query = Contact::addData($dataInput);
                    if($query > 0){
                        $messages = FunctionLib::messages('messages', 'Cảm ơn bạn đã gửi thông tin liên hệ. Chúng tôi sẽ liên hệ với bạn trong thời gian sớm nhất!');
                        return Redirect::route('site.pageContact');
                    }
                }else{
                    $messages = FunctionLib::messages('messages', 'Mã xác nhận chưa đúng!', 'error');
                    return Redirect::route('site.pageContact');
                }

            }
        }

        $this->header();
        $this->slider();
        $this->left();
        $this->sliderPartnerBottom();
        $this->right();
        $this->layout->content = View::make('site.SiteLayouts.pageContact')
                                ->with('info', $info)
                                ->with('messages', $messages);
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

    public function pageVideo(){
        $meta_title = $meta_keywords = $meta_description = 'Video';
        $meta_img= '';
        FunctionLib::SEO($meta_img, $meta_title, $meta_keywords, $meta_description);

        $pageNo = (int) Request::get('page_no',1);
        $limit = CGlobal::number_show_10;
        $offset = ($pageNo - 1) * $limit;
        $search = $data = array();
        $total = 0;
        $search['video_status'] = CGlobal::status_show;
        $search['page_no'] = $pageNo;
        $data = Video::searchByCondition($search, $limit, $offset,$total);
        $paging = $total > 0 ? Pagging::getNewPager(3, $pageNo, $total, $limit, $search) : '';

        $this->header();
        $this->slider();
        $this->left();
        $this->layout->content = View::make('site.SiteLayouts.pageVideo')
            ->with('arrItem', $data)
            ->with('paging', $paging);
        $this->right();
        $this->sliderPartnerBottom();
        $this->footer();
    }
    public function pageVideoDetail($title='', $id=0){
        $item = array();
        $newsSame = array();
        $meta_title = $meta_keywords = $meta_description = 'Video';
        $meta_img = '';
        if($id > 0){
            $item = Video::getById($id);
            if(sizeof($item) > 0){
                $meta_title = stripslashes($item->video_name);
                $meta_keywords = stripslashes($item->video_meta_keyword);
                $meta_description = stripslashes($item->video_meta_description);
                $newsSame = Video::getSameVideo($dataField='', $item->video_id, CGlobal::number_show_8, 0);
            }
        }
        FunctionLib::SEO($meta_img, $meta_title, $meta_keywords, $meta_description);
        $this->header();
        $this->slider();
        $this->left();
        $this->layout->content = View::make('site.SiteLayouts.pageVideoDetail')
            ->with('item', $item)
            ->with('newsSame', $newsSame);
        $this->right();
        $this->sliderPartnerBottom();
        $this->footer();
    }

    public function pageLibrary(){
        $meta_title = $meta_keywords = $meta_description = 'Thư viện ảnh';
        $meta_img= '';
        FunctionLib::SEO($meta_img, $meta_title, $meta_keywords, $meta_description);

        $pageNo = (int) Request::get('page_no',1);
        $limit = CGlobal::number_show_40;
        $offset = ($pageNo - 1) * $limit;
        $search = $data = array();
        $total = 0;

        $search['image_status'] = CGlobal::status_show;

        $data = LibraryImage::searchByCondition($search, $limit, $offset,$total);
        $paging = $total > 0 ? Pagging::getNewPager(3, $pageNo, $total, $limit, $search) : '';

        $this->header();
        $this->slider();
        $this->left();
        $this->layout->content = View::make('site.SiteLayouts.pageImages')
            ->with('arrItem', $data)
            ->with('paging', $paging);
        $this->right();
        $this->sliderPartnerBottom();
        $this->footer();
    }
    public function pageLibraryDetail($title='', $id=0){
        FunctionLib::site_js('lib/slidermagnific/magnific-popup.min.js', CGlobal::$POS_END);
        FunctionLib::site_css('lib/slidermagnific/magnific-popup.css', CGlobal::$POS_HEAD);

        $item = array();
        $newsSame = array();

        $meta_title = $meta_keywords = $meta_description = 'Thư viện ảnh';
        $meta_img = '';

        if($id > 0){
            $item = LibraryImage::getById($id);
            if(sizeof($item) > 0){
                $meta_title = stripslashes($item->news_title);
                $meta_keywords = stripslashes($item->news_meta_keyword);
                $meta_description = stripslashes($item->news_meta_description);
                $newsSame = LibraryImage::getSameNews($dataField='', $item->image_id, CGlobal::number_show_8, 0);
            }
        }
        FunctionLib::SEO($meta_img, $meta_title, $meta_keywords, $meta_description);

        $this->header();
        $this->slider();
        $this->left();
        $this->layout->content = View::make('site.SiteLayouts.pageImagesDetail')
            ->with('item', $item)
            ->with('newsSame', $newsSame);
        $this->right();
        $this->sliderPartnerBottom();
        $this->footer();
    }
}
