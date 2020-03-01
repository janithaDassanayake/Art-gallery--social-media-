<?php

namespace App\Http\Controllers;
use App\User;
use App\Post;
use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;


class Postscontroller extends Controller
{
    public function __construct(){

        //all routs needs authitivcation
        $this->middleware('auth');

    }


    public function index()
    {
        $users = auth()->user()->folowing()->pluck('profiles.user_id');
        $posts = Post::whereIn('user_id',$users)->with('user')->orderBy('created_at','DESC')->paginate(5);
        return view('posts.index',compact('posts'));
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

    //i used \App\Post because so thet i can access the Post model
    public function show(\App\Post $post)
    {
        return view('posts.show',compact('post'));
    }


    // public function show(\App\Post $post)
    // {
    //     return view('posts.show',[
    //         'post'=>$post,
    //     ]);
    // }





}
