<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Donation extends Model
{
    use HasFactory;
    protected $guarded = [];
    public function sponsor(){
        return $this->belongsTo(Sponsor::class,'sponsor','id')->first();
    }
    public function heroes(){
        return $this->hasMany(Hero::class,'donation','id')->get()->sortBy('status');
    }
    public function foods(){
        return $this->hasMany(Food::class,'donation','id')->get();
    }
}
