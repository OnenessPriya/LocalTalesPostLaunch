<?php

use Illuminate\Database\Seeder;
use App\Models\Business;
use Faker\Factory as Faker;

class BussinessSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        $faker = Faker::create();

        // Business::create([
        //     'name'      =>  $faker->name,
        //     'email'     =>  'business4@testmail.com',
        //     'password'  =>  bcrypt('secret'),
        // ]);

        factory(Business::class,2)->create();

    }
}
