<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>Star Admin Premium Bootstrap Admin Dashboard Template</title>
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <link rel="stylesheet" href="{{ asset('assets/vendors/iconfonts/mdi/css/materialdesignicons.min.css') }}">
  <link rel="stylesheet" href="{{ asset('assets/vendors/iconfonts/ionicons/dist/css/ionicons.css') }}">
  <link rel="stylesheet" href="{{ asset('assets/vendors/iconfonts/flag-icon-css/css/flag-icon.min.css') }}">
  <link rel="stylesheet" href="{{ asset('assets/vendors/css/vendor.bundle.base.css') }}">
  <link rel="stylesheet" href="{{ asset('assets/vendors/css/vendor.bundle.addons.css') }}">
  <link rel="stylesheet" href="{{ asset('assets/css/shared/style.css') }}">
  <link rel="shortcut icon" href="{{ asset('images/favicon.ico') }}">
</head>

<body>
  <div class="container-scroller">
    <div class="container-fluid page-body-wrapper full-page-wrapper">
      <div class="content-wrapper d-flex align-items-center auth auth-bg-1 theme-one">
        <div class="row w-100">
          <div class="col-lg-4 mx-auto">
            <div class="auto-form-wrapper">
              <form id="frm-login" name="frm-login">
                @csrf
                <div class="form-group">
                  <label class="label">Username</label>
                  <div class="input-group">
                    <input type="text" id="username" name="username" class="form-control" placeholder="Username" value="prapan.260836@gmail.com">
                    <div class="input-group-append">
                      <span class="input-group-text">
                        <i class="mdi mdi-check-circle-outline"></i>
                      </span>
                    </div>
                  </div>
                </div>
                <div class="form-group">
                  <label class="label">Password</label>
                  <div class="input-group">
                    <input type="password" id="password" name="password" class="form-control" placeholder="*********" value="pack260836">
                    <div class="input-group-append">
                      <span class="input-group-text">
                        <i class="mdi mdi-check-circle-outline"></i>
                      </span>
                    </div>
                  </div>
                </div>
                <div class="form-group">
                  <button class="btn btn-primary submit-btn btn-block">Login</button>
                </div>
                <!-- <div class="form-group d-flex justify-content-between">
                  <a href="#" class="text-small forgot-password text-black">Forgot Password</a>
                </div> -->
              </form>
            </div>
            <ul class="auth-footer">
              <li>
                <a href="#">Conditions</a>
              </li>
              <li>
                <a href="#">Help</a>
              </li>
              <li>
                <a href="#">Terms</a>
              </li>
            </ul>
            <!-- <p class="footer-text text-center">copyright © 2020 Bootstrapdash. All rights reserved. Distributed By <a href="https://themewagon.com" target="_blank">ThemeWagon</a></p>
            <p class="footer-text text-center text-center"><a href="https://www.bootstrapdash.com/bootstrap-admin-template/" target="_blank"> Free Bootstrap template </a> from BootstrapDash templates</p> -->
          </div>
        </div>
      </div>
    </div>
  </div>
  <script src="{{ asset('assets/vendors/js/vendor.bundle.base.js') }}"></script>
  <script src="{{ asset('assets/vendors/js/vendor.bundle.addons.js') }}"></script>
  <script src="{{ asset('assets/js/shared/off-canvas.js') }}"></script>
  <script src="{{ asset('assets/js/shared/misc.js') }}"></script>
  <script src="{{ asset('assets/js/shared/jquery.cookie.js') }}"></script>
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
  <script type="text/javascript">
    var APP_BASE_URL = @json(url('/'));
  </script>
  <script>
    $.ajaxSetup({
      headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
      }
    });
    $(document).ready(function() {
      $('#frm-login').on('submit', function(e) {
        e.preventDefault();
        $.ajax({
          url: '/backend/v1/auth/check/login',
          type: 'post',
          data: {
            username: $('#username').val(),
            password: $('#password').val()
          },
          dataType: 'json',
          beforeSend: function() {
            // loading หรือปิดปุ่มได้ที่นี่ถ้าต้องการ
            $('.submit-btn').prop('disabled', true);
          },
          success: function(response) {
            if (response.success) {
              Swal.fire({
                icon: 'success',
                title: 'เข้าสู่ระบบสำเร็จ',
                text: 'กำลังเข้าสู่ระบบ...',
                timer: 2000,
                showConfirmButton: false
              }).then(() => {
                window.location.href = response.data.redirect;
              });
            } else {
              Swal.fire({
                icon: 'error',
                title: 'เข้าสู่ระบบไม่สำเร็จ',
                text: response.message || 'กรุณาตรวจสอบข้อมูลอีกครั้ง'
              });
            }
          },
          error: function(xhr, status, error) {
            Swal.fire({
              icon: 'error',
              title: 'เกิดข้อผิดพลาด',
              text: 'ไม่สามารถติดต่อเซิร์ฟเวอร์ได้'
            });
          },
          complete: function() {
            $('.submit-btn').prop('disabled', false);
          }
        });
      });
    });
  </script>

</body>

</html>