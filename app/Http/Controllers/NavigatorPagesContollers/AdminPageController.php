<?php

namespace App\Http\Controllers\NavigatorPagesContollers;

use App\Http\Controllers\Controller;
use App\Models\MasterModels\PositionModel;
use App\Services\MasterServices\AllowanceService;
use App\Services\MasterServices\OvertimeService;
use App\Services\MasterServices\TimeWorkService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

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
        $data = [
            'user_data' => $this->user
        ];
        return view('pages.dashboard')->with($data);
    }
    public function leave_form(Request $request)
    {
        $data = [
            'user_data' => $this->user
        ];
        return view('pages.leave_form')->with($data);
    }
    public function ot_form(Request $request)
    {
        $data = [
            'user_data' => $this->user
        ];
        return view('pages.ot_form')->with($data);
    }
    public function job_form(Request $request)
    {
        $data = [
            'user_data' => $this->user
        ];
        return view('pages.job_form')->with($data);
    }
    public function upsalary(Request $request)
    {
        $data = [
            'user_data' => $this->user
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
        $data = [
            'user_data' => $this->user
        ];
        return view('pages.masters.company')->with($data);
    }
    public function master_time_work()
    {
        $timework_data = json_decode(json_encode(TimeWorkService::fetch()), true);
        $data = [
            'user_data' => $this->user,
            'timework_data' => $timework_data['data']
        ];
        return view('pages.masters.time_work')->with($data);
    }
    public function master_position()
    {
        $position_data = json_decode(json_encode(PositionModel::fetch()), true);
        $data = [
            'user_data' => $this->user,
            'position_data' => $position_data
        ];
        return view('pages.masters.position')->with($data);
    }
    public function master_allowance()
    {
        $position_data = json_decode(json_encode(PositionModel::fetch()), true);
        $allowance_data = json_decode(json_encode(AllowanceService::fetch()), true);
        $data = [
            'user_data' => $this->user,
            'position_data' => $position_data,
            'allowance_data' => $allowance_data['data']
        ];
        return view('pages.masters.allowance')->with($data);
    }
    public function master_overtime()
    {
        $position_data = json_decode(json_encode(PositionModel::fetch()), true);
        $overtime_data = json_decode(json_encode(OvertimeService::fetch()), true);
        $data = [
            'user_data' => $this->user,
            'position_data' => $position_data,
            'overtime_data' => $overtime_data['data']
        ];
        return view('pages.masters.overtime')->with($data);
    }
    public function employee(Request $request)
    {
        $data = [
            'user_data' => $this->user
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
        $data = [
            'user_data' => $this->user
        ];
        return view('pages.reports.timesheet_person')->with($data);
    }
    public function report_leave(Request $request)
    {
        $data = [
            'user_data' => $this->user
        ];
        return view('pages.reports.leave')->with($data);
    }
}
