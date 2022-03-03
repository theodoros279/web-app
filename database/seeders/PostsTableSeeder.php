<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Post;

class PostsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $a = new Post();
        $a->title = 'First post';
        $a->description = 'this is a brief description of the post';
        $a->user_id = 1; 
        $a->save();

        Post::factory()->count(5)->create();  
    }
}
