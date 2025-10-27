<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\Setting;
use App\Models\User;
use App\Models\Product;
use App\Models\ProductVariant;
use App\Models\Category;
use App\Models\SubCategory;
use App\Models\Order;
use App\Models\OrderVariant;
use Auth;
use App\Models\Social;
use App\Models\FormSubmission;

class WelcomeController extends Controller
{
    public function welcome(){
        $data['setting'] = Setting::first();
        $data['socials'] = Social::latest()->get();
        $data['products'] = Product::latest()->get();
        $data['categories'] = Category::latest()->get();
        $data['sub_categories'] = SubCategory::latest()->get();
        return view('welcome',$data);
    }
    public function login3(){
        $data['setting'] = Setting::first();
        $data['socials'] = Social::latest()->get();
        $data['products'] = Product::latest()->get();
        $data['categories'] = Category::latest()->get();
        $data['sub_categories'] = SubCategory::latest()->get();
        return view('auth.login',$data);
    }
    public function register2(){
        $data['setting'] = Setting::first();
        $data['socials'] = Social::latest()->get();
        $data['products'] = Product::latest()->get();
        $data['categories'] = Category::latest()->get();
        $data['sub_categories'] = SubCategory::latest()->get();
        return view('auth.register',$data);
    }
    public function search(Request $request)
    {
        // Validate the input
        $searchTerm = $request->input('query');
        
        // Fetch products based on the search term
        $products = Product::where('title', 'LIKE', "%{$searchTerm}%")->get();

        // Return JSON response to frontend
        return response()->json($products);
    }
    
    
    public function fishinsert(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'phone' => 'required|string|max:20',
            'message' => 'required|string',
        ]);

        FormSubmission::create([
            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone,
            'message' => $request->message,
            'type'=>"mango",
        ]);

        return redirect()->back()->with('success', 'Form submitted successfully!');
    }
    
     public function index2()
    {
        $submissions = FormSubmission::all();
        return view('admin.landingpage.index', compact('submissions'));
    }
    
    
    
    public function shop(){
        $data['setting'] = Setting::first();
        $data['socials'] = Social::latest()->get();
        $data['products'] = Product::latest()->get();
        $data['import_products'] = Product::where('type','Import')->count();
        $data['export_products'] = Product::where('type','Export')->count();
        $data['trade_products'] = Product::where('type','Trade')->count();
        $data['categories'] = Category::latest()->get();
        return view('frontend.shop',$data);
    }
    public function category_wise_product($id){
        $data['setting'] = Setting::first();
        $data['socials'] = Social::latest()->get();
        $data['products'] = Product::latest()->get();
        $data['categories'] = Category::latest()->get();
        $data['sub_categories'] = SubCategory::latest()->get();
        $data['category'] = Category::find($id);
        return view('frontend.category_wise_product',$data);
    }
    
     public function lanmango(){
       
        return view('frontend.lanmango');
    }
    public function sub_category_wise_product($id){
        $data['setting'] = Setting::first();
        $data['socials'] = Social::latest()->get();
        $data['products'] = Product::latest()->where('sub_category_id',$id)->get();
        $data['categories'] = Category::latest()->get();
        $data['sub_category'] = SubCategory::find($id);
        return view('frontend.sub_category_wise_product',$data);
    }
    public function import_products(){
        $data['setting'] = Setting::first();
        $data['socials'] = Social::latest()->get();
        $data['products'] = Product::latest()->where('type','Import')->get();
        $data['import_products'] = Product::where('type','Import')->count();
        $data['export_products'] = Product::where('type','Export')->count();
        $data['trade_products'] = Product::where('type','Trade')->count();
        $data['categories'] = Category::latest()->get();
        $data['sub_category'] = SubCategory::latest()->get();
        return view('frontend.import_products',$data);
    }
    public function export_products(){
        $data['setting'] = Setting::first();
        $data['socials'] = Social::latest()->get();
        $data['products'] = Product::latest()->where('type','Export')->get();
        $data['import_products'] = Product::where('type','Import')->count();
        $data['export_products'] = Product::where('type','Export')->count();
        $data['trade_products'] = Product::where('type','Trade')->count();
        $data['categories'] = Category::latest()->get();
        $data['sub_category'] = SubCategory::latest()->get();
        return view('frontend.export_products',$data);
    }
    public function trade_products(){
        $data['setting'] = Setting::first();
        $data['socials'] = Social::latest()->get();
        $data['products'] = Product::latest()->where('type','Trade')->get();
        $data['import_products'] = Product::where('type','Import')->count();
        $data['export_products'] = Product::where('type','Export')->count();
        $data['trade_products'] = Product::where('type','Trade')->count();
        $data['categories'] = Category::latest()->get();
        $data['sub_category'] = SubCategory::latest()->get();
        return view('frontend.trade_products',$data);
    }
    public function product_details($id){
        $data['setting'] = Setting::first();
        $data['socials'] = Social::latest()->get();
        $data['products'] = Product::latest()->get();
        $data['import_products'] = Product::where('type','Import')->count();
        $data['export_products'] = Product::where('type','Export')->count();
        $data['trade_products'] = Product::where('type','Trade')->count();
        $data['product'] = Product::find($id);
        $data['categories'] = Category::latest()->get();
        return view('frontend.product_details',$data);
    }
    public function login2(Request $request, $id){
        $input = $request->all();

        $this->validate($request, [
            'email' => 'required|email',
            'password' => 'required',
        ]);

        if(auth()->attempt(array('email' => $input['email'], 'password' => $input['password'])))
        {
            return redirect(url('/product_details/' . $id));
        }else{
            return redirect()->route('login')
                ->with('error','Email-Address And Password Are Wrong.');
        }

    }
}
