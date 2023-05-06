<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SupermarketSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('supermarkets')->insert([
            'name' => 'Mercadona',
            'description' => 'Mercadona es una compañía española de distribución con sede en el municipio de Tabernes Blanques y origen en el cercano de Puebla de Farnals, ambos pertenecientes a la provincia de Valencia.',
            'photo' => 'assets/img/mercadona.jpg'
        ]);

        DB::table('supermarkets')->insert([
            'name' => 'Hiperber',
            'description' => 'Cadena de supermercados de origen en Elche. Nuestros supermercados están presentes en las provincias de Alicante, Murcia y Valencia.',
            'photo' => 'assets/img/hiperber.jpg'
        ]);

        DB::table('supermarkets')->insert([
            'name' => 'Consum',
            'description' => 'Supermercado próximo con muy buenos frescos (frutas y verduras, charcutería, carnicería y pescadería) y gran variedad de marcas. Conoce toda nuestra oferta .',
            'photo' => 'assets/img/consum.jpg'
        ]);
    }
}
