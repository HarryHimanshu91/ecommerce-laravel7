<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('products')->insert([
            [
                'name'=>'Canon M6 Mark II Mirrorless Camera',
                "price"=>"71,539",
                "description"=>"Hone your photography skills and show the world your love for capturing images in all their beauty by getting the Canon M6 Mark II Mirrorless Camera.",
                "category"=>"Camera",
                "gallery"=>"https://images-na.ssl-images-amazon.com/images/I/610ksLeiVVL._AC_SX466_.jpg"
            ],

            [
                'name'=>'SONY Alpha 7M3K Mirrorless Camera Body',
                "price"=>"125000",
                "description"=>"Impress the world with stunning photos and wonderful videos captured using this Sony α7 III DSLR camera",
                "category"=>"Camera",
                "gallery"=>"https://ffd-160f2.kxcdn.com/images/thumbs/008/0082147_sony-alpha-a7-iii-mirrorless-digital-camera-with-28-70mm-lens_600.jpeg"
            ],
          
           
           
        ]);
    }
}
