<div class="mt-4 grid grid-cols-12 md:gap-x-5 pb-3">
   <h1  class="w-full text-center text-2xl col-span-12 mx-auto mb-3">{{ $championnat->nom }}</h1>
    {{-- alert de message --}}
    @livewire('alert-error')
    @livewire('alert-success')

    @livewire('action-button', ['championnat' => $championnat])

    <div class="col-span-12 md:col-span-7 ">
         <x-tabButton :championnat="$championnat" />
         @if ($genre == "match")
            <x-match-football :championnat="$championnat" />
         @else
            <x-classement :championnat="$championnat" :stats="$stats" />
         @endif
         
    </div>

    {{-- Modal --}}
    @livewire('add-teams-modal')
    @livewire('add-match-modal')

</div>