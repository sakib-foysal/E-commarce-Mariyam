<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\File;
use App\Models\Setting;
use Image;

class SettingController extends Controller
{
    public function index(){
        $data['setting'] = Setting::first();
        return view('backend.admin.settings.index',$data);
    }
    public function update(Request $request, $id){
        $data = Setting::find($id);
        $data->title = $request->title;
        if($request->hasfile('icon')){
            $image = 'images/settings/'.$data->icon; if(File::exists($image)){ File::delete($image); }
            $file = $request->file('icon');
            $name="icon" . date('YmdHis') . "." . $file->getClientOriginalExtension();
            $path = public_path('/images/settings');
            $img = Image::make($file->path());
            $img->resize(62,62)->save($path.'/'.$name);
            // $img->resize(1675,1675)->save($path.'/'.$name);
            $data->icon = $name;
        }
        if($request->hasfile('logo')){
            $image = 'images/settings/'.$data->logo; if(File::exists($image)){ File::delete($image); }
            $file = $request->file('logo');
            $name="logo" . date('YmdHis') . "." . $file->getClientOriginalExtension();
            $path = public_path('/images/settings');
            $img = Image::make($file->path());
            // $img->resize(150,62)->save($path.'/'.$name);
            // $img->resize(964,402)->save($path.'/'.$name);
            $img->resize(4018,1675)->save($path.'/'.$name);
            $data->logo = $name;
        }
        $data->mobile = $request->mobile;
        $data->address = $request->address;
        $data->email = $request->email;
        $data->facebook = $request->facebook;
        $data->bkash = $request->bkash;
        $data->nagad = $request->nagad;
        $data->rocket = $request->rocket;
        $data->update();
        return redirect()->back()->with('success','Updated Successfully Done.');
    }
}
