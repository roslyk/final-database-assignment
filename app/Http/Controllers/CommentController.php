<?php

namespace App\Http\Controllers;


use App\Models\User;
use App\Models\Post;
use App\Models\Comment;

use Illuminate\Http\Request;

class CommentController extends Controller
{
    public function createComment(Post $post, Request $request){
        // To create a comment one needs a post to comment on and something to 
        // Validate the data
        $validatedData = $request->validate(['title' =>  ['required', 'regex:/^[A-Za-z\s]+$/'],
            'content' =>'required|string|max:5000']);

            // A comment must also have a user - the user that created the comment
            $user_id = User::factory()->create()->id;

            // Take the post's id
            $post_id = $post->id;

            // Create a data array that creates the comment
            $dataArray = array_merge($validatedData, ['user_id' => $user_id, 'post_id' => $post_id]);

            // Creating the comment
            Comment::create( $dataArray );  

            // Go to the page where the post is and give a success comment
            return redirect('/posts/'.$post->id)->with('success','This was a great success! The comment was created!');

    }
}
