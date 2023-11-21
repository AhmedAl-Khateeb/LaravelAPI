@extends('layouts.app')


@section('content')


<h1 class="text-center text-danger display-1 my-3"> Update File {{$drive->id}} </h1>


<div class="container col-md-6">

    @if (Session::has("Done"))
        <div class="alert alert-success text-center">
            {{Session::get("Done")}}
        </div>
    @endif

    <div class="card">
        <div class="card-body">
            <form action="{{ route('drive.update' , $drive->id) }}" method="POST" enctype="multipart/form-data">

                @csrf

                <div class="form-group my-3">
                    <label>Title</label>
                    <input type="text" name="title" value="{{$drive->title}}" class="form-control my-2">
                </div>

                <div class="form-group my-3">
                    <label>Description</label>
                    <input type="text" name="description" value="{{$drive->description}}"  class="form-control my-2">
                </div>

                <div class="form-group my-3">
                    <label>Upload Your File : {{$drive->file}} </label>
                    <input type="file" name="file"  class="form-control my-2">
                </div>

                <div class="form-group my-3">

                    @if ($drive->status == 'Private')
                    <input type="radio" checked name="status" class="my-2" value="Private"> Private
                    <hr>
                    <input type="radio"  name="status" class="my-2" value="Public"> Public
                    @else
                    <input type="radio"  name="status" class="my-2" value="Private"> Private
                    <hr>
                    <input type="radio" checked name="status" class="my-2" value="Public"> Public
                    @endif

                </div>

                <div class="d-grid">
                    <button class="btn btn-warning"> Update </button>
                </div>
            </form>
        </div>
    </div>
</div>



@endsection
