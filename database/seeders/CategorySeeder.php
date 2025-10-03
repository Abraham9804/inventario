<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Category::create([
            'name' => 'Electronicos',
            'description' => 'Dispositivos y gadgets electronicos',
        ]);

        Category::create([
            'name' => 'Ropa',
            'description' => 'Prendas de vestir y accesorios',
        ]);

        Category::create([
            'name' => 'Hogar',
            'description' => 'Articulos para el hogar y decoracion',
        ]);

        Category::create([
            'name' => 'Deportes',
            'description' => 'Equipamiento y ropa deportiva',
        ]);

        Category::create([
            'name' => 'Libros',
            'description' => 'Libros y material de lectura',
        ]);

        Category::create([
            'name' => 'Juguetes',
            'description' => 'Juguetes y juegos para niños',
        ]);
    }
}
