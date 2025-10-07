<?php

namespace App\Http\Controllers\NavigatorPagesContollers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ChiefPageController extends Controller
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
}
