<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $fillable =['name', 'status'];
}

/**
 * category has many products
  */
  function products(){
      return $this->hasMany(\App\Product::class);
  }
