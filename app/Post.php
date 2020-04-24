<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Post extends Model
{
    use softDeletes;
    protected $fillable = [
        'title','content','category_id','featured_img','slug'
    ];

    public function category(){
        return $this->belongsTo('App\Category');
    }
}
