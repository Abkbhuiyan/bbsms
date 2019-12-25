<div class="sidebar-inner slimscroll">
    <div id="sidebar-menu" class="sidebar-menu">
        <ul>
            <li class="menu-title">{{ auth()->user()->name }}</li>
            <li class="active">
                <a href="{{route('vOrg.dashboard')}}"><i class="fa fa-dashboard"></i> <span>Dashboard</span></a>
            </li>
            <li class="submenu">
                <a href="#"><i class="fa fa-user-md"></i> <span> Blood Donor </span> <span class="menu-arrow"></span></a>
                <ul style="display: none;">
                    <li><a href="{{route('vOrg.addVoluntary')}}">Add Donor</a></li>
                    <li><a href="{{route('vOrg.manageVoluntary')}}">Manage Donor</a></li>
                </ul>
            </li>
            <li class="submenu">
                <a href="#"><i class="fa fa-reply"></i> <span> Requests </span> <span class="menu-arrow"></span></a>
                <ul style="display: none;">
                    <li><a href="{{route('vOrg.newRequests')}}">Vew New Requests</a></li>
                    <li><a href="{{route('vOrg.oldRequests')}}">View Managed Requests</a></li>
                </ul>
            </li>

        </ul>
    </div>
</div>
