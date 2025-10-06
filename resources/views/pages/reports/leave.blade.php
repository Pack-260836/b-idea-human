@extends('layouts.app')

@section('css-content')

@endsection

@section('content')
<div class="content-wrapper">
    <div class="row">
        <div class="col-12 grid-margin">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">รายงานวันลาหยุดพนักงาน</h4>
                    <form class="form-sample">
                        <div class="form-group row">
                            <!-- พนักงาน -->
                            <div class="col-md-3">
                                <label for="employee" class="form-label">พนักงาน</label>
                                <select class="form-control" name="employee_id" id="employee">
                                    <option value="">ทั้งหมด</option>
                                    <option value="1">สมชาย ใจดี</option>
                                    <option value="2">สุดา ลางาม</option>
                                    <!-- เพิ่มรายชื่อพนักงานตามจริง -->
                                </select>
                            </div>
                            <div class="col-md-3">
                                <label for="employee" class="form-label">ประเภทการลา</label>
                                <select class="form-control" name="employee_id" id="employee">
                                    <option value="">ทั้งหมด</option>
                                    <option value="1">ลากิจ</option>
                                    <option value="2">ลาป่วย</option>
                                    <option value="3">ลาป่วยอันเนื่องจากอุบัติเหตุจากงาน</option>
                                    <!-- เพิ่มรายชื่อพนักงานตามจริง -->
                                </select>
                            </div>

                            <!-- วันที่เริ่มต้น -->
                            <div class="col-md-3">
                                <label for="date_start" class="form-label">วันที่</label>
                                <input type="date" class="form-control" name="date_start" id="date_start" value="2025-10-01">
                            </div>
                            <!-- วันที่สิ้นสุด -->
                            <div class="col-md-3">
                                <label for="date_end" class="form-label">ถึงวันที่</label>
                                <input type="date" class="form-control" name="date_end" id="date_end" value="2025-10-31">
                            </div>
                        </div>
                        <button type="submit" class="btn btn-primary mr-2">ค้นหา</button>
                    </form>
                </div>
            </div>

        </div>
        <div class="col-lg-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <!-- <p class="card-description"> ตารางการเข้างานของพนักงานภายในวันปัจจุบัน </p> -->
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th>ลำดับที่</th>
                                <th>ชื่อ-สกุล</th>
                                <th>ตำแหน่ง</th>
                                <th>ประเภทการลา</th>
                                <th>วันที่ลา</th>
                                <th>หมายเหตุ</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>1</td>
                                <td>สมชาย ใจดี</td>
                                <td>เจ้าหน้าที่ธุรการ</td>
                                <td>ลากิจ</td>
                                <td>01/10/2025 - 02/10/2025</td>
                                <td>ไปทำธุระส่วนตัวที่ต่างจังหวัด</td>
                            </tr>
                            <tr>
                                <td>2</td>
                                <td>สุดา ลางาม</td>
                                <td>บัญชี</td>
                                <td>ลาป่วย</td>
                                <td>03/10/2025</td>
                                <td>เป็นไข้หวัดใหญ่ มีใบรับรองแพทย์</td>
                            </tr>
                            <tr>
                                <td>3</td>
                                <td>ธีรชัย พนักดี</td>
                                <td>วิศวกร</td>
                                <td>ลาป่วยอันเนื่องจากอุบัติเหตุจากงาน</td>
                                <td>05/10/2025 - 07/10/2025</td>
                                <td>ได้รับบาดเจ็บจากเครื่องมือในไซต์งาน</td>
                            </tr>
                            <tr>
                                <td>4</td>
                                <td>วรางคณา งานเยอะ</td>
                                <td>ฝ่ายบุคคล</td>
                                <td>ลากิจ</td>
                                <td>09/10/2025</td>
                                <td>ไปอบรมสัมมนาภายนอก</td>
                            </tr>
                            <tr>
                                <td>5</td>
                                <td>สมปอง ตั้งใจ</td>
                                <td>พนักงานคลังสินค้า</td>
                                <td>ลาป่วย</td>
                                <td>10/10/2025 - 11/10/2025</td>
                                <td>ปวดหลังรุนแรง เข้ารับการรักษา</td>
                            </tr>

                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('js-content')

@endsection