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
                            <h4 class="card-title">เพิ่ม/แก้ไขข้อมูลพนักงาน</h4>
                            <form action="" method="POST">
                                @csrf

                                <div class="row">
                                    <!-- <div class="col-md-6 mb-3">
                                        <label for="prefix_th" class="form-label">คำนำหน้า (TH)</label>
                                        <input type="text" name="prefix_th" class="form-control">
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <label for="name_th" class="form-label">ชื่อ-นามสกุล (TH)</label>
                                        <input type="text" name="name_th" class="form-control">
                                    </div>

                                    <div class="col-md-6 mb-3">
                                        <label for="prefix_en" class="form-label">Prefix (EN)</label>
                                        <input type="text" name="prefix_en" class="form-control">
                                    </div>

                                    <div class="col-md-6 mb-3">
                                        <label for="name_en" class="form-label">Full Name (EN)</label>
                                        <input type="text" name="name_en" class="form-control">
                                    </div> -->
                                    <!-- รูปภาพ -->
                                    <div class="col-md-3 mb-3 d-flex justify-content-center align-items-start">
                                        <div class="position-relative text-center">
                                            <img id="previewImage" src="{{ asset('assets/images/human-01.svg') }}" alt="รูปพนักงาน"
                                                class="rounded shadow" width="150" height="150" style="object-fit: cover;">

                                            <label for="photoInput"
                                                class="btn btn-primary btn-sm position-absolute bottom-0 start-0 end-0"
                                                style="border-radius: 0 0 .3rem .3rem;">
                                                เปลี่ยนรูป
                                            </label>

                                            <input type="file" id="photoInput" name="photo" accept="image/*" class="d-none">
                                        </div>
                                    </div>

                                    <!-- ข้อมูลคำนำหน้า + ชื่อ -->
                                    <div class="col-md-9">
                                        <div class="row">
                                            <!-- คำนำหน้า (TH) -->
                                            <div class="col-md-6 mb-3">
                                                <label for="prefix_th" class="form-label">คำนำหน้า (TH)</label>
                                                <input type="text" name="prefix_th" class="form-control">
                                            </div>

                                            <!-- ชื่อ-นามสกุล (TH) -->
                                            <div class="col-md-6 mb-3">
                                                <label for="name_th" class="form-label">ชื่อ-นามสกุล (TH)</label>
                                                <input type="text" name="name_th" class="form-control">
                                            </div>

                                            <!-- Prefix (EN) -->
                                            <div class="col-md-6 mb-3">
                                                <label for="prefix_en" class="form-label">Prefix (EN)</label>
                                                <input type="text" name="prefix_en" class="form-control">
                                            </div>

                                            <!-- Full Name (EN) -->
                                            <div class="col-md-6 mb-3">
                                                <label for="name_en" class="form-label">Full Name (EN)</label>
                                                <input type="text" name="name_en" class="form-control">
                                            </div>
                                        </div>
                                    </div>

                                    <!-- เพศ -->
                                    <div class="col-md-3 mb-3">
                                        <label for="gender" class="form-label">เพศ</label>
                                        <select name="gender" class="form-control">
                                            <option value="">-- เลือก --</option>
                                            <option value="1">ชาย</option>
                                            <option value="2">หญิง</option>
                                        </select>
                                    </div>

                                    <!-- วันเกิด -->
                                    <div class="col-md-3 mb-3">
                                        <label for="birthday" class="form-label">วันเกิด</label>
                                        <input type="date" name="birthday" class="form-control">
                                    </div>

                                    <!-- บัตรประชาชน -->
                                    <div class="col-md-3 mb-3">
                                        <label for="citizen_id" class="form-label">เลขบัตรประชาชน</label>
                                        <input type="text" name="citizen_id" class="form-control" maxlength="13">
                                    </div>

                                    <!-- สัญชาติ -->
                                    <div class="col-md-3 mb-3">
                                        <label for="nationality_id" class="form-label">สัญชาติ (รหัสประเทศ)</label>
                                        <select name="nationality" class="form-control select2" required>
                                            <option value="">-- กรุณาเลือกสัญชาติ --</option>
                                            <option value="THA">(THA) ไทย</option>
                                            <option value="USA">(USA) สหรัฐอเมริกา</option>
                                            <option value="CHN">(CHN) จีน</option>
                                            <option value="JPN">(JPN) ญี่ปุ่น</option>
                                            <option value="KOR">(KOR) เกาหลีใต้</option>
                                            <option value="GBR">(GBR) สหราชอาณาจักร</option>
                                            <option value="FRA">(FRA) ฝรั่งเศส</option>
                                            <option value="DEU">(DEU) เยอรมนี</option>
                                            <option value="AUS">(AUS) ออสเตรเลีย</option>
                                            <option value="CAN">(CAN) แคนาดา</option>
                                            <option value="SGP">(SGP) สิงคโปร์</option>
                                            <option value="VNM">(VNM) เวียดนาม</option>
                                            <option value="MMR">(MMR) เมียนมา</option>
                                            <option value="LAO">(LAO) ลาว</option>
                                            <option value="MYS">(MYS) มาเลเซีย</option>
                                        </select>

                                    </div>

                                    <!-- ประเภทพนักงาน -->
                                    <div class="col-md-3 mb-3">
                                        <label for="emp_type" class="form-label">ประเภทพนักงาน</label>
                                        <select name="emp_type" class="form-control">
                                            <option value="">-- เลือกประเภทพนักงาน --</option>
                                            <option value="1">พนักงานรายเดือน</option>
                                            <option value="2">พนักงานรายวัน</option>
                                        </select>
                                    </div>
                                    <!-- ประเภทพนักงาน -->
                                    <div class="col-md-3 mb-3">
                                        <label for="emp_type" class="form-label">ตำแหน่งพนักงาน</label>
                                        <select name="emp_type" class="form-control">
                                            <option value="">-- เลือกตำแหน่งพนักงาน --</option>
                                            <option value="1">วิศวะกร</option>
                                            <option value="2">ไอที</option>
                                        </select>
                                    </div>

                                    <!-- สถานะ -->
                                    <div class="col-md-3 mb-3">
                                        <label for="emp_work_status" class="form-label">สิทธิการเข้าถึง</label>
                                        <select name="emp_type" class="form-control">
                                            <option value="">-- เลือกสิทธิการเข้าถึง --</option>
                                            <option value="1">Admin</option>
                                            <option value="2">หัวหน้างาน</option>
                                            <option value="2">พนักงานทั่วไป</option>
                                        </select>
                                    </div>

                                    <!-- สถานะ -->
                                    <div class="col-md-3 mb-3">
                                        <label for="emp_work_status" class="form-label">สถานะพนักงาน</label>
                                        <select name="emp_type" class="form-control">
                                            <option value="">-- เลือกสถานะพนักงาน --</option>
                                            <option value="1">ปกติ</option>
                                            <option value="2">พักงาน</option>
                                            <option value="2">พ้นสภาพ</option>
                                        </select>
                                    </div>

                                    <!-- วันที่เริ่มงาน -->
                                    <div class="col-md-6 mb-3">
                                        <label for="start_date" class="form-label">วันที่เริ่มงาน</label>
                                        <input type="date" name="start_date" class="form-control">
                                    </div>

                                    <!-- ค่าจ้าง -->
                                    <div class="col-md-6 mb-3">
                                        <label for="wage_value" class="form-label">อัตราค่าจ้าง (บาท)</label>
                                        <input type="number" name="wage_value" class="form-control">
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
                <!-- <div class="col-12 stretch-card">
                    <div class="card">
                        <div class="card-body">
                            <form class="forms-sample">
                                <div class="form-group row">
                                    <label for="exampleInputEmail2" class="col-sm-3 col-form-label">Email</label>
                                    <div class="col-sm-9">
                                        <input type="email" class="form-control" id="exampleInputEmail2" placeholder="Enter email">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="exampleInputPassword2" class="col-sm-3 col-form-label">Password</label>
                                    <div class="col-sm-9">
                                        <input type="password" class="form-control" id="exampleInputPassword2" placeholder="Password">
                                    </div>
                                </div>
                                <button type="submit" class="btn btn-success mr-2">Submit</button>
                                <button class="btn btn-light">Cancel</button>
                            </form>
                        </div>
                    </div>
                </div> -->
            </div>
        </div>
        <!-- <div class="col-md-6 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <form class="forms-sample">
                        <div class="form-group">
                            <label for="exampleInputName1">Name</label>
                            <input type="text" class="form-control" id="exampleInputName1" placeholder="Name">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail3">Email address</label>
                            <input type="email" class="form-control" id="exampleInputEmail3" placeholder="Email">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword4">Password</label>
                            <input type="password" class="form-control" id="exampleInputPassword4" placeholder="Password">
                        </div>
                        <div class="form-group">
                            <label>File upload</label>
                            <input type="file" name="img[]" class="file-upload-default">
                            <div class="input-group col-xs-12">
                                <input type="text" class="form-control file-upload-info" disabled placeholder="Upload Image">
                                <span class="input-group-append">
                                    <button class="file-upload-browse btn btn-info" type="button">Upload</button>
                                </span>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputCity1">City</label>
                            <input type="text" class="form-control" id="exampleInputCity1" placeholder="Location">
                        </div>
                        <div class="form-group">
                            <label for="exampleTextarea1">Textarea</label>
                            <textarea class="form-control" id="exampleTextarea1" rows="2"></textarea>
                        </div>
                        <button type="submit" class="btn btn-success mr-2">Submit</button>
                        <button class="btn btn-light">Cancel</button>
                    </form>
                </div>
            </div>
        </div>
        <div class="col-md-5 d-flex align-items-stretch">
            <div class="row flex-grow">
                <div class="col-12 grid-margin">
                    <div class="card">
                        <div class="card-body">
                            <div class="form-group">
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text">@</span>
                                    </div>
                                    <input type="text" class="form-control" placeholder="Username" aria-label="Username" aria-describedby="basic-addon1">
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text">$</span>
                                    </div>
                                    <input type="text" class="form-control" aria-label="Amount (to the nearest dollar)">
                                    <div class="input-group-append">
                                        <span class="input-group-text">.00</span>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text">$</span>
                                    </div>
                                    <div class="input-group-prepend">
                                        <span class="input-group-text">0.00</span>
                                    </div>
                                    <input type="text" class="form-control" aria-label="Amount (to the nearest dollar)">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-12 grid-margin stretch-card">
                    <div class="card">
                        <div class="card-body">
                            <div class="form-group">
                                <div class="input-group">
                                    <div class="input-group-prepend bg-info">
                                        <span class="input-group-text bg-transparent">
                                            <i class="mdi mdi-shield-outline text-white"></i>
                                        </span>
                                    </div>
                                    <input type="text" class="form-control" placeholder="Username" aria-label="Username" aria-describedby="colored-addon1">
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="input-group">
                                    <div class="input-group-prepend bg-primary border-primary">
                                        <span class="input-group-text bg-transparent">
                                            <i class="mdi mdi mdi-menu text-white"></i>
                                        </span>
                                    </div>
                                    <input type="text" class="form-control" placeholder="Username" aria-label="Username" aria-describedby="colored-addon2">
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="input-group">
                                    <input type="text" class="form-control" placeholder="Username" aria-label="Username" aria-describedby="colored-addon3">
                                    <div class="input-group-append bg-primary border-primary">
                                        <span class="input-group-text bg-transparent">
                                            <i class="mdi mdi-menu text-white"></i>
                                        </span>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="input-group">
                                    <div class="input-group-prepend bg-primary border-primary">
                                        <span class="input-group-text bg-transparent text-white">$</span>
                                    </div>
                                    <input type="text" class="form-control" aria-label="Amount (to the nearest dollar)">
                                    <div class="input-group-append bg-primary border-primary">
                                        <span class="input-group-text bg-transparent text-white">.00</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-7 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <div class="form-group">
                        <label>Large input</label>
                        <input type="text" class="form-control form-control-lg" placeholder="Username" aria-label="Username">
                    </div>
                    <div class="form-group">
                        <label>Default input</label>
                        <input type="text" class="form-control" placeholder="Username" aria-label="Username">
                    </div>
                    <div class="form-group">
                        <label>Small input</label>
                        <input type="text" class="form-control form-control-sm" placeholder="Username" aria-label="Username">
                    </div>
                </div>
                <div class="card-body">
                    <h4 class="card-title">Selectize</h4>
                    <div class="form-group">
                        <label for="exampleFormControlSelect1">Large select</label>
                        <select class="form-control form-control-lg" id="exampleFormControlSelect1">
                            <option>1</option>
                            <option>2</option>
                            <option>3</option>
                            <option>4</option>
                            <option>5</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="exampleFormControlSelect2">Default select</label>
                        <select class="form-control" id="exampleFormControlSelect2">
                            <option>1</option>
                            <option>2</option>
                            <option>3</option>
                            <option>4</option>
                            <option>5</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="exampleFormControlSelect3">Small select</label>
                        <select class="form-control form-control-sm" id="exampleFormControlSelect3">
                            <option>1</option>
                            <option>2</option>
                            <option>3</option>
                            <option>4</option>
                            <option>5</option>
                        </select>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-6 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <form class="forms-sample">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <div class="form-check">
                                        <label class="form-check-label">
                                            <input type="checkbox" class="form-check-input"> Default </label>
                                    </div>
                                    <div class="form-check">
                                        <label class="form-check-label">
                                            <input type="checkbox" class="form-check-input" checked> Checked </label>
                                    </div>
                                    <div class="form-check">
                                        <label class="form-check-label">
                                            <input type="checkbox" class="form-check-input" disabled> Disabled </label>
                                    </div>
                                    <div class="form-check">
                                        <label class="form-check-label">
                                            <input type="checkbox" class="form-check-input" disabled checked> Disabled checked </label>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <div class="form-radio">
                                        <label class="form-check-label">
                                            <input type="radio" class="form-check-input" name="optionsRadios" id="optionsRadios1" value="" checked> Option one </label>
                                    </div>
                                    <div class="form-radio">
                                        <label class="form-check-label">
                                            <input type="radio" class="form-check-input" name="optionsRadios" id="optionsRadios2" value="option2"> Option two </label>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="form-radio disabled">
                                        <label class="form-check-label">
                                            <input type="radio" class="form-check-input" name="optionsRadios2" id="optionsRadios3" value="option3" disabled> Option three is disabled </label>
                                    </div>
                                    <div class="form-radio disabled">
                                        <label class="form-check-label">
                                            <input type="radio" class="form-check-input" name="optionsRadio2" id="optionsRadios4" value="option4" disabled checked> Option four is selected and disabled </label>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <div class="col-md-6 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <form class="forms-sample">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <div class="form-check form-check-flat">
                                        <label class="form-check-label">
                                            <input type="checkbox" class="form-check-input"> Default </label>
                                    </div>
                                    <div class="form-check form-check-flat">
                                        <label class="form-check-label">
                                            <input type="checkbox" class="form-check-input" checked> Checked </label>
                                    </div>
                                    <div class="form-check form-check-flat">
                                        <label class="form-check-label">
                                            <input type="checkbox" class="form-check-input" disabled> Disabled </label>
                                    </div>
                                    <div class="form-check form-check-flat">
                                        <label class="form-check-label">
                                            <input type="checkbox" class="form-check-input" disabled checked> Disabled checked </label>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <div class="form-radio form-radio-flat">
                                        <label class="form-check-label">
                                            <input type="radio" class="form-check-input" name="flatRadios1" id="flatRadios1" value="" checked> Option one </label>
                                    </div>
                                    <div class="form-radio form-radio-flat">
                                        <label class="form-check-label">
                                            <input type="radio" class="form-check-input" name="flatRadios2" id="flatRadios2" value="option2"> Option two </label>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="form-radio form-radio-flat disabled">
                                        <label class="form-check-label">
                                            <input type="radio" class="form-check-input" name="flatRadios3" id="flatRadios3" value="option3" disabled> Option three is disabled </label>
                                    </div>
                                    <div class="form-radio form-radio-flat disabled">
                                        <label class="form-check-label">
                                            <input type="radio" class="form-check-input" name="flatRadios4" id="flatRadios4" value="option4" disabled checked> Option four is selected and disabled </label>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div> -->
    </div>
</div>
@endsection

@section('js-content')
<script>
    document.getElementById('photoInput').addEventListener('change', function(event) {
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
</script>
@endsection