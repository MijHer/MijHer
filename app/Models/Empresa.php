<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Empresa extends Model
{
    use HasFactory;
    
    public function publicaciones()
    {
        return $this->hasMany(Publicacion::class);
    }

    public function rubros()
    {
        return $this->belongsToMany(Rubro::class);
    }
}
