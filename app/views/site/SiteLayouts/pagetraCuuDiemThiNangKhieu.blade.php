<div class="box-check">
	<h1 class="title-box-check"><a href="{{URL::route('tracuu.traCuuDiemThiNangKhieu')}}" title="Tra cứu điểm thi năng khiếu">Tra cứu điểm thi năng khiếu</a></h2>
	<div class="content-box-check">
		<div class="input-ext" id="boxTraCuuDiemThiNangKhieu">
			{{Form::open(array('method' => 'POST', 'id'=>'formTraCuu', 'class'=>'formTraCuu', 'name'=>'formTraCuu'))}}
			<div class="col-lg-2 col-md-2 col-sm-12">
				<div class="form-group">
					<label class="control-label">Số chứng minh thư</label>
					<input id="ipSCMT" name="ipSCMT" class="form-control" type="text" placeholder="- Số CMND -">
				</div>
			</div>
			<div class="col-lg-2 col-md-2 col-sm-12">
				<div class="form-group">
					<label class="control-label">Số báo danh</label>
					<input id="ipSoBaoDanh" name="ipSoBaoDanh" class="form-control" type="text" placeholder="- Số báo danh -">
				</div>
			</div>
			<div class="col-lg-2 col-md-2 col-sm-12">
				<div class="form-group">
					<label class="control-label">&nbsp;</label>
					<button type="button" id="submitTraCuuDiemThiNangKhieu" class="btn btn-primary btn-ext">Tra cứu</button>
				</div>
				<span class="loading"></span>
			</div>
			{{Form::close()}}
		</div>
		<div class="line-equal">
			<div class="title-equal"><span>Thông tin điểm thi năng khiếu</span></div>
			<div class="box-list-equal">
				<div class="inputInfo">Vui lòng nhập số chứng minh thư và số báo danh.</div>
			</div>
		</div>
	</div>
</div>