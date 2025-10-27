<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Setting;
use App\Models\Earn;
use App\Models\EarnName;

class EarnController extends Controller
{
    public function index(){
        $data['setting'] = Setting::first();
        $data['earnnames'] = EarnName::latest()->get();
        $data['earns'] = Earn::latest()->get();
        return view('backend.admin.earns.index',$data);
    }
    public function store(Request $request){
        $data = new Earn;
        $data->earnname_id = $request->earnname_id;
        $data->amount = $request->amount;
        $data->save();
        return redirect()->back()->with('success','Added Successfully Done.');
    }
    public function update(Request $request, $id){
        $data = Earn::find($id);
        $data->amount = $request->amount;
        $data->update();
        return redirect()->back()->with('success','Updated Successfully Done.');
    }
    public function destroy($id){
        $data = Earn::find($id);
        $data->delete();
        return redirect()->back()->with('error','Deleted Successfully Done.');
    }
}
