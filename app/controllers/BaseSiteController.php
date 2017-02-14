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
        $menuCategoriessAll = Category::getCategoriessAll();
    	$this->layout->header = View::make("site.BaseLayouts.header")
                                ->with('menuCategoriessAll', $menuCategoriessAll);
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
        $this->layout->slider = View::make("site.BaseLayouts.slider");
    }
    public function left(){
        $this->layout->left = View::make("site.BaseLayouts.left");
    }
    public function right(){
        $this->layout->right = View::make("site.BaseLayouts.right");
    }
}