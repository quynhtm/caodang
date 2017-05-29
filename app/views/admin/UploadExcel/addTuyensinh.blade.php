<div class="main-content-inner">
    <div class="breadcrumbs breadcrumbs-fixed" id="breadcrumbs">
        <ul class="breadcrumb">
            <li>
                <i class="ace-icon fa fa-home home-icon"></i>
                <a href="{{URL::route('admin.dashboard')}}">Home</a>
            </li>
            <li><a href="{{URL::route('admin.viewTuyensinh')}}"> Danh sách điểm thi năng khiếu</a></li>
            <li class="active">@if($id > 0)Cập nhật điểm thi năng khiếu @else Tạo mới điểm thi năng khiếu @endif</li>
        </ul><!-- /.breadcrumb -->
    </div>

    <div class="page-content marginTop30">
        <div class="row">
            <div class="col-xs-12">
                <!-- PAGE CONTENT BEGINS -->
                {{Form::open(array('method' => 'POST','role'=>'form','files' => true))}}
                @if(isset($error))
                    <div class="alert alert-danger" role="alert">
                        @foreach($error as $itmError)
                            <p>{{ $itmError }}</p>
                        @endforeach
                    </div>
                @endif
                <div class="clearfix"></div>
                <div class="col-sm-4">
                    <div class="form-group">
                        <label for="name" class="control-label">Số hồ sơ<span class="red"> (*) </span></label>
                        <div class="form-group">
                            <input type="text" placeholder="Số hồ sơ" id="tuyensinh_sohoso" name="tuyensinh_sohoso" class="form-control input-sm" value="@if(isset($data['tuyensinh_sohoso'])){{$data['tuyensinh_sohoso']}}@endif">
                        </div>
                    </div>
                    <div class="clearfix"></div>
                    <div class="form-group">
                        <label for="name" class="control-label">Số báo danh<span class="red"> (*) </span></label>
                        <div class="form-group">
                            <input type="text" placeholder="Số báo danh" id="tuyensinh_sobaodanh" name="tuyensinh_sobaodanh" class="form-control input-sm" value="@if(isset($data['tuyensinh_sobaodanh'])){{$data['tuyensinh_sobaodanh']}}@endif">
                        </div>
                    </div>
                    <div class="clearfix"></div>
                    <div class="form-group">
                        <label for="name" class="control-label">Họ và tên<span class="red"> (*) </span></label>
                        <div class="form-group">
                            <input type="text" placeholder="Họ và tên" id="tuyensinh_hoten" name="tuyensinh_hoten" class="form-control input-sm" value="@if(isset($data['tuyensinh_hoten'])){{$data['tuyensinh_hoten']}}@endif">
                        </div>
                    </div>
                    <div class="clearfix"></div>
                    <div class="form-group">
                        <label for="name" class="control-label">Ngày sinh<span class="red"> (*) </span></label>
                        <div class="form-group">
                            <input type="text" placeholder="Ngày sinh" id="tuyensinh_ngaysinh" name="tuyensinh_ngaysinh" class="form-control input-sm" value="@if(isset($data['tuyensinh_ngaysinh'])){{$data['tuyensinh_ngaysinh']}}@endif">
                        </div>
                    </div>
                    <div class="clearfix"></div>
                    <div class="form-group">
                        <label for="name" class="control-label">Giới tính<span class="red"> (*) </span></label>
                        <div class="form-group">
                            <input type="text" placeholder="Giới tính" id="tuyensinh_gioitinh" name="tuyensinh_gioitinh" class="form-control input-sm" value="@if(isset($data['tuyensinh_gioitinh'])){{$data['tuyensinh_gioitinh']}}@endif">
                        </div>
                    </div>
                    <div class="clearfix"></div>
                    <div class="form-group">
                        <label for="name" class="control-label">CMND<span class="red"> (*) </span></label>
                        <div class="form-group">
                            <input type="text" placeholder="CMND" id="tuyensinh_cmt" name="tuyensinh_cmt" class="form-control input-sm" value="@if(isset($data['tuyensinh_cmt'])){{$data['tuyensinh_cmt']}}@endif">
                        </div>
                    </div>
                    <div class="clearfix"></div>
                    <div class="form-group">
                        <label for="name" class="control-label">KV ƯT<span class="red"> (*) </span></label>
                        <div class="form-group">
                            <input type="text" placeholder="KV ƯT" id="tuyensinh_khuvuc_uutien" name="tuyensinh_khuvuc_uutien" class="form-control input-sm" value="@if(isset($data['tuyensinh_khuvuc_uutien'])){{$data['tuyensinh_khuvuc_uutien']}}@endif">
                        </div>
                    </div>
                    <div class="clearfix"></div>
                    <div class="form-group">
                        <label for="name" class="control-label">ĐT ƯT<span class="red"> (*) </span></label>
                        <div class="form-group">
                            <input type="text" placeholder="ĐT ƯT" id="tuyensinh_diem_uutien" name="tuyensinh_diem_uutien" class="form-control input-sm" value="@if(isset($data['tuyensinh_diem_uutien'])){{$data['tuyensinh_diem_uutien']}}@endif">
                        </div>
                    </div>
                    <div class="clearfix"></div>
                    <div class="form-group">
                        <label for="name" class="control-label">Tên tỉnh<span class="red"> (*) </span></label>
                        <div class="form-group">
                            <input type="text" placeholder="Tên tỉnh" id="tuyensinh_tinhthanh" name="tuyensinh_tinhthanh" class="form-control input-sm" value="@if(isset($data['tuyensinh_tinhthanh'])){{$data['tuyensinh_tinhthanh']}}@endif">
                        </div>
                    </div>
                    <div class="clearfix"></div>
                    <div class="form-group">
                        <label for="name" class="control-label">Tên quận huyện<span class="red"> (*) </span></label>
                        <div class="form-group">
                            <input type="text" placeholder="Tên quận huyện" id="tuyensinh_quanhuyen" name="tuyensinh_quanhuyen" class="form-control input-sm" value="@if(isset($data['tuyensinh_quanhuyen'])){{$data['tuyensinh_quanhuyen']}}@endif">
                        </div>
                    </div>
                    <div class="clearfix"></div>
                </div>
                <div class="col-sm-4">
                    <div class="row">
                        <div class="col-sm-6">
                            <div class="form-group">
                            <label for="name" class="control-label">Mã môn 1<span class="red"> (*) </span></label>
                            <div class="form-group">
                                <input type="text" placeholder="TO" id="tuyensinh_monthi_mot" name="tuyensinh_monthi_mot" class="form-control input-sm" value="@if(isset($data['tuyensinh_monthi_mot'])){{$data['tuyensinh_monthi_mot']}}@endif">
                            </div>
                        </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label for="name" class="control-label">Điểm môn 1<span class="red"> (*) </span></label>
                                <div class="form-group">
                                    <input type="text" placeholder="TO" id="tuyensinh_diem_monthimot" name="tuyensinh_diem_monthimot" class="form-control input-sm" value="@if(isset($data['tuyensinh_diem_monthimot'])){{$data['tuyensinh_diem_monthimot']}}@endif">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label for="name" class="control-label">Mã môn 2<span class="red"> (*) </span></label>
                                <div class="form-group">
                                    <input type="text" placeholder="VA" id="tuyensinh_monthi_hai" name="tuyensinh_monthi_hai" class="form-control input-sm" value="@if(isset($data['tuyensinh_monthi_hai'])){{$data['tuyensinh_monthi_hai']}}@endif">
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label for="name" class="control-label">Điểm môn 2<span class="red"> (*) </span></label>
                                <div class="form-group">
                                    <input type="text" placeholder="VA" id="tuyensinh_diem_monthihai" name="tuyensinh_diem_monthihai" class="form-control input-sm" value="@if(isset($data['tuyensinh_diem_monthihai'])){{$data['tuyensinh_diem_monthihai']}}@endif">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label for="name" class="control-label">Mã môn 3<span class="red"> (*) </span></label>
                                <div class="form-group">
                                    <input type="text" placeholder="NK1" id="tuyensinh_monthi_ba" name="tuyensinh_monthi_ba" class="form-control input-sm" value="@if(isset($data['tuyensinh_monthi_ba'])){{$data['tuyensinh_monthi_ba']}}@endif">
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label for="name" class="control-label">Điểm môn 3<span class="red"> (*) </span></label>
                                <div class="form-group">
                                    <input type="text" placeholder="NK1" id="tuyensinh_diem_monthiba" name="tuyensinh_diem_monthiba" class="form-control input-sm" value="@if(isset($data['tuyensinh_diem_monthiba'])){{$data['tuyensinh_diem_monthiba']}}@endif">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="clearfix"></div>
                    <div class="form-group">
                        <label for="name" class="control-label">Điểm lệch<span class="red"> (*) </span></label>
                        <div class="form-group">
                            <input type="text" placeholder="Điểm lệch" id="tuyensinh_diemlech" name="tuyensinh_diemlech" class="form-control input-sm" value="@if(isset($data['tuyensinh_diemlech'])){{$data['tuyensinh_diemlech']}}@endif">
                        </div>
                    </div>
                    <div class="clearfix"></div>
                    <div class="form-group">
                        <label for="name" class="control-label">Tổng điểm chưa có ƯT<span class="red"> (*) </span></label>
                        <div class="form-group">
                            <input type="text" placeholder="Tổng điểm chưa có ƯT" id="tuyensinh_tongdiemchua_uutien" name="tuyensinh_tongdiemchua_uutien" class="form-control input-sm" value="@if(isset($data['tuyensinh_tongdiemchua_uutien'])){{$data['tuyensinh_tongdiemchua_uutien']}}@endif">
                        </div>
                    </div>
                    <div class="clearfix"></div>
                    <div class="form-group">
                        <label for="name" class="control-label">Điểm ưu tiên quy đổi<span class="red"> (*) </span></label>
                        <div class="form-group">
                            <input type="text" placeholder="Điểm ưu tiên quy đổi" id="tuyensinh_diem_uutien_quydoi" name="tuyensinh_diem_uutien_quydoi" class="form-control input-sm" value="@if(isset($data['tuyensinh_diem_uutien_quydoi'])){{$data['tuyensinh_diem_uutien_quydoi']}}@endif">
                        </div>
                    </div>
                    <div class="clearfix"></div>
                    <div class="form-group">
                        <label for="name" class="control-label">Tổng điểm có ƯT<span class="red"> (*) </span></label>
                        <div class="form-group">
                            <input type="text" placeholder="Tổng điểm có ƯT" id="tuyensinh_tongdiemco_uutien" name="tuyensinh_tongdiemco_uutien" class="form-control input-sm" value="@if(isset($data['tuyensinh_tongdiemco_uutien'])){{$data['tuyensinh_tongdiemco_uutien']}}@endif">
                        </div>
                    </div>
                    <div class="clearfix"></div>
                    <div class="form-group">
                        <label for="name" class="control-label">Ngành trúng tuyển<span class="red"> (*) </span></label>
                        <div class="form-group">
                            <input type="text" placeholder="Ngành trúng tuyển" id="tuyensinh_nganhtrungtuyen" name="tuyensinh_nganhtrungtuyen" class="form-control input-sm" value="@if(isset($data['tuyensinh_nganhtrungtuyen'])){{$data['tuyensinh_nganhtrungtuyen']}}@endif">
                        </div>
                    </div>
                    <div class="clearfix"></div>
                    <div class="form-group">
                        <label for="name" class="control-label">Đợt XT<span class="red"> (*) </span></label>
                        <div class="form-group">
                            <input type="text" placeholder="Đợt XT" id="tuyensinh_dotxettuyen" name="tuyensinh_dotxettuyen" class="form-control input-sm" value="@if(isset($data['tuyensinh_dotxettuyen'])){{$data['tuyensinh_dotxettuyen']}}@endif">
                        </div>
                    </div>
                    <div class="clearfix"></div>
                    <div class="form-group">
                        <label for="name" class="control-label">Trình độ<span class="red"> (*) </span></label>
                        <div class="form-group">
                            <input type="text" placeholder="Trình độ" id="tuyensinh_trinhdo" name="tuyensinh_trinhdo" class="form-control input-sm" value="@if(isset($data['tuyensinh_trinhdo'])){{$data['tuyensinh_trinhdo']}}@endif">
                        </div>
                    </div>
                    <div class="clearfix"></div>
                    <div class="form-group">
                        <label for="name" class="control-label">Hình thức xét tuyển<span class="red"> (*) </span></label>
                        <div class="form-group">
                            <input type="text" placeholder="Hình thức xét tuyển" id="tuyensinh_hinhthucxettuyen" name="tuyensinh_hinhthucxettuyen" class="form-control input-sm" value="@if(isset($data['tuyensinh_hinhthucxettuyen'])){{$data['tuyensinh_hinhthucxettuyen']}}@endif">
                        </div>
                    </div>
                </div>
                <div class="clearfix"></div>
                <div class="form-group col-sm-10 text-left">
                    <a class="btn btn-warning" href="{{URL::route('admin.viewTuyensinh')}}"><i class="fa fa-reply"></i> Trở lại</a>
                    <button  class="btn btn-primary"><i class="glyphicon glyphicon-floppy-saved"></i> Lưu lại</button>
                </div>
                <input type="hidden" id="id_hiden" name="id_hiden" value="{{$id}}"/>
                {{ Form::close() }}
                <!-- PAGE CONTENT ENDS -->
            </div>
            <!-- /.col -->
        </div>
        <!-- /.row -->
    </div><!-- /.page-content -->
</div>
<script>
    $(document).ready(function(){
        var ngaysinh = $('#tuyensinh_ngaysinh').datepicker({dateFormat: 'dd-mm-yy'});
    });
</script>
