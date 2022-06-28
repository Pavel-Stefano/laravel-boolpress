<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Car;

class CarController extends Controller
{
    public function index(){
        $cars = Car::all();

        return response()->json($cars);
    }

    public function show($slug){
        $car = Car::where("slug",$slug)->with(["category", "tags"])->first();

        return response()->json($car);
    }
}
