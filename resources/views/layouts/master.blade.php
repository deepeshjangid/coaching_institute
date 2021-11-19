<!DOCTYPE html>
<html lang="en">

<!-- Mirrored from thememinister.com/crm/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Sun, 02 Jun 2019 11:06:57 GMT -->

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>@yield('title')</title>
    <!-- Favicon and touch icons -->
    <link rel="shortcut icon" href="assets/dist/img/ico/favicon.png')}}" type="image/x-icon">
    <!-- Start Global Mandatory Style
         =====================================================================-->
    <!-- jquery-ui css -->
    <link href="{{ asset('admin-assets/plugins/jquery-ui-1.12.1/jquery-ui.min.css')}}" rel="stylesheet"
        type="text/css" />
    <!-- Bootstrap -->
    <link href="{{ asset('admin-assets/css/bootstrap.min.css')}}" rel="stylesheet" type="text/css" />
    <!-- Lobipanel css -->
    <link href="{{ asset('admin-assets/plugins/lobipanel/lobipanel.min.css')}}" rel="stylesheet" type="text/css" />
    <!-- Pace css -->
    <link href="{{ asset('admin-assets/plugins/pace/flash.css')}}" rel="stylesheet" type="text/css" />
    <!-- Font Awesome -->
    <link href="{{ asset('admin-assets/font-awesome/css/font-awesome.min.css')}}" rel="stylesheet" type="text/css" />

    <!-- Pe-icon -->
    <link href="{{ asset('admin-assets/pe-icon-7-stroke/css/pe-icon-7-stroke.css')}}" rel="stylesheet"
        type="text/css" />
    <!-- Themify icons -->
    <link href="{{ asset('admin-assets/themify-icons/themify-icons.css')}}" rel="stylesheet" type="text/css" />
    <!-- End Global Mandatory Style
      Emojionearea -->
    <link href="{{ asset('admin-assets/plugins/emojionearea/emojionearea.min.css')}}" rel="stylesheet"
        type="text/css" />
    <!-- End page Label Plugins -->

    <!--Summernote css-->
    <link href="{{ asset('admin-assets/plugins/summernote/summernote.css')}}" rel="stylesheet" type="text/css" />
    <!-- Theme style -->
    <link href="{{ asset('admin-assets/dist/css/stylecrm.css')}}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('admin-assets/dist/css/inputtag.css')}}" rel="stylesheet" type="text/css" />
    <!-- Theme style rtl -->
    <link href="{{ asset('admin-assets/dist/css/fSelect.css')}}" rel="stylesheet" type="text/css" /> 
	<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.24/css/jquery.dataTables.min.css">
	<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/buttons/1.7.0/css/buttons.dataTables.min.css">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/css/toastr.min.css">
	<style>
		.toast-top-right {
		   top: 70px !important;
	   }
	</style>
    <link rel="preconnect" href="https://fonts.gstatic.com">
	<link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;500;700;900&display=swap" rel="stylesheet">
    <link href="{{ asset('admin-assets/plugins/bootstrap-toggle/bootstrap-toggle.min.css') }}" rel="stylesheet"  type="text/css" />
	
	
</head>

<body class="hold-transition sidebar-mini">

	<div id="preloader" style="display: none;">
	  <div class="loader_spinner_inside"></div>
	  <span class="loader_spinner_text">Please Wait...</span>
	</div>
		
    <!-- Site wrapper -->
    <div class="wrapper">

        <header class="main-header">
            <a href="{{url('admin/dashboard')}}" class="logo" style="background: black;">
                <!-- Logo -->
                <!-- <span class="logo-mini">
                    <img src="{{ asset('admin-assets/Aakrashanlogo.png')}}" alt="">
                </span>
                <span class="logo-lg">
                    <img src="{{ asset('admin-assets/Aakrashanlogo.png')}}" alt="">
                </span> -->
                <h3 class="text-left text-white">Coaching</h3>
            </a>

            <!-- Header Navbar -->
            <nav class="navbar navbar-static-top">
                <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
                    <!-- Sidebar toggle button-->
                    <span class="sr-only">Toggle navigation</span>
                    <span class="pe-7s-angle-left-circle"></span>
                </a>
                <!-- searchbar-->

                <div class="navbar-custom-menu">
                    <ul class="nav navbar-nav">
                        
                        <!-- user -->
                        <li class="dropdown dropdown-user">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                <img src="{{ asset('admin-assets/dist/img/avatar5.png')}}" class="img-circle" width="45"
                                    height="45" alt="user"></a>
                            <ul class="dropdown-menu">
                                <li>
                                    <a href="{{ url('admin/change-password')}}">
                                        <i class="fa fa-user"></i> Change Password</a>
                                </li>
                                <li><a href="{{ url('admin/logout')}}">
                                        <i class="fa fa-sign-out"></i> Signout</a>
                                </li>
                            </ul>
                        </li>
                    </ul>
                     @if(Session::has('error'))
                    <div class="alert">
                    </div>
                    @elseif(Session::has('success'))
                    <div class="alert">
                    </div>
                    @endif
                </div>
            </nav>
        </header>

        <!-- =============================================== -->
        <!-- Left side column. contains the sidebar -->
        <aside class="main-sidebar">
            <!-- sidebar -->
            <div class="sidebar">
                <!-- sidebar menu -->
                <ul class="sidebar-menu">
                    <li class="@yield('dashboard')">
                        <a href="{{ url('admin/dashboard')}}"><i class="fa fa-tachometer"></i><span>Dashboard</span>
                            <span class="pull-right-container">
                            </span>
                        </a>
                    </li>
					<li class="treeview @yield('User')">
                        <a href="#">
                            <i class="fa fa-users"></i><span>Users</span>
                            <span class="pull-right-container">
                                <i class="fa fa-angle-left pull-right"></i>
                            </span>
                        </a>
                        <ul class="treeview-menu">
                            <li class="@yield('Users')"><a href="{{ route('admin.users') }}">All</a></li>
                            <li class="@yield('Students')"><a href="{{ route('admin.students') }}">Students</a></li>
                            <li class="@yield('Tutors')"><a href="{{ route('admin.tutors') }}">Tutors</a></li>
                            <li class="@yield('Institutes')"><a href="{{ route('admin.institutes') }}">Institutes</a></li>
                        </ul>
                    </li>
                    <li class="treeview @yield('Form')">
                        <a href="#">
                        <i class="fa fa-wpforms" aria-hidden="true"></i><span>Forms</span>
                            <span class="pull-right-container">
                                <i class="fa fa-angle-left pull-right"></i>
                            </span>
                        </a>
                        <ul class="treeview-menu">
                            <li class="@yield('Student Forms')"><a href="{{ route('admin.student.forms') }}">Students</a></li>
                            <li class="@yield('Tutor Forms')"><a href="{{ route('admin.tutor.forms') }}">Tutors</a></li>
                            <li class="@yield('Institute Forms')"><a href="{{ route('admin.institute.forms') }}">Institutes</a></li>
                        </ul>
                    </li>
                    <li class="treeview @yield('Testimonial')">
                        <a href="#">
                            <i class="fa fa-star"></i><span>Testimonials</span>
                            <span class="pull-right-container">
                                <i class="fa fa-angle-left pull-right"></i>
                            </span>
                        </a>
                        <ul class="treeview-menu">
                            <li class="@yield('AddTestimonial')"><a href="{{ route('admin.testimonial.add') }}">Add Testimonial</a></li>
                            <li class="@yield('Testimonials')"><a href="{{ route('admin.testimonial.list') }}">Testimonials List</a></li>
                        </ul>
                    </li>
                    <li class="treeview @yield('SubscriptionPlan')">
                        <a href="#">
                        <i class="fa fa-rocket" aria-hidden="true"></i><span>Subscription Plans</span>
                            <span class="pull-right-container">
                                <i class="fa fa-angle-left pull-right"></i>
                            </span>
                        </a>
                        <ul class="treeview-menu">
                            <li class="@yield('AddSubscriptionPlan')"><a href="{{ route('admin.subscriptionplan.add') }}">Add Subscription Plan</a></li>
                            <li class="@yield('StudentSubscriptionPlans')"><a href="{{ url('admin/subscription-plan/list/1') }}">Student Subscription Plans</a></li>
                            <li class="@yield('TutorSubscriptionPlans')"><a href="{{ url('admin/subscription-plan/list/2') }}">Tutor Subscription Plans</a></li>
                            <li class="@yield('InstituteSubscriptionPlans')"><a href="{{ url('admin/subscription-plan/list/3') }}">Institute Subscription Plans</a></li>
                            <li class="@yield('PurchagePlans')"><a href="{{ url('admin/subscription-plan/purchage-plans') }}">Purchage Plans</a></li>
                        </ul>
                    </li>
                </ul>
            </div>
            <!-- /.sidebar -->
        </aside>

		@yield('content')
 

	<script src="{{asset('admin-assets/plugins/jQuery/jquery-1.12.4.min.js')}}" type="text/javascript"></script>
	<!-- jquery-ui --> 
	<script src="{{asset('admin-assets/plugins/jquery-ui-1.12.1/jquery-ui.min.js')}}" type="text/javascript"></script>
	<!-- Bootstrap -->
	<script src="{{asset('admin-assets/js/bootstrap.min.js')}}" type="text/javascript"></script>
	<!-- lobipanel -->
	<script src="{{asset('admin-assets/plugins/lobipanel/lobipanel.min.js')}}" type="text/javascript"></script>
	<!-- Pace js -->
	<script src="{{asset('admin-assets/plugins/pace/pace.min.js')}}" type="text/javascript"></script>
	<!-- SlimScroll -->
	<script src="{{asset('admin-assets/plugins/slimScroll/jquery.slimscroll.min.js')}}" type="text/javascript">    </script>
	<!-- FastClick -->
	<script src="{{asset('admin-assets/plugins/fastclick/fastclick.min.js')}}" type="text/javascript"></script>
	<!-- CRMadmin frame -->
	<script src="{{asset('admin-assets/dist/js/custom.js')}}" type="text/javascript"></script>
	<script src="{{asset('admin-assets/dist/js/inputtag.js')}}" type="text/javascript"></script>
	<script src="{{asset('admin-assets/dist/js/fSelect.js')}}" type="text/javascript"></script>

	<script src="{{asset('admin-assets/plugins/summernote/summernote.js')}}" type="text/javascript"></script>

	<script src="{{asset('admin-assets/plugins/counterup/waypoints.js')}}" type="text/javascript"></script>
	<script src="{{asset('admin-assets/plugins/counterup/jquery.counterup.min.js')}}" type="text/javascript"></script>
	<!-- DataTables  & Plugins -->
	
	<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/4.17.37/js/bootstrap-datetimepicker.min.js"></script>
	<script src="{{ asset('admin-assets/plugins/bootstrap-toggle/bootstrap-toggle.min.js')}}" type="text/javascript"></script>

    <script src="{{asset('admin-assets/plugins/sweetalert/sweetalert.min.js')}}" type="text/javascript"></script>

    <script type="text/javascript" src="https://cdn.datatables.net/1.10.25/js/jquery.dataTables.min.js"></script>
	<script type="text/javascript" language="javascript" src="{{ asset('admin-assets/js/common.js') }}"></script>
   
	
	<script>
        $('#summernote').summernote({
            placeholder: '',
            tabsize: 1,
            height: 200
        });
		$(document).ready(function(){
			@if(Session::has('error'))
				sweetAlertMsg('error',"{{ Session::get('error') }}");
			@elseif(Session::has('success'))
				sweetAlertMsg('success',"{{ Session::get('success') }}");
			@endif
		});
    </script>
	<script>
    $('.toggle-class').change(function() {
        var formAction=$(this).attr('action');
        toastr.options = {
            "closeButton": true,
            "newestOnTop": true,
            "positionClass": "toast-top-right"
        };
        var status = $(this).prop('checked') == true ? 1 : 0;
        var id = $(this).data('id');


        $.ajax({
            type: "Post",
            dataType: "json",
            url: '/admin/'+formAction,
            headers: {
					'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
				},
            data: {
                'status': status,
                'id': id
            },
            success: function(data) {
                toastr.success(data.success);
            }
        });
    })
    </script>

    @stack('custom_js')
    
 
</body>
</html>


  