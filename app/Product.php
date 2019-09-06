<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    public $timestamps = false;
    protected $fillable = ['name', 'price', 'description', 'status', 'category_id','tag_id'];

    // A product belong to a category
   function category(){
        return $this->belongsTo(\App\Category::class);
        

   }
//Product has many tags

   public function tags()
   {
        return $this->belongsToMany(\App\Tag::class,'product_tag', 'product_id', 'tag_id');
   }
}
