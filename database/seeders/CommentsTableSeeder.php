<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Comment;

class CommentsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $c = new Comment();
        $c->comment_text = 'comment on post';
        $c->post_id = 1;
        $c->user_id = 1;
        $c->save(); 

        Comment::factory()->count(5)->create();   
    }
}
