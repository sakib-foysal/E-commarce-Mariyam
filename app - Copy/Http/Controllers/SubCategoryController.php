<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\SubCategory;

class SubCategoryController extends Controller
{
    public function store(Request $request){
        $data = new SubCategory;
        $data->category_id = $request->category_id;
        $data->name = $request->name;
        $data->save();
        return back();
    }
    public function destroy($id){
        $data = SubCategory::find($id);
        $data->delete();
        return back();
    }
    public function update(Request $request, $id){
        $data = SubCategory::find($id);
        $data->name = $request->name;
        $data->update();
        return back();
    }
}
