<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\SellersBusinessDetails;

use function Ramsey\Uuid\v1;

class SellersBusinessDetailsSeeder extends Seeder
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
                'id' => 1 ,
                'seller_id' =>1  ,
                'shop_name' => 'John Electronics Store',
                'shop_address' => 'sector-74',
                'shop_city' => 'New Delhi' ,
                'shop_state' => 'Delhi' ,
                'shop_country' => 'India' ,
                'shop_pincode' => '110001' ,
                'shop_mobile' => '9700000000' ,
                'shop_website' => 'sitemakers.in' ,
                'shop_email' => 'John@gmail.com' ,
                'address_proof' => 'Passport' ,
                'address_proof_image' => 'test.jpg' ,
                'business_license_number' => '132435355' ,
                'gst_number' => '446466446' ,
                'pan_number' => '2423555346' ,


            ],
        ];
        SellersBusinessDetails::insert($sellerRecords);
    }
}
