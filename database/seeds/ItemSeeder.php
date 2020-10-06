<?php

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use Illuminate\Http\File;

class ItemSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */

    public function run()
    {

        $faker = Faker::create();




        foreach(range(1,10) as $in){

            $image = $faker->image();

            $imageFile = new File($image);

            \App\Models\Items::create([
               'name' => $faker->name,
               'image' => Storage::disk('public')->putFile('items', $imageFile),
               'price' => $faker->randomNumber(2),
            ]);
        }
    }
}
