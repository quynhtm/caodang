<?php

/**
 * Created by PhpStorm.
 * User: QuynhTM
 */
class UploadExcelController extends BaseAdminController
{
    private $permission_full = 'excel_full';
    private $permission_view = 'excel_view';
    private $permission_delete = 'excel_delete';
    private $permission_create = 'excel_create';
    private $permission_edit = 'excel_edit';
    private $arrStatus = array(-1 => 'Chọn trạng thái', CGlobal::status_hide => 'Ẩn', CGlobal::status_show => 'Hiện');
    private $arrTabParent = array();
    private $error = array();

    public function __construct()
    {
        parent::__construct();
        $this->arrTabParent = Tab::getDepart();
    }

    /**
     * ***********************************************************************************************************
     * Thông tin của văn bằng chứng chỉ
     ** **********************************************************************************************************
     */
    public function getInputExcelVanbang(){
        if(!$this->is_root && !in_array($this->permission_full,$this->permission) && !in_array($this->permission_edit,$this->permission) && !in_array($this->permission_create,$this->permission)){
            return Redirect::route('admin.dashboard',array('error'=>1));
        }
        $sheet = (int)Request::get('sheet',0);
        $this->layout->content = View::make('admin.UploadExcel.UploadInputExcelVanbang')
            ->with('sheet', $sheet);
    }
    public function postInputExcelVanbang(){
        if(!$this->is_root && !in_array($this->permission_full,$this->permission) && !in_array($this->permission_edit,$this->permission) && !in_array($this->permission_create,$this->permission)){
            return Redirect::route('admin.dashboard',array('error'=>1));
        }
        $rowsExcel = array();
        $sheet = (int)Request::get('sheet',0);
        if(Input::hasFile('seo_key_file')){
            $file = Input::file('seo_key_file');
            $ext = $file->getClientOriginalExtension();
            switch ($ext) {
                case 'xls':
                case 'xlsx':
                    $objPHPExcel = PHPExcel_IOFactory::load($file);
                    $objPHPExcel->setActiveSheetIndex($sheet);
                    $rowsExcel = $objPHPExcel->getActiveSheet()->toArray(null, true, true, true);
                    break;
                default:
                    $error[] = "Invalid file type";
            }
        }else{
            $error[] = "Not found file input";
        }

        if(!empty($rowsExcel)){
            /**
             * cac tên file
             *  [A] => Stt
                [B] => Họ và tên người học
                [C] => Ngày tháng năm sinh
                [D] => Nơi sinh
                [E] => Giới tính
                [F] => Dân tộc
                [G] => Ngành đào tạo
                [H] => Năm tốt nghiệp
                [I] => Xếp loại tốt nghiệp
                [J] => Số hiệu văn bằng, chứng chỉ
                [K] => Vào sổ cấp văn bằng, chứng chỉ số
                [L] => Khóa học
                [M] => Trình độ
                [N] => Hình thức đào tạo
                [O] => Số Quyết định tốt nghiệp
                [P] => Ngày QĐ tốt nghiệp
             */
            if(empty($rowsExcel))
                return true;
            //FunctionLib::debug($rowsExcel);
            /*$arrColsExcel = array();
            foreach ($rowsExcel[1] as $col => $title_col) {
                $arrColsExcel[trim($title_col)] = $col;
            }*/
            unset($rowsExcel[1]);

            $idxUpdate = $idxCreate = 0;
            $arrMaChungChi = array();
            $arrDataInput = array();
            if(!empty($rowsExcel)){
                foreach($rowsExcel as $key => $val){
                    if(isset($val['J']) && trim($val['J']) !=''){
                        $maChungChi = trim($val['J']);
                        $arrMaChungChi[] = $maChungChi;
                        if(isset($val['B']) && trim($val['B']) !=''){$arrDataInput[$maChungChi]['vanbang_hoten'] = trim($val['B']);}
                        if(isset($val['C']) && trim($val['C']) !=''){$arrDataInput[$maChungChi]['vanbang_ngaysinh'] = trim($val['C']);}
                        if(isset($val['D']) && trim($val['D']) !=''){$arrDataInput[$maChungChi]['vanbang_noisinh'] = trim($val['D']);}
                        if(isset($val['E']) && trim($val['E']) !=''){$arrDataInput[$maChungChi]['vanbang_gioitinh'] = trim($val['E']);}
                        if(isset($val['F']) && trim($val['F']) !=''){$arrDataInput[$maChungChi]['vanbang_dantoc'] = trim($val['F']);}
                        if(isset($val['G']) && trim($val['G']) !=''){$arrDataInput[$maChungChi]['vanbang_nganhdaotao'] = trim($val['G']);}
                        if(isset($val['H']) && trim($val['H']) !=''){$arrDataInput[$maChungChi]['vanbang_namtotnghiep'] = trim($val['H']);}
                        if(isset($val['I']) && trim($val['I']) !=''){$arrDataInput[$maChungChi]['vanbang_xeploai'] = trim($val['I']);}
                        if(isset($val['J']) && trim($val['J']) !=''){
                            $arrDataInput[$maChungChi]['vanbang_machungchi'] = trim($val['J']);
                            $arrDataInput[$maChungChi]['vanbang_machungchi_search'] = FunctionLib::stringTitle(trim($val['J']));
                        }
                        if(isset($val['K']) && trim($val['K']) !=''){$arrDataInput[$maChungChi]['vanbang_chungchiso'] = trim($val['K']);}
                        if(isset($val['L']) && trim($val['L']) !=''){$arrDataInput[$maChungChi]['vanbang_khoahoc'] = trim($val['L']);}
                        if(isset($val['M']) && trim($val['M']) !=''){$arrDataInput[$maChungChi]['vanbang_trinhdo'] = trim($val['M']);}
                        if(isset($val['N']) && trim($val['N']) !=''){$arrDataInput[$maChungChi]['vanbang_htdaotao'] = trim($val['N']);}
                        if(isset($val['O']) && trim($val['O']) !=''){$arrDataInput[$maChungChi]['vanbang_sototnghiep'] = trim($val['O']);}
                        if(isset($val['P']) && trim($val['P']) !=''){$arrDataInput[$maChungChi]['vanbang_ngaytotnghiep'] = trim($val['P']);}
                    }
                }
            }
            //FunctionLib::debug($arrDataInput);
            if(!empty($arrMaChungChi)) {
                //lấy thông tin các mã chứng chỉ đã tồn tại
                $inforVanbang = array();
                $listVanbang = ExcelVanbang::where('vanbang_id','>', 0)->whereIn('vanbang_machungchi', $arrMaChungChi)->get(array('vanbang_id','vanbang_machungchi'));
                if($listVanbang && !empty($listVanbang)){
                    foreach($listVanbang as $item){
                        $inforVanbang[$item->vanbang_machungchi] = $item->vanbang_id;
                    }
                }
                //FunctionLib::debug($inforVanbang);
                foreach ($arrDataInput as $key_maChungChi => $dataSave) {
                    if(isset($inforVanbang[$key_maChungChi])){//update
                        if(sizeof($dataSave) > 0){
                            $dataSave['vanbang_capnhat'] =time();
                            $dataSave['vanbang_nguoicapnhat'] = $this->user['user_full_name'];
                            ExcelVanbang::updateData($inforVanbang[$key_maChungChi],$dataSave);
                            $idxUpdate++;
                        }
                    }else{//tạo mới
                        if(sizeof($dataSave) > 0){
                            $dataSave['vanbang_ngaytao'] =time();
                            $dataSave['vanbang_nguoitao'] = $this->user['user_full_name'];
                            ExcelVanbang::addData($dataSave);
                            $idxCreate++;
                        }
                    }

                }
            }
            echo '<div class="import-done">Da cap nhat: '.$idxUpdate.' và tao moi: '.$idxCreate. ' thành viên';
            echo '<br/><a href="'.URL::route('admin.viewVanbang').'">Trở lại trang danh sách</a>. Ok done.</div>';
            echo '<style>.import-done{text-align: center; line-height: 50px;width: 100%; height: 100%; background: #fafafa;border: 1px solid #ddd; font-family: Tahoma; font-size: 14px;}</style>';
            die;
        }
        $this->layout->content = View::make('admin.UploadExcel.UploadInputExcelVanbang')
            ->with('create_product', in_array($this->permission_create, $this->permission) ? 1 : 0);
    }
    public function viewVanbang() {
        //Check phan quyen.
        if(!$this->is_root && !in_array($this->permission_full,$this->permission)&& !in_array($this->permission_view,$this->permission)){
            return Redirect::route('admin.dashboard',array('error'=>1));
        }
        $pageNo = (int) Request::get('page_no',1);
        $limit = CGlobal::number_limit_show;
        $offset = ($pageNo - 1) * $limit;
        $search = $data = $treeCategroy = array();
        $total = 0;

        $search['vanbang_hoten'] = trim(Request::get('vanbang_hoten',''));
        $search['vanbang_machungchi'] = trim(Request::get('vanbang_machungchi',''));
        $dataSearch = ExcelVanbang::searchByCondition($search, $limit, $offset,$total);
        $paging = '';
        //FunctionLib::debug($dataSearch);

        $this->layout->content = View::make('admin.UploadExcel.viewVanbang')
            ->with('paging', $paging)
            ->with('stt', ($pageNo-1)*$limit)
            ->with('total', $total)
            ->with('data', $dataSearch)
            ->with('search', $search)

            ->with('is_root', $this->is_root)//dùng common
            ->with('permission_full', in_array($this->permission_full, $this->permission) ? 1 : 0)//dùng common
            ->with('permission_delete', in_array($this->permission_delete, $this->permission) ? 1 : 0)//dùng common
            ->with('permission_create', in_array($this->permission_create, $this->permission) ? 1 : 0)//dùng common
            ->with('permission_edit', in_array($this->permission_edit, $this->permission) ? 1 : 0);//dùng common
    }
    public function deleteVanbang()
    {
        $data = array('isIntOk' => 0);
        if(!$this->is_root && !in_array($this->permission_full,$this->permission) && !in_array($this->permission_delete,$this->permission)){
            return Response::json($data);
        }
        $id = (int)Request::get('id', 0);
        if ($id > 0 && ExcelVanbang::deleteData($id)) {
            $data['isIntOk'] = 1;
        }
        return Response::json($data);
    }

    /**
     * ***********************************************************************************************************
     * Thông tin của điểm thi năng khiếu
     ** **********************************************************************************************************
     */
    public function getInputExcelNangkhieu(){
        if(!$this->is_root && !in_array($this->permission_full,$this->permission) && !in_array($this->permission_edit,$this->permission) && !in_array($this->permission_create,$this->permission)){
            return Redirect::route('admin.dashboard',array('error'=>1));
        }
        $sheet = (int)Request::get('sheet',0);
        $this->layout->content = View::make('admin.UploadExcel.UploadInputExcelNangkhieu')->with('sheet', $sheet);
    }
    public function postInputExcelNangkhieu(){
        if(!$this->is_root && !in_array($this->permission_full,$this->permission) && !in_array($this->permission_edit,$this->permission) && !in_array($this->permission_create,$this->permission)){
            return Redirect::route('admin.dashboard',array('error'=>1));
        }
        $rowsExcel = array();
        $sheet = (int)Request::get('sheet',0);
        if(Input::hasFile('seo_key_file')){
            $file = Input::file('seo_key_file');
            $ext = $file->getClientOriginalExtension();
            switch ($ext) {
                case 'xls':
                case 'xlsx':
                    $objPHPExcel = PHPExcel_IOFactory::load($file);
                    $objPHPExcel->setActiveSheetIndex($sheet);
                    $rowsExcel = $objPHPExcel->getActiveSheet()->toArray(null, true, true, true);
                    break;
                default:
                    $error[] = "Invalid file type";
            }
        }else{
            $error[] = "Not found file input";
        }

        if(!empty($rowsExcel)){
            /**
             * cac tên file
             *  [A] => Stt
                [B] => Số BD
                [C] => Họ và tên
                [D] => Ngày sinh
                [E] => Số CMND
                [F] => Số phách
                [G] => NK1
                [H] => NK2
                [I] => NK3
                [J] => NK4
                [K] => NK5
                [L] => Nk6
                [M] => Đợt thi
             */
            if(empty($rowsExcel))
                return true;
            //FunctionLib::debug($rowsExcel);
            unset($rowsExcel[1]);

            $idxUpdate = $idxCreate = 0;
            $arrSoBaoDanh = array();
            $arrDataInput = array();
            if(!empty($rowsExcel)){
                foreach($rowsExcel as $key => $val){
                    if(isset($val['B']) && trim($val['B']) !=''){
                        $soBaoDanh = trim($val['B']);
                        $arrSoBaoDanh[] = $soBaoDanh;
                        if(isset($val['B']) && trim($val['B']) !=''){
                            $arrDataInput[$soBaoDanh]['nangkhieu_sobaodanh'] = trim($val['B']);
                            $arrDataInput[$soBaoDanh]['nangkhieu_sobaodanh_search'] = FunctionLib::stringTitle(trim($val['B']));
                        }
                        if(isset($val['C']) && trim($val['C']) !=''){$arrDataInput[$soBaoDanh]['nangkhieu_hoten'] = trim($val['C']);}
                        if(isset($val['D']) && trim($val['D']) !=''){$arrDataInput[$soBaoDanh]['nangkhieu_ngaysinh'] = trim($val['D']);}
                        if(isset($val['E']) && trim($val['E']) !=''){$arrDataInput[$soBaoDanh]['nangkhieu_cmt'] = trim($val['E']);}
                        if(isset($val['F']) && trim($val['F']) !=''){$arrDataInput[$soBaoDanh]['nangkhieu_sophach'] = trim($val['F']);}
                        if(isset($val['G']) && trim($val['G']) !=''){$arrDataInput[$soBaoDanh]['nangkhieu_monthi_mot'] = trim($val['G']);}
                        if(isset($val['H']) && trim($val['H']) !=''){$arrDataInput[$soBaoDanh]['nangkhieu_monthi_hai'] = trim($val['H']);}
                        if(isset($val['I']) && trim($val['I']) !=''){$arrDataInput[$soBaoDanh]['nangkhieu_monthi_ba'] = trim($val['I']);}
                        if(isset($val['J']) && trim($val['J']) !=''){$arrDataInput[$soBaoDanh]['nangkhieu_monthi_bon'] = trim($val['J']);}
                        if(isset($val['K']) && trim($val['K']) !=''){$arrDataInput[$soBaoDanh]['nangkhieu_monthi_nam'] = trim($val['K']);}
                        if(isset($val['L']) && trim($val['L']) !=''){$arrDataInput[$soBaoDanh]['nangkhieu_monthi_sau'] = trim($val['L']);}
                        if(isset($val['M']) && trim($val['M']) !=''){$arrDataInput[$soBaoDanh]['nangkhieu_ngaythi'] = trim($val['M']);}
                    }
                }
            }
            //FunctionLib::debug($arrDataInput);
            if(!empty($arrSoBaoDanh)) {
                //lấy thông tin các mã chứng chỉ đã tồn tại
                $inforNangkhieu = array();
                $listNangkhieu = ExcelNangkhieu::where('nangkhieu_id','>', 0)->whereIn('nangkhieu_sobaodanh', $arrSoBaoDanh)->get(array('nangkhieu_id','nangkhieu_sobaodanh'));
                if($listNangkhieu && !empty($listNangkhieu)){
                    foreach($listNangkhieu as $item){
                        $inforNangkhieu[$item->nangkhieu_sobaodanh] = $item->nangkhieu_id;
                    }
                }
                //FunctionLib::debug($inforVanbang);
                foreach ($arrDataInput as $key_soBaoDanh => $dataSave) {
                    if(isset($inforNangkhieu[$key_soBaoDanh])){//update
                        if(sizeof($dataSave) > 0){
                            $dataSave['nangkhieu_ngaycapnhat'] =time();
                            $dataSave['nangkhieu_nguoicapnhat'] = $this->user['user_full_name'];
                            ExcelNangkhieu::updateData($inforNangkhieu[$key_soBaoDanh],$dataSave);
                            $idxUpdate++;
                        }
                    }else{//tạo mới
                        if(sizeof($dataSave) > 0){
                            $dataSave['nangkhieu_ngaytao'] =time();
                            $dataSave['nangkhieu_nguoitao'] = $this->user['user_full_name'];
                            ExcelNangkhieu::addData($dataSave);
                            $idxCreate++;
                        }
                    }

                }
            }
            echo '<div class="import-done">Da cap nhat: '.$idxUpdate.' và tao moi: '.$idxCreate. ' thành viên';
            echo '<br/><a href="'.URL::route('admin.viewNangkhieu').'">Trở lại trang danh sách</a>. OK done.</div>';
            echo '<style>.import-done{text-align: center; line-height: 50px;width: 100%; height: 100%; background: #fafafa;border: 1px solid #ddd; font-family: Tahoma; font-size: 14px;}</style>';
            die();

        }
        $this->layout->content = View::make('admin.UploadExcel.UploadInputExcelNangkhieu')->with('create_product', in_array($this->permission_create, $this->permission) ? 1 : 0);
    }
    public function viewNangkhieu() {
        //Check phan quyen.
        if(!$this->is_root && !in_array($this->permission_full,$this->permission)&& !in_array($this->permission_view,$this->permission)){
            return Redirect::route('admin.dashboard',array('error'=>1));
        }
        $pageNo = (int) Request::get('page_no',1);
        $limit = CGlobal::number_limit_show;
        $offset = ($pageNo - 1) * $limit;
        $search = $data = $treeCategroy = array();
        $total = 0;

        $search['nangkhieu_hoten'] = trim(Request::get('nangkhieu_hoten',''));
        $search['nangkhieu_sobaodanh'] = trim(Request::get('nangkhieu_sobaodanh',''));
        $dataSearch = ExcelNangkhieu::searchByCondition($search, $limit, $offset,$total);
        $paging = '';
        //FunctionLib::debug($dataSearch);

        $this->layout->content = View::make('admin.UploadExcel.viewNangkhieu')
            ->with('paging', $paging)
            ->with('stt', ($pageNo-1)*$limit)
            ->with('total', $total)
            ->with('data', $dataSearch)
            ->with('search', $search)

            ->with('is_root', $this->is_root)//dùng common
            ->with('permission_full', in_array($this->permission_full, $this->permission) ? 1 : 0)//dùng common
            ->with('permission_delete', in_array($this->permission_delete, $this->permission) ? 1 : 0)//dùng common
            ->with('permission_create', in_array($this->permission_create, $this->permission) ? 1 : 0)//dùng common
            ->with('permission_edit', in_array($this->permission_edit, $this->permission) ? 1 : 0);//dùng common
    }
    public function deleteNangkhieu()
    {
        $data = array('isIntOk' => 0);
        if(!$this->is_root && !in_array($this->permission_full,$this->permission) && !in_array($this->permission_delete,$this->permission)){
            return Response::json($data);
        }
        $id = (int)Request::get('id', 0);
        if ($id > 0 && ExcelNangkhieu::deleteData($id)) {
            $data['isIntOk'] = 1;
        }
        return Response::json($data);
    }
    /**
     * ***********************************************************************************************************
     * Thông tin của Xét tuyển sinh
     ** **********************************************************************************************************
     */
    public function getInputExcelTuyensinh(){
        if(!$this->is_root && !in_array($this->permission_full,$this->permission) && !in_array($this->permission_edit,$this->permission) && !in_array($this->permission_create,$this->permission)){
            return Redirect::route('admin.dashboard',array('error'=>1));
        }
        $sheet = (int)Request::get('sheet',0);
        $this->layout->content = View::make('admin.UploadExcel.UploadInputExcelTuyensinh')->with('sheet', $sheet);
    }
    public function postInputExcelTuyensinh(){
        if(!$this->is_root && !in_array($this->permission_full,$this->permission) && !in_array($this->permission_edit,$this->permission) && !in_array($this->permission_create,$this->permission)){
            return Redirect::route('admin.dashboard',array('error'=>1));
        }
        $rowsExcel = array();
        $sheet = (int)Request::get('sheet',0);
        if(Input::hasFile('seo_key_file')){
            $file = Input::file('seo_key_file');
            $ext = $file->getClientOriginalExtension();
            switch ($ext) {
                case 'xls':
                case 'xlsx':
                    $objPHPExcel = PHPExcel_IOFactory::load($file);
                    $objPHPExcel->setActiveSheetIndex($sheet);
                    $rowsExcel = $objPHPExcel->getActiveSheet()->toArray(null, true, true, true);
                    break;
                default:
                    $error[] = "Invalid file type";
            }
        }else{
            $error[] = "Not found file input";
        }

        if(!empty($rowsExcel)){
            /**
             * cac tên file
             *  [A] => STT
                [B] => Số hồ sơ
                [C] => Số báo danh
                [D] => Họ và tên
                [E] => Ngày sinh
                [F] => Giới tính
                [G] => CMND
                [H] => KV ƯT
                [I] => ĐT ƯT
                [J] => Tên tỉnh
                [K] => Tên quận huyện
                [L] => Mã môn 1
                [M] => Điểm môn 1
                [N] => Mã môn 2
                [O] => Điểm môn 2
                [P] => Mã môn 3
                [Q] => Điểm môn 3
                [R] => Điểm lệch
                [S] => Tổng điểm chưa có ƯT
                [T] => Điểm ưu tiên quy đổi
                [U] => Tổng điểm có ƯT
                [V] => Ngành trúng tuyển
                [W] => Đợt XT
                [X] => Trình độ
                [Y] => Hình thức xét tuyển
             */
            if(empty($rowsExcel))
                return true;
            //FunctionLib::debug($rowsExcel);
            unset($rowsExcel[1]);

            $idxUpdate = $idxCreate = 0;
            $arrSoBaoDanh = array();
            $arrDataInput = array();
            if(!empty($rowsExcel)){
                foreach($rowsExcel as $key => $val){
                    if(isset($val['C']) && trim($val['C']) !=''){
                        $soBaoDanh = trim($val['C']);
                        $arrSoBaoDanh[] = $soBaoDanh;
                        if(isset($val['B']) && trim($val['B']) !=''){$arrDataInput[$soBaoDanh]['tuyensinh_sohoso'] = trim($val['B']);}
                        if(isset($val['C']) && trim($val['C']) !=''){
                            $arrDataInput[$soBaoDanh]['tuyensinh_sobaodanh'] = trim($val['C']);
                            $arrDataInput[$soBaoDanh]['tuyensinh_sobaodanh_search'] = FunctionLib::stringTitle(trim($val['C']));
                        }
                        if(isset($val['D']) && trim($val['D']) !=''){$arrDataInput[$soBaoDanh]['tuyensinh_hoten'] = trim($val['D']);}
                        if(isset($val['E']) && trim($val['E']) !=''){$arrDataInput[$soBaoDanh]['tuyensinh_ngaysinh'] = trim($val['E']);}
                        if(isset($val['F']) && trim($val['F']) !=''){$arrDataInput[$soBaoDanh]['tuyensinh_gioitinh'] = trim($val['F']);}
                        if(isset($val['G']) && trim($val['G']) !=''){$arrDataInput[$soBaoDanh]['tuyensinh_cmt'] = trim($val['G']);}
                        if(isset($val['H']) && trim($val['H']) !=''){$arrDataInput[$soBaoDanh]['tuyensinh_khuvuc_uutien'] = trim($val['H']);}
                        if(isset($val['I']) && trim($val['I']) !=''){$arrDataInput[$soBaoDanh]['tuyensinh_diem_uutien'] = trim($val['I']);}
                        if(isset($val['J']) && trim($val['J']) !=''){$arrDataInput[$soBaoDanh]['tuyensinh_tinhthanh'] = trim($val['J']);}
                        if(isset($val['K']) && trim($val['K']) !=''){$arrDataInput[$soBaoDanh]['tuyensinh_quanhuyen'] = trim($val['K']);}

                        if(isset($val['L']) && trim($val['L']) !=''){$arrDataInput[$soBaoDanh]['tuyensinh_monthi_mot'] = trim($val['L']);}
                        if(isset($val['M']) && trim($val['M']) !=''){$arrDataInput[$soBaoDanh]['tuyensinh_diem_monthimot'] = trim($val['M']);}

                        if(isset($val['N']) && trim($val['N']) !=''){$arrDataInput[$soBaoDanh]['tuyensinh_monthi_hai'] = trim($val['N']);}
                        if(isset($val['O']) && trim($val['O']) !=''){$arrDataInput[$soBaoDanh]['tuyensinh_diem_monthihai'] = trim($val['O']);}

                        if(isset($val['P']) && trim($val['P']) !=''){$arrDataInput[$soBaoDanh]['tuyensinh_monthi_ba'] = trim($val['P']);}
                        if(isset($val['Q']) && trim($val['Q']) !=''){$arrDataInput[$soBaoDanh]['tuyensinh_diem_monthiba'] = trim($val['Q']);}

                        if(isset($val['R']) && trim($val['R']) !=''){$arrDataInput[$soBaoDanh]['tuyensinh_diemlech'] = trim($val['R']);}
                        if(isset($val['S']) && trim($val['S']) !=''){$arrDataInput[$soBaoDanh]['tuyensinh_tongdiemchua_uutien'] = trim($val['S']);}
                        if(isset($val['T']) && trim($val['T']) !=''){$arrDataInput[$soBaoDanh]['tuyensinh_diem_uutien_quydoi'] = trim($val['T']);}
                        if(isset($val['U']) && trim($val['U']) !=''){$arrDataInput[$soBaoDanh]['tuyensinh_tongdiemco_uutien'] = trim($val['U']);}
                        if(isset($val['V']) && trim($val['V']) !=''){$arrDataInput[$soBaoDanh]['tuyensinh_nganhtrungtuyen'] = trim($val['V']);}
                        if(isset($val['W']) && trim($val['W']) !=''){$arrDataInput[$soBaoDanh]['tuyensinh_dotxettuyen'] = trim($val['W']);}
                        if(isset($val['X']) && trim($val['X']) !=''){$arrDataInput[$soBaoDanh]['tuyensinh_trinhdo'] = trim($val['X']);}
                        if(isset($val['Y']) && trim($val['Y']) !=''){$arrDataInput[$soBaoDanh]['tuyensinh_hinhthucxettuyen'] = trim($val['Y']);}
                    }
                }
            }
            //FunctionLib::debug($arrDataInput);
            if(!empty($arrSoBaoDanh)) {
                //lấy thông tin các mã chứng chỉ đã tồn tại
                $inforTuyensinh = array();
                $listTuyensinh = ExcelTuyensinh::where('tuyensinh_id','>', 0)->whereIn('tuyensinh_sobaodanh', $arrSoBaoDanh)->get(array('tuyensinh_id','tuyensinh_sobaodanh'));
                if($listTuyensinh && !empty($listTuyensinh)){
                    foreach($listTuyensinh as $item){
                        $inforTuyensinh[$item->tuyensinh_sobaodanh] = $item->tuyensinh_id;
                    }
                }
                //FunctionLib::debug($inforVanbang);
                foreach ($arrDataInput as $key_soBaoDanh => $dataSave) {
                    if(isset($inforTuyensinh[$key_soBaoDanh])){//update
                        if(sizeof($dataSave) > 0){
                            $dataSave['tuyensinh_ngaycapnhat'] =time();
                            $dataSave['tuyensinh_nguoicapnhat'] = $this->user['user_full_name'];
                            ExcelTuyensinh::updateData($inforTuyensinh[$key_soBaoDanh],$dataSave);
                            $idxUpdate++;
                        }
                    }else{//tạo mới
                        if(sizeof($dataSave) > 0){
                            $dataSave['tuyensinh_ngaytao'] =time();
                            $dataSave['tuyensinh_nguoitao'] = $this->user['user_full_name'];
                            ExcelTuyensinh::addData($dataSave);
                            $idxCreate++;
                        }
                    }

                }
            }
            echo '<div class="import-done">Da cap nhat: '.$idxUpdate.' và tao moi: '.$idxCreate. ' thành viên';
            echo '<br/><a href="'.URL::route('admin.viewTuyensinh').'">Trở lại trang danh sách</a>. OK done.</div>';
            echo '<style>.import-done{text-align: center; line-height: 50px;width: 100%; height: 100%; background: #fafafa;border: 1px solid #ddd; font-family: Tahoma; font-size: 14px;}</style>';
            die();
        }
        $this->layout->content = View::make('admin.UploadExcel.UploadInputExcelTuyensinh')->with('create_product', in_array($this->permission_create, $this->permission) ? 1 : 0);
    }
    public function viewTuyensinh() {
        //Check phan quyen.
        if(!$this->is_root && !in_array($this->permission_full,$this->permission)&& !in_array($this->permission_view,$this->permission)){
            return Redirect::route('admin.dashboard',array('error'=>1));
        }
        $pageNo = (int) Request::get('page_no',1);
        $limit = CGlobal::number_limit_show;
        $offset = ($pageNo - 1) * $limit;
        $search = $data = $treeCategroy = array();
        $total = 0;

        $search['tuyensinh_hoten'] = trim(Request::get('tuyensinh_hoten',''));
        $search['tuyensinh_sobaodanh'] = trim(Request::get('tuyensinh_sobaodanh',''));
        $dataSearch = ExcelTuyensinh::searchByCondition($search, $limit, $offset,$total);
        $paging = '';
        //FunctionLib::debug($dataSearch);

        $this->layout->content = View::make('admin.UploadExcel.viewTuyensinh')
            ->with('paging', $paging)
            ->with('stt', ($pageNo-1)*$limit)
            ->with('total', $total)
            ->with('data', $dataSearch)
            ->with('search', $search)

            ->with('is_root', $this->is_root)//dùng common
            ->with('permission_full', in_array($this->permission_full, $this->permission) ? 1 : 0)//dùng common
            ->with('permission_delete', in_array($this->permission_delete, $this->permission) ? 1 : 0)//dùng common
            ->with('permission_create', in_array($this->permission_create, $this->permission) ? 1 : 0)//dùng common
            ->with('permission_edit', in_array($this->permission_edit, $this->permission) ? 1 : 0);//dùng common
    }
    public function deleteTuyensinh()
    {
        $data = array('isIntOk' => 0);
        if(!$this->is_root && !in_array($this->permission_full,$this->permission) && !in_array($this->permission_delete,$this->permission)){
            return Response::json($data);
        }
        $id = (int)Request::get('id', 0);
        if ($id > 0 && ExcelTuyensinh::deleteData($id)) {
            $data['isIntOk'] = 1;
        }
        return Response::json($data);
    }
}