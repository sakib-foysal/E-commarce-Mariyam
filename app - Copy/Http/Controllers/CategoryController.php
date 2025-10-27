<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use App\Models\Category;
use App\Models\Setting;
use Image;

class CategoryController extends Controller
{
    public function index(){
        $data['setting'] = Setting::first();
        $data['categories'] = Category::latest()->get();
        return view('backend.admin.categories.index',$data);
    }
    public function store(Request $request){
        $data = new Category;
        $data->name = $request->name;
        if($request->hasfile('image')){
            $file = $request->file('image');
            $name="image" . date('YmdHis') . "." . $file->getClientOriginalExtension();
            $path = public_path('/images/categories');
            $img = Image::make($file->path());
            $img->resize(200, 200)->save($path.'/'.$name);
            $data->image = $name;
        }
        $data->save();
        return back();
    }
    public function destroy($id){
        $data = Category::find($id);
        $image = 'images/categories/'.$data->image; if(File::exists($image)){ File::delete($image); }
        $data->delete();
        return back();
    }
    public function update(Request $request, $id){
        $data = Category::find($id);
        $data->name = $request->name;
        if($request->hasfile('image')){
        $image = 'images/categories/'.$data->image; if(File::exists($image)){ File::delete($image); }
            $file = $request->file('image');
            $name="image" . date('YmdHis') . "." . $file->getClientOriginalExtension();
            $path = public_path('/images/categories');
            $img = Image::make($file->path());
            $img->resize(200, 200)->save($path.'/'.$name);
            $data->image = $name;
        }
        $data->update();
        return back();
    }
}
