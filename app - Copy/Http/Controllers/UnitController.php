<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Unit;
use App\Models\Setting;

class UnitController extends Controller
{
    public function index(){
        $data['setting'] = Setting::first();
        $data['units'] = Unit::latest()->get();
        return view('backend.admin.units.index',$data);
    }
    public function store(Request $request){
        $data = new Unit;
        $data->name = $request->name;
        $data->save();
        return back();
    }
    public function destroy($id){
        $data = Unit::find($id);
        $data->delete();
        return back();
    }
    public function update(Request $request, $id){
        $data = Unit::find($id);
        $data->name = $request->name;
        $data->update();
        return back();
    }
}
