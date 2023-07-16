<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class category extends Model
{
    protected $fillable=[
        'categoryName'
    ];
    public function books(){
        return $this->belongsToMany('App\Models\book');
    }
}
