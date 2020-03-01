<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Profile extends Model
{
    protected $guarded=[];

    public function user(){

        return $this->belongsTo(User::class);

    }

    public function profileImage()
    {

        $imagePath = ($this->image) ?$this->image:'profile/I81I3m1tRONSUJEYWGpDAKJu2vklBIE8XmxXzd7Z.png';
        return '/storage/'.$imagePath;

    }

    public function folowers(){
        return $this->belongsToMany(User::class);
    }
    


    //
    //
}
