<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::factory(1)->create(['name'=>'Jack', 'email'=>'test@test.com', 'isAdmin'=>True]); 
        User::factory(1)->create(['name'=>'John', 'email'=>'test2@test.com', 'isAdmin'=>True]); 
        User::factory(1)->create(['name'=>'Maria', 'email'=>'test3@test.com', 'isAdmin'=>False]);  
    }
}
