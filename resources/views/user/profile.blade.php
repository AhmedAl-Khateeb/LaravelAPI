@extends('layouts.app')



@section('content')

<h1 class="text-center text-primary display-1 my-3"> Your Name : {{$user->id}} </h1>


<div class="container col-md-4 text-center">

    @if (Session::has("Done"))
    <div class="alert alert-success text-center">
        {{Session::get("Done")}}
    </div>
    @endif


    <div class="card">

        @if ($user->image == 'Emblem-person-blue.svg.png')
        <img src="{{ asset('Emblem-person-blue.svg.png') }}" class="image-top image-fluid" alt="">
        @else
        <img src="{{ asset("users/$user->image") }}" class="image-top image-fluid" alt="">
        @endif


        <form action="{{ route("user.uploadImage") }}" enctype="multipart/form-data" method="POST">

            @csrf

            <div class="row">
                <div class="col-8">
                    <div class="m-0 form-group my-3">
                        <input name="image" type="file" class="form-control btn btn-info">
                    </div>
                </div>

                <div class="col-4 my-3">
                    <div class="d-grid">
                        <button class="btn btn-success"> Chane Image </button>
                    </div>
                </div>

            </div>

        </form>
        <div class="card-body">

            <hr>
            <h5> Name : {{$user->name}} </h5>
            <hr>
            <h5> Description : {{$user->email}} </h5>
            <hr>
            <h5> User : {{$user->rules}} </h5>
            <hr>

        </div>
    </div>
</div>


@endsection
