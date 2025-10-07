<?php

namespace App\Services\MasterServices;

use App\Helpers\JsonResult;
use App\Models\MasterModels\TimeWorkModel;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;

class TimeWorkService
{
    public static function update($request)
    {
        try {
            $user = Auth::guard('admin')->user();
            $body = $request->all();
            $shift_id = $body['shift_id'];
            unset($body['shift_id']);
            if (is_null($shift_id)) {
                $body += [
                    'created_at' => Carbon::now(),
                    'created_by' => $user->user_id,
                ];
                $rs = TimeWorkModel::create($body);
            } else {
                $body += [
                    'updated_at' => Carbon::now(),
                    'updated_by' => $user->user_id,
                ];
                $rs = TimeWorkModel::update($shift_id, $body);
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
            $rs = TimeWorkModel::fetch();
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
