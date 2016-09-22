<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;

use App\Http\Requests;
use App\Post;
use App\Category;

class BlogController extends Controller
{
    //
    public function getSingle($slug){
//fetch from database baseed on slug
        $post = Post::where('slug','=',$slug)->first();

        //return the view and pass in the post object
        return view('blog.single')->withPost($post);
    }



}
