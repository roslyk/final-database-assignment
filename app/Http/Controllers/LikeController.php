<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Post;
use App\Models\Like;
use Illuminate\Http\Request;

class LikeController extends Controller
{
    public function giveLike(Post $post){
        // We get the post from $post->id in the link "likePost/{{$post->id}}" in the file
        // "resources\views\post_view.blade.php". This means that we get to access the post
        // object, $post.

        // Create a user and use this user id and the posts id to create a Like
        $user = User::factory()->create();

        // Take the user's id
        $user_id = $user->id;

        // Create a like using the created user's id and the posts id
        Like::create(['user_id' => $user_id,'post_id'=> $post->id]);

        // Go back to where the user originally was.
        return redirect($to= '/posts/'. $post->slug);

    }


}
