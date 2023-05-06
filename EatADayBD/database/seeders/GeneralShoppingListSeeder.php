<?php

namespace Database\Seeders;

use App\Models\GeneralShoppingList;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class GeneralShoppingListSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        GeneralShoppingList::create([
            'ingredients' => json_encode([
                [
                    "id" => 20,
                    "name" => "Pimiento rojo",
                    "photo" => "https://www.tutrebol.es/77948/fruteria-pimiento-rojo-unidad.jpg",
                    "price" => 1.5,
                    "price_k" => 2.5,
                    "created_at" => "2023-03-03T10:43:40.000000Z",
                    "updated_at" => "2023-03-03T10:43:40.000000Z",
                    "user_id" => null,
                    'isBought' => false,
                    'userLike' => null
                ],
                [
                    "id" => 21,
                    "name" => "Pimiento amarillo",
                    "photo" => "https://somosfruta.es/425-large_default/pimiento-amarillo.jpg",
                    "price" => 1.5,
                    "price_k" => 2.5,
                    "created_at" => "2023-03-03T10:43:40.000000Z",
                    "updated_at" => "2023-03-03T10:43:40.000000Z",
                    "user_id" => null,
                    'isBought' => false,
                    'userLike' => null
                ]
            ]),
            'user_id' => 1
        ]);
        GeneralShoppingList::create([
            'ingredients' => json_encode([
                [
                    "id" => 15,
                    "name" => "Patata",
                    "photo" => "http://www.frutas-hortalizas.com/img/fruites_verdures/presentacio/59.jpg",
                    "price" => 1.5,
                    "price_k" => 3.5,
                    "created_at" => "2023-03-03T10:43:40.000000Z",
                    "updated_at" => "2023-03-03T10:43:40.000000Z",
                    "user_id" => null,
                    'isBought' => false,
                    'userLike' => null
                ],
                [
                    "id" => 18,
                    "name" => "Pechugas de pollo",
                    "photo" => "https://mejorconsalud.as.com/wp-content/uploads/2018/07/pechugas-pollo.jpg",
                    "price" => 2.5,
                    "price_k" => 3.5,
                    "created_at" => "2023-03-03T10:43:40.000000Z",
                    "updated_at" => "2023-03-03T10:43:40.000000Z",
                    "user_id" => null,
                    'isBought' => false,
                    'userLike' => null
                ],
                [
                    "id" => 19,
                    "name" => "Pimiento verde",
                    "photo" => "https://www.gastronomiavasca.net/uploads/image/file/3413/pimiento_verde.jpg",
                    "price" => 1.5,
                    "price_k" => 2.5,
                    "created_at" => "2023-03-03T10:43:40.000000Z",
                    "updated_at" => "2023-03-03T10:43:40.000000Z",
                    "user_id" => null,
                    'isBought' => false,
                    'userLike' => null
                ]
            ]),
            'user_id' => 2
        ]);
    }
}
