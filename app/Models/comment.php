<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class comment extends Model
{
    use HasFactory;
    protected $fillable=[
        'content','book_id'
    ];
    public function books(){
        return $this->belongsTo('App\Models\book');
    }
}
