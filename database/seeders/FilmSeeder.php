<?php

namespace Database\Seeders;

use App\Models\Film;
use App\Models\Tag;
use Illuminate\Database\Seeder;

class FilmSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $films = Film::factory(50)->create();

        foreach ($films as $item) {
            $item->tags()->attach($this->devolverIdTagsRandom());
        }
    }

    private function devolverIdTagsRandom(): array{
          $tags = [];
          $arrayTags = Tag::pluck('id')->toArray();
          $arrayIndices = array_rand($arrayTags, random_int(2,count($arrayTags)));
          foreach ($arrayIndices as $indice) {
            $tags[]=$arrayTags[$indice];
          }
          return $tags;
    }
}
