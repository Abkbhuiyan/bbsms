<!DOCTYPE html>
<html lang="en">
<head>
    @include('layouts.medicalOfficer._head')
</head>

<body>
<div class="main-wrapper">
    <div class="header">
        @include('layouts.medicalOfficer._header')
    </div>
    <div class="sidebar" id="sidebar">
        @include('layouts.medicalOfficer._sidebar')
    </div>
    <div class="page-wrapper">
        <div class="content">
            @include('layouts.medicalOfficer._messages')
           @yield('content')
        </div>

    </div>
</div>
<div class="sidebar-overlay" data-reff=""></div>
@include('layouts.medicalOfficer._scripts')

</body>



</html>
