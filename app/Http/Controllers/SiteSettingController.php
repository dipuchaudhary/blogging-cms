<?php

namespace App\Http\Controllers;

use App\SiteSetting;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;


class SiteSettingController extends Controller
{
    public function __construct()
    {
        $this->middleware('admin');
    }

    public function index(){
        return view('admin.settings.setting')->with('setting', SiteSetting::first());

    }

    public function update(Request $request){
        $this->validate($request,[
            'site_name' => 'required',
            'email' => 'required|email',
            'contact' => 'required',
            'address' => 'required',
        ]);

        $setting = SiteSetting::first();

        $setting->site_name = $request->site_name;
        $setting->email = $request->email;
        $setting->contact = $request->contact;
        $setting->address = $request->address;

        $setting->save();

        Session::flash('success','setting updated successfully');
        return redirect()->back();

    }
}
