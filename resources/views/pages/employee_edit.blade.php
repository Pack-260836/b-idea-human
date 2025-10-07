@extends('layouts.app')

@section('css-content')
<style>
    #previewImage {
        border: 3px solid #f5f5f5;
    }
</style>
@endsection

@section('content')

<div class="content-wrapper">
    <div class="row">
        <div class="col-md-12 d-flex align-items-stretch grid-margin">
            <div class="row flex-grow">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="card-title">แก้ไขข้อมูลพนักงาน</h4>
                            <form id="frmEmployee">
                                @csrf
                                <div class="row">
                                    <div class="col-md-3 mb-3 d-flex justify-content-center align-items-start">
                                        <div class="position-relative text-center">
                                            @php
                                            $imagePath = !empty($employee_data['image_profile'])
                                            ? asset($employee_data['image_profile'])
                                            : asset('assets/images/human-01.svg');
                                            @endphp
                                            <img id="previewImage" src="{{ $imagePath }}" alt="รูปพนักงาน"
                                                class="rounded shadow" width="150" height="150" style="object-fit: cover;">
                                            <label for="image_profile"
                                                class="btn btn-primary btn-sm position-absolute bottom-0 start-0 end-0"
                                                style="border-radius: 0 0 .3rem .3rem;">
                                                เปลี่ยนรูป
                                            </label>
                                            <input type="file" id="image_profile" name="image_profile" accept="image/*" class="d-none">
                                        </div>
                                    </div>

                                    <!-- ข้อมูลคำนำหน้า + ชื่อ -->
                                    <div class="col-md-9">
                                        <div class="row">
                                            <!-- คำนำหน้า (TH) -->
                                            <input type="hidden" id="user_id" name="user_id" value="{{ $employee_data['user_id'] }}">
                                            <div class="col-md-6 mb-3">
                                                <label for="prefix_th" class="form-label">คำนำหน้า (TH) <span class="text-danger">*</span></label>
                                                <input type="text" id="prefix_th" name="prefix_th" class="form-control" value="{{ $employee_data['prefix_th'] }}" require>
                                            </div>

                                            <!-- ชื่อ-นามสกุล (TH) -->
                                            <div class="col-md-6 mb-3">
                                                <label for="name_th" class="form-label">ชื่อ-นามสกุล (TH) <span class="text-danger">*</span></label>
                                                <input type="text" id="name_th" name="name_th" class="form-control" value="{{ $employee_data['name_th'] }}" require>
                                            </div>

                                            <!-- Prefix (EN) -->
                                            <div class="col-md-6 mb-3">
                                                <label for="prefix_en" class="form-label">Prefix (EN)</label>
                                                <input type="text" id="prefix_en" name="prefix_en" value="{{ $employee_data['prefix_en'] }}" class="form-control">
                                            </div>

                                            <!-- Full Name (EN) -->
                                            <div class="col-md-6 mb-3">
                                                <label for="name_en" class="form-label">Full Name (EN)</label>
                                                <input type="text" id="name_en" name="name_en" value="{{ $employee_data['name_en'] }}" class="form-control">
                                            </div>
                                        </div>
                                    </div>

                                    <!-- เพศ -->
                                    <div class="col-md-3 mb-3">
                                        <label for="gender_id" class="form-label">เพศ <span class="text-danger">*</span></label>
                                        <select id="gender_id" name="gender_id" class="form-control" require>
                                            <option value="1" {{ (isset($employee_data['gender_id']) && $employee_data['gender_id'] == 1) ? 'selected' : '' }}>ชาย</option>
                                            <option value="2" {{ (isset($employee_data['gender_id']) && $employee_data['gender_id'] == 2) ? 'selected' : '' }}>หญิง</option>
                                        </select>
                                    </div>

                                    <!-- วันเกิด -->
                                    <div class="col-md-3 mb-3">
                                        <label for="birthday" class="form-label">วันเกิด <span class="text-danger">*</span></label>
                                        <input type="date" id="birthday" name="birthday" class="form-control" value="{{ $employee_data['birthday'] }}" require>
                                    </div>

                                    <!-- บัตรประชาชน -->
                                    <div class="col-md-3 mb-3">
                                        <label for="citizen_id" class="form-label">เลขบัตรประชาชน <span class="text-danger">*</span></label>
                                        <input type="text" id="citizen_id" name="citizen_id" class="form-control" maxlength="13" value="{{ $employee_data['citizen_id'] }}" require>
                                    </div>

                                    <!-- สัญชาติ -->
                                    <div class="col-md-3 mb-3">
                                        <label for="nationality_id" class="form-label">สัญชาติ <span class="text-danger">*</span></label>
                                        <select id="nationality_id" name="nationality_id" class="form-control select2" required>
                                            <option value="THA" {{ (isset($employee_data['nationality_id']) && $employee_data['nationality_id'] == 'THA') ? 'selected' : '' }}>(THA) ไทย</option>
                                            <option value="VNM" {{ (isset($employee_data['nationality_id']) && $employee_data['nationality_id'] == 'VNM') ? 'selected' : '' }}>(VNM) เวียดนาม</option>
                                            <option value="MMR" {{ (isset($employee_data['nationality_id']) && $employee_data['nationality_id'] == 'MMR') ? 'selected' : '' }}>(MMR) เมียนมา</option>
                                            <option value="LAO" {{ (isset($employee_data['nationality_id']) && $employee_data['nationality_id'] == 'LAO') ? 'selected' : '' }}>(LAO) ลาว</option>
                                        </select>
                                    </div>

                                    <!-- ประเภทพนักงาน -->
                                    <div class="col-md-3 mb-3">
                                        <label for="emp_type" class="form-label">ประเภทพนักงาน <span class="text-danger">*</span></label>
                                        <select id="emp_type" name="emp_type" class="form-control" require>
                                            <option value="1" {{ (isset($employee_data['emp_type']) && $employee_data['emp_type'] == 1) ? 'selected' : '' }}>พนักงานรายเดือน</option>
                                            <option value="2" {{ (isset($employee_data['emp_type']) && $employee_data['emp_type'] == 2) ? 'selected' : '' }}>พนักงานรายวัน</option>
                                        </select>
                                    </div>

                                    <!-- ประเภทพนักงาน -->
                                    <div class="col-md-3 mb-3">
                                        <label for="position_id" class="form-label">ตำแหน่งพนักงาน <span class="text-danger">*</span></label>
                                        <select id="position_id" name="position_id" class="form-control" require>
                                            <?php foreach ($position_data as $row => $position) { ?>
                                                <option value="<?= $position['position_id'] ?>" <?= isset($employee_data['position_id']) && $employee_data['position_id'] == $position['position_id'] ? 'selected' : '' ?>><?= $position['position_name_th'] ?></option>
                                            <?php } ?>
                                        </select>
                                    </div>

                                    <!-- สถานะ -->
                                    <div class="col-md-3 mb-3">
                                        <label for="emp_level" class="form-label">สิทธิการเข้าถึง <span class="text-danger">*</span></label>
                                        <select id="emp_level" name="emp_level" class="form-control" require>
                                            <option value="1" {{ (isset($employee_data['emp_level']) && $employee_data['emp_level'] == 1) ? 'selected' : '' }}>Admin</option>
                                            <option value="2" {{ (isset($employee_data['emp_level']) && $employee_data['emp_level'] == 2) ? 'selected' : '' }}>หัวหน้างาน</option>
                                            <option value="3" {{ (isset($employee_data['emp_level']) && $employee_data['emp_level'] == 3) ? 'selected' : '' }}>พนักงานทั่วไป</option>
                                        </select>
                                    </div>

                                    <!-- สถานะ -->
                                    <div class="col-md-3 mb-3">
                                        <label for="emp_work_status" class="form-label">สถานะพนักงาน <span class="text-danger">*</span></label>
                                        <select id="emp_work_status" name="emp_work_status" class="form-control" require>
                                            <option value="1" {{ (isset($employee_data['emp_work_status']) && $employee_data['emp_work_status'] == 1) ? 'selected' : '' }}>ปกติ</option>
                                            <option value="2" {{ (isset($employee_data['emp_work_status']) && $employee_data['emp_work_status'] == 2) ? 'selected' : '' }}>พักงาน</option>
                                            <option value="3" {{ (isset($employee_data['emp_work_status']) && $employee_data['emp_work_status'] == 3) ? 'selected' : '' }}>พ้นสภาพ</option>
                                        </select>
                                    </div>

                                    <!-- วันที่เริ่มงาน -->
                                    <div class="col-md-6 mb-3">
                                        <label for="start_date" class="form-label">วันที่เริ่มงาน <span class="text-danger">*</span></label>
                                        <input type="date" id="start_date" name="start_date" class="form-control" value="{{ $employee_data['start_date'] }}" require>
                                    </div>

                                    <!-- ค่าจ้าง -->
                                    <div class="col-md-6 mb-3">
                                        <label for="wage_value" class="form-label">อัตราค่าจ้าง (บาท) <span class="text-danger">*</span></label>
                                        <input type="number" id="wage_value" name="wage_value" class="form-control" value="{{ $employee_data['wage_value'] }}" require>
                                    </div>

                                    <!-- ปุ่ม -->
                                    <div class="col-12 mt-4 text-end">
                                        <button type="submit" class="btn btn-primary">บันทึกข้อมูล</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('js-content')
<script>
    document.getElementById('image_profile').addEventListener('change', function(event) {
        const input = event.target;
        const preview = document.getElementById('previewImage');

        if (input.files && input.files[0]) {
            const reader = new FileReader();
            reader.onload = function(e) {
                preview.src = e.target.result;
            };
            reader.readAsDataURL(input.files[0]);
        }
    });
    $(document).ready(function() {
        $('#frmEmployee').on('submit', function(e) {
            e.preventDefault();
            let form = document.getElementById('frmEmployee');
            let formData = new FormData(form);
            $.ajax({
                url: '/backend/v1/employee/update',
                method: 'POST',
                data: formData,
                processData: false,
                contentType: false,
                success: function(response) {
                    if (response.success) {
                        Swal.fire({
                            icon: 'success',
                            title: 'บันทึกข้อมูลเรียบร้อยแล้ว',
                            timer: 2000,
                            showConfirmButton: false
                        }).then(() => {
                            window.location.href = '/admin/employee';
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
                    Swal.fire('เกิดข้อผิดพลาด', 'ไม่สามารถบันทึกได้', 'error');
                }
            });
        })
    })
</script>
@endsection