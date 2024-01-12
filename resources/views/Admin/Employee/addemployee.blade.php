@extends('layouts.app')
@section('content')
<div class="container-fluid pt-4 px-4">
    <div class="row g-4">
        <div class="col-sm-12 col-xl-12">
            <div class="row g-4">
            @include('layouts._message')
                <div class="col-sm-12 col-xl-12">
                    <div>
                        <h2 class="text-dark text-start border-bottom border-success">Add New Employee</h2>
                    </div>
                    <div class="bg-white text-center p-4">
                        <div class="user-head">
                            <div class="d-flex justify-content-between border-bottom  ">
                                <a>Personal Details</a>
                                <a>Educational Attainment</a>
                                <a>Eligibility/License</a>
                                <a>Employment Details</a>
                            </div>
                           
                            <form method="post" action="" >
                              @csrf
                                <div class="row g-4">
                                    <div class="col-sm-6 col-xl-6">
                                        <div class="fields">
                                            <div class="input-field">
                                                <label>First Name</label>
                                                <input type="text" placeholder="Enter First Name" class="form-control"
                                                    name="name" value="" required>
                                                @if($errors->has('name'))
                                                <span class="text-danger">{{ $errors->first('name') }}</span>
                                                @endif
                                            </div>
                                            <div class="input-field">
                                                <label>Middle Name</label>
                                                <input type="text" placeholder="Enter Middle Name" class="form-control"
                                                    name="middlename" value="" required>
                                                @if($errors->has('middlename'))
                                                <span class="text-danger">{{ $errors->first('middlename') }}</span>
                                                @endif
                                            </div>
                                            <div class="input-field">
                                                <label>Last Name</label>
                                                <input type="text" placeholder="Enter Last Name" class="form-control"
                                                    name="lastname" value="" required>
                                                @if($errors->has('lastname'))
                                                <span class="text-danger">{{ $errors->first('lastname') }}</span>
                                                @endif
                                            </div>
                                            <div class="input-field">
                                                <label for="suffix">Suffix</label>
                                                <select id="suffix" class="form-control" name="suffix">
                                                    <option selected disabled>--Select Suffix--</option>
                                                    <option value="0">Jr.</option>
                                                    <option value="1">Sr.</option>
                                                    <option value="2">I</option>
                                                    <option value="3">II</option>
                                                </select>
                                                @if($errors->has('suffix'))
                                                <span class="text-danger">{{ $errors->first('suffix') }}</span>
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-sm-6 col-xl-6">
                                        <div class="fields">
                                            <div class="input-field">
                                                <label for="sex">Sex</label>
                                                <select id="sex" class="form-control" name="sex" required>
                                                    <option selected disabled>--Select Sex--</option>
                                                    <option value="Male">Male</option>
                                                    <option value="Female">Female</option>
                                                    <option value="Other">Other</option>
                                                    @if($errors->has('sex'))
                                                    <span class="text-danger">{{ $errors->first('sex') }}</span>
                                                    @endif
                                                </select>
                                            </div>
                                            <div class="input-field">
                                                <label>Age</label>
                                                <input type="number" placeholder="Enter Age" class="form-control"
                                                    name="age" value="" required>
                                                @if($errors->has('age'))
                                                <span class="text-danger">{{ $errors->first('age') }}</span>
                                                @endif
                                            </div>
                                            <div class="input-field">
                                                <label>Birth Date</label>
                                                <input type="date" placeholder="Enter Birth Date" class="form-control"
                                                    name="birth_date" value="" required>
                                                @if($errors->has('birth_date'))
                                                <span class="text-danger">{{ $errors->first('birth_date') }}</span>
                                                @endif
                                            </div>
                                            <div class="input-field">
                                                <label>Phone Number</label>
                                                <input type="number" class="form-control" name="phonenumber"
                                                    pattern="(\+63\s?|0)(\d{3}\s?\d{3}\s?\d{4}|\d{4}\s?\d{3}\s?\d{4})"
                                                    placeholder="e.g., +63 123 456 7890 or 0912 345 6789" value=""
                                                    required>
                                                @if($errors->has('phonenumber'))
                                                <span class="text-danger">{{ $errors->first('phonenumber') }}</span>
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-sm-12 col-xl-12">
                                        <div class="fields">
                                            <div class="input-field">
                                                <label for="suffix">Department</label>
                                                <select class="form-control" name="department" required>
                                                    <option selected disabled>--Select Department--</option>
                                                    <option value="0">Department 1</option>
                                                    <option value="1">Department 2</option>
                                                </select>
                                                @if($errors->has('department'))
                                                <span class="text-danger">{{ $errors->first('department') }}</span>
                                                @endif
                                            </div>
                                            <div class="input-field">
                                                <label>Email</label>
                                                <input type="email" placeholder="Enter Email" class="form-control"
                                                    name="email" value="" required>
                                                @if($errors->has('email'))
                                                <span class="text-danger">{{ $errors->first('email') }}</span>
                                                @endif
                                            </div>
                                            <div class="input-field">
                                                <label>Password</label>
                                                <input type="password" placeholder="Enter Password" class="form-control"
                                                    name="password" value="" required>
                                                @if($errors->has('password'))
                                                <span class="text-danger">{{ $errors->first('password') }}</span>
                                                @endif
                                            </div>
                                            <div class="input-field">
                                                <label for="suffix">Position</label>
                                                <select class="form-control" name="user_type" required>
                                                    <option selected disabled>--Select position--</option>
                                                    <option value="0">SuperAdmin</option>
                                                    <option value="1">Admin</option>
                                                    <option value="2">Employee</option>
                                                </select>
                                                @if($errors->has('user_type'))
                                                <span class="text-danger">{{ $errors->first('user_type') }}</span>
                                                @endif
                                            </div>
                                            <div class="input-field">
                                                <label>Daily Rate</label>
                                                <input type="number" class="form-control" name="daily_rate"
                                                    placeholder="e.g., 560" value="" required>
                                                @if($errors->has('daily_rate'))
                                                <span class="text-danger">{{ $errors->first('daily_rate') }}</span>
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <button type="submit" class="btn btn-success">Submit</button>
                                @if(Auth::user()->user_type == 0)
                                <a href="{{url('SuperAdmin/Employee')}}" class="btn btn-primary">Done<a>
                                        @elseif(Auth::user()->user_type == 1)
                                        <a href="{{url('Admin/Employee')}}" class="btn btn-primary">Done<a>
                                                @endif
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @endsection