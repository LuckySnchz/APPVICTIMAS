<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
         DB::table("users")->insert(

        ['email'=>"calder07@gmail.com",
        'sede'=>"LA PLATA",
        'area'=>"DIRECTORA",
        'nombre'=>"Lucky",
        'apellido'=>"sanchez",                
        'password'=>"0123456789XYZ",]

       
    );
      
    }
}
