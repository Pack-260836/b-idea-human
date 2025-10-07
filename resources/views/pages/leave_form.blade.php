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
            <form id="frmLeave">
                <div class="modal-header">
                    <h5 class="modal-title" id="addLeaveModalLabel">เพิ่มข้อมูลใบลา</h5>
                </div>
                <div class="modal-body" style="font-size: 20px;">
                    <div class="row">
                        <input type="hidden" id="leave_form_id">
                        <div class="form-group col-md-4">
                            <label for="request_date">วันที่ยื่นเรื่อง</label>
                            <input type="date" class="form-control" id="request_date" name="request_date" value="{{ date('Y-m-d') }}" required>
                        </div>

                        <div class="form-group col-md-4">
                            <label for="leave_form_type">ประเภทการลา <span class="text-danger">*</span></label>
                            <select class="form-control" id="leave_form_type" name="leave_form_type" required>
                                <option value="">-- เลือกประเภท --</option>
                                <option value="1">ลากิจ</option>
                                <option value="2">ลาป่วย</option>
                                <option value="3">ลาป่วยอันเนื่องจากอุบัติเหตุจากงาน</option>
                            </select>
                        </div>

                        <div class="form-group col-md-4">
                            <label for="leave_form_format">รูปแบบการลา <span class="text-danger">*</span></label>
                            <select class="form-control" id="leave_form_format" name="leave_form_format" required>
                                <option value="">-- เลือกรูปแบบ --</option>
                                <option value="1" selected>ทั้งวัน</option>
                                <option value="2">ครึ่งวันเช้า</option>
                                <option value="3">ครึ่งวันบ่าย</option>
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
                            <input type="date" class="form-control" id="leave_form_date_end" name="leave_form_date_end" require_once>
                        </div>

                        <div class="form-group col-md-4">
                            <label for="leave_days_total">จำนวนวันลา <span class="text-danger">*</span></label>
                            <input type="text" class="form-control" id="leave_days_total" name="leave_days_total" readonly>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="emp_id">ชื่อ-นามสกุล <span class="text-danger">*</span></label>
                        <select class="form-control" id="emp_id" name="emp_id" required>
                            <option value="">โปรดระบุ</option>
                            <?php foreach ($select_employee as $row => $employee) { ?>
                                <option value="<?= $employee['user_id'] ?>"><?= $employee['text_select'] ?></option>
                            <?php } ?>
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="leave_form_remark">สาเหตุการลา <span class="text-danger">*</span></label>
                        <textarea class="form-control" id="leave_form_remark" name="leave_form_remark" rows="3" required></textarea>
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
    $('#addLeaveModal').on('hidden.bs.modal', function() {
        $('#frmLeave')[0].reset();
        $('#position_id').val('').trigger('change');
        $('#gender_id').val('0').trigger('change');
    });
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
                $('#leave_days_total').val(1);
            } else {
                $('#leave_days_total').val('');
            }
        }
        $('#leave_form_date_start, #leave_form_date_end').on('change', calculateLeaveDays);
        $('#frmLeave').on('submit', function(e) {
            e.preventDefault();
            let form = document.getElementById('frmEmployee');
            let formData = new FormData(form);
            $.ajax({
                type: 'post',
                url: '/backend/v1/leave/update',
                data: formData,
                success: function(response) {
                    if (response.success) {
                        Swal.fire({
                            icon: 'success',
                            title: 'บันทึกข้อมูลเรียบร้อยแล้ว',
                            timer: 2000,
                            showConfirmButton: false
                        }).then(() => {
                            window.location.reload()
                        });
                    } else {
                        Swal.fire({
                            icon: 'error',
                            title: 'เกิดข้อผิดพลาด',
                            text: response.message
                        });
                    }
                },
                error: function(xhr) {
                    Swal.fire({
                        icon: 'error',
                        title: 'เกิดข้อผิดพลาด',
                        text: 'ไม่สามารถบันทึกข้อมูลได้ กรุณาลองใหม่',
                    });
                }
            });
        })
    })
</script>
@endsection