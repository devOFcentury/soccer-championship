
<div class="container flex justify-center mx-auto" x-data="{ open: @entangle('show').defer }" @add-team-modal.window="open = true">
    
    <div x-cloak x-show="open" class="absolute inset-0 flex items-center justify-center bg-gray-700 bg-opacity-50">
        <div class="w-96 p-6 bg-white rounded">
            <div class="flex items-center justify-between mb-5">
                <h3 class="text-2xl">{{ optional($championnat)->nom }}</h3>
                <svg wire:click="closeAddTeamsModal" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6 cursor-pointer ml-2 text-red-500">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
                  </svg>
            </div>


            <form wire:submit.prevent="addTeam">
                @if ($errors->first('full'))

                    <span class="text-red-500 block mb-4">{{ $errors->first('full') }}</span>
                @endif

                <div class="mb-4">
                    <input 
                        class="rounded block w-full mb-1 @error('nom') border-red-600 @enderror" 
                        type="text" 
                        wire:model="nom"
                        placeholder="Nom de l'équipe"
                    >
                    @error('nom')
                        <span class="text-red-600">{{ $message }}</span> 
                     @enderror
                </div>
                <button class="px-4 py-2 text-white bg-green-600 rounded" type="submit">Ajouter</button>
            </form>
            
        </div>
    </div>
</div>