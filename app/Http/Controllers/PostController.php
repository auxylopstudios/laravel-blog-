<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Post;
use App\User;
use App\Category;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Session;
use Intervention\Image\Facades\Image;
class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index()
    {
        //
        $post = Post::orderBy('id','desc')->paginate(6);
        $post->setPath('custom/url');
        return view('pages.index')->withPost($post);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        //Save a new category and redirect back to index
        $categories = Category::all();

        return view('post.create')->withCategories($categories);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $this->validate($request,array(
            'title'=>'required|max:255',
            'slug'=>'required|alpha_dash|min:5|max:255',
            'contents'=>'required',
            'category_id'=>'required|integer',
        ));

        $post = new Post;
        $post->title=$request->title;
        $post->slug=$request->slug;
        $post->content=$request->contents;
        $post->category_id=$request->category_id;
       $post->author_id= Auth::user()->id;
        //save image
        if($request->hasFile('featured_image')){
            $image =$request->file('featured_image');
$filename=time() . '.' . $image->getClientOriginalExtension();
            $location = public_path('img/' . $filename);
            $makeimage=Image::make($image)->fit(350);
            $makeimage->opacity(0);
       $makeimage->save($location);
            $post->image=$filename;
        }
        $post->save();

        Session::flash('success','The Blog Post Was Successfully Saved');
        return redirect()->route('post.edit',$post->id)->withPost($post);
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
        $post = Post::find($id);

        return view('post.show')->withPost($post);
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
        $post = Post::find($id);
        $categories = Category::all();
        $cats=array();
        foreach ($categories as $category){
            $cats[$category->id]=$category->name;
        }
        return view('post.edit')->withPost($post)->withCategories($cats);
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
        $post = Post::find($id);
        if($request->input('slug')==$post->slug){
            //validate the form
            $this->validate($request,array(
                'title'=>'required|max:255',
                'slug'=>'required',
                'content'=>'required',


            ));
        }else{
            //validate the form
            $this->validate($request,array(
                'title'=>'required|max:255',
                'slug'=>"required|alpha_dash|min:5|max:255|unique:posts,slug,$id",
                'content'=>'required',
                'featured_image'=>'image'

            ));
        }


        //store into the database
        $post=Post::find($id);
        $post->title=$request->input('title');
        $post->slug=$request->input('slug');
        $post->content=$request->input('content');
        $post->category_id=$request->category_id;
        if($request->hasFile('featured_image')){
            $image =$request->file('featured_image');
            $filename=time() . '.' . $image->getClientOriginalExtension();
            $location = public_path('img/' . $filename);
            $makeimage=Image::make($image)->fit(350);
            $makeimage->opacity(0);
            $makeimage->save($location);
            $oldFilename= $post->image;
            $post->image=$filename;
            Storage::delete($oldFilename);
        }
        $post->save();

        Session::flash('success','The Blog Post Was Successfully Saved');
        return redirect()->route('post.show',$post->id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $post = Post::find($id);
        $post->delete();
        return view('post.edit')->withPost($post);
    }
}
