jQuery(document).ready(function($){
	SITE.backTop();
	SITE.contact();
	SITE.captchaCheckAjax();
	SITE.tabEdu();
	SITE.boxTraCuuVanBangChungChi();
	SITE.boxTraCuuDiemThiNangKhieu();
	SITE.boxTraCuuXetTuyenSinh();
});

SITE={
	backTop:function(){
		jQuery(window).scroll(function() {
		    if(jQuery(window).scrollTop() > 0) {
				jQuery("#back-top").fadeIn();
			} else {
				jQuery("#back-top").fadeOut();
			}
		});
		jQuery("#back-top").click(function(){
			jQuery("html, body").animate({scrollTop: 0}, 1000);
			return false;
		});
	},
	contact:function(){
		jQuery('#submitContact').click(function(){
			var valid = true;
			if(jQuery('#txtName').val() == ''){
				jQuery('#txtName').addClass('error');
				valid = false;
			}else{
				jQuery('#txtName').removeClass('error');
			}
			
			if(jQuery('#txtMobile').val() == ''){
				jQuery('#txtMobile').addClass('error');
				valid = false;
			}else{
				
				var regex = /^[0-9-+]+$/;
				var phone = jQuery('#txtMobile').val();
				if (regex.test(phone)) {
			        jQuery('#txtMobile').removeClass('error');
			    }else{
					jQuery('#txtMobile').addClass('error');	
				}
			}
			if(jQuery('#txtTitle').val() == ''){
				jQuery('#txtTitle').addClass('error');
				valid = false;
			}else{
				jQuery('#txtTitle').removeClass('error');
			}
			if(jQuery('#txtMessage').val() == ''){
				jQuery('#txtMessage').addClass('error');
				valid = false;
			}else{
				jQuery('#txtMessage').removeClass('error');
			}
			
			if(jQuery('#securityCode').val() == ''){
				jQuery('#securityCode').addClass('error');
				valid = false;
			}else{
				SITE.captchaCheckAjax();
			}
			
			var error = jQuery('#formSendContact .error').length;
			if(error > 0){
				return false;
			}
			return valid;
		});
	},
	captchaCheckAjax:function(){
		var captcha = jQuery('#securityCode').val();
		if(captcha != ''){
			var url = WEB_ROOT + '/captchaCheckAjax';
			jQuery.ajax({
				type: "POST",
				url: url,
				data: "captcha="+encodeURI(captcha),
				success: function(data){
					if(data == 0){
						jQuery('#securityCode').addClass('error');
                        var img = document.images['imageCaptchar'];
                        if(img != undefined) {
                            img.src = img.src.substring(0, img.src.lastIndexOf("?")) + "?rand=" + Math.round(1000 * Math.random());
                        }
					}else{
						jQuery('#securityCode').removeClass('error');
					}
					return false;
				}
			});
		}
	},
    tabEdu:function(){
		$('#tabContaier ul li a').click(function(){
            $('#tabContaier ul li a').removeClass('active');
			$(this).addClass('active')
			var data = $(this).attr('data');
			if(data != ''){
				$('.tabContents').removeClass('active');
				$('#'+data).addClass('active');
			}
		});
	},
    boxTraCuuVanBangChungChi:function(){
    	$('#submitTraCuuVanBangChungChi').click(function(){
    		var ipVanBang = $('#ipVanBang').val(),
                _token = $('#formTraCuu input[name="_token"]').val();
    		if(ipVanBang == ''){
               jAlert('Nhập văn bằng hoặc chứng chỉ', 'Cảnh báo');
			}else{
                if(_token != '') {
                    $('.loading').show();
                    var url = WEB_ROOT + '/ajax-tra-cuu-van-bang-chung-chi';
                    jQuery.ajax({
                        type: "POST",
                        url: url,
                        data: "ipVanBang=" + encodeURI(ipVanBang) + "&_token=" + encodeURI(_token),
                        success: function (data) {
                            $('.loading').hide();
                            $('.box-list-equal').html('');
                            if (data == '0') {
                                jAlert('Nhập văn bằng hoặc chứng chỉ', 'Cảnh báo');
                            } else if (data == '1') {
                                $('.box-list-equal').append('<div class="noResult">Không có kết quả nào phù hợp.</div>');
                            } else {
                                var jsonData = jQuery.parseJSON(data);
                                var str = '';
                                for (var i = 0; i < jsonData.length; i++) {
                                    str += '<div class="item-result">';
                                    str += '<div class="line-equal-item"><div class="col-lg-3 col-md-3 col-sm-12"><div class="item-form-group"> <label class="control-label">Họ tên: <span class="normal">' + jsonData[i].vanbang_hoten + '</span></label></div></div><div class="col-lg-2 col-md-2 col-sm-12"><div class="item-form-group"> <label class="control-label">Ngày sinh: <span class="normal">' + jsonData[i].vanbang_ngaysinh + '</span></label></div></div><div class="col-lg-2 col-md-2 col-sm-12"><div class="item-form-group"> <label class="control-label">Giới tính: <span class="normal">' + jsonData[i].vanbang_gioitinh + '</span></label></div></div><div class="col-lg-2 col-md-2 col-sm-12"><div class="item-form-group"> <label class="control-label">Dân tộc: <span class="normal">' + jsonData[i].vanbang_dantoc + '</span></label></div></div><div class="col-lg-3 col-md-3 col-sm-12"><div class="item-form-group"> <label class="control-label">Địa chỉ: <span class="normal">' + jsonData[i].vanbang_noisinh + '</span></label></div></div></div></div>';
                                    str += '<div class="line-equal-item"><div class="col-lg-3 col-md-3 col-sm-12"><div class="item-form-group"> <label class="control-label">Ngành: <span class="normal">' + jsonData[i].vanbang_nganhdaotao + '</span></label></div></div><div class="col-lg-2 col-md-2 col-sm-12"><div class="item-form-group"> <label class="control-label">Số hiệu: <span class="normal">' + jsonData[i].vanbang_machungchi + '</span></label></div></div><div class="col-lg-2 col-md-2 col-sm-12"><div class="item-form-group"> <label class="control-label">Chứng chỉ: <span class="normal">' + jsonData[i].vanbang_chungchiso + '</span></label></div></div><div class="col-lg-2 col-md-2 col-sm-12"><div class="item-form-group"> <label class="control-label">Số tốt nghiệp: <span class="normal">' + jsonData[i].vanbang_sototnghiep + '</span></label></div></div><div class="col-lg-3 col-md-3 col-sm-12"><div class="item-form-group"> <label class="control-label">Hình thức: <span class="normal">' + jsonData[i].vanbang_htdaotao + '</span></label></div></div></div>';
                                    str += '<div class="line-equal-item"><div class="col-lg-3 col-md-3 col-sm-12"><div class="item-form-group"> <label class="control-label">Ngày tốt nghiệp: <span class="normal">' + jsonData[i].vanbang_ngaytotnghiep + '</span></label></div></div><div class="col-lg-2 col-md-2 col-sm-12"><div class="item-form-group"> <label class="control-label">Năm tốt nghiệp: <span class="normal">' + jsonData[i].vanbang_namtotnghiep + '</span></label></div></div><div class="col-lg-2 col-md-2 col-sm-12"><div class="item-form-group"> <label class="control-label">Khóa: <span class="normal">' + jsonData[i].vanbang_khoahoc + '</span></label></div></div><div class="col-lg-2 col-md-2 col-sm-12"><div class="item-form-group"> <label class="control-label">Xếp loại: <span class="normal">' + jsonData[i].vanbang_xeploai + '</span></label></div></div></div>';
                                    str += '</div>';
                                    $('.box-list-equal').append(str);
                                }
                            }
                        }
                    });
                }
			}
		});
	},
    boxTraCuuDiemThiNangKhieu:function(){
        $('#submitTraCuuDiemThiNangKhieu').click(function(){
            var ipCMND = $('#ipCMND').val(),
                ipHoVaTen = $('#ipHoVaTen').val(),
                _token = $('#formTraCuu input[name="_token"]').val();

            if(ipCMND == '' && ipHoVaTen == ''){
                jAlert('Nhập số CMND hoặc Họ và tên', 'Cảnh báo');
            }else{
                if(_token != '') {
                    $('.loading').show();
                    var url = WEB_ROOT + '/ajax-tra-cuu-diem-thi-nang-khieu';
                    jQuery.ajax({
                        type: "POST",
                        url: url,
                        data: "ipCMND=" + encodeURI(ipCMND) + "&ipHoVaTen=" + encodeURI(ipHoVaTen) + "&_token=" + encodeURI(_token),
                        success: function (data) {
                            $('.loading').hide();
                            $('.box-list-equal').html('');
                            if (data == '0') {
                                jAlert('Nhập số CMND hoặc Họ và tên', 'Cảnh báo');
                            } else if (data == '1') {
                                $('.box-list-equal').append('<div class="noResult">Không có kết quả nào phù hợp.</div>');
                            } else {
                                var jsonData = jQuery.parseJSON(data);
                                var str = '';
								str += '<table class="tblNangKhieu">';
                                str += '<tr class="head"><td>Họ và tên</td><td>Ngày sinh</td><td>Số CMND</td><td>NK1</td><td>NK2</td><td>NK3</td><td>NK4</td><td>NK5</td><td>NK6</td><td>Đợt thi</td></tr>';
                                for (var i = 0; i < jsonData.length; i++) {
                                    str += '<tr><td>'+jsonData[i].nangkhieu_hoten+'</td><td>'+ jsonData[i].nangkhieu_ngaysinh +'</td><td>'+ jsonData[i].nangkhieu_cmt +'</td><td>'+ jsonData[i].nangkhieu_monthi_mot +'</td><td>'+ jsonData[i].nangkhieu_monthi_hai +'</td><td>'+ jsonData[i].nangkhieu_monthi_ba +'</td><td>'+ jsonData[i].nangkhieu_monthi_bon +'</td><td>'+ jsonData[i].nangkhieu_monthi_nam +'</td><td>'+ jsonData[i].nangkhieu_monthi_sau +'</td><td>'+ jsonData[i].nangkhieu_ngaythi +'</td></tr>';
                                }
								str += '</table>';
                                str += '<div class="line-equal-item"><div class="col-lg-6 col-md-6 col-sm-12"><div class="item-form-group"> <label class="control-label">NK 1: <span class="normal">Đọc, kể diễn cảm và Hát</span></label></div><div class="item-form-group"> <label class="control-label">NK2: <span class="normal">Thẩm âm-Tiết tấu</span></label></div><div class="item-form-group"> <label class="control-label">NK3: <span class="normal">Thanh nhạc</span></label></div></div><div class="col-lg-6 col-md-6 col-sm-12"><div class="item-form-group"> <label class="control-label">NK4: <span class="normal">Hình họa</span></label></div><div class="item-form-group"> <label class="control-label">NK5: <span class="normal">Bố cục</span></label></div><div class="item-form-group"> <label class="control-label">NK6: <span class="normal">Trang trí</span></label></div></div></div>';
                                $('.box-list-equal').append(str);
                            }
                        }
                    });
                }
            }
        });
    },
    boxTraCuuXetTuyenSinh:function(){
        $('#submitTraCuuXetTuyenSinh').click(function(){
            var ipCMND = $('#ipCMND').val(),
                ipHoVaTen = $('#ipHoVaTen').val(),
                ipTrinhDo = $('#ipTrinhDo').val(),
                _token = $('#formTraCuu input[name="_token"]').val();
            if((ipCMND == '' || ipHoVaTen) == '' && ipTrinhDo == ''){
                jAlert('Nhập số CMND hoặc Họ và tên', 'Cảnh báo');
            }else{
                if(_token != '') {
                    $('.loading').show();
                    var url = WEB_ROOT + '/ajax-tra-cuu-ket-qua-tuyen-sinh';
                    jQuery.ajax({
                        type: "POST",
                        url: url,
                        data: "ipCMND=" + encodeURI(ipCMND) + "&ipHoVaTen=" + encodeURI(ipHoVaTen) + "&ipTrinhDo=" + encodeURI(ipTrinhDo) + "&_token=" + encodeURI(_token),
                        success: function (data) {
                            $('.loading').hide();
                            $('.box-list-equal').html('');
                            if (data == '0') {
                                jAlert('Nhập số CMND hoặc Họ và tên', 'Cảnh báo');
                            } else if (data == '1') {
                                $('.box-list-equal').append('<div class="noResult">Không có kết quả nào phù hợp.</div>');
                            } else {
                                var jsonData = jQuery.parseJSON(data);
                                var str = '';
                                str += '<table class="tblNangKhieu">';
                                str += '<tr class="head"><td>Họ và tên</td><td>Ngày sinh</td><td>Số CMND</td><td>Khu vực</td><td>Đối tượng</td><td>Hình thức xét tuyển</td><td>Tổng điểm có ƯT</td><td>Ngành trúng tuyển</td><td>Đợt xét tuyển</td></tr>';
                                for (var i = 0; i < jsonData.length; i++) {
                                    str += '<tr><td>'+jsonData[i].tuyensinh_hoten+'</td><td>'+ jsonData[i].tuyensinh_ngaysinh +'</td><td>'+ jsonData[i].tuyensinh_cmt +'</td><td>'+ jsonData[i].tuyensinh_khuvuc_uutien +'</td><td>'+ jsonData[i].tuyensinh_diem_uutien +'</td><td>'+ jsonData[i].tuyensinh_hinhthucxettuyen +'</td><td>'+ jsonData[i].tuyensinh_tongdiemco_uutien +'</td><td>'+ jsonData[i].tuyensinh_nganhtrungtuyen +'</td><td></td></tr>';
                                }
                                str += '</table>';
                                $('.box-list-equal').append(str);
                            }
                        }
                    });
                }
            }
        });
    },
}