@extends('layouts.app')


@section('content')


<h1 class="text-center text-danger display-1 my-3"> Create File </h1>


<div class="container col-md-6">

    @if (Session::has("Done"))
        <div class="alert alert-success text-center">
            {{Session::get("Done")}}
        </div>
    @endif

    @if ($errors->any())
    <div class="alert alert-danger text-center">
        <ul>
            @foreach ($errors->all() as $error)
                {{ $error }}
                <hr>
            @endforeach
        </ul>
    </div>
   @endif

    <div class="card">
        <div class="card-body">
            <form action="{{ route('drive.store') }}" method="POST" enctype="multipart/form-data">

                @csrf

                <div class="form-group my-3">
                    <label>Title</label>
                    <input type="text" name="title" class="form-control my-2 @error('title') is-invalid @enderror">

                    @error('title')
                        <span class="text-danger"> هذا الحقل مطلوب </span>
                    @enderror
                </div>

                <div class="form-group my-3">
                    <label>Description</label>
                    <input type="text" name="description" class="form-control my-2">
                </div>

                <div class="form-group my-3">
                    <label>Upload Your File</label>
                    <input type="file" name="file" class="form-control my-2">
                </div>

                <div class="form-group my-3">

                    <hr>
                    <input type="radio" name="status" class="my-2" value="Private"> Private
                    <hr>
                    <input type="radio" name="status" class="my-2" value="Public"> Public
                </div>

                <div class="d-grid">
                    <button class="btn btn-info"> Create New </button>
                </div>
            </form>
        </div>
    </div>
</div>



@endsection
