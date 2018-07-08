<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable = ['nombre', 'codigo', 'cantidad', 'precio', 'category_id'];

    public function category(){
      return $this->belongsTo('App\Category', 'category_id');
    }
}
