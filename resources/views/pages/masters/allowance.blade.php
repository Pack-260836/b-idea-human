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
                        <h4 class="card-title mb-0">ข้อมูลเบี้ยเลี้ยง</h4>
                        <a href="#" class="btn btn-primary" data-toggle="modal" data-target="#addAllowanceModal">
                            <i class="mdi mdi-account-plus"></i> เพิ่มข้อมูล
                        </a>
                    </div>
                    <!-- <p class="card-description"> ตารางการเข้างานของพนักงานภายในวันปัจจุบัน </p> -->
                    <table class="table table-striped">
                        <thead>
                            <tr class="text-center">
                                <th>ลำดับที่</th>
                                <th>ชื่อตำแหน่ง</th>
                                <th>จำนวนเบี้ยเลี้ยง (บาท / วัน) </th>
                                <th>เครื่องมือ</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td class="text-center">1</td>
                                <td>เจ้าหน้าที่ภาคสนาม</td>
                                <td class="text-end">250.00</td>
                                <td class="text-center">
                                    <button class="btn btn-sm btn-primary">แก้ไข</button>
                                    <button class="btn btn-sm btn-danger">ลบ</button>
                                </td>
                            </tr>
                            <tr>
                                <td class="text-center">2</td>
                                <td>วิศวกรโครงการ</td>
                                <td class="text-end">400.00</td>
                                <td class="text-center">
                                    <button class="btn btn-sm btn-primary">แก้ไข</button>
                                    <button class="btn btn-sm btn-danger">ลบ</button>
                                </td>
                            </tr>
                            <tr>
                                <td class="text-center">3</td>
                                <td>ผู้จัดการเขต</td>
                                <td class="text-end">500.00</td>
                                <td class="text-center">
                                    <button class="btn btn-sm btn-primary">แก้ไข</button>
                                    <button class="btn btn-sm btn-danger">ลบ</button>
                                </td>
                            </tr>
                            <tr>
                                <td class="text-center">4</td>
                                <td>พนักงานบริการ</td>
                                <td class="text-end">180.00</td>
                                <td class="text-center">
                                    <button class="btn btn-sm btn-primary">แก้ไข</button>
                                    <button class="btn btn-sm btn-danger">ลบ</button>
                                </td>
                            </tr>
                            <tr>
                                <td class="text-center">5</td>
                                <td>หัวหน้าทีม</td>
                                <td class="text-end">350.00</td>
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

<!-- Modal: เพิ่มข้อมูลใบ OT -->
<div class="modal fade" id="addAllowanceModal" tabindex="-1" role="dialog" data-backdrop="static" data-keyboard="false" aria-labelledby="addAllowanceModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <form id="OTForm">
                <div class="modal-header">
                    <h5 class="modal-title" id="addAllowanceModalLabel">แบบฟอร์มเบี้ยเลี้ยง</h5>
                </div>
                <div class="modal-body" style="font-size: 18px;">
                    <div class="form-group mb-3">
                        <label for="position_id" class="form-label">ชื่อตำแหน่ง <span class="text-danger">*</span></label>
                        <select class="form-control" id="position_id" name="position_id" required>
                            <option value="">-- เลือกตำแหน่ง --</option>
                            <option value="1">เจ้าหน้าที่ธุรการ</option>
                            <option value="2">ช่างเทคนิค</option>
                            <option value="3">พนักงานขับรถ</option>
                            <option value="4">เจ้าหน้าที่บัญชี</option>
                        </select>
                    </div>
                    <div class="form-group mb-3">
                        <label for="allowance_rate" class="form-label">จำนวนเบี้ยเลี้ยง (บาท / วัน) <span class="text-danger">*</span></label>
                        <input type="number" class="form-control text-end" id="allowance_rate" name="allowance_rate" min="0" step="0.01" required placeholder="เช่น 250.00">
                    </div>
                </div>

                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary">บันทึก</button>
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">ปิด</button>
                </div>
            </form>

        </div>
    </div>
</div>
@endsection

@section('js-content')

@endsection