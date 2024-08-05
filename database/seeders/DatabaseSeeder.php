<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\User;
use App\Models\Post;
use App\Models\Comment;
use App\Models\Like;


use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // Create a user and a corresponding post


       // The users
        $user1 = User::factory()->create();
        $user2 = User::factory()->create();


        // The users' posts
        $post1 = Post::factory()->create([ 'user_id' => $user1->id]);
        $post2 = Post::factory()->create([ 'user_id' => $user2->id]);
        // 2 comments for each post
        $comments1 = Comment::factory(2)->create(['post_id'=> $post1->id]);
        $comments2 = Comment::factory(2)->create(['post_id'=> $post2->id]);

        // likes for the posts
        $likes = Like::factory(3)->create([ 'post_id' => $post1->id]);
        $likes = Like::factory(4)->create([ 'post_id' => $post2->id]);
 

        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
    }
}
