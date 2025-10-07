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
                        <h4 class="card-title mb-0">ข้อมูลโอที</h4>
                        <a href="#" class="btn btn-primary" data-toggle="modal" data-target="#addOTModal">
                            <i class="mdi mdi-account-plus"></i> เพิ่มข้อมูล
                        </a>
                    </div>
                    <!-- <p class="card-description"> ตารางการเข้างานของพนักงานภายในวันปัจจุบัน </p> -->
                    <table class="table table-striped">
                        <thead>
                            <tr class="text-center">
                                <th>ลำดับที่</th>
                                <th>ชื่อตำแหน่ง</th>
                                <th>เพศ</th>
                                <th>จำนวนโอที (บาท / ชม.) </th>
                                <th>เครื่องมือ</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($overtime_data as $row => $overtime) { ?>
                                <tr>
                                    <td class="text-center"><?= $row + 1 ?></td>
                                    <td><?= $overtime['position_name_th'] ?></td>
                                    <td class="text-center">
                                        @switch($overtime['gender_id'])
                                        @case(1)
                                        ชาย
                                        @break
                                        @case(2)
                                        หญิง
                                        @break
                                        @default
                                        ทั้งหมด
                                        @endswitch
                                    </td>
                                    <td class="text-end"><?= number_format($overtime['ot_rate_per_hour'], 2) ?></td>
                                    <td class="text-center">
                                        <button class="btn btn-sm btn-warning" onclick="show({{ $overtime['overtime_id'] }})">แก้ไข</button>
                                    </td>
                                </tr>
                            <?php } ?>
                            <!-- <tr>
                                <td class="text-center">1</td>
                                <td>เจ้าหน้าที่ธุรการ</td>
                                <td class="text-center">ทั้งหมด</td>
                                <td class="text-end">85.00</td>
                                <td class="text-center">
                                    <button class="btn btn-sm btn-primary">แก้ไข</button>
                                    <button class="btn btn-sm btn-danger">ลบ</button>
                                </td>
                            </tr>
                            <tr>
                                <td class="text-center">2</td>
                                <td>ช่างเทคนิค</td>
                                <td class="text-center">ชาย</td>
                                <td class="text-end">100.00</td>
                                <td class="text-center">
                                    <button class="btn btn-sm btn-primary">แก้ไข</button>
                                    <button class="btn btn-sm btn-danger">ลบ</button>
                                </td>
                            </tr>
                            <tr>
                                <td class="text-center">3</td>
                                <td>พนักงานคลังสินค้า</td>
                                <td class="text-center">ชาย</td>
                                <td class="text-end">90.00</td>
                                <td class="text-center">
                                    <button class="btn btn-sm btn-primary">แก้ไข</button>
                                    <button class="btn btn-sm btn-danger">ลบ</button>
                                </td>
                            </tr>
                            <tr>
                                <td class="text-center">4</td>
                                <td>เจ้าหน้าที่การเงิน</td>
                                <td class="text-center">หญิง</td>
                                <td class="text-end">95.00</td>
                                <td class="text-center">
                                    <button class="btn btn-sm btn-primary">แก้ไข</button>
                                    <button class="btn btn-sm btn-danger">ลบ</button>
                                </td>
                            </tr>
                            <tr>
                                <td class="text-center">5</td>
                                <td>พนักงานขับรถ</td>
                                <td class="text-center">ชาย</td>
                                <td class="text-end">110.00</td>
                                <td class="text-center">
                                    <button class="btn btn-sm btn-primary">แก้ไข</button>
                                    <button class="btn btn-sm btn-danger">ลบ</button>
                                </td>
                            </tr> -->
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>


<!-- Modal: เพิ่มข้อมูลโอที -->
<div class="modal fade" id="addOTModal" tabindex="-1" role="dialog" data-backdrop="static" data-keyboard="false" aria-labelledby="addOTModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <form id="frmOverTime">
                <div class="modal-header">
                    <h5 class="modal-title" id="addOTModalLabel">บันทึกข้อมูลอัตรา OT</h5>
                </div>
                <div class="modal-body">
                    <div class="form-group mb-3">
                        <input type="hidden" id="overtime_id">
                        <label for="position_id" class="form-label">ชื่อตำแหน่ง <span class="text-danger">*</span></label>
                        <select class="form-control" id="position_id" name="position_id" required>
                            <option value="">-- เลือกตำแหน่ง --</option>
                            <?php foreach ($position_data as $row => $position) { ?>
                                <option value="<?= $position['position_id'] ?>"><?= $position['position_name_th'] ?></option>
                            <?php } ?>
                        </select>
                    </div>
                    <div class="form-group mb-3">
                        <label for="gender_id" class="form-label">เพศ</label>
                        <select class="form-control" id="gender_id" name="gender_id" required>
                            <option value="0">ทั้งหมด</option>
                            <option value="1">ชาย</option>
                            <option value="2">หญิง</option>
                        </select>
                    </div>
                    <div class="form-group mb-3">
                        <label for="ot_rate_per_hour" class="form-label">จำนวนโอที (บาท / ชม.) <span class="text-danger">*</span></label>
                        <input type="number" class="form-control text-end" id="ot_rate_per_hour" name="ot_rate_per_hour" min="1" required placeholder="เช่น 85.00">
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
<script>
    $('#addOTModal').on('hidden.bs.modal', function() {
        $('#frmOverTime')[0].reset();
        $('#position_id').val('').trigger('change');
        $('#gender_id').val('0').trigger('change');
    });
    $(document).ready(function() {
        $('#frmOverTime').on('submit', function(e) {
            e.preventDefault();
            let formData = {
                overtime_id: $('#overtime_id').val(),
                position_id: $('#position_id').val(),
                gender_id: $('#gender_id').val(),
                ot_rate_per_hour: $('#ot_rate_per_hour').val(),
            }
            $.ajax({
                type: 'post',
                url: '/backend/v1/masters/overtime/update',
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

    function show(id) {
        $.ajax({
            type: 'get',
            url: '/backend/v1/masters/overtime/fetch/' + id,
            success: function(response) {
                if (response.success) {
                    let data = response.data
                    $('#overtime_id').val(data.overtime_id)
                    $('#ot_rate_per_hour').val(data.ot_rate_per_hour)
                    $('#position_id').val(data.position_id).trigger('change');
                    $('#gender_id').val(data.gender_id).trigger('change');
                    $('#addOTModal').modal('show');
                } else {
                    Swal.fire({
                        icon: 'error',
                        title: 'เกิดข้อผิดพลาด',
                        text: response.message
                    });
                }
            }
        });
    }
</script>
@endsection