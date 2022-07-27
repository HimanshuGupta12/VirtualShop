<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Admin;

class AdminTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $adminRecords = [
            [
                'id' => 2,
                'name' => 'John',
                'type' => 'seller',
                'seller_id' => 1,
                'mobile' => '9700000000',
                'email' => 'John@gmail.com',
                'password' => '$2a$12$cSn.dygsIQnfv57X/s4U5uxHBFfeQU1fQMMxYQCXUVp6daOVHFSQm' ,
                'image' => '',
                'status' => 0
            ]
        ];
        Admin::insert($adminRecords);
    }
}
