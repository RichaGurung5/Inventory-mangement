<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;
use App\Category;
use App\Tag;

class ProductController extends Controller
{
    public function index(){
    $products =Product::all();

        return view('products.index', compact('products'));
}
public function add(){

    $categories =Category::all();

    $tags =Tag::all();
    return view('products.add', compact('categories','tags'));
}

public function store(Request $request){
    $request->validate([
        'name' => 'required|min:3|max:50',
        'status' => 'required|boolean',
        'price' => 'required|numeric|between:0.01,10000.00',
        'description' => 'required|min:3|max:50',
        'category_id' => 'required|exists:categories,id',

    ]);

   $input =$request ->all(); 
   $product= Product::create($input);

   if($request->has('tags')){
       $product->tags()->sync($request->tags);
   }

   session()->flash('message', 'Product successfully created.');
   
   
   return redirect(url('/products'));
}

public function edit(Product $product){

   // $product = Product::find($product);
     $categories = Category::all();
 return view('products.edit', compact('product', 'categories'));

} 

public function update(Request $request, Product $product){
    $request->validate([
        'name' => 'required|min:3|max:50',
        'price' => 'required|numeric|between:0.01,10000.00',
        'description' => 'required|min:3|max:50',
        'status' => 'required|boolean',
        

    ]);

    //$product = Product::find($product);
    $product->name = $request->name;
    $product->price = $request->price;
    $product->description = $request->description;
    $product->status = $request->status;

    $product->save();
    
    session()->flash('message', 'Product successfully edited.');
   

    return redirect(url('/products'));
}

public function destroy($product){
   Product::find($product)->delete();

    return redirect(url('/products'));
}

public function search(Request $request){
    $input = $request->get('name');
    $products = \App\Product::where('name', 'like', '%' . $input . '%')->orWhere('description', 'like', '%' .$input .'%')
    ->get();
    if($request->has('tags')){
        $product->tags()->sync($request->tags);
    }

    return view('products.index', compact('products'));
   
  
}

}
