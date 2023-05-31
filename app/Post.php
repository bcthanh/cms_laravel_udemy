<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    //

    protected $guarded = [];

    public function user(){
        return $this->belongsTo(User::class);
    }

    public function category(){
        return $this->belongsTo(Category::class);
    }

//    public function setPostImageAttribute($value){
//
//        $this->attributes['post_image'] = asset($value);
//
//    }
//
//
    // public function getPostImageAttribute($value){
    //     return asset($value);
    // }
    
    //cap nhat lai cho dung - them storage phia truoc cho chay
    function getPostImageAttribute($value) {
        if (strpos($value, 'https://') !== FALSE || strpos($value, 'http://') !== FALSE) {
            return $value;
        }
        return asset('storage/' . $value);
    }


    public function comments(){
        return $this->hasMany(Comment::class);
    }

}