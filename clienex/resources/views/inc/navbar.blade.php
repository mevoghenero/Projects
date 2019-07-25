 <!-- [ Header ] start -->
 <header class="navbar pcoded-header  navbar-expand-lg navbar-light">
    <div class="m-header">
        <a class="mobile-menu" id="mobile-collapse1" href="#!"><span></span></a>
        <a href="index.html" class="b-brand">
         <div class="b-bg">
             <i class="feather icon-trending-up"></i>
         </div>
         <span class="b-title">Clienex</span>
     </a>
 </div>
 <a class="mobile-menu" id="mobile-header" href="#!">
    <i class="feather icon-more-horizontal"></i>
</a>
<div class="collapse navbar-collapse">
    <ul class="navbar-nav mr-auto">

        <li class="nav-item">
            <div class="main-search">
               {{--  <div class="input-group">
                    <input type="text" id="m-search" class="form-control" placeholder="Search . . .">
                    <a href="#!" class="input-group-append search-close">
                        <i class="feather icon-x input-group-text"></i>
                    </a>
                    <span class="input-group-append search-btn btn btn-primary">
                        <i class="feather icon-search input-group-text"></i>
                    </span>
                </div> --}}
            </div>
        </li>
    </ul>
    <ul class="navbar-nav ml-auto">

        <li>
            <div class="dropdown drp-user">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                    <i class="icon feather icon-settings"></i>
                </a>
                <div class="dropdown-menu dropdown-menu-right profile-notification">
                    <div class="pro-head">
                        <img src="assets/images/user/avatar-1.jpg" class="img-radius" alt="User-Profile-Image">
                        <span>{{ Auth::user()->first_name }}</span>
                        <form id="logout-form" action="{{ route('logout') }}" method="POST">
                            @csrf
                            <button class="dud-logout" title="Logout">
                                <i class="feather icon-log-out"></i>
                            </button>
                        </form>
                        </div>
                        <ul class="pro-body">
                            <li><a href="#!" class="dropdown-item"><i class="feather icon-settings"></i> Settings</a></li>
                            <li><a href="{{ route('profile.index') }}" class="dropdown-item"><i class="feather icon-user"></i> Profile</a></li>
                            <li><a href="message.html" class="dropdown-item"><i class="feather icon-mail"></i> My Messages</a></li>
                            <li><a href="auth-signin.html" class="dropdown-item"><i class="feather icon-lock"></i> Lock Screen</a></li>
                        </ul>
                    </div>
                </div>
            </li>
        </ul>
    </div>
</header>
    <!-- [ Header ] end -->