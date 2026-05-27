<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PayrollItem extends Model
{
    use HasFactory;

    protected $table = 'payroll_items';

    protected $fillable = [
        'payroll_period_id',
        'employee_id',
        'base_salary',
        'working_days',
        'present_days',
        'absent_days',
        'late_days',
        'total_allowances',
        'total_ot_amount',
        'gross_salary',
        'social_security',
        'tax_amount',
        'total_deductions',
        'net_salary',
        'status',
        'created_by',
    ];

    protected $casts = [
        'base_salary'      => 'decimal:2',
        'total_allowances' => 'decimal:2',
        'total_ot_amount'  => 'decimal:2',
        'gross_salary'     => 'decimal:2',
        'social_security'  => 'decimal:2',
        'tax_amount'       => 'decimal:2',
        'total_deductions' => 'decimal:2',
        'net_salary'       => 'decimal:2',
        'working_days'     => 'integer',
        'present_days'     => 'integer',
        'absent_days'      => 'integer',
        'late_days'        => 'integer',
        'created_at'       => 'datetime',
        'updated_at'       => 'datetime',
    ];

    // Relationships
    public function payrollPeriod()
    {
        return $this->belongsTo(PayrollPeriod::class, 'payroll_period_id');
    }

    public function employee()
    {
        return $this->belongsTo(Employee::class, 'employee_id');
    }
}
