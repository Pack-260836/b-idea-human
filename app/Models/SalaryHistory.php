<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SalaryHistory extends Model
{
    use HasFactory;

    protected $table = 'salary_histories';

    protected $fillable = [
        'employee_id',
        'old_salary',
        'new_salary',
        'change_reason',
        'effective_date',
        'status',
        'approved_by',
        'approved_at',
        'created_by',
    ];

    protected $casts = [
        'old_salary'     => 'decimal:2',
        'new_salary'     => 'decimal:2',
        'effective_date' => 'date',
        'approved_at'    => 'datetime',
        'created_at'     => 'datetime',
        'updated_at'     => 'datetime',
    ];

    // Relationships
    public function employee()
    {
        return $this->belongsTo(Employee::class, 'employee_id');
    }
}
