<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use Notifiable;
    protected $guarded = [];
    protected $hidden = [
        'password',
    ];
    public function faculty(){
        return $this->hasOne(Faculty::class,'id','faculty')->first();
    }
}
