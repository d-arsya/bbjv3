<?php

namespace App\Models\Volunteer;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use Notifiable, HasFactory;
    protected $guarded = [];
    protected $hidden = [
        'password',
    ];
    public function program(){
        return $this->hasOne(Program::class)->first();
    }
}
