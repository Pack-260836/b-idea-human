<?php

namespace App\Http\Controllers\MasterControllers;

use App\Helpers\GlobalFunc;
use App\Helpers\JsonResult;
use App\Http\Controllers\Controller;
use App\Services\MasterServices\OvertimeService;
use Illuminate\Http\Request;

class OvertimeController
{
    public static function update(Request $request)
    {
        $rules = array(
            'position_id' => 'required',
            'gender_id' => 'required',
            'ot_rate_per_hour' => 'required|numeric|min:1',
        );
        $messages = array(
            'position_id.required' => 'กรุณากรอกข้อมูล!',
            'gender_id.required' => 'กรุณากรอกข้อมูล!',
            'ot_rate_per_hour.required' => 'กรุณากรอกข้อมูล!',
            'ot_rate_per_hour.numeric' => 'กรุณากรอกเฉพาะตัวเลข!',
            'ot_rate_per_hour.min' => 'จำนวนโอทีต้องมากกว่าหรือเท่ากับ 0!',
        );
        $rsValidate = GlobalFunc::validateCheck($request, $rules, $messages);
        if (!is_null($rsValidate)) {
            return JsonResult::errors($rsValidate['data'], $rsValidate['message']);
        }
        $result = OvertimeService::update($request);
        if ($result['success'] == false) {
            return JsonResult::errors($result['data'], $result['message']);
        }
        return JsonResult::success($result['data'], $result['message']);
    }
    public static function fetchById($position_id)
    {
        $result = OvertimeService::fetchById($position_id);
        if ($result['success'] == false) {
            return JsonResult::errors($result['data'], $result['message']);
        }
        return JsonResult::success($result['data'], $result['message']);
    }
}
