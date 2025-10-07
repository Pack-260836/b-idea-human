<nav class="navbar default-layout col-lg-12 col-12 p-0 fixed-top d-flex flex-row">
    <div class="text-center navbar-brand-wrapper d-flex align-items-top justify-content-center">
        <a class="navbar-brand brand-logo" href="../../index.html">
            <img src="{{ asset('assets/images/b-idea-logo-white.svg') }}" alt="logo" /> </a>
        <a class="navbar-brand brand-logo-mini" href="../../index.html">
            <img src="{{ asset('assets/images/b-idea-logo-white.svg') }}" alt="logo" /> </a>
    </div>
    <div class="navbar-menu-wrapper d-flex align-items-center">
        <ul class="navbar-nav ml-auto">
            <li class="nav-item dropdown d-none d-xl-inline-block user-dropdown">
                <a class="nav-link dropdown-toggle" id="UserDropdown" href="#" data-toggle="dropdown" aria-expanded="false">
                    <img class="img-xs rounded-circle"
                        src="{{ !empty($authUser->image_profile) 
                                ? asset($authUser->image_profile) 
                                : asset('assets/images/human-01.svg') }}"
                        alt="Profile image">
                    <div class="dropdown-menu dropdown-menu-right navbar-dropdown" aria-labelledby="UserDropdown">
                        <div class="dropdown-header text-center">
                            <img class="img-md rounded-circle"
                                src="{{ !empty($authUser->image_profile) 
                                ? asset($authUser->image_profile) 
                                : asset('assets/images/human-01.svg') }}"
                                alt="Profile image">
                            <p class="mb-1 mt-3 font-weight-semibold">
                                {{ $authUser->name_th 
                            ? $authUser->prefix_th . ' ' . $authUser->name_th 
                            : $authUser->prefix_en . ' ' . $authUser->name_en }}
                            </p>
                        </div>
                        <a onclick="handlelogout(this,1)" class="dropdown-item">ออกจากระบบ<i class="dropdown-item-icon ti-power-off"></i></a>
                    </div>
            </li>
        </ul>
        <button class="navbar-toggler navbar-toggler-right d-lg-none align-self-center" type="button" data-toggle="offcanvas">
            <span class="mdi mdi-menu"></span>
        </button>
    </div>
</nav>