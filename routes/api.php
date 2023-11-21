<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\APIs\DriveController;
use App\Http\Controllers\UserController;



Route::post("register" , [UserController::class, 'register']);
Route::post("login" , [UserController::class, 'login']);

Route::middleware("auth:sanctum")->group(function () {


Route::get("logout" , [UserController::class, 'logout']);


Route::prefix("drive")->group(function (){

    // list
    Route::get("/MyFiles/{id}",[DriveController::class , 'MyFiles']);
    // public File
    Route::get("/publicFile",[DriveController::class , 'publicFile']);
    // allFile
    Route::get("/allFile",[DriveController::class , 'allFile']);

    // store
    Route::post("/store/{id}" , [DriveController::class , 'store']);

    // Route With ID
    // show
    Route::get("/show/{id}" , [DriveController::class , 'show']);

    //update
    Route::post("/update/{id}" , [DriveController::class , 'update']);
    // destroy
    Route::get("/destroy/{id}" , [DriveController::class , 'destroy']);

    // download
    Route::get("download/{id}" , [DriveController::class , 'download']);
    // Change Status
    Route::get("changeStatus/{id}" , [DriveController::class , 'changeStatus']);
   });


});
