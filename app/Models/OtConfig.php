<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OtConfig extends Model
{
    use HasFactory;

    protected $table = 'ot_configs';

    protected $fillable = [
        'company_id',
        'ot_type',
        'rate_multiplier',
        'max_hours_per_day',
        'is_active',
        'created_by',
    ];

    protected $casts = [
        'rate_multiplier'   => 'decimal:2',
        'max_hours_per_day' => 'decimal:1',
        'is_active'         => 'boolean',
        'created_at'        => 'datetime',
        'updated_at'        => 'datetime',
    ];

    // Relationships
    public function company()
    {
        return $this->belongsTo(Company::class, 'company_id');
    }
}
