<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Category::create(['catName'=>'Acción']);
        Category::create(['catName'=>'Aventura']);
        Category::create(['catName'=>'Carreras']);
        Category::create(['catName'=>'Cartas']);
        Category::create(['catName'=>'Casino']);
        Category::create(['catName'=>'Educativos']);
        Category::create(['catName'=>'Estrategia']);
        Category::create(['catName'=>'Juegos de deportes']);
        Category::create(['catName'=>'Juegos de mesa']);
        Category::create(['catName'=>'Juegos de palabras']);
        Category::create(['catName'=>'Juegos de rol']);
        Category::create(['catName'=>'Juegos ocasionales']);
        Category::create(['catName'=>'Música']);
        Category::create(['catName'=>'Preguntas y respuestas']);
        Category::create(['catName'=>'Rompecabezas']);
        Category::create(['catName'=>'Sala de juegos']);
        Category::create(['catName'=>'Simulación']);
    }
}
