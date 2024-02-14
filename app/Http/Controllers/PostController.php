<?php

namespace App\Http\Controllers;


use App\Models\Post;
use App\Models\User;
use Illuminate\Http\Request;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
{
    // Check if the request expects JSON or if it's an AJAX request
    if (request()->expectsJson() || request()->ajax()) {
        // Return JSON response if requested
        $posts = Post::all();
        return response()->json(['posts' => $posts]);
    } else {
        // Return appropriate view for regular web requests
        $posts = Post::all();
        return view('posts.index', compact('posts'));
    }
}

public function list()
{
    // Retrieve all posts
    $posts = Post::all();

    // Return the list view with the posts data
    return view('posts.list', compact('posts'));
}


    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        // Fetch all users from the database
        $users = User::all();

        // Pass the $users variable to the view
    return view('posts.create', ['users' => $users]);
        // return view('posts.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //validate the request data
        $validatedData = $request->validate([
            'title' => 'required|max:255',
            'content' => 'required',
            'user_id' => 'required|exists:users,id'
        ]);
        //create a new post instance with validated data
        $post = new Post;
        $post->title = $validatedData['title'];
        $post->content = $validatedData['content'];
        $post->user_id = $validatedData['user_id'];

        //save the post
        // $post->save();

        $post = Post::create($validatedData);

        //redirect the user to a relevant page
        return redirect()->route('posts.show', ['post' => $post->id]);
    }

    /**
     * Display the specified resource.
     */
    public function show(int $id)
    {
        $post = Post::findOrFail($id);
        return view('posts.show', compact('post'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(int $id)
    {
        $post = Post::findOrFail($id);
        $users = User::all();
        return view('posts.edit', compact('post', 'users'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, int $id)
{
    // Find the post by its ID
    $post = Post::findOrFail($id);

    // Validate the request data
    $validatedData = $request->validate([
        'title' => 'required|max:255',
        'content' => 'required',
        'user_id' => 'required|exists:users,id'
    ]);

    // Update the post with validated data
    $post->update($validatedData);

    // Redirect to a relevant page (e.g., show the updated post)
    return redirect()->route('posts.show', $post->id);
}

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(int $id)
    {
         // Find the post by its ID and delete it
         $post = Post::findOrFail($id);
         $post->delete();

         // Redirect to a relevant page, such as the index page
         return redirect()->route('posts.index');
    }
}
