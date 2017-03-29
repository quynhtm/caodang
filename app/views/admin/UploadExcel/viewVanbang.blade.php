<div class="main-content-inner">
    <div class="breadcrumbs breadcrumbs-fixed" id="breadcrumbs">
        <ul class="breadcrumb">
            <li>
                <i class="ace-icon fa fa-home home-icon"></i>
                <a href="{{URL::route('admin.dashboard')}}">Home</a>
            </li>
            <li class="active">Thông tin văn bằng chứng chỉ</li>
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
                            <input type="text" class="form-control input-sm" id="vanbang_hoten" name="vanbang_hoten" placeholder="Họ tên" @if(isset($search['vanbang_hoten']) && $search['vanbang_hoten'] != '')value="{{$search['vanbang_hoten']}}"@endif>
                        </div>
                        <div class="form-group col-lg-3">
                            <label for="department_name">Số hiệu, văn bằng, chứng chỉ</label>
                            <input type="text" class="form-control input-sm" id="vanbang_machungchi" name="vanbang_machungchi" placeholder="Họ tên" @if(isset($search['vanbang_machungchi']) && $search['vanbang_machungchi'] != '')value="{{$search['vanbang_machungchi']}}"@endif>
                        </div>
                    </div>
                    <div class="panel-footer text-right">
                        @if($is_root || $permission_full ==1 || $permission_create == 1)
                        <span class="">
                            <a class="btn btn-danger btn-sm" href="{{URL::route('admin.uploadExcelVanbang')}}">
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
                            <th width="2%"class="text-center">STT</th>
                            <th width="1%" class="text-center"><input type="checkbox" id="checkAll"/></th>
                            <th width="30%" class="td_list">Thông tin học viên</th>
                            <th width="30%" class="td_list">Thông tin ngành học</th>
                            <th width="30%" class="text-td_list">Thông tin văn bằng</th>
                            <th width="7%" class="text-center">Action</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach ($data as $key => $item)
                            <tr>
                                <td class="text-center text-middle">{{ $key+1 }}</td>
                                <td class="text-center text-middle"><input class="check" type="checkbox" name="checkItems[]" id="sys_checkItems" value="{{$item['vanbang_id']}}"></td>
                                <td>
                                    <b>Tên: </b>{{ $item['vanbang_hoten'] }}
                                    <br/><b>Sinh: </b>{{ $item['vanbang_ngaysinh'] }}
                                    <br/><b>DChi: </b>{{ $item['vanbang_noisinh'] }}
                                    <br/><b>Giới tính: </b>{{ $item['vanbang_gioitinh'] }} @if($item['vanbang_dantoc'] !=''),<b>Dân tộc: </b>{{ $item['vanbang_dantoc'] }}@endif
                                </td>
                                <td>
                                    <b>Ngành: </b>{{ $item['vanbang_nganhdaotao'] }}
                                    <br/><b>Tốt nghiệp: </b>{{ $item['vanbang_namtotnghiep'] }} @if($item['vanbang_xeploai'] !=''),<b>Xếp loại: </b>{{ $item['vanbang_xeploai'] }}@endif
                                    <br/><b>Khóa: </b>{{ $item['vanbang_khoahoc'] }}
                                    <br/><b>Hình thức: </b> {{ $item['vanbang_trinhdo'] }} - {{ $item['vanbang_htdaotao'] }}
                                </td>
                                <td>
                                    <b>Số hiệu: </b>{{ $item['vanbang_machungchi'] }}
                                    <br/><b>Chứng chỉ: </b>{{ $item['vanbang_chungchiso'] }}
                                    <br/><b>Số tốt nghiệp: </b>{{ $item['vanbang_sototnghiep'] }}
                                    <br/><b>Ngày tốt nghiệp: </b>{{ $item['vanbang_ngaytotnghiep'] }}
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