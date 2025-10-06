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
                        <h4 class="card-title mb-0">ข้อมูลตำแหน่ง</h4>
                        <a href="{{ url('/admin/employee/add') }}" class="btn btn-primary">
                            <i class="mdi mdi-account-plus"></i> เพิ่มข้อมูล
                        </a>
                    </div>
                    <!-- <p class="card-description"> ตารางการเข้างานของพนักงานภายในวันปัจจุบัน </p> -->
                    <table class="table table-striped">
                        <thead>
                            <tr class="text-center">
                                <th>ลำดับที่</th>
                                <th>ชื่อตำแหน่ง</th>
                                <th>เครื่องมือ</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td class="text-center">1</td>
                                <td>เจ้าหน้าที่ธุรการ</td>
                                <td class="text-center">
                                    <button class="btn btn-sm btn-primary">แก้ไข</button>
                                    <button class="btn btn-sm btn-danger">ลบ</button>
                                </td>
                            </tr>
                            <tr>
                                <td class="text-center">2</td>
                                <td>นักวิชาการคอมพิวเตอร์</td>
                                <td class="text-center">
                                    <button class="btn btn-sm btn-primary">แก้ไข</button>
                                    <button class="btn btn-sm btn-danger">ลบ</button>
                                </td>
                            </tr>
                            <tr>
                                <td class="text-center">3</td>
                                <td>หัวหน้าฝ่ายบุคคล</td>
                                <td class="text-center">
                                    <button class="btn btn-sm btn-primary">แก้ไข</button>
                                    <button class="btn btn-sm btn-danger">ลบ</button>
                                </td>
                            </tr>
                            <tr>
                                <td class="text-center">4</td>
                                <td>ช่างเทคนิค</td>
                                <td class="text-center">
                                    <button class="btn btn-sm btn-primary">แก้ไข</button>
                                    <button class="btn btn-sm btn-danger">ลบ</button>
                                </td>
                            </tr>
                            <tr>
                                <td class="text-center">5</td>
                                <td>พนักงานขับรถ</td>
                                <td class="text-center">
                                    <button class="btn btn-sm btn-primary">แก้ไข</button>
                                    <button class="btn btn-sm btn-danger">ลบ</button>
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