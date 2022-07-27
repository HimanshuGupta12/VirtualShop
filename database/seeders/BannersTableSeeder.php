<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Banner;

class BannersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $bannerRecords = [
            ['id' => 1 , 'image' => 'banner1.jpg' , 'link' => 'spring-collection' , 'title' => 'Spring Collection' , 'alt' => 'Spring Collection' , 'status' => 1],
            ['id' => 2 , 'image' => 'banner2.jpg' , 'link' => 'tops-collection' , 'title' => 'tops Collection' , 'alt' => 'tops Collection' , 'status' => 1],
        ];
        Banner::insert($bannerRecords);
    }
}
