<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0">
    <link rel="shortcut icon" type="image/x-icon" href="{{asset('assets/img/logo/favicon.ico')}}">
    <title>BBSMS :: Become a new !</title>
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="{{asset('assets/css/bootstrap.min.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('assets/css/font-awesome.min.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('assets/css/style.css')}}">
    <!--[if lt IE 9]>
    <script src="{{asset('assets/js/html5shiv.min.js')}}"></script>
    <script src="{{asset('assets/js/respond.min.js')}}"></script>
    <![endif]-->
</head>
<body>
<div class="container">

    <div class="row">
        @include('layouts.voluntaryOrganization._messages')
        <div class="col-lg-8 offset-2">
            <form action="{{route('voluntaryOrganization.save')}}" method="post" class="form-signin" enctype="multipart/form-data">
                @csrf
                <div class="card mb-5">
                <div class="account-logo card-header bg-success">
                    <a href="{{url('/')}}"><img src="{{asset('assets/img/logo/logo.png')}}" alt=""></a>
                </div>
                    <div class="card-body">
                <div class="form-group">
                    <label>Group Type</label>
                    <input  required name="group_type" type="text" class="form-control">
                    @error('group_type')
                    <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>
                <div class="form-group">
                    <label>Group Name</label>
                    <input  required name="group_name" type="text" class="form-control">
                    @error('group_name')
                    <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>
                <div class="form-group">
                    <label>Group Contact</label>
                    <input  required name="group_contact" type="text" class="form-control">
                    @error('group_contact')
                    <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>
                <div class="form-group">
                    <label>Group Admin</label>
                    <input  required name="admin_contact" type="text" class="form-control">
                    @error('admin_contact')
                    <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>
                <div class="form-group">
                    <label>District</label>
                    <input  required name="district" type="text" class="form-control">
                    @error('district')
                    <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>
                <div class="form-group">
                    <label>Address</label>
                    <textarea name="address" class="form-control"></textarea>
                    @error('address')
                    <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>
                <div class="form-group">
                    <label >Logo Image</label>
                    <input type="file" class="form-control-file" name="logo">
                    @error('logo')
                    <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>
                <div class="form-group">
                    <label>Website Address</label>
                    <input name="website_address" class="form-control">
                </div>
                <div class="form-group">
                    <label>User Name</label>
                    <input name="username" class="form-control">
                    @error('username')
                    <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>
                <div class="form-group">
                    <label>Email</label>
                    <input name="email" class="form-control">
                    @error('email')
                    <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>
                <div class="form-group">
                    <label>Password</label>
                    <input type="password" name="password" class="form-control">
                    @error('password')
                    <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>
                <div class="form-group">
                    <label>Confirm Password</label>
                    <input  required name="password_confirmation" type="password" class="form-control">
                </div>
                <div class="form-group ">
                    <button class="btn btn-primary btn-block" type="submit">Signup</button>
                </div>
                {{--                    <div class="text-center login-link">--}}
                {{--                        Already have an account? <a href="{{route('voluntaryOrganization.login')}}">Login</a>--}}
                {{--                    </div>--}}
                </div>
                </div>
            </form>
        </div>
    </div>
</div>
<script src="{{asset('assets/js/jquery-3.2.1.min.js')}}"></script>
<script src="{{asset('assets/js/popper.min.js')}}"></script>
<script src="{{asset('assets/js/bootstrap.min.js')}}"></script>
<script src="{{asset('assets/js/jquery.slimscroll.js')}}"></script>
<script src="{{asset('assets/js/app.js')}}"></script>
</body>


<!-- register24:03-->
</html>
