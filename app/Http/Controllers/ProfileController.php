<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\UserProflie;
use Session;
class ProfileController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
$profile=UserProflie::all();
        return view('profile.create')->withProfile($profile);
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
            'name'=>'required|max:255',
            'email'=>'required|',
            'website'=>'required',
            'twitter'=>'required',
            'facebook'=>'required'
        ));

        $profile = new UserProflie;
        $profile->name=$request->name;
        $profile->email=$request->email;
        $profile->website=$request->website;
        $profile->twitter=$request->twitter;
        $profile->facebook=$request->facebook;
        $profile->save();

        Session::flash('success','The User Profile Was Successfully Saved');
        return redirect()->route('profile.edit',$profile->id)->withPost($profile);
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
        $profile=UserProflie::find($id);
        return view('profile.edit')->withProfile($profile);

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
        $profile=UserProflie::find($id);
        $this->validate($request,array(
            'name'=>'required|max:255',
            'email'=>'required|',
            'website'=>'required',
            'twitter'=>'required',
            'facebook'=>'required'
        ));
        $profile->name=$request->input('name');
        $profile->email=$request->input('email');
        $profile->website=$request->input('website');
        $profile->twitter=$request->input('twitter');
        $profile->facebook=$request->input('facebook');
        $profile->save();

        Session::flash('success','The Profile Was Successfully Updated');
        return redirect()->route('profile.edit',$profile->id);
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
    }
}
