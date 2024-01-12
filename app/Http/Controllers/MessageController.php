<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
class MessageController extends Controller
{
    public function message()
    {
        $viewPath = Auth::user()->user_type == 0
            ? 'superadmin.dashboard'
            : (Auth::user()->user_type == 1
                ? 'admin.dashboard'
                : 'employee.message');

        return view($viewPath);
    }
}
