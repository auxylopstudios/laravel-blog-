<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Post;

class PageController extends Controller
{
    //


    public function getIndex(){
        $post = Post::orderBy('id','desc')->paginate(6);

        return view('pages.index')->withPost($post);
    }


}
