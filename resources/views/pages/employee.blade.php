@extends('layouts.app')

@section('css-content')

@endsection

@section('content')
<div class="content-wrapper">
    <div class="row">
        <div class="col-lg-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <div class="d-flex justify-content-between align-items-center mb-3">
                        <h4 class="card-title mb-0">ข้อมูลพนักงานทั้งหมด</h4>
                        <a href="{{ url('/admin/employee/add') }}" class="btn btn-primary">
                            <i class="mdi mdi-account-plus"></i> เพิ่มข้อมูล
                        </a>
                    </div>
                    <!-- <p class="card-description"> ตารางการเข้างานของพนักงานภายในวันปัจจุบัน </p> -->
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th>ลำดับ</th>
                                <th>พนักงาน</th>
                                <th>ตำแหน่ง</th>
                                <th>สถานะ</th>
                                <th>Qr Code</th>
                                <th>เครื่องมือ</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>1</td>
                                <td>
                                    <div class="d-flex align-items-center">
                                        <img src="{{ asset('assets/images/human-01.svg') }}" alt="avatar" width="32" class="me-2">
                                        <div>
                                            <div><strong>SME0054</strong> </div>
                                            <div>นางสาว ศลิษา เทพทอง</div>
                                        </div>
                                    </div>
                                </td>
                                <td>
                                    ตำแหน่ง : System Analyst & Project Coordinator<br>
                                    ประเภท: พนักงานรายเดือน<br>
                                    กลุ่มพนักงาน: ทดลองงาน
                                </td>
                                <td><span class="badge bg-success">ปกติ</span></td>
                                <td>
                                    <img src="https://api.qrserver.com/v1/create-qr-code/?data=SME0054&size=80x80" alt="QR Code">
                                </td>
                                <td>
                                    <div class="dropdown">
                                        <button class="btn btn-primary icon-btn dropdown-toggle" type="button" id="dropdownMenuIconButton6" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                            <i class="mdi mdi-menu"></i>
                                        </button>
                                        <div class="dropdown-menu" aria-labelledby="dropdownMenuIconButton6">
                                            <a class="dropdown-item" href="#">ข้อมูลพนักงาน</a>
                                            <a class="dropdown-item" href="#">รีเซ็ตรหัสผ่าน</a>
                                            <a class="dropdown-item" href="#">สถานะพนักงาน</a>
                                        </div>
                                    </div>
                                </td>
                            </tr>

                            <tr>
                                <td>2</td>
                                <td>
                                    <div class="d-flex align-items-center">
                                        <img src="{{ asset('assets/images/human-01.svg') }}" alt="avatar" width="32" class="me-2">
                                        <div>
                                            <div><strong>SME0053</strong> </div>
                                            <div>นาย ลิปปกร การะเวก</div>
                                        </div>
                                    </div>
                                </td>
                                <td>
                                    ตำแหน่ง : Mobile Application Developer<br>
                                    ประเภท: พนักงานรายเดือน<br>
                                    กลุ่มพนักงาน: ทดลองงาน
                                </td>
                                <td><span class="badge bg-success">ปกติ</span></td>
                                <td>
                                    <img src="https://api.qrserver.com/v1/create-qr-code/?data=SME0053&size=80x80" alt="QR Code">
                                </td>
                                <td>
                                    <div class="dropdown">
                                        <button class="btn btn-primary icon-btn dropdown-toggle" type="button" id="dropdownMenuIconButton6" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                            <i class="mdi mdi-menu"></i>

                                        </button>
                                        <div class="dropdown-menu" aria-labelledby="dropdownMenuIconButton6">
                                            <a class="dropdown-item" href="#">ข้อมูลพนักงาน</a>
                                            <a class="dropdown-item" href="#">รีเซ็ตรหัสผ่าน</a>
                                            <a class="dropdown-item" href="#">สถานะพนักงาน</a>
                                        </div>
                                    </div>
                                </td>
                            </tr>

                            <tr>
                                <td>3</td>
                                <td>
                                    <div class="d-flex align-items-center">
                                        <img src="{{ asset('assets/images/human-01.svg') }}" alt="avatar" width="32" class="me-2">
                                        <div>
                                            <div><strong>SME0052</strong> </div>
                                            <div>นาย อาทิตย์ รัตนวิเศษสุกร์</div>
                                        </div>
                                    </div>
                                </td>
                                <td>
                                    ตำแหน่ง : Back End Web Developer<br>
                                    ประเภท: พนักงานรายเดือน<br>
                                    กลุ่มพนักงาน: ทดลองงาน
                                </td>
                                <td><span class="badge bg-success">ปกติ</span></td>
                                <td>
                                    <img src="https://api.qrserver.com/v1/create-qr-code/?data=SME0052&size=80x80" alt="QR Code">
                                </td>
                                <td>
                                    <div class="dropdown">
                                        <button class="btn btn-primary icon-btn dropdown-toggle" type="button" id="dropdownMenuIconButton6" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                            <i class="mdi mdi-menu"></i>

                                        </button>
                                        <div class="dropdown-menu" aria-labelledby="dropdownMenuIconButton6">
                                            <a class="dropdown-item" href="#">ข้อมูลพนักงาน</a>
                                            <a class="dropdown-item" href="#">รีเซ็ตรหัสผ่าน</a>
                                            <a class="dropdown-item" href="#">สถานะพนักงาน</a>
                                        </div>
                                    </div>
                                </td>
                            </tr>

                            <tr>
                                <td>4</td>
                                <td>
                                    <div class="d-flex align-items-center">
                                        <img src="{{ asset('assets/images/human-01.svg') }}" alt="avatar" width="32" class="me-2">
                                        <div>
                                            <div><strong>SME0051</strong> </div>
                                            <div>นาย วรัญญู ใจตรง</div>
                                        </div>
                                    </div>
                                </td>
                                <td>
                                    ตำแหน่ง : Mobile Application Developer<br>
                                    ประเภท: พนักงานรายเดือน<br>
                                    กลุ่มพนักงาน: ทดลองงาน
                                </td>
                                <td><span class="badge bg-danger">พ้นสภาพ</span></td>
                                <td>
                                    <img src="https://api.qrserver.com/v1/create-qr-code/?data=SME0051&size=320x320" alt="QR Code">
                                </td>
                                <td>
                                    <div class="dropdown">
                                        <button class="btn btn-primary icon-btn dropdown-toggle" type="button" id="dropdownMenuIconButton6" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                            <i class="mdi mdi-menu"></i>

                                        </button>
                                        <div class="dropdown-menu" aria-labelledby="dropdownMenuIconButton6">
                                            <a class="dropdown-item" href="#">ข้อมูลพนักงาน</a>
                                            <a class="dropdown-item" href="#">รีเซ็ตรหัสผ่าน</a>
                                            <a class="dropdown-item" href="#">สถานะพนักงาน</a>
                                        </div>
                                    </div>
                                </td>
                            </tr>

                            <tr>
                                <td>5</td>
                                <td>
                                    <div class="d-flex align-items-center">
                                        <img src="{{ asset('assets/images/human-01.svg') }}" alt="avatar" width="32" class="me-2">
                                        <div>
                                            <div><strong>SME0050</strong> </div>
                                            <div>นางสาว รุ่งนภา แสงใส</div>
                                        </div>
                                    </div>
                                </td>
                                <td>
                                    ตำแหน่ง : Front End Web Developer<br>
                                    ประเภท: พนักงานรายเดือน<br>
                                    กลุ่มพนักงาน: ทดลองงาน
                                </td>
                                <td><span class="badge bg-warning">พักงาน</span></td>
                                <td>
                                    <img src="https://api.qrserver.com/v1/create-qr-code/?data=SME0050&size=160x160" alt="QR Code">
                                </td>
                                <td>
                                    <div class="dropdown">
                                        <button class="btn btn-primary icon-btn dropdown-toggle" type="button" id="dropdownMenuIconButton6" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                            <i class="mdi mdi-menu"></i>
                                        </button>
                                        <div class="dropdown-menu" aria-labelledby="dropdownMenuIconButton6">
                                            <a class="dropdown-item" href="#">ข้อมูลพนักงาน</a>
                                            <a class="dropdown-item" href="#">รีเซ็ตรหัสผ่าน</a>
                                            <a class="dropdown-item" href="#">สถานะพนักงาน</a>
                                        </div>
                                    </div>
                                </td>
                            </tr>

                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('js-content')

@endsection