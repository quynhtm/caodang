<?php

/**
 * Created by PhpStorm.
 * User: QuynhTM
 */
class DepartmentController extends BaseAdminController
{
    private $permission_full = 'department_full';
    private $permission_view = 'department_view';
    private $permission_delete = 'department_delete';
    private $permission_create = 'department_create';
    private $permission_edit = 'category_edit';
    private $arrStatus = array(-1 => 'Chọn trạng thái', CGlobal::status_hide => 'Ẩn', CGlobal::status_show => 'Hiện');

    public function __construct()
    {
        parent::__construct();

        //Include style.
        FunctionLib::link_css(array(
            'lib/cssUpload.css',
        ));

        //Include javascript.
        FunctionLib::link_js(array(
            'lib/jquery.uploadfile.js',
        ));
    }

    public function view() {
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
        $search['department_name'] = addslashes(Request::get('department_name',''));
        $search['department_status'] = (int)Request::get('department_status',-1);

        $dataSearch = Department::searchByCondition($search, 500, $offset,$total);
        $paging = '';

        $optionStatus = FunctionLib::getOption($this->arrStatus, $search['department_status']);
        $this->layout->content = View::make('admin.Department.view')
            ->with('paging', $paging)
            ->with('stt', ($pageNo-1)*$limit)
            ->with('total', $total)
            ->with('data', $dataSearch)
            ->with('search', $search)
            ->with('optionStatus', $optionStatus)
            ->with('arrStatus', $this->arrStatus)

            
            ->with('is_root', $this->is_root)//dùng common
            ->with('permission_full', in_array($this->permission_full, $this->permission) ? 1 : 0)//dùng common
            ->with('permission_delete', in_array($this->permission_delete, $this->permission) ? 1 : 0)//dùng common
            ->with('permission_create', in_array($this->permission_create, $this->permission) ? 1 : 0)//dùng common
            ->with('permission_edit', in_array($this->permission_edit, $this->permission) ? 1 : 0);//dùng common
    }

    public function getDepartment($id=0) {
        if(!$this->is_root && !in_array($this->permission_full,$this->permission) && !in_array($this->permission_edit,$this->permission) && !in_array($this->permission_create,$this->permission)){
            return Redirect::route('admin.dashboard',array('error'=>1));
        }
        $data = array();
        if($id > 0) {
            $data = Department::find($id);
        }

        $optionStatus = FunctionLib::getOption($this->arrStatus, isset($data['department_status'])? $data['department_status'] : CGlobal::status_show);
        $this->layout->content = View::make('admin.Department.add')
            ->with('id', $id)
            ->with('data', $data)
            ->with('optionStatus', $optionStatus);
    }

    public function postDepartment($id=0) {
        if(!$this->is_root && !in_array($this->permission_full,$this->permission) && !in_array($this->permission_edit,$this->permission) && !in_array($this->permission_create,$this->permission)){
            return Redirect::route('admin.dashboard',array('error'=>1));
        }

        $dataSave['department_name'] = addslashes(Request::get('department_name'));
        $dataSave['department_status'] = (int)Request::get('department_status', CGlobal::status_show);
        $dataSave['department_order'] = (int)Request::get('department_order', 1);

        if($this->valid($dataSave) && empty($this->error)) {
            $dataSave['department_alias'] = strtolower(FunctionLib::stringTitle($dataSave['department_name']));
            if($id > 0) {
                //cap nhat
                if(Department::updateData($id, $dataSave)) {
                    return Redirect::route('admin.department_list');
                }
            } else {
                //them moi
                if(Department::addData($dataSave)) {
                    return Redirect::route('admin.department_list');
                }
            }
        }
        $optionStatus = FunctionLib::getOption($this->arrStatus, isset($dataSave['department_status'])? $dataSave['department_status'] : CGlobal::status_show);
        $this->layout->content =  View::make('admin.Department.add')
            ->with('id', $id)
            ->with('data', $dataSave)
            ->with('optionStatus', $optionStatus)
            ->with('error', $this->error);
    }

    private function valid($data=array()) {
        if(!empty($data)) {
            if(isset($data['department_name']) && $data['department_name'] == '') {
                $this->error[] = 'Tên khoa - trung tâm không được bỏ trống';
            }
            if(isset($data['department_status']) && $data['department_status'] == -1) {
                $this->error[] = 'Bạn chưa chọn trạng thái';
            }
            return true;
        }
        return false;
    }

    //ajax
    public function deleteDepartment()
    {
        $result = array('isIntOk' => 0);
        if(!$this->is_root && !in_array($this->permission_full,$this->permission) && !in_array($this->permission_delete,$this->permission)){
            return Response::json($result);
        }
        $id = (int)Request::get('id', 0);
        if ($id > 0 && Department::deleteData($id)) {
            $result['isIntOk'] = 1;
        }
        return Response::json($result);
    }

    //ajax
    public function updateStatusDepartment()
    {
        $id = (int)Request::get('id', 0);
        $category_status = (int)Request::get('status', CGlobal::status_hide);
        $result = array('isIntOk' => 0);
        if(!$this->is_root && !in_array($this->permission_full,$this->permission) && !in_array($this->permission_delete,$this->permission)){
            return Response::json($result);
        }

        if ($id > 0) {
            $dataSave['department_status'] = ($category_status == CGlobal::status_hide)? CGlobal::status_show : CGlobal::status_hide;
            if(Department::updateData($id, $dataSave)) {
                $result['isIntOk'] = 1;
            }
        }
        return Response::json($result);
    }


}