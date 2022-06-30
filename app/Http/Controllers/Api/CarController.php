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
        $car = Car::where("slug",$slug)->with(["category", "tags", "comments"])->first();
        if(empty($car)){
            return response()->json(['messagge' => 'car not found'], 404);
        }
        return response()->json($car);
    }
}
