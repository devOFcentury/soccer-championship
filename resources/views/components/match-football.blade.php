<div class="bg-black text-white text-md mt-3">
    @forelse ($championnat->journees as $journee)
        <p class="pt-5 pb-2"><strong>Journée {{ $journee->journee }} sur {{ $championnat->nombre_journees }}</strong></p>
        <div class="grid grid-cols-2">
            @foreach ($journee->matchFootballs as $matchFootball)
                <div class="@if(($loop->index + 1) % 2 == 0) border-l @endif border-t p-2">
                    <p>
                        <span>{{ $matchFootball->equipeDomicile->nom }}&nbsp; <strong>{{ $matchFootball->score_equipe_domicile}} -</strong></span>
                        <span><strong>{{ $matchFootball->score_equipe_exterieur}}</strong> {{ $matchFootball->equipeExterieur->nom }}</span>
                    </p>
                </div>
            @endforeach
        </div>
    @empty
        <h2 class="text-center text-black text-2xl mt-5 w-full bg-white"> Pas de match joués pour l'instant</h2>
    @endforelse
</div>