<?php
/**
 * Created by JetBrains PhpStorm.
 * User: Quynhtm
 */
class Event extends Eloquent
{
    protected $table = 'web_event';
    protected $primaryKey = 'event_id';
    public $timestamps = false;

    //cac truong trong DB
    protected $fillable = array('event_id','event_title', 'event_desc_sort','event_depart_id',
        'event_content', 'event_image', 'event_image_other','event_create','event_order','event_common_page','event_show_cate_id',
        'event_type', 'event_category_id','event_category_name', 'event_status');

    public static function getNewByID($id) {
        $new = (Memcache::CACHE_ON)? Cache::get(Memcache::CACHE_NEW_ID.$id) : array();
        if (sizeof($new) == 0) {
            $new = Event::where('event_id', $id)->first();
            if($new && Memcache::CACHE_ON){
                Cache::put(Memcache::CACHE_NEW_ID.$id, $new, Memcache::CACHE_TIME_TO_LIVE_ONE_MONTH);
            }
        }
        return $new;
    }

    public static function searchByCondition($dataSearch = array(), $limit =0, $offset=0, &$total){
        try{
            $query = Event::where('event_id','>',0);
            if (isset($dataSearch['event_title']) && $dataSearch['event_title'] != '') {
                $query->where('event_title','LIKE', '%' . $dataSearch['event_title'] . '%');
            }
            if (isset($dataSearch['event_status']) && $dataSearch['event_status'] != -1) {
                $query->where('event_status', $dataSearch['event_status']);
            }
            if (isset($dataSearch['event_category_id']) && $dataSearch['event_category_id'] > 0) {
                $query->where('event_category_id', $dataSearch['event_category_id']);
            }
            if (isset($dataSearch['string_depart_id']) && $dataSearch['string_depart_id'] != '') {
                $query->whereIn('event_depart_id', explode(',',$dataSearch['string_depart_id']));
            }
            if (isset($dataSearch['not_event_id']) && $dataSearch['not_event_id'] > 0) {
                $query->where('event_id','<>', $dataSearch['not_event_id']);
            }
            $total = $query->count();
            $query->orderBy('event_id', 'desc');

            //get field can lay du lieu
            $fields = (isset($dataSearch['field_get']) && trim($dataSearch['field_get']) != '') ? explode(',',trim($dataSearch['field_get'])): array();
            if(!empty($fields)){
                $result = $query->take($limit)->skip($offset)->get($fields);
            }else{
                $result = $query->take($limit)->skip($offset)->get();
            }
            return $result;

        }catch (PDOException $e){
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
            $data = new Event();
            if (is_array($dataInput) && count($dataInput) > 0) {
                foreach ($dataInput as $k => $v) {
                    $data->$k = $v;
                }
            }
            if ($data->save()) {
                DB::connection()->getPdo()->commit();
                if(isset($data->event_id) && $data->event_id > 0){
                    self::removeCache($data->event_id);
                }
                return $data->event_id;
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
            $dataSave = Event::find($id);
            if (!empty($dataInput)){
                $dataSave->update($dataInput);
                if(isset($dataSave->event_id) && $dataSave->event_id > 0){
                    self::removeCache($dataSave->event_id);
                }
            }
            DB::connection()->getPdo()->commit();
            return true;
        } catch (PDOException $e) {
            //return $e->getMessage();
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
            $dataSave = Event::find($id);
            $dataSave->delete();
            if(isset($dataSave->event_id) && $dataSave->event_id > 0){
                self::removeCache($dataSave->event_id);
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
            Cache::forget(Memcache::CACHE_NEW_ID.$id);
        }
    }
}