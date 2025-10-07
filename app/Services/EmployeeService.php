<?php

namespace App\Services;

use App\Helpers\GlobalFunc;
use App\Helpers\JsonResult;
use App\Models\EmployeeModel;
use App\Models\MasterModels\PositionModel;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class EmployeeService
{
    public static function create($request)
    {
        try {
            $user = Auth::guard('admin')->user();
            $body = $request->all();
            $body['username'] = $body['citizen_id'];
            $birthday = str_replace('-', '', $body['birthday']);
            $body['password'] = Hash::make($birthday);
            unset($body['_token']);
            $rsImage = GlobalFunc::uploadImg($request, $body['citizen_id'], 'image_profile', 'employee_images');
            if (!is_null($rsImage) && !empty($rsImage)) {
                $body['image_profile'] = array_key_exists('image_profile', $rsImage) ? $rsImage['image_profile'] : NULL;
            } else {
                unset($body['image_profile']);
            }
            $body += [
                'user_id' => GlobalFunc::getNewId(),
                'user_level' => 1,
                'created_at' => Carbon::now(),
                'created_by' => $user->user_id,
            ];
            $rs = EmployeeModel::create($body);
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
    public static function update($request)
    {
        try {
            $user = Auth::guard('admin')->user();
            $body = $request->all();
            $body['username'] = $body['citizen_id'];
            $birthday = str_replace('-', '', $body['birthday']);
            $body['password'] = Hash::make($birthday);
            $user_id = $body['user_id'];
            unset($body['user_id']);
            unset($body['_token']);
            $rsImage = GlobalFunc::uploadImg($request, $body['citizen_id'], 'image_profile', 'employee_images');
            if (!is_null($rsImage) && !empty($rsImage)) {
                $body['image_profile'] = array_key_exists('image_profile', $rsImage) ? $rsImage['image_profile'] : NULL;
            } else {
                unset($body['image_profile']);
            }
            $body += [
                'updated_at' => Carbon::now(),
                'upated_by' => $user->user_id,
            ];
            $rs = EmployeeModel::update($user_id, $body);
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
            $rs = EmployeeModel::fetch();
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
    public static function fetchById($user_id)
    {
        try {
            $rs = EmployeeModel::fetchById($user_id);
            return [
                'data' => $rs,
                'message' => null,
                'success' => true,
            ];
        } catch (\Throwable $th) {
            throw $th;
        }
    }
    public static function selectEmployee()
    {
        try {
            $array = [];
            $rs = EmployeeModel::fetch();
            foreach ($rs as $row => $value) {
                $rsPosition = PositionModel::fetchById($value->position_id);
                $prefix = !empty($value->prefix_th) ? $value->prefix_th : $value->prefix_en;
                $name = !empty($value->name_th) ? $value->name_th : $value->name_en;
                $array[$row]['user_id'] = $value->user_id;
                $array[$row]['text_select'] = 'ตำแหน่ง : ' . $rsPosition->position_name_th . ' | ' . $prefix . ' ' . $name;
            }
            return [
                'data' => $array,
                'message' => null,
                'success' => true,
            ];
        } catch (\Throwable $th) {
            throw $th;
        }
    }
}
