<?php

use Illuminate\Database\Seeder;
use App\Product;
class ProductsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for ($i=1; $i<=20 ; $i++) {
          Product::create([
            'nombre'    =>  "producto{$i}",
            'codigo'    =>  "33454{$i}",
            'cantidad'  =>  "{$i}",
            'precio'    =>  "{$i}.10"
          ]);
        }
    }
}
