<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
class LeaveController extends Controller
{
    public function leave()
    {
        $viewPath = Auth::user()->user_type == 0
            ? 'superadmin.leave.leave'
            : (Auth::user()->user_type == 1
                ? 'admin.leave.leave'
                : 'employee.leave.leave');

        return view($viewPath);
    }
}
