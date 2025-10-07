@extends('layouts.app')

@section('css-content')

@endsection

@section('content')
<div class="content-wrapper">
    <div class="row">
        @if(Auth::guard('user')->check())
        <div class="col-md-6 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="d-flex align-items-center pb-2">
                                <div class="dot-indicator bg-danger mr-2"></div>
                                <p class="mb-0">โอทีทำงาน</p>
                            </div>
                            <h4 class="font-weight-semibold">20 ชม.</h4>
                        </div>
                        <div class="col-md-6 mt-4 mt-md-0">
                            <div class="d-flex align-items-center pb-2">
                                <div class="dot-indicator bg-success mr-2"></div>
                                <p class="mb-0">โอที เสริม</p>
                            </div>
                            <h4 class="font-weight-semibold">5 ชม.</h4>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @endif
        <div class="col-lg-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <div class="d-flex justify-content-between align-items-center mb-3">
                        <h4 class="card-title"> ตารางการเข้างาน (ปัจจุบัน)</h4>
                        @if(Auth::guard('admin')->check() || Auth::guard('chief')->check())
                        <a href="#" class="btn btn-secondary" data-toggle="modal" data-target="#cameraModal">
                            <i class="mdi mdi-clock-outline"></i> ลงเวลา
                        </a>
                        @endif
                    </div>
                    <!-- <p class="card-description"> ตารางการเข้างานของพนักงานภายในวันปัจจุบัน </p> -->
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th> ลำดับที่ </th>
                                <th> ชื่อพนักงาน </th>
                                <th> ข้อมูลพนักงาน </th>
                                <th> วันที่ </th>
                                <th> เข้า 1 </th>
                                <th> ออก 1 </th>
                                <th> เข้า 2 </th>
                                <th> ออก 2 </th>
                                <th> โอที </th>
                                <th> โอทีเสริม </th>
                                @if(Auth::guard('admin')->check() || Auth::guard('chief')->check())
                                <th> เครื่องมือ </th>
                                @endif
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>1</td>
                                <td>สมชาย ใจดี</td>
                                <td>รหัส: EMP001<br>ตำแหน่ง: พนักงานทั่วไป</td>
                                <td>04/10/2025</td>
                                <td>08:30</td>
                                <td>12:00</td>
                                <td>13:00</td>
                                <td>17:00</td>
                                <td class="text-center">0</td>
                                <td class="text-center">0</td>
                                @if(Auth::guard('admin')->check() || Auth::guard('chief')->check())
                                <td>
                                    <button class="btn btn-sm btn-primary" data-toggle="modal" data-target="#editTimeModal">แก้ไข</button>
                                </td>
                                @endif
                            </tr>
                            <tr>
                                <td>2</td>
                                <td>สุดา ลางาม</td>
                                <td>รหัส: EMP002<br>ตำแหน่ง: เจ้าหน้าที่บัญชี</td>
                                <td>04/10/2025</td>
                                <td>09:00</td>
                                <td>12:15</td>
                                <td>13:15</td>
                                <td>18:00</td>
                                <td class="text-center">1</td>
                                <td class="text-center">0</td>
                                @if(Auth::guard('admin')->check() || Auth::guard('chief')->check())
                                <td>
                                    <button class="btn btn-sm btn-primary" data-toggle="modal" data-target="#editTimeModal">แก้ไข</button>
                                </td>
                                @endif
                            </tr>
                            <tr>
                                <td>3</td>
                                <td>ธีรชัย พนักดี</td>
                                <td>รหัส: EMP003<br>ตำแหน่ง: วิศวกร</td>
                                <td>04/10/2025</td>
                                <td>08:15</td>
                                <td>11:45</td>
                                <td>13:00</td>
                                <td>16:30</td>
                                <td class="text-center">0</td>
                                <td class="text-center">0</td>
                                @if(Auth::guard('admin')->check() || Auth::guard('chief')->check())
                                <td>
                                    <button class="btn btn-sm btn-primary" data-toggle="modal" data-target="#editTimeModal">แก้ไข</button>
                                </td>
                                @endif
                            </tr>
                            <tr>
                                <td>4</td>
                                <td>วรางคณา งานเยอะ</td>
                                <td>รหัส: EMP004<br>ตำแหน่ง: ฝ่ายบุคคล</td>
                                <td>04/10/2025</td>
                                <td>08:45</td>
                                <td>12:00</td>
                                <td>13:00</td>
                                <td>15:00</td>
                                <td class="text-center">0</td>
                                <td class="text-center">0</td>
                                @if(Auth::guard('admin')->check() || Auth::guard('chief')->check())
                                <td>
                                    <button class="btn btn-sm btn-primary" data-toggle="modal" data-target="#editTimeModal">แก้ไข</button>
                                </td>
                                @endif
                            </tr>
                            <tr>
                                <td>5</td>
                                <td>สมปอง ตั้งใจ</td>
                                <td>รหัส: EMP005<br>ตำแหน่ง: พนักงานคลังสินค้า</td>
                                <td>04/10/2025</td>
                                <td>07:55</td>
                                <td>11:45</td>
                                <td>12:45</td>
                                <td>20:00</td>
                                <td class="text-center">3</td>
                                <td class="text-center">1</td>
                                @if(Auth::guard('admin')->check() || Auth::guard('chief')->check())
                                <td>
                                    <button class="btn btn-sm btn-primary" data-toggle="modal" data-target="#editTimeModal">แก้ไข</button>
                                </td>
                                @endif
                            </tr>

                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Modal Time Picker -->
<!-- Modal -->
<div class="modal fade" id="editTimeModal" tabindex="-1" role="dialog" aria-labelledby="editTimeModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document"> <!-- modal-sm → modal default for 2-column layout -->
        <div class="modal-content">

            <!-- Header -->
            <div class="modal-header bg-primary text-white">
                <h5 class="modal-title font-weight-bold" id="editTimeModalLabel">แก้ไขเวลาเข้างาน</h5>
                <button type="button" class="close text-white" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>

            <!-- Body -->
            <div class="modal-body">
                <div class="container-fluid">
                    <div class="row">

                        <!-- เข้า1 -->
                        <div class="col-md-6 mb-3">
                            <label class="font-weight-bold">เข้า1</label>
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="mdi mdi-clock-outline"></i></span>
                                </div>
                                <input type="time" class="form-control" id="checkin1">
                            </div>
                        </div>

                        <!-- ออก1 -->
                        <div class="col-md-6 mb-3">
                            <label class="font-weight-bold">ออก1</label>
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="mdi mdi-clock-outline"></i></span>
                                </div>
                                <input type="time" class="form-control" id="checkout1">
                            </div>
                        </div>

                        <!-- เข้า2 -->
                        <div class="col-md-6 mb-3">
                            <label class="font-weight-bold">เข้า2</label>
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="mdi mdi-clock-outline"></i></span>
                                </div>
                                <input type="time" class="form-control" id="checkin2">
                            </div>
                        </div>

                        <!-- ออก2 -->
                        <div class="col-md-6 mb-3">
                            <label class="font-weight-bold">ออก2</label>
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="mdi mdi-clock-outline"></i></span>
                                </div>
                                <input type="time" class="form-control" id="checkout2">
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Footer -->
            <div class="modal-footer">
                <button type="button" class="btn btn-danger" onclick="saveTime()">บันทึก</button>
                <button type="button" class="btn btn-outline-secondary" data-dismiss="modal">ปิด</button>
            </div>

        </div>
    </div>
</div>

<!-- Modal กล้อง -->
<div class="modal fade" id="cameraModal" tabindex="-1" aria-labelledby="cameraModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="cameraModalLabel">ลงเวลาพนักงานโดยการสแกน Qr Code</h5>
            </div>
            <div class="modal-body text-center">
                <video id="video" width="100%" autoplay playsinline></video>
            </div>

            <div class="modal-footer">
                <button type="button" class="btn btn-primary" id="captureBtn">
                    <i class="mdi mdi-camera"></i> ถ่ายภาพ
                </button>
                <button type="button" class="btn btn-secondary" data-dismiss="modal">ปิด</button>
            </div>
        </div>
    </div>
</div>
<!-- Modal แสดงผลพนักงาน -->
<div class="modal fade" id="cameraModal" tabindex="-1" aria-labelledby="cameraModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="cameraModalLabel">สแกน QR Code ลงเวลา</h5>
                <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div id="qr-reader" style="width: 100%"></div>

                <div id="employeeInfo" class="mt-4" style="display: none;">
                    <div class="d-flex align-items-center">
                        <img id="empPhoto" src="" alt="รูปพนักงาน" width="80" class="me-3">
                        <div>
                            <h5 id="empName" class="mb-1"></h5>
                            <p id="empPosition" class="mb-1"></p>
                            <button class="btn btn-success" id="logTimeBtn">ลงเวลา</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection

@section('js-content')
<script src="https://unpkg.com/html5-qrcode" type="text/javascript"></script>
<script>
    window.addEventListener('load', function() {
        if (typeof $ === 'undefined') {
            console.error('jQuery ยังไม่โหลด!');
            return;
        }

        let stream;

        $('#cameraModal').on('shown.bs.modal', async function() {
            try {
                stream = await navigator.mediaDevices.getUserMedia({
                    video: true
                });
                document.getElementById('video').srcObject = stream;
            } catch (err) {
                console.error("ไม่สามารถเปิดกล้องได้:", err);
            }
        });

        $('#cameraModal').on('hidden.bs.modal', function() {
            if (stream) {
                stream.getTracks().forEach(track => track.stop());
                document.getElementById('video').srcObject = null;
            }
        });
    });
</script>
@endsection