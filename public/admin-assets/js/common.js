
(function($) {
	$(function() {
		$('.test').fSelect();
	});
})(jQuery);

$('#startDate').datepicker({ dateFormat: 'dd-mm-yy',
	changeYear: true,
	minDate: '-D'
});
$('#endDate').datepicker({ dateFormat: 'dd-mm-yy',
	changeYear: true,
	minDate: '-D'
});


//Summernote
function sumnote() {
	var note = $('.summernote');
		$(note).summernote({
		height: 200, // set editor height
		minHeight: null, // set minimum height of editor
		maxHeight: null, // set maximum height of editor
		focus: true  // set focus to editable area after initializing summernote
	});
}

sumnote();


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
					$('.previewimages').html('');
				}
				sweetAlertMsg('success',data.message);
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

$("form#eventform").submit(function(e){

	e.preventDefault();

	var formId=$(this).attr('id');
	var formAction=$(this).attr('action');
	var form_data = new FormData(this);

	var input_id = $('input[type=file]')[0]['id'];
	var files = $('#'+input_id)[0].files;

	if(files.length > 0){

		var image_id = [];
		$('.uploaded-image').each(function (index) {
			var id = $(this).attr('data-index');
			image_id.push(id);
		});

		var sort_file = [];
		for(i=0; i<image_id.length; i++){
			if(image_id[i] != i){
				var y = image_id[i];
				sort_file.push(files[y]);
			}else{
				sort_file.push(files[i]);
			}
		}
		
		for (i = 0; i < sort_file.length; i++) {
			form_data.append('file[]', sort_file[i]);
		}
		form_data.append('file_length', sort_file.length);
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
					$('.image-uploader').removeClass('has-files');
					$('.uploaded').html('');
				}
				sweetAlertMsg('success',data.message);
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


$(document).ready( function () {
    $('#example2').DataTable();
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
                            var img = $("<img />");
                            img.attr("style", "width: 100px;border:1px solid #222;margin-right: 13px");
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
                        return false;
                    }
                });
            } else {
                alert("This browser does not support HTML5 FileReader.");
            }
        });
    });

//search

$('.search').on('keyup',function(){
    $value=$(this).val();
	alert($value);
    $.ajax({
    type: 'POST',
    url:"{{ route('user.product.search') }}",
    datatype: "html",
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'), 
    },
	
    data: {search: $value},
    beforesend:function(){
        $('#preloader').css('display','block');
    },
    error:function(xhr,textStatus){
        sweetAlertMsg('error', xhr.status + ': ' + xhr.statusText);
        $('#preloader').css('display','none');
    },
    success: function(data){
        console.log(data);
        if(data){
            $('.search_body').html(data);
            $('.searchDisplay').show();
        }else{
            $('.search_body').html('');
            $('.searchDisplay').hide();
        }
    }
    });
});