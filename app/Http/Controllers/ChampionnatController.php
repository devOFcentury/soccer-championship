<?php

namespace App\Http\Controllers;

use App\Models\Championnat;
use App\Models\Stat;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ChampionnatController extends Controller
{

    public function index() 
    {
        return view('championnat.index');
    }
    public function rencontre(Championnat $championnat) 
    {
        // DB::table('equipes')->delete();
        // DB::statement("ALTER TABLE equipes AUTO_INCREMENT=1");
        return view('championnat.match', ['championnat' => $championnat]);
    }

    public function classement(Championnat $championnat) 
    {
       
        $stats = Stat::orderBy('pts', 'desc')
        ->where('championnat_id', $championnat->id)
        ->get();
       
        return view('championnat.classement', [
            'championnat' => $championnat,
            'stats' => $stats,
        ]);
    }
}
