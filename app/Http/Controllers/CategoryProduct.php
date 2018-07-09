<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Category;
class CategoryProduct extends Controller

{
  public function view(){

    return view('category.index');
  }
    public function showCategories(){

      return $categorias = Category::orderBy('id', 'DESC')->get();
    }

    public function storeCategory(Request $request){

      Category::create($request->all());

    }

    public function updateCategory(Request $request, $id){

      Category::findOrFail($id)->update($request->all());

    }

    public function deleteCategory($id){

      Category::findOrFail($id)->delete();
    }

}
