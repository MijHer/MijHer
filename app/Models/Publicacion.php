<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Publicacion extends Model
{
    use HasFactory;

    public function categoria()
    {
        return $this->belongsTo(Categoria::class);
    }

    public function persona()
    {
        return $this->belongsTo(Persona::class);
    }

    public function personas()
    {
        return $this->belongsToMany(Persona::class);
    }

    public function empresa()
    {
        return $this->belongsTo(Empresa::class);
    }
}
