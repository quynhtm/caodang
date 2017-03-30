<?php
class TraCuuController extends BaseSiteController{
    public function __construct(){
        parent::__construct();
        FunctionLib::site_css('lib/jAlert/jquery.alerts.css', CGlobal::$POS_HEAD);
        FunctionLib::site_js('lib/jAlert/jquery.alerts.js', CGlobal::$POS_END);
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
    public function ajaxTraCuuVanBangChungChi(){
        $dataSearch['vanbang_machungchi'] = trim(stripslashes(Request::get('ipSoHieu','')));
        $dataSearch['vanbang_chungchiso'] = trim(stripslashes(Request::get('ipChungChi','')));

        if($dataSearch['vanbang_machungchi'] != '' && $dataSearch['vanbang_chungchiso'] != ''){
            $result = ExcelVanbang::searchSiteByCondition($dataSearch, 1);
            $arrItem = array();
            if(sizeof($result) > 0){
                foreach($result as $item){
                    $tmp = array(
                        'vanbang_hoten'=>$item->vanbang_hoten,
                        'vanbang_ngaysinh'=>$item->vanbang_ngaysinh,
                        'vanbang_noisinh'=>$item->vanbang_noisinh,
                        'vanbang_gioitinh'=>$item->vanbang_gioitinh,
                        'vanbang_dantoc'=>$item->vanbang_dantoc,
                        'vanbang_nganhdaotao'=>$item->vanbang_nganhdaotao,
                        'vanbang_namtotnghiep'=>$item->vanbang_namtotnghiep,
                        'vanbang_xeploai'=>$item->vanbang_xeploai,
                        'vanbang_machungchi'=>$item->vanbang_machungchi,
                        'vanbang_chungchiso'=>$item->vanbang_chungchiso,
                        'vanbang_khoahoc'=>$item->vanbang_khoahoc,
                        'vanbang_trinhdo'=>$item->vanbang_trinhdo,
                        'vanbang_htdaotao'=>$item->vanbang_htdaotao,
                        'vanbang_sototnghiep'=>$item->vanbang_sototnghiep,
                        'vanbang_ngaytotnghiep'=>$item->vanbang_ngaytotnghiep,
                    );
                    array_push($arrItem, $tmp);
                }
                echo json_encode($arrItem);die;
            }else{
                echo '1';die;//Khong ton tai du lieu
            }
        }
        echo '0';die;//Nhap thieu thong tin
    }
	public function traCuuDiemThiNangKhieu(){
		echo 'traCuuDiemThiNangKhieu';die;
	}
	public function traCuuXetTuyenSinh(){
		echo 'traCuuXetTuyenSinh';die;
	}
}