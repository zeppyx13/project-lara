<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Post;
use App\Models\User;
use App\Models\catagory;

use function Laravel\Prompts\password;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::create([
        //     'name' => 'nanda',
        //     'email' => 'skoawlfkas@gmail.com',
        //     'password' => bcrypt('1234')
        // ]);
        catagory::create([
            'name' => 'life hack',
            'slug' => 'life-hack'
        ]);
        catagory::create([
            'name' => 'Programing',
            'slug' => 'Programing'
        ]);
        User::factory(5)->create();
        Post::factory(20)->create();
        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);\
        // 
        // Post::create([
        //     'title' => 'Center Div',
        //     'slug' => 'center',
        //     'excerpt' => 'Dolor ex, repellendus commodi deserunt soluta iste consequuntur iure.',
        //     'body' => 'Dolor ex, repellendus commodi deserunt soluta iste consequuntur iure. Esse et dicta libero error sed mollitia excepturi, voluptatem dolores maxime neque ratione autem fugiat omnis voluptates quo, vitae repudiandae voluptatibus nulla maiores quia incidunt? Dolores voluptatibus labore distinctio, error suscipit vero illo iure explicabo autem aliquid, quos molestias architecto recusandae corrupti magni obcaecati? Nulla rem hic nesciunt beatae enim voluptatum iusto, est in amet consequuntur?',
        //     'catagory_id' => 2,
        //     'user_id' => 1
        // ]);
    }
}
