<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0">
    <link rel="shortcut icon" type="image/x-icon" href="{{asset('assets/img/logo/favicon.ico')}}">
    <title>BBSMS :: Become a new blood bank!</title>
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
<div class="main-wrapper  account-wrapper">
    <div class="account-page">
        <div class="account-center">
            <div class="account-box">
                <form action="{{route('bloodBank.save')}}" method="post" class="form-signin">
                    @csrf
                    <div class="account-logo">
                        <a href="{{url('/')}}"><img src="{{asset('assets/img/logo/logo.png')}}" alt=""></a>
                    </div>
                    <div class="form-group">
                        <label>Full Name</label>
                        <input  required name="name" type="text" class="form-control">
                        @error('name')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label>Hospital/Blood bank Approval No</label>
                        <input  required name="hospital_approval_number" type="text" class="form-control">
                        @error('hospital_approval_number')
                        <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label>Address</label>
                        <textarea required name="address" class="form-control" id="address"  rows="3"></textarea>
                        @error('address')
                        <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label>Latitude</label>
                        <input  required name="latitude" type="text" class="form-control">
                        @error('latitude')
                        <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label>Longitude</label>
                        <input  required name="longitude" type="text" class="form-control">
                        @error('longitude')
                        <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label>Email</label>
                        <input required name="email" type="email" class="form-control">
                        @error('email')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label>Password</label>
                        <input  required name="password" type="password" class="form-control">
                        @error('password')
                        <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label>Confirm Password</label>
                        <input  required name="password_confirmation" type="password" class="form-control">
                    </div>

                    <div class="form-group text-center">
                        <button class="btn btn-primary account-btn" type="submit">Signup</button>
                    </div>
                    <div class="text-center login-link">
                        Already have an account? <a href="{{route('bloodBank.login')}}">Login</a>
                    </div>
                </form>
            </div>
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
