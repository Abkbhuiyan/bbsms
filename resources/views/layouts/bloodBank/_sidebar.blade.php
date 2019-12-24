<div class="sidebar-inner slimscroll">
    <div id="sidebar-menu" class="sidebar-menu">
        <ul>
            <li class="menu-title">Admin Panel</li>
            <li class="active">
                <a href="{{route('bloodBank.dashboard')}}"><i class="fa fa-dashboard"></i> <span>Dashboard</span></a>
            </li>
            <li>
                <a href="departments.html"><i class="fa fa-hospital-o"></i> <span>Departments</span></a>
            </li>
            <li class="submenu">
                <a href="#"><i class="fa fa-user-circle-o"></i> <span> Admins </span> <span class="menu-arrow"></span></a>
                <ul style="display: none;">
                    <li><a href="{{route('user.index')}}">Admin List</a></li>
                    <li><a href="{{ route('user.create') }}">Add New Admin</a></li>
                </ul>
            </li>

        </ul>
    </div>
</div>
