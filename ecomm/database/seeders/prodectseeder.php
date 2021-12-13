<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class prodectseeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('prodect')->insert([
            'name'=>'LGfrezer',
            'price'=>'940',
            'description'=>'super',
            'category'=>'freezer',
            'gallery'=>'https://www.google.com/imgres?imgurl=https%3A%2F%2Fcdn.shopify.com%2Fs%2Ffiles%2F1%2F0064%2F1466%2F3768%2Fproducts%2Fopen-propped-p170776-5z_073be505-1168-4ff4-a3d6-623edbae1f92_600x.jpg%3Fv%3D1613762835&imgrefurl=https%3A%2F%2Fwww.gladiatorgarageworks.com%2Fproducts%2F17-8-cu-ft-upright-freezer&tbnid=G3hs5nqIyqnGvM&vet=12ahUKEwi0pZj8zsL0AhWI2OAKHeAxBoUQMygHegUIARDvAQ..i&docid=WKIB_S8yxsmxpM&w=600&h=600&q=freezer&hl=en&ved=2ahUKEwi0pZj8zsL0AhWI2OAKHeAxBoUQMygHegUIARDvAQ'
            
        ]);
    }
}
