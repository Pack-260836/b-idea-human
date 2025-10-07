<?php

namespace App\Services;

use App\Helpers\JsonResult;
use Illuminate\Support\Facades\Auth;

class LeaveFormService
{
    public static function update($request)
    {
        try {
            $user = Auth::guard('admin')->user();
            $body = $request->all();
            dd($body, 'ดเหำพเไ');
            $leave_form_id = $body['leave_form_id'];
            unset($body['leave_form_id']);
        } catch (\Throwable $th) {
            throw $th;
        }
    }
    public static function fetch()
    {
        try {
            //code...
        } catch (\Throwable $th) {
            throw $th;
        }
    }
    public static function fetchById($leave_form_id)
    {
        try {
            //code...
        } catch (\Throwable $th) {
            throw $th;
        }
    }
}
