<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Company extends Model
{
    use HasFactory;

    protected $table = 'companies';

    protected $fillable = [
        'company_code',
        'company_name_th',
        'company_name_en',
        'tax_id',
        'address',
        'tel',
        'email',
        'logo_path',
        'created_by',
    ];

    protected $casts = [
        'created_at' => 'datetime',
        'updated_at' => 'datetime',
    ];

    // Relationships
    public function departments()
    {
        return $this->hasMany(Department::class, 'company_id');
    }

    public function positions()
    {
        return $this->hasMany(Position::class, 'company_id');
    }

    public function timeWorkConfigs()
    {
        return $this->hasMany(TimeWorkConfig::class, 'company_id');
    }

    public function employees()
    {
        return $this->hasMany(Employee::class, 'company_id');
    }

    public function allowanceTypes()
    {
        return $this->hasMany(AllowanceType::class, 'company_id');
    }

    public function leaveTypes()
    {
        return $this->hasMany(LeaveType::class, 'company_id');
    }

    public function otConfigs()
    {
        return $this->hasMany(OtConfig::class, 'company_id');
    }

    public function payrollPeriods()
    {
        return $this->hasMany(PayrollPeriod::class, 'company_id');
    }
}
