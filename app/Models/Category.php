<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    public function creator(){
        return $this->belongsTo('App\Models\User','created_by','id');
    }
    public function posts(){
        return $this->hasMany('App\Models\Post');
    }
}
