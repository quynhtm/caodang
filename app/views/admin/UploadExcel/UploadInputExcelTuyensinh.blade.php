<ul class="nav nav-tabs">
    <li class="active">
         <a href="javascript:void(0);" style="font-weight:bold;color:#970000">Import Excel</a>
    </li>
</ul>
<div class="dark" style="border: 1px solid #ddd; border-top: none; padding: 20px;margin-bottom: 160px;">
    {{ Form::open(array('class'=>'form-horizontal','files' => true)) }}
    <div class="body">
            <div class="form-group col-lg-3">
                <label for="seo_key_file">File Excel</label>
                <input id="seo_key_file" name="seo_key_file" type="file">
                <p class="help-block">xls,xlsx only</p>
            </div>
            <div class="form-group col-lg-3">
                <label for="seo_key_file">Kiểu Import</label>
                <select id="type_inport" name="type_inport" class="form-control input-sm">
                    <option value="1">Cập nhật xét tuyển sinh</option>
                </select>
                <div id="show_mess_inport" class="padding-top-2" style="display: none; color: red">
                    <p> [A] => STT
                        <br/>[B] => Số hồ sơ
                        <br/>[C] => Số báo danh
                        <br/>[D] => Họ và tên
                        <br/>[E] => Ngày sinh
                        <br/>[F] => Giới tính
                        <br/>[G] => CMND
                        <br/>[H] => KV ƯT
                        <br/>[I] => ĐT ƯT
                        <br/>[J] => Tên tỉnh
                        <br/>[K] => Tên quận huyện
                        <br/>[L] => Mã môn 1
                        <br/>[M] => Điểm môn 1
                        <br/>[N] => Mã môn 2
                        <br/>[O] => Điểm môn 2
                        <br/>[P] => Mã môn 3
                        <br/>[Q] => Điểm môn 3
                        <br/>[R] => Điểm lệch
                        <br/>[S] => Tổng điểm chưa có ƯT
                        <br/>[T] => Điểm ưu tiên quy đổi
                        <br/>[U] => Tổng điểm có ƯT
                        <br/>[V] => Ngành trúng tuyển
                        <br/>[W] => Đợt XT
                        <br/>[X] => Trình độ
                        <br/>[Y] => Hình thức xét tuyển
                    </p>
                </div>
            </div>
            <input type="hidden" name="sheet" value="{{$sheet}}">
            <div class="form-group padding-top-2">
                <div class="col-lg-3 marginTop14">
                    <button class="btn btn-primary" id="sys_button_submit">Import</button>
                    <a class="btn btn-warning" href="{{URL::route('admin.viewTuyensinh')}}"><i class="fa fa-reply"></i> Trở lại</a>
                </div>
            </div>
    </div>
    {{ Form::close() }}
</div>
<script type="text/javascript">
    jQuery(function ($) {
        onchangeTypeInport();
    });
    function onchangeTypeInport(){
         var type = $('#type_inport').val();
         if(type == 1){
            $('#show_mess_inport').show();
            $('#show_mess_inport_2').hide();
            $('#show_mess_inport_3').hide();
            $('#show_mess_inport_4').hide();
         }else if(type == 2){
            $('#show_mess_inport_2').show();
            $('#show_mess_inport').hide();
            $('#show_mess_inport_3').hide();
            $('#show_mess_inport_4').hide();
         }
    }
</script>