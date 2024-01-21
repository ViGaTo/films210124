<?php

namespace Database\Seeders;

use App\Models\Tag;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TagSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $tags=[
            'ficción' => '#D4FF33',
            'comedia'=>'#FF6833',
            'misterio'=>'#33AFFF',
            'suspense'=>'#333FFF',
            'accion'=>'#FF3364'
        ];

        foreach ($tags as $item => $value) {
            Tag::create([
                'nombre' => $item,
                'color' => $value
            ]);
        }
    }
}
