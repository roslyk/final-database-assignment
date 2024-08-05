<?php

namespace App\Http\Controllers;

use App\Models\Like;
use App\Models\User;
use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{


    public function createPost(Request $request){
       
        // Validate the form input at the bottom of the 
        // page here "resources\views\overview.blade.php"
        $validateFormInput = $request->validate(['title' => ['required', 'regex:/^[A-Za-z\s\-]+$/'],
        'excerpt'=> ['required', 'regex:/^[A-Za-z\s\-\.]+$/'],
        'content'=> ['required', 'regex:/^[A-Za-z\s\-\.]+$/']]);

        // Creates a post with the validated content.
        Post::factory()->create($validateFormInput);

        return back();

    }


}
