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
                        <a href="#" class="btn btn-primary" data-toggle="modal" data-target="#addLeaveModal">
                            <i class="mdi mdi-account-plus"></i> เพิ่มข้อมูล
                        </a>
                    </div>
                    <!-- <p class="card-description"> ตารางการเข้างานของพนักงานภายในวันปัจจุบัน </p> -->
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th> วันที่ยื่นเรื่อง </th>
                                <th> ชื่อ </th>
                                <th> วันที่ลา </th>
                                <th> ประเภทการลา </th>
                                <th> สาเหตุการลา </th>
                                <th> ข้อมูลใบลา </th>
                                <th> เครื่องมือ </th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>01/10/2025</td>
                                <td>สมชาย ใจดี</td>
                                <td>03/10/2025</td>
                                <td>ลากิจ</td>
                                <td>ไปติดต่อหน่วยงานราชการ</td>
                                <td><a href="#">ดูใบลา</a></td>
                                <td>
                                    <button class="btn btn-sm btn-danger">ลบ</button>
                                </td>
                            </tr>
                            <tr>
                                <td>02/10/2025</td>
                                <td>สุดา ลางาม</td>
                                <td>04/10/2025 - 06/10/2025</td>
                                <td>ลาป่วย</td>
                                <td>เป็นไข้หวัดใหญ่</td>
                                <td><a href="#">ดูใบรับรองแพทย์</a></td>
                                <td>
                                    <button class="btn btn-sm btn-danger">ลบ</button>
                                </td>
                            </tr>
                            <tr>
                                <td>03/10/2025</td>
                                <td>ธีรชัย พนักดี</td>
                                <td>05/10/2025</td>
                                <td>ลาป่วยอันเนื่องจากอุบัติเหตุจากงาน</td>
                                <td>ได้รับบาดเจ็บจากเครื่องจักร</td>
                                <td><a href="#">ดูใบรับรองแพทย์</a></td>
                                <td>
                                    <button class="btn btn-sm btn-danger">ลบ</button>
                                </td>
                            </tr>
                            <tr>
                                <td>03/10/2025</td>
                                <td>วรางคณา งานเยอะ</td>
                                <td>07/10/2025</td>
                                <td>ลากิจ</td>
                                <td>ไปงานแต่งญาติ</td>
                                <td><a href="#">ดูไฟล์แนบ</a></td>
                                <td>
                                    <button class="btn btn-sm btn-danger">ลบ</button>
                                </td>
                            </tr>
                            <tr>
                                <td>04/10/2025</td>
                                <td>สมปอง ตั้งใจ</td>
                                <td>08/10/2025 - 09/10/2025</td>
                                <td>ลาป่วย</td>
                                <td>เข้ารับการตรวจร่างกายประจำปี</td>
                                <td><a href="#">ดูเอกสารแนบ</a></td>
                                <td>
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

<!-- Modal: เพิ่มข้อมูลใบลา -->
<div class="modal fade" id="addLeaveModal" tabindex="-1" role="dialog" data-backdrop="static" data-keyboard="false" aria-labelledby="addLeaveModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <form id="leaveForm">
                <div class="modal-header">
                    <h5 class="modal-title" id="addLeaveModalLabel">เพิ่มข้อมูลใบลา</h5>
                </div>
                <div class="modal-body" style="font-size: 20px;">
                    <div class="row">
                        <div class="form-group col-md-4">
                            <label for="submit_date">วันที่ยื่นเรื่อง</label>
                            <input type="date" class="form-control" id="submit_date" name="submit_date" required>
                        </div>

                        <div class="form-group col-md-4">
                            <label for="leave_type">ประเภทการลา <span class="text-danger">*</span></label>
                            <select class="form-control" id="leave_type" name="leave_type" required>
                                <option value="">-- เลือกประเภท --</option>
                                <option value="1">ลากิจ</option>
                                <option value="2">ลาป่วย</option>
                                <option value="3">ลาป่วยอันเนื่องจากอุบัติเหตุจากงาน</option>
                            </select>
                        </div>

                        <div class="form-group col-md-4">
                            <label for="leave_mode">รูปแบบการลา <span class="text-danger">*</span></label>
                            <select class="form-control" id="leave_mode" name="leave_mode" required>
                                <option value="">-- เลือกรูปแบบ --</option>
                                <option value="ทั้งวัน" selected>ทั้งวัน</option>
                                <option value="ครึ่งวันเช้า">ครึ่งวันเช้า</option>
                                <option value="ครึ่งวันบ่าย">ครึ่งวันบ่าย</option>
                            </select>
                        </div>
                    </div>

                    <div class="row">
                        <div class="form-group col-md-4">
                            <label for="leave_form_date_start">วันที่หยุด <span class="text-danger">*</span></label>
                            <input type="date" class="form-control" id="leave_form_date_start" name="leave_form_date_start" required>
                        </div>

                        <div class="form-group col-md-4">
                            <label for="leave_form_date_end">ถึงวันที่</label>
                            <input type="date" class="form-control" id="leave_form_date_end" name="leave_form_date_end">
                        </div>

                        <div class="form-group col-md-4">
                            <label for="leave_days_total">จำนวนวันลา <span class="text-danger">*</span></label>
                            <input type="text" class="form-control" id="leave_days_total" name="leave_days_total" readonly>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="employee_name">ชื่อ-นามสกุล</label>
                        <select class="form-control" id="employee_name" name="employee_name" required>
                            <option value="">โปรดระบุ</option>
                            <option value="สมชาย ใจดี">สมชาย ใจดี</option>
                            <option value="สุดา ลางาม">สุดา ลางาม</option>
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="contact_info">เบอร์โทรศัพท์, อีเมล หรือชื่อบุคคลอ้างอิง ที่สามารถติดต่อได้ระหว่างที่ลางาน</label>
                        <input type="text" class="form-control" id="contact_info" name="contact_info">
                    </div>

                    <div class="form-group">
                        <label for="leave_reason">สาเหตุการลา <span class="text-danger">*</span></label>
                        <textarea class="form-control" id="leave_reason" name="leave_reason" rows="3" required></textarea>
                    </div>
                </div>

                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary">บันทึกข้อมูล</button>
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">ปิด</button>
                </div>
            </form>
        </div>
    </div>
</div>


@endsection

@section('js-content')
<script>
    $(document).ready(function() {
        function calculateLeaveDays() {
            let from = $('#leave_form_date_start').val();
            let to = $('#leave_form_date_end').val();

            if (from && to) {
                let start = new Date(from);
                let end = new Date(to);

                if (end < start) {
                    $('#leave_days_total').val('');
                    return;
                }

                let timeDiff = end.getTime() - start.getTime();
                let dayDiff = Math.floor(timeDiff / (1000 * 60 * 60 * 24)) + 1; // บวก 1 เพราะรวมวันแรก

                $('#leave_days_total').val(dayDiff);
            } else if (from && !to) {
                // ถ้าเลือกแค่วันเดียว
                $('#leave_days_total').val(1);
            } else {
                $('#leave_days_total').val('');
            }
        }

        $('#leave_form_date_start, #leave_form_date_end').on('change', calculateLeaveDays);
    })
</script>
@endsection