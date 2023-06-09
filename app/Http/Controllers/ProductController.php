<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;

class ProductController extends Controller
{
    public function index(){
        $products = Product::get();
        return view('products.index', ['products' => $products]);
    }

    public function create(){
        return view('products.create');
    }

    public function store(Request $request){
        //validation
        $request->validate([
            'name' => 'required',
            'description' => 'required',
            'image' => 'required|mimes:jpg,png,jpeg|max:5048'
        ]);
        
        //uploading image
        $imageName = time().'.'.$request->image->extension();
        $request->image->move(public_path('images'), $imageName);
        // dd($imageName);
        // dd($request->all());

        //saving data to database
        $product = new Product();
        $product->name = $request->name;
        $product->description = $request->description;
        $product->image = $imageName;

        $product->save();
        return back()->with('msg', 'Product Created Successfully');
        // echo "Product Saved Successfully";
    }

    public function edit($id){
        var_dump($id);
        // $product = Product::find($id);
        // return view('products.edit', ['product' => $product]);
    }

    public function edit_by_id($id){
        // var_dump($id);
        // dd($id);
        $product = Product::find($id);
        return view('products.edit', ['product' => $product]);
    }

    public function update(Request $request, $id){
        $request->validate([
            'name' => 'required',
            'description' => 'required',
            'image' => 'nullable|mimes:jpg,png,jpeg|max:5048'
        ]);

        $product = Product::find($id);
        if($request->hasFile('image')){
            $imageName = time().'.'.$request->image->extension();
            $request->image->move(public_path('images'), $imageName);
            $product->image = $imageName;
        }
        $product->name = $request->name;
        $product->description = $request->description;

        $product->save();
        return back()->with('msg', 'Product Updated Successfully');
    }

    public function delete($id){
        // dd($id);
        $product = Product::find($id);
        $product->delete();
        redirect()->route('products.name');
        // return $this->index()->with('msg', 'Product Deleted Successfully');
    }

    public function view($id){
        // dd($id);
        $product = Product::find($id);
        return view('products.view', ['product' => $product]);
    }
}
