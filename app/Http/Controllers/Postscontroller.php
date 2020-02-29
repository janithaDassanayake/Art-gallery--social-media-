<?php

namespace App\Http\Controllers;
use App\User;
use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;


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
        $image = Image::make(public_path("storage/{$imagePath}"))->fit(1200,1200);
        $image->save();

    

       // $image= Image::make(public_path("storage/{$imagePath}"))->fit(1200,1200);
        //$image->save();
        
        auth()->user()->posts()->create([

            'caption' => $data['caption'],
            'image' => $imagePath,
         ]);
      
         return redirect('/profile/'.auth()->user()->id);
        
    }



}
