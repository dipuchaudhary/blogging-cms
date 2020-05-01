<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\Storage;

class Post extends Model
{
    use softDeletes;

    protected $fillable = [
        'title','content','category_id','featured_img','slug','user_id'
    ];

//    //acessors to get the full path of image
//
//    public function getFeaturedimgAttribute($featured_img)
//    {
//        return asset($featured_img);
//    }


    public function deleteImage(){
        return Storage::delete($this->featured_img);
    }
    public function category(){
        return $this->belongsTo('App\Category');
    }

    public function tags(){
        return $this->belongsToMany('App\Tag');
    }

    public function user(){
        return $this->belongsTo('App\User');
    }
}
