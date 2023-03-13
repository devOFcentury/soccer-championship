<div class="flex justify-center bg-blue-700 p-3 rounded text-xl text-white">
    <a href="{{ route('championnat.match', ['championnat' => $championnat->id]) }}" class="mr-5 p-2 hover:bg-blue-600 hover:rounded">Match</a>
    <a href="{{ route('championnat.classement', ['championnat' => $championnat->id]) }}" class="p-2 hover:bg-blue-600 hover:rounded">Classement</a>
</div>