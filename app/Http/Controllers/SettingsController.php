<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\setting;

use App\Http\Requests\SettingStoreRequest;

class SettingsController extends Controller
{

    public function __construct(){

        $this->middleware('admin');

    }

    public function index(){
        return view('admin.settings.settings')->with('settings',setting::first());
    }

    public function update(SettingStoreRequest $request){
       
        $settings = setting::first();

        $settings->site_name = request()->site_name;

        $settings->contact_number = request()->contact_number;

        $settings->contact_email = request()->contact_email;

        $settings->address = request()->address;

        $settings->save();

        return redirect()->back();
    }
}
