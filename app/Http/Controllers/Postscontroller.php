<?php

namespace App\Http\Controllers;
use App\User;
use Illuminate\Http\Request;

class Postscontroller extends Controller
{
    public function __construct(){

        //all routs needs authitivcation
        $this->middleware('auth');

    }



    //
    public function create()
    {
        return view('posts.create');
    }

    public function store()
    {
        $data = request()->validate([ 
            'caption'=> 'required',
            'image'=> ['required','image'],
        ]);

        $imagePath = request('image')->store('uploads','public');
         auth()->user()->posts()->create([

            'caption' => $data['caption'],
            'image' => $imagePath,
         ]);
      
         return redirect('/profile/'.auth()->user()->id);
        
         


    }



}
