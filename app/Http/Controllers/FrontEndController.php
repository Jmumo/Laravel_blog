<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\setting;
use App\Models\Category;
use App\Models\Post;
use App\Models\Tag;

class FrontEndController extends Controller
{


  
    public function index()
    {
        return view('home')
        ->with('title', setting::first()->site_name)
        ->with('categories' , Category::take(5)->get())
        ->with('first_post', Post::orderBy('created_at','desc')->first())
        ->with('second_post', Post::orderBy('created_at','desc')->skip(1)->take(1)->get()->first())
        ->with('third_post', Post::orderBy('created_at','desc')->skip(2)->take(1)->get()->first())
        ->with('first_category',Category::orderBy('created_at','desc')->first())
        ->with('second_category',Category::orderBy('created_at','desc')->skip(1)->take(1)->get()->first())
        ->with('third_category',Category::orderBy('created_at','desc')->skip(2)->take(1)->get()->first());
    }

    public function single($slug){

        $post = Post::where('slug',$slug)->first();

        $next = Post::where('id','>',$post->id)->min('id');

        $previous = Post::where('id','<',$post->id)->max('id');

        return view('single')->with('post',$post)
        ->with('title', setting::first()->site_name)
        ->with('categories' , Category::take(5)->get())
        ->with('next',Post::find($next)) 
        ->with('previous',Post::find($previous))
        ->with('tags',Tag::all());

    }


    public function category($id){

        $category =Category::find($id);

        return view('category')->with('category',$category)
                               ->with('title', $category->name)
                                ->with('categories' , Category::take(5)->get())
                                ->with('tags',Tag::all());

    }
    

    public function tag($id){
        $tag = Tag::find($id);


        return view('tag')->with('tag',$tag)
                          ->with('title',$tag->tag)
                          ->with('categories' , Category::take(5)->get()) 
                          ;

    }

  
  
     
    public function store(Request $request)
    {
        //
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
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
