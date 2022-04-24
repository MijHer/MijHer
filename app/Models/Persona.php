<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Persona extends Model
{
    use HasFactory;

    public function publicaciones()
    {
        return $this->hasMany(Publicacion::class);
    }

    public function postulaciones()
    {
        return $this->belongsToMany(Publicacion::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
