<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Notification;
use App\Notifications\NewPost;
use Illuminate\Http\Request;
use App\Models\Comment;
use App\Models\Post;
use App\Models\User; 

class CommentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, Post $post)
    {
        $validatedData = $request->validate([
            'comment_text' => 'required|max:200',  
        ]);

        $c = new Comment();
        $c->comment_text = $validatedData['comment_text'];
        $c->post_id = $post->id;
        $c->user_id = auth()->user()->id;  
        $c->save(); 

        $user = User::where('id', '=', $post->user_id)->get();    
        $notificationData = [
            'body' => 'Someone commented on your post',  
            'text' => 'click to see the comment', 
            'url' => url('/posts'),     
        ];
        Notification::send($user, new NewPost($notificationData)); 

        return redirect()->route('posts.show', [$post])->with('message','Comment was added'); 
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Comment $comment, Post $post) 
    {
        $comment->delete();     
        return back()->with('message','Comment was deleted'); 
    }
}
