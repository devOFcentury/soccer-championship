<?php

namespace App\Models;

use App\Models\Stat;
use App\Models\MatchFootball;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Equipe extends Model
{
    use HasFactory;

    protected $fillable = ['nom', 'championnat_id'];

   

    public function matchEquipeDomicile() 
    {
        return $this->hasMany(MatchFootball::class, 'equipe_domicile');
    }

    public function matchEquipeExterieur() 
    {
        return $this->hasMany(MatchFootball::class, 'equipe_exterieur');
    }

    public function stats() 
    {
        return $this->hasOne(Stat::class)->orderBy('pts', 'desc');
    }
}
