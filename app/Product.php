<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable = ['nombre', 'codigo', 'cantidad', 'precio'];

    public function category(){

      return $this->belongsTo(Category::class);
    }
}
