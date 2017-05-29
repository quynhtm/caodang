<div class="main-content-inner">
    <div class="breadcrumbs breadcrumbs-fixed" id="breadcrumbs">
        <ul class="breadcrumb">
            <li>
                <i class="ace-icon fa fa-home home-icon"></i>
                <a href="{{URL::route('admin.dashboard')}}">Home</a>
            </li>
            <li><a href="{{URL::route('admin.viewNangkhieu')}}"> Danh sách điểm thi năng khiếu</a></li>
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
                        <label for="name" class="control-label">Số BD<span class="red"> (*) </span></label>
                        <div class="form-group">
                            <input type="text" placeholder="Số BD" id="nangkhieu_sobaodanh" name="nangkhieu_sobaodanh" class="form-control input-sm" value="@if(isset($data['nangkhieu_sobaodanh'])){{$data['nangkhieu_sobaodanh']}}@endif">
                        </div>
                    </div>
                    <div class="clearfix"></div>
                    <div class="form-group">
                        <label for="name" class="control-label">Họ và tên<span class="red"> (*) </span></label>
                        <div class="form-group">
                            <input type="text" placeholder="Họ và tên" id="nangkhieu_hoten" name="nangkhieu_hoten" class="form-control input-sm" value="@if(isset($data['nangkhieu_hoten'])){{$data['nangkhieu_hoten']}}@endif">
                        </div>
                    </div>
                    <div class="clearfix"></div>
                    <div class="form-group">
                        <label for="name" class="control-label">Ngày sinh<span class="red"> (*) </span></label>
                        <div class="form-group">
                            <input type="text" placeholder="Ngày sinh" id="nangkhieu_ngaysinh" name="nangkhieu_ngaysinh" class="form-control input-sm" value="@if(isset($data['nangkhieu_ngaysinh'])){{$data['nangkhieu_ngaysinh']}}@endif">
                        </div>
                    </div>
                    <div class="clearfix"></div>
                    <div class="form-group">
                        <label for="name" class="control-label">Số CMND<span class="red"> (*) </span></label>
                        <div class="form-group">
                            <input type="text" placeholder="Số CMND" id="nangkhieu_cmt" name="nangkhieu_cmt" class="form-control input-sm" value="@if(isset($data['nangkhieu_cmt'])){{$data['nangkhieu_cmt']}}@endif">
                        </div>
                    </div>
                    <div class="clearfix"></div>
                    <div class="form-group">
                        <label for="name" class="control-label">Số phách<span class="red"> (*) </span></label>
                        <div class="form-group">
                            <input type="text" placeholder="Số phách" id="nangkhieu_sophach" name="nangkhieu_sophach" class="form-control input-sm" value="@if(isset($data['nangkhieu_sophach'])){{$data['nangkhieu_sophach']}}@endif">
                        </div>
                    </div>
                    <div class="clearfix"></div>
                    <div class="form-group">
                        <label for="name" class="control-label">Đợt thi<span class="red"> (*) </span></label>
                        <div class="form-group">
                            <input type="text" placeholder="Đợt thi" id="nangkhieu_ngaythi" name="nangkhieu_ngaythi" class="form-control input-sm" value="@if(isset($data['nangkhieu_ngaythi'])){{$data['nangkhieu_ngaythi']}}@endif">
                        </div>
                    </div>
                    <div class="clearfix"></div>
                </div>
                <div class="col-sm-4">
                    <div class="form-group">
                        <label for="name" class="control-label">NK1<span class="red"> (*) </span></label>
                        <div class="form-group">
                            <input type="text" placeholder="NK1" id="nangkhieu_monthi_mot" name="nangkhieu_monthi_mot" class="form-control input-sm" value="@if(isset($data['nangkhieu_monthi_mot'])){{$data['nangkhieu_monthi_mot']}}@endif">
                        </div>
                    </div>
                    <div class="clearfix"></div>
                    <div class="form-group">
                        <label for="name" class="control-label">NK2<span class="red"> (*) </span></label>
                        <div class="form-group">
                            <input type="text" placeholder="NK2" id="nangkhieu_monthi_hai" name="nangkhieu_monthi_hai" class="form-control input-sm" value="@if(isset($data['nangkhieu_monthi_hai'])){{$data['nangkhieu_monthi_hai']}}@endif">
                        </div>
                    </div>
                    <div class="clearfix"></div>
                    <div class="form-group">
                        <label for="name" class="control-label">NK3<span class="red"> (*) </span></label>
                        <div class="form-group">
                            <input type="text" placeholder="NK3" id="nangkhieu_monthi_ba" name="nangkhieu_monthi_ba" class="form-control input-sm" value="@if(isset($data['nangkhieu_monthi_ba'])){{$data['nangkhieu_monthi_ba']}}@endif">
                        </div>
                    </div>
                    <div class="clearfix"></div>
                    <div class="form-group">
                        <label for="name" class="control-label">NK4<span class="red"> (*) </span></label>
                        <div class="form-group">
                            <input type="text" placeholder="NK4" id="nangkhieu_monthi_bon" name="nangkhieu_monthi_bon" class="form-control input-sm" value="@if(isset($data['nangkhieu_monthi_bon'])){{$data['nangkhieu_monthi_bon']}}@endif">
                        </div>
                    </div>
                    <div class="clearfix"></div>
                    <div class="form-group">
                        <label for="name" class="control-label">NK5<span class="red"> (*) </span></label>
                        <div class="form-group">
                            <input type="text" placeholder="NK5" id="nangkhieu_monthi_nam" name="nangkhieu_monthi_nam" class="form-control input-sm" value="@if(isset($data['nangkhieu_monthi_nam'])){{$data['nangkhieu_monthi_nam']}}@endif">
                        </div>
                    </div>
                    <div class="clearfix"></div>
                    <div class="form-group">
                        <label for="name" class="control-label">NK6<span class="red"> (*) </span></label>
                        <div class="form-group">
                            <input type="text" placeholder="NK6" id="nangkhieu_monthi_sau" name="nangkhieu_monthi_sau" class="form-control input-sm" value="@if(isset($data['nangkhieu_monthi_sau'])){{$data['nangkhieu_monthi_sau']}}@endif">
                        </div>
                    </div>
                    <div class="clearfix"></div>
                </div>
                <div class="clearfix"></div>
                <div class="form-group col-sm-10 text-left">
                    <a class="btn btn-warning" href="{{URL::route('admin.viewNangkhieu')}}"><i class="fa fa-reply"></i> Trở lại</a>
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
        var ngaysinh = $('#nangkhieu_ngaysinh').datepicker({dateFormat: 'dd-mm-yy'});
        var ngaythi = $('#nangkhieu_ngaythi').datepicker({dateFormat: 'dd-mm-yy'});
    });
</script>
