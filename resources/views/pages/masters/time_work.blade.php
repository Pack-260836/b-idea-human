@extends('layouts.app')

@section('css-content')

@endsection

@section('content')
<div class="content-wrapper">
    <div class="row">
        <div class="col-12 grid-margin">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">รูปแบบช่วงเวลาทำงาน</h4>
                    <form class="form-sample" id="frmTimeWork">
                        <!-- <p class="card-description"> Personal info </p> -->
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group row">
                                    <label class="col-sm-3 col-form-label">เวลาเข้างาน</label>
                                    <div class="col-sm-9">
                                        <input type="hidden" id="shift_id" value="{{ $timework_data['shift_id'] }}">
                                        <input type="time" class="form-control" id="shift_start" value="{{ $timework_data['shift_start'] }}" required />
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group row">
                                    <label class="col-sm-3 col-form-label">เวลาพักเที่ยง</label>
                                    <div class="col-sm-9">
                                        <input type="time" class="form-control" id="shift_break_start" value="{{ $timework_data['shift_break_start'] }}" required />
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group row">
                                    <label class="col-sm-3 col-form-label">เข้างานหลังพัก</label>
                                    <div class="col-sm-9">
                                        <input type="time" class="form-control" id="shift_break_end" value="{{ $timework_data['shift_break_end'] }}" required />
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group row">
                                    <label class="col-sm-3 col-form-label">เลิกงาน</label>
                                    <div class="col-sm-9">
                                        <input type="time" class="form-control" id="shift_end" value="{{ $timework_data['shift_end'] }}" required />
                                    </div>
                                </div>
                            </div>
                        </div>
                        <button type="submit" class="btn btn-primary mr-2">บันทึก</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('js-content')
<script>
    $(document).ready(function() {
        $('#frmTimeWork').on('submit', function(e) {
            e.preventDefault();
            const shift_id = $('#shift_id').val();
            const shift_start = $('#shift_start').val();
            const shift_break_start = $('#shift_break_start').val();
            const shift_break_end = $('#shift_break_end').val();
            const shift_end = $('#shift_end').val();

            if (!shift_start || !shift_break_start || !shift_break_end || !shift_end) {
                Swal.fire({
                    icon: 'warning',
                    title: 'กรุณากรอกเวลาให้ครบทุกช่อง',
                });
                return;
            }
            if (!(shift_start < shift_break_start && shift_break_start < shift_break_end && shift_break_end < shift_end)) {
                Swal.fire({
                    icon: 'error',
                    title: 'ลำดับเวลาไม่ถูกต้อง',
                    text: 'โปรดตรวจสอบว่าเวลาเข้างาน < พักเที่ยง < เข้าหลังพัก < เลิกงาน',
                });
                return;
            }
            $.ajax({
                url: '/backend/v1/masters/timework/update',
                method: 'post',
                data: {
                    shift_id: shift_id,
                    shift_start: shift_start,
                    shift_break_start: shift_break_start,
                    shift_break_end: shift_break_end,
                    shift_end: shift_end,
                },
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