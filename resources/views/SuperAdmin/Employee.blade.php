@extends('layouts.app')

@section('content')
<div class="container-fluid pt-4 px-4">
    <div class="row g-4">
        <div class="col-sm-12 col-xl-12">
            <div class="row g-4">
                <div class="col-sm-12 col-xl-12">
                    <div class="bg-white text-center rounded-3  p-4">
                        <div class="main">


                            <div class="upper">
                                <div class="parameter">
                                    <form action="#">

                                        <div class="upper-fields">
                                            <div class="input-field">
                                                <label>Employee</label>
                                                <select name="suffix">
                                                    <option value="None">@chiarafiero</option>
                                                    <option value="Sr">Sr.</option>
                                                    <option value="I">I</option>
                                                    <option value="II">II</option>
                                                </select>
                                            </div>
                                            <div class="input-field">
                                                <label>Department</label>
                                                <select name="suffix">
                                                    <option value="None">HRMO</option>
                                                    <option value="Sr">Sr.</option>
                                                    <option value="I">I</option>
                                                    <option value="II">II</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div>
                                            <p>Time Frame</p>
                                        </div>
                                        <div class="lower-fields">
                                            <div class="input-field">
                                                <label>From</label>
                                                <input type="date" placeholder=" " required>
                                            </div>
                                            <div class="input-field">
                                                <label>To</label>
                                                <input type="date" placeholder=" " required>
                                            </div>
                                        </div>
                                        <div class="btn">
                                            <div class="btn">
                                                <a href="#" class="preview-button">
                                                    <i class=></i>
                                                    <span class="btn btn-gray">Preview</span>
                                                </a>
                                                <div class="btn">
                                                    <a href="#" class="generate-button">
                                                        <i class=></i>
                                                        <span class="btn btn-info text-white">Generate Report</span>
                                                    </a>
                                                </div>
                                            </div>

                                        </div>
                                        <hr>
                                        <div class="pic">
                                            <img src="img/sheet.png" alt="" width="100%">
                                        </div>
                                </div>

                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>

        @endsection