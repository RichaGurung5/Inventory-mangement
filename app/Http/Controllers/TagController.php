<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Tag;



class TagController extends Controller
{
    public function index(){
        $tags = Tag::all();
       

        return view('tags.index', compact('tags'));
    
    }


public function add(){
    
    return view('tags.add');
   
}

public function store(Request $request){
    $request->validate([
        'name' => 'required|min:3|max:50',
        'status' => 'required|boolean'

    ]);

   $input =$request ->all(); 
   $tag= Tag::create($input);
   
   session()->flash('message', 'Tag successfully created.');

   return redirect(url('/tags'));
   
}

public function edit($tag){
    $tag = tag::find($tag);

    return view('tags.edit', compact('tag'));
} 

public function update(Request $request, $tag){
    
    $request->validate([
        'name' => 'required|min:3|max:50',
        'status' => 'required|boolean',
        

    ]);
    $tag = Tag::find($tag);
    $tag->name = $request->name;
    $tag->status = $request->status;

    $tag->save();

    session()->flash('message', 'Product successfully edited.');

    return redirect(url('/categories'));
}

    



public function destroy($tag)
{
    Tag::find($tag)->delete();
    return redirect('tags');
}

function filter(Tag $tag)
{
    $products=$tag->products;

    return view('products.index', compact('products'));
}
}
