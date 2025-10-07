<?php

namespace App\Http\Controllers\MasterControllers;

use App\Helpers\GlobalFunc;
use App\Helpers\JsonResult;
use App\Http\Controllers\Controller;
use App\Services\MasterServices\TimeWorkService;
use Illuminate\Http\Request;

class TimeWorkController
{
    public static function update(Request $request)
    {
        $rules = array(
            'shift_start' => 'required',
            'shift_break_start' => 'required',
            'shift_break_end' => 'required',
            'shift_end' => 'required',
        );
        $messages = array(
            'shift_start.required' => 'กรุณากรอกข้อมูล!',
            'shift_break_start.required' => 'กรุณากรอกข้อมูล!',
            'shift_break_end.required' => 'กรุณากรอกข้อมูล!',
            'shift_end.required' => 'กรุณากรอกข้อมูล!',
        );
        $rsValidate = GlobalFunc::validateCheck($request, $rules, $messages);
        if (!is_null($rsValidate)) {
            return JsonResult::errors($rsValidate['data'], $rsValidate['message']);
        }
        $result = TimeWorkService::update($request);
        if ($result['success'] == false) {
            return JsonResult::errors($result['data'], $result['message']);
        }
        return JsonResult::success($result['data'], $result['message']);
    }
}
