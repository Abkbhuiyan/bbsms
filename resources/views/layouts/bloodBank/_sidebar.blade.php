<div class="sidebar-inner slimscroll">
    <div id="sidebar-menu" class="sidebar-menu">
        <ul>
            <li class="menu-title">{{ auth()->user()->name }}</li>
            <li class="active">
                <a href="{{route('bloodBank.dashboard')}}"><i class="fa fa-dashboard"></i> <span>Dashboard</span></a>
            </li>
            <li class="submenu">
                <a href="#"><i class="fa fa-user-md"></i> <span> Medical Officers </span> <span class="menu-arrow"></span></a>
                <ul style="display: none;">
                    <li><a href="{{route('bloodBank.active')}}">Current Medical Officers</a></li>
                    <li><a href="{{ route('bloodBank.mo.new') }}">Create New MO</a></li>
                    <li><a href="{{ route('bloodBank.inactive') }}">Inactive MOs</a></li>
                </ul>
            </li>

        </ul>
    </div>
</div>
