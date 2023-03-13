<div class="border bg-white p-6" x-data="{open: false}">
     <div class="relative w-48 mx-auto" @mouseover.away = "open = false" >

          <button class="btn bg-gray-100 p-2 rounded" x-on:mouseover="open = !open">Choisir un championnat</button>

          <div x-cloak x-show="open" class="absolute border rounded bg-white w-44">
               @foreach ($championnats as $championnat)
                         <a 
                              class="p-1 hover:bg-blue-400 block" 
                              href="{{ route('championnat.match', ['championnat' => $championnat->id]) }}"

                         >
                              {{ $championnat->nom }}
                         </a>
               @endforeach
          </div>
     </div>
</div>