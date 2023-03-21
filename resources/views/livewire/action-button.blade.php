<div 
    class="mb-5 col-start-1 md:col-start-3 col-span-12 md:col-span-2"
    x-data="{
        showAddTeam: @entangle('showAddTeam'),
        showValidateChampionnat: @entangle('showValidateChampionnat'),
        showOpenDay: @entangle('showOpenDay'),
        showAddMatch: @entangle('showAddMatch'),
        showCloseDay: @entangle('showCloseDay'),
        
    }"
>
    <button 
        x-show="showAddTeam" 
        class="block bg-blue-500 rounded text-white mb-1 hover:bg-blue-700 hover:rounded md:w-3/4 p-1 mx-auto" 
        wire:click="$emit('addTeamsModal', {{ $championnat }})"
    >Ajouter des équipes</button>
    <button 
        x-show="showValidateChampionnat" 
        class="block bg-blue-500 rounded text-white mb-1 hover:bg-blue-700 hover:rounded md:w-3/4 p-1 mx-auto" 
        wire:click="validateTeams"
    >Valider le championnat</button>
    <button 
        x-show="showOpenDay" 
        class="block bg-blue-500 rounded text-white mb-1 hover:bg-blue-700 hover:rounded md:w-3/4 p-1 mx-auto" 
        wire:click="openDay"
    >Ouvrir une journée</button>
    <button 
        x-show="showAddMatch" 
        class="block bg-blue-500 rounded text-white mb-1 hover:bg-blue-700 hover:rounded md:w-3/4 p-1 mx-auto" 
        wire:click="checkAddMatch"
    >Ajouter des Match</button>
    <button 
        x-show="showCloseDay" 
        class="block bg-blue-500 rounded text-white mb-1 hover:bg-blue-700 hover:rounded md:w-3/4 p-1 mx-auto" 
        wire:click="CloseDay"
    >Fermer la journée</button>
</div>