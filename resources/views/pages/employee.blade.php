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
                            <?php foreach ($employee_data as $row => $employee) { ?>
                                <tr>
                                    <td>{{ $row + 1 }}</td>
                                    <td>
                                        <div class="d-flex align-items-center">
                                            <img
                                                src="{{ !empty($employee['image_profile'])
                                                            ? asset($employee['image_profile'])
                                                            : asset('assets/images/human-01.svg') }}"
                                                alt="avatar" width="64" height="64" style="margin-right: 12px; object-fit: cover;" class="rounded-circle">
                                            <div>
                                                <div><strong>SME0054</strong> </div>
                                                <div>{{ $employee['name_th']
                                                            ? $employee['prefix_th'] . ' ' . $employee['name_th']
                                                            : $employee['prefix_en'] . ' ' . $employee['name_en'] }}</div>
                                            </div>
                                        </div>
                                    </td>
                                    <td>
                                        ตำแหน่ง : {{ $employee['position_name_th'] }}<br>
                                        ประเภท: {{ $employee['emp_type'] == 1 ? 'พนักงานรายเดือน' : 'พนักงานรายวัน' }}<br>
                                    </td>
                                    <td>
                                        @switch($employee['emp_work_status'])
                                        @case(1)
                                        <span class="badge bg-success">ปกติ</span>
                                        @break
                                        @case(2)
                                        <span class="badge bg-warning text-dark">พักงาน</span>
                                        @break
                                        @case(3)
                                        <span class="badge bg-danger">พ้นสภาพ</span>
                                        @break
                                        @default
                                        <span class="badge bg-secondary">ไม่ทราบ</span>
                                        @endswitch
                                    </td>
                                    <td>
                                        <a href="https://api.qrserver.com/v1/create-qr-code/?data={{ $employee['user_id'] }}&size=320x320" target="_blank">
                                            <img src="https://api.qrserver.com/v1/create-qr-code/?data={{ $employee['user_id'] }}&size=80x80" alt="QR Code">
                                        </a>
                                    </td>
                                    <td>
                                        <form id="goToEditForm" action="{{ url('/admin/employee/edit') }}" method="POST" style="display: none;">
                                            @csrf
                                            <input type="hidden" name="user_id" value="{{ $employee['user_id'] }}">
                                        </form>
                                        <div class="dropdown">
                                            <button class="btn btn-primary icon-btn dropdown-toggle" type="button" id="dropdownMenuIconButton6" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                <i class="mdi mdi-menu"></i>
                                            </button>
                                            <div class="dropdown-menu" aria-labelledby="dropdownMenuIconButton6">
                                                <a class="dropdown-item" href="#" onclick="document.getElementById('goToEditForm').submit();">ข้อมูลพนักงาน</a>
                                                <a class="dropdown-item" href="#">รีเซ็ตรหัสผ่าน</a>
                                                <a class="dropdown-item" href="#">สถานะพนักงาน</a>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                            <?php } ?>
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