<?php

namespace App\Http\Controllers;

use App\Category;
use App\Http\Requests\CreatePostRequest;
use App\Post;
use App\Tag;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class PostsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return  view('admin.post.index')->with('posts',Post::all());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if(Category::all()->count() == 0){
            Session::flash('info','You must have a category before you create a post');

            return redirect()->back();
        }

        return view('admin.post.create')->with('categories',Category::all())->with('tags',Tag::all());
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreatePostRequest $request)
    {
//        dd($request->all());
        //upload image
        $image = $request->featured_img->store('posts');

        $post = Post::create([
            'title' => $request->input('title'),
            'content' => $request->input('content'),
            'category_id' => $request->input('category_id'),
            'featured_img' => $image,
            'slug' => str_slug($request->title,'-')
        ]);

        $post->tags()->attach($request->tags);
        Session::flash('success','post created successfully');
        return redirect(route('posts.index'));

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $post = Post::findorfail($id);
        return view('admin.post.edit')->with('post',$post)->with('categories',Category::pluck('name','id'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request,[
           'title' => 'required',
           'content' => 'required',
           'category_id' => 'required',
        ]);

        $post = Post::findorfail($id);

        if($request->hasFile('featured_img')){
            $image = $request->featured_img->store('posts');
        }

        $post->update([
            'title' => $request->title,
            'content' => $request->input('content'),
            'category_id' => $request->category_id
        ]);

        Session::flash('success','post updated successfully');
        return redirect(route('posts.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $post = Post::withTrashed()->where('id',$id)->firstOrFail();
        if ($post->trashed()){
            $post->deleteImage();
            $post->forceDelete();
            Session::flash('success','post deleted permanently');
        }
        else{
            $post->delete();
            Session::flash('success','post trashed successfully');
        }

         return  redirect()->back();
    }

    public function trashed(){
        $posts = Post::onlyTrashed()->get();
        return view('admin.post.trash')->with('posts',$posts);
    }

    public function restore($id){
        $post = Post::withTrashed()->where('id',$id)->firstOrFail();
        if($post->trashed()){
            $post->restore();
        }
        Session::flash('success','post restored successfully');
        return redirect()->back();
    }
}
