<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Film extends Model
{
    use HasFactory;
    protected $fillable = ['titulo', 'descripcion', 'imagen'];

    public function tags(): BelongsToMany{
        return $this->belongsToMany(Tag::class);
    }

    public function titulo(): Attribute{
        return Attribute::make(
            set: fn($v)=>ucfirst($v),
        );
    }

    public function descripcion(): Attribute{
        return Attribute::make(
            set: fn($v)=>ucfirst($v),
        );
    }

    public function devolverIdTagsFilms(){
        $tagsFilm=[];
        foreach ($this->tags as $item) {
            $tagsFilm[]=$item->id;
        }
        return $tagsFilm;
    }
}
