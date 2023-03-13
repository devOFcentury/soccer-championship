<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MatchFootball extends Model
{
    use HasFactory;

    protected $fillable = [
        'score_equipe_domicile', 
        'score_equipe_exterieur', 
        'equipe_domicile', 
        'equipe_exterieur', 
        'championnat_id', 
        'journee_id'
    ];


    public function equipeDomicile() 
    {
        return $this->belongsTo(Equipe::class, 'equipe_domicile');
    }
    
    public function equipeExterieur() 
    {
        return $this->belongsTo(Equipe::class, 'equipe_exterieur');
    }
}
