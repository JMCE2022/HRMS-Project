@extends('layouts.app')

@section('content')

<section class="contrainer mt-4">
    <div class="container-fluid">
        <div class="row justify-content-center">
            @include('layouts._message')
            <div class="col-12 col-sm-6 col-md-6">
                <form action="" method="post" class="form-container">
                    @csrf
                    <h2 class="text-center bg-dark p-2 text-white">Add Task Listing</h2>
                    <div class="form-group">
                        <label for="title">Title</label>
                        <input type="text" name="title" class="form-control" id="title" placeholder="Enter Title">
                    </div>

                    <div class="form-group">
                        <label for="description">Description</label>
                        <textarea class="form-control" name="description" id="description" cols="30" rows="10"
                            placeholder="Enter Description"></textarea>
                    </div>

                    <button type="submit" class="btn brn-dark btn-block save_btn">Submit</button>
                </form>
            </div>
        </div>
    </div>

    @endsection
    @push('javascript')
    <script>
    $(document).ready(function () {
        var pusher = new Pusher('686df23863c2ae8a4b86', {
            cluster: 'ap2'
        });

        var channel = pusher.subscribe('my-channel');
        channel.bind('my-event', function(data){
            if (data.from) {
    let pending = parseInt($('#' + data.from).find('.pending').html());

    if(pending){
       $('#' + data.from).find('.pending').html(pending + 1);
    } 
}

        });
    });
    </script>

    @endpush