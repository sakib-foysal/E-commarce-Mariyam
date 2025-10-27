<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Setting;
use App\Models\EarnName;
use App\Models\Earn;

class EarnNameController extends Controller
{
    public function index(){
        $data['setting'] = Setting::first();
        $data['earnnames'] = EarnName::latest()->get();
        return view('backend.admin.earnnames.index',$data);
    }
    public function store(Request $request){
        $data = new EarnName;
        $data->title = $request->title;
        $data->save();
        return redirect()->back()->with('success','Added Successfully Done.');
    }
    public function update(Request $request, $id){
        $data = EarnName::find($id);
        $data->title = $request->title;
        $data->update();
        return redirect()->back()->with('success','Updated Successfully Done.');
    }
    public function destroy($id){
        $data = EarnName::find($id);
        $earns = Earn::all();
        foreach($earns as $earn){
            if($earn->earnname_id==$id){
                $earn->delete();
            }
        }
        $data->delete();
        return redirect()->back()->with('error','Deleted Successfully Done.');
    }
}
