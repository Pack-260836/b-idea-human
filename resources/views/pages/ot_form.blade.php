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
                        <h4 class="card-title"> ใบลาทั้งหมด</h4>
                        <a href="#" class="btn btn-primary" data-toggle="modal" data-target="#addOTModal">
                            <i class="mdi mdi-account-plus"></i> เพิ่มข้อมูล
                        </a>
                    </div>
                    <!-- <p class="card-description"> ตารางการเข้างานของพนักงานภายในวันปัจจุบัน </p> -->
                    <table class="table table-striped">
                        <thead>
                            <tr class="text-center">
                                <th>วันที่</th>
                                <th>รายชื่อ</th>
                                <th>หมายเหตุ</th>
                                <th>จำนวนชม.</th>
                                <th>เครื่องมือ</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td class="text-center">01/10/2025</td>
                                <td>สมชาย ใจดี</td>
                                <td>อบรมความปลอดภัย</td>
                                <td class="text-center">3</td>
                                <td class="text-center">
                                    <button class="btn btn-sm btn-primary">แก้ไข</button>
                                    <button class="btn btn-sm btn-danger">ลบ</button>
                                </td>
                            </tr>
                            <tr>
                                <td class="text-center">02/10/2025</td>
                                <td>สายฝน สุขใจ</td>
                                <td>เวิร์กช็อปพัฒนาทักษะ</td>
                                <td class="text-center">5</td>
                                <td class="text-center">
                                    <button class="btn btn-sm btn-primary">แก้ไข</button>
                                    <button class="btn btn-sm btn-danger">ลบ</button>
                                </td>
                            </tr>
                            <tr>
                                <td class="text-center">03/10/2025</td>
                                <td>ธีรพงษ์ รัตนโชติ</td>
                                <td>ประชุมประจำเดือน</td>
                                <td class="text-center">2</td>
                                <td class="text-center">
                                    <button class="btn btn-sm btn-primary">แก้ไข</button>
                                    <button class="btn btn-sm btn-danger">ลบ</button>
                                </td>
                            </tr>
                            <tr>
                                <td class="text-center">04/10/2025</td>
                                <td>พัชราภา ตั้งตรง</td>
                                <td>ฝึกซ้อมดับเพลิง</td>
                                <td class="text-center">4</td>
                                <td class="text-center">
                                    <button class="btn btn-sm btn-primary">แก้ไข</button>
                                    <button class="btn btn-sm btn-danger">ลบ</button>
                                </td>
                            </tr>
                            <tr>
                                <td class="text-center">05/10/2025</td>
                                <td>ชญานิษฐ์ ศรีสุข</td>
                                <td>สัมมนาออนไลน์</td>
                                <td class="text-center">6</td>
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
<div class="modal fade" id="addOTModal" tabindex="-1" role="dialog" data-backdrop="static" data-keyboard="false" aria-labelledby="addOTModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <form id="OTForm">
                <div class="modal-header">
                    <h5 class="modal-title" id="addOTModalLabel">แบบฟอร์มขอทำ OT</h5>
                </div>
                <div class="modal-body" style="font-size: 18px;">
                    <div class="row">
                        <div class="form-group col-md-6">
                            <label for="ot_date">วันที่</label>
                            <input type="date" class="form-control" id="ot_date" name="ot_date" required>
                        </div>
                        <div class="form-group col-md-6">
                            <label for="ot_hours">จำนวนชั่วโมง</label>
                            <input type="number" min="1" class="form-control" id="ot_hours" name="ot_hours">
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group col-md-12">
                            <label for="employee_name">ชื่อ-นามสกุลพนักงาน</label>
                            <select class="form-control" id="employee_name" name="employee_name" required>
                                <option value="">เลือกชื่อพนักงาน</option>
                                <option value="สมชาย ใจดี">สมชาย ใจดี</option>
                                <option value="สุดา ลางาม">สุดา ลางาม</option>
                                <!-- เพิ่มรายชื่อจากฐานข้อมูล -->
                            </select>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="ot_reason">หมายเหตุ <span class="text-danger">*</span></label>
                        <textarea class="form-control" id="ot_reason" name="ot_reason" rows="3" required></textarea>
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