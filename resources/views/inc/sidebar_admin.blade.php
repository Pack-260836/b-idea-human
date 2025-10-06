<nav class="sidebar sidebar-offcanvas" id="sidebar">
    <ul class="nav">
        <li class="nav-item nav-profile">
            <a href="#" class="nav-link">
                <div class="profile-image">
                    <img class="img-xs rounded-circle" src="../../assets/images/faces/face8.jpg" alt="profile image">
                    <div class="dot-indicator bg-success"></div>
                </div>
                <div class="text-wrapper">
                    <p class="profile-name">Allen Moreno</p>
                    <p class="designation">Premium user</p>
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
        <!-- <li class="nav-item">
            <a class="nav-link" href="{{ url('') }}">
                <i class="menu-icon typcn typcn-document-text"></i>
                <span class="menu-title">ลงเวลางาน</span>
            </a>
        </li> -->
        <li class="nav-item">
            <a class="nav-link" data-toggle="collapse" href="#ui-basic" aria-expanded="false" aria-controls="ui-basic">
                <i class="menu-icon typcn typcn-coffee"></i>
                <span class="menu-title">ยื่นขอ/รออนุมัติ</span>
                <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="ui-basic">
                <ul class="nav flex-column sub-menu">
                    <li class="nav-item">
                        <a class="nav-link" href="{{ url('/admin/leave-form') }}">ใบลา</a>
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
        <li class="nav-item">
            <a class="nav-link" data-toggle="collapse" href="#datawork" aria-expanded="false" aria-controls="datawork">
                <i class="menu-icon typcn typcn-document-add"></i>
                <span class="menu-title">ข้อมูลงาน</span>
                <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="datawork">
                <ul class="nav flex-column sub-menu">
                    <li class="nav-item">
                        <a class="nav-link" href="{{ url('/admin/upsalary') }}"> ปรับเงินเดือน </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ url('/admin/payroll') }}"> คำนวณเงินเดือน </a>
                    </li>
                </ul>
            </div>
        </li>
        <li class="nav-item">
            <a class="nav-link" data-toggle="collapse" href="#report" aria-expanded="false" aria-controls="report">
                <i class="menu-icon typcn typcn-document-add"></i>
                <span class="menu-title">รายงาน</span>
                <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="report">
                <ul class="nav flex-column sub-menu">
                    <li class="nav-item">
                        <a class="nav-link" href="{{ url('/admin/reports/timesheet/person') }}"> รายงานการลงเวลารายบุคคล </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ url('/admin/reports/leave') }}"> รายงานการขอใบลา </a>
                    </li>
                </ul>
            </div>
        </li>
        <li class="nav-item">
            <a class="nav-link" data-toggle="collapse" href="#auth" aria-expanded="false" aria-controls="auth">
                <i class="menu-icon typcn typcn-document-add"></i>
                <span class="menu-title">ตั้งค่าบริษัท</span>
                <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="auth">
                <ul class="nav flex-column sub-menu">
                    <li class="nav-item">
                        <a class="nav-link" href="{{ url('/admin/master') }}">มาสเตอร์ </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ url('/admin/employee') }}"> ทะเบียนประวัติ </a>
                    </li>
                    <!-- <li class="nav-item">
                        <a class="nav-link" href="../../pages/samples/login.html"> Login </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="../../pages/samples/error-404.html"> 404 </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="../../pages/samples/error-500.html"> 500 </a>
                    </li> -->
                </ul>
            </div>
        </li>
    </ul>
</nav>