@extends('layouts.app')

@section('content')
<div class="container">
    
    <div class="row">
        <div class="col-3 p-5" >
        <img src="https://instagram.fcmb7-1.fna.fbcdn.net/v/t51.2885-19/s150x150/28151973_191198408150179_4088115838459052032_n.jpg?_nc_ht=instagram.fcmb7-1.fna.fbcdn.net&_nc_ohc=sSfqyczFZZsAX-MhbKN&oh=a0503a7f0b310ad119cf68c94d6f5d9e&oe=5E805BFD" class="rounded-circle" >
        </div>

        
            <div class="col-9 pt-5" >
                <div class="d-flex justify-content-between align-items-baseline ">
                    <h1>{{$user->username}}</h1>
                    <a  href="/p/create">Add New Post</a>  
                </div>

                <div class="d-flex ">
                    <div class="pr-5"><strong >{{ $user->posts->count()}} </strong>posts</div>
                    <div class="pr-5"><strong>24k </strong>followers</div>
                    <div class="pr-5"><strong>321 </strong>following</div>
                </div>
                <div class="pt-4 font-weight-bold">{{$user->profile->title}}</div>
                <div>{{$user->profile->bio}}</div>
                <div> <a href="#"> {{$user->profile->url }}</a></div>                
            </div>
        </div>


    <div class="row pt-5 ">
    @foreach($user->posts as $post)

        <div class="col-4 pb-4">
            <a href="/p/{{$post->id}}">
            <img src="/storage/{{ $post->image}}" class="w-100">
            </a>
        </div>
    @endforeach
    </div>
</div>
@endsection
