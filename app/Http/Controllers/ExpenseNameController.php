<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Setting;
use App\Models\ExpenseName;
use App\Models\Expense;

class ExpenseNameController extends Controller
{
    public function index(){
        $data['setting'] = Setting::first();
        $data['expensenames'] = ExpenseName::latest()->get();
        return view('backend.admin.expensenames.index',$data);
    }
    public function store(Request $request){
        $data = new ExpenseName;
        $data->title = $request->title;
        $data->save();
        return redirect()->back()->with('success','Added Successfully Done.');
    }
    public function update(Request $request, $id){
        $data = ExpenseName::find($id);
        $data->title = $request->title;
        $data->update();
        return redirect()->back()->with('success','Updated Successfully Done.');
    }
    public function destroy($id){
        $data = ExpenseName::find($id);
        $expenses = Expense::all();
        foreach($expenses as $expense){
            if($expense->expensename_id==$id){
                $expense->delete();
            }
        }
        $data->delete();
        return redirect()->back()->with('error','Deleted Successfully Done.');
    }
}
