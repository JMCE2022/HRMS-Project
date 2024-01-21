@extends('layouts.app')

@section('content')
<div class="container-fluid pt-4 px-4">
    <div class="row g-4">
        <div class="col-sm-12 col-xl-12">
            <div class="row g-4">
                <div class=" pt-4 px-4 ">
                    <div class="row g-4">
                        <div class="col-sm-12 col-xl-12 rounded">
                            <div class="bg-white rounded-2 p-4">
                                <form action="" method="post" class="form-container">
                                    @csrf
                                    <div class="row g-4">
                                        <div class="col-sm-8 col-xl-8">
                                            <h2 class="text-start  p-2 text-dark border-bottom border-success">Create Announcement</h2>
                                            <div class="form-group">
                                                <label class="text-dark" for="title">Title</label>
                                                <input type="text" name="title" class="form-control" id="title"
                                                    placeholder="Enter Title">
                                                    <label class="text-dark"  for="scheduled_date">Scheduled Date</label>
                                                <input type="date" name="scheduled_date" class="form-control" id="scheduled_date">
                                            </div>

                                            <div class="form-group">
                                                <label class="text-dark" for="description">Description</label>
                                                <textarea class="form-control" name="description" id="description"
                                                    cols="30" rows="10" placeholder="Enter Description"></textarea>
                                                    <button type="submit" class="btn btn-success btn-block save_btn mt-1">Send</button>
                                            </div>
                                        </div>
                                        <div class="col-sm-4 col-xl-4 border-start border-light">
                                            <table class="table table-hover">
                                                <thead>
                                                    <tr>
                                                        <th></th>
                                                        <th>Employees</th>
                                                        <!-- Add more table headers if needed -->
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @foreach($users as $user)
                                                    <tr>
                                                        <td>
                                                            <div class="">
                                                            <img class="rounded-circle me-lg-2"
                                            src="{{ asset('public/accountprofile/' . $user->profile_pic) }}" alt=""
                                            style="width: 40px; height: 40px;">
                                                                <input type="checkbox" name="selected_users[]"
                                                                    value="{{ $user->id}}" class="form-check-input"
                                                                    style="display: none;">
                                                            </div>
                                                        </td>
                                                        <td>{{ $user->name }} {{ $user->lastname }}</td>
                                                        <!-- Add more table cells for other user attributes if needed -->
                                                    </tr>
                                                    @endforeach
                                                </tbody>
                                            </table>
                                            
                                        </div>
                                        
                                        @include('layouts._message')
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @endsection

    @push('javascript')
    <script>
        $(document).ready(function ()                       var pusher = new Pusher('686df23863c2ae8a4b8                              clust                                     

                var channel = pusher.subscri                el');
        channel.bin d('my- ev                    data) {
                                 from) {
            let pending = parseInt($('#' + data.f).html());

            f(pending) {
                $('#' + data.                        '.                    );                                 }
                  });
        });
    </script>
    @endpush