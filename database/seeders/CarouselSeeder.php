<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CarouselSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table("carousel")->insert([
           
            [
                "name"=>"Happy New Year",
                "desc"=>"Happy new year to all our customers",
                "gallery"=>"hny.gif"
               
    
            ],
            
            [
                "name"=>"Esewa",
                "desc"=>"Pay with esewa",
                "gallery"=>"esewa.jpg"
    
            ],
            
            [
                "name"=>"Sale 50% off",
                "desc"=>"Grab the offer, 50% off on every product now",
                "gallery"=>"sale.gif"
    
            ],
            
            [
                "name"=>"Cement",
                "desc"=>"Jagadamba Cement, Mero desh mero jagadamba",
                "gallery"=>"cement.jpg"
               
    
            ]
        
        ]);
    }
}
