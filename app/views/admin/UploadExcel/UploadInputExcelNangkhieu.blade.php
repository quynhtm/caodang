<ul class="nav nav-tabs">
    <li class="active">
         <a href="javascript:void(0);" style="font-weight:bold;color:#970000">Inport Excel</a>
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
            <div class="form-group col-lg-4">
                <label for="seo_key_file">Kiểu inport</label>
                <select id="type_inport" name="type_inport" class="form-control input-sm">
                    <option value="1">Cập nhật điểm thi năng khiếu</option>
                </select>
                <div id="show_mess_inport" class="padding-top-2" style="display: none; color: red">
                    <p> [A] => Stt
                        <br/>[B] => Số BD
                        <br/>[C] => Họ và tên
                        <br/>[D] => Ngày sinh
                        <br/>[E] => Số CMND
                        <br/>[F] => Số phách
                        <br/>[G] => NK1
                        <br/>[H] => NK2
                        <br/>[I] => NK3
                        <br/>[J] => NK4
                        <br/>[K] => NK5
                        <br/>[L] => Nk6
                        <br/>[M] => Đợt thi
                    </p>
                </div>
            </div>
            <input type="hidden" name="sheet" value="{{$sheet}}">
            <div class="form-group padding-top-2">
                <div class="col-lg-2">
                  <button class="btn btn-primary" id="sys_button_submit">Inport</button>
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