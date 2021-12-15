
$("form#form").submit(function(e){

	e.preventDefault();

	var formId=$(this).attr('id');
	var formAction=$(this).attr('action');
	var form_data = new FormData(this);
	
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
				showMsg('success', data.message);

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

		                    	if(dvPreview == '#profileimage'){
									var img = $("<img />");
		                            img.attr("style", "width: 100px; height: 100px; border-radius:50%; object-fit: cover;");
		                            img.attr("src", e.target.result);
								}else{
		                            var img = $("<img />");
		                            img.attr("style", "width: 100px;margin-right: 13px");
		                            img.attr("src", e.target.result);
							 	}
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