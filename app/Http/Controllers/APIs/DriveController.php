<?php

namespace App\Http\Controllers\APIs;

use App\Models\Drive;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;

class DriveController extends Controller

{

    public function MyFiles($id) {
        $user_id = $id;
        $drive = Drive::where("user_id","=",$user_id)->get();
        $response =[
            "message"=> 'success',
            "Data"=> $drive,
            "status"=>200,
        ];
        return response($response , 200);
    }


    public function publicFile() {
        $drive = Drive::where("status","=","Public")->get();
        $response =[
            "message"=> 'success',
            "Data"=> $drive,
            "status"=>200,
        ];
        return response($response , 200);
    }


    public function allFile()
    {
        $drives = Drive::all();

        if (empty($drives)) {
            $response = [
                "message" => 'No found Any Data',
            ];
        } else {
            $response =[
                "message"=> 'success',
                "Data"=> $drives,
                "status"=>200,
            ];
        }


        return response($response , 200);
    }





    public function store(Request $request ,$id)
    {

        // validatino
        $size = 2 * 1024;
        $request->validate([
          'title'=>"required | min:3 | max:20 | string",
          'description'=> "required ",
          'file'=>"required | file"
        ]);

        // *************************************
        $drive = new Drive();
        $drive->title = $request->title;
        $drive->description = $request->description;
        // file code
        $file_data = $request->file("file");
        $drive_name = time() . $file_data->getClientOriginalName();
        $drive_extension = $file_data->getClientOriginalExtension();
        $location = public_path("./upload");
        $file_data->move($location , $drive_name);
        //   ***********
        $drive->file = $drive_name;
        $drive->extension = $drive_extension;
        $drive->status = $request->status;
        // $drive->user_id = auth()->user()->id;
        $drive->user_id = $id;

        $drive->save();

        $response = [
          "message"=>'success',
          "Data"=>$drive,
          "status"=>200,
        ];

        return response($response , 200);
    }

    public function show($id)
    {
        $drive = DB::table('drivewithusers')->where('DriveId' , $id)->first();

        if ($drive == null) {
            $response = [
                "message" => 'No found Any Data',
            ];
        } else {
            $response =[
                "message"=> 'success',
                "Data"=> $drive,
                "status"=>200,
            ];
        }


        return response($response , 200);
    }





    public function update(Request $request, $id)
    {
        $drive = Drive::find($id);
        $drive->title = $request->title;
        $drive->description = $request->description;
        // file code
        $file_data = $request->file("file");
        // old image
        if ($file_data == null) {
            $drive_name = $drive->file;
            $drive_extension = $drive->extension;
        }else{
            $filePath = public_path("/upload/$drive->file");
            unlink($filePath);


            $drive_name = time() . $file_data->getClientOriginalName();
            $drive_extension = $file_data->getClientOriginalExtension();
            $location = public_path("/upload");
            $file_data->move($location , $drive_name);
        }

        //   ***********
        $drive->file = $drive_name;
        $drive->extension = $drive_extension;
        $drive->status = $request->status;
        $drive->user_id = auth()->user()->id;

        $response = [
            "message"=>'success',
            "Data"=>$drive,
            "status"=>201,
          ];

          return response($response , 200);
    }


    public function destroy($id)
    {
        $drive = Drive::where("id",$id)->first();
        $filePath = public_path("/upload/$drive->file");
        unlink($filePath);
        $drive->delete();

        $response = [
            "message"=>'success',
            "Data"=>$drive,
            "status"=>201,
          ];

          return response($response , 200);
    }



    public function download($id)
    {
        $drive = Drive::where("id",$id)->first();
        $filePath = public_path("/upload/$drive->file");

        return response()->download($filePath);
    }

    public function changeStatus($id) {
        $drive = Drive::find($id);
        if ($drive->status == 'Private') {
            $drive->status = "Public";
            $drive->save();

            $response = [
                "message"=>'success Public',
                "Data"=>$drive,
                "status"=>201,
              ];

              return response($response , 200);
        } else {
            $drive->status = "Private";
            $drive->save();

            $response = [
                "message"=>'success Private',
                "Data"=>$drive,
                "status"=>201,
              ];

              return response($response , 200);
        }

    }




}
