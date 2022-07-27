<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\ProductsAttribute;

class ProductAttributeTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $productAttributeRecords =[
            ['id' => 1 , 'product_id' => 6 ,'size' => 'Small' , 'price' => 1000 , 'stock' => 10 , 'sku' =>'RC11-S' , 'status' => 1],
            ['id' => 2 , 'product_id' => 6 ,'size' => 'Medium' , 'price' => 1100 , 'stock' => 15 , 'sku' =>'RC11-M' , 'status' => 1],
            ['id' => 3 , 'product_id' => 6 ,'size' => 'Large' , 'price' => 1200 , 'stock' => 20 , 'sku' =>'RC11-L' , 'status' => 1],
        ];

        ProductsAttribute::insert($productAttributeRecords);
    }
}
