<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Timesheet extends Model
{
    use HasFactory;

    protected $table = 'timesheets';

    protected $fillable = [
        'employee_id',
        'work_date',
        'check_in_1',
        'check_out_1',
        'check_in_2',
        'check_out_2',
        'total_work_hours',
        'ot_hours',
        'ot_extra_hours',
        'late_minutes',
        'early_leave_minutes',
        'status',
        'remark',
        'created_by',
    ];

    protected $casts = [
        'work_date'          => 'date',
        'total_work_hours'   => 'decimal:2',
        'ot_hours'           => 'decimal:2',
        'ot_extra_hours'     => 'decimal:2',
        'late_minutes'       => 'integer',
        'early_leave_minutes'=> 'integer',
        'created_at'         => 'datetime',
        'updated_at'         => 'datetime',
    ];

    // Relationships
    public function employee()
    {
        return $this->belongsTo(Employee::class, 'employee_id');
    }
}
