<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class EmployeeController extends Controller
{
    public function employee()
    {
        $viewPath = Auth::user()->user_type == 0
            ? 'superadmin.employee'
            : (Auth::user()->user_type == 1
                ? 'admin.employee'
                : 'employee.dashboard');

        return view($viewPath);
    }
}
