<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('title', 'FitForge')</title>

    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/admin-lte@3.2/dist/css/adminlte.min.css">
    @stack('styles')
    <style>
        body, .content-wrapper {
            background: #0e0e1b !important;
            color: #fff !important;
        }
        .main-sidebar {
            background: #18182a !important;
        }
        .nav-sidebar .nav-link {
            border-radius: 15px;
            margin-bottom: 0.5rem;
            color: #bdbdd7 !important;
            transition: box-shadow 0.2s, background 0.2s, color 0.2s;
        }
        .nav-sidebar .nav-link.active, .nav-sidebar .nav-link:hover {
            background: linear-gradient(90deg, #6C63FF 60%, #00C9A7 100%) !important;
            color: #fff !important;
            box-shadow: 0 0 12px #6C63FF99, 0 0 8px #00C9A799;
        }
        .nav-sidebar .nav-link i {
            color: #6C63FF !important;
            transition: color 0.2s;
        }
        .nav-sidebar .nav-link.active i, .nav-sidebar .nav-link:hover i {
            color: #fff !important;
        }
        .brand-link {
            background: transparent !important;
            color: #6C63FF !important;
            font-weight: bold;
            font-size: 1.3rem;
            letter-spacing: 1px;
        }
        .sidebar {
            padding-top: 1rem;
        }
        /* Header/Navbar */
        .main-header.navbar {
            background: #18182a !important;
            color: #fff !important;
            border-bottom: 1.5px solid #23234a !important;
            box-shadow: 0 2px 12px #6C63FF22;
        }
        .main-header .navbar-nav .nav-link, .main-header .navbar-nav .nav-link i {
            color: #fff !important;
        }
        .main-header .navbar-nav .nav-link:hover, .main-header .navbar-nav .show > .nav-link {
            color: #6C63FF !important;
        }
        .dropdown-menu {
            background: #23234a !important;
            color: #fff !important;
            border-radius: 1rem;
            border: none;
            box-shadow: 0 0 16px #6C63FF33;
        }
        .dropdown-item {
            color: #fff !important;
            border-radius: 0.5rem;
        }
        .dropdown-item:hover {
            background: #6C63FF !important;
            color: #fff !important;
        }
        /* Footer */
        .main-footer {
            background: #18182a !important;
            color: #fff !important;
            border-top: 1.5px solid #23234a !important;
            box-shadow: 0 -2px 12px #6C63FF22;
        }
        .main-footer a {
            color: #00C9A7 !important;
            text-decoration: underline;
        }
        .main-footer a:hover {
            color: #6C63FF !important;
        }
    </style>
</head>
<body class="hold-transition sidebar-mini">
<div class="wrapper">
    <!-- Navbar -->
    <nav class="main-header navbar navbar-expand navbar-white navbar-light">
        <!-- Left navbar links -->
        <ul class="navbar-nav">
            <li class="nav-item">
                <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
            </li>
        </ul>

        <!-- Right navbar links -->
        <ul class="navbar-nav ml-auto">
            <li class="nav-item dropdown">
                <a class="nav-link" data-toggle="dropdown" href="#">
                    <i class="far fa-user"></i>
                </a>
                <div class="dropdown-menu dropdown-menu-right">
                    <a href="{{ route('profile.edit') }}" class="dropdown-item">
                        <i class="fas fa-user-cog mr-2"></i> Profile
                    </a>
                    {{-- <div class="dropdown-divider"></div> --}}
                    <form method="POST" action="{{ route('logout') }}">
                        @csrf
                        <button type="submit" class="dropdown-item">
                            <i class="fas fa-sign-out-alt mr-2"></i> Logout
                        </button>
                    </form>
                </div>
            </li>
        </ul>
    </nav>

    <!-- Main Sidebar Container -->
    <aside class="main-sidebar sidebar-dark-primary elevation-4">
        <!-- Brand Logo -->
        <a href="{{ route('admin.index') }}" class="brand-link">
            <span class="brand-text font-weight-light">FitForge</span>
        </a>

        <!-- Sidebar -->
        <div class="sidebar d-flex flex-column justify-content-between" style="height:calc(100vh - 60px);">
            <!-- Sidebar Menu -->
            <nav class="mt-2 flex-grow-1">
                <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu">
                    @auth
                        <li class="nav-item">
                            <a href="{{ route('dashboard') }}" class="nav-link {{ (request()->routeIs('admin.index') || request()->routeIs('dashboard') || request()->routeIs('home.index')) ? 'active' : '' }}">
                                <i class="nav-icon fas fa-tachometer-alt"></i>
                                <p>Dashboard</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('workouts.index') }}" class="nav-link {{ request()->routeIs('workouts.*') ? 'active' : '' }}">
                                <i class="nav-icon fas fa-dumbbell"></i>
                                <p>Workouts</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('exercises.index') }}" class="nav-link {{ request()->routeIs('exercises.*') ? 'active' : '' }}">
                                <i class="nav-icon fas fa-running"></i>
                                <p>Exercises</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('body-condition.index') }}" class="nav-link {{ request()->routeIs('body-condition.*') ? 'active' : '' }}">
                                <i class="nav-icon fas fa-heartbeat"></i>
                                <p>Body Condition</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('progress_logs.index') }}" class="nav-link {{ request()->routeIs('progress_logs.*') ? 'active' : '' }}">
                                <i class="nav-icon fas fa-chart-line"></i>
                                <p>Progress Logs</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('measurements.index') }}" class="nav-link {{ request()->routeIs('measurements.*') ? 'active' : '' }}">
                                <i class="nav-icon fas fa-ruler"></i>
                                <p>Measurements</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('goals.index') }}" class="nav-link {{ request()->routeIs('goals.*') ? 'active' : '' }}">
                                <i class="nav-icon fas fa-bullseye"></i>
                                <p>Goals</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('reminders.index') }}" class="nav-link {{ request()->routeIs('reminders.*') ? 'active' : '' }}">
                                <i class="nav-icon fas fa-bell"></i>
                                <p>Reminders</p>
                            </a>
                        </li>
                        @if(auth()->user()->role == 'admin')
                            <li class="nav-item">
                                <a href="{{ route('users.index') }}" class="nav-link {{ request()->routeIs('users.*') ? 'active' : '' }}">
                                    <i class="nav-icon fas fa-users"></i>
                                    <p>Users</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="{{ route('admin.settings') }}" class="nav-link {{ request()->routeIs('admin.settings') ? 'active' : '' }}">
                                    <i class="nav-icon fas fa-cogs"></i>
                                    <p>Admin Settings</p>
                                </a>
                            </li>
                        @endif
                    @endauth
                    {{-- @yield('sidebar-menu') --}}
                </ul>
            </nav>
            <!-- Sidebar Footer: User Info & Logout -->
            @auth
            <div class="sidebar-footer mt-auto p-3 d-flex align-items-center justify-content-between"
                 style="background:rgba(20,20,40,0.95); border-radius:1rem; box-shadow:0 0 12px #6C63FF33; overflow:hidden; margin-bottom:1.2rem;">
                <span style="color:#fff; font-weight:600; white-space:nowrap; overflow:hidden; text-overflow:ellipsis;">
                    <i class="fas fa-user-circle me-2" style="color:#00C9A7;"></i> {{ auth()->user()->name }}
                </span>
                <form method="POST" action="{{ route('logout') }}" class="mb-0 ms-2 d-flex align-items-center" style="margin-left:auto;">
                    @csrf
                    <button type="submit" class="btn btn-link p-0 ms-2" title="Logout" style="color:#ff4b5c; font-size:1.3rem; margin-left:12px;"><i class="fas fa-sign-out-alt"></i></button>
                </form>
            </div>
            @endauth
        </div>
    </aside>

    <!-- Content Wrapper -->
    <div class="content-wrapper">
        <!-- Content Header -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">@yield('header')</h1>
                    </div>
                </div>
            </div>
        </div>

        <!-- Main content -->
        <div class="content">
            <div class="container-fluid">
                @yield('content')
            </div>
        </div>
    </div>

    <!-- Main Footer -->
    <footer class="main-footer">
        <strong>Copyright &copy; {{ date('Y') }} <a href="#">FitForge</a>.</strong>
        All rights reserved.
    </footer>
</div>

<!-- REQUIRED SCRIPTS -->
<!-- jQuery -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<!-- Bootstrap 4 -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE App -->
<script src="https://cdn.jsdelivr.net/npm/admin-lte@3.2/dist/js/adminlte.min.js"></script>
@stack('scripts')
</body>
</html> 