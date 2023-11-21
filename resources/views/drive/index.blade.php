@extends('layouts.app')



@section('content')

<h1 class="text-center text-primary display-1 my-3"> MyFiles </h1>


<div class="container col-md-6">
    @if (Session::has("Done"))
    <div class="alert alert-success text-center">
        {{Session::get("Done")}}
    </div>
    @endif
    <div class="card">
        <div class="card-body">
            <table class="table table-dark text-center">
                 <tr class="text-center">
                     <th>Nu</th>
                     <th>Title</th>
                     <th>Status</th>
                     <th colspan="4">Action</th>

                 </tr>


                 @forelse ($drive as $item)
                     <tr class="text-center">
                        <th> {{$loop->iteration}} </th>
                        <th> {{$item->title}} </th>

                        <th>
                            @if ($item->status == 'Private')
                             <a href="{{ route('drive.changeStatus',$item->id) }}"> <i title="Make It Public" class="mx-3 text-danger fa-sharp fa-solid fa-lock"></i> </a>

                           @else
                             <a href="{{ route('drive.changeStatus',$item->id) }}"> <i title="Make It Private"  class="mx-3 text-success fa-solid fa-lock-open"></i> </a>

                           @endif
                        </th>

                        <th> <a title="show" class="text-info" href="{{route('drive.show' , $item->id)}}"><i class="fa-solid fa-eye"></i>  </a> </th>
                        <th> <a title="edit"  class="text-warning" href="{{route('drive.edit' , $item->id)}}"> <i class="fa-solid fa-user-pen"></i></a></th>
                        <th> <a title="delete"  class="text-danger" href="{{route('drive.destroy' , $item->id)}}"> <i class="fa-solid fa-trash-can"></i> </a> </th>


                     </tr>
                 @empty
                     <tr>
                        <th class="text-center text-danger" colspan="3">You Don't Have Any File</th>
                     </tr>
                 @endforelse


            </table>
        </div>
    </div>
</div>


@endsection
