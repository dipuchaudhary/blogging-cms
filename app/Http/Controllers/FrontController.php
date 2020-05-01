<?php

namespace App\Http\Controllers;

use App\Category;
use App\Post;
use App\SiteSetting;
use App\Tag;
use DemeterChain\C;

class FrontController extends Controller
{
    public function index(){

        return view('index')->with('categories',Category::all()->take(5))
                                  ->with('post', Post::latest()->first())
                                  ->with('second_posts', Post::orderBy('created_at','DESC')->skip(1)->take(2)->get())
                                  ->with('category',Category::find(1))
                                  ->with('vue',Category::find(3))
                                   ->with('setting', SiteSetting::first());
    }

    public  function singlePost($slug){

        $post = Post::where('slug',$slug)->first();

        $next = Post::where('id','>',$post->id)->min('id');
        $prev = Post::where('id','<',$post->id)->max('id');
        return view('single')->with('post',$post)
                                   ->with('title',$post->title)
                                   ->with('setting', SiteSetting::first())
                                    ->with('categories',Category::all()->take(5))
                                    ->with('next',Post::find($next))
                                    ->with('prev',Post::find($prev))
                                    ->with('tags',Tag::all());

    }


    public function singleCategory($id){
        $category = Category::find($id);

        return view('category')->with('category',$category)
                                    ->with('setting',SiteSetting::first())
                                    ->with('categories',Category::all()->take(5))
                                    ->with('tags',Tag::all());
    }
}
