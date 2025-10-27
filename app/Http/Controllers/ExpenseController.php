<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Setting;
use App\Models\ExpenseName;
use App\Models\Expense;

class ExpenseController extends Controller
{
    public function index(){
        $data['setting'] = Setting::first();
        $data['expensenames'] = ExpenseName::latest()->get();
        $data['expenses'] = Expense::latest()->get();
        return view('backend.admin.expenses.index',$data);
    }
    public function store(Request $request){
        $data = new Expense;
        $data->expensename_id = $request->expensename_id;
        $data->amount = $request->amount;
        $data->save();
        return redirect()->back()->with('success','Added Successfully Done.');
    }
    public function update(Request $request, $id){
        $data = Expense::find($id);
        $data->amount = $request->amount;
        $data->update();
        return redirect()->back()->with('success','Updated Successfully Done.');
    }
    public function destroy($id){
        $data = Expense::find($id);
        $data->delete();
        return redirect()->back()->with('error','Deleted Successfully Done.');
    }
}
