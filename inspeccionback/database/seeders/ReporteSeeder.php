<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ReporteSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('reportes')->insert([
            ['area'=>'Packing Lata','subarea'=>'Linea 571','user_id'=>1,'fecha'=>date('Y-m-d'),'hora'=>date('H:i:s')]
        ]);
    }
}
