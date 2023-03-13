<?php

namespace App\Models;

use App\Models\MatchFootball;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Journee extends Model
{
    use HasFactory;

    protected $fillable = ['journee', 'validated', 'championnat_id'];

    public function matchFootballs() 
    {
        return $this->hasMany(MatchFootball::class);
    }
}
