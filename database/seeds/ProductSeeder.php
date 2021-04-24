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
                'name'=>'Oppo mobile',
                "price"=>"300",
                "description"=>"A smartphone with 8gb ram and much more feature",
                "category"=>"1",
                "gallery"=>"https://assetscdn1.paytm.com/images/catalog/product/M/MO/MOBOPPO-A52-6-GFUTU6297453D3D253C/1592019058170_0..png"
            ],
            [
                'name'=>'Panasonic Tv',
                "price"=>"400",
                "description"=>"A smart tv with much more feature",
                "category"=>"2",
                "gallery"=>"https://i.gadgets360cdn.com/products/televisions/large/1548154685_832_panasonic_32-inch-lcd-full-hd-tv-th-l32u20.jpg"
            ],
            [
                'name'=>'Soni Tv',
                "price"=>"500",
                "description"=>"A tv with much more feature",
                "category"=>"2",
                "gallery"=>"https://4.imimg.com/data4/PM/KH/MY-34794816/lcd-500x500.png"
            ],
            [
                'name'=>'LG fridge',
                "price"=>"200",
                "description"=>"A fridge with much more feature",
                "category"=>"3",
                "gallery"=>"https://encrypted-tbn0.gstatic.com/images?q=tbn%3AANd9GcTFx-2-wTOcfr5at01ojZWduXEm5cZ-sRYPJA&usqp=CAU"
            ],
            [
                'name'=>'Canon M6 Mark II Mirrorless Camera',
                "price"=>"71,539",
                "description"=>"Hone your photography skills and show the world your love for capturing images in all their beauty by getting the Canon M6 Mark II Mirrorless Camera.",
                "category"=>"4",
                "gallery"=>"https://images-na.ssl-images-amazon.com/images/I/610ksLeiVVL._AC_SX466_.jpg"
            ],

            [
                'name'=>'SONY Alpha 7M3K Mirrorless Camera Body',
                "price"=>"125000",
                "description"=>"Impress the world with stunning photos and wonderful videos captured using this Sony α7 III DSLR camera",
                "category"=>"4",
                "gallery"=>"https://ffd-160f2.kxcdn.com/images/thumbs/008/0082147_sony-alpha-a7-iii-mirrorless-digital-camera-with-28-70mm-lens_600.jpeg"
            ],
          
           
           
        ]);
    }
}
