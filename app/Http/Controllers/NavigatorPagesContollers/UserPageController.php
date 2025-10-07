<?php

namespace App\Http\Controllers\NavigatorPagesContollers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserPageController extends Controller
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
}
