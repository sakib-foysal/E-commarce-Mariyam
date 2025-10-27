<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Setting;
use App\Models\Social;
use Illuminate\Support\Facades\File;
use Image;

class SocialController extends Controller
{
    public function index(){
        $data['setting'] = Setting::first();
        $data['socials'] = Social::latest()->get();
        return view('backend.admin.socials.index',$data);
    }
    public function store(Request $request){
        $data = new Social;
        $data->link = $request->link;
        if($request->hasfile('logo')){
            $file = $request->file('logo');
            $name="logo" . date('YmdHis') . "." . $file->getClientOriginalExtension();
            $path = public_path('/images/socials');
            $img = Image::make($file->path());
            $img->resize(50,50)->save($path.'/'.$name);
            $data->logo = $name;
        }
        $data->save();
        return redirect()->back()->with('success','Added Successfully Done.');
    }
    public function update(Request $request, $id){
        $data = Social::find($id);
        $data->link = $request->link;
        if($request->hasfile('logo')){
            $image = 'images/socials/'.$data->logo; if(File::exists($image)){ File::delete($image); }
            $file = $request->file('logo');
            $name="logo" . date('YmdHis') . "." . $file->getClientOriginalExtension();
            $path = public_path('/images/socials');
            $img = Image::make($file->path());
            $img->resize(50,50)->save($path.'/'.$name);
            $data->logo = $name;
        }
        $data->update();
        return redirect()->back()->with('success','Updated Successfully Done.');
    }
    public function destroy($id){
        $data = Social::find($id);
        $data->delete();
        return redirect()->back()->with('error','Deleted Successfully Done.');
    }
}
