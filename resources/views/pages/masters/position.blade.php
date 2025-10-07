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
                        <a href="#" class="btn btn-primary" data-toggle="modal" data-target="#addPositionModal">
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
                            <?php foreach ($position_data as $row => $position) { ?>
                                <tr>
                                    <td class="text-center"><?= $row + 1 ?></td>
                                    <td><?= $position['position_name_th'] ?></td>
                                    <td class="text-center">
                                        <button class="btn btn-sm btn-warning" onclick="show({{ $position['position_id'] }})">แก้ไข</button>
                                    </td>
                                </tr>
                            <?php } ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Modal: เพิ่มข้อมูลตำแหน่ง -->
<div class="modal fade" id="addPositionModal" tabindex="-1" role="dialog" data-backdrop="static" data-keyboard="false" aria-labelledby="addPositionModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <form id="frmPosition">
                @csrf
                <div class="modal-header">
                    <h5 class="modal-title" id="addPositionModalLabel">เพิ่มข้อมูลตำแหน่ง</h5>
                </div>
                <div class="modal-body" style="font-size: 18px;">
                    <div class="row">
                        <div class="form-group col-md-12">
                            <label for="position_name">ชื่อตำแหน่ง</label>
                            <input type="hidden" id="position_id">
                            <input type="text" class="form-control" id="position_name_th" name="position_name_th" required>
                            <div class="invalid-feedback">กรุณากรอกชื่อตำแหน่ง</div>
                        </div>
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
    $('#addPositionModal').on('hidden.bs.modal', function() {
        $('#frmPosition')[0].reset(); 
    });
    $(document).ready(function() {
        $('#frmPosition').on('submit', function(e) {
            e.preventDefault();
            let formData = {
                position_id: $('#position_id').val(),
                position_name_th: $('#position_name_th').val(),
            }
            $.ajax({
                url: '/backend/v1/masters/position/update',
                type: 'post',
                data: formData,
                success: function(response) {
                    if (response.success) {
                        Swal.fire({
                            icon: 'success',
                            title: 'บันทึกข้อมูลเรียบร้อยแล้ว',
                            timer: 2000,
                            showConfirmButton: false
                        }).then(() => {
                            // $('#OTForm')[0].reset();
                            // $('#addPositionModal').modal('hide');
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
            url: '/backend/v1/masters/position/fetch/' + id,
            success: function(response) {
                if (response.success) {
                    let data = response.data
                    $('#position_id').val(data.position_id)
                    $('#position_name_th').val(data.position_name_th)
                    $('#addPositionModal').modal('show');
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