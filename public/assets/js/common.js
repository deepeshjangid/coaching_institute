
$("form#form").submit(function(e){

	e.preventDefault();

	var formId=$(this).attr('id');
	var formAction=$(this).attr('action');
	var form_data = new FormData(this);

	if(formAction.includes("otp-submit")){
		var mobile = $("#mobile").val();
		form_data.append('mobile', mobile);
	}
	
	$.ajax({
		url: formAction,
		data: form_data,
		dataType:'json',
		type: 'post',
		beforeSend: function(){
			$('#preloader').css('display','block');
		},
		error:function(xhr,textStatus){
			
			if(xhr && xhr.responseJSON.message){
				showMsg('error', xhr.status + ': ' + xhr.responseJSON.message);

			}else{
				showMsg('error', xhr.status + ': ' + xhr.statusText);

			}
			
			$('#preloader').css('display','none');
		},
		success: function(data){
			if(data.error){
				showMsg('error', data.message);

			}else{
				
				if(data.reset){
					$('#'+formId)[0].reset();
				}
				if(data.message){
					showMsg('success', data.message);
				}

				if(data.registration){
					window.location.href = "/login";
				}
				if(data.login){
					if(data.user_type == '1'){
						window.location.href = "student-profile";
					}
					if(data.user_type == '2'){
						window.location.href = "tutor-profile";
					}
					if(data.user_type == '3'){
						window.location.href = "institute-profile";
					}
				}
				if(data.otp){
					$("#form-section").addClass("d-none");
					$("#otp-section").removeClass("d-none");

					$('#otpmsg').html('OTP sent on mobile number <strong>'+data.mobile+'</strong>');
					$('#first').focus();

					$('.otp_resend').css('display', 'none');
					$('#timer_left').css('display', 'inline-block');

					var resendOtpTime = 30;
					interval = setInterval(() => {
						if (resendOtpTime > 0) {
							resendOtpTime--;
							$('#timer_left').html("00:" + ("0" +
								resendOtpTime).slice(-2));
						} else {
							$('#timer_left').css('display', 'none');
							$('.otp_resend').css('display', 'inline-block');
							clearInterval(interval);
						}
					}, 1000);

				}
				if(data.otpvarified){
					$(".form-submit").trigger("submit");
				}
				if(data.formsubmit){
					$('.otp-form')[0].reset();
					$("#otp-section").addClass("d-none");
					$("#form-section").removeClass("d-none");
				}
			}
			window.scrollTo({top: 0, behavior: 'smooth'});
			$('#preloader').css('display','none');
		},
		cache:false,
		contentType:false,
		processData:false,
		timeout: 5000
	});

});

$("#otp-again").click(function(){
	$(".form-submit").trigger("submit");
})

function sweetAlertMsg(type,msg){
	if(type=='success'){
		swal({
		  title:'Success !',
		  text: msg,
		  icon: "success",
		  button: "OK", 
		  confirmButtonColor: 'red',
		  closeOnClickOutside:false
		});
	}else{
		swal({
		  title: "Error!",
		  text: msg,
		  icon: "error",
		  button: "Ok",
		  dangerMode: true,
		  closeOnClickOutside:false
		});
	}
}

function showMsg(type, msg) {
	if (type == 'error') {
		$('.toast-body').html('<i class="fa fa-times-circle red" style="color:red"></i> ' + msg);
	} else if (type == 'success') {
		$('.toast-body').html('<i class="fa fa-check-circle green" style="color:green"></i> ' + msg);
	} else {
		$('.toast-body').html('<i class="fa fa-exclamation-circle warning" style="color:#d0b718"></i> ' + msg);
	}

	$(".toast").toast({
		delay: 5000
	});
	$('.toast').toast('show');
}

$('.toast').mouseleave(function() {
	$('.toast').toast('hide');
});

function OTPInput() {
    const inputs = document.querySelectorAll('.otpContainer > *[id]');
    for (let i = 0; i < inputs.length; i++) {
        inputs[i].addEventListener('keydown', function(event) {
        if (event.key === "Backspace") {
            inputs[i].value = '';
            if (i !== 0)
            inputs[i - 1].focus();
        } else {
            if (i === inputs.length - 1 && inputs[i].value !== '') {
            return true;
            } else if (event.keyCode > 47 && event.keyCode < 58) {
            inputs[i].value = event.key;
            if (i !== inputs.length - 1)
                inputs[i + 1].focus();
            event.preventDefault();
            } else if (event.keyCode > 64 && event.keyCode < 91) {
            if (i !== inputs.length - 1)
                inputs[i].focus();
            event.preventDefault();
            }
        }
        });
    }
}
OTPInput();


$(function (){
	    $("input[type='file']").change(function () { 
	        	var uploadType=$(this).data('type'); 
	           	var dvPreview = $("#"+$(this).data('image-preview'));
	
	            if (typeof (FileReader) != "undefined") {
	                var regex = /^([a-zA-Z0-9\s_\\.\-:])+(.jpg|.jpeg|.gif|.png|.bmp|.xlsx)$/;  
	                $($(this)[0].files).each(function (){
	                    var file = $(this);
	                    if (regex.test(file[0].name.toLowerCase())) {
	                        var reader = new FileReader();
	                        reader.onload = function (e) {
		        
	                            var img = $("<img />");
	                            img.attr("style", "width: 100px;margin-right: 13px");
	                            img.attr("src", e.target.result);

	                            if(uploadType=='multiple'){
	                                dvPreview.append(img);
	                            }else{
	                                dvPreview.html(img);
	                            } 
	                        }
	                        reader.readAsDataURL(file[0]);
	                    } else {
	                        alert(file[0].name + " is not a valid image file.");
	                        dvPreview.html(file[0].name);
	                        return false;
	                    }
	                });
	            } else {
	                alert("This browser does not support HTML5 FileReader.");
	            }
	        });
	    });