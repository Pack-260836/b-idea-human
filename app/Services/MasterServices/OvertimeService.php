<?php

namespace App\Services\MasterServices;

use App\Helpers\JsonResult;
use App\Models\MasterModels\OvertimeModel;
use App\Models\MasterModels\PositionModel;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;

class OvertimeService
{
    public static function update($request)
    {
        try {
            $user = Auth::guard('admin')->user();
            $body = $request->all();
            $overtime_id = $body['overtime_id'];
            unset($body['overtime_id']);
            if (is_null($overtime_id)) {
                $body += [
                    'created_at' => Carbon::now(),
                    'created_by' => $user->user_id,
                ];
                $rs = OvertimeModel::create($body);
            } else {
                $body += [
                    'updated_at' => Carbon::now(),
                    'updated_by' => $user->user_id,
                ];
                $rs = OvertimeModel::update($overtime_id, $body);
            }
            if (!$rs) {
                return [
                    'data' => null,
                    'message' => 'ไม่สามารถบันทึกข้อมูลได้!',
                    'success' => false,
                ];
            }
            return [
                'data' => $body,
                'message' => 'บันทึกข้อมูลสำเร็จ!',
                'success' => true,
            ];
        } catch (\Throwable $th) {
            throw $th;
        }
    }
    public static function fetch()
    {
        try {
            $rs = OvertimeModel::fetch();
            foreach ($rs as $value) {
                $rsPosition = PositionModel::fetchById($value->position_id);
                $value->position_name_th = $rsPosition->position_name_th;
            }
            return [
                'data' => $rs,
                'message' => null,
                'success' => true,
            ];
        } catch (\Throwable $th) {
            throw $th;
        }
    }
    public static function fetchById($position_id)
    {
        try {
            $rs = OvertimeModel::fetchById($position_id);
            return [
                'data' => $rs,
                'message' => null,
                'success' => true,
            ];
        } catch (\Throwable $th) {
            throw $th;
        }
    }
}
