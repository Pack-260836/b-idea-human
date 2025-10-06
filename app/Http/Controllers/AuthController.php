<?php

namespace App\Http\Controllers;

use App\Helpers\GlobalFunc;
use App\Helpers\JsonResult;
use App\Services\AuthService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Session;

class AuthController
{
    public static function checkLogin(Request $request)
    {
        $rules = array(
            'username' => 'required',
            'password' => 'required',
        );
        $messages = array(
            'username.required' => 'กรุณาใส่ข้อมูลให้ครบถ้วน!',
            'password.required' => 'กรุณาใส่ข้อมูลให้ครบถ้วน!',
        );
        $rsValidate = GlobalFunc::validateCheck($request, $rules, $messages);
        if (!is_null($rsValidate)) {
            return JsonResult::errors($rsValidate['data'], $rsValidate['message']);
        }
        $result = AuthService::checkLogin($request);
        if ($result['success'] == false) {
            return JsonResult::errors($result['data'], $result['message']);
        }
        return JsonResult::success($result['data'], $result['message']);
    }
    public static function checkLogout()
    {
        try {
            $guards = ['admin', 'chief', 'users'];

            foreach ($guards as $guard) {
                if (Auth::guard($guard)->check()) {
                    Log::info("🔐 Logout guard: $guard");

                    $user = Auth::guard($guard)->user();

                    if ($user instanceof \Illuminate\Database\Eloquent\Model && isset($user->remember_token)) {
                        $user->remember_token = null;
                        $user->save();
                    }

                    Auth::guard($guard)->logout();
                    break;
                }
            }
            Session::flush();
            return response()->json([
                'success' => true,
                'message' => 'ออกจากระบบสำเร็จ',
            ]);
        } catch (\Throwable $e) {
            Log::error('❌ Logout Error: ' . $e->getMessage());
            return response()->json([
                'success' => false,
                'message' => 'เกิดข้อผิดพลาดระหว่าง Logout',
                'error' => $e->getMessage()
            ], 500);
        }
    }
}
