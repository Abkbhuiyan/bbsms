<!DOCTYPE html>
<html lang="en">
<head>
    @include('layouts.bloodBank._head')
</head>

<body>
<div class="main-wrapper">
    <div class="header">
        @include('layouts.bloodBank._header')
    </div>
    <div class="sidebar" id="sidebar">
        @include('layouts.bloodBank._sidebar')
    </div>
    <div class="page-wrapper">
        <div class="content">
            @include('layouts.bloodBank._messages')
           @yield('content')
        </div>

    </div>
</div>
<div class="sidebar-overlay" data-reff=""></div>
@include('layouts.bloodBank._scripts')

</body>



</html>
