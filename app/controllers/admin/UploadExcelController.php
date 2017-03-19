<?php

/**
 * Created by PhpStorm.
 * User: QuynhTM
 */
class UploadExcelController extends BaseAdminController
{
    private $permission_full = 'tab_full';
    private $permission_view = 'tab_view';
    private $permission_delete = 'tab_delete';
    private $permission_create = 'tab_create';
    private $permission_edit = 'tab_edit';
    private $arrStatus = array(-1 => 'Chọn trạng thái', CGlobal::status_hide => 'Ẩn', CGlobal::status_show => 'Hiện');
    private $arrTabParent = array();
    private $error = array();

    public function __construct()
    {
        parent::__construct();
        $this->arrTabParent = Tab::getDepart();
    }

    public function getInputExcel(){
        $sheet = (int)Request::get('sheet',0);
        $type = (int)Request::get('type_inport',1);
        $optionTypeInport = FunctionLib::getOption(array(1 => 'Cập nhật sản phẩm'), $type);
        $this->layout->content = View::make('admin.UploadExcel.UploadInputExcel')
            ->with('sheet', $sheet)
            ->with('optionTypeInport', $optionTypeInport);
    }
    public function postInputExcel(){
        $rowsExcel = array();
        $sheet = (int)Request::get('sheet',0);
        $type_inport = (int)Request::get('type_inport',1); //1: sửa giá bán và giá trị trường, giá nhập
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
             *  [A] => ID sản phẩm
            [B] => Giá trị đóng gói
            [C] => Kiểu đóng gói
            [D] => Kiểu sản phẩm
            [E] => Giá bán niêm yết
            [F] => Giá thị trường
            [G] => Giá bán trên site
            [H] => Giá NCC thu về
            [I] => Số lượng mua tối thiểu
             */
            if(empty($rowsExcel))
                return true;

            FunctionLib::debug($rowsExcel);

            $arrColsExcel = array();
            foreach ($rowsExcel[1] as $col => $title_col) {
                $arrColsExcel[trim($title_col)] = $col;
            }
            unset($rowsExcel[1]);

            $idxUpdate = 0;
            $arrProductId = array();
            $arrDataInput = array();
            foreach ($rowsExcel as $val) {
                if (isset($arrColsExcel['ID sản phẩm']) && (int)trim($val[$arrColsExcel['ID sản phẩm']]) > 0) {
                    $product_id = trim($val[$arrColsExcel['ID sản phẩm']]);
                    $arrProductId[] = $product_id;

                    $product_price = (isset($arrColsExcel['Giá bán niêm yết']) && trim($val[$arrColsExcel['Giá bán niêm yết']]) != '' )? (int)str_replace(',','',trim(preg_replace('/[^0-9\,]/','', trim($val[$arrColsExcel['Giá bán niêm yết']])))) : 0;
                    $product_market_price = (isset($arrColsExcel['Giá thị trường']) && trim($val[$arrColsExcel['Giá thị trường']]) != '' )? (int)str_replace(',','',trim(preg_replace('/[^0-9\,]/','', trim($val[$arrColsExcel['Giá thị trường']])))) : 0;
                    $product_sell_price = (isset($arrColsExcel['Giá bán trên site']) && trim($val[$arrColsExcel['Giá bán trên site']]) != '' )? (int)str_replace(',','',trim(preg_replace('/[^0-9\,]/','', trim($val[$arrColsExcel['Giá bán trên site']])))) : 0;
                    $product_price_supplier_get = (isset($arrColsExcel['Giá NCC thu về']) && trim($val[$arrColsExcel['Giá NCC thu về']]) != '' )? (int)str_replace(',','',trim(preg_replace('/[^0-9\,]/','', trim($val[$arrColsExcel['Giá NCC thu về']])))) : 0;
                    $product_order_min_sale = (isset($arrColsExcel['Số lượng mua tối thiểu']) && trim($val[$arrColsExcel['Số lượng mua tối thiểu']]) != '' )? (int)str_replace(',','',trim(preg_replace('/[^0-9\,]/','', trim($val[$arrColsExcel['Số lượng mua tối thiểu']])))) : 0;

                    $product_percent_discount = 0;
                    if($product_price > 0 && $product_sell_price > 0){
                        $product_percent_discount =  round((100-(($product_sell_price/$product_price)*100)),2);
                    }

                    //thực phẩm
                    //Kiêu đóng gói
                    $name_dong_goi = (isset($arrColsExcel['Kiểu đóng gói']) && trim($val[$arrColsExcel['Kiểu đóng gói']]) != '' )? trim($val[$arrColsExcel['Kiểu đóng gói']]) : '';
                    if($name_dong_goi != ''){
                        $arrDongGoi[$name_dong_goi] = $name_dong_goi;
                    }
                    $unit_package = (isset($arrColsExcel['Giá trị đóng gói']) && trim($val[$arrColsExcel['Giá trị đóng gói']]) != '' )? trim(preg_replace('/[^0-9\.]/','', trim($val[$arrColsExcel['Giá trị đóng gói']]))) : 0;
                    $product_type = (isset($arrColsExcel['Kiểu sản phẩm']) && trim($val[$arrColsExcel['Kiểu sản phẩm']]) != '' )? trim(preg_replace('/[^0-9\.]/','', trim($val[$arrColsExcel['Kiểu sản phẩm']]))) : 0;


                    //thuc pham
                    $arrDataInput[$product_id]['name_dong_goi'] = $name_dong_goi;//dùng để check để lấy kiểu đóng gói
                    $arrDataInput[$product_id]['unit_package'] = $unit_package;//Giá trị đóng gói
                    $arrDataInput[$product_id]['product_type'] = $product_type;//loại sản phẩm
                    $arrDataInput[$product_id]['product_order_min_sale'] = $product_order_min_sale;//Số lượng mua tối thiểu

                    $arrDataInput[$product_id]['product_import_price'] = $product_price_supplier_get;//giá nhập
                    $arrDataInput[$product_id]['product_price_supplier_get'] = $product_price_supplier_get;//giá nhà cung cấp thu
                    $arrDataInput[$product_id]['product_price'] = $product_price;//giá niêm yết
                    $arrDataInput[$product_id]['product_market_price'] = $product_market_price;//giá thị trường
                    $arrDataInput[$product_id]['product_sell_price'] = $product_sell_price;//giá bán
                    $arrDataInput[$product_id]['product_percent_discount'] = $product_percent_discount;// % giảm giá
                    $arrDataInput[$product_id]['product_percent'] = $product_percent_discount;// % giảm giá
                    $arrDataInput[$product_id]['product_price_discount'] = ($product_price > 0 && $product_sell_price > 0 ) ? abs($product_price - $product_sell_price): 0;//số tiền giảm
                }
            }
            //FunctionLib::debug($arrDataInput);
            if(!empty($arrProductId)) {

                //foreach để cập nhật
                if(!empty($arrDataInput)) {
                    foreach ($arrDataInput as $pro_id => $val_input) {
                        if ((int)$pro_id > 0) {//
                            $dataSave = array();
                            //cap nhat san pham
                            if($val_input['product_import_price'] > 0){//gia nhap
                                $dataSave['product_import_price'] = $val_input['product_import_price'];
                            }
                            if($val_input['product_price_supplier_get'] > 0){//gia NCC lay
                                $dataSave['product_price_supplier_get'] = $val_input['product_price_supplier_get'];
                            }
                            if($val_input['product_price'] > 0){// gia niem yet
                                $dataSave['product_price'] = $val_input['product_price'];
                            }
                            if($val_input['product_market_price'] > 0){//gia thi truong
                                $dataSave['product_market_price'] = $val_input['product_market_price'];
                            }
                            if($val_input['product_sell_price'] > 0){//gia bán
                                $dataSave['product_sell_price'] = $val_input['product_sell_price'];
                            }
                            if($val_input['product_percent_discount'] > 0){// % giảm giá
                                $dataSave['product_percent_discount'] = $val_input['product_percent_discount'];
                            }
                            if($val_input['product_percent'] > 0){// % giảm giá
                                $dataSave['product_percent'] = $val_input['product_percent'];
                            }
                            if($val_input['product_price_discount'] > 0){// so tien giảm giá
                                $dataSave['product_price_discount'] = $val_input['product_price_discount'];
                            }

                            if($val_input['product_order_min_sale'] > 0){//số lượng tối thiểu đặt mua
                                $dataSave['product_order_min_sale'] = $val_input['product_order_min_sale'];
                            }

                            //thuc pham
                            if(isset($arrUnitId[$val_input['name_dong_goi']]) && $arrUnitId[$val_input['name_dong_goi']] > 0) {
                                $dataSave['unit_id'] = isset($arrUnitId[$val_input['name_dong_goi']]) ? $arrUnitId[$val_input['name_dong_goi']] : 0;//id kieu dong goi
                                $dataSave['unit_name'] = (isset($arrUnitId[$val_input['name_dong_goi']]) && $arrUnitId[$val_input['name_dong_goi']] > 0) ? $val_input['name_dong_goi'] : 'chưa rõ';//id kieu dong goi
                            }
                            if(isset($val_input['unit_package']) && $val_input['unit_package'] > 0) {
                                $dataSave['unit_package'] = $val_input['unit_package'];//giá trị đóng gói
                            }
                            if(isset($val_input['product_type']) && $val_input['product_type'] > 0) {
                                $dataSave['product_type'] = $val_input['product_type'];//kiểu sản phẩm
                            }

                            if(sizeof($dataSave) > 0){
                                $dataSave['key'] = $this->key;
                                Product::updateProductToExcel((int)$pro_id, $dataSave);
                                $idxUpdate++;
                            }
                        }
                    }
                }
            }
            echo 'Da cap nhat: '.$idxUpdate.' san pham';
            die(' Ok done');
        }
        $this->layout->content = View::make('admin.UploadExcel.UploadInputExcel')
            ->with('create_product', in_array($this->permission_create, $this->permission) ? 1 : 0);
    }

    public function viewTab() {
        //Check phan quyen.
        if(!$this->is_root && !in_array($this->permission_full,$this->permission)&& !in_array($this->permission_view,$this->permission)){
            return Redirect::route('admin.dashboard',array('error'=>1));
        }
        $pageNo = (int) Request::get('page_no',1);
        $limit = CGlobal::number_limit_show;
        $offset = ($pageNo - 1) * $limit;
        $search = $data = $treeCategroy = array();
        $total = 0;

        $search['tab_name'] = addslashes(Request::get('tab_name',''));
        $search['tab_status'] = (int)Request::get('tab_status',-1);
        $dataSearch = Tab::searchByCondition($search, $limit, $offset,$total);
        $paging = '';
        $optionStatus = FunctionLib::getOption($this->arrStatus, $search['tab_status']);
        $this->layout->content = View::make('admin.UploadExcel.viewTab')
            ->with('paging', $paging)
            ->with('stt', ($pageNo-1)*$limit)
            ->with('total', $total)
            ->with('data', $dataSearch)
            ->with('search', $search)
            ->with('optionStatus', $optionStatus)

            ->with('is_root', $this->is_root)//dùng common
            ->with('permission_full', in_array($this->permission_full, $this->permission) ? 1 : 0)//dùng common
            ->with('permission_delete', in_array($this->permission_delete, $this->permission) ? 1 : 0)//dùng common
            ->with('permission_create', in_array($this->permission_create, $this->permission) ? 1 : 0)//dùng common
            ->with('permission_edit', in_array($this->permission_edit, $this->permission) ? 1 : 0);//dùng common
    }
    public function getTab($id=0) {
        if(!$this->is_root && !in_array($this->permission_full,$this->permission) && !in_array($this->permission_edit,$this->permission) && !in_array($this->permission_create,$this->permission)){
            return Redirect::route('admin.dashboard',array('error'=>1));
        }
        $data = array();
        if($id > 0) {
            $data = Tab::find($id);
        }
        $optionStatus = FunctionLib::getOption($this->arrStatus, isset($data['tab_status'])? $data['tab_status'] : CGlobal::status_show);
        $this->layout->content = View::make('admin.UploadExcel.addTab')
            ->with('id', $id)
            ->with('data', $data)
            ->with('optionStatus', $optionStatus);
    }
    public function postTab($id=0) {
        if(!$this->is_root && !in_array($this->permission_full,$this->permission) && !in_array($this->permission_edit,$this->permission) && !in_array($this->permission_create,$this->permission)){
            return Redirect::route('admin.dashboard',array('error'=>1));
        }

        $dataSave['tab_name'] = addslashes(Request::get('tab_name'));
        $dataSave['tab_link'] = addslashes(Request::get('tab_link'));
        $dataSave['tab_status'] = (int)Request::get('tab_status', CGlobal::status_show);
        $dataSave['tab_order'] = (int)Request::get('tab_order', 1);

        if($this->valid($dataSave) && empty($this->error)) {
            if($id > 0) {
                //cap nhat
                if(Tab::updateData($id, $dataSave)) {
                    return Redirect::route('admin.tabView');
                }
            } else {
                //them moi
                if(Tab::addData($dataSave)) {
                    return Redirect::route('admin.tabView');
                }
            }
        }
        $optionStatus = FunctionLib::getOption($this->arrStatus, isset($dataSave['tab_status'])? $dataSave['tab_status'] : -1);
        $this->layout->content =  View::make('admin.UploadExcel.addTab')
            ->with('id', $id)
            ->with('data', $dataSave)
            ->with('optionStatus', $optionStatus)
            ->with('error', $this->error);
    }
    public function updateStatusTab()
    {
        $id = (int)Request::get('id', 0);
        $status = (int)Request::get('status', CGlobal::status_hide);
        $result = array('isIntOk' => 0);
        if(!$this->is_root && !in_array($this->permission_full,$this->permission) && !in_array($this->permission_delete,$this->permission)){
            return Response::json($result);
        }

        if ($id > 0) {
            $dataSave['tab_status'] = ($status == CGlobal::status_hide)? CGlobal::status_show : CGlobal::status_hide;
            if(Tab::updateData($id, $dataSave)) {
                $result['isIntOk'] = 1;
            }
        }
        return Response::json($result);
    }

    public function viewTabSub() {
        //Check phan quyen.
        if(!$this->is_root && !in_array($this->permission_full,$this->permission)&& !in_array($this->permission_view,$this->permission)){
            return Redirect::route('admin.dashboard',array('error'=>1));
        }
        $pageNo = (int) Request::get('page_no',1);
        $limit = CGlobal::number_limit_show;
        $offset = ($pageNo - 1) * $limit;
        $search = $data = $treeCategroy = array();
        $total = 0;

        $search['tab_sub_name'] = addslashes(Request::get('tab_sub_name',''));
        $search['tab_sub_status'] = (int)Request::get('tab_sub_status',-1);
        $dataSearch = TabSub::searchByCondition($search, $limit, $offset,$total);
        $paging = '';
        $optionStatus = FunctionLib::getOption($this->arrStatus, $search['tab_sub_status']);
        $this->layout->content = View::make('admin.UploadExcel.viewTabSub')
            ->with('paging', $paging)
            ->with('stt', ($pageNo-1)*$limit)
            ->with('total', $total)
            ->with('arrTabParent', $this->arrTabParent)
            ->with('data', $dataSearch)
            ->with('search', $search)
            ->with('optionStatus', $optionStatus)

            ->with('is_root', $this->is_root)//dùng common
            ->with('permission_full', in_array($this->permission_full, $this->permission) ? 1 : 0)//dùng common
            ->with('permission_delete', in_array($this->permission_delete, $this->permission) ? 1 : 0)//dùng common
            ->with('permission_create', in_array($this->permission_create, $this->permission) ? 1 : 0)//dùng common
            ->with('permission_edit', in_array($this->permission_edit, $this->permission) ? 1 : 0);//dùng common
    }
    public function getTabSub($id=0) {
        if(!$this->is_root && !in_array($this->permission_full,$this->permission) && !in_array($this->permission_edit,$this->permission) && !in_array($this->permission_create,$this->permission)){
            return Redirect::route('admin.dashboard',array('error'=>1));
        }
        $data = array();
        if($id > 0) {
            $data = TabSub::find($id);
        }
        $optionStatus = FunctionLib::getOption($this->arrStatus, isset($data['tab_sub_status'])? $data['tab_sub_status'] : CGlobal::status_show);
        $optionTabParent = FunctionLib::getOption(array(0=>'--Chọn tab cha--')+$this->arrTabParent, isset($data['tab_parent_id'])? $data['tab_parent_id'] : 0);
        $this->layout->content = View::make('admin.UploadExcel.addTabSub')
            ->with('id', $id)
            ->with('data', $data)
            ->with('optionTabParent', $optionTabParent)
            ->with('optionStatus', $optionStatus);
    }
    public function postTabSub($id=0) {
        if(!$this->is_root && !in_array($this->permission_full,$this->permission) && !in_array($this->permission_edit,$this->permission) && !in_array($this->permission_create,$this->permission)){
            return Redirect::route('admin.dashboard',array('error'=>1));
        }

        $dataSave['tab_sub_name'] = addslashes(Request::get('tab_sub_name'));
        $dataSave['tab_sub_link'] = addslashes(Request::get('tab_sub_link'));
        $dataSave['tab_sub_status'] = (int)Request::get('tab_sub_status', CGlobal::status_show);
        $dataSave['tab_sub_order'] = (int)Request::get('tab_sub_order', 1);
        $dataSave['tab_parent_id'] = (int)Request::get('tab_parent_id', 0);

        $file = Input::file('image');
        if($file){
            $filename = $file->getClientOriginalName();
            $destinationPath = Config::get('config.DIR_ROOT').'/uploads/'.CGlobal::FOLDER_TAB_SUB.'/'. $id;
            $upload  = Input::file('image')->move($destinationPath, $filename);
            //xóa ảnh cũ
            if($filename != ''){
                $tab_sub_image_old = Request::get('tab_sub_image_old', '');
                if($tab_sub_image_old != '')
                {
                    //xoa anh upload
                    FunctionLib::deleteFileUpload($tab_sub_image_old,$id,CGlobal::FOLDER_TAB_SUB);

                    //xóa anh thumb
                    $arrSizeThumb = CGlobal::$arrSizeImage;
                    foreach($arrSizeThumb as $k=>$size){
                        $sizeThumb = $size['w'].'x'.$size['h'];
                        FunctionLib::deleteFileThumb($tab_sub_image_old,$id,CGlobal::FOLDER_TAB_SUB,$sizeThumb);
                    }
                }
            }
            $dataSave['tab_sub_image'] = $filename;
        }else{
            $dataSave['tab_sub_image'] = Request::get('tab_sub_image', '');
        }

        if($this->valid($dataSave) && empty($this->error)) {
            if($id > 0) {
                //cap nhat
                if(TabSub::updateData($id, $dataSave)) {
                    return Redirect::route('admin.tabSubView');
                }
            } else {
                //them moi
                if(TabSub::addData($dataSave)) {
                    return Redirect::route('admin.tabSubView');
                }
            }
        }
        $optionStatus = FunctionLib::getOption($this->arrStatus, isset($dataSave['tab_sub_status'])? $dataSave['tab_sub_status'] : -1);
        $optionTabParent = FunctionLib::getOption(array(0=>'Tab dưới')+$this->arrTabParent, isset($dataSave['tab_parent_id'])? $dataSave['tab_parent_id'] : 0);
        $this->layout->content =  View::make('admin.UploadExcel.addTabSub')
            ->with('id', $id)
            ->with('data', $dataSave)
            ->with('optionStatus', $optionStatus)
            ->with('optionTabParent', $optionTabParent)
            ->with('error', $this->error);
    }
    public function updateStatusTabSub()
    {
        $id = (int)Request::get('id', 0);
        $status = (int)Request::get('status', CGlobal::status_hide);
        $result = array('isIntOk' => 0);
        if(!$this->is_root && !in_array($this->permission_full,$this->permission) && !in_array($this->permission_delete,$this->permission)){
            return Response::json($result);
        }

        if ($id > 0) {
            $dataSave['tab_sub_status'] = ($status == CGlobal::status_hide)? CGlobal::status_show : CGlobal::status_hide;
            if(TabSub::updateData($id, $dataSave)) {
                $result['isIntOk'] = 1;
            }
        }
        return Response::json($result);
    }

    //Common
    private function valid($data=array()) {
        if(!empty($data)) {
            if(isset($data['category_depart_name']) && $data['category_depart_name'] == '') {
                $this->error[] = 'Tên chuyên nghành không được bỏ trống';
            }
            if(isset($data['category_depart_status']) && $data['category_depart_status'] == -1) {
                $this->error[] = 'Bạn chưa chọn trạng thái';
            }
            if(isset($data['department_id']) && $data['department_id'] < 0) {
                $this->error[] = 'Bạn chưa chọn thuộc Khoa - Trung tâm nào';
            }
            return true;
        }
        return false;
    }

    //ajax
    public function deleteTabSub()
    {
        $result = array('isIntOk' => 0);
        if(!$this->is_root && !in_array($this->permission_full,$this->permission) && !in_array($this->permission_delete,$this->permission)){
            return Response::json($result);
        }
        $id = (int)Request::get('id', 0);
        if ($id > 0 && CategoryDepart::deleteData($id)) {
            $result['isIntOk'] = 1;
        }
        return Response::json($result);
    }



}