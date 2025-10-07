<nav class="sidebar sidebar-offcanvas" id="sidebar">
    <ul class="nav">
        <li class="nav-item nav-profile">
            <a href="#" class="nav-link">
                <div class="profile-image">
                    <img class="img-xs rounded-circle"
                        src="{{ $authUser->image_profile 
                        ? asset('storage/profile/' . $authUser->image_profile) 
                        : asset('assets/images/human-01.svg') }}"
                        alt="profile image">
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
        <li class="nav-item">
            <a class="nav-link" href="{{ url('/admin/dashboard') }}">
                <i class="menu-icon typcn typcn-document-text"></i>
                <span class="menu-title">แดชบอร์ด</span>
            </a>
        </li>
    </ul>
</nav>