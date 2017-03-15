<?php
/**
 * Created by JetBrains PhpStorm.
 * User: Quynhtm
 */
class ExcelTuyensinh extends Eloquent
{
    protected $table = 'web_excel_diemthinangkhieu';
    protected $primaryKey = 'nangkhieu_id';
    public $timestamps = false;

    //cac truong trong DB
    protected $fillable = array('nangkhieu_id','nangkhieu_sobaodanh', 'nangkhieu_hoten', 'nangkhieu_ngaysinh','nangkhieu_cmt' ,'nangkhieu_sophach'
    ,'nangkhieu_monthi_mot', 'nangkhieu_monthi_hai', 'nangkhieu_monthi_ba','nangkhieu_monthi_bon', 'nangkhieu_monthi_nam','nangkhieu_monthi_sau'
    ,'nangkhieu_ngaythi', 'nangkhieu_ngaytao', 'nangkhieu_nguoitao','nangkhieu_ngaycapnhat', 'nangkhieu_nguoicapnhat');


    public static function searchByCondition($dataSearch = array(), $limit =0, $offset=0, &$total){
        try{
            $query = ExcelTuyensinh::where('nangkhieu_id','>',0);
            if (isset($dataSearch['nangkhieu_hoten']) && $dataSearch['nangkhieu_hoten'] != '') {
                $query->where('nangkhieu_hoten','LIKE', '%' . $dataSearch['nangkhieu_hoten'] . '%');
            }
            $query->orderBy('nangkhieu_id', 'asc');
            $total = $query->count();

            //get field can lay du lieu
            $fields = (isset($dataSearch['field_get']) && trim($dataSearch['field_get']) != '') ? explode(',',trim($dataSearch['field_get'])): array();
            if(!empty($fields)){
                $result = $query->take($limit)->skip($offset)->get($fields);
            }else{
                $result = $query->take($limit)->skip($offset)->get();
            }
            return $result;

        }catch (PDOException $e){
            return $e->getMessage();
            throw new PDOException();
        }
    }

    /**
     * @desc: Tao Data.
     * @param $data
     * @return bool
     * @throws PDOException
     */
    public static function addData($dataInput)
    {
        try {
            DB::connection()->getPdo()->beginTransaction();
            $data = new ExcelTuyensinh();
            if (is_array($dataInput) && count($dataInput) > 0) {
                foreach ($dataInput as $k => $v) {
                    $data->$k = $v;
                }
            }
            if ($data->save()) {
                DB::connection()->getPdo()->commit();
                if(isset($data->nangkhieu_id) && $data->nangkhieu_id > 0){
                    self::removeCache($data->nangkhieu_id);
                }
                return $data->nangkhieu_id;
            }
            DB::connection()->getPdo()->commit();
            return false;
        } catch (PDOException $e) {
            DB::connection()->getPdo()->rollBack();
            throw new PDOException();
        }
    }

    /**
     * @desc: Update du lieu
     * @param $id
     * @param $data
     * @return bool
     * @throws PDOException
     */
    public static  function updateData($id, $dataInput)
    {
        try {
            DB::connection()->getPdo()->beginTransaction();
            $dataSave = ExcelTuyensinh::find($id);
            if (!empty($dataInput)){
                $dataSave->update($dataInput);
                if(isset($dataSave->nangkhieu_id) && $dataSave->nangkhieu_id > 0){
                    self::removeCache($dataSave->nangkhieu_id);
                }
            }
            DB::connection()->getPdo()->commit();
            return true;
        } catch (PDOException $e) {
            DB::connection()->getPdo()->rollBack();
            throw new PDOException();
        }
    }

    /**
     * @desc: Update Data.
     * @param $id
     * @param $status
     * @return bool
     * @throws PDOException
     */
    public static function deleteData($id){
        try {
            DB::connection()->getPdo()->beginTransaction();
            $dataSave = ExcelTuyensinh::find($id);
            $dataSave->delete();
            if(isset($dataSave->nangkhieu_id) && $dataSave->nangkhieu_id > 0){
                self::removeCache($dataSave->nangkhieu_id);
            }
            DB::connection()->getPdo()->commit();
            return true;
        } catch (PDOException $e) {
            DB::connection()->getPdo()->rollBack();
            throw new PDOException();
        }
    }

    public static function removeCache($id = 0){
        if($id > 0){
            //Cache::forget(Memcache::CACHE_ALL_TAB);
            //Cache::forget(Memcache::CACHE_ALL_TAB_LINK);
        }
    }
}