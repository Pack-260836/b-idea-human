# B-Idea HRM — Database Design

> อัปเดต: 2026-05-27

---

## ภาพรวม Schema

```
companies
  ├── departments
  │     └── positions
  ├── time_work_configs
  ├── leave_types
  ├── ot_configs
  ├── allowance_types
  └── payroll_periods
        └── payroll_items

employees  (FK → companies, departments, positions, time_work_configs, sys_users)
  ├── timesheets
  ├── leave_requests    (FK → leave_types)
  ├── ot_requests
  ├── salary_histories
  ├── employee_allowances  (FK → allowance_types)
  ├── payroll_items        (FK → payroll_periods)
  └── job_orders

sys_users  (auth — emp_level: 1=admin, 2=chief, 3=user)
```

---

## ตารางทั้งหมด (16 ตาราง)

### 1. `companies` — ข้อมูลบริษัท
| Column | Type | Notes |
|--------|------|-------|
| id | bigint PK | |
| company_code | varchar(25) unique | รหัสบริษัท |
| company_name_th | varchar(255) | ชื่อภาษาไทย |
| company_name_en | varchar(255) nullable | ชื่อภาษาอังกฤษ |
| tax_id | varchar(13) nullable | เลขประจำตัวผู้เสียภาษี |
| address | text nullable | |
| tel | varchar(20) nullable | |
| email | varchar(100) nullable | |
| logo_path | varchar nullable | path รูปโลโก้ |
| created_by | varchar nullable | |
| timestamps | | |

---

### 2. `departments` — แผนก
| Column | Type | Notes |
|--------|------|-------|
| id | bigint PK | |
| company_id | FK → companies | |
| dept_code | varchar(20) unique | |
| dept_name_th | varchar(255) | |
| dept_name_en | varchar(255) nullable | |
| is_active | bool default true | |
| created_by | varchar nullable | |
| timestamps | | |

---

### 3. `positions` — ตำแหน่งงาน
| Column | Type | Notes |
|--------|------|-------|
| id | bigint PK | |
| company_id | FK → companies | |
| dept_id | FK → departments nullable | |
| position_code | varchar(20) unique | |
| position_name_th | varchar(255) | |
| position_name_en | varchar(255) nullable | |
| min_salary | decimal(10,2) nullable | เงินเดือนขั้นต่ำ |
| max_salary | decimal(10,2) nullable | เงินเดือนสูงสุด |
| is_active | bool default true | |
| created_by | varchar nullable | |
| timestamps | | |

---

### 4. `time_work_configs` — กะ/เวลาทำงาน
| Column | Type | Notes |
|--------|------|-------|
| id | bigint PK | |
| company_id | FK → companies | |
| config_name | varchar(100) | ชื่อกะ เช่น "กะเช้า 08:00-17:00" |
| work_in | time | เวลาเข้างาน |
| work_out | time | เวลาออกงาน |
| break_start | time nullable | เวลาเริ่มพัก |
| break_end | time nullable | เวลาสิ้นสุดพัก |
| work_hours_per_day | decimal(4,2) default 8 | ชั่วโมงงาน/วัน |
| work_days_per_week | tinyint default 5 | วันทำงาน/สัปดาห์ |
| is_active | bool default true | |
| created_by | varchar nullable | |
| timestamps | | |

---

### 5. `employees` — ข้อมูลพนักงาน (ตารางหลัก)
| Column | Type | Notes |
|--------|------|-------|
| id | bigint PK | |
| emp_code | varchar(20) unique | รหัสพนักงาน เช่น EMP-001 |
| user_id | varchar FK → sys_users nullable | เชื่อม account login |
| company_id | FK → companies | |
| dept_id | FK → departments nullable | |
| position_id | FK → positions nullable | |
| time_work_id | FK → time_work_configs nullable | |
| prefix_th / prefix_en | varchar(20) nullable | คำนำหน้า |
| name_th / name_en | varchar(255) | ชื่อ-นามสกุล |
| gender | enum M/F/Other | |
| birthday | date nullable | |
| citizen_id | varchar(13) nullable | เลขบัตรประชาชน |
| nationality | varchar(50) default 'ไทย' | |
| emp_type | enum fulltime/parttime/contract/daily | ประเภทพนักงาน |
| emp_status | enum active/resigned/terminated default active | สถานะ |
| start_date | date nullable | วันเริ่มงาน |
| resign_date | date nullable | วันลาออก |
| base_salary | decimal(10,2) default 0 | เงินเดือนฐาน |
| salary_type | enum monthly/daily/hourly | ประเภทค่าจ้าง |
| bank_name | varchar(100) nullable | |
| bank_account | varchar(20) nullable | |
| photo_path | varchar nullable | |
| created_by | varchar nullable | |
| timestamps | | |

---

### 6. `allowance_types` — ประเภทเบี้ยเลี้ยง/สวัสดิการ
| Column | Type | Notes |
|--------|------|-------|
| id | bigint PK | |
| company_id | FK → companies | |
| allowance_code | varchar(20) unique | |
| allowance_name | varchar(255) | เช่น ค่าเดินทาง, ค่าอาหาร |
| calc_type | enum fixed/percent | วิธีคำนวณ |
| default_amount | decimal(10,2) default 0 | จำนวนเริ่มต้น |
| taxable | bool default false | ต้องเสียภาษีหรือไม่ |
| is_active | bool default true | |
| created_by | varchar nullable | |
| timestamps | | |

---

### 7. `employee_allowances` — เบี้ยเลี้ยงรายบุคคล
| Column | Type | Notes |
|--------|------|-------|
| id | bigint PK | |
| employee_id | FK → employees | |
| allowance_type_id | FK → allowance_types | |
| amount | decimal(10,2) | จำนวนเงิน |
| effective_date | date | วันที่มีผล |
| end_date | date nullable | วันที่สิ้นสุด |
| is_active | bool default true | |
| created_by | varchar nullable | |
| timestamps | | |

---

### 8. `salary_histories` — ประวัติการปรับเงินเดือน
| Column | Type | Notes |
|--------|------|-------|
| id | bigint PK | |
| employee_id | FK → employees | |
| old_salary | decimal(10,2) | เงินเดือนเก่า |
| new_salary | decimal(10,2) | เงินเดือนใหม่ |
| change_reason | text nullable | เหตุผล |
| effective_date | date | วันที่มีผล |
| status | enum pending/approved/rejected | |
| approved_by | unsignedBigInteger nullable | user_id ผู้อนุมัติ |
| approved_at | datetime nullable | |
| created_by | varchar nullable | |
| timestamps | | |

---

### 9. `leave_types` — ประเภทการลา
| Column | Type | Notes |
|--------|------|-------|
| id | bigint PK | |
| company_id | FK → companies | |
| leave_code | varchar(20) unique | เช่น LV-SICK |
| leave_name | varchar(255) | เช่น ลาป่วย |
| max_days_per_year | decimal(5,1) default 0 | วันลาสูงสุด/ปี |
| paid_leave | bool default true | ลาได้รับค่าจ้างหรือไม่ |
| is_active | bool default true | |
| created_by | varchar nullable | |
| timestamps | | |

---

### 10. `leave_requests` — ใบลา
| Column | Type | Notes |
|--------|------|-------|
| id | bigint PK | |
| request_no | varchar(30) unique | เลขที่ใบลา เช่น LV-2025-001 |
| employee_id | FK → employees | |
| leave_type_id | FK → leave_types | |
| start_date | date | วันที่เริ่มลา |
| end_date | date | วันที่สิ้นสุดลา |
| total_days | decimal(5,1) | จำนวนวัน |
| reason | text nullable | สาเหตุ |
| status | enum pending/approved/rejected/cancelled | |
| approved_by | unsignedBigInteger nullable | |
| approved_at | datetime nullable | |
| remark | text nullable | หมายเหตุผู้อนุมัติ |
| created_by | varchar nullable | |
| timestamps | | |

---

### 11. `ot_configs` — อัตราค่าโอที
| Column | Type | Notes |
|--------|------|-------|
| id | bigint PK | |
| company_id | FK → companies | |
| ot_type | enum weekday/weekend/holiday | |
| rate_multiplier | decimal(4,2) default 1.5 | ตัวคูณ: 1.5x / 2x / 3x |
| max_hours_per_day | decimal(4,1) nullable | ชั่วโมง OT สูงสุด/วัน |
| is_active | bool default true | |
| created_by | varchar nullable | |
| timestamps | | |

---

### 12. `ot_requests` — คำขอโอที
| Column | Type | Notes |
|--------|------|-------|
| id | bigint PK | |
| request_no | varchar(30) unique | เลขที่คำขอ OT |
| employee_id | FK → employees | |
| ot_date | date | วันที่ทำโอที |
| start_time / end_time | time | เวลาเริ่ม/สิ้นสุด |
| total_hours | decimal(4,2) | จำนวนชั่วโมง |
| ot_type | enum weekday/weekend/holiday | |
| reason | text nullable | |
| status | enum pending/approved/rejected | |
| approved_by | unsignedBigInteger nullable | |
| approved_at | datetime nullable | |
| created_by | varchar nullable | |
| timestamps | | |

---

### 13. `timesheets` — บันทึกเวลาเข้า-ออก
| Column | Type | Notes |
|--------|------|-------|
| id | bigint PK | |
| employee_id | FK → employees | |
| work_date | date | วันที่ |
| check_in_1 / check_out_1 | time nullable | เข้า/ออก รอบ 1 |
| check_in_2 / check_out_2 | time nullable | เข้า/ออก รอบ 2 |
| total_work_hours | decimal(4,2) default 0 | ชั่วโมงงานรวม |
| ot_hours | decimal(4,2) default 0 | โอทีทำงาน |
| ot_extra_hours | decimal(4,2) default 0 | โอทีเสริม |
| late_minutes | int default 0 | นาทีสาย |
| early_leave_minutes | int default 0 | นาทีออกก่อนเวลา |
| status | enum normal/late/absent/leave/holiday | |
| remark | text nullable | |
| created_by | varchar nullable | |
| timestamps | | |
| **UNIQUE** | (employee_id, work_date) | 1 row ต่อ 1 พนักงาน ต่อ 1 วัน |

---

### 14. `payroll_periods` — งวดเงินเดือน
| Column | Type | Notes |
|--------|------|-------|
| id | bigint PK | |
| company_id | FK → companies | |
| period_year | year | ปี เช่น 2025 |
| period_month | tinyint(1-12) | เดือน |
| period_name | varchar(100) | เช่น "ตุลาคม 2568" |
| start_date / end_date | date | ช่วงงวด |
| status | enum draft/processing/approved/paid | |
| processed_by | unsignedBigInteger nullable | |
| processed_at | datetime nullable | |
| created_by | varchar nullable | |
| timestamps | | |
| **UNIQUE** | (company_id, period_year, period_month) | 1 งวดต่อเดือนต่อบริษัท |

---

### 15. `payroll_items` — รายการเงินเดือนรายบุคคล
| Column | Type | Notes |
|--------|------|-------|
| id | bigint PK | |
| payroll_period_id | FK → payroll_periods | |
| employee_id | FK → employees | |
| base_salary | decimal(10,2) | เงินเดือนฐาน |
| working_days | int | วันทำงานตามสัญญา |
| present_days | int | วันที่มาทำงานจริง |
| absent_days / late_days | int | |
| total_allowances | decimal(10,2) | รวมเบี้ยเลี้ยง |
| total_ot_amount | decimal(10,2) | รวมค่าโอที |
| gross_salary | decimal(10,2) | เงินได้รวม |
| social_security | decimal(10,2) | ประกันสังคม |
| tax_amount | decimal(10,2) | ภาษีหัก ณ ที่จ่าย |
| total_deductions | decimal(10,2) | รวมหักทั้งหมด |
| net_salary | decimal(10,2) | เงินสุทธิ |
| status | enum draft/confirmed | |
| created_by | varchar nullable | |
| timestamps | | |
| **UNIQUE** | (payroll_period_id, employee_id) | |

---

### 16. `job_orders` — ใบงาน (Job)
| Column | Type | Notes |
|--------|------|-------|
| id | bigint PK | |
| job_no | varchar(30) unique | เลขที่ใบงาน |
| employee_id | FK → employees | |
| job_title | varchar(255) | หัวข้องาน |
| job_detail | text nullable | รายละเอียด |
| job_amount | decimal(10,2) default 0 | ค่าจ้าง |
| assign_date | date | วันที่มอบหมาย |
| due_date | date nullable | วันที่กำหนดเสร็จ |
| status | enum assigned/inprogress/done/cancelled | |
| remark | text nullable | |
| created_by | varchar nullable | |
| timestamps | | |

---

## Relationships Map

```
Company 1──* Department
Company 1──* Position
Company 1──* TimeWorkConfig
Company 1──* AllowanceType
Company 1──* LeaveType
Company 1──* OtConfig
Company 1──* PayrollPeriod

Department 1──* Position
Department 1──* Employee

Employee *──1 Company
Employee *──1 Department
Employee *──1 Position
Employee *──1 TimeWorkConfig
Employee *──1 SysUser (optional login account)
Employee 1──* Timesheet
Employee 1──* LeaveRequest
Employee 1──* OtRequest
Employee 1──* SalaryHistory
Employee 1──* EmployeeAllowance
Employee 1──* PayrollItem
Employee 1──* JobOrder

LeaveRequest *──1 LeaveType
EmployeeAllowance *──1 AllowanceType
PayrollItem *──1 PayrollPeriod
```

---

## Enum Values Reference

| Table | Column | Values |
|-------|--------|--------|
| employees | emp_type | fulltime / parttime / contract / daily |
| employees | emp_status | active / resigned / terminated |
| employees | salary_type | monthly / daily / hourly |
| employees | gender | M / F / Other |
| salary_histories | status | pending / approved / rejected |
| leave_requests | status | pending / approved / rejected / cancelled |
| ot_requests | status | pending / approved / rejected |
| ot_configs | ot_type | weekday / weekend / holiday |
| ot_requests | ot_type | weekday / weekend / holiday |
| timesheets | status | normal / late / absent / leave / holiday |
| payroll_periods | status | draft / processing / approved / paid |
| payroll_items | status | draft / confirmed |
| job_orders | status | assigned / inprogress / done / cancelled |

---

## Models (app/Models/)

| Model | Table |
|-------|-------|
| Company | companies |
| Department | departments |
| Position | positions |
| TimeWorkConfig | time_work_configs |
| Employee | employees |
| AllowanceType | allowance_types |
| EmployeeAllowance | employee_allowances |
| SalaryHistory | salary_histories |
| LeaveType | leave_types |
| LeaveRequest | leave_requests |
| OtConfig | ot_configs |
| OtRequest | ot_requests |
| Timesheet | timesheets |
| PayrollPeriod | payroll_periods |
| PayrollItem | payroll_items |
| JobOrder | job_orders |
| Users | sys_users (auth) |

---

## Migration Files

ทั้งหมดอยู่ใน `database/migrations/` — timestamps `2026_05_27_210000` ถึง `2026_05_27_211500`
