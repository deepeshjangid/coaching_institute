<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Admin Panel</title>
    <link rel="shortcut icon" href="{{ asset('admin-assets/dist/img/ico/favicon.png')}}" type="image/x-icon">
    <link href="{{ asset('admin-assets/css/bootstrap.min.css')}}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('admin-assets/pe-icon-7-stroke/css/pe-icon-7-stroke.css')}}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('admin-assets/dist/css/stylecrm.css')}}" rel="stylesheet" type="text/css" />

</head>

<body>
    @if(Session::has('error'))
    <div class="alert">
    </div>
    @elseif(Session::has('success'))
    <div class="alert">
    </div>
    @endif
    <!-- Content Wrapper -->
    <div class="login-wrapper">
        
        <div class="container-center">
            <div class="login-area">
                <div class="panel panel-bd panel-custom">
                    <div class="panel-heading">
                        <div class="view-header">
                            <div class="header-icon">
                                <i class="pe-7s-unlock"></i>
                            </div>
                            <div class="header-title">
                                <h3>Login</h3>
                                <small><strong>Please enter your credentials to login.</strong></small>
                            </div>
                        </div>
                    </div>
                    <div class="panel-body">
                        <form action="{{ route('admin')}}" id="" method="post">
                            @csrf
                            <div class="form-group">
                                <label class="control-label" for="username">Email address</label>
                                <input required type="email" name="email" class="form-control" id="exampleInputEmail1"
                                    placeholder="Enter email">
                            </div>
                            <div class="form-group">
                                <label class="control-label" for="password">Password</label>
                                <input type="password" title="Please enter your password" placeholder="******"
                                    required="" value="" name="password" id="password" class="form-control">
                                <span class="help-block small">Your strong password</span>
                            </div>
                            <div>
                                <button class="btn btn-add" type="submit">Login</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- /.content-wrapper -->
    <!-- jQuery -->
    <script src="{{ asset('admin-assets/plugins/jQuery/jquery-1.12.4.min.js')}}" type="text/javascript"></script>
    <!-- bootstrap js -->
    <script src="{{ asset('admin-assets/js/bootstrap.min.js')}}" type="text/javascript"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/css/toastr.min.css">
    <script>
    $(document).ready(function() {
    // show the alert
    window.setTimeout(function() {
        $(".alert").show(5, function() {
            toastr.options = {
                "closeButton": true,
                "newestOnTop": true,
                "positionClass": "toast-top-right"
            };
            @if(Session::has('error'))
                toastr.error("{{ Session::get('error') }}");
            @elseif(Session::has('success'))
                toastr.success("{{ Session::get('success') }}");
            @endif
        });
    }, 10);
});

    </script>
</body>

<!-- Mirrored from thememinister.com/crm/login.html by HTTrack Website Copier/3.x [XR&CO'2014], Sun, 02 Jun 2019 11:09:03 GMT -->

</html>