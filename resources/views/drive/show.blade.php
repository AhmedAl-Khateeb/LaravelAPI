@extends('layouts.app')



@section('content')

<h1 class="text-center text-primary display-1 my-3"> Show : {{$drive->DriveId}} </h1>


<div class="container col-md-4 text-center">

    @if (Session::has("Done"))
    <div class="alert alert-success text-center">
        {{Session::get("Done")}}
    </div>
    @endif


    <div class="card">
        @if ($drive->extension == "png" || $drive->extension == "jpg" || $drive->extension == "jif" || $drive->extension == "jpeg" )

        <img src="{{ asset("upload/$drive->file") }}" class="img-top img-fluid" alt="">
        @else
        <img src="{{ asset("yellow-file-folder-with-documents-vector-1627041.jpg") }}" class="img-top img-fluid" alt="">
        @endif

        <div class="card-body">

            <hr>
            <h5> Title : {{$drive->title}} </h5>
            <hr>
            <h5> Description : {{$drive->description}} </h5>
            <hr>
            <h5> Status
                @if ($drive->status == 'Private')
                Private : <i class="mx-3 text-danger fa-sharp fa-solid fa-lock"></i>

                @else
                Public : <i class="mx-3 text-success fa-solid fa-lock-open"></i>

                @endif
            </h5>
            <hr>
            <h5> User : {{$drive->name}} </h5>
            <hr>
            <h5> Publich : {{$drive->created_at}} </h5>
            <hr>

            <div class="d-grid">
                <a href="{{route('drive.download' , $drive->DriveId)}}" class="btn btn-success my-2"> <i class="fa-solid fa-download "></i> Download </a>

                 {{-- <a class="btn btn-warning my-2" href="{{route('drive.edit' , $drive->id)}}"> <i class="fa-solid fa-user-pen"></i> Edit  </a> --}}

            </div>

        </div>
    </div>
</div>


@endsection
