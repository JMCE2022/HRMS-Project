<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
class MyAccountController extends Controller
{
    public function myaccount()
    {
        $viewPath = Auth::user()->user_type == 0
            ? 'superadmin.dashboard'
            : (Auth::user()->user_type == 1
                ? 'admin.dashboard'
                : 'employee.myaccount.myaccount');

        return view($viewPath);
    }
}
