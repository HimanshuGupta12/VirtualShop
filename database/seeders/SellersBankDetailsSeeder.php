<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\SellersBankDetails;


class SellersBankDetailsSeeder extends Seeder
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
                'account_holder_name' => 'John Shrma',
                'bank_name' => 'ICICI',
                'account_number' => '0112345678' ,
                'bank_ifsc_code' => '0005943' ,


            ],
        ];

        SellersBankDetails::insert($sellerRecords);
    }
}
