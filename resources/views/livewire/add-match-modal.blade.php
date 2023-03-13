
<div class="container flex justify-center mx-auto" x-data="{ open: @entangle('show').defer }" @add-match-modal.window="open = true">
    
    <div x-cloak x-show="open" class="absolute inset-0 flex items-center justify-center bg-gray-700 bg-opacity-50">
        <div class="w-96 p-6 bg-white rounded">
            <div class="flex items-center justify-between mb-5">
                <h3 class="text-2xl">{{ optional($championnat)->nom }}</h3>
                <svg wire:click="closeAddMatchModal" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6 cursor-pointer ml-2 text-red-500">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
                  </svg>
            </div>


            <form wire:submit.prevent="addMatch" class="grid grid-cols-2 gap-4">
                @if ($errors->first('checkMatch'))

                    <span class="text-red-500 block mb-4 col-span-2">{{ $errors->first('checkMatch') }}</span>
                @endif
                <div class="mb-4 flex flex-col">
                    <label>Equipe domicile</label>
                    <select wire:model="equipe_domicile" class="rounded @error('equipe_domicile') border-red-600  @enderror">
                        <option value="">domicile</option>

                        @if (optional($championnat)->equipes)
                            @foreach ($championnat->equipes as $equipe)
                                <option value="{{ $equipe->nom }}">{{$equipe->nom}}</option>
                            @endforeach
                        @endif
                    </select>
                    @error('equipe_domicile')
                        <span class="text-red-600">{{ $message }}</span> 
                    @enderror
                </div>

                <div class="mb-4 flex flex-col">
                    <label>Equipe extérieur</label>
                    <select wire:model="equipe_exterieur" class="rounded @error('equipe_exterieur') border-red-600  @enderror">
                        <option value="">exterieur</option>
                        @if ($exterieur)
                            @foreach ($exterieur as $equipe)
                                <option value="{{ $equipe->nom }}">{{$equipe->nom}}</option>
                            @endforeach
                        @endif
                    </select>
                    @error('equipe_exterieur')
                        <span class="text-red-600">{{ $message }}</span> 
                    @enderror
                </div>

                <div class="mb-4 flex flex-col">
                    <input 
                        type="text" 
                        wire:model="score_equipe_domicile" 
                        placeholder="score équipe domicile" 
                        class="w-full rounded @error('score_equipe_domicile') border-red-600  @enderror"
                    >
                    @error('score_equipe_domicile')
                        <span class="text-red-600">{{ $message }}</span> 
                    @enderror
                </div>

                <div class="mb-4 flex flex-col">
                    <input 
                        type="text" 
                        wire:model="score_equipe_exterieur" 
                        placeholder="score équipe flex flex-colextérieur" 
                        class="w-full rounded @error('score_equipe_exterieur') border-red-600  @enderror"
                    >
                    @error('score_equipe_exterieur')
                        <span class="text-red-600">{{ $message }}</span> 
                    @enderror
                </div>

                <button class="px-4 py-2 text-white bg-green-600 rounded" type="submit">Ajouter</button>
            </form>
            
        </div>
    </div>
</div>