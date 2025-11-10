<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\File;
use App\Models\Product;
use App\Models\ProductVariant;
use App\Models\Category;
use App\Models\SubCategory;
use App\Models\Unit;
use App\Models\Setting;
use Intervention\Image\Facades\Image;

class ProductController extends Controller
{
    public function index(){
        $data['setting'] = Setting::first();
        $data['products'] = Product::latest()->get();
        return view('backend.admin.products.index',$data);
    }
    public function create(){
        $data['setting'] = Setting::first();
        $data['categories'] = Category::latest()->get();
        $data['sub_categories'] = SubCategory::latest()->get();
        $data['units'] = Unit::latest()->get();
        return view('backend.admin.products.create',$data);
    }
    public function fetch_sub_categories(Request $request){
        $data['sub_categories'] = SubCategory::where("category_id", $request->category_id)->get();
        return response()->json($data);
    }
    public function store(Request $request){
        $request->validate([
          'title' => 'required|unique:products|max:255',
        ]);

        // create product
        $data = new Product;
        $data->title = $request->title;
        $data->type = $request->type;
        $data->sub_category_id = $request->sub_category_id;
        $data->slug = $request->slug;
        $data->description = $request->description;
        $data->custom_description = $request->custom_description;
        $data->sale_price = $request->sale_price;
        $data->min_quantity = $request->min_quantity;
        $data->unit_id = $request->unit_id;
        if($request->hasfile('image')){
            $file = $request->file('image');
            $name="image" . date('YmdHis') . "." . $file->getClientOriginalExtension();
            $path = public_path('/images/products');
            try {
                $img = Image::make($file->path());
                $img->resize(500, 500)->save($path.'/'.$name);
            } catch (\Intervention\Image\Exception\NotSupportedException $e) {
                // GD/Imagick not available — fallback to moving the original file without resizing
                $file->move($path, $name);
            } catch (\Exception $e) {
                // Any other image processing error — still move original file so upload succeeds
                $file->move($path, $name);
            }
            $data->image = $name;
        }
        if($request->hasfile('image_hover')){
            $file = $request->file('image_hover');
            $name="image_hover" . date('YmdHis') . "." . $file->getClientOriginalExtension();
            $path = public_path('/images/products');
            try {
                $img = Image::make($file->path());
                $img->resize(500, 500)->save($path.'/'.$name);
            } catch (\Intervention\Image\Exception\NotSupportedException $e) {
                $file->move($path, $name);
            } catch (\Exception $e) {
                $file->move($path, $name);
            }
            $data->image_hover = $name;
        }
        $data->save();
        return redirect()->route('products.index');
    }
    public function destroy($id){
        $data = Product::find($id);
        $image = 'images/products/'.$data->image; if(File::exists($image)){ File::delete($image); }
        $image_hover = 'images/products/'.$data->image_hover; if(File::exists($image_hover)){ File::delete($image_hover); }
        $data->delete();
        return back();
    }
    public function edit($id){
        $data['setting'] = Setting::first();
        $data['product'] = Product::find($id);
        $data['categories'] = Category::latest()->get();
        $data['sub_categories'] = SubCategory::latest()->get();
        $data['units'] = Unit::latest()->get();
        return view('backend.admin.products.edit',$data);
    }
    public function update(Request $request, $id){
        // create product
        $data = Product::find($id);
        $data->title = $request->title;
        $data->type = $request->type;
        $data->sub_category_id = $request->sub_category_id;
        $data->slug = $request->slug;
        $data->description = $request->description;
        $data->custom_description = $request->custom_description;
        $data->sale_price = $request->sale_price;
        $data->min_quantity = $request->min_quantity;
        $data->unit_id = $request->unit_id;
        if($request->hasfile('image')){
        $image = 'images/products/'.$data->image; if(File::exists($image)){ File::delete($image); }
            $file = $request->file('image');
            $name="image" . date('YmdHis') . "." . $file->getClientOriginalExtension();
            $path = public_path('/images/products');
            try {
                $img = Image::make($file->path());
                $img->resize(500, 500)->save($path.'/'.$name);
            } catch (\Intervention\Image\Exception\NotSupportedException $e) {
                $file->move($path, $name);
            } catch (\Exception $e) {
                $file->move($path, $name);
            }
            $data->image = $name;
        }
        if($request->hasfile('image_hover')){
        $image_hover = 'images/products/'.$data->image_hover; if(File::exists($image_hover)){ File::delete($image_hover); }
            $file = $request->file('image_hover');
            $name="image_hover" . date('YmdHis') . "." . $file->getClientOriginalExtension();
            $path = public_path('/images/products');
            try {
                $img = Image::make($file->path());
                $img->resize(500, 500)->save($path.'/'.$name);
            } catch (\Intervention\Image\Exception\NotSupportedException $e) {
                $file->move($path, $name);
            } catch (\Exception $e) {
                $file->move($path, $name);
            }
            $data->image_hover = $name;
        }
        $data->update();
        return redirect()->route('products.index');
    }
    public function product_variant_quantity_update(Request $request, $id){
        $data = ProductVariant::find($id);
        $data->quantity = $request->quantity;
        $data->update();
        return back();
    }

    public function searchProducts(Request $request){
        $search = $request->get('q');

        $products = Product::where('title', 'LIKE', "%{$search}%")
            ->orWhere('id', 'LIKE', "%{$search}%")
            ->limit(20)
            ->get(['id', 'title', 'sale_price']);

        return response()->json($products);
    }

    // Return product price (JSON) for AJAX requests
    public function getPrice($id)
    {
        $product = Product::find($id);
        if (! $product) {
            return response()->json(['success' => false, 'message' => 'Product not found'], 404);
        }

        return response()->json(['success' => true, 'price' => $product->sale_price]);
    }

}
