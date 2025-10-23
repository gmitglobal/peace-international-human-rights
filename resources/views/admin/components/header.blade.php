<header>
    <div class="topbar d-flex align-items-center">
        <nav class="navbar navbar-expand">
            <div class="mobile-toggle-menu"><i class='bx bx-menu'></i></div>
            <div class="search-bar flex-grow-1">
                <div class="position-relative search-bar-box"></div>
            </div>
            <div class="top-menu ms-auto">
                <ul class="navbar-nav align-items-center">
                    <li class="nav-item dropdown dropdown-large">
                        <a class="nav-link dropdown-toggle dropdown-toggle-nocaret position-relative" href="#"
                            role="button" data-bs-toggle="" aria-expanded="false">
                        </a>
                        <div class="">
                            <div class="header-notifications-list"></div>
                        </div>
                    </li>
                    <li class="nav-item dropdown dropdown-large">
                        <a class="nav-link dropdown-toggle dropdown-toggle-nocaret position-relative" href="#"
                            role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        </a>
                        <div class="">
                            <div class="header-message-list"></div>
                        </div>
                    </li>
                </ul>
            </div>
            {{-- asset('no_image.jpg') --}}
            <div class="user-box dropdown">
                <a class="d-flex align-items-center nav-link dropdown-toggle dropdown-toggle-nocaret" href="#"
                    role="button" data-bs-toggle="dropdown" aria-expanded="false">
                    <img src="{{ !empty(Auth()->user()->photo) ? asset(Auth()->user()->photo) : asset('no_image.jpg') }}"
                        class="user-img" alt="user avatar">
                    <div class="user-info ps-3">
                        <p class="user-name mb-0">{{ Auth()->user()->name }}</p>
                        <p class="designattion mb-0">{{ Auth()->user()->email }}</p>
                    </div>
                </a>
                <ul class="dropdown-menu dropdown-menu-end">
                    <li>
                        <a class="dropdown-item" href="{{ route('admin.profile.page') }}">
                            <i class="bx bx-user"></i><span>Profile</span>
                        </a>
                    </li>
                    <li>
                        <a class="dropdown-item" href="{{ route('admin.password.change.page') }}">
                            <i class="bx bx-cog"></i><span>Change Password</span>
                        </a>
                    </li>
                    @if (Auth()->user()->role == 'admin')
                        {{-- <li>
                            <a class="dropdown-item" href="{{ route('admin.register.page') }}">
                                <i class="bx bx-user"></i><span>Register New Member</span>
                            </a>
                        </li> --}}
                    @endif

                    <li>
                        <div class="dropdown-divider mb-0"></div>
                    </li>
                    <li>
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf
                            <button type="submit" class="btn btn-sm btn-danger dropdown-item"><i
                                    class='bx bx-log-out-circle'></i>
                                <span>Logout</span>
                            </button>
                        </form>
                    </li>
                </ul>
            </div>
        </nav>
    </div>
</header>
