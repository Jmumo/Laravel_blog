<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Category;

use App\Http\Requests\StorePostRequest;

use App\Http\Requests\UpdatePostRequest;

use Illuminate\Support\Facades\Auth;

use App\Models\Post;

use App\Models\Tag;

use Illuminate\Support\Str;

class PostController extends Controller
{
    
    public function index()
    {
        $posts = Post::all();

        return view('admin.posts.index')->with('posts',$posts);
    }

    
    public function create()
    {
         $categories = Category::all();

         if ($categories->count() ==0) {
             
            notify()->info('You Must Have Categories');

            return redirect()->back();
         }

        return view('admin.posts.create')->with('categories',$categories)->with('tags',Tag::all());
    }

   
    public function store(StorePostRequest $request)
    {
       
        $user = Auth::user();

        $filename= time().$request->featured->getClientOriginalName();

        $request->featured->storeAs('images',$filename,'public');

        $post=Post::create([

            'title' => $request->title,
            'content'=>$request->content,
            'featured'=>$filename,
            'category_id'=>$request->category_id,
            'slug'=>str::of($request->title)->snake(),
            'user_id'=>$user->id
        ]);
        
         $post->tags()->attach($request->tags);

        notify()->info('Post created successfully');
        
        return redirect()->route('posts');
    }

    
    public function show($id)
    {
       
    }

   
    public function edit($id)
    {

        $post = Post::find($id);

        return view('admin.posts.edit')
                   ->with('post',$post)
                   ->with('categories',Category::all())
                   ->with('tags',Tag::all());
        
    }

    public function update(UpdatePostRequest $request, $id)
    {

        $post = Post::find($id);

        if($request->hasFile('featured')){

            $filename= time().$request->featured->getClientOriginalName();

            $request->featured->storeAs('images',$filename,'public');

            $post->featured = $filename;
          
        }
        
        $post->title = $request->title;

        $post->content = $request->content;

        $post->category_id = $request->category_id;

        $post->slug =str::of($request->title)->snake();

        $post->tags()->sync($request->tags);

        $post->save();

        notify()->success('updated successfully');

        return redirect()->route('posts');
        
    }

    
    public function destroy($id)
    {

        $post = Post::find($id);

        $post->delete();

        notify()->success('Post trashed');

        return redirect()->back();
        

    }
    public function trashed(){

        $posts = Post::onlyTrashed()->get();

        return view('admin.posts.trashed')->with('posts',$posts);

    }
    public function postkill($id){

        $post = Post::withTrashed()->where('id',$id)->first();

        $post->forceDelete();

        notify()->success('post completely deleted');

        return redirect()->back();

    }

    public function postrestore($id){

       $post = Post::withTrashed()->where('id',$id)->first();

       $post->restore();

       notify()->success('post restored');

       return redirect()->route('posts');

    }
}
