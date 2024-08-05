<x-layout >

<h1>This is the Overview Page </h1>
<br> </br>

@foreach ($posts as $post ) <!-- Loop over the posts-->
 Post title: <a href="/posts/{{$post->slug}}">{{$post->title}}</a>  
 <!-- Give the title and make a link to the page where one can see the post, like the post and comment on the post -->
 <br> </br>


 Post user: <a href="/users/{{$post->user->username}}">{{$post->user->name}}</a> 
 <!-- Give the username and link to a page where one can see all the user's posts -->

 <br> </br>
 Post likes:  
 <!-- Below the user is able to hover over the 
 amount of likes and see which users have liked 
 the posts-->

 <div class="tooltip-container">
        <span class="tooltip-trigger">
            <!-- Text to hover over -->
            <a href="#">{{count($post->likes)}}</a>
            <!-- Give the amount of likes-->
        </span>
        <div class="tooltip"> <!-- Text to see when you hover over an element-->
        <!-- You may see all the users that have likes the post -->
            @foreach ($post->likes as $like ) <!-- Loop over the likes --> 
            {{$like->user->name}} <!-- Print username as is-->
            <br> <!-- New line after every name of a user that have liked the post -->
            @endforeach
        </div>
    </div>

 <br> </br>
 _______________________________
<br> </br>

@endforeach <!-- End the loop that loops over posts-->

<h3>Make Your Own Post:</h3>

<form action="/createPost/" method="POST">
    @csrf
        <label for="title">Title:</label><br>
        <input type="text" name="title" ><br><br>

        <label for="excerpt">Excerpt:</label><br>
        <textarea  name="excerpt" rows="4" cols="50" ></textarea><br><br>

        <label for="content">Content:</label><br>
        <textarea name="content" rows="8" cols="50" ></textarea><br><br>

        <input type="submit" value="Submit">
    </form>



</x-layout>