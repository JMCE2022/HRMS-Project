<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
class AnnouncementController extends Controller
{
    public function announcement()
    {
        $viewPath = Auth::user()->user_type == 0
            ? 'superadmin.announcement.announcement'
            : (Auth::user()->user_type == 1
                ? 'admin.announcement.announcement'
                : 'employee.dashboard');

        return view($viewPath);
    }
}
