<div class="mb-5 col-start-1 md:col-start-3 col-span-12 md:col-span-2">
    <button class="block border border-blue-400 rounded text-blue-500 mb-1 hover:bg-blue-400 hover:rounded hover:text-white md:w-3/4 p-1 mx-auto" wire:click="$emit('addTeamsModal', {{ $championnat }})">Ajouter des équipes</button>
    <button class="block border border-blue-400 rounded text-blue-500 mb-1 hover:bg-blue-400 hover:rounded hover:text-white md:w-3/4 p-1 mx-auto" wire:click="validateTeams">Valider le championnat</button>
    <button class="block border border-blue-400 rounded text-blue-500 mb-1 hover:bg-blue-400 hover:rounded hover:text-white md:w-3/4 p-1 mx-auto" wire:click="openDay">Ouvrir une journée</button>
    <button class="block border border-blue-400 rounded text-blue-500 mb-1 hover:bg-blue-400 hover:rounded hover:text-white md:w-3/4 p-1 mx-auto" wire:click="checkAddMatch">Ajouter des Match</button>
    <button class="block border border-blue-400 rounded text-blue-500 mb-1 hover:bg-blue-400 hover:rounded hover:text-white md:w-3/4 p-1 mx-auto" wire:click="CloseDay">Fermer la journée</button>
</div>