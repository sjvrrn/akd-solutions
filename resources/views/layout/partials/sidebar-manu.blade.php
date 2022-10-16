<!-- Start Sidemenu Area -->
@php
    $user_data=Session::get("logged_user"); 
    $role_id=$user_data['role_id'];
    $name = ($user_data['role_id']==1)?"Admin" : Auth::user()->name;
@endphp
<nav class="navbar top-navbar navbar-expand">
    <div class="collapse navbar-collapse" id="navbarSupportContent">
        <div class="responsive-burger-menu d-block d-lg-none">
            <span class="top-bar"></span>
            <span class="middle-bar"></span>
            <span class="bottom-bar"></span>
        </div> 
        <ul class="navbar-nav right-nav align-items-center"> 
            <li class="nav-item dropdown profile-nav-item">
                <a href="#" class="nav-link dropdown-toggle" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <div class="menu-profile">
                        <span class="name">Hi! {!! $name !!}</span>
                        <img src="{{asset('assets/img/user1.jpg') }}" class="rounded-circle" alt="image">
                    </div>
                </a>

                <div class="dropdown-menu">
                    <div class="dropdown-header d-flex flex-column align-items-center">
                        <div class="figure mb-3">
                            <img src="{{asset('assets/img/user1.jpg') }}" class="rounded-circle" alt="image">
                        </div>
                        <div class="info text-center">
                            <span class="name">{!! $name !!}</span>
                            <p class="mb-3 email">admin@akdsolution.com</p>
                        </div>
                    </div>

                   
                    <div class="dropdown-footer">
                        <ul class="profile-nav">
                            <li class="nav-item">
                                <a href="{{url('logout')}}" class="nav-link">
                                    <i class='bx bx-log-out'></i> <span>Logout</span>
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
            </li>
        </ul>
    </div>
</nav>
<div class="sidemenu-area">
    <div class="sidemenu-header">
        <a href="/" class="navbar-brand d-flex align-items-center">
            <img src="{{ asset('assets/img/small-logo.png') }}" alt="image" style="width:80px"> 
        </a>
        <span class="company_name">AKD SOLUTIONS</span>

        <div class="burger-menu d-none d-lg-block">
            <span class="top-bar"></span>
            <span class="middle-bar"></span>
            <span class="bottom-bar"></span>
        </div>

        <div class="responsive-burger-menu d-block d-lg-none">
            <span class="top-bar"></span>
            <span class="middle-bar"></span>
            <span class="bottom-bar"></span>
        </div>
    </div>

    <div class="sidemenu-body">
        <ul class="sidemenu-nav metisMenu h-100" id="sidemenu-nav" data-simplebar>
        <li class="nav-item {{Request::is('dashboard') ? 'mm-active' : ''}}">
                <a href="{{url('dashboard')}}" class="nav-link">
                    <span class="icon"><i class='bx bx-home-circle'></i></span>
                    <span class="menu-title">Dashboard</span>
                </a>
            </li> 
            @if($role_id == 1)
            <li class="nav-item {{Request::is('manage-organization') ? 'mm-active' : ''}}">
                <a href="{{url('manage-organization')}}" class="nav-link">
                    <span class="icon"><i class='bx bx-user'></i></span>
                    <span class="menu-title">Manage Organization</span>
                </a>
            </li>

            <li class="nav-item {{Request::is('manage-users') ? 'mm-active' : ''}}">
                <a href="{{url('manage-users')}}" class="nav-link">
                    <span class="icon"><i class='bx bx-user'></i></span>
                    <span class="menu-title">Manage Associate</span>
                </a>
            </li>
            @else
            <li class="nav-item {{Request::is('manage-users') ? 'mm-active' : ''}}">
                <a href="{{url('manage-users')}}" class="nav-link">
                    <span class="icon"><i class='bx bx-user'></i></span>
                    <span class="menu-title">Manage Users</span>
                </a>
            </li>
            @endif
            <li class="nav-item ">
                <a href="{{url('logout')}}" class="nav-link">
                    <span class="icon"><i class='bx bx-log-out'></i></span>
                    <span class="menu-title">Logout</span>
                </a>
            </li>
        </ul>
    </div>
</div>
<!-- End Sidemenu Area -->
