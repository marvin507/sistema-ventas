<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $fillable = ['name'];

    public function Products(){
      return $this->hasOne(Product::class);
    }

}
