<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    use HasFactory;

    protected $table = 'employees';

    protected $fillable = [
        'emp_code',
        'user_id',
        'company_id',
        'dept_id',
        'position_id',
        'time_work_id',
        'prefix_th',
        'prefix_en',
        'name_th',
        'name_en',
        'gender',
        'birthday',
        'citizen_id',
        'nationality',
        'emp_type',
        'emp_status',
        'start_date',
        'resign_date',
        'base_salary',
        'salary_type',
        'bank_name',
        'bank_account',
        'photo_path',
        'created_by',
    ];

    protected $casts = [
        'birthday'    => 'date',
        'start_date'  => 'date',
        'resign_date' => 'date',
        'base_salary' => 'decimal:2',
        'created_at'  => 'datetime',
        'updated_at'  => 'datetime',
    ];

    // Relationships
    public function company()
    {
        return $this->belongsTo(Company::class, 'company_id');
    }

    public function department()
    {
        return $this->belongsTo(Department::class, 'dept_id');
    }

    public function position()
    {
        return $this->belongsTo(Position::class, 'position_id');
    }

    public function timeWorkConfig()
    {
        return $this->belongsTo(TimeWorkConfig::class, 'time_work_id');
    }

    public function timesheets()
    {
        return $this->hasMany(Timesheet::class, 'employee_id');
    }

    public function leaveRequests()
    {
        return $this->hasMany(LeaveRequest::class, 'employee_id');
    }

    public function otRequests()
    {
        return $this->hasMany(OtRequest::class, 'employee_id');
    }

    public function salaryHistories()
    {
        return $this->hasMany(SalaryHistory::class, 'employee_id');
    }

    public function employeeAllowances()
    {
        return $this->hasMany(EmployeeAllowance::class, 'employee_id');
    }

    public function payrollItems()
    {
        return $this->hasMany(PayrollItem::class, 'employee_id');
    }

    public function jobOrders()
    {
        return $this->hasMany(JobOrder::class, 'employee_id');
    }
}
