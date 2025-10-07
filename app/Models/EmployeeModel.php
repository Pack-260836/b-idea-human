<?php

namespace App\Models;

use App\Helpers\JsonResult;
use Illuminate\Support\Facades\DB;

class EmployeeModel
{
    private const TABLE = 'sys_users';
    private const PK = 'user_id';

    public static function create($data)
    {
        return DB::table(self::TABLE)->insert($data);
    }
    public static function update($id, $data)
    {
        return DB::table(self::TABLE)
            ->where(self::PK, $id)
            ->update($data);
    }
    public static function fetch()
    {
        return DB::table(self::TABLE)
            ->where('user_level', 1)
            ->get()->toArray();
    }
    public static function fetchById($user_id)
    {
        return DB::table(self::TABLE)
            ->where(self::PK, $user_id)
            ->first();
    }
}
