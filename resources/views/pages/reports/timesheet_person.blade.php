@extends('layouts.app')

@section('css-content')

@endsection

@section('content')
<div class="content-wrapper">
    <div class="row">
        <div class="col-12 grid-margin">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">รายงานการลงเวลารายบุคคล</h4>
                    <form class="form-sample">
                        <div class="form-group row">
                            <!-- พนักงาน -->
                            <div class="col-md-6">
                                <label for="employee" class="form-label">พนักงาน</label>
                                <select class="form-control" name="employee_id" id="employee">
                                    <option value="">เลือกพนักงาน</option>
                                    <option value="1">สมชาย ใจดี</option>
                                    <option value="2">สุดา ลางาม</option>
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
                                <th rowspan="2">#</th>
                                <th rowspan="2">วัน</th>
                                <th rowspan="2">วันที่</th>
                                <th colspan="2">เข้างาน (08:00)</th>
                                <th colspan="2">พัก (12:00)</th>
                                <th colspan="2">เข้างานหลังพัก (13:00)</th>
                                <th colspan="2">เลิกงาน (17:00)</th>
                            </tr>
                            <tr>
                                <th>เข้า</th>
                                <th>เขาสาย</th>
                                <th>พัก</th>
                                <th>พักก่อน</th>
                                <th>เข้า</th>
                                <th>เขาสาย</th>
                                <th>เลิก</th>
                                <th>เลิกก่อน</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>1</td>
                                <td>จ.</td>
                                <td>01/09/2025</td>
                                <td>08:51:53</td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td>17:57:33</td>
                                <td>16:19:38</td>
                            </tr>
                            <tr>
                                <td>2</td>
                                <td>อ.</td>
                                <td>02/09/2025</td>
                                <td>08:34:57</td>
                                <td></td>
                                <td>12:41:00</td>
                                <td>11:02:17</td>
                                <td>12:55:40</td>
                                <td></td>
                                <td>17:08:28</td>
                                <td></td>
                            </tr>
                            <tr>
                                <td>3</td>
                                <td>พ.</td>
                                <td>03/09/2025</td>
                                <td>08:56:34</td>
                                <td></td>
                                <td>12:42:12</td>
                                <td></td>
                                <td>12:58:09</td>
                                <td></td>
                                <td>17:17:32</td>
                                <td>16:46:14</td>
                            </tr>
                            <tr>
                                <td>4</td>
                                <td>พฤ.</td>
                                <td>04/09/2025</td>
                                <td>08:49:02</td>
                                <td></td>
                                <td>12:15:25</td>
                                <td></td>
                                <td>12:57:15</td>
                                <td></td>
                                <td>17:36:00</td>
                                <td></td>
                            </tr>
                            <tr>
                                <td>5</td>
                                <td>ศ.</td>
                                <td>05/09/2025</td>
                                <td>08:42:43</td>
                                <td></td>
                                <td>12:59:21</td>
                                <td></td>
                                <td>12:58:05</td>
                                <td></td>
                                <td></td>
                                <td>16:47:06</td>
                            </tr>

                        </tbody>
                        <tfoot>
                            <tr>
                                <td colspan="11">
                                    <div style="padding-top: 10px;">
                                        <p>วันทำงาน : <strong>22</strong></p>
                                        <p>วันหยุดตามกะการทำงาน : <strong>8</strong></p>
                                        <p>วันหยุดบริษัท : <strong>0</strong></p>
                                    </div>
                                </td>
                            </tr>
                        </tfoot>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('js-content')

@endsection