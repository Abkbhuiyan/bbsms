<!DOCTYPE html>
<html lang="en">
<head>
    @include('layouts.voluntaryOrganization._head')
</head>

<body>
<div class="main-wrapper">
    <div class="header">
        @include('layouts.voluntaryOrganization._header')
    </div>
    <div class="sidebar" id="sidebar">
        @include('layouts.voluntaryOrganization._sidebar')
    </div>
    <div class="page-wrapper">
        <div class="content">
            @include('layouts.voluntaryOrganization._messages')
           @yield('content')
        </div>

    </div>
</div>
<div class="sidebar-overlay" data-reff=""></div>
@include('layouts.voluntaryOrganization._scripts')

</body>



</html>
