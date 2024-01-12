<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
class SettingController extends Controller
{
    public function setting()
    {
        $viewPath = Auth::user()->user_type == 0
            ? 'superadmin.setting'
            : (Auth::user()->user_type == 1
                ? 'admin.setting'
                : 'employee.setting');

        return view($viewPath);
    }
}
