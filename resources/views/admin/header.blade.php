<div class="right-content">
    <header class="header-main">
        <div class="left-side d-flex align-items-center">
            <span id="toggle_menu"><i class="mdi mdi-menu"></i></span>
            <label class="user-label">Super Admin</label>
        </div>
        <div class="right-side d-flex align-items-center flex-wrap">
            <span class="notification-icon"><i class="mdi mdi-bell"></i></span>
            <div class="user-info d-flex align-items-center flex-wrap">
                <span>{{ substr(Auth::user()->first_name, 0, 1) }}{{ substr(Auth::user()->last_name, 0, 1)}}</span>
                <label>
                    <ul class="navbar-nav ms-auto">
                        <li class="nav-item dropdown">
                            <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                {{ Auth::user()->first_name }}  {{ Auth::user()->last_name }}
                            </a>

                            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();
                                             document.getElementById('logout-form').submit();">
                                    {{ __('Logout') }}
                                </a>

                                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                    @csrf
                                </form>
                            </div>
                        </li>
                    </ul>
                </label>
            </div>
        </div>
    </header>