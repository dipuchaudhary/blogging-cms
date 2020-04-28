<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class ProfileController extends Controller
{
    public function index(){
        return view('admin.users.profile')->with('user',Auth::user());
    }

    public function update(Request $request){
       $this->validate($request,[
           'name' => 'required',
           'email' => 'required|email',
       ]);
       $user = Auth::user();
       $user->name = $request->name;
       $user->email = $request->email;

       if ($request->hasFile('avatar')){
          $user->profile->avatar = $request->avatar->store('avatar');
           $user->profile->save();
       }
       if ($request->password){
            $user->password = bcrypt($request->pasword);
       }
       $user->profile->about = $request->about;
       $user->profile->facebook = $request->facebook;

       $user->save();
       $user->profile->save();

       Session::flash('success','profile updated successfully');
       return redirect()->back();


    }
}
