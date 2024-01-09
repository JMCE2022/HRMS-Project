<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function dashboard()
{
    $viewPath = Auth::user()->user_type == 0
        ? 'superadmin.dashboard'
        : (Auth::user()->user_type == 1
            ? 'admin.dashboard'
            : 'employee.dashboard');

    return view($viewPath);
}



}
