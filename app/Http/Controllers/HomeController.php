<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\Post;
class HomeController extends Controller
{


  /**
   * Create a new controller instance.
   *
   * @return void
   */

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $post = Post::orderBy('id','desc')->paginate(4);
        return view('dashboard')->withPost($post);
    }

    public function getProfile()
    {
        return view('pages.profile');
    }



    public function logout(){
        Auth::logout();
        return redirect()->route('login');

    }

}
