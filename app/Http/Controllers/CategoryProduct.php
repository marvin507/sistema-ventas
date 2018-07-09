<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Category;
class CategoryProduct extends Controller
{
    public function showCategories(){

      return $categorias = Category::orderBy('id', 'DESC')->get();
    }
}
