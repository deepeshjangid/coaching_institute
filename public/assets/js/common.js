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
				sweetAlertMsg('error', xhr.status + ': ' + xhr.responseJSON.message);
			}else{
				sweetAlertMsg('error', xhr.status + ': ' + xhr.statusText);
			}
			
			$('#preloader').css('display','none');
		},
		success: function(data){
			if(data.error){
				sweetAlertMsg('error',data.message);
			}else{
				
				if(data.reset){
					$('#'+formId)[0].reset();
				}
				// $('button[type="submit"]').prop('disabled', true);
				sweetAlertMsg('success',data.message);
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