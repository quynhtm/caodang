<?php
class TraCuuController extends BaseSiteController{
    public function __construct(){
        parent::__construct();
    }
	public function traCuuVanBangChungChi(){
        //Meta title
        $meta_title='';
        $meta_keywords='';
        $meta_description='';
        $meta_img='';
        $arrMeta = Info::getItemByKeyword('SITE_SEO_TRACUU_VANBANG_CHUNGCHI');
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

        $this->header();
        $this->layout->content = View::make('site.SiteLayouts.pageTraCuuVanBangChungChi');
        $this->eduBottom();
        $this->sliderPartnerBottom();
        $this->footer();
	}
	
	public function traCuuDiemThiNangKhieu(){
		echo 'traCuuDiemThiNangKhieu';die;
	}
	public function traCuuXetTuyenSinh(){
		echo 'traCuuXetTuyenSinh';die;
	}
}