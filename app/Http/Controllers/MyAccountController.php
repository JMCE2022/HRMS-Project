<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use DB;
class MyAccountController extends Controller
{
    public function myaccount()
    {
        $notification ['notify'] = DB::select("SELECT users.id, users.name, users.lastname, users.email, COUNT(is_read) AS unread FROM users LEFT JOIN messages ON users.id = messages.from AND messages.is_read = 0 WHERE users.id = " . Auth::id() . " GROUP BY users.id, users.name, users.lastname, users.email");
    

       

        $viewPath = Auth::user()->user_type == 0
            ? 'superadmin.dashboard'
            : (Auth::user()->user_type == 1
                ? 'admin.dashboard'
                : 'employee.myaccount.myaccount');

        return view($viewPath,$notification);
    }

    public function updatemyaccount(Request $request)
    {
        // Debugging: Dump and Die to inspect the incoming request
      
    
      
            $id = Auth::user()->id;
    
            $messages = [
                'name.required' => 'The name field is required.',
                'middlename.required' => 'The middlename field is required.',
                'lastname.required' => 'The lastname field is required.',
                'sex.required' => 'The sex field is required.',
                'sex.in' => 'Invalid value for sex.',
                'age.required' => 'The age field is required.',
                'age.integer' => 'The age must be an integer.',
                'age.min' => 'The age must be at least 18.',
                'civil_status.required' => 'The civil status field is required.',
                'civil_status.in' => 'Invalid value for civil status.',
                'birth_date.required' => 'The birth date field is required.',
                'birth_date.date' => 'Invalid date format for birth date.',
                'phonenumber.required' => 'The phonenumber field is required.',
                'fulladdress.required' => 'The full address field is required.',
                'email.required' => 'The email field is required.',
                'email.email' => 'Invalid email format.',
                'email.unique' => 'This email has already been taken.',
                'password.required' => 'The password field is required.',
                'password.string' => 'Invalid password format.',
                'password.min' => 'The password must be at least 4 characters.',
                'emergency_fullname.required' => 'The emergency contact full name field is required.',
                'emergency_fulladdress.required' => 'The emergency contact full address field is required.',
                'emergency_phonenumber.required' => 'The emergency contact phone number field is required.',
                'emergency_relationship.required' => 'The emergency contact relationship field is required.',
            ];
            
            $request->validate([
                'name' => 'required|string|max:30',
                'middlename' => 'required|string|max:30',
                'lastname' => 'required|string|max:30',
                'suffix' => 'nullable|in:Jr.,Sr.,I,II,III',
                'sex' => 'required|in:Male,Female,Other',
                'age' => 'required|integer|min:18',
                'civil_status' => 'required|in:Single,Married,Widowed',
                'birth_date' => 'required|date',
                'phonenumber' => 'required|string|max:20',
                'fulladdress' => 'required|string|max:150',
                'email' => 'required|email|unique:users,email,'. $id,
                'password' => 'nullable|string|min:4',
                'emergency_fullname' => 'required|string|max:90',
                'emergency_fulladdress' => 'required|string|max:150',
                'emergency_phonenumber' => 'required|string|max:20',
                'emergency_relationship' => 'required|string|max:50',
            ], $messages);
            
    
            $user = User::getId($id);
    
            $user->name = trim($request->name);
            $user->middlename = trim($request->middlename);
            $user->lastname = trim($request->lastname);
            $user->suffix = $request->suffix;
            $user->sex = $request->sex;
            $user->age = $request->age;
            $user->birth_date = $request->input('birth_date') ? trim($request->input('birth_date')) : null;
            $user->phonenumber = trim($request->phonenumber);
            $user->civil_status = $request->civil_status;
            $user->fulladdress = $request->fulladdress;
            $user->email = trim($request->email);
            $user->emergency_fullname = $request->emergency_fullname;
            $user->emergency_fulladdress = $request->emergency_fulladdress;
            $user->emergency_phonenumber = trim($request->emergency_phonenumber);
            $user->emergency_relationship = $request->emergency_relationship;
    
            if (!empty($request->password)) {
                $user->password = Hash::make($request->password);
            }
          
            if (!empty($request->file('profile_pic'))) {
                $ext = $request->file('profile_pic')->getClientOriginalExtension();
                $file = $request->file('profile_pic');
                $randomStr = date('Ymdhis') . Str::random(20);
                $filename = strtolower($randomStr) . '.' . $ext;
                $file->move('public/accountprofile/', $filename);
                $user->profile_pic = $filename;
            }
    
            $user->save();
            return redirect()->back()->with('success', 'Your Profile successfully update');
       
    }
    
}
