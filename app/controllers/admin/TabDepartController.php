<?php

/**
 * Created by PhpStorm.
 * User: QuynhTM
 */
class TabDepartController extends BaseAdminController
{
    private $permission_full = 'tab_full';
    private $permission_view = 'tab_view';
    private $permission_delete = 'tab_delete';
    private $permission_create = 'tab_create';
    private $permission_edit = 'tab_edit';
    private $arrStatus = array(-1 => 'Chọn trạng thái', CGlobal::status_hide => 'Ẩn', CGlobal::status_show => 'Hiện');
    private $arrDepart = array();
    private $error = array();

    public function __construct()
    {
        parent::__construct();
        //$this->arrDepart = Department::getDepart();
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

        $search['department_id'] = addslashes(Request::get('department_id',''));
        $search['category_depart_name'] = addslashes(Request::get('category_depart_name',''));
        $search['category_depart_status'] = (int)Request::get('category_depart_status',-1);

        $dataSearch = CategoryDepart::searchByCondition($search, $limit, $offset,$total);
        $paging = '';

        $optionStatus = FunctionLib::getOption($this->arrStatus, $search['category_depart_status']);
        $optionDepart = FunctionLib::getOption(array(-1=>'----Chọn thuộc khoa - trung tâm----')+$this->arrDepart, $search['department_id']);
        $this->layout->content = View::make('admin.TabDepart.view')
            ->with('paging', $paging)
            ->with('stt', ($pageNo-1)*$limit)
            ->with('total', $total)
            ->with('data', $dataSearch)
            ->with('search', $search)
            ->with('optionStatus', $optionStatus)
            ->with('optionDepart', $optionDepart)

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
            $data = CategoryDepart::find($id);
        }
        $optionStatus = FunctionLib::getOption($this->arrStatus, isset($data['category_depart_status'])? $data['category_depart_status'] : -1);
        $optionDepart = FunctionLib::getOption(array(-1=>'----Chọn thuộc khoa - trung tâm----')+$this->arrDepart, isset($data['department_id'])? $data['department_id'] : -1);
        $this->layout->content = View::make('admin.TabDepart.add')
            ->with('id', $id)
            ->with('data', $data)
            ->with('optionDepart', $optionDepart)
            ->with('optionStatus', $optionStatus);
    }
    public function postTab($id=0) {
        if(!$this->is_root && !in_array($this->permission_full,$this->permission) && !in_array($this->permission_edit,$this->permission) && !in_array($this->permission_create,$this->permission)){
            return Redirect::route('admin.dashboard',array('error'=>1));
        }

        $dataSave['category_depart_name'] = addslashes(Request::get('category_depart_name'));
        $dataSave['category_depart_status'] = (int)Request::get('category_depart_status', 0);
        $dataSave['department_id'] = (int)Request::get('department_id', -1);
        $dataSave['category_depart_order'] = (int)Request::get('category_depart_order', 1);

        if($this->valid($dataSave) && empty($this->error)) {
            $dataSave['department_name'] = isset($this->arrDepart[$dataSave['department_id']]) ?$this->arrDepart[$dataSave['department_id']] :'';
            if($id > 0) {
                //cap nhat
                if(CategoryDepart::updateData($id, $dataSave)) {
                    return Redirect::route('admin.categoryDepart_list');
                }
            } else {
                //them moi
                if(CategoryDepart::addData($dataSave)) {
                    return Redirect::route('admin.categoryDepart_list');
                }
            }
        }
        $optionStatus = FunctionLib::getOption($this->arrStatus, isset($dataSave['category_depart_status'])? $dataSave['category_depart_status'] : -1);
        $optionDepart = FunctionLib::getOption(array(-1=>'----Chọn thuộc khoa - trung tâm----')+$this->arrDepart, isset($dataSave['department_id'])? $dataSave['department_id'] : -1);
        $this->layout->content =  View::make('admin.TabDepart.add')
            ->with('id', $id)
            ->with('data', $dataSave)
            ->with('optionDepart', $optionDepart)
            ->with('optionStatus', $optionStatus)
            ->with('error', $this->error);
    }
    //ajax
    public function updateStatusTab()
    {
        $id = (int)Request::get('id', 0);
        $category_status = (int)Request::get('status', CGlobal::status_hide);
        $result = array('isIntOk' => 0);
        if(!$this->is_root && !in_array($this->permission_full,$this->permission) && !in_array($this->permission_delete,$this->permission)){
            return Response::json($result);
        }

        if ($id > 0) {
            $dataSave['category_depart_status'] = ($category_status == CGlobal::status_hide)? CGlobal::status_show : CGlobal::status_hide;
            if(CategoryDepart::updateData($id, $dataSave)) {
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