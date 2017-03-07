<?php
/*
* @Created by: DUYNX
* @Author    : nguyenduypt86@gmail.com
* @Date      : 11/2016
* @Version   : 1.0
*/

class BaseSiteController extends BaseController{
    protected $layout = 'site.BaseLayouts.index';
   
    public function __construct(){
    	FunctionLib::site_css('font-awesome/4.2.0/css/font-awesome.min.css', CGlobal::$POS_HEAD);
    	FunctionLib::site_js('frontend/js/site.js', CGlobal::$POS_END);
    	FunctionLib::site_css('lib/jAlert/jquery.alerts.css', CGlobal::$POS_HEAD);
    	FunctionLib::site_js('lib/jAlert/jquery.alerts.js', CGlobal::$POS_END);	
    }
    public function header(){
        //Banner Header
        $arrBanner = Banner::getBannerAdvanced(CGlobal::BANNER_TYPE_TOP);
        $arrBannerHead = $this->getBannerWithPosition($arrBanner);
        //List Category
        $menuCategoriessAll = Category::getCategoriessAll();
        //Num Category Show Menu Horizontal
        $numCategory = 0;
        $numCategoryShow = Info::getItemByKeyword('SITE_NUM_MENU_HORIZONTAL');
        if(sizeof($numCategoryShow) > 0){
            $numCategory = (int)strip_tags(stripslashes($numCategoryShow->info_content));
        }

        $this->layout->header = View::make("site.BaseLayouts.header")
                                ->with('menuCategoriessAll', $menuCategoriessAll)
                                ->with('numCategory', $numCategory)
                                ->with('arrBannerHead', $arrBannerHead);
    }
	public function footer(){
        $footer = '';
        $arrFooter = Info::getItemByKeyword('SITE_FOOTER_LEFT');
        if(sizeof($arrFooter) > 0){
            $footer = stripslashes($arrFooter->info_content);
        }
		$this->layout->footer = View::make("site.BaseLayouts.footer")->with('footer', $footer);
	}
    public function slider(){

        FunctionLib::site_css('lib/skitter-master/skitter.css', CGlobal::$POS_HEAD);
        FunctionLib::site_js('lib/skitter-master/jquery.easing.1.3.js', CGlobal::$POS_END);
        FunctionLib::site_js('lib/skitter-master/jquery.skitter.min.js', CGlobal::$POS_END);

        $arrBanner = Banner::getBannerAdvanced(CGlobal::BANNER_TYPE_SLIDE);
        $arrBannerSlider = $this->getBannerWithPosition($arrBanner);
        $this->layout->slider = View::make("site.BaseLayouts.slider")
                                ->with('arrBannerSlider', $arrBannerSlider);
    }
    public function left(){
        //Banner Calendar Week
        $arrBannerWeeks = Banner::getBannerAdvanced(CGlobal::BANNER_TYPE_CALENDAR_WEEK);
        $arrBannerWeek = $this->getBannerWithPosition($arrBannerWeeks);
        //Banner Bottom
        $arrBanner = Banner::getBannerAdvanced(CGlobal::BANNER_TYPE_LEFT);
        $arrBannerLeft = $this->getBannerWithPosition($arrBanner);
        $this->layout->left = View::make("site.BaseLayouts.left")
                                ->with('arrBannerLeft', $arrBannerLeft)
                                ->with('arrBannerWeek', $arrBannerWeek);
    }
    public function right(){

        $arrBanner = Banner::getBannerAdvanced(CGlobal::BANNER_TYPE_RIGHT);
        $arrBannerRight = $this->getBannerWithPosition($arrBanner);
        $this->layout->right = View::make("site.BaseLayouts.right")
                                ->with('arrBannerRight', $arrBannerRight);
    }

    public function sliderPartnerBottom(){
        FunctionLib::site_js('lib/owl.carousel/owl.carousel.min.js', CGlobal::$POS_END);
        FunctionLib::site_css('lib/owl.carousel/owl.carousel.css', CGlobal::$POS_HEAD);

        $arrBanner = Banner::getBannerAdvanced(CGlobal::BANNER_TYPE_PARTNER);

        $arrBannerPartner = $this->getBannerWithPosition($arrBanner);
        $this->layout->sliderPartnerBottom = View::make("site.BaseLayouts.partnerBottom")
                                ->with('arrBannerPartner', $arrBannerPartner);
    }

    public function getBannerWithPosition($arrBanner = array()){
        $arrBannerShow = array();
        if(sizeof($arrBanner) > 0){
            foreach($arrBanner as $id_banner =>$valu){
                $banner_is_run_time = 1;
                if($valu->banner_is_run_time == CGlobal::BANNER_NOT_RUN_TIME){
                    $banner_is_run_time = 1;
                }else{
                    $banner_start_time = $valu->banner_start_time;
                    $banner_end_time = $valu->banner_end_time;
                    $date_current = time();
                    if($banner_start_time > 0 && $banner_end_time > 0 && $banner_start_time <= $banner_end_time){
                        if($banner_start_time <= $date_current && $date_current <= $banner_end_time){
                            $banner_is_run_time = 1;
                        }
                    }else{
                        $banner_is_run_time = 0;
                    }
                }
                if($banner_is_run_time == 1){
                    $arrBannerShow[$valu->banner_id] = $valu;
                }
            }
        }
        return $arrBannerShow;
    }
}