<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SensorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('sensors')->insert([
            ['id'=>1,'codigo'=>'A1.a','nombre'=>'Bloquear la energia electrica'],
            ['id'=>2,'codigo'=>'A1.b;c','nombre'=>'Aplicar del BD-ship en el interior y en los terminales del sensor'],
            ['id'=>3,'codigo'=>'A1.b','nombre'=>'Instalacion/sustitucion de terminales faltantes'],
            ['id'=>4,'codigo'=>'A1.b','nombre'=>'Aplicar el producto repelente de agua en el interior del sensor'],
            ['id'=>5,'codigo'=>'A1.c','nombre'=>'Aplicar la limpieza de contacto con los conectore macho / hembra'],
            ['id'=>6,'codigo'=>'A1.c','nombre'=>'Aplicar el producto repelente de agua dentro de los conectores macho/ hembra'],
            ['id'=>7,'codigo'=>'A1.d','nombre'=>'Instalar el prensa de calble donde esta faltando'],
            ['id'=>8,'codigo'=>'A1.e','nombre'=>'Reapretar el prensa de cable'],
            ['id'=>9,'codigo'=>'A1.e','nombre'=>'Aplicar el producto repelentede agua en la superficie externa del prensa de cable'],
            ['id'=>10,'codigo'=>'B1.a','nombre'=>'Reposicion de tornillos y tuercas que faltan en la fijacion del sesor'],
            ['id'=>11,'codigo'=>'B1.b','nombre'=>'Perforacion / instalacion de tornillos que faltan en la fijacion del sensor'],
            ['id'=>12,'codigo'=>'B1.c','nombre'=>'Reaprietar de los tornillos y tuercas'],
            ['id'=>13,'codigo'=>'A1.e','nombre'=>'Fijacion del espejo reflectivo(sensores fotoelectricos)'],
            ['id'=>14,'codigo'=>'A1.e','nombre'=>'Repocicion de tuercas y tornillos faltantes de los espejos'],
            ['id'=>15,'codigo'=>'A1.e','nombre'=>'Perforacion/ instalacion de tornillos que faltan en la fijacion del espejo'],
            ['id'=>16,'codigo'=>'A1.e','nombre'=>'Reposicion de sensores quemados'],
            ['id'=>17,'codigo'=>'A1.e','nombre'=>'Sensores puenteado mecanicanicamente'],
        ]);
    }
}
