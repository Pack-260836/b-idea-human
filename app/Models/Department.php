<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Department extends Model
{
    use HasFactory;

    protected $table = 'departments';

    protected $fillable = [
        'company_id',
        'dept_code',
        'dept_name_th',
        'dept_name_en',
        'is_active',
        'created_by',
    ];

    protected $casts = [
        'is_active'  => 'boolean',
        'created_at' => 'datetime',
        'updated_at' => 'datetime',
    ];

    // Relationships
    public function company()
    {
        return $this->belongsTo(Company::class, 'company_id');
    }

    public function positions()
    {
        return $this->hasMany(Position::class, 'dept_id');
    }

    public function employees()
    {
        return $this->hasMany(Employee::class, 'dept_id');
    }
}
