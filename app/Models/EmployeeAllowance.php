<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EmployeeAllowance extends Model
{
    use HasFactory;

    protected $table = 'employee_allowances';

    protected $fillable = [
        'employee_id',
        'allowance_type_id',
        'amount',
        'effective_date',
        'end_date',
        'is_active',
        'created_by',
    ];

    protected $casts = [
        'amount'         => 'decimal:2',
        'effective_date' => 'date',
        'end_date'       => 'date',
        'is_active'      => 'boolean',
        'created_at'     => 'datetime',
        'updated_at'     => 'datetime',
    ];

    // Relationships
    public function employee()
    {
        return $this->belongsTo(Employee::class, 'employee_id');
    }

    public function allowanceType()
    {
        return $this->belongsTo(AllowanceType::class, 'allowance_type_id');
    }
}
