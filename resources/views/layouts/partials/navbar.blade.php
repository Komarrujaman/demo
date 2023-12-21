<!-- partial:../../partials/_navbar.html -->
<nav class="navbar default-layout-navbar col-lg-12 col-12 p-0 fixed-top d-flex flex-row bg-gradient-primary">
    <div class="navbar-brand-wrapper d-flex align-items-center justify-content-center bg-gradient-primary">
        <a class="navbar-brand brand-logo mx-3" href="{{('/')}}"><img src="{{asset('assets/images/logo.png')}}" alt="" srcset="" style="height: 50px; width:50px;"></a>
        <a class="navbar-brand brand-logo-mini mx-3" href="{{('/')}}"><img src="{{asset('assets/images/logo.png')}}" alt="" srcset="" style="height: 30px; width:30px;"></a>
    </div>
    <div class="navbar-menu-wrapper d-flex align-items-stretch">
        <button class="navbar-toggler navbar-toggler align-self-center" type="button" data-toggle="minimize">
            <span class="mdi mdi-menu"></span>
        </button>
        <div class="search-field d-none d-md-block">
            <div class="d-flex align-items-center h-100 ">
                <h2 class=" fw-bold text-white">Balai Sungai Wilayah 2 NTT</h2>
            </div>
        </div>
        <ul class="navbar-nav navbar-nav-right">
            <li class="nav-item nav-profile dropdown">
                <a class="nav-link dropdown-toggle" id="profileDropdown" href="#" data-bs-toggle="dropdown" aria-expanded="false">
                    <div class="nav-profile-img">
                        <img src="{{('assets/images/faces/face1.jpg')}}" alt="image">
                        <span class="availability-status online"></span>
                    </div>
                    <div class="nav-profile-text">
                        <p class="mb-1 text-white">Admin</p>
                    </div>
                </a>
                <div class="dropdown-menu navbar-dropdown" aria-labelledby="profileDropdown" style="background-color: #fcb717;">
                    <a class="dropdown-item" href="#">
                        <i class="mdi mdi-cached me-2 text-success"></i> Profile </a>
                    <div class="dropdown-divider"></div>
                    <a class="dropdown-item" href="{{url('logout')}}">
                        <i class="mdi mdi-logout me-2 text-primary"></i> Signout </a>
                </div>
            </li>

        </ul>
        <button class="navbar-toggler navbar-toggler-right d-lg-none align-self-center" type="button" data-toggle="offcanvas">
            <span class="mdi mdi-menu"></span>
        </button>
    </div>
</nav>
<!-- partial -->