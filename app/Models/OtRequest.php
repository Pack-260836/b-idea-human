<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OtRequest extends Model
{
    use HasFactory;

    protected $table = 'ot_requests';

    protected $fillable = [
        'request_no',
        'employee_id',
        'ot_date',
        'start_time',
        'end_time',
        'total_hours',
        'ot_type',
        'reason',
        'status',
        'approved_by',
        'approved_at',
        'created_by',
    ];

    protected $casts = [
        'ot_date'     => 'date',
        'total_hours' => 'decimal:2',
        'approved_at' => 'datetime',
        'created_at'  => 'datetime',
        'updated_at'  => 'datetime',
    ];

    // Relationships
    public function employee()
    {
        return $this->belongsTo(Employee::class, 'employee_id');
    }
}
