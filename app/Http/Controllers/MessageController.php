<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use DB;
class MessageController extends Controller
{
    public function message()
    {
        $notification ['notify'] = DB::select("SELECT users.id, users.name, users.lastname, users.email, COUNT(is_read) AS unread FROM users LEFT JOIN messages ON users.id = messages.from AND messages.is_read = 0 WHERE users.id = " . Auth::id() . " GROUP BY users.id, users.name, users.lastname, users.email");
    
        $viewPath = Auth::user()->user_type == 0
            ? 'superadmin.dashboard'
            : (Auth::user()->user_type == 1
                ? 'admin.dashboard'
                : 'employee.message');

        return view($viewPath,$notification);
    }
}
