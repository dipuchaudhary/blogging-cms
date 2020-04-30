<?php

namespace App\Http\Controllers;

use App\Category;
use App\Post;
use App\SiteSetting;
use Illuminate\Http\Request;

class FrontController extends Controller
{
    public function index(){
        return view('index')->with('title',SiteSetting::first()->site_name)
                                  ->with('categories',Category::all()->take(5))
                                    ->with('post', Post::latest()->first());
    }
}
