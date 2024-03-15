<div class="collapse navbar-collapse w-auto" id="sidenav-collapse-main">
    <ul class="navbar-nav">
        <li class="nav-item">
            <a class="nav-link  {{ request()->is('vendor/home/*') || request()->is('vendor/home') ? 'active' : '' }} "
                href="{{ route('vendor.home') }}">
                <div
                    class="icon icon-shape icon-sm shadow border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
                    <i class="nav-icon fas fa-th"></i>
                </div>
                <span class="nav-link-text ms-1">Home</span>
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link  {{ request()->is('vendor/theaters/*') || request()->is('vendor/theaters') ? 'active' : '' }}"
                href="{{ route('theaters.index') }}">
                <div
                    class="icon icon-shape icon-sm shadow border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
                    <i class="nav-item fas fa-tv"></i>
                </div>
                <span class="nav-link-text ms-1">Theaters</span>
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link  {{ request()->is('vendor/movies/*') || request()->is('vendor/movies') ? 'active' : '' }}"
                href="{{ route('movies.index') }}">
                <div
                    class="icon icon-shape icon-sm shadow border-radius-md text-center me-2 d-flex align-items-center justify-content-center">

                    <i class="nav-icon fas fa-film"></i>
                </div>
                <span class="nav-link-text ms-1">Movies</span>
            </a>
        </li>

        <li class="nav-item">
            <a class="nav-link  {{ request()->is('vendor/show-times/*') || request()->is('vendor/show-times') ? 'active' : '' }}"
                href="{{ route('show-times.index') }}">
                <div
                    class="icon icon-shape icon-sm shadow border-radius-md text-center me-2 d-flex align-items-center justify-content-center">

                    <i class="nav-icon fas fa-clock"></i>
                </div>
                <span class="nav-link-text ms-1">Show Times</span>
            </a>
        </li>

        <li class="nav-item">
            <a class="nav-link  {{ request()->is('vendor/bookings/*') || request()->is('vendor/bookings') ? 'active' : '' }}"
                href="{{ route('bookings.index') }}">
                <div
                    class="icon icon-shape icon-sm shadow border-radius-md text-center me-2 d-flex align-items-center justify-content-center">

                    <i class="nav-icon fas fa-cash-register"></i>
                </div>
                <span class="nav-link-text ms-1">Bookings</span>
            </a>
        </li>

        <li class="nav-item">
            <a class="nav-link  {{ request()->is('vendor/payments/*') || request()->is('vendor/payments') ? 'active' : '' }}"
                href="{{ route('payments.index') }}">
                <div
                    class="icon icon-shape icon-sm shadow border-radius-md text-center me-2 d-flex align-items-center justify-content-center">

                    <i class="nav-icon fas fa-money-bill"></i>
                </div>
                <span class="nav-link-text ms-1">Payments</span>
            </a>
        </li>

        <li class="nav-item">
            <a class="nav-link  {{ request()->is('vendor/collections/*') || request()->is('vendor/collections') ? 'active' : '' }}"
                href="{{ route('collections') }}">
                <div
                    class="icon icon-shape icon-sm shadow border-radius-md text-center me-2 d-flex align-items-center justify-content-center">

                    <i class="nav-icon fas fa-dollar-sign"></i>
                </div>
                <span class="nav-link-text ms-1">Collections</span>
            </a>
        </li>
        <li class="nav-item mt-3">
            <h6 class="ps-4 ms-2 text-uppercase text-xs font-weight-bolder opacity-6" style="color:white">Account </h6>
        </li>

        <li class="nav-item">
            <a class="nav-link  {{ request()->is('vendor/profile/' . auth()->user()->id . '/*') || request()->is('vendor/profile/' . auth()->user()->id) ? 'active' : '' }}"
                href="{{ route('vendor.profile', auth()->user()->id) }}">
                <div
                    class="icon icon-shape icon-sm shadow border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
                    <i class="nav-icon fas fa-user"></i>
                </div>
                <span class="nav-link-text ms-1">Profile</span>
            </a>
        </li>

        <li class="nav-item">
            <a class="nav-link  {{ request()->is('vendor/change-password/*') || request()->is('vendor/change-password') ? 'active' : '' }}"
                href="{{ route('vendor.change-password') }}">
                <div
                    class="icon icon-shape icon-sm shadow border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
                    <i class="nav-icon fa fa-key"></i>
                </div>
                <span class="nav-link-text ms-1">Change Password</span>
            </a>
        </li>

    </ul>

</div>
