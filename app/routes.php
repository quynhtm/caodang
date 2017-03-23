<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the Closure to execute when that URI is requested.
|
*/
// used for dev by Quynh
$isDev = Request::get('is_debug','');
if($isDev == 'tech_code'){
    Session::put('is_debug_of_tech', '13031984');
    Config::set('compile.debug',true);
}
if(Session::has('is_debug_of_tech')){
    Config::set('compile.debug',true);
}


/*
 * router cho phan Site
 *
 * */
Route::group(array('prefix' => '/', 'before' => ''), function () {
    require app_path() . '/routes/routes_site.php';
});

/*
 * router cho cronjobs
 *
 * */
Route::group(array('prefix' => 'cronjobs', 'before' => ''), function () {
    Route::get('runJobs', array('as' => 'cronjobs.runJobs','uses' => 'CronjobsController@runJobs'));//cap nhật lại link ảnh trong content
});

/*
 * router cho Ajax
 *
 * */
Route::group(array('prefix' => 'ajax', 'before' => ''), function () {
    Route::post('uploadImage', array('as' => 'ajax.uploadImage','uses' => 'AjaxCommonController@uploadImage'));
    Route::post('removeImageCommon', array('as' => 'ajax.removeImageCommon','uses' => 'AjaxCommonController@removeImageCommon'));
    Route::post('getImageContentCommon', array('as' => 'ajax.getImageContentCommon','uses' => 'AjaxCommonController@getImageContentCommon'));
    Route::get('sendEmail', array('as' => 'ajax.sendEmail','uses' => 'AjaxCommonController@sendEmail'));
    
	Route::match(['GET','POST'],'ajax-get-product-other-site', array('as' => 'ajax.getProductFromOther','uses' => 'AjaxCommonController@getProductFromOtherSite'));
});

/*
 * router cho phan Admin
 *
 * */
/*login logout*/
Route::get('quan-tri.html', array('as' => 'admin.login','uses' => 'LoginController@loginInfo'));
Route::post('quan-tri.html', array('as' => 'admin.login','uses' => 'LoginController@login'));
Route::group(array('prefix' => 'admin', 'before' => ''), function()
{
    Route::get('logout', array('as' => 'admin.logout','uses' => 'LoginController@logout'));
    /*màn hình chính*/
    Route::get('dashboard', array('as' => 'admin.dashboard','uses' => 'DashBoardController@dashboard'));
    Route::get('convert', array('as' => 'admin.convert','uses' => 'BaseAdminController@convert'));

    /*thông tin tài khoản*/
    Route::get('user/view',array('as' => 'admin.user_view','uses' => 'UserController@view'));
    Route::get('user/edit/{id?}', array('as' => 'admin.user_edit','uses' => 'UserController@getUser'));
    Route::post('user/edit/{id?}', array('as' => 'admin.user_edit','uses' => 'UserController@postUser'));
    Route::get('user/change/{id}',array('as' => 'admin.user_change','uses' => 'UserController@changePassInfo'));
    Route::post('user/change/{id}',array('as' => 'admin.user_change','uses' => 'UserController@changePass'));
    Route::post('user/remove/{id}',array('as' => 'admin.user_remove','uses' => 'UserController@remove'));

    /*thông tin quyền*/
    Route::get('permission/view',array('as' => 'admin.permission_view','uses' => 'PermissionController@view'));
    Route::get('permission/create',array('as' => 'admin.permission_create','uses' => 'PermissionController@createInfo'));
    Route::post('permission/create',array('as' => 'admin.permission_create','uses' => 'PermissionController@create'));
    Route::get('permission/edit/{id}',array('as' => 'admin.permission_edit','uses' => 'PermissionController@editInfo'))->where('id', '[0-9]+');
    Route::post('permission/edit/{id}',array('as' => 'admin.permission_edit','uses' => 'PermissionController@edit'))->where('id', '[0-9]+');
    Route::post('permission/deletePermission', array('as' => 'admin.deletePermission','uses' => 'PermissionController@deletePermission'));//ajax

    /*thông tin nhóm quyền*/
    Route::get('groupUser/view',array('as' => 'admin.groupUser_view','uses' => 'GroupUserController@view'));
    Route::get('groupUser/create',array('as' => 'admin.groupUser_create','uses' => 'GroupUserController@createInfo'));
    Route::post('groupUser/create',array('as' => 'admin.groupUser_create','uses' => 'GroupUserController@create'));
    Route::get('groupUser/edit/{id}',array('as' => 'admin.groupUser_edit','uses' => 'GroupUserController@editInfo'))->where('id', '[0-9]+');
    Route::post('groupUser/edit/{id}',array('as' => 'admin.groupUser_edit','uses' => 'GroupUserController@edit'))->where('id', '[0-9]+');

    /*Quản lý Action Setting*/
    //type_setting
    Route::get('typeSetting/view',array('as' => 'admin.typeSettingView','uses' => 'ActionSettingController@viewTypeSetting'));
    Route::get('typeSetting/editTypeSetting/{id?}', array('as' => 'admin.typeSettingEdit','uses' => 'ActionSettingController@getTypeSetting'))->where('id', '[0-9]+');
    Route::post('typeSetting/editTypeSetting/{id?}', array('as' => 'admin.typeSettingEdit','uses' => 'ActionSettingController@postTypeSetting'))->where('id', '[0-9]+');
    Route::post('typeSetting/deleteTypeSetting', array('as' => 'admin.deltete_typeSetting','uses' => 'ActionSettingController@deleteTypeSetting'));//ajax
    Route::post('typeSetting/updateStatusTypeSetting', array('as' => 'admin.status_typeSetting','uses' => 'ActionSettingController@updateStatusTypeSetting'));//ajax

    /*Quản lý Department*/
    Route::get('department/view',array('as' => 'admin.department_list','uses' => 'DepartmentController@view'));
    Route::get('department/getDepartment/{id?}', array('as' => 'admin.department_edit','uses' => 'DepartmentController@getDepartment'))->where('id', '[0-9]+');
    Route::post('department/postDepartment/{id?}', array('as' => 'admin.department_edit_post','uses' => 'DepartmentController@postDepartment'))->where('id', '[0-9]+');
    Route::post('department/deleteDepartment', array('as' => 'admin.deltete_department_post','uses' => 'DepartmentController@deleteDepartment'));//ajax
    Route::post('department/updateStatusDepartment', array('as' => 'admin.status_department_post','uses' => 'DepartmentController@updateStatusDepartment'));//ajax

    /*Quản lý Category Department*/
    Route::get('categoryDepart/view',array('as' => 'admin.categoryDepart_list','uses' => 'CategoryDepartController@view'));
    Route::get('categoryDepart/getCategoryDepart/{id?}', array('as' => 'admin.categoryDepart_edit','uses' => 'CategoryDepartController@getCategoryDepart'))->where('id', '[0-9]+');
    Route::post('categoryDepart/postCategoryDepart/{id?}', array('as' => 'admin.categoryDepart_edit_post','uses' => 'CategoryDepartController@postCategoryDepart'))->where('id', '[0-9]+');
    Route::post('categoryDepart/deleteCategoryDepart', array('as' => 'admin.deltete_categoryDepart_post','uses' => 'CategoryDepartController@deleteCategoryDepart'));//ajax
    Route::post('categoryDepart/updateStatusCategoryDepart', array('as' => 'admin.status_categoryDepart_post','uses' => 'CategoryDepartController@updateStatusCategoryDepart'));//ajax

    //quan ly Excel văn bằng chứng chỉ
    Route::get('viewVanbang',array('as'=>'admin.viewVanbang','uses'=>'UploadExcelController@viewVanbang'));
    Route::get('upload/uploadExcelVanbang',array('as'=>'admin.uploadExcelVanbang','uses'=>'UploadExcelController@getInputExcelVanbang'));
    Route::post('upload/uploadExcelVanbang',array('as'=>'admin.uploadExcelVanbang','uses'=>'UploadExcelController@postInputExcelVanbang'));

    //quan ly Excel Nang khieu
    Route::get('viewNangkhieu',array('as'=>'admin.viewNangkhieu','uses'=>'UploadExcelController@viewNangkhieu'));
    Route::get('upload/uploadExcelNangkhieu',array('as'=>'admin.uploadExcelNangkhieu','uses'=>'UploadExcelController@getInputExcelNangkhieu'));
    Route::post('upload/uploadExcelNangkhieu',array('as'=>'admin.uploadExcelNangkhieu','uses'=>'UploadExcelController@postInputExcelNangkhieu'));

    //quan ly Excel Tuyển sinh
    Route::get('viewTuyensinh',array('as'=>'admin.viewTuyensinh','uses'=>'UploadExcelController@viewTuyensinh'));
    Route::get('upload/uploadExcelTuyensinh',array('as'=>'admin.uploadExcelTuyensinh','uses'=>'UploadExcelController@getInputExcelTuyensinh'));
    Route::post('upload/uploadExcelTuyensinh',array('as'=>'admin.uploadExcelTuyensinh','uses'=>'UploadExcelController@postInputExcelTuyensinh'));

    ///*Quản lý tab*/
    Route::get('tab/view',array('as' => 'admin.tabView','uses' => 'TabDepartController@viewTab'));
    Route::get('tab/tabEdit/{id?}', array('as' => 'admin.tabEdit','uses' => 'TabDepartController@getTab'))->where('id', '[0-9]+');
    Route::post('tab/tabEdit/{id?}', array('as' => 'admin.tabEdit','uses' => 'TabDepartController@postTab'))->where('id', '[0-9]+');
    Route::post('tab/updateStatusTab', array('as' => 'admin.tabStatus','uses' => 'TabDepartController@updateStatusTab'));//ajax
    //tab sub
    Route::get('tab/viewSub',array('as' => 'admin.tabSubView','uses' => 'TabDepartController@viewTabSub'));
    Route::get('tab/tabSubEdit/{id?}', array('as' => 'admin.tabSubEdit','uses' => 'TabDepartController@getTabSub'))->where('id', '[0-9]+');
    Route::post('tab/tabSubEdit/{id?}', array('as' => 'admin.tabSubEdit','uses' => 'TabDepartController@postTabSub'))->where('id', '[0-9]+');
    Route::post('tab/updateStatusTabSub', array('as' => 'admin.tabSubStatus','uses' => 'TabDepartController@updateStatusTabSub'));//ajax

    /*Quản lý danh mục SP*/
    Route::get('category/view',array('as' => 'admin.category_list','uses' => 'CategoryController@view'));
    Route::get('category/edit/{id?}', array('as' => 'admin.category_edit','uses' => 'CategoryController@getItem'))->where('id', '[0-9]+');
    Route::post('category/edit/{id?}', array('as' => 'admin.category_edit','uses' => 'CategoryController@postItem'))->where('id', '[0-9]+');
    Route::post('category/deleteCategory', array('as' => 'admin.deltete_category_post','uses' => 'CategoryController@deleteCategory'));//ajax
    Route::post('category/updateStatusCategory', array('as' => 'admin.status_category_post','uses' => 'CategoryController@updateStatusCategory'));//ajax
    Route::post('category/updatePositionStatusCategory', array('as' => 'admin.status_category_position','uses' => 'CategoryController@updatePositionStatusCategory'));//ajax
    Route::post('category/getCategoryParentWithDepart',array('as' => 'admin.getCategoryParentWithDepart','uses' =>'CategoryController@getCategoryParentWithDepart'));

    /*Quản lý danh sách khách hàng đăng tin*/
    Route::get('customer/view',array('as' => 'admin.customerView','uses' => 'UserCustomerController@view'));
    Route::get('customer/getEditCustomer/{id?}', array('as' => 'admin.getCustomerEdit','uses' => 'UserCustomerController@getEditCustomer'))->where('id', '[0-9]+');
    Route::post('customer/postEditCustomer/{id?}', array('as' => 'admin.customerEdit','uses' => 'UserCustomerController@postEditCustomer'))->where('id', '[0-9]+');
    Route::post('customer/deleteCustomer', array('as' => 'admin.deleteCustomer','uses' => 'UserCustomerController@deleteCustomer'));//ajax
    Route::get('customer/loginToCustomer/{id?}', array('as' => 'admin.loginToCustomer','uses' => 'UserCustomerController@loginToCustomer'))->where('id', '[0-9]+');
    Route::post('customer/updateStatusCustomer', array('as' => 'admin.customerStatus','uses' => 'UserCustomerController@updateStatusCustomer'));//ajax
    Route::post('customer/setIsCustomer', array('as' => 'admin.setIsCustomer','uses' => 'UserCustomerController@setIsCustomer'));//ajax

    /*Quản lý tin đăng*/
    Route::get('items/view',array('as' => 'admin.itemsView','uses' => 'ItemsController@view'));
    Route::get('items/getItems/{id}', array('as' => 'admin.itemsEdit','uses' => 'ItemsController@getItems'))->where('id', '[0-9]+');
    Route::post('items/postItems/{id}', array('as' => 'admin.itemsEdit','uses' => 'ItemsController@postItems'))->where('id', '[0-9]+');
    Route::post('items/setStastusBlockItems', array('as' => 'admin.setStastusBlockItems','uses' => 'ItemsController@setStastusBlockItems'));//ajax
    Route::post('items/deleteMultiItems', array('as' => 'admin.deleteMultiItems','uses' => 'ItemsController@deleteMultiItems'));//ajax

    /*Quản lý tin tức*/
    Route::get('news/view',array('as' => 'admin.newsView','uses' => 'NewsController@view'));
    Route::get('news/edit/{id?}', array('as' => 'admin.newsEdit','uses' => 'NewsController@getNews'))->where('id', '[0-9]+');
    Route::post('news/edit/{id?}', array('as' => 'admin.newsEdit','uses' => 'NewsController@postNews'))->where('id', '[0-9]+');
    Route::post('news/deleteNews', array('as' => 'admin.delteteNews','uses' => 'NewsController@deleteNews'));//ajax
    Route::post('news/getCategoryWithDepart',array('as' => 'admin.getCategoryWithDepart','uses' =>'NewsController@getCategoryWithDepart'));
    Route::post('news/updateStatusNew', array('as' => 'admin.updateStatusNew','uses' => 'NewsController@updateStatusNew'));//ajax

    ///*Quản lý lich sự kiện*/
    Route::get('event/view',array('as' => 'admin.eventView','uses' => 'EventController@view'));
    Route::get('event/edit/{id?}', array('as' => 'admin.eventEdit','uses' => 'EventController@getItem'))->where('id', '[0-9]+');
    Route::post('event/edit/{id?}', array('as' => 'admin.eventEdit','uses' => 'EventController@postItem'))->where('id', '[0-9]+');
    Route::post('event/deleteEvent', array('as' => 'admin.delteteEvent','uses' => 'EventController@deleteEvent'));//ajax
    Route::post('event/updateStatusEvent', array('as' => 'admin.updateStatusEvent','uses' => 'EventController@updateStatusEvent'));//ajax

    /*Quản lý banner*/
    Route::any('banner/view',array('as' => 'admin.bannerView','uses' => 'BannerController@view'));
    Route::get('banner/edit/{id?}', array('as' => 'admin.bannerEdit','uses' => 'BannerController@getBanner'))->where('id', '[0-9]+');
    Route::post('banner/edit/{id?}', array('as' => 'admin.bannerEdit','uses' => 'BannerController@postBanner'))->where('id', '[0-9]+');
    Route::get('banner/copy/{id?}', array('as' => 'admin.bannerCopy','uses' => 'BannerController@getBanner'))->where('id', '[0-9]+');
    Route::post('banner/copy/{id?}', array('as' => 'admin.bannerCopy','uses' => 'BannerController@postBanner'))->where('id', '[0-9]+');
    Route::post('banner/deleteBanner', array('as' => 'admin.deleteBanner','uses' => 'BannerController@deleteBanner'));//ajax

    //Thong tin cau hinh chung: hotline, thong tin chan trang...
    Route::get('info/view', array('as' => 'admin.info','uses' => 'InfoController@listView'));
    Route::get('info/edit/{id?}', array('as' => 'admin.infoEdit','uses' => 'InfoController@getItem'))->where('id', '[0-9]+');
    Route::post('info/edit/{id?}', array('as' => 'admin.infoEdit','uses' => 'InfoController@postItem'))->where('id', '[0-9]+');
    Route::post('info/deleteInfor', array('as' => 'admin.infoDelete','uses' => 'InfoController@deleteInfor'));

    //Thung rac
    Route::get('trash', array('as' => 'admin.trash','uses' => 'TrashController@listView'));
    Route::get('trash/edit/{id?}', array('as' => 'admin.trash_edit','uses' => 'TrashController@getItem'))->where('id', '[0-9]+');
    Route::post('trash/edit/{id?}', array('as' => 'admin.trash_edit','uses' => 'TrashController@postItem'))->where('id', '[0-9]+');
    Route::match(['GET','POST'],'trash/delete', array('as' => 'admin.trash_delete','uses' => 'TrashController@delete'));
    Route::match(['GET','POST'],'trash/restore', array('as' => 'admin.trash_delete','uses' => 'TrashController@restore'));

    //Liên hệ
    Route::get('contract/view', array('as' => 'admin.contract','uses' => 'ContactController@viewContract'));
    Route::get('contract/edit/{id?}', array('as' => 'admin.contractEdit','uses' => 'ContactController@getItem'))->where('id', '[0-9]+');
    Route::post('contract/deleteContract', array('as' => 'admin.deleteContract','uses' => 'ContactController@deleteContact'));//ajax

    //Tinh thanh
    Route::get('province/view', array('as' => 'admin.province','uses' => 'ProvinceController@listView'));
    Route::get('province/edit/{id?}', array('as' => 'admin.provinceEdit','uses' => 'ProvinceController@getItem'))->where('id', '[0-9]+');
    Route::post('province/edit/{id?}', array('as' => 'admin.provinceEdit','uses' => 'ProvinceController@postItem'))->where('id', '[0-9]+');
    Route::post('province/deleteProvince', array('as' => 'admin.deleteProvince','uses' => 'ProvinceController@deleteProvince'));//ajax
    Route::get('province/getInforDistrictOfProvince',array('as'=>'getInforDistrictOfProvince','uses'=>'ProvinceController@getInforDistrictOfProvince'));// thong tin quan huyen
    Route::post('province/submitInforDistrictOfProvince',array('as'=>'submitInforDistrictOfProvince','uses'=>'ProvinceController@submitInforDistrictOfProvince'));// thong tin quan huyen

    ///*Quản lý Thư viện ảnh*/
    Route::any('libraryImage/view',array('as' => 'admin.libraryImageView','uses' => 'LibraryImageController@view'));
    Route::get('libraryImage/edit/{id?}', array('as' => 'admin.libraryImageEdit','uses' => 'LibraryImageController@getItem'))->where('id', '[0-9]+');
    Route::post('libraryImage/edit/{id?}', array('as' => 'admin.libraryImageEdit','uses' => 'LibraryImageController@postItem'))->where('id', '[0-9]+');
    Route::post('libraryImage/deleteLibraryImage', array('as' => 'admin.deleteLibraryImage','uses' => 'LibraryImageController@deleteLibraryImage'));//ajax

    /*Quản lý Video*/
    Route::any('video/view',array('as' => 'admin.videoView','uses' => 'VideoController@view'));
    Route::get('video/edit/{id?}', array('as' => 'admin.videoEdit','uses' => 'VideoController@getItem'))->where('id', '[0-9]+');
    Route::post('video/edit/{id?}', array('as' => 'admin.videoEdit','uses' => 'VideoController@postItem'))->where('id', '[0-9]+');
    Route::post('video/deleteVideo', array('as' => 'admin.deleteVideo','uses' => 'VideoController@deleteVideo'));//ajax

    Route::get('toolsCommon/addPermit',array('as' => 'admin.addPermit','uses' => 'ToolsCommonController@addPermit'));

    //quan ly noi dung gui email
    Route::get('toolsCommon/viewContentSendEmail',array('as' => 'admin.contentSendEmail_list','uses' => 'ToolsCommonController@viewContentSendEmail'));
    Route::get('toolsCommon/edit/{id?}', array('as' => 'admin.contentSendEmail_edit','uses' => 'ToolsCommonController@getContentSendEmail'))->where('id', '[0-9]+');
    Route::post('toolsCommon/edit/{id?}', array('as' => 'admin.contentSendEmail_edit','uses' => 'ToolsCommonController@postContentSendEmail'))->where('id', '[0-9]+');
    Route::post('toolsCommon/deleteContentSendEmail', array('as' => 'admin.deltete_provider','uses' => 'ToolsCommonController@deleteContentSendEmail'));//ajax
});
