<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
    protected $fillable =['name', 'status'];

//Tag has many products
 public function products()
{
     return $this->belongsToMany(\App\Product::class,'product_tag','tag_id','product_id');


}
}