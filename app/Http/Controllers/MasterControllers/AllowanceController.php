<?php

namespace App\Http\Controllers\MasterControllers;

use App\Helpers\GlobalFunc;
use App\Helpers\JsonResult;
use App\Http\Controllers\Controller;
use App\Services\MasterServices\AllowanceService;
use Illuminate\Http\Request;

class AllowanceController
{
    public static function update(Request $request)
    {
        $rules = array(
            'position_id' => 'required',
            'allowance_rate' => 'required|numeric|min:1',
        );
        $messages = array(
            'position_id.required' => 'กรุณากรอกข้อมูล!',
            'allowance_rate.required' => 'กรุณากรอกข้อมูล!',
            'allowance_rate.numeric' => 'กรุณากรอกเฉพาะตัวเลข!',
            'allowance_rate.min' => 'จำนวนโอทีต้องมากกว่าหรือเท่ากับ 0!',
        );
        $rsValidate = GlobalFunc::validateCheck($request, $rules, $messages);
        if (!is_null($rsValidate)) {
            return JsonResult::errors($rsValidate['data'], $rsValidate['message']);
        }
        $result = AllowanceService::update($request);
        if ($result['success'] == false) {
            return JsonResult::errors($result['data'], $result['message']);
        }
        return JsonResult::success($result['data'], $result['message']);
    }
    public static function fetchById($position_id)
    {
        $result = AllowanceService::fetchById($position_id);
        if ($result['success'] == false) {
            return JsonResult::errors($result['data'], $result['message']);
        }
        return JsonResult::success($result['data'], $result['message']);
    }
}
