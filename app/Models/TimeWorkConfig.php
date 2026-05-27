<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TimeWorkConfig extends Model
{
    use HasFactory;

    protected $table = 'time_work_configs';

    protected $fillable = [
        'company_id',
        'config_name',
        'work_in',
        'work_out',
        'break_start',
        'break_end',
        'work_hours_per_day',
        'work_days_per_week',
        'is_active',
        'created_by',
    ];

    protected $casts = [
        'work_hours_per_day' => 'decimal:2',
        'is_active'          => 'boolean',
        'created_at'         => 'datetime',
        'updated_at'         => 'datetime',
    ];

    // Relationships
    public function company()
    {
        return $this->belongsTo(Company::class, 'company_id');
    }

    public function employees()
    {
        return $this->hasMany(Employee::class, 'time_work_id');
    }
}
