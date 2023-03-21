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
        // DB::table('journees')->delete();
        // DB::statement("ALTER TABLE journees AUTO_INCREMENT=1");
        return view('championnat.match', ['championnat' => $championnat]);
    }

    public function classement(Championnat $championnat) 
    {

        $stats = Stat::orderBy('pts', 'desc')
        ->where('championnat_id', $championnat->id)
        ->get();

        // gerer la différence de but
        for($i = 0; $i < $stats->count(); $i++) {
            for($j = 0; $j < $stats->count(); $j++) {

                // si le point actuel est égal au point de l'index suivant
                if ( isset($stats[$j + 1]) && ($stats[$j]['pts'] == $stats[$j + 1]['pts']) ) {
                    // si la différence de but actuelle est inférieur à la différence de but suivant
                    if ($stats[$j]['db'] < $stats[$j + 1]['db']) {
                        $saveValue = $stats[$j];
                        $stats[$j] = $stats[$j + 1];
                        $stats[$j + 1] = $saveValue;
                    }
                }
            }    
        }
       
        return view('championnat.classement', [
            'championnat' => $championnat,
            'stats' => $stats,
        ]);
    }
}
