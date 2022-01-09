<div id="sidebar">
    <div class="sidebar-wrap">
        <div class="logo">
            <img src="../assets/images/logo.png" />
        </div>
        <ul class="menus">
            <li class="perent-menu menu-item parent">
                <a class="menu-link" href="#">
                    <i class="mdi mdi-view-dashboard-outline" aria-hidden="true"></i>
                    <span>Manage User</span>
                </a>
                <ul class="child-menu">
                    <li class="menu-item">
                        <a class="menu-link" href="{{ route('admin_dashboard') }}">
                            <i class="mdi mdi-account-outline" aria-hidden="true"></i>
                            <span>Student List</span>
                        </a>
                    </li>
                    <li class="menu-item">
                        <a class="menu-link" href="{{ route('admin_dashboard') }}">
                            <i class="mdi mdi-account-outline" aria-hidden="true"></i>
                            <span>Tutor List</span>
                        </a>
                    </li>
                </ul>
            </li>
            <li class="perent-menu menu-item parent">
                <a class="menu-link" href="{{ route('admin_subscription') }}">
                    <i class="mdi mdi-cash" aria-hidden="true"></i>
                    <span>Subscription</span>
                </a>
            </li>
            <li class="perent-menu menu-item parent">
                <a class="menu-link" href="{{ route('admin_meetings') }}">
                    <i class="mdi mdi-account-multiple-outline" aria-hidden="true"></i>
                    <span>Meetings</span>
                </a>
            </li>
            <li class="perent-menu menu-item parent">
                <a class="menu-link" href="#">
                    <i class="mdi mdi-cog-outline" aria-hidden="true"></i>
                    <span>Settings</span>
                </a>
                <ul class="child-menu">
                    <li class="menu-item">
                        <a class="menu-link" href="{{ route('admin_settings') }}">
                            <i class="mdi mdi-credit-card-outline" aria-hidden="true"></i>
                            <span>Stripe Payment</span>
                        </a>
                    </li>
                    <li class="menu-item">
                        <a class="menu-link" href="{{ route('admin_template') }}">
                            <i class="mdi mdi-email-outline" aria-hidden="true"></i>
                            <span>Email Template</span>
                        </a>
                    </li>
                    <li class="menu-item">
                        <a class="menu-link" href="{{ route('admin_notification') }}">
                            <i class="mdi mdi-email-outline" aria-hidden="true"></i>
                            <span>Email Notification</span>
                        </a>
                    </li>
                    <li class="menu-item">
                        <a class="menu-link" href="{{ route('admin_language') }}">
                            <i class="mdi mdi-translate" aria-hidden="true"></i>
                            <span>Multi Language</span>
                        </a>
                    </li>
                </ul>
            </li>
        </ul>
    </div>
</div>