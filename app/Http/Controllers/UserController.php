<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\User;

use App\Models\Profile;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
      public function __construct(){

          $this->middleware('admin');

      }


    public function index()
    {
        return view('admin.users.index')->with('users',User::all());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.users.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate( $request, [
            'name' => 'required',
            'email'=>'email|required'
        ]);

        $user = User::create([

            'name'=>$request->name,

            'email'=>$request->email,
            
            'password'=>bcrypt('password')

        ]);

        Profile::create([

            'user_id'=> $user->id,

            'avatar' =>'1613398403morgankathini.jpeg'
        ]);

        notify()->success('user created successfully');

        return redirect()->route('users');
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

    public function makeadmin($id){

       $user =  User::find($id);

       $user->admin = 1;

       $user->save();

       notify()->success('permissions updated');

       return redirect()->route('users');

    }

    public function makeuser($id){

        $user =  User::find($id);
 
        $user->admin = 0;
 
        $user->save();
 
        notify()->success('permissions updated');
 
        return redirect()->route('users');
 
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
        $user = User::find($id);

        $user->delete();

        notify()->success('user deleted');

        return redirect()->back();
    }
}
