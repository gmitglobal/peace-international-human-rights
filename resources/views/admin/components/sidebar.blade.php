<div class="sidebar-wrapper" data-simplebar="true">
    <div class="sidebar-header">
        <div>
            <img src="{{ !empty(Auth()->user()->photo) ? asset(Auth()->user()->photo) : asset('no_image.jpg') }}"
                class="logo-icon" alt="logo icon">
        </div>
        <div>
            <h4 class="logo-text"></h4>
        </div>
        <div class="toggle-icon ms-auto"><i class='bx bx-arrow-to-left'></i>
        </div>
    </div>
    <!--navigation-->
    <ul class="metismenu" id="menu">

        <li class="menu-label">Dashboard</li>
        <li>
            <a href="{{ route('dashboard') }}">
                <div class="parent-icon"><i class='bx bx-cookie'></i></div>
                <div class="menu-title">Dashboard</div>
            </a>
        </li>

        {{-- @if (Auth::user()->role == 'admin') --}}
        <li>
            <a href="{{ route('admin.member.list') }}">
                <div class="parent-icon"><i class='bx bx-cookie'></i></div>
                <div class="menu-title">Member List</div>
            </a>
        </li>

        <li>
            <a href="{{ route('admin.slider.index') }}">
                <div class="parent-icon"><i class='bx bx-cookie'></i></div>
                <div class="menu-title">Manage Slider</div>
            </a>
        </li>

        <li>
            <a href="{{ route('admin.activities.index') }}">
                <div class="parent-icon"><i class='bx bx-cookie'></i></div>
                <div class="menu-title">Manage Activities</div>
            </a>
        </li>

        <li>
            <a href="{{ route('admin.activities.index') }}">
                <div class="parent-icon"><i class='bx bx-cookie'></i></div>
                <div class="menu-title">Support Request</div>
            </a>
        </li>

        <li>
            <a href="{{ route('admin.role.index') }}">
                <div class="parent-icon"><i class='bx bx-cookie'></i></div>
                <div class="menu-title">Manage Roles</div>
            </a>
        </li>
        {{-- @endif --}}

        <hr>
        <li>
            <a href="{{ route('home') }}" target="_blank">
                <div class="parent-icon"><i class='bx bx-cookie'></i></div>
                <div class="menu-title">View Website</div>
            </a>
        </li>

        {{-- <li>
            <a href="{{ route('admin.shop.index') }}">
                <div class="parent-icon"><i class='bx bx-cookie'></i></div>
                <div class="menu-title">Shop</div>
            </a>
        </li>
        <li>
            <a href="{{ route('admin.category.index') }}">
                <div class="parent-icon"><i class='bx bx-cookie'></i></div>
                <div class="menu-title">Category</div>
            </a>
        </li> --}}

        {{-- <li class="menu-label">SETUP</li>

        <li>
            <a class="has-arrow" href="javascript:;">
                <div class="parent-icon"><i class="bx bx-grid-alt"></i>
                </div>
                <div class="menu-title">Manage Product</div>
            </a>
            <ul>
                <li>
                    <a href="#">
                        <i class="bx bx-right-arrow-alt"></i>
                        Add Product
                    </a>
                </li>

            </ul>
        </li> --}}
    </ul>
    <!--end navigation-->
</div>
