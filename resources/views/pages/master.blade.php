@extends('layouts.app')

@section('css-content')
<link href="https://cdn.jsdelivr.net/npm/@mdi/font@7.4.47/css/materialdesignicons.min.css" rel="stylesheet">
@endsection

@section('content')
<div class="content-wrapper">
    <div class="row">
        <div class="col-md-3 mb-4">
            <a href="{{ url('/admin//company') }}" class="text-decoration-none">
                <div class="card shadow-sm text-center h-100">
                    <div class="card-body">
                        <div class="mb-2">
                            <i class="mdi mdi-office-building-outline" style="font-size: 48px; color: #007bff;"></i>
                        </div>
                        <h5 class="card-title text-dark">ข้อมูลบริษัท</h5>
                        <p class="card-text text-muted">รายละเอียดทั่วไปของบริษัท</p>
                    </div>
                </div>
            </a>
        </div>



        <div class="col-md-3 mb-4">
            <a href="{{ url('/admin/master/timework') }}" class="text-decoration-none">
                <div class="card shadow-sm text-center h-100">
                    <div class="card-body">
                        <div class="mb-2">
                            <i class="mdi mdi-account-clock-outline" style="font-size: 48px; color: #007bff;"></i>
                        </div>
                        <h5 class="card-title text-dark">กะการทำงาน</h5>
                        <p class="card-text text-muted">รูปแบบช่วงเวลาทำงาน</p>
                    </div>
                </div>
            </a>
        </div>

        <div class="col-md-3 mb-4">
            <a href="{{ url('/admin/master/position') }}" class="text-decoration-none">
                <div class="card shadow-sm text-center h-100">
                    <div class="card-body">
                        <div class="mb-2">
                            <i class="mdi mdi-briefcase-outline" style="font-size: 48px; color: #007bff;"></i>
                        </div>
                        <h5 class="card-title text-dark">ตำแหน่งงาน</h5>
                        <p class="card-text text-muted">จัดการตำแหน่งงานในองค์กร</p>
                    </div>
                </div>
            </a>
        </div>

        <div class="col-md-3 mb-4">
            <a href="{{ url('/admin/master/overtime') }}" class="text-decoration-none">
                <div class="card shadow-sm text-center h-100">
                    <div class="card-body">
                        <div class="mb-2">
                            <i class="mdi mdi-timer-outline" style="font-size: 48px; color: #007bff;"></i>
                        </div>
                        <h5 class="card-title text-dark">ตั้งค่าโอที</h5>
                        <p class="card-text text-muted">อัตราการคิดค่าล่วงเวลา</p>
                    </div>
                </div>
            </a>
        </div>

        <div class="col-md-3 mb-4">
            <a href="{{ url('/admin/master/allowance') }}" class="text-decoration-none">
                <div class="card shadow-sm text-center h-100">
                    <div class="card-body">
                        <div class="mb-2">
                            <i class="mdi mdi-cash-multiple" style="font-size: 48px; color: #007bff;"></i>
                        </div>
                        <h5 class="card-title text-dark">ตั้งค่าเบี้ยเลี้ยง</h5>
                        <p class="card-text text-muted">การกำหนดเบี้ยเลี้ยงพนักงาน</p>
                    </div>
                </div>
            </a>
        </div>
    </div>
</div>
@endsection

@section('js-content')

@endsection