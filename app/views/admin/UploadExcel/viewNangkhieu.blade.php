<div class="main-content-inner">
    <div class="breadcrumbs breadcrumbs-fixed" id="breadcrumbs">
        <ul class="breadcrumb">
            <li>
                <i class="ace-icon fa fa-home home-icon"></i>
                <a href="{{URL::route('admin.dashboard')}}">Home</a>
            </li>
            <li class="active">Thông tin xét tuyển năng khiếu</li>
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
                            <input type="text" class="form-control input-sm" id="nangkhieu_hoten" name="nangkhieu_hoten" placeholder="Họ tên" @if(isset($search['nangkhieu_hoten']) && $search['nangkhieu_hoten'] != '')value="{{$search['nangkhieu_hoten']}}"@endif>
                        </div>
                        <div class="form-group col-lg-3">
                            <label for="department_name">Số bao danh</label>
                            <input type="text" class="form-control input-sm" id="nangkhieu_sobaodanh" name="nangkhieu_sobaodanh" placeholder="Họ tên" @if(isset($search['nangkhieu_sobaodanh']) && $search['nangkhieu_sobaodanh'] != '')value="{{$search['nangkhieu_sobaodanh']}}"@endif>
                        </div>
                    </div>
                    <div class="panel-footer text-right">
                        @if($is_root || $permission_full ==1 || $permission_create == 1)
                            <span class="">
                                <a class="btn btn-danger btn-sm" href="{{URL::route('admin.editNangkhieu')}}">
                                    <i class="ace-icon fa fa-plus-circle"></i>
                                    Thêm mới
                                </a>
                            </span>
                            <a class="btn btn-warning btn-sm" href="javascript:void(0);" onclick="Admin.removeAllItems(9);"><i class="fa fa-trash"></i> Xóa nhiều </a>
                            <span class="">
                            <a class="btn btn-danger btn-sm" href="{{URL::route('admin.uploadExcelNangkhieu')}}">
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
                            <th width="15%" class="text-center">Số báo danh</th>
                            <th width="5%" class="td_list">Môn 1</th>
                            <th width="5%" class="td_list">Môn 2</th>
                            <th width="5%" class="td_list">Môn 3</th>
                            <th width="5%" class="td_list">Môn 4</th>
                            <th width="5%" class="td_list">Môn 5</th>
                            <th width="5%" class="td_list">Môn 6</th>
                            <th width="15%" class="text-td_list">Thông tin thêm</th>
                            <th width="7%" class="text-center">Action</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach ($data as $key => $item)
                            <tr>
                                <td class="text-center text-middle">{{ $key+1 }}</td>
                                <td class="text-center text-middle"><input class="check" type="checkbox" name="checkItems[]" id="sys_checkItems" value="{{$item['nangkhieu_id']}}"></td>
                                <td>
                                    <b>Tên: </b>{{ $item['nangkhieu_hoten'] }}
                                    @if($item['nangkhieu_ngaysinh'] != '')<br/><b>Ngày sinh: </b>{{ $item['nangkhieu_ngaysinh'] }}@endif
                                    <br/><b>CMT: </b>{{ $item['nangkhieu_cmt'] }}
                                </td>
                                <td class="text-center text-middle"><b>{{ $item['nangkhieu_sobaodanh'] }}</b></td>

                                <td class="text-center text-middle"><b>{{ $item['nangkhieu_monthi_mot'] }}</b></td>
                                <td class="text-center text-middle"><b>{{ $item['nangkhieu_monthi_hai'] }}</b></td>
                                <td class="text-center text-middle"><b>{{ $item['nangkhieu_monthi_ba'] }}</b></td>
                                <td class="text-center text-middle"><b>{{ $item['nangkhieu_monthi_bon'] }}</b></td>
                                <td class="text-center text-middle"><b>{{ $item['nangkhieu_monthi_nam'] }}</b></td>
                                <td class="text-center text-middle"><b>{{ $item['nangkhieu_monthi_sau'] }}</b></td>
                                <td>
                                    <b>Số phách: </b>{{ $item['nangkhieu_sophach'] }}
                                    <br/><b>Ngày thi: </b>{{ $item['nangkhieu_ngaythi'] }}
                                </td>

                                <td class="text-center text-middle">
                                    @if($is_root || $permission_full ==1|| $permission_edit ==1  )
                                        <a href="{{URL::route('admin.editNangkhieu',array('id' => $item['nangkhieu_id']))}}" title="Sửa item"><i class="fa fa-edit fa-2x"></i></a>
                                        <a href="javascript:void(0);" onclick="Admin.deleteItem({{$item['nangkhieu_id']}},18)" title="Xóa Item"><i class="fa fa-trash fa-2x"></i></a>
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