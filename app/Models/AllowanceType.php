<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AllowanceType extends Model
{
    use HasFactory;

    protected $table = 'allowance_types';

    protected $fillable = [
        'company_id',
        'allowance_code',
        'allowance_name',
        'calc_type',
        'default_amount',
        'taxable',
        'is_active',
        'created_by',
    ];

    protected $casts = [
        'default_amount' => 'decimal:2',
        'taxable'        => 'boolean',
        'is_active'      => 'boolean',
        'created_at'     => 'datetime',
        'updated_at'     => 'datetime',
    ];

    // Relationships
    public function company()
    {
        return $this->belongsTo(Company::class, 'company_id');
    }

    public function employeeAllowances()
    {
        return $this->hasMany(EmployeeAllowance::class, 'allowance_type_id');
    }
}
