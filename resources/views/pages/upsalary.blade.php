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
                        <h4 class="card-title mb-0">ตารางข้อมูลปรับเงินเดือน</h4>
                        <a href="#" class="btn btn-primary" data-toggle="modal" data-target="#addUpSalaryModal">
                            <i class="mdi mdi-account-plus"></i> เพิ่มข้อมูล
                        </a>
                    </div>
                    <!-- <p class="card-description"> ตารางการเข้างานของพนักงานภายในวันปัจจุบัน </p> -->
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th>ลำดับที่</th>
                                <th>ชื่อพนักงาน</th>
                                <th>เงินเดือนเก่า</th>
                                <th>เงินเดือนใหม่</th>
                                <th>มีผลตั้งแต่วันที่</th>
                                <th>สถานะใบงาน</th>
                                <th>เครื่องมือ</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td class="text-center">1</td>
                                <td>สมชาย ใจดี</td>
                                <td class="text-end">18,000.00</td>
                                <td class="text-end text-success fw-bold">20,000.00</td>
                                <td class="text-center">01/10/2025</td>
                                <td class="text-center"><span class="badge bg-success">อนุมัติแล้ว</span></td>
                                <td class="text-center">
                                    <button class="btn btn-sm btn-primary">แก้ไข</button>
                                    <button class="btn btn-sm btn-danger">ลบ</button>
                                </td>
                            </tr>
                            <tr>
                                <td class="text-center">2</td>
                                <td>สายฝน สุขใจ</td>
                                <td class="text-end">22,500.00</td>
                                <td class="text-end text-success fw-bold">24,000.00</td>
                                <td class="text-center">01/11/2025</td>
                                <td class="text-center"><span class="badge bg-warning text-dark">รอดำเนินการ</span></td>
                                <td class="text-center">
                                    <button class="btn btn-sm btn-primary">แก้ไข</button>
                                    <button class="btn btn-sm btn-danger">ลบ</button>
                                </td>
                            </tr>
                            <tr>
                                <td class="text-center">3</td>
                                <td>ธีรพงษ์ รัตนโชติ</td>
                                <td class="text-end">25,000.00</td>
                                <td class="text-end text-success fw-bold">27,000.00</td>
                                <td class="text-center">15/09/2025</td>
                                <td class="text-center"><span class="badge bg-success">อนุมัติแล้ว</span></td>
                                <td class="text-center">
                                    <button class="btn btn-sm btn-primary">แก้ไข</button>
                                    <button class="btn btn-sm btn-danger">ลบ</button>
                                </td>
                            </tr>
                            <tr>
                                <td class="text-center">4</td>
                                <td>พัชราภา ตั้งตรง</td>
                                <td class="text-end">19,800.00</td>
                                <td class="text-end text-success fw-bold">21,000.00</td>
                                <td class="text-center">10/10/2025</td>
                                <td class="text-center"><span class="badge bg-danger">ไม่อนุมัติ</span></td>
                                <td class="text-center">
                                    <button class="btn btn-sm btn-primary">แก้ไข</button>
                                    <button class="btn btn-sm btn-danger">ลบ</button>
                                </td>
                            </tr>
                            <tr>
                                <td class="text-center">5</td>
                                <td>ชญานิษฐ์ ศรีสุข</td>
                                <td class="text-end">20,000.00</td>
                                <td class="text-end text-success fw-bold">22,000.00</td>
                                <td class="text-center">01/12/2025</td>
                                <td class="text-center"><span class="badge bg-warning text-dark">รอดำเนินการ</span></td>
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
<div class="modal fade" id="addUpSalaryModal" tabindex="-1" role="dialog" data-backdrop="static" data-keyboard="false" aria-labelledby="addUpSalaryModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <form id="UpSalryForm">
                <div class="modal-header">
                    <h5 class="modal-title" id="addUpSalaryModalLabel">แบบฟอร์มปรับเงินเดือน</h5>
                </div>
                <div class="modal-body">
                    <div class="form-group mb-3">
                        <label for="employee_id" class="form-label">รายชื่อพนักงาน</label>
                        <select class="form-control" id="employee_id" name="employee_id" required>
                            <option value="">-- เลือกพนักงาน --</option>
                            <option value="SME0002">SME0002 : ขวัญจิรา อางนานนท์ Kwanjira Angnanon</option>
                            <!-- เพิ่มพนักงานจากฐานข้อมูล -->
                        </select>
                        <small class="text-muted mt-2 d-block">
                            ฝ่าย: ไอทีและสารสนเทศ | แผนก: โปรแกรมเมอร์ | ตำแหน่ง: Project Manager
                        </small>
                    </div>

                    <div class="row mb-3">
                        <div class="form-group col-md-6">
                            <label class="form-label">เงินเดือนเก่า</label>
                            <div class="input-group">
                                <span class="input-group-text">฿</span>
                                <input type="text" class="form-control" name="old_salary" id="old_salary" value="50000.00" readonly>
                            </div>
                        </div>

                        <div class="form-group col-md-6">
                            <label class="form-label">เงินเดือนใหม่</label>
                            <div class="input-group">
                                <span class="input-group-text">฿</span>
                                <input type="number" class="form-control" name="new_salary" id="new_salary" required>
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="adjust_note" class="form-label">รายละเอียด</label>
                        <textarea class="form-control" id="adjust_note" name="adjust_note" rows="3" placeholder="หมายเหตุในการปรับเงินเดือน"></textarea>
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