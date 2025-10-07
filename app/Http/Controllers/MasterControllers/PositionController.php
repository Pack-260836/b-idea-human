<?php

namespace App\Http\Controllers\MasterControllers;

use App\Helpers\GlobalFunc;
use App\Helpers\JsonResult;
use App\Http\Controllers\Controller;
use App\Services\MasterServices\PositionService;
use Illuminate\Http\Request;

class PositionController
{
    public static function update(Request $request)
    {
        $rules = array(
            'position_name_th' => 'required',
        );
        $messages = array(
            'position_name_th.required' => 'กรุณากรอกข้อมูล!',
        );
        $rsValidate = GlobalFunc::validateCheck($request, $rules, $messages);
        if (!is_null($rsValidate)) {
            return JsonResult::errors($rsValidate['data'], $rsValidate['message']);
        }
        $result = PositionService::update($request);
        if ($result['success'] == false) {
            return JsonResult::errors($result['data'], $result['message']);
        }
        return JsonResult::success($result['data'], $result['message']);
    }
}
