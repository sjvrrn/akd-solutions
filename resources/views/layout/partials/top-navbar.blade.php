<!-- Top Navbar Area -->
<nav class="navbar top-navbar navbar-expand">
    <div class="collapse navbar-collapse" id="navbarSupportContent">
        <div class="responsive-burger-menu d-block d-lg-none">
            <span class="top-bar"></span>
            <span class="middle-bar"></span>
            <span class="bottom-bar"></span>
        </div>

        

        

        <ul class="navbar-nav right-nav align-items-center">
           

            

            <li class="nav-item message-box dropdown">
                <a href="#" class="nav-link dropdown-toggle" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <div class="message-btn">
                        <i class='bx bx-envelope'></i>
                        <span class="badge badge-primary">4</span>
                    </div>
                </a>

                <div class="dropdown-menu">
                    <div class="dropdown-header d-flex justify-content-between align-items-center">
                        <span class="title d-inline-block">4 New Message</span>
                        <span class="clear-all-btn d-inline-block">Clear All</span>
                    </div>

                    <div class="dropdown-body">
                        <a href="#" class="dropdown-item d-flex align-items-center">
                            <div class="figure">
                                <img src="{{asset('assets/img/user1.jpg') }}" class="rounded-circle" alt="image">
                            </div>

                            <div class="content d-flex justify-content-between align-items-center">
                                <div class="text">
                                    <span class="d-block">Sarah Taylor</span>
                                    <p class="sub-text mb-0">UX/UI design</p>
                                </div>
                                <p class="time-text mb-0">2 sec ago</p>
                            </div>
                        </a>
 
                    </div>

                    <div class="dropdown-footer">
                        <a href="#" class="dropdown-item">View All</a>
                    </div>
                </div>
            </li>

           
            <li class="nav-item dropdown profile-nav-item">
                <a href="#" class="nav-link dropdown-toggle" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <div class="menu-profile">
                        <span class="name">Hi! AKD Solutions</span>
                        <img src="{{asset('assets/img/user1.jpg') }}" class="rounded-circle" alt="image">
                    </div>
                </a>

                <div class="dropdown-menu">
                    <div class="dropdown-header d-flex flex-column align-items-center">
                        <div class="figure mb-3">
                            <img src="{{asset('assets/img/user1.jpg') }}" class="rounded-circle" alt="image">
                        </div>
                        <div class="info text-center">
                            <span class="name">Andro Smith</span>
                            <p class="mb-3 email">hello@androsmith.com</p>
                        </div>
                    </div>

                    <div class="dropdown-body">
                        <ul class="profile-nav p-0 pt-3">
                            <li class="nav-item">
                                <a href="#" class="nav-link">
                                    <i class='bx bx-user'></i> <span>Profile</span>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="#" class="nav-link">
                                    <i class='bx bx-envelope'></i> <span>My Inbox</span>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="#" class="nav-link">
                                    <i class='bx bx-edit-alt'></i> <span>Edit Profile</span>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="#" class="nav-link">
                                    <i class='bx bx-cog'></i> <span>Settings</span>
                                </a>
                            </li>
                        </ul>
                    </div>

                    <div class="dropdown-footer">
                        <ul class="profile-nav">
                            <li class="nav-item">
                                <a href="#" class="nav-link">
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
<!-- End Top Navbar Area -->
