<?php

namespace App\Http\Controllers;
use App\User;
use Illuminate\Http\Request;

class FollowsController extends Controller
{
    //

    public function store(User $user)
    {
        //tgagle is use to connected or not connected

        return auth()->user()->folowing()->toggle($user->profile);
    } 
}
