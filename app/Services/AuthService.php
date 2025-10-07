<?php

namespace App\Services;

use App\Helpers\JsonResult;
use App\Models\Users;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;

class AuthService
{
    public static function checkLogin($request)
    {
        try {
            $body = $request->all();
            $sys_users = Users::where('username', $body['username'])->first();
            if (!$sys_users) {
                return [
                    'data' => null,
                    'message' => 'ไม่มีชื่อผู้ใช้งานมีอยู่ในระบบ',
                    'success' => false
                ];
            }
            $passwordHash = $sys_users->password;
            if (Hash::check($body['password'], $passwordHash) == false) {
                return [
                    'data' => null,
                    'message' => 'รหัสผ่านไม่ถูกต้อง',
                    'success' => false
                ];
            }
            $guardMap = [
                1 => 'admin',
                2 => 'chief',
                3 => 'user'
            ];
            $redirectMap = [
                'admin' => '/admin/dashboard',
                'chief' => '/chief/dashboard',
                'user' => '/dashboard',
            ];
            $guard = $guardMap[$sys_users->emp_level];
            $isAuth = Auth::guard($guard)->attempt([
                'username' => $body['username'],
                'password' => $body['password'],
            ]);
            if (!$isAuth) {
                return [
                    'data' => null,
                    'message' => 'ไม่สามารถเข้าสู่ระบบได้เนื่องจากการยืนยันตัวตนผิดพลาด',
                    'success' => false
                ];
            }
            // dd($redirectMap[$guard]);
            return [
                'data' => [
                    'user' => Auth::guard($guard)->user(),
                    'redirect' => $redirectMap[$guard],
                ],
                'redirect' => $redirectMap[$guard],
                'message' => 'เข้าสู่ระบบสำเร็จ',
                'success' => true
            ];
        } catch (\Throwable $th) {
            // Log::info('User logged in', ['username' => $sys_users->username, 'role' => $guard]);
            throw $th;
        }
    }
}
