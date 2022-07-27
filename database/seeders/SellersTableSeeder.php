<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Seller;

class SellersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $sellerRecords = [
            [
                'id' => 1,
                'name' => 'John',
                'address' => 'CP-112' ,
                'city'  => 'New Delhi' ,
                'state' => 'Delhi',
                'country' => 'India' ,
                'pincode' => '110001' ,
                'mobile' => '9700000000'  ,
                'email' => 'John@gmail.com',
                'status' => '0'

            ],
        ];
        Seller::insert($sellerRecords);
    }
}
