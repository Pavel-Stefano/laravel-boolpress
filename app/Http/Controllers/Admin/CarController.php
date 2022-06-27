<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Car;
use Illuminate\Support\Str;
use App\Category;
use App\Tag;

class CarController extends Controller
{
    protected $validationRule = [
        "name" => "required|string|max:100",
        "model" => "required|string|max:100",
        "description" => "required",
        "available" => "sometimes|accepted",
        "category_id" => "nullable|exists:categories,id",
        "tags" => "nullable|exists:tags,id",
    ];


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $cars = Car::paginate(5);
        // $cars = Car::all();
        return view('admin.cars.index',compact('cars'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::all();
        $tags = Tag::all();
        return view('admin.cars.create', compact('categories', 'tags'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate($this->validationRule);
        $data = $request->all();
        // dd($data);

        $newCar = new Car();
        $newCar->name = $data['name'];
        $newCar->model = $data['model'];
        $newCar->description = $data['description'];
        $newCar->available =isset($data['available']);
        $newCar->category_id = $data['category_id'];
       
        $newCar->slug = $this->getSlug($newCar->name);
        $newCar->save();

        if(isset($data['tags'])){
            $newCar->tags()->sync($data['tags']);
        }
        return redirect()->route('admin.cars.show', $newCar->id);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Car $car)
    {
        return view('admin.cars.show', compact('car'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Car $car)
    {
        $categories = Category::all();
        $tags = Tag::all();
        return view('admin.cars.edit', compact('car','categories', 'tags'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Car $car)
    {
        $request->validate($this->validationRule);
        $data = $request->all();

            if($car->name != $data['name']){
                $car->name = $data['name'];
                $slug = Str::of($car->name)->slug("-");
                if($slug != $car->slug) {
                    $car->slug = $this->getSlug($car->name);
                }
            }
        $car->category_id = $data['category_id'];
        $car->description = $data['description'];
        $car->available = isset($data['available']);
        $car->update();

        if(isset($data['tags'])){
            $car->tags()->sync($data['tags']);
        }else {
            $car->tags()->sync([]);
        }
        return redirect()->route('admin.cars.show', $car->id);

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Car $car)
    {
        $car->tags()->sync([]);

        $car->delete();
        return redirect()->route('admin.cars.index')->with("message", "Car with id: {$car->id} successfully deleted !");
    }


    private function getSlug($name) {
        $slug = Str::of($name)->slug("-");
        $count = 1;

        while( Car::where("slug", $slug)->first() ) {
            $slug = Str::of($name)->slug("-") . "-{$count}";
            $count++;
        }
        return $slug;

    }
}
