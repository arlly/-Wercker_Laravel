<?php

use Illuminate\Database\Seeder;
use App\package\Infrastructure\Eloquents\Member;

class MemberTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $faker = Faker\Factory::create('ja_JP');
        
        for($i=0; $i<5000; $i++)
        {
            Member::create([
                'name' => $faker->name,
                'zip' => $faker->postcode,
                'pref' => '27',
                'address' => $faker->city. $faker->streetAddress,
                'tel' => $faker->phoneNumber,
                'company' => $faker->company,
                'email' => $faker->email
            ]);
        }
        
        
    }
}
