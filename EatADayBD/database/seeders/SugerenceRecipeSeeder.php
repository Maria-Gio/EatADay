<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\sugerenceRecipe;

class SugerenceRecipeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        SugerenceRecipe::create([
            'title' => 'Macarrones con tomate',
            // 'photo' => 'null',
            'ingredients' => '["macarrones", "tomate", "aceite", "sal"]',
            'description' => '-Una forma estupenda de conseguir que los niños coman verdura es mezclarla entre sus comidas favoritas.
            Si preparáis una buena salsa de tomate casera junto a la pasta estarán tomando un saludable plato que les llenará de energía.',
            'isChecked' => true,
            'user_id' => 1
        ]);

        SugerenceRecipe::create([
            'title' => 'Arroz y conejo',
            // 'photo' => 'null',
            'ingredients' => '["arroz", "conejo", "sal", "agua", "aceite", "sal"]',
            'description' => 'El arroz con conejo es un plato sabroso, nutritivo y lleno de sabor. A los niños les va a encantar
            porque su sabor es también muy suave',
            'isChecked' => true,
            'user_id' => 2
        ]);
    }
}
