<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Category;



class CategoryController extends Controller
{
    public function index(){
        $categories = Category::all();
       

        return view('categories.index', compact('categories'));
    
    }

    public function add(){
    
        return view('categories.add');
       
    }

    public function store(Request $request){
        $request->validate([
            'name' => 'required|min:3|max:50',
            'status' => 'required|boolean'
    
        ]);

       $input =$request ->all(); 
       $category= Category::create($input);
       
       session()->flash('message', 'Product successfully created.');
   
       return redirect(url('/categories'));
       
    }
    
    public function edit($category){
        $category = Category::find($category);

        return view('categories.edit', compact('category'));
    } 

    public function update(Request $request, $category){
        
        $request->validate([
            'name' => 'required|min:3|max:50',
            'status' => 'required|boolean',
            
    
        ]);
        
        $category = Category::find($category);
        $category->name = $request->name;
        $category->status = $request->status;

        $category->save();

        session()->flash('message', 'Product successfully edited.');
   
        return redirect(url('/categories'));
    }

        

    public function destroy($category){
        Category::find($category)->delete();
        
        return redirect(url('/categories'));
    }

    function filter($category)
{
    $products= \App\Product::where('category_id', $category)->get();

    return view('products.index', compact('products'));
}
    
}

