<div class="box-check">
	<h1 class="title-box-check"><a href="{{URL::route('tracuu.traCuuXetTuyenSinh')}}" title="Tra cứu xet tuyển sinh">Tra cứu xet tuyển sinh</a></h2>
	<div class="content-box-check">
		<div class="input-ext" id="boxTraCuuXetTuyenSinh">
			{{Form::open(array('method' => 'POST', 'id'=>'formTraCuu', 'class'=>'formTraCuu', 'name'=>'formTraCuu'))}}
			<div class="col-lg-2 col-md-2 col-sm-12">
				<div class="form-group">
					<label class="control-label">Số chứng minh thư</label>
					<input id="ipSCMT" name="ipSCMT" class="form-control" type="text" placeholder="- Số CMND -">
				</div>
			</div>
			<div class="col-lg-2 col-md-2 col-sm-12">
				<div class="form-group">
					<label class="control-label">Trình độ</label>
					<select id="ipTrinhDo" name="ipTrinhDo" class="form-control">
						<option value="1">Trung cấp</option>
						<option value="2">Cao đẳng</option>
						<option value="3">Cao đẳng liên thông</option>

					</select>
				</div>
			</div>
			<div class="col-lg-2 col-md-2 col-sm-12">
				<div class="form-group">
					<label class="control-label">&nbsp;</label>
					<button type="button" id="submitTraCuuXetTuyenSinh" class="btn btn-primary btn-ext">Tra cứu</button>
				</div>
				<span class="loading"></span>
			</div>
			{{Form::close()}}
		</div>
		<div class="line-equal">
			<div class="title-equal"><span>Thông tin xét tuyển sinh</span></div>
			<div class="box-list-equal">
				<div class="inputInfo">Vui lòng nhập số chứng minh thư và trình độ.</div>
			</div>
		</div>
	</div>
</div>