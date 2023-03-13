<div class="flex flex-col">
    <div class="overflow-x-auto sm:-mx-6 lg:-mx-8">
      <div class="inline-block min-w-full py-2 sm:px-6 lg:px-8">
        <div class="overflow-hidden">
          <table class="min-w-full text-left text-sm font-light">
            <thead class="border-b font-medium dark:border-neutral-500">
              <tr class="bg-black text-white">
                <th scope="col" class="px-6 py-4">Club</th>
                <th scope="col" class="px-6 py-4">MJ</th>
                <th scope="col" class="px-6 py-4">G</th>
                <th scope="col" class="px-6 py-4">N</th>
                <th scope="col" class="px-6 py-4">P</th>
                <th scope="col" class="px-6 py-4">BP</th>
                <th scope="col" class="px-6 py-4">BC</th>
                <th scope="col" class="px-6 py-4">DB</th>
                <th scope="col" class="px-6 py-4">Pts</th>
              </tr>
            </thead>
            <tbody>
                @forelse ($stats as $stat)
                  <tr class="border-b font-semibold text-lg bg-slate-700 text-white">
                    <td class="whitespace-nowrap px-6 py-4">{{ $loop->index + 1 }} {{$stat->equipe->nom}}</td>
                    <td class="whitespace-nowrap px-6 py-4">{{$stat->mj}}</td>
                    <td class="whitespace-nowrap px-6 py-4">{{$stat->g}}</td>
                    <td class="whitespace-nowrap px-6 py-4">{{$stat->n}}</td>
                    <td class="whitespace-nowrap px-6 py-4">{{$stat->p}}</td>
                    <td class="whitespace-nowrap px-6 py-4">{{$stat->bp}}</td>
                    <td class="whitespace-nowrap px-6 py-4">{{$stat->bc}}</td>
                    <td class="whitespace-nowrap px-6 py-4">{{$stat->db}}</td>
                    <td class="whitespace-nowrap px-6 py-4">{{$stat->pts}}</td>
                  </tr>
                @empty
                  <tr>
                    <td colspan="9" class="text-2xl text-center">ce championnat n'a pas encore d'équipes</td>
                  </tr>
                @endforelse
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>