<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class JobOrder extends Model
{
    use HasFactory;

    protected $table = 'job_orders';

    protected $fillable = [
        'job_no',
        'employee_id',
        'job_title',
        'job_detail',
        'job_amount',
        'assign_date',
        'due_date',
        'status',
        'remark',
        'created_by',
    ];

    protected $casts = [
        'job_amount'  => 'decimal:2',
        'assign_date' => 'date',
        'due_date'    => 'date',
        'created_at'  => 'datetime',
        'updated_at'  => 'datetime',
    ];

    // Relationships
    public function employee()
    {
        return $this->belongsTo(Employee::class, 'employee_id');
    }
}
