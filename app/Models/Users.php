<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\Hash;

class Users extends Authenticatable
{
    use HasFactory, Notifiable;
    protected $table = 'sys_users'; // หรือเปลี่ยนเป็น 'sys_users' ถ้าใช้ชื่อนั้นจริง

    protected $primaryKey = 'user_id';
    public $incrementing = false; // เพราะ user_id เป็น varchar ไม่ใช่ auto-increment
    protected $keyType = 'string';

    protected $fillable = [
        'user_id',
        'username',
        'password',
        'prefix_th',
        'prefix_en',
        'name_th',
        'name_en',
        'gender',
        'birthday',
        'citizen_id',
        'nationality_id',
        'emp_type',
        'emp_work_status',
        'start_date',
        'wage_value',
        'emp_level',
        'last_login_at',
        'created_by',
        'created_at',
        'upated_by',
        'updated_at',
    ];

    protected $hidden = [
        'password',
    ];

    protected $casts = [
        'birthday' => 'date',
        'start_date' => 'date',
        'last_login_at' => 'datetime',
        'created_at' => 'datetime',
        'updated_at' => 'datetime',
    ];
    /**
     * เข้ารหัสรหัสผ่านก่อนบันทึก
     */
    public function setPasswordAttribute($value)
    {
        if ($value && !Hash::needsRehash($value)) {
            $this->attributes['password'] = Hash::make($value);
        }
    }
    /**
     * ตรวจสอบว่าเป็น admin หรือไม่
     */
    public function isAdmin()
    {
        return $this->emp_level == '1';
    }

    public function isChief()
    {
        return $this->emp_level == '2';
    }

    public function isUser()
    {
        return $this->emp_level == '3';
    }
}
