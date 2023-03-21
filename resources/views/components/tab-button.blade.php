<div class="flex justify-center bg-blue-500 p-3 rounded text-xl text-white">
    <a class="bg-cyan-500 rounded p-2 mr-3 hover:bg-cyan-700" href="{{ route('championnat.match', ['championnat' => $championnat->id]) }}" class="mr-5 p-2 hover:bg-blue-600 hover:rounded">Match</a>
    <a class="bg-cyan-500 rounded p-2 hover:bg-cyan-700" href="{{ route('championnat.classement', ['championnat' => $championnat->id]) }}" class="p-2 hover:bg-blue-600 hover:rounded">Classement</a>
</div>