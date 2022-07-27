<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Product;

class ProductTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $productRecords = [
            [
                'id' =>1,
                'category_id' => 4 ,
                'section_id' => 2 ,
                'brand_id' => 7 ,
                'seller_id' => 1 ,
                'admin_id' => 2 ,
                'admin_type' => 'seller',
                'product_name' => 'Redmi Note 11',
                'product_code' => 'RN11',
                'product_color' => 'Blue',
                'product_price' => '15000',
                'product_discount' => '10',
                'product_weight' => '500',
                'product_image' => '',
                'product_description' => '',
                'meta_title' => '',
                'meta_description' => '',
                'meta_keyword' => '',
                'is_featured' => 'Yes',
                'status' => 1,
            ],
            [
                'id' =>2,
                'category_id' => 7 ,
                'section_id' => 8,
                'brand_id' => 2 ,
                'seller_id' => 0 , // 0 means this time super admin is adding the products
                'admin_id'  => 1,
                'admin_type' => 'superadmin',
                'product_name' => 'Red Casual T-Shirt',
                'product_code' => 'RC001',
                'product_color' => 'Red',
                'product_price' => '1000',
                'product_discount' => '20',
                'product_weight' => '200',
                'product_image' => '',
                'product_description' => '',
                'meta_title' => '',
                'meta_description' => '',
                'meta_keyword' => '',
                'is_featured' => 'Yes',
                'status' => 1,
            ]

        ];

        Product::insert($productRecords);

    }
}
