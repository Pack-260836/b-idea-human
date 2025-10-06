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
                        <h4 class="card-title"> Job ทั้งหมด</h4>
                        <a href="#" class="btn btn-primary" data-toggle="modal" data-target="#addJobModal">
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
                                <th>จำนวนเงิน(บาท)</th>
                                <th>เครื่องมือ</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr class="text-center">
                                <td>01/10/2025</td>
                                <td>สมชาย ใจดี</td>
                                <td>ทำงานล่วงเวลาช่วงเย็น (ระบบไฟฟ้า)</td>
                                <td class="text-end">450.00</td>
                                <td>
                                    <button class="btn btn-sm btn-primary">แก้ไข</button>
                                    <button class="btn btn-sm btn-danger">ลบ</button>
                                </td>
                            </tr>
                            <tr class="text-center">
                                <td>02/10/2025</td>
                                <td>สุดา ลางาม</td>
                                <td>ร่วมประชุมโครงการเร่งด่วน</td>
                                <td class="text-end">300.00</td>
                                <td>
                                    <button class="btn btn-sm btn-primary">แก้ไข</button>
                                    <button class="btn btn-sm btn-danger">ลบ</button>
                                </td>
                            </tr>
                            <tr class="text-center">
                                <td>03/10/2025</td>
                                <td>ธีรพงษ์ รัตนโชติ</td>
                                <td>ตรวจเช็คอุปกรณ์หน้างาน (วันหยุด)</td>
                                <td class="text-end">600.00</td>
                                <td>
                                    <button class="btn btn-sm btn-primary">แก้ไข</button>
                                    <button class="btn btn-sm btn-danger">ลบ</button>
                                </td>
                            </tr>
                            <tr class="text-center">
                                <td>04/10/2025</td>
                                <td>พัชราภา ตั้งตรง</td>
                                <td>สแตนด์บายระบบแจ้งเตือน</td>
                                <td class="text-end">400.00</td>
                                <td>
                                    <button class="btn btn-sm btn-primary">แก้ไข</button>
                                    <button class="btn btn-sm btn-danger">ลบ</button>
                                </td>
                            </tr>
                            <tr class="text-center">
                                <td>05/10/2025</td>
                                <td>ชญานิษฐ์ ศรีสุข</td>
                                <td>ส่งมอบงานช่วงเย็น (รายงานลูกค้า)</td>
                                <td class="text-end">350.00</td>
                                <td>
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
<div class="modal fade" id="addJobModal" tabindex="-1" role="dialog" data-backdrop="static" data-keyboard="false" aria-labelledby="addJobModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <form id="jobForm">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="jobModalLabel">เพิ่มข้อมูล Job</h5>
                    </div>

                    <div class="modal-body" style="font-size: 18px;">
                        <div class="row mb-3">
                            <div class="form-group col-md-6">
                                <label for="job_date">วันที่</label>
                                <input type="date" class="form-control" id="job_date" name="job_date" required>
                            </div>

                            <div class="form-group col-md-6">
                                <label for="job_amount">จำนวนเงิน (บาท)</label>
                                <input type="number" class="form-control text-end" id="job_amount" name="job_amount" min="0" step="0.01" placeholder="เช่น 500.00" required>
                            </div>

                        </div>


                        <div class="row mb-3">
                            <div class="form-group col-md-12">
                                <label for="employee_name">รายชื่อพนักงาน</label>
                                <select class="form-control" id="employee_name" name="employee_name" required>
                                    <option value="">-- เลือกพนักงาน --</option>
                                    <option value="สมชาย ใจดี">สมชาย ใจดี</option>
                                    <option value="สุดา ลางาม">สุดา ลางาม</option>
                                    <!-- เพิ่มรายชื่อจากฐานข้อมูล -->
                                </select>
                            </div>
                        </div>

                        <div class="form-group mb-3">
                            <label for="job_note">หมายเหตุ</label>
                            <textarea class="form-control" id="job_note" name="job_note" rows="3" placeholder="รายละเอียดของงานที่ทำ เช่น ตรวจระบบ, ส่งรายงานลูกค้า" required></textarea>
                        </div>
                    </div>

                    <div class="modal-footer">
                        <button type="submit" class="btn btn-primary">บันทึกข้อมูล</button>
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">ปิด</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection

@section('js-content')

@endsection