<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Stat extends Model
{
    use HasFactory;
    
    // protected $fillable = ['mj', 'g', 'n', 'p', 'bp', 'bc', 'db', 'pts', 'equipe_id', 'championnat_id'];
    protected $guarded = [];

    public function equipe()
    {
        return $this->belongsTo(Equipe::class);
    }
}
