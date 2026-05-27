<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LeaveType extends Model
{
    use HasFactory;

    protected $table = 'leave_types';

    protected $fillable = [
        'company_id',
        'leave_code',
        'leave_name',
        'max_days_per_year',
        'paid_leave',
        'is_active',
        'created_by',
    ];

    protected $casts = [
        'max_days_per_year' => 'decimal:1',
        'paid_leave'        => 'boolean',
        'is_active'         => 'boolean',
        'created_at'        => 'datetime',
        'updated_at'        => 'datetime',
    ];

    // Relationships
    public function company()
    {
        return $this->belongsTo(Company::class, 'company_id');
    }

    public function leaveRequests()
    {
        return $this->hasMany(LeaveRequest::class, 'leave_type_id');
    }
}
