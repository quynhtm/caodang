<div class="main-content-inner">
    <div class="breadcrumbs breadcrumbs-fixed" id="breadcrumbs">
        <ul class="breadcrumb">
            <li>
                <i class="ace-icon fa fa-home home-icon"></i>
                <a href="{{URL::route('admin.dashboard')}}">Home</a>
            </li>
            <li class="active">Thông tin Xét tuyển sinh</li>
        </ul><!-- /.breadcrumb -->
    </div>

    <div class="page-content">
        <div class="row">
            <div class="col-xs-12">
                <!-- PAGE CONTENT BEGINS -->
                <div class="panel panel-info">
                    {{ Form::open(array('method' => 'GET', 'role'=>'form')) }}
                    <div class="panel-body">
                        <div class="form-group col-lg-3">
                            <label for="department_name">Họ tên học sinh</label>
                            <input type="text" class="form-control input-sm" id="tuyensinh_hoten" name="tuyensinh_hoten" placeholder="Họ tên" @if(isset($search['tuyensinh_hoten']) && $search['tuyensinh_hoten'] != '')value="{{$search['tuyensinh_hoten']}}"@endif>
                        </div>
                        <div class="form-group col-lg-3">
                            <label for="department_name">Số báo danh</label>
                            <input type="text" class="form-control input-sm" id="tuyensinh_sobaodanh" name="tuyensinh_sobaodanh" placeholder="Họ tên" @if(isset($search['tuyensinh_sobaodanh']) && $search['tuyensinh_sobaodanh'] != '')value="{{$search['tuyensinh_sobaodanh']}}"@endif>
                        </div>
                    </div>
                    <div class="panel-footer text-right">
                        @if($is_root || $permission_full ==1 || $permission_create == 1)
                        <span class="">
                            <a class="btn btn-danger btn-sm" href="{{URL::route('admin.uploadExcelTuyensinh')}}">
                                <i class="ace-icon fa fa-plus-circle"></i>
                                Upload excel
                            </a>
                        </span>
                        @endif
                        <span class="">
                            <button class="btn btn-primary btn-sm" type="submit"><i class="fa fa-search"></i> Tìm kiếm</button>
                        </span>
                    </div>
                    {{ Form::close() }}
                </div>
                @if(sizeof($data) > 0)
                    <div class="span clearfix"> @if($total >0) Có tổng số <b>{{$total}}</b> item @endif </div>
                    <br>
                    <table class="table table-bordered table-hover">
                        <thead class="thin-border-bottom">
                        <tr class="">
                            <th width="2%"class="text-center">STT<br/><input type="checkbox" id="checkAll"/></th>
                            <th width="18%" class="td_list">Thông tin học viên</th>
                            <th width="20%" class="td_list">Thông tin khu vực</th>
                            <th width="15%" class="td_list">Thông tin môn thi</th>
                            <th width="20%" class="text-td_list">Thông tin điểm UT</th>
                            <th width="20%" class="text-td_list">Thông tin thêm</th>
                            <th width="5%" class="text-center"></th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach ($data as $key => $item)
                            <tr>
                                <td class="text-center text-middle">
                                    {{ $key+1 }}<br/><input class="check" type="checkbox" name="checkItems[]" id="sys_checkItems" value="{{$item['vanbang_id']}}">
                                </td>
                                <td>
                                    <b>Tên: </b>{{ $item['tuyensinh_hoten'] }}
                                    <br/><b>CMT: </b>{{ $item['tuyensinh_cmt'] }}
                                    <br/><b>Giới tính: </b>{{ $item['tuyensinh_gioitinh'] }}
                                    @if($item['tuyensinh_ngaysinh'] !='')<br/> <b>Ngày sinh: </b>{{ $item['tuyensinh_ngaysinh'] }}@endif
                                </td>
                                <td>
                                    <b>Khu vực UT: </b>{{ $item['tuyensinh_diem_uutien'] }} @if($item['tuyensinh_diem_uutien'] !=''),<b>Điểm UT: </b>{{ $item['tuyensinh_diem_uutien'] }}@endif
                                    <br/><b>ĐC: </b>{{ $item['tuyensinh_quanhuyen'] }} @if($item['tuyensinh_tinhthanh'] !=''),{{ $item['tuyensinh_tinhthanh'] }}@endif
                                    <br/><b>Khóa: </b>{{ $item['vanbang_khoahoc'] }}
                                    <br/><b>Hình thức: </b> {{ $item['vanbang_trinhdo'] }} - {{ $item['vanbang_htdaotao'] }}
                                </td>
                                <td>
                                    SBD: <b>{{ $item['tuyensinh_sobaodanh'] }}</b>
                                    <br/>Môn 1: <b>{{ $item['tuyensinh_monthi_mot'] }}</b>: <b>{{ $item['tuyensinh_diem_monthimot'] }}</b>
                                    <br/>Môn 2: <b>{{ $item['tuyensinh_monthi_hai'] }}</b>: <b>{{ $item['tuyensinh_diem_monthihai'] }}</b>
                                    <br/>Môn 3: <b>{{ $item['tuyensinh_monthi_ba'] }}</b>: <b>{{ $item['tuyensinh_diem_monthiba'] }}</b>

                                </td>
                                <td>
                                    Tổng điểm chưa UT: <b>{{ $item['tuyensinh_tongdiemchua_uutien'] }}</b>
                                    <br/>Tổng điểm có UT: <b>{{ $item['tuyensinh_tongdiemco_uutien'] }}</b>
                                    <br/>Điểm lệch: <b>{{ $item['tuyensinh_diemlech'] }}</b>
                                    <br/>Điểm UT quy đổi: <b>{{ $item['tuyensinh_diem_uutien_quydoi'] }}</b>
                                </td>
                                <td>
                                    <b>{{ $item['tuyensinh_nganhtrungtuyen'] }}</b>
                                    </br/>Hồ sơ<b>{{ $item['tuyensinh_sohoso'] }}</b>
                                    <br/>Xét tuyển: <b>{{ $item['tuyensinh_dotxettuyen'] }}</b>
                                    <br/>Trình độ: <b>{{ $item['tuyensinh_trinhdo'] }}</b>
                                </td>

                                <td class="text-center">
                                    @if($is_root || $permission_full ==1|| $permission_edit ==1  )

                                    @endif
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                    <div class="text-right">
                        {{$paging}}
                    </div>
                @else
                    <div class="alert">
                        Không có dữ liệu
                    </div>
                @endif
                            <!-- PAGE CONTENT ENDS -->
            </div>
            <!-- /.col -->
        </div>
        <!-- /.row -->
    </div><!-- /.page-content -->
</div>
<script type="text/javascript" xmlns="http://www.w3.org/1999/html">
    $(document).ready(function() {
        $("#checkAll").click(function () {
            $(".check").prop('checked', $(this).prop('checked'));
        });
    });
</script>