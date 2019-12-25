<div class="sidebar-inner slimscroll">
    <div id="sidebar-menu" class="sidebar-menu">
        <ul>
            <li class="menu-title">Admin Panel</li>
            <li class="active">
                <a href="{{route('admin.dashboard')}}"><i class="fa fa-dashboard"></i> <span>Dashboard</span></a>
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
            <li class="submenu">
                <a href="#"><i class="fa fa-hospital-o"></i> <span> Blood Banks </span> <span class="menu-arrow"></span></a>
                <ul style="display: none;">
                    <li><a href="{{route('bloodBank.index')}}">Blood Bank List</a></li>
                    <li><a href="{{ route('bloodBank.create') }}">Add New Blood Bank</a></li>
                    <li><a href="{{ route('bloodBank.requests') }}">New Requests</a></li>
                    <li><a href="{{ route('bloodBank.rejects') }}">Rejected Blood Banks</a></li>
                </ul>
            </li>
            <li class="submenu">
                <a href="#"><i class="fa fa-handshake-o"></i> <span> Blood Donors </span> <span class="menu-arrow"></span></a>
                <ul style="display: none;">
                    <li><a href="{{route('bloodDonor.index')}}">Donors List</a></li>
                    <li><a href="{{ route('bloodDonor.create') }}">Add Donor</a></li>
                    <li><a href="{{ route('bloodDonor.requests') }}">Donor Requests</a></li>
                    <li><a href="{{ route('bloodDonor.rejects') }}">Rejected Blood Donors</a></li>
                </ul>
            </li>
            <li class="submenu">
                <a href="#"><i class="fa fa-institution"></i> <span>Voluntary Orgs </span> <span class="menu-arrow"></span></a>
                <ul style="display: none;">
                    <li><a href="{{route('voluntaryOrganization.index')}}">Organizations List</a></li>
                    <li><a href="{{ route('voluntaryOrganization.create') }}">Add a Organization</a></li>
                    <li><a href="{{ route('voluntaryOrganization.requests') }}">Organization Requests</a></li>
                    <li><a href="{{ route('voluntaryOrganization.rejects') }}">Rejected Organizations</a></li>
                </ul>
            </li>

            <li class="submenu">
                <a href="#"><i class="fa fa-user-md"></i> <span>Medical officer </span> <span class="menu-arrow"></span></a>
                <ul style="display: none;">
                    <li><a href="{{route('medicalOfficer.list')}}">List of MOs</a></li>
                    <li><a href="{{ route('medicalOfficer.requests') }}">M O Requests</a></li>
                    <li><a href="{{ route('medicalOfficer.rejects') }}">Rejected MOs</a></li>
                </ul>
            </li>
        </ul>
    </div>
</div>
