<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\Mail;
use App\Mail\NewUserWelcome;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name','lastname', 'username','email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];


    //--------------------------------------------------meka wenne error ekek enwa new user kenek haddadi mokata empty values nisa



    protected static function boot()
    {
        parent::boot();
        
        static::created(function($user){
            $user->profile()->create([
                'title' => $user->username,
            ]);

                Mail::to($user->email)->send(new NewUserWelcome());

        });
    }
    

    //--------------------------------------------------meka wenne error ekek enwa new user kenek haddadi mokata empty values nisa
    
    
    
    
    
    public function posts(){
        return $this->hasMany(Post::class)->orderBy('created_at','DESC');
    }
    



    public function folowing(){
        return $this->belongsToMany(Profile::class);
    }
    


    public function profile(){

        return $this->hasOne(profile::class);

    }
}
