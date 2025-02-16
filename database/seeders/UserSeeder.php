<?php

namespace Database\Seeders;

use App\Models\User;
use Faker\Factory;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Factory::create("SR_RS");

        $usersNumber = $this->command->getOutput()->ask("How many users?", 100);
        $password = $this->command->getOutput()->ask("What is your password?", "123456");

        $this->command->getOutput()->progressStart($usersNumber);
        for($i=0; $i<$usersNumber; $i++)
        {
            User::create([
                "name" => $faker->name,
                "email" => $faker->email,
                "password" => Hash::make($password),
            ]);
            $this->command->getOutput()->progressAdvance();
        }
        $this->command->getOutput()->progressFinish();
    }
}
