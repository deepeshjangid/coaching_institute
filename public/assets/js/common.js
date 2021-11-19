// var form_original_data = JSON.stringify($("form#form").serializeArray()); 

// $('form#form').bind('keyup change', function(e){

// 	if (JSON.stringify($(this).serializeArray()) == form_original_data) {
// 		$('button[type="submit"]').prop('disabled', true);
// 	}else{
// 		$('button[type="submit"]').prop('disabled', false);
// 	}
// });

// $('button[type="reset"]').click('click', function(){
//     $('button[type="submit"]').prop('disabled', true);
// });

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
				// $('button[type="submit"]').prop('disabled', true);
				showMsg('success', data.message);

				if(data.registration){
					window.location.href = "/login";
				}
				if(data.login){
					window.location.href = "/";
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