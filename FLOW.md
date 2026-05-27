# B-Idea Human — Application Flow

## Tech Stack
- **Framework:** Laravel 8.x (PHP 7.3 / 8.0)
- **Frontend:** Blade Template + jQuery + SweetAlert2
- **Auth:** Laravel Session-based Multi-Guard
- **Database:** MySQL (via XAMPP)

---

## 1. โครงสร้าง Routes

| ไฟล์ | Middleware | คำอธิบาย |
|------|-----------|----------|
| `routes/web.php` | `auth:admin`, `auth:chief`, `auth:user` | หน้าเพจของแต่ละ role |
| `routes/backend.php` | ไม่มี (public) | API สำหรับ Auth (login/logout) |
| `routes/api.php` | `auth:api` | API route มาตรฐาน Laravel |

---

## 2. Authentication Flow

```
[Browser] → GET /
         ↓
[login.blade.php] แสดงฟอร์ม Login
         ↓
[User กรอก username + password] → submit form
         ↓
[jQuery AJAX] → POST /backend/v1/auth/check/login
         ↓
[AuthController::checkLogin()]
  ├── GlobalFunc::validateCheck() — ตรวจ required fields
  ├── AuthService::checkLogin()
  │     ├── Users::where('username', ...) — ค้นหา user ใน sys_users
  │     ├── Hash::check(password) — ตรวจรหัสผ่าน
  │     ├── guardMap: emp_level → guard
  │     │     1 = admin, 2 = chief, 3 = users
  │     ├── Auth::guard($guard)->attempt(...) — สร้าง session
  │     └── return redirect URL ตาม guard
  └── JsonResult::success/errors — ส่ง JSON กลับ
         ↓
[Browser] รับ response.data.redirect → window.location.href
         ↓
[/admin/dashboard | /chief/dashboard | /dashboard]
```

### Logout Flow
```
POST /backend/v1/auth/check/logout
  ↓
AuthController::checkLogout()
  ├── วนลูปตรวจ guards: ['admin', 'chief', 'users']
  ├── ล้าง remember_token
  ├── Auth::guard($guard)->logout()
  └── Session::flush()
```

---

## 3. Role & Guard Mapping

| emp_level | Guard | Redirect |
|-----------|-------|----------|
| 1 | admin | `/admin/dashboard` |
| 2 | chief | `/chief/dashboard` |
| 3 | users | `/dashboard` |

Auth Providers ทุก guard ใช้ model `App\Models\Users` (ตาราง `sys_users`)

---

## 4. Admin Page Flow

```
[auth:admin middleware] → ตรวจ session guard
  ↓
AdminPageController::__construct()
  └── middleware → $this->user = Auth::user()
  ↓
ส่ง $user_data ไปยัง view ทุกหน้า
```

### หน้าที่มี (Admin Routes)

| URL | Method | View |
|-----|--------|------|
| `/admin/dashboard` | GET | `pages.dashboard` |
| `/admin/leave-form` | GET | `pages.leave_form` |
| `/admin/ot-form` | GET | `pages.ot_form` |
| `/admin/job-form` | GET | `pages.job_form` |
| `/admin/employee` | GET | `pages.employee` |
| `/admin/employee/add` | GET | `pages.employee_add` |
| `/admin/upsalary` | GET | `pages.upsalary` |
| `/admin/payroll` | GET | `pages.payroll` |
| `/admin/payroll/process` | GET | `pages.payroll-process` |
| `/admin/payroll/report` | GET | `pages.payroll-report` |
| `/admin/master` | GET | `pages.master` |
| `/admin/master/company` | GET | `pages.masters.company` |
| `/admin/master/timework` | GET | `pages.masters.time_work` |
| `/admin/master/position` | GET | `pages.masters.position` |
| `/admin/master/allowance` | GET | `pages.masters.allowance` |
| `/admin/master/overtime` | GET | `pages.masters.overtime` |
| `/admin/reports/timesheet/person` | GET | `pages.reports.timesheet_person` |
| `/admin/reports/leave` | GET | `pages.reports.leave` |

---

## 5. เมนู Sidebar Admin

```
แดชบอร์ด
ยื่นขอ/รออนุมัติ
  ├── ใบลา          (/admin/leave-form)
  ├── โอที           (/admin/ot-form)
  └── Job            (/admin/job-form)
ข้อมูลงาน
  ├── ปรับเงินเดือน  (/admin/upsalary)
  └── คำนวณเงินเดือน (/admin/payroll)
รายงาน
  ├── รายงานการลงเวลารายบุคคล (/admin/reports/timesheet/person)
  └── รายงานการขอใบลา         (/admin/reports/leave)
ตั้งค่าบริษัท
  ├── มาสเตอร์       (/admin/master)
  └── ทะเบียนประวัติ (/admin/employee)
```

---

## 6. User Model (sys_users)

```
sys_users
├── user_id (PK, varchar, non-auto)
├── username
├── password (bcrypt)
├── prefix_th / prefix_en
├── name_th / name_en
├── gender
├── birthday
├── citizen_id
├── nationality_id
├── emp_type
├── emp_work_status
├── start_date
├── wage_value
├── emp_level  ← ใช้กำหนด role (1=admin, 2=chief, 3=user)
├── last_login_at
└── created_by / created_at / updated_by / updated_at
```

---

## 7. Helper Classes

### `GlobalFunc::validateCheck()`
รับ request + rules + messages → ใช้ Laravel Validator → คืน array error ถ้า invalid หรือ `null` ถ้าผ่าน

### `JsonResult`
Wrapper สำหรับ `response()->json()` มีรูปแบบ:
```json
{
  "data": ...,
  "message": "...",
  "message_ex": "...",
  "success": true/false,
  "errors": ...
}
```
Methods: `success()`, `errors()`, `packageSuccess()`, `packageErrors()`, `newSuccess()`

---

## 8. Request Lifecycle สรุป

```
Browser
  │
  ▼
public/index.php  ←── Entry point
  │
  ▼
bootstrap/app.php ←── สร้าง Application
  │
  ▼
RouteServiceProvider ←── โหลด web.php + backend.php + api.php
  │
  ▼
Middleware (auth:admin / auth:chief / auth:user)
  │
  ▼
Controller → Service → Model → Database
  │
  ▼
View (Blade) หรือ JsonResult
```
