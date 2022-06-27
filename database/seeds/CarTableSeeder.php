<?php

use Illuminate\Database\Seeder;
use Faker\Generator as Faker;
use App\Car;
use Illuminate\Support\Str;

class CarTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Faker $faker)
    {
        for( $i = 0; $i < 10; $i++){
            $newCar = new Car();
            $newCar->name = $faker->words(7, true);
            $newCar->model = $faker->words(5, true);
            $newCar->slug = Str::of($newCar->name)->slug('-');
            $newCar->description = $faker->text();
            $newCar->available = rand(0,1);

            $newCar->save();
        }
    }
}
