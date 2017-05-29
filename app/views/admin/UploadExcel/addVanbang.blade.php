<div class="main-content-inner">
    <div class="breadcrumbs breadcrumbs-fixed" id="breadcrumbs">
        <ul class="breadcrumb">
            <li>
                <i class="ace-icon fa fa-home home-icon"></i>
                <a href="{{URL::route('admin.dashboard')}}">Home</a>
            </li>
            <li><a href="{{URL::route('admin.viewVanbang')}}"> Danh sách văn bằng</a></li>
            <li class="active">@if($id > 0)Cập nhật văn bằng @else Tạo mới văn bằng @endif</li>
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
                        <label for="name" class="control-label">Họ và tên người học<span class="red"> (*) </span></label>
                        <div class="form-group">
                            <input type="text" placeholder="Họ và tên người học" id="vanbang_hoten" name="vanbang_hoten" class="form-control input-sm" value="@if(isset($data['vanbang_hoten'])){{$data['vanbang_hoten']}}@endif">
                        </div>
                    </div>
                    <div class="clearfix"></div>
                    <div class="form-group">
                        <label for="name" class="control-label">Ngày tháng năm sinh<span class="red"> (*) </span></label>
                        <div class="form-group">
                            <input type="text" placeholder="Ngày tháng năm sinh" id="vanbang_ngaysinh" name="vanbang_ngaysinh" class="form-control input-sm" value="@if(isset($data['vanbang_ngaysinh'])){{$data['vanbang_ngaysinh']}}@endif">
                        </div>
                    </div>
                    <div class="clearfix"></div>
                    <div class="form-group">
                        <label for="name" class="control-label">Nơi sinh<span class="red"> (*) </span></label>
                        <div class="form-group">
                            <input type="text" placeholder="Nơi sinh" id="vanbang_noisinh" name="vanbang_noisinh" class="form-control input-sm" value="@if(isset($data['vanbang_noisinh'])){{$data['vanbang_noisinh']}}@endif">
                        </div>
                    </div>
                    <div class="clearfix"></div>
                    <div class="form-group">
                        <label for="name" class="control-label">Giới tính<span class="red"> (*) </span></label>
                        <div class="form-group">
                            <input type="text" placeholder="Giới tính" id="vanbang_gioitinh" name="vanbang_gioitinh" class="form-control input-sm" value="@if(isset($data['vanbang_gioitinh'])){{$data['vanbang_gioitinh']}}@endif">
                        </div>
                    </div>
                    <div class="clearfix"></div>
                    <div class="form-group">
                        <label for="name" class="control-label">Dân tộc<span class="red"> (*) </span></label>
                        <div class="form-group">
                            <input type="text" placeholder="Dân tộc" id="vanbang_dantoc" name="vanbang_dantoc" class="form-control input-sm" value="@if(isset($data['vanbang_dantoc'])){{$data['vanbang_dantoc']}}@endif">
                        </div>
                    </div>
                    <div class="clearfix"></div>
                    <div class="form-group">
                        <label for="name" class="control-label">Ngành đào tạo<span class="red"> (*) </span></label>
                        <div class="form-group">
                            <input type="text" placeholder="Ngành đào tạo" id="vanbang_nganhdaotao" name="vanbang_nganhdaotao" class="form-control input-sm" value="@if(isset($data['vanbang_nganhdaotao'])){{$data['vanbang_nganhdaotao']}}@endif">
                        </div>
                    </div>
                    <div class="clearfix"></div>
                    <div class="form-group">
                        <label for="name" class="control-label">Năm tốt nghiệp<span class="red"> (*) </span></label>
                        <div class="form-group">
                            <input type="text" placeholder="Năm tốt nghiệp" id="vanbang_namtotnghiep" name="vanbang_namtotnghiep" class="form-control input-sm" value="@if(isset($data['vanbang_namtotnghiep'])){{$data['vanbang_namtotnghiep']}}@endif">
                        </div>
                    </div>
                    <div class="clearfix"></div>
                    <div class="form-group">
                        <label for="name" class="control-label">Xếp loại tốt nghiệp<span class="red"> (*) </span></label>
                        <div class="form-group">
                            <input type="text" placeholder="Xếp loại tốt nghiệp" id="vanbang_xeploai" name="vanbang_xeploai" class="form-control input-sm" value="@if(isset($data['vanbang_xeploai'])){{$data['vanbang_xeploai']}}@endif">
                        </div>
                    </div>
                    <div class="clearfix"></div>
                </div>
                <div class="col-sm-4">
                    <div class="form-group">
                        <label for="name" class="control-label">Số hiệu văn bằng, chứng chỉ<span class="red"> (*) </span></label>
                        <div class="form-group">
                            <input type="text" placeholder="Số hiệu văn bằng, chứng chỉ" id="vanbang_machungchi" name="vanbang_machungchi" class="form-control input-sm" value="@if(isset($data['vanbang_machungchi'])){{$data['vanbang_machungchi']}}@endif">
                        </div>
                    </div>
                    <div class="clearfix"></div>
                    <div class="form-group">
                        <label for="name" class="control-label">Vào sổ cấp văn bằng, chứng chỉ số<span class="red"> (*) </span></label>
                        <div class="form-group">
                            <input type="text" placeholder="Vào sổ cấp văn bằng, chứng chỉ số" id="vanbang_chungchiso" name="vanbang_chungchiso" class="form-control input-sm" value="@if(isset($data['vanbang_chungchiso'])){{$data['vanbang_chungchiso']}}@endif">
                        </div>
                    </div>
                    <div class="clearfix"></div>
                    <div class="form-group">
                        <label for="name" class="control-label">Khóa học<span class="red"> (*) </span></label>
                        <div class="form-group">
                            <input type="text" placeholder="Khóa học" id="vanbang_khoahoc" name="vanbang_khoahoc" class="form-control input-sm" value="@if(isset($data['vanbang_khoahoc'])){{$data['vanbang_khoahoc']}}@endif">
                        </div>
                    </div>
                    <div class="clearfix"></div>
                    <div class="form-group">
                        <label for="name" class="control-label">Trình độ<span class="red"> (*) </span></label>
                        <div class="form-group">
                            <input type="text" placeholder="Trình độ" id="vanbang_trinhdo" name="vanbang_trinhdo" class="form-control input-sm" value="@if(isset($data['vanbang_trinhdo'])){{$data['vanbang_trinhdo']}}@endif">
                        </div>
                    </div>
                    <div class="clearfix"></div>
                    <div class="form-group">
                        <label for="name" class="control-label">Hình thức đào tạo<span class="red"> (*) </span></label>
                        <div class="form-group">
                            <input type="text" placeholder="Hình thức đào tạo" id="vanbang_htdaotao" name="vanbang_htdaotao" class="form-control input-sm" value="@if(isset($data['vanbang_htdaotao'])){{$data['vanbang_htdaotao']}}@endif">
                        </div>
                    </div>
                    <div class="clearfix"></div>
                    <div class="form-group">
                        <label for="name" class="control-label">Số Quyết định tốt nghiệp<span class="red"> (*) </span></label>
                        <div class="form-group">
                            <input type="text" placeholder="Số Quyết định tốt nghiệp" id="vanbang_sototnghiep" name="vanbang_sototnghiep" class="form-control input-sm" value="@if(isset($data['vanbang_sototnghiep'])){{$data['vanbang_sototnghiep']}}@endif">
                        </div>
                    </div>
                    <div class="clearfix"></div>
                    <div class="form-group">
                        <label for="name" class="control-label">Ngày QĐ tốt nghiệp<span class="red"> (*) </span></label>
                        <div class="form-group">
                            <input type="text" placeholder="Ngày QĐ tốt nghiệp" id="vanbang_ngaytotnghiep" name="vanbang_ngaytotnghiep" class="form-control input-sm" value="@if(isset($data['vanbang_ngaytotnghiep'])){{$data['vanbang_ngaytotnghiep']}}@endif">
                        </div>
                    </div>
                    <div class="clearfix"></div>
                </div>
                <div class="clearfix"></div>
                <div class="form-group col-sm-10 text-left">
                    <a class="btn btn-warning" href="{{URL::route('admin.viewVanbang')}}"><i class="fa fa-reply"></i> Trở lại</a>
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
        var ngaysinh = $('#vanbang_ngaysinh').datepicker({dateFormat: 'dd-mm-yy'});
        var ngaytotnghiep = $('#vanbang_ngaytotnghiep').datepicker({dateFormat: 'dd-mm-yy'});

    });
</script>
