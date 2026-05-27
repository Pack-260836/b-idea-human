<?php

namespace App\Http\Controllers\NavigatorPagesContollers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\AllowanceType;
use App\Models\Company;
use App\Models\Employee;
use App\Models\JobOrder;
use App\Models\LeaveRequest;
use App\Models\OtConfig;
use App\Models\OtRequest;
use App\Models\Position;
use App\Models\SalaryHistory;
use App\Models\TimeWorkConfig;
use App\Models\Timesheet;

class AdminPageController extends Controller
{
    public $user = null;
    public function __construct()
    {
        $this->middleware(function ($request, $next) {
            if (Auth::check()) {
                $this->user = Auth::user();
            }
            return $next($request);
        });
    }
    public function dashboard(Request $request)
    {
        $today = now()->toDateString();
        $timesheets = Timesheet::with('employee')->whereDate('work_date', $today)->get();
        $total_ot = $timesheets->sum('ot_hours');
        $total_ot_extra = $timesheets->sum('ot_extra_hours');

        $data = [
            'user_data'      => $this->user,
            'timesheets'     => $timesheets,
            'total_ot'       => $total_ot,
            'total_ot_extra' => $total_ot_extra,
        ];
        return view('pages.dashboard')->with($data);
    }
    public function leave_form(Request $request)
    {
        $leave_requests = LeaveRequest::with(['employee', 'leaveType'])->latest()->get();

        $data = [
            'user_data'      => $this->user,
            'leave_requests' => $leave_requests,
        ];
        return view('pages.leave_form')->with($data);
    }
    public function ot_form(Request $request)
    {
        $ot_requests = OtRequest::with('employee')->orderBy('ot_date', 'desc')->get();

        $data = [
            'user_data'   => $this->user,
            'ot_requests' => $ot_requests,
        ];
        return view('pages.ot_form')->with($data);
    }
    public function job_form(Request $request)
    {
        $job_orders = JobOrder::with('employee')->orderBy('assign_date', 'desc')->get();

        $data = [
            'user_data'  => $this->user,
            'job_orders' => $job_orders,
        ];
        return view('pages.job_form')->with($data);
    }
    public function upsalary(Request $request)
    {
        $salary_histories = SalaryHistory::with('employee')->orderBy('effective_date', 'desc')->get();

        $data = [
            'user_data'        => $this->user,
            'salary_histories' => $salary_histories,
        ];
        return view('pages.upsalary')->with($data);
    }
    public function payroll(Request $request)
    {
        $data = [
            'user_data' => $this->user
        ];
        return view('pages.payroll')->with($data);
    }
    public function payroll_process(Request $request)
    {
        $data = [
            'user_data' => $this->user
        ];
        return view('pages.payroll-process')->with($data);
    }
    public function payroll_report(Request $request)
    {
        $data = [
            'user_data' => $this->user
        ];
        return view('pages.payroll-report')->with($data);
    }
    public function master()
    {
        $data = [
            'user_data' => $this->user
        ];
        return view('pages.master')->with($data);
    }
    public function master_company()
    {
        $companies = Company::all();

        $data = [
            'user_data' => $this->user,
            'companies' => $companies,
        ];
        return view('pages.masters.company')->with($data);
    }
    public function master_time_work()
    {
        $time_work_configs = TimeWorkConfig::where('is_active', true)->get();

        $data = [
            'user_data'         => $this->user,
            'time_work_configs' => $time_work_configs,
        ];
        return view('pages.masters.time_work')->with($data);
    }
    public function master_position()
    {
        $positions = Position::with('department')->where('is_active', true)->get();

        $data = [
            'user_data' => $this->user,
            'positions' => $positions,
        ];
        return view('pages.masters.position')->with($data);
    }
    public function master_allowance()
    {
        $allowance_types = AllowanceType::where('is_active', true)->get();

        $data = [
            'user_data'       => $this->user,
            'allowance_types' => $allowance_types,
        ];
        return view('pages.masters.allowance')->with($data);
    }
    public function master_overtime()
    {
        $ot_configs = OtConfig::where('is_active', true)->get();

        $data = [
            'user_data'  => $this->user,
            'ot_configs' => $ot_configs,
        ];
        return view('pages.masters.overtime')->with($data);
    }
    public function employee(Request $request)
    {
        $employees = Employee::with(['department', 'position'])->where('emp_status', 'active')->get();

        $data = [
            'user_data' => $this->user,
            'employees' => $employees,
        ];
        return view('pages.employee')->with($data);
    }
    public function employee_add(Request $request)
    {
        $data = [
            'user_data' => $this->user
        ];
        return view('pages.employee_add')->with($data);
    }
    public function report_timesheet_person(Request $request)
    {
        $employees = Employee::where('emp_status', 'active')->get();
        $timesheets = collect();

        $data = [
            'user_data'  => $this->user,
            'employees'  => $employees,
            'timesheets' => $timesheets,
        ];
        return view('pages.reports.timesheet_person')->with($data);
    }
    public function report_leave(Request $request)
    {
        $leave_requests = LeaveRequest::with(['employee', 'leaveType'])->latest()->get();

        $data = [
            'user_data'      => $this->user,
            'leave_requests' => $leave_requests,
        ];
        return view('pages.reports.leave')->with($data);
    }
}
