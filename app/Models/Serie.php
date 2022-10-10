<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Serie extends Model
{
    use HasFactory;
    
    protected $fillable = ["nome"];

    public function seasons() {
        return $this->hasMany(Season::class);
    }

    //Escopo - Usado nesse caso pra ordenar todas as buscas pelo nome da série
    protected static function booted()
    {
        self::addGlobalScope("ordered", function (Builder $queryBuilder) {
            $queryBuilder->orderBy("nome");
        });
    }
}
