<?php

namespace App\Models;

use App\Models\Equipe;
use App\Models\Journee;
use App\Models\MatchFootball;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Championnat extends Model
{
    use HasFactory;

    protected $fillable = ['nom', 'nombre_journees'];

    public function equipes() 
    {
        return $this->hasMany(Equipe::class);
    }

    public function journees() 
    {
        return $this->hasMany(Journee::class);
    }

    public function matchFootballs() 
    {
        return $this->hasManyThrough(MatchFootball::class, Journee::class);
    }
}
