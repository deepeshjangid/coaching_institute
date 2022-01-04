<!DOCTYPE html>
<html lang="en">
<head>
   <title> {{ config('app.name', 'Laravel') }} </title>
    <meta charset="utf-8">
	<!-- <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=0"> -->
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta name="theme-color" content="#"/>
	<!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
	<link rel="shortcut icon" type="images/x-icon" href="{{ asset('assets/images/favicon.png') }}" />
	<link rel="stylesheet" type="text/css" href="{{ asset('assets/css/font-awesome.css') }}">
	<link rel="stylesheet" type="text/css" href="{{ asset('assets/css/carousel.css') }}">
	<link rel="stylesheet" type="text/css" href="{{ asset('assets/css/bootstrap.min.css') }}">	
	<link rel="stylesheet" type="text/css" href="{{ asset('assets/css/style.css') }}">	
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/carousel.css') }}">
	<link href="https://fonts.googleapis.com/css2?family=Open+Sans&display=swap" rel="stylesheet">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/simple-line-icons/2.5.5/css/simple-line-icons.min.css" integrity="sha512-QKC1UZ/ZHNgFzVKSAhV5v5j73eeL9EEN289eKAEFaAjgAiobVAnVv/AGuPbXsKl1dNoel3kNr6PYnSiTzVVBCw==" crossorigin="anonymous" referrerpolicy="no-referrer" />

	<link rel="stylesheet" href="//code.jquery.com/ui/1.13.0/themes/base/jquery-ui.css">
	<link rel="stylesheet" href="/resources/demos/style.css">
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/boxicons@latest/css/boxicons.min.css">
	<link href="{{ asset('assets/plugins/fSelect/fSelect.css')}}" rel="stylesheet" type="text/css" /> 


</head>
<body>
	  <!--- Header Area Section--->
		   <div class="container-fluid p-0" id="manu-bg">
				 <div class="container containers">
				   <div class="row">
					<nav class="navbar navbar-expand-md navigation-bar top-fixed myheader">
					 <div class="col-xl-2 col-md-2 col-sm-12 col-12 d-flex">
						 <a class="navbar-brand my-logos" href="{{ route('index') }}">
						  <!-- <span style="font-weight:bold;font-size:26px;">LOGO</span> -->
						 <img src="{{ asset('assets/images/logo.jpeg') }}" class="img-fluid rounded-circle" alt="logo"></a>
						 @if(!Session::get('user_login'))
						  <ul class="mobile-call mobile-user">
								<li class="nav-item"><a class="nav-link" href="{{ route('login') }}">
									<button type="button" class="site-button onlineCbseBtn"><i class="fa fa-sign-in" aria-hidden="true"></i> login</button> </a>
								</li>
								<li class="nav-item"><a class="nav-link" href="{{ route('register') }}">
									<button type="button" class="site-button onlineCbseBtn Zokelijk-btn"><i class="fa fa-user-plus" aria-hidden="true"></i> Sign up</button> </a>
								</li>
					      </ul>
						  @else
						  <ul class="mobile-call mobile-user">
								<li class="nav-item"><a class="nav-link" href="@if(Session::get('user_type')=='1'){{ route('student.profile') }}
										@elseif(Session::get('user_type')=='2'){{ route('tutor.profile') }}
										@elseif(Session::get('user_type')=='3'){{ route('institute.profile') }}
										@endif">
									<button type="button" class="site-button onlineCbseBtn">Profile</button> </a>
								</li>
								<li class="nav-item"><a class="nav-link" href="{{ route('logout') }}">
									<button type="button" class="site-button onlineCbseBtn Zokelijk-btn">Logout</button> </a>
								</li>
					      </ul>
						  @endif
						 
						 	<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapsibleNavbar">
								<span> <i class="fa fa-bars" aria-hidden="true"></i> </span>
							  </button>	
							  
					 </div>
					 
					  <div class="col-xl-7 col-md-7 col-sm-7 col-12">
							   <div class="collapse navbar-collapse" id="collapsibleNavbar">
								 <ul class="navbar-nav ml-auto manubar">
								   <li class="nav-item active"><a class="nav-link " href="{{ route('index') }}">Home</a></li>
								   <li class="nav-item"><a class="nav-link" href="{{ route('about') }}">About</a></li>
								   <li class="nav-item"><a class="nav-link" href="{{ route('subscription.plan') }}">Subscription Plan</a></li>
								   <li class="nav-item"><a class="nav-link" href="{{ route('contact') }}">Contact Us</a></li>
								</ul>
								
							  </div> 
						  </div>
						  <!-- Login and User profile -->
							<div class="col-xl-3 col-lg-3 col-md-3 login-left">
							 
								<ul class="user-profile-btn login-boxsss" style="">
									@if(Session::get('user_login'))
									<li class="nav-item dropdown">
										<a id="navbardrop"><i class="icon-user"></i>
										<p><span>Hi, {{ Session::get('user_name') }}</span></p></a>
										<div class="dropdown-menu user-profile-list">
											<ul>
												<li><a class="login" href="@if(Session::get('user_type')=='1'){{ route('student.profile') }}
										@elseif(Session::get('user_type')=='2'){{ route('tutor.profile') }}
										@elseif(Session::get('user_type')=='3'){{ route('institute.profile') }}
										@endif"><i class="icon-user-following"></i> Profile</a></li>
												<li><a class="login" href="{{ route('logout') }}"><i class="icon-power"></i> Logout</a></li>
											</ul>
										</div>
									</li>
									@else
									<li class="nav-item dropdown">
										<a href="{{ route('login') }}" id="navbardrop"><i class="fa fa-sign-in" aria-hidden="true"></i>
										<p><span>Login</span></p></a>
									</li>
									<li class="nav-item dropdown">
										<a href="{{ route('register') }}" id="navbardrop" style="background:#09618C"><i class="fa fa-user-plus" aria-hidden="true"></i>
										<p><span>Sign up</span></p></a>
									</li>
									@endif
								</ul>
                           </div>
				         </div>
				      </div>
			     </nav>
			 </div>  
			 </div>  


             @yield('content')

			 <div class="toast" data-autohide="true" style="padding:20px;border-radius: 10px;">
        <div class="toast-body">

        </div>
    </div>
    <div id="preloader" style="display: none;">
        <div class="loader_spinner_inside"></div>
        <span class="loader_spinner_text">Please Wait...</span>
    </div>

             	<!--Arrow -->
			<div class="scroll-to-top scroll-to-target">
			  <span class="fa fa-arrow-circle-up"></span>
			</div>
			
			
	<!--Main Footer Section -->
		<footer class="main-footer">
			<div class="pattern-layer paroller"style="background-image:url({{ asset('assets/images/icon-1.png')}})"></div>
			<div class="pattern-layer-two" style="background-image:url({{ asset('assets/images/icon-3.png')}})"></div>
			 <div class="container">
				<div class="widgets-section">
					<div class="row">
						<div class="big-column col-lg-6 col-md-12 col-sm-12">
							<div class="row">
								<div class="footer-column col-lg-7 col-md-6 col-sm-12">
									<div class="footer-widget logo-widget">
										<div class="logo">
											<a href="{{ route('index') }}">
											<img src="{{ asset('assets/images/logo.jpeg') }}" class="img-fluid rounded-circle" width="100px" height="100px" alt="logo"></a>
												
											</a>

										</div>
										<div class="text"> Replenish him third creature and meat blessed void a fruit gathered you’re, they’re two waters own morning gathered greater. Using Indianhometutor.com.</div>
										<div class="social-box">
											<a href="@if($contact) {{ $contact->facebook }} @endif" target="_blank" class="fa fa-facebook"></a>
											<a href="@if($contact) {{ $contact->instagram }} @endif" target="_blank" class="fa fa-instagram"></a>
											<a href="@if($contact) {{ $contact->twitter }} @endif" target="_blank" class="fa fa-twitter"></a>
											<a href="@if($contact) {{ $contact->github }} @endif" target="_blank" class="fa fa-github"></a>
										</div>
									</div>
								</div>
								
								<!--Footer Column-->
								<div class="footer-column col-lg-5 col-md-6 col-sm-12">
									<div class="footer-widget links-widget">
										<h4>About Us</h4>
										<ul class="links-widget">
											<li><a href="{{ route('about') }}">About Us</a></li>
											<li><a href="{{ route('contact') }}">Contact Us</a></li>
											<li><a href="{{ route('privacy-policy') }}">Privacy Policy</a></li>
											<li><a href="{{ route('terms-of-use') }}">Terms Of Use</a></li>
											<li><a href="{{ route('refund') }}">Refund and Cancellation Policy</a></li>
										</ul>
									</div>
								</div>
							</div>
						</div>
						
					
						<div class="big-column col-lg-6 col-md-12 col-sm-12">
							<div class="row">
								<div class="footer-column col-lg-6 col-md-6 col-sm-12">
									<div class="footer-widget links-widget">
										<h4>Quick Links</h4>
										<ul class="links-widget">
											<li><a href="{{ route('login') }}">Login/Register</a></li>
											<li><a href="{{ route('student.form') }}">Student Form</a></li>
											<li><a href="{{ route('tutor.form') }}">Tutor Form</a></li>
											<li><a href="{{ route('institute.form') }}">Institute Form</a></li>
											<li><a href="{{ route('subscription.plan') }}">Subscription Plan</a></li>
										</ul>
									</div>
								</div>
								
						
								<div class="footer-column col-lg-6 col-md-6 col-sm-12">
									<div class="footer-widget links-widget">
										<h4>Contact Us </h4>
										 <div class="sigle-address">
											<div class="address-icon1">
												<i class="fa fa-home"></i>
											</div>
											<p><a href="https://maps.google.com/?q=@if($contact) {{ $contact->address }} @endif" target="_blank">@if($contact) {{ $contact->address }} @endif</a></p>
										</div>
										<div class="sigle-address">
											<div class="address-icon1">
												<i class="fa fa-envelope-o"></i>
											</div>
											<p><a href="mailto:@if($contact) {{ $contact->email }} @endif">@if($contact) {{ $contact->email }} @endif</a></p>
										</div>
										<div class="sigle-address">
											<div class="address-icon1">
												<i class="fa fa-phone"></i>
											</div>
											<p><a href="tel: @if($contact) {{ $contact->mobile }} @endif">@if($contact) {{ $contact->mobile }} @endif</a></p>
										</div>
									</div>
								</div>
							
							</div>
						</div>
					</div>
				</div>
			</div>
		</footer>
		
	

<script src="{{ asset('assets/js/jquery.min.js') }}"></script>
<script src="{{ asset('assets/js/popper.min.js.js') }}"></script>
<script src="{{ asset('assets/js/bootstrap.min.js') }}"></script>
<script src="{{ asset('assets/js/owl.carousel.min.js') }}"></script>
<script src="{{ asset('assets/js/slider-one.js') }}"></script>
<!-- <script src="{{asset('assets/js/jquery-1.12.4.min.js')}}" type="text/javascript"></script> -->

<script src="{{asset('assets/js/sweetalert.min.js')}}" type="text/javascript"></script>

<script type="text/javascript" language="javascript" src="{{ asset('assets/js/common.js') }}"></script>

<script src="https://code.jquery.com/ui/1.13.0/jquery-ui.js"></script>

<script src="{{asset('assets/plugins/fSelect/fSelect.js')}}" type="text/javascript"></script>


<script>

	$('.fselect').fSelect();

</script>
<script>
		$(document).ready(function(){

			@if(Session::has('error'))
				showMsg('error', "{{ Session::get('error') }}")
			@elseif(Session::has('success'))
				showMsg('success', "{{ Session::get('success') }}")
			@endif

		});
    </script>
 <script>
	 $(document).ready(function () {
		 $(window).scroll(function () {
			 if ($(this).scrollTop() > 300) {
				 $('.scroll-to-top').fadeIn();
			 } else {
				 $('.scroll-to-top').fadeOut();
			 }
		 });
		$('.scroll-to-top').click(function () {
			 $("html, body").animate({
				 scrollTop: 0
			 }, 2000);
			 return false;
		 });
	   });
  </script>
<script>

$('#category_id').on('change', function() {
	var level_one_id = this.value;

	$.ajax({
		url: "{{ url('get-sub-category')}}",
		type: "POST",
		data: {
		id: level_one_id
		},
		headers: {
		'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
		},
		cache: false,
		beforeSend: function(){
			$('#preloader').css('display','block');
		},
		error:function(xhr,textStatus){

		sweetAlertMsg('error',xhr.responseJSON.message);
		},
		success: function(result){
		    $("#sub_category_id").html(result);
			$('#preloader').css('display','none');
		}

	});

});

$('#sub_category_id').on('change', function() {

var level_one_id = $('#category_id').val();
var level_two_id = this.value;


$.ajax({
	url: "{{ url('get-course')}}",
	type: "POST",
	data: {
	cat_id: level_one_id, sub_id: level_two_id,
	},
	headers: {
	'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
	},
	cache: false,
	beforeSend: function(){
		$('#preloader').css('display','block');
	},
	error:function(xhr,textStatus){

	sweetAlertMsg('error',xhr.responseJSON.message);
	},
	success: function(result){
		$("#course_id").html(result);
		$('#preloader').css('display','none');
	}

});

});

$( function() {

	$( "#area-search-input" ).autocomplete({
		source: function( request, response ) {
          // Fetch data
          $.ajax({
            url:"{{ route('area-search') }}",
            type: 'post',
            dataType: "json",
            data: {
               search: request.term
            },
			headers: {
			'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
			},
            success: function( data ) {
               response( data );
            }
          });
        },
		minLength: 1,
		select: function (event, ui) {
			if (ui.item.value == 'no') {
				$('#area-search-input').val(null); // save selected id to input
			}else{
				$('#area-search-result').val(ui.item.label); // display the selected text
				$('#area-search-input').val(ui.item.value); // save selected id to input
			}
			return false;
		}
	});

	$( "#course-search-input" ).autocomplete({
		source: function( request, response ) {
          // Fetch data
          $.ajax({
            url:"{{ route('course-search') }}",
            type: 'post',
            dataType: "json",
            data: {
               search: request.term
            },
			headers: {
			'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
			},
            success: function( data ) {
               response( data );
            }
          });
        },
		minLength: 1,
		select: function (event, ui) {
			if (ui.item.value == 'no') {
				$('#course-search-input').val(null); // save selected id to input
			}else{
				$('#course-search-result').val(ui.item.label); // display the selected text
				$('#course-search-input').val(ui.item.value); // save selected id to input
			}
			return false;
		}
	});

});

/*=============== ACCORDION ===============*/
const accordionItems = document.querySelectorAll('.accordion__item')

// 1. Selecionar cada item
accordionItems.forEach((item) =>{
    const accordionHeader = item.querySelector('.accordion__header')

    // 2. Seleccionar cada click del header
    accordionHeader.addEventListener('click', () =>{
        // 7. Crear la variable
        const openItem = document.querySelector('.accordion-open')
        
        // 5. Llamar a la funcion toggle item
        toggleItem(item)

        // 8. Validar si existe la clase
        if(openItem && openItem!== item){
            toggleItem(openItem)
        }
    })
})

// 3. Crear una funcion tipo constante
const toggleItem = (item) =>{
    // 3.1 Crear la variable
    const accordionContent = item.querySelector('.accordion__content')

    // 6. Si existe otro elemento que contenga la clase accorion-open que remueva su clase
    if(item.classList.contains('accordion-open')){
        accordionContent.removeAttribute('style')
        item.classList.remove('accordion-open')
    }else{
        // 4. Agregar el height maximo del content
        accordionContent.style.height = accordionContent.scrollHeight + 'px'
        item.classList.add('accordion-open')
    }
}
</script>
</body>
</html>


	 