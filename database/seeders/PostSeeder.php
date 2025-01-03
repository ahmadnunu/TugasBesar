<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Post;


class PostSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Post::create([
            'user_id'=> 1,
            'user_name' => 'Narasi Newsroom',
            'timestamp' => now()->subHours(1),
            'content' => 'Jangan sampeeee kite bikin dalgona lagi 😭',
            'image' => 'hospital.jpg',
        ]);

        Post::create([
            'user_id'=> 2,
            'user_name' => 'Daily Updates',
            'timestamp' => now()->subMinutes(30),
            'content' => 'What is happening?!',
            'image' => null,
        ]);
    }
}
