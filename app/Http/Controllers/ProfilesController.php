<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Hash;

use App\Http\Requests\ProfileUpdateRequest;

use Illuminate\Support\Facades\Auth;

class ProfilesController extends Controller
{
    
    public function index()
    {
        return view('admin.users.profile')->with('user', Auth::user());
    }


    public function update(ProfileUpdateRequest $request)
    {
        $user = Auth::user();

        if($request->hasFile('avatar')){

            $filename= time().$request->avatar->getClientOriginalName();

            $request->avatar->storeAs('images',$filename,'public');

            $user->profile->avatar = $filename;
          
        }

        $user->name = $request->name;
        $user->email = $request->email;
        $user->profile->facebook= $request->facebook;
        
        $user->profile->youtube = $request->youtube;
        $user->profile->about = $request->about;
        
        $user->profile->save();

        if ($request->has('password')) {

            $user->password = Hash::Make($request->password);

            $user->save();

            notify()->success('profile updated');
        }

        return redirect()->back();
    }

    
     
    public function destroy($id)
    {
        $user = User::find($id);

        $user->profile->delete();

        $user->delete();

        notify()->success('user deleted');

        return redirect()->back();
    }
}
