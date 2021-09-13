<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PlaceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('places')->insert([
           ['id'=>1,'codigo'=>'ZS571371','nombre'=>'Salida Body Makers-TRP571044'],
            ['id'=>2,'codigo'=>'ZS571372','nombre'=>'Salida Body Makers-TRP571044'],
            ['id'=>3,'codigo'=>'ZS571373','nombre'=>'Salida Body Makers-TRP571045'],
            ['id'=>4,'codigo'=>'ZS571374','nombre'=>'Entrada Lavadora-TRP571046'],
            ['id'=>5,'codigo'=>'ZS571375','nombre'=>'Entrada Lavadora-TRP571046'],
        ]);
    }
}
