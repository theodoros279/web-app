<?php

namespace App\Http\Controllers;
use App\Notifications\NewPost;
use Illuminate\Support\Facades\Notification;

use Illuminate\Http\Request;
use App\Models\Post; 
use App\Models\User; 
use App\Models\Comment; 

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts = Post::all();
        return view('posts.index', ['posts'=>$posts]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('posts.create');  
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    { 
        $validatedData = $request->validate([
            'title' => 'required|max:30', 
            'description' => 'required', 
            'image_path' => 'required|mimes:jpeg,png,jpg|max:5048',  
        ]);  

        $newImageName = time() . '-' . $request->title . '.' . $request->image_path->extension();
        $request->image_path->move(public_path('images'), $newImageName);  
        
        $a = new Post();
        $a->title = $validatedData['title'];
        $a->description = $validatedData['description']; 
        $a->image_path = $newImageName;    
        $a->user_id = auth()->user()->id;       
        $a->save();  
         
        return redirect()->route('posts.index')->with('message','Post was created'); 
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Post $post)
    {
        return view('posts.show', [
            'post'=>$post,
            'comments' => $post->comment()->simplePaginate(4)  
        ]); 
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Post $post)
    {
        return view('posts.edit', ['post'=>$post]);  
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Post $post)
    {
        $validatedData = $request->validate([
            'title' => 'required|max:25', 
            'description' => 'required|max:255',
        ]);  

        $post->title = $validatedData['title']; 
        $post->description = $validatedData['description']; 
        $post->user_id = auth()->user()->id;     
        $post->update();         
        return redirect()->route('posts.index')->with('message','Post was updated'); 
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Post $post)
    {
        $post->delete(); 
        return redirect()->route('posts.index')->with('message','Post was deleted');
    } 
}
