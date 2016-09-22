<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Comment;
use Session;
use App\Post;
use Carbon\Carbon;

class CommentsController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth',['except'=>'store']);
    }




    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request,$post_id)
    {
        //
        $carbon = new Carbon();


        $this->validate($request,array(
           'name'=>'required|max:255',
            'email'=>'required|email|max:255',
            'comment'=>'required|min:5|max:2000'
        ));
        $post = Post::find($post_id);
        $comment = new Comment();
        $comment->name=$request->name;
        $comment->email=$request->email;
        $comment->comment=$request->comment;
        $comment->approve=true;
        $comment->post()->associate($post);
        $comment->save();
        Session::flash('success','Comments Saved Successfully');
        return redirect()->route('blog.single',[$post->slug]);
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
        $comment = Comment::find($id);
        return view('comments.edit')->withComment($comment);
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
        $comment = Comment::find($id);
        $this->validate($request,array(
            'comment'=>'required|min:5|max:2000'
        ));
        $comment->comment=$request->comment;
    $comment->save();
    return redirect()->route('post.show',$comment->post->id);
    }
    public function delete($id)
    {
        //
        $comment = Comment::find($id);
        return view('comments.delete')->withComment($comment);
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $comment = Comment::find($id);
        $post_id = $comment->post->id;
        $comment->delete();
        return redirect()->route('post.show',$post_id);
    }
}
