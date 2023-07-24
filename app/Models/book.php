<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class book extends Model
{
    use HasFactory;
    protected $fillable=[
        'title','description','image'
    ];
    public function categories(){
        return $this->belongsToMany('App\Models\category');
    }
    public function comments(){
        return $this->hasMany('App\Models\comment');
    }
}

