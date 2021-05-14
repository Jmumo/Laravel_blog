<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Tag;

class TagsController extends Controller
{
    public function index()
    {
        return view('admin.tags.index')->with('tags',Tag::all());
    }

    
    public function create()
    {
        return view('admin.tags.create');
    }

    
    public function store(Request $request)
    {   
         $this->validate($request,[

             'tag'=>'required|max:255'
         ]);

        Tag::create([

           'tag'=>$request->tag
        ]);
    notify()->success('tag created');
         
        return redirect()->route('tags');
    }


   
    public function edit($id)
    {
    $tag = Tag::find($id);
     return view('admin.tags.edit')->with('tag',$tag);

    }

   
    public function update(Request $request, $id)
    {
        $this->validate($request,[
            'tag'=>'required|max:255'
        ]);

        $tag = Tag::find($id);

        $tag->tag = $request->tag;

        $tag->save();

        notify()->success('tag updated');

        return redirect()->route('tags');
    }

  
    public function destroy($id)
    {
        Tag::destroy($id);

        notify()->success('tag destroyed');

        return redirect()->route('tags');
    }
}
