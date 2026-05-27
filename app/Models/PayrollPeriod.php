<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PayrollPeriod extends Model
{
    use HasFactory;

    protected $table = 'payroll_periods';

    protected $fillable = [
        'company_id',
        'period_year',
        'period_month',
        'period_name',
        'start_date',
        'end_date',
        'status',
        'processed_by',
        'processed_at',
        'created_by',
    ];

    protected $casts = [
        'start_date'   => 'date',
        'end_date'     => 'date',
        'processed_at' => 'datetime',
        'created_at'   => 'datetime',
        'updated_at'   => 'datetime',
    ];

    // Relationships
    public function company()
    {
        return $this->belongsTo(Company::class, 'company_id');
    }

    public function payrollItems()
    {
        return $this->hasMany(PayrollItem::class, 'payroll_period_id');
    }
}
