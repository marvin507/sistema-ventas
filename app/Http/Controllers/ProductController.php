<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Product;
use App\Http\Requests\RequestCreateProduct;
class ProductController extends Controller
{
  public function __construct()
  {
      $this->middleware('auth');
  }
    public function view(){

      return view('product.index');
    }
    public function showProducts(){

      $productos =  Product::orderBy('id', 'DESC')->get();
      return $productos;
    }

    public function storeProduct(RequestCreateProduct $request){

      Product::create($request->all());

    }

    public function updateProduct(RequestCreateProduct $request, $id){

      Product::findOrFail($id)->update($request->all());

    }

    public function deleteProduct($id){

      Product::findOrFail($id)->delete();
    }
}
