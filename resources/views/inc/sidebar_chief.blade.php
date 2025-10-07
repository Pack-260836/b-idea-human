<nav class="sidebar sidebar-offcanvas" id="sidebar">
    <ul class="nav">
        <li class="nav-item nav-profile">
            <a href="#" class="nav-link">
                <div class="profile-image">
                    <img class="img-xs rounded-circle"
                        src="{{ !empty($authUser->image_profile) 
                                ? asset($authUser->image_profile) 
                                : asset('assets/images/human-01.svg') }}"
                        alt="Profile image">
                    <div class="dot-indicator bg-success"></div>
                </div>
                <div class="text-wrapper">
                    <p class="profile-name">
                        {{ $authUser->name_th 
                            ? $authUser->prefix_th . ' ' . $authUser->name_th 
                            : $authUser->prefix_en . ' ' . $authUser->name_en }}
                    </p>
                    <p class="designation">
                        @switch($authUser->emp_level)
                        @case(1)
                        Admin
                        @break
                        @case(2)
                        Chief
                        @break
                        @default
                        User
                        @endswitch
                    </p>
                </div>
            </a>
        </li>
        <!-- <li class="nav-item nav-category">Main Menu</li> -->
        <li class="nav-item">
            <a class="nav-link" href="{{ url('/admin/dashboard') }}">
                <i class="menu-icon typcn typcn-document-text"></i>
                <span class="menu-title">แดชบอร์ด</span>
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" data-toggle="collapse" href="#ui-basic" aria-expanded="false" aria-controls="ui-basic">
                <i class="menu-icon typcn typcn-coffee"></i>
                <span class="menu-title">ยื่นขอ/รออนุมัติ</span>
                <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="ui-basic">
                <ul class="nav flex-column sub-menu">
                    <li class="nav-item">
                        <a class="nav-link" href="{{ url('/admin/leave') }}">ใบลา</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ url('/admin/ot-form') }}">โอที</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ url('/admin/job-form') }}">Job</a>
                    </li>
                </ul>
            </div>
        </li>
    </ul>
</nav>