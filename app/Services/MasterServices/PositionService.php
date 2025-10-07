<?php

namespace App\Services\MasterServices;

use App\Helpers\JsonResult;
use Illuminate\Support\Facades\Auth;

class PositionService
{
    public static function update($request)
    {
        try {
            $user = Auth::guard('admin')->user();
            $body = $request->all();
            $position_id = $body['position_id'];
            unset($body['position_id']);
        } catch (\Throwable $th) {
            throw $th;
        }
    }
}
