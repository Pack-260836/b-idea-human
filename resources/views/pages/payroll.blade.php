@extends('layouts.app')

@section('css-content')

@endsection

@section('content')
<div class="content-wrapper">
    <div class="row">
        <div class="col-md-3 mb-4">
            <a href="{{ url('/admin/payroll/process') }}" class="text-decoration-none">
                <div class="card shadow-sm text-center h-100">
                    <div class="card-body">
                        <div class="mb-2">
                            <i class="mdi mdi-calculator-variant" style="font-size: 48px; color: #007bff;"></i>
                        </div>
                        <h5 class="card-title text-dark">คำนวณเงินเดือน</h5>
                        <p class="card-text text-muted">รายละเอียดทั่วไปของบริษัท</p>
                    </div>
                </div>
            </a>
        </div>



        <div class="col-md-3 mb-4">
            <a href="{{ url('/admin/payroll/report') }}" class="text-decoration-none">
                <div class="card shadow-sm text-center h-100">
                    <div class="card-body">
                        <div class="mb-2">
                            <i class="mdi mdi-file-document-outline" style="font-size: 48px; color: #007bff;"></i>
                        </div>
                        <h5 class="card-title text-dark">รายงานเงินเดือน</h5>
                        <p class="card-text text-muted">รูปแบบช่วงเวลาทำงาน</p>
                    </div>
                </div>
            </a>
        </div>
    </div>
</div>
@endsection

@section('js-content')

@endsection