<?php

namespace App\Models\MasterModels;

use App\Helpers\JsonResult;
use Illuminate\Support\Facades\DB;

class TimeWorkModel
{
    private const TABLE = 'shift_time_work';
    private const PK = 'shift_id';

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
            ->first();
    }
}
