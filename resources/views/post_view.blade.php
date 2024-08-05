<x-layout >

<h1>This is The Page That Displays Posts Individually</h1>
<br> </br>
<!-- This file assumes that we have been given a post in the form of $post -->

Post title: {{$post->title}}
 
 <br> </br>
 Post user: <a href="/users/{{$post->user->username}}">{{$post->user->name}}</a> 
  <!-- Give the username and link to a page where one can see all the user's posts -->
 <br> </br>
 Post likes: {{count($post->likes)}}
 <!-- Count the number of likes -->
 <br> </br>
 Post content: {{$post->content}}
 <!-- Give the content of the post -->
 <br> </br>
 Like Button:
 <br> </br>
 <a href="/likePost/{{$post->id}}"> <!-- Give the post a like-->
    <button>Give this post a like!</button>
</a>
<br> </br>
<h3>Comment on this post:</h3>
<!-- Here you may comment on the post -->
<br>
    <!-- This is the form where homepage user may post a comment -->
    <form action="/postComment/{{$post->id}}" method="POST">
    @csrf
        <label for="title">Title:</label>
        <br>
        <input type="text"  name="title" >
        <br><br>
        
        <label for="content">Content:</label>
        <br>
        <textarea  name="content" rows="4" cols="50" ></textarea>
        <br><br>
        
        <input type="submit" value="Submit your comment!">
    </form>


<hr>
<h3>Comments:</h3> <!-- Posting the comments -->
<br> </br>
@foreach ($post->comments as $comment) <!-- Looping over the comments -->

<!-- Give the title for the comment -->
Comment title: {{$comment->title}}
 <br> </br>
 <!-- Give the author of the comment -->
Comment author: {{$comment->user->name}}
  <br> </br>
<!-- Give the content of the comment -->
Comment content: {{$comment->content}}
<br> </br>
_______________________________
<br> </br>
<br> </br>
    
@endforeach <!-- End the loop over the post's comments -->
</x-layout>