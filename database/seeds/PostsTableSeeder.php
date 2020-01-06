<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PostsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('posts')->insert([
            'title' => 'Post 1',
            'alias' => 'post-1',
            'user_id' => 1,
            'content' => '<p>Lorem ipsum dolor, sit amet consectetur adipisicing elit. Distinctio architecto eligendi culpa ut, alias aut, totam deleniti error corrupti, voluptas recusandae velit odit vero consectetur animi perspiciatis. Esse, ipsum laborum? </p>',
            'image' => ''
        ]);

        DB::table('posts')->insert([
            'title' => 'Post 2',
            'alias' => 'post-2',
            'user_id' => 1,
            'content' => '<p>Lorem ipsum dolor, sit amet consectetur adipisicing elit. Distinctio architecto eligendi culpa ut, alias aut, totam deleniti error corrupti, voluptas recusandae velit odit vero consectetur animi perspiciatis. Esse, ipsum laborum? </p>',
            'image' => ''
        ]);
    }
}