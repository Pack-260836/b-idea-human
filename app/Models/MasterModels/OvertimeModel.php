<?php

namespace App\Models\MasterModels;

use App\Helpers\JsonResult;
use Illuminate\Support\Facades\DB;

class OvertimeModel
{
    private const TABLE = 'overtime';
    private const PK = 'overtime_id';

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
            ->get()->toArray();
    }
    public static function fetchById($position_id)
    {
        return DB::table(self::TABLE)
            ->where(self::PK, $position_id)
            ->first();
    }
}
