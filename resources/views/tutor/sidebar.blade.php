<div id="sidebar" class="tutor">
    <div class="sidebar-wrap">
        <div class="logo">
            <img src="../assets/images/logo.png" />
        </div>
        <ul class="menus">

            @if(Auth::user()->is_document == 0)
                <li class="perent-menu menu-item">
                    <a class="menu-link" href="{{ route('tprofile') }}">
                        <i class="mdi mdi-view-dashboard-outline" aria-hidden="true"></i>
                        <span>Profile</span>
                    </a>
                </li>
            @else
                <li class="perent-menu menu-item">
                    <a class="menu-link" href="{{ route('tdashboard.index') }}">
                        <i class="mdi mdi-view-dashboard-outline" aria-hidden="true"></i>
                        <span>Dashboard</span>
                    </a>
                </li>
                <li class="perent-menu menu-item">
                    <a class="menu-link" href="{{ route('tmeetings.index') }}">
                        <i class="mdi mdi-account-group-outline" aria-hidden="true"></i>
                        <span>Meetings</span>
                    </a>
                </li>
            @endif

            @if(Auth::user()->is_google_meet == 0)
                <li class="perent-menu menu-item">
                    <a class="menu-link" href="{{ route('booking.create') }}">
                        <i class="mdi mdi-view-dashboard-outline" aria-hidden="true"></i>
                        <span>Google Meet</span>
                    </a>
                </li>
            @endif
            
        </ul>
    </div>
</div>