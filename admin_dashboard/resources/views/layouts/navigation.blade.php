<!-- Sidebar Start -->
<aside class="left-sidebar">
    <!-- Sidebar scroll-->
    <div>
        <div class="brand-logo d-flex align-items-center justify-content-between">
            <a href="{{ route('dashboard') }}" class="text-nowrap logo-img">
                <div class="d-flex justify-content-center">
                    <img src={{ asset('logo.png') }} alt="Logo" class="mx-auto">
                </div>
            </a>
            <div class="cursor-pointer close-btn d-xl-none d-block sidebartoggler" id="sidebarCollapse">
                <i class="ti ti-x fs-8"></i>
            </div>
        </div>
        <!-- Sidebar navigation-->
        <nav class="sidebar-nav scroll-sidebar" data-simplebar="">
            <ul id="sidebarnav">
                <li class="nav-small-cap">
                    <i class="ti ti-dots nav-small-cap-icon fs-6"></i>
                    <span class="hide-menu">Home</span>
                </li>
                <li class="sidebar-item">
                    <a class="sidebar-link" href="{{ route('dashboard') }}" aria-expanded="false">
                        <span>
                            <iconify-icon icon="solar:home-2-bold-duotone" class="fs-6"></iconify-icon>
                        </span>
                        <span class="hide-menu">Dashboard</span>
                    </a>
                </li>
                <li class="nav-small-cap">
                    <i class="ti ti-dots nav-small-cap-icon fs-6"></i>
                    <span class="hide-menu">Data Management</span>
                </li>
                <li class="sidebar-item">
                    <a class="sidebar-link" href="{{ route('trips.index') }}" aria-expanded="false">
                        <span>
                            <iconify-icon icon="solar-routing-2-bold" class="fs-6"></iconify-icon>
                        </span>
                        <span class="hide-menu">Manage-Trips</span>
                    </a>
                </li>
                <li class="sidebar-item">
                    <a class="sidebar-link" href="{{ route('operators.index') }}" aria-expanded="false">
                        <span>
                            <iconify-icon icon="solar:user-id-bold-duotone" class="fs-6"></iconify-icon>
                        </span>
                        <span class="hide-menu">Van-Operators</span>
                    </a>
                </li>
                <li class="sidebar-item">
                    <a class="sidebar-link" href="{{ route('vans.index') }}" aria-expanded="false">
                        <span>
                            <iconify-icon icon="solar:bus-bold-duotone" class="fs-6"></iconify-icon>
                        </span>
                        <span class="hide-menu">Vans</span>
                    </a>
                </li>
                <li class="sidebar-item">
                    <a class="sidebar-link" href="{{ route('drivers.index') }}" aria-expanded="false">
                        <span>
                            <iconify-icon icon="solar:user-hand-up-bold-duotone" class="fs-6"></iconify-icon>
                        </span>
                        <span class="hide-menu">Manage-Drivers</span>
                    </a>
                </li>
                <li class="sidebar-item">
                    <a class="sidebar-link" href="{{ route('children.index') }}" aria-expanded="false">
                        <span>
                            <iconify-icon icon="solar-user-check-bold" class="fs-6"></iconify-icon>
                        </span>
                        <span class="hide-menu">Children</span>
                    </a>
                </li>
                <li class="sidebar-item">
                    <a class="sidebar-link" href="{{ route('parents.index') }}" aria-expanded="false">
                        <span>
                            <iconify-icon icon="solar:users-group-rounded-bold-duotone" class="fs-6"></iconify-icon>
                        </span>
                        <span class="hide-menu">Parents</span>
                    </a>
                </li>
                <li class="sidebar-item">
                    <a class="sidebar-link" href="{{ route('assignment.index') }}" aria-expanded="false">
                        <span>
                            <iconify-icon icon="solar:clipboard-check-bold-duotone" class="fs-6"></iconify-icon>
                        </span>
                        <span class="hide-menu">Child Assignment</span>
                    </a>
                </li>
                <li class="sidebar-item">
                    <a class="sidebar-link" href="/" aria-expanded="false">
                        <span>
                            <iconify-icon icon="solar:settings-bold-duotone" class="fs-6"></iconify-icon>
                        </span>
                        <span class="hide-menu">Settings</span>
                    </a>
                </li>
            </ul>
        </nav>
        <!-- End Sidebar navigation -->
    </div>
    <!-- End Sidebar scroll-->
</aside>
<!--  Sidebar End -->
<!--  Main wrapper -->
<div class="body-wrapper">

    <!--  Header Start -->
    <header class="app-header">
        <nav class="navbar navbar-expand-lg navbar-light">
            <ul class="navbar-nav d-flex justify-content-center align-items-center w-100">
                <li class="nav-item d-block d-xl-none">
                    <a class="nav-link sidebartoggler nav-icon-hover" id="headerCollapse" href="javascript:void(0)">
                        <i class="ti ti-menu-2"></i>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link nav-icon-hover" href="javascript:void(0)">
                        <i class="ti ti-bell-ringing" style="font-size: 2rem;"></i> <!-- Adjust size as needed -->
                        <div class="notification bg-primary rounded-circle"></div>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="javascript:void(0)">
                        <h1 style="color: blue; font-size:2.5rem; font-family:'Times New Roman', Times, serif" class="text-center m-0">School van and children tracking system</h1>
                    </a>
                </li>
            </ul>
            <div class="px-0 navbar-collapse justify-content-end" id="navbarNav">
                <ul class="flex-row navbar-nav ms-auto align-items-center justify-content-end">
                    <li class="nav-item dropdown">
                        <a class="nav-link nav-icon-hover" href="javascript:void(0)" id="drop2"
                            data-bs-toggle="dropdown" aria-expanded="false">
                            <img src="{{ asset('assets/images/profile/user-1.jpg') }}" alt="" width="35"
                                height="35" class="rounded-circle">

                        </a>
                        <h3>Hello, <strong>{{ Auth::user()->name }}</strong></h3>
                        <div class="dropdown-menu dropdown-menu-end dropdown-menu-animate-up" aria-labelledby="drop2">
                            <div class="message-body">
                                <a href="{{ route('profile.edit') }}"
                                    class="gap-2 d-flex align-items-center dropdown-item">
                                    <i class="ti ti-user fs-6"></i>
                                    <p class="mb-0 fs-3">My Profile</p>
                                </a>
                                <a href="javascript:void(0)" class="gap-2 d-flex align-items-center dropdown-item">
                                    <i class="ti ti-mail fs-6"></i>
                                    <p class="mb-0 fs-3">My Account</p>
                                </a>
                                <!-- Authentication -->
                                <form method="POST" action="{{ route('logout') }}">
                                    @csrf

                                    <x-responsive-nav-link :href="route('logout')"
                                        onclick="event.preventDefault();
                                                this.closest('form').submit();">
                                        {{ __('Log Out') }}
                                    </x-responsive-nav-link>
                                </form>
                            </div>
                        </div>
                    </li>
                </ul>
            </div>
        </nav>
    </header>
    <!--  Header End -->
