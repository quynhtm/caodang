jQuery(document).ready(function($){
	SITE.backTop();
	SITE.contact();
	SITE.captchaCheckAjax();
	SITE.tabEdu();
	SITE.boxTraCuuVanBangChungChi();
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
    		var ipSoHieu = $('#ipSoHieu').val(),
                ipChungChi = $('#ipChungChi').val();
    		if(ipSoHieu == '' && ipChungChi == ''){
               jAlert('Vui lòng nhập số hiệu văn bằng hoặc chứng chỉ', 'Cảnh báo');
			}else{
                $('.loading').show();
    			var url = WEB_ROOT + '/ajax-tra-cuu-van-bang-chung-chi';
                jQuery.ajax({
                    type: "POST",
                    url: url,
                    data: "ipSoHieu="+encodeURI(ipSoHieu) + "&ipChungChi="+encodeURI(ipChungChi),
                    success: function(data){
                        $('.loading').hide();
                        $('.box-list-equal').html('');
                        if(data == '0'){
                            jAlert('Vui lòng nhập số hiệu văn bằng hoặc chứng chỉ', 'Cảnh báo');
						}else if(data == '1') {
							$('.box-list-equal').append('<div class="noResult">Kết quả tìm kiếm rỗng.</div>');
                        }else{
                            var jsonData = jQuery.parseJSON(data);
                            var str = '';
                            for (var i = 0; i < jsonData.length; i++) {
								str += '<div class="item-result">';
									str += '<div class="line-equal-item"><div class="col-lg-3 col-md-3 col-sm-12"><div class="item-form-group"> <label class="control-label">Họ tên: <span class="normal">'+jsonData[i].vanbang_hoten+'</span></label></div></div><div class="col-lg-2 col-md-2 col-sm-12"><div class="item-form-group"> <label class="control-label">Ngày sinh: <span class="normal">'+jsonData[i].vanbang_ngaysinh+'</span></label></div></div><div class="col-lg-2 col-md-2 col-sm-12"><div class="item-form-group"> <label class="control-label">Giới tính: <span class="normal">'+jsonData[i].vanbang_gioitinh+'</span></label></div></div><div class="col-lg-2 col-md-2 col-sm-12"><div class="item-form-group"> <label class="control-label">Dân tộc: <span class="normal">'+jsonData[i].vanbang_dantoc+'</span></label></div></div><div class="col-lg-3 col-md-3 col-sm-12"><div class="item-form-group"> <label class="control-label">Địa chỉ: <span class="normal">'+jsonData[i].vanbang_noisinh+'</span></label></div></div></div></div>';
                                	str += '<div class="line-equal-item"><div class="col-lg-3 col-md-3 col-sm-12"><div class="item-form-group"> <label class="control-label">Ngành: <span class="normal">'+jsonData[i].vanbang_nganhdaotao+'</span></label></div></div><div class="col-lg-2 col-md-2 col-sm-12"><div class="item-form-group"> <label class="control-label">Số hiệu: <span class="normal">'+jsonData[i].vanbang_machungchi+'</span></label></div></div><div class="col-lg-2 col-md-2 col-sm-12"><div class="item-form-group"> <label class="control-label">Chứng chỉ: <span class="normal">'+jsonData[i].vanbang_chungchiso+'</span></label></div></div><div class="col-lg-2 col-md-2 col-sm-12"><div class="item-form-group"> <label class="control-label">Số tốt nghiệp: <span class="normal">'+jsonData[i].vanbang_sototnghiep+'</span></label></div></div><div class="col-lg-3 col-md-3 col-sm-12"><div class="item-form-group"> <label class="control-label">Hình thức: <span class="normal">'+jsonData[i].vanbang_htdaotao+'</span></label></div></div></div>';
                                str += '<div class="line-equal-item"><div class="col-lg-3 col-md-3 col-sm-12"><div class="item-form-group"> <label class="control-label">Ngày tốt nghiệp: <span class="normal">'+jsonData[i].vanbang_ngaytotnghiep+'</span></label></div></div><div class="col-lg-2 col-md-2 col-sm-12"><div class="item-form-group"> <label class="control-label">Năm tốt nghiệp: <span class="normal">'+jsonData[i].vanbang_namtotnghiep+'</span></label></div></div><div class="col-lg-2 col-md-2 col-sm-12"><div class="item-form-group"> <label class="control-label">Khóa: <span class="normal">'+jsonData[i].vanbang_khoahoc+'</span></label></div></div><div class="col-lg-2 col-md-2 col-sm-12"><div class="item-form-group"> <label class="control-label">Xếp loại: <span class="normal">'+jsonData[i].vanbang_xeploai+'</span></label></div></div></div>';
								str += '</div>';
                                $('.box-list-equal').append(str);
							}
						}
                    }
                });
			}
		});
	}
}