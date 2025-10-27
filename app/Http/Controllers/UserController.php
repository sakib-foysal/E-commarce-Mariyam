<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\Models\Setting;
use App\Models\User;

class UserController extends Controller
{
    public function index(){
        $data['setting'] = Setting::first();
        $data['users'] = User::latest()->get();
        return view('backend.admin.users.index',$data);
    }
    public function store(Request $request){
        $data = new User;
        $data->name = $request->name;
        $data->email = $request->email;
        $data->type = $request->type;
        $data->password = bcrypt($request->password);
        $data->save();
        return redirect()->back()->with('success','Added Successfully Done.');
    }
    public function update(Request $request, $id){
        $data = User::find($id);
        $data->name = $request->name;
        $data->email = $request->email;
        $data->type = $request->type;
        $data->update();
        return redirect()->back()->with('success','Updated Successfully Done.');
    }
    public function destroy($id){
        $data = User::find($id);
        $data->delete();
        return redirect()->back()->with('error','Deleted Successfully Done.');
    }
    public function update_user_address(Request $request){
        $data = User::find(Auth::user()->id);
        $data->mobile = $request->mobile;
        $data->location = $request->location;
        $data->district = $request->district;
        $data->division = $request->division;
        $data->country = $request->country;
        $data->update();
        return back();
    }
}
