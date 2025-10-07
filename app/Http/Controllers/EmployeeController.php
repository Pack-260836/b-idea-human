<?php

namespace App\Http\Controllers;

use App\Helpers\GlobalFunc;
use App\Helpers\JsonResult;
use App\Http\Controllers\Controller;
use App\Services\EmployeeService;
use Illuminate\Http\Request;

class EmployeeController
{
    public static function create(Request $request)
    {
        $rules = array(
            'prefix_th' => 'required_without_all:prefix_en,name_en',
            'prefix_en' => 'required_without_all:prefix_th,name_th',
            'name_th' => 'required_without:name_en',
            'name_en' => 'required_without:name_th',
            'gender_id' => 'required',
            'birthday' => 'required',
            'citizen_id' => 'required',
            'nationality_id' => 'required',
            'emp_type' => 'required',
            'position_id' => 'required',
            'emp_level' => 'required',
            'emp_work_status' => 'required',
            'start_date' => 'required',
            'wage_value' => 'required',
        );
        $messages = array(
            'prefix_th.required_without_all' => 'กรุณากรอกคำนำหน้า (TH) หรือ (EN)',
            'prefix_en.required_without_all' => 'กรุณากรอกคำนำหน้า (EN) หรือ (TH)',
            'name_th.required_without'  => 'กรุณากรอกชื่อ-นามสกุล (TH) หรือ (EN) อย่างใดอย่างหนึ่ง!',
            'name_en.required_without'  => 'กรุณากรอกชื่อ-นามสกุล (TH) หรือ (EN) อย่างใดอย่างหนึ่ง!',
            'gender_id.required' => 'กรุณากรอกข้อมูล!',
            'birthday.required' => 'กรุณากรอกข้อมูล!',
            'citizen_id.required' => 'กรุณากรอกข้อมูล!',
            'nationality_id.required' => 'กรุณากรอกข้อมูล!',
            'emp_type.required' => 'กรุณากรอกข้อมูล!',
            'position_id.required' => 'กรุณากรอกข้อมูล!',
            'emp_level.required' => 'กรุณากรอกข้อมูล!',
            'emp_work_status.required' => 'กรุณากรอกข้อมูล!',
            'start_date.required' => 'กรุณากรอกข้อมูล!',
            'wage_value.required' => 'กรุณากรอกข้อมูล!',
        );
        $rsValidate = GlobalFunc::validateCheck($request, $rules, $messages);
        if (!is_null($rsValidate)) {
            return JsonResult::errors($rsValidate['data'], $rsValidate['message']);
        }
        $result = EmployeeService::create($request);
        if ($result['success'] == false) {
            return JsonResult::errors($result['data'], $result['message']);
        }
        return JsonResult::success($result['data'], $result['message']);
    }
    public static function update(Request $request)
    {
        $rules = array(
            'prefix_th' => 'required_without_all:prefix_en,name_en',
            'prefix_en' => 'required_without_all:prefix_th,name_th',
            'name_th' => 'required_without:name_en',
            'name_en' => 'required_without:name_th',
            'gender_id' => 'required',
            'birthday' => 'required',
            'citizen_id' => 'required',
            'nationality_id' => 'required',
            'emp_type' => 'required',
            'position_id' => 'required',
            'emp_level' => 'required',
            'emp_work_status' => 'required',
            'start_date' => 'required',
            'wage_value' => 'required',
        );
        $messages = array(
            'prefix_th.required_without_all' => 'กรุณากรอกคำนำหน้า (TH) หรือ (EN)',
            'prefix_en.required_without_all' => 'กรุณากรอกคำนำหน้า (EN) หรือ (TH)',
            'name_th.required_without'  => 'กรุณากรอกชื่อ-นามสกุล (TH) หรือ (EN) อย่างใดอย่างหนึ่ง!',
            'name_en.required_without'  => 'กรุณากรอกชื่อ-นามสกุล (TH) หรือ (EN) อย่างใดอย่างหนึ่ง!',
            'gender_id.required' => 'กรุณากรอกข้อมูล!',
            'birthday.required' => 'กรุณากรอกข้อมูล!',
            'citizen_id.required' => 'กรุณากรอกข้อมูล!',
            'nationality_id.required' => 'กรุณากรอกข้อมูล!',
            'emp_type.required' => 'กรุณากรอกข้อมูล!',
            'position_id.required' => 'กรุณากรอกข้อมูล!',
            'emp_level.required' => 'กรุณากรอกข้อมูล!',
            'emp_work_status.required' => 'กรุณากรอกข้อมูล!',
            'start_date.required' => 'กรุณากรอกข้อมูล!',
            'wage_value.required' => 'กรุณากรอกข้อมูล!',
        );
        $rsValidate = GlobalFunc::validateCheck($request, $rules, $messages);
        if (!is_null($rsValidate)) {
            return JsonResult::errors($rsValidate['data'], $rsValidate['message']);
        }
        $result = EmployeeService::update($request);
        if ($result['success'] == false) {
            return JsonResult::errors($result['data'], $result['message']);
        }
        return JsonResult::success($result['data'], $result['message']);
    }
}
